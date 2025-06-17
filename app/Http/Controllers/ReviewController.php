<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;

use Illuminate\Http\Request;

class ReviewController extends Controller
{public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'review' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5', // Optional rating validation
        ]);

        $product = Product::findOrFail($id);

        $product->reviews()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
            'status' => false, // Use 0 (false) or 1 (true)

        ]);

        return redirect()->back()->with('success', 'Your review has been submitted and is awaiting approval.');
    }

    public function manageReviews()
    {
        $reviews = Review::with('product')->get(); // Get pending reviews
        return view('backend.reviews', compact('reviews'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->status = !$review->status; // Toggle the status
        $review->save();
    
        return redirect()->back()->with('success', 'Review status updated successfully.');
    }
    public function reviewDelete(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
    
        return redirect()->back()->with('success', 'Review Delete successfully.');
    }
}
