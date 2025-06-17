<?php

namespace App\Http\Controllers;

use App\Models\CustomizPaintingOrder;
use Illuminate\Http\Request;

class CustomizePainting extends Controller
{
    public function paintingStore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'subject' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
        ]);

        // Save the order
        CustomizPaintingOrder::create($request->all());

        // Redirect with a success message
        return redirect()->back()->with('success', 'Your order has been submitted successfully!');
    }

    public function paintingIndex(){
        // Retrieve all orders
        $customizeOrders = CustomizPaintingOrder::all();

        return view('backend.customizeOrders.index', compact('customizeOrders'));
    }
    public function paintingShow($id){
        // Retrieve all orders
        $customizeOrders = CustomizPaintingOrder::findOrFail($id);

        return view('backend.customizeOrders.show', compact('customizeOrders'));
    }
    public function paintingDestroy($id){
        // Retrieve all orders
        $customizeOrders = CustomizPaintingOrder::findOrFail($id);
        $customizeOrders->delete();
        return redirect()->route('paintingIndex')->with('success', 'Order deleted successfully!');
    }
}
