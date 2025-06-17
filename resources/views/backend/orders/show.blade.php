@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
        
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">ORDER ID NO #{{$orders->id}}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6"> 
                    <h4>Product Image</h4>
                    <img 
                        src="{{ asset('storage/' . $orders->product->image) }}" 
                        alt="{{ $orders->product->name }}" 
                        {{-- class="img-thumbnail"  --}}
                        style="width: 70%; height: auto;"
                    />
                </div>
                <div class="col-md-6">
                    <h4>Product Name</h4>
                    {{$orders->product->name}}
                </div>
                <div class="col-md-4 mt-5">
                    <h4>Product Single Price</h4>
                    {{$orders->product->price}}
                </div>
                <div class="col-md-4 mt-5">
                    <h4>Order Quantiy</h4>
                    {{$orders->quantity}}
                </div>
                <div class="col-md-4 mt-5">
                    <h4>Order Subtotal</h4>
                    {{$orders->subtotal}}
                </div>
                <div class="col-md-4 mt-5">
                    <h4>Person Name</h4>
                    {{$orders->first_name}}
                </div>
                <div class="col-md-4 mt-5">
                    <h4>Order Email</h4>
                    {{$orders->email}}
                </div>
               
                <div class="col-md-4 mt-5">
                    <h4>Order Phone Number</h4>
                    {{$orders->phone}}
                </div>
                <div class="col-md-4 mt-5">
                    <h4>Order Country</h4>
                    {{$orders->country}}
                </div>
                <div class="col-md-4 mt-5">
                    <h4>Order State</h4>
                    {{$orders->state}}
                </div>
                <div class="col-md-4 mt-5">
                    <h4>Order Postal Code</h4>
                    {{$orders->postal_code}}
                </div>
                <div class="col-md-4 mt-5">
                    <h4>Order Address 1</h4>
                    {{$orders->address_line1}}
                </div>
                <div class="col-md-4 mt-5">
                    <h4>Order Address 2</h4>
                    {{$orders->address_line2}}
                </div>
                <div class="col-md-4 mt-5 mb-4">
                    <h4>Order Payment Method</h4>
                    {{$orders->payment_method}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection