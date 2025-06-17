@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
        
    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order</h1>
        <a href="{{route('products.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add Product</a>
    </div> --}}

    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Order Table</h6>
                </div>
                @session('success')
                    <div class="alert alert-success" role="alert"> {{ $value }} </div>
                @endsession
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Order Price</th>
                                    <th>Order Quantity</th>
                                    <th>Order Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <!-- Product Image -->
                                        <td>
                                            @if ($order->product && $order->product->image)
                                                <img 
                                                    src="{{ asset('storage/' . $order->product->image) }}" 
                                                    alt="{{ $order->product->name }}" 
                                                    class="img-thumbnail" 
                                                    style="width: 100px; height: auto;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                        
                                        <!-- Product Name -->
                                        <td>{{ $order->product->name ?? 'No Product' }}</td>
                        
                                        <!-- Order Price -->
                                        <td>{{ $order->product->price ?? 'N/A' }}</td>
                                        <td>{{ $order->quantity ?? 'N/A' }}</td>
                                        <td>{{ $order->total ?? 'N/A' }}</td>
                        
                                        <!-- Actions -->
                                        <td>
                                            
                                            <form action="{{ route('orderDelete', $order->id) }}" method="POST">
                                                <a 
                                                class="btn btn-primary btn-sm" 
                                                href="{{ route('orderShow', $order->id) }}">
                                                <i class="fa-solid fa-pen-to-square"></i> Show
                                            </a>
                        
                                                @csrf
                                                @method('DELETE')
                                                
                                                <button 
                                                    type="submit" 
                                                    class="btn btn-danger btn-sm mt-2" 
                                                    onclick="return confirm('Are you sure you want to delete this order?')">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">There are no orders.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection