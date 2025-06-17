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
                    <h6 class="m-0 font-weight-bold text-primary">Customize Order Table</h6>
                </div>
                @session('success')
                    <div class="alert alert-success" role="alert"> {{ $value }} </div>
                @endsession
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customizeOrders as $customizeOrder)
                                    <tr>
                        
                                        <!-- Product Name -->
                                        <td>{{ $customizeOrder->name }}</td>
                        
                                        <!-- Order Price -->
                                        <td>{{ $customizeOrder->address}}</td>
                                        <td>{{ $customizeOrder->email}}</td>
                                        <td>{{ $customizeOrder->phone }}</td>
                                        <td>{{ $customizeOrder->subject }}</td>
                                        <td>
                                            
                                            <!-- Edit Product Button -->
                                            <a href="{{route('paintingShow', $customizeOrder->id)}}" class="btn btn-sm btn-primary mb-2">Show</a>
                                            
                                            <!-- Delete Product Button -->
                                            <form action="{{route('paintingDestroy', $customizeOrder->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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