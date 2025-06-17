@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
        
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">YouTube Videos</h1>
        {{-- <a href="{{route('categories.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add Categories</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">YouTube</h6>
                </div>
                @session('success')
                    <div class="alert alert-success" role="alert"> {{ $value }} </div>
                @endsession
                <div class="card-body">
                    <form action="{{ route('youtubeVideoStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                    
                            <div class="col-md-6 form-group">
                                <label for="images">Enter Youtube Emabard Url</label>
                                <input type="url" name="video_url" class="form-control" placeholder="Enter YouTube URL" required>
                                @error('video_url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add Video</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse ($videos as $video)
                            <div class="col-md-6 mb-4">
                                <div class="position-relative">
                                    <!-- Embed YouTube video -->
                                    <iframe width="100%" height="315" src="{{ $video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    
                                    <!-- Delete button with icon -->
                                    <form action="{{ route('youtubeVideoDestroy', $video->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this video?');" class="position-absolute top-0 end-0 m-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> <!-- Trash icon -->
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p>No videos added yet.</p>
                        @endforelse
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection