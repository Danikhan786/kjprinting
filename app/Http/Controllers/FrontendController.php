<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Review;
use App\Models\Cart;
use App\Models\YoutubeVideo;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::latest()->take(8)->get(); // Fetch the latest 8 products
        return view('frontend.index', compact('products'));
    }

    public function about()
    {

        return view('frontend.about');
    }

    public function shop(Request $request)
    {
        $query = Product::query();

        // Category filter
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Price filter
        if ($request->has('price_range')) {
            switch ($request->price_range) {
                case '0-50':
                    $query->whereBetween('price', [0, 50]);
                    break;
                case '50-100':
                    $query->whereBetween('price', [50, 100]);
                    break;
                case '100-150':
                    $query->whereBetween('price', [100, 150]);
                    break;
                case '150-200':
                    $query->whereBetween('price', [150, 200]);
                    break;
                case '200-250':
                    $query->whereBetween('price', [200, 250]);
                    break;
                case '250+':
                    $query->where('price', '>', 250);
                    break;
            }
        }

        // Sorting
        if ($request->has('sort')) {
            $query->orderBy('price', $request->sort == 'asc' ? 'asc' : 'desc');
        }

        $categories = Category::all();
        $products = $query->paginate(12);

        return view('frontend.shop', compact('categories', 'products'));
    }

    public function productDetail($slug)
    {
        $product = Product::with(['category', 'reviews'])->where('slug', $slug)->firstOrFail();

        // Get product images
        $images = [];
        if ($product->images) {
            $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
        }

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('frontend.productDetail', compact('product', 'images', 'relatedProducts'));
    }

    public function portfoilio()
    {

        $categories = Category::with('portfolios')->get();
        return view('frontend.portfolio', compact('categories'));
    }

    public function customPainting()
    {

        return view('frontend.customPainting');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function ContactUsFrom(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }

    public function youtube()
    {
        // Fetch all videos from the database
        $videos = YoutubeVideo::all();
        return view('frontend.youtube', compact('videos'));
    }
}
