@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
        
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-md-12">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div class="mb-3">
                    <label for="category_id" class="form-label"><strong>Category:</strong></label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Product Name:</strong></label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}" required>
                </div>
            
                <div class="mb-3">
                    <label for="price" class="form-label"><strong>Product Price:</strong></label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}" required>
                </div>
            
                 <!-- Short Description -->
                <div class="mb-3">
                    <label for="short_description" class="form-label"><strong>Short Description:</strong></label>
                    <textarea name="short_description" id="short_description" class="form-control" rows="3" required>{{ $product->short_description }}</textarea>
                </div>

                <!-- Long Description -->
                <div class="mb-3">
                    <label for="long_description" class="form-label"><strong>Long Description:</strong></label>
                    <textarea name="long_description" id="long_description" class="form-control" rows="5" required>{{ $product->long_description }}</textarea>
                </div>

            
                <div class="mb-3">
                    <label for="image" class="form-label"><strong>Product Image:</strong></label>
                    <input type="file" name="image" class="form-control" id="image">
                    @if ($product->image)
                        <img src="{{ asset($product->image) }}" alt="Product Image" class="mt-2" style="width: 100px;">
                    @endif
                </div>
                <!-- Product Images -->

                <div class="mb-3">
                    <label for="images" class="form-label"><strong>Product Images:</strong></label>
                
                    <div class="d-flex flex-wrap">
                        @foreach ($images ?? [] as $image)
                            <div class="position-relative m-2">
                                <img src="{{ asset( $image) }}" alt="Product Image" class="img-thumbnail" style="width: 200px;">
                                <button class="btn btn-danger btn-sm position-absolute" 
                                        style="top: 5px; right: 5px;" 
                                        onclick="deleteImage('{{ $image }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                
                    <input type="file" name="new_images[]" class="form-control mt-3" multiple>
                    <small class="text-muted">You can upload new images. Existing images will remain unless deleted manually.</small>
                </div>
                
        
                <div class="mb-3">
                    <label for="video" class="form-label"><strong>Product Video:</strong></label>
                    <input type="file" name="video" class="form-control" id="video">
                    @if ($product->video)
                    <div class="mt-2">
                        <video controls style="width: 100%; max-width: 300px;">
                            <source src="{{ asset($product->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        {{-- <p class="mt-1">
                            <a href="{{ asset('storage/' . $product->video) }}" target="_blank">Download Video</a>
                        </p> --}}
                    </div>                    
                    @endif
                </div>
            
                <button type="submit" class="btn btn-success">Update Product</button>
            </form>
            
         
        </div>
    </div>
</div>


<script>
    function deleteImage(imagePath) {
        if (confirm('Are you sure you want to delete this image?')) {
            fetch('{{ route('product.deleteImage', $product->id) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ image: imagePath })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    alert('Failed to delete the image.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
</script>
@endsection