<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Portfolio;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = Product::findOrFail($productId);

        // If user is logged in, associate cart with the user; otherwise, associate with session
        $userId = Auth::id();
        $sessionId = session()->getId();

        $cartItem = Cart::where(function ($query) use ($userId, $sessionId) {
            if ($userId) {
                $query->where('user_id', $userId);
            } else {
                $query->where('session_id', $sessionId);
            }
        })->where('product_id', $productId)->first();

        if ($cartItem) {
            // Update quantity if the product is already in the cart
            $cartItem->quantity += $quantity;
        } else {
            // Create a new cart item
            $cartItem = new Cart([
                'user_id' => $userId,
                'session_id' => $sessionId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price,
                'total_price' => $product->price * $quantity,
            ]);
        }

        $cartItem->save();

        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }

    // Show cart
    public function showCart()
    {
        $allPortfolios = Portfolio::latest()->take(8)->get(); // Fetch the latest 8 portfolios
        $cartItems = $this->getCartItems();
        $subtotal = $this->calculateSubtotal($cartItems);

        return view('frontend.cart',[
            'cart' => $cartItems,
            'subtotal' => $subtotal,
            'totalQuantity' => $cartItems->sum('quantity'),
        ],compact('allPortfolios'));
    }

    // Remove product from cart
    public function removeFromCart($id)
    {
        $userId = Auth::id();
        $sessionId = session()->getId();

        Cart::where(function ($query) use ($userId, $sessionId) {
            if ($userId) {
                $query->where('user_id', $userId);
            } else {
                $query->where('session_id', $sessionId);
            }
        })->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    // Update cart quantities
    public function updateCart(Request $request)
    {
        $request->validate([
            'quantities.*' => 'required|integer|min:1',
        ]);

        $cart = $this->getCartItems();

        foreach ($request->input('quantities', []) as $cartId => $quantity) {
            $cartItem = $cart->where('id', $cartId)->first();
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->total_price = $cartItem->price * $quantity;
                $cartItem->save();
            }
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    // Show the checkout
    public function checkout()
    {
        $allPortfolios = Portfolio::latest()->take(8)->get(); // Fetch the latest 8 portfolios
        $cartItems = $this->getCartItems();
        $total = $this->calculateSubtotal($cartItems);

        return view('frontend.checkout', [
            'cart' => $cartItems,
            'total' => $total,
            'totalQuantity' => $cartItems->sum('quantity'),
        ],compact('allPortfolios'));
    }

    public function order(Request $request)
    {
        // Validate the request inputs
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
        ]);
    
        // Get cart items (from session or database)
        $cartItems = Cart::where(function ($query) {
            $userId = Auth::id();
            $sessionId = session()->getId();
    
            if ($userId) {
                $query->where('user_id', $userId);
            } else {
                $query->where('session_id', $sessionId);
            }
        })->get();
    
        // If cart is empty, redirect with an error
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty!');
        }
    
        // Create the order for each cart item
        foreach ($cartItems as $cartItem) {
            $order = Order::create([
                'user_id' => auth()->id() ?? null, // Null for guest users
                'product_id' => $cartItem->product_id, // Reference the product
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'country' => $validatedData['country'],
                'state' => $validatedData['state'],
                'postal_code' => $validatedData['postal_code'],
                'address_line1' => $validatedData['address_line1'],
                'address_line2' => $validatedData['address_line2'],
                'subtotal' => $cartItem->total_price, // Using the total price from the cart
                'quantity' => $cartItem->quantity, // Add quantity here
                'total' => $cartItem->total_price, // Item total (assuming no additional charges like shipping or taxes)
                'payment_method' => $request->payment_method ?? 'Cash On Delivery',
            ]);
        }
        Mail::to($validatedData['email'])->send(new OrderConfirmation($order, auth()->user() ?? (object) $validatedData));
        // Clear the cart items after the order is placed
        $cartItems->each->delete();
    
        // Redirect to a thank you page
        return redirect()->route('thankyou')->with('success', 'Order placed successfully!');
    }
    

    // Helper: Get cart items
    private function getCartItems()
    {
        $userId = Auth::id();
        $sessionId = session()->getId();

        return Cart::with('product')
            ->where(function ($query) use ($userId, $sessionId) {
                if ($userId) {
                    $query->where('user_id', $userId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })->get();
    }

    // Helper: Calculate subtotal
    private function calculateSubtotal($cartItems)
    {
        return $cartItems->sum(fn($item) => $item->total_price);
    }
}
