<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;
use App\Models\Contact;
use App\Models\YoutubeVideo;
use App\Models\CustomizPaintingOrder;
use Illuminate\Support\Facades\Storage; // Add this at the top of the controller



class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $categories = Category::count();
        $portfolioItems = Portfolio::count();
        $products = Product::count();
        $reviews = Review::count();
        $orders = Order::count();
        $customOrders = CustomizPaintingOrder::count();
        return view('backend.index', compact('categories', 'portfolioItems', 'products', 'reviews', 'orders', 'customOrders'));
    }
    // Display all categories
    public function categories()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    public function portfolio()
    {
        $portfolioItems = Portfolio::with('category')->get();
        $categories = Category::all();
        return view('backend.portfolio', compact('categories', 'portfolioItems'));
    }

    public function portfolioStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        foreach ($request->file('images') as $image) {
            // Generate a unique file name
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the file to the public folder
            $image->move(public_path('portfolio'), $imageName);  // Save to public/portfolio

            // Store the image path relative to the public folder
            Portfolio::create([
                'category_id' => $request->category_id,
                'image_path' => 'portfolio/' . $imageName,
            ]);
        }

        return redirect()->route('portfolio')->with('success', 'Portfolio items uploaded successfully.');
    }

    public function portfolioDestroy($id)
    {
        $portfolioItem = Portfolio::findOrFail($id);

        // Delete the associated image file from public folder
        $imagePath = public_path($portfolioItem->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);  // Delete file from public folder
        }

        // Delete the portfolio item from the database
        $portfolioItem->delete();

        return redirect()->route('portfolio')->with('success', 'Portfolio item deleted successfully.');
    }


    public function product()
    {
        $products = Product::all();
        return view('backend.products.index', (compact('products')));
    }
    public function orders()
    {
        $orders = Order::with('product')->get(); // Eager load product data
        return view('backend.orders.index', compact('orders'));
    }
    public function orderShow($id)
    {
        $orders = Order::with('product')->findOrFail($id); // Eager load product data
        return view('backend.orders.show', compact('orders'));
    }
    public function orderDelete($id)
    {
        $orders = Order::with('product')->findOrFail($id); // Eager load product data
        $orders->delete();
        return redirect()->route('orders')->with('success', 'Order deleted successfully.');
    }

    public function youtubeVideo()
    {
        // Fetch all videos from the database
        $videos = YoutubeVideo::all();
        return view('backend.youtubeVideo', compact('videos'));
    }

    public function youtubeVideoStore(Request $request)
    {
        // Validate the incoming URL
        $request->validate([
            'video_url' => 'required|url',
        ]);

        // Save the video URL to the database
        YoutubeVideo::create(['url' => $request->video_url]);

        return redirect()->route('youtubeVideo')->with('success', 'Video added successfully!');
    }

    public function youtubeVideoDestroy($id)
    {
        // Find the video by its ID
        $video = YoutubeVideo::findOrFail($id);

        // Delete the video from the database
        $video->delete();

        return redirect()->route('youtubeVideo')->with('success', 'Video deleted successfully!');
    }

    public function contactData()
    {

        $contactData = Contact::all();
        return view('backend.contactUs', compact('contactData'));
    }

    public function deleteContactData($id) {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();
            return redirect()->route('contactData')->with('success', 'Contact deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('contactData')->with('error', 'Error deleting contact: ' . $e->getMessage());
        }
    }


    public function login()
    {
        return view('backend.login');
    }
}
