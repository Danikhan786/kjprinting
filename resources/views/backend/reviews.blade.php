@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
        
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reviews</h1>
        {{-- <a href="{{route('categories.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add Categories</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reviews</h6>
                </div>
                @session('success')
                    <div class="alert alert-success" role="alert"> {{ $value }} </div>
                @endsession
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Review</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->product->name }}</td>
                                        <td>{{ $review->name }}</td>
                                        <td>{{ $review->email }}</td>
                                        <td>{{ $review->review }}</td>
                                        <td>{{ $review->rating }}</td>
                                        <td>
                                            <form action="{{ route('admin.reviews.toggleStatus', $review->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-{{ $review->status ? 'info' : 'success' }} btn-sm">
                                                    <i class="fa-solid fa-{{ $review->status ? 'times' : 'check' }}"></i> 
                                                    {{ $review->status ? 'Unapprove' : 'Approve' }}
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.reviewDelete', $review->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('delete')
                                                <button 
                                                type="submit" 
                                                class="btn btn-danger btn-sm mt-2"
                                                onclick="return confirm('Are you sure you want to delete this product?')">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                            </form>
                                        </td>
                                        
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No reviews available.</td>
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