@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
        
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Categories</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-md-12">
            <form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
          
                <div class="mb-3">
                    <label for="inputName" class="form-label"><strong>Category Name:</strong></label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ $category->name }}"
                        class="form-control @error('name') is-invalid @enderror" 
                        id="inputName" 
                        placeholder="Name">
                        @error('name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                </div>        
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            </form>
         
        </div>
    </div>
</div>
@endsection