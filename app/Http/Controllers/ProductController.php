<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'images.*' => 'image|mimes:jpg,png,jpeg|max:2048',
            'video' => 'nullable|mimes:mp4,mov,avi|max:51200', // Video validation
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // Handle main image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('products'), $imageName);
            $validated['image'] = 'products/' . $imageName;
        }

        // Handle additional images upload
        if ($request->hasFile('images')) {
            $validated['images'] = array_map(function ($file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('products'), $imageName);
                return 'products/' . $imageName;
            }, $request->file('images'));
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '_' . $video->getClientOriginalName();
            $video->move(public_path('products/videos'), $videoName);
            $validated['video'] = 'products/videos/' . $videoName;
        }

        // Create product
        Product::create($validated);
    
        return redirect()->route('product')->with('success', 'Product created successfully!');
    }
    
    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all(); // To populate the category dropdown
        $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;

        return view('backend.products.edit', compact('product', 'categories','images'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,mov,avi,flv|max:10240', // Max 10MB
            'new_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Multiple new images

        ]);
    
        $product = Product::findOrFail($id);
    
        // Update product details
        $product->name = $request->name;
        $product->price = $request->price;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->category_id = $request->category_id;
    
        // Handle images

        // Handle single featured image
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            
            // Store new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('product_images'), $imageName);
            $product->image = 'product_images/' . $imageName;
        }

        $images = is_string($product->images) ? json_decode($product->images, true) : ($product->images ?? []);

        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $newImage) {
                $imageName = time() . '_' . $newImage->getClientOriginalName();
                $newImage->move(public_path('product_images'), $imageName);
                $images[] = 'product_images/' . $imageName;
            }
            $product->images = json_encode($images);
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            if ($product->video && file_exists(public_path($product->video))) {
                unlink(public_path($product->video));
            }
            $video = $request->file('video');
            $videoName = time() . '_' . $video->getClientOriginalName();
            $video->move(public_path('product_videos'), $videoName);
            $product->video = 'product_videos/' . $videoName;
        }

    
        $product->save();
    
        return redirect()->route('product')->with('success', 'Product updated successfully.');
    }

    public function deleteImage(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $imageToDelete = $request->input('image');
    
        // Decode existing images from JSON
        $images = is_string($product->images) ? json_decode($product->images, true) : ($product->images ?? []);
    
        // Check if the image exists in the list
        if (($key = array_search($imageToDelete, $images)) !== false) {
            // Remove the image from the list
            unset($images[$key]);
    
            // Delete the image file from the public folder
            $imagePath = public_path($imageToDelete);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
    
            // Update the product's images field
            $product->images = json_encode(array_values($images)); // Re-index array
            $product->save();
        }
    
        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
    
    

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
    
        // Delete the main image file from public folder
        if ($product->image) {
            $imagePath = public_path($product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete all additional images from public folder
        $images = is_string($product->images) ? json_decode($product->images, true) : ($product->images ?? []);
        foreach ($images as $image) {
            $imagePath = public_path($image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete the video file from public folder
        if ($product->video) {
            $videoPath = public_path($product->video);
            if (file_exists($videoPath)) {
                unlink($videoPath);
            }
        }
    
        // Delete the product from the database
        $product->delete();
    
        return redirect()->route('product')->with('success', 'Product deleted successfully.');
    }
    


    // Display Product Details
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }
    
}
