@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
        
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-md-12">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                 <!-- Product Category -->
                <div class="mb-3">
                    <label for="category" class="form-label"><strong>Category:</strong></label>
                    <select 
                        name="category_id" 
                        class="form-control @error('category_id') is-invalid @enderror" 
                        id="category">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Product Name -->
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Product Name:</strong></label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        id="name" 
                        placeholder="Enter product name">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <!-- Product Price -->
                <div class="mb-3">
                    <label for="price" class="form-label"><strong>Product Price:</strong></label>
                    <input 
                        type="number" 
                        name="price" 
                        class="form-control @error('price') is-invalid @enderror" 
                        id="price" 
                        placeholder="Enter product price" 
                        step="0.01">
                    @error('price')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
               
            
                <!-- Product Main Image -->
                <div class="mb-3">
                    <label for="image" class="form-label"><strong>Main Product Image:</strong></label>
                    <input 
                        type="file" 
                        name="image" 
                        class="form-control @error('image') is-invalid @enderror" 
                        id="image" 
                        accept="image/*">
                    @error('image')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <!-- Additional Images -->
                <div class="mb-3">
                    <label for="images" class="form-label"><strong>Additional Product Images:</strong></label>
                    <input 
                        type="file" 
                        name="images[]" 
                        class="form-control @error('images.*') is-invalid @enderror" 
                        id="images" 
                        multiple 
                        accept="image/*">
                    @error('images.*')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <!-- Product Video -->
                <div class="mb-3">
                    <label for="video" class="form-label"><strong>Product Video:</strong></label>
                    <input 
                        type="file" 
                        name="video" 
                        class="form-control @error('video') is-invalid @enderror" 
                        id="video" 
                        accept="video/*">
                    @error('video')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <!-- Short Description -->
                <div class="mb-3">
                    <label for="short_description" class="form-label"><strong>Short Description:</strong></label>
                    <textarea 
                        name="short_description" 
                        class="form-control @error('short_description') is-invalid @enderror" 
                        id="short_description" 
                        rows="2" 
                        placeholder="Enter a short description"></textarea>
                    @error('short_description')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <!-- Long Description -->
                <div class="mb-3">
                    <label for="long_description" class="form-label"><strong>Long Description:</strong></label>
                    <textarea 
                        name="long_description" 
                        class="form-control @error('long_description') is-invalid @enderror" 
                        id="long_description" 
                        rows="4" 
                        placeholder="Enter a detailed description"></textarea>
                    @error('long_description')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-floppy-disk"></i> Submit
                </button>
            </form>
            
         
        </div>
    </div>
</div>
@endsection