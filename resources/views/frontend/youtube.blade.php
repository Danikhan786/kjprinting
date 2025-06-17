@extends('frontend.layout.appTwo')
@section('content')

{{-- <section id="center" class="center_o bg_gray pt-2 pb-2">
    <div class="container-xl">
        <div class="row center_o1">
            <div class="col-md-5">
                <div class="center_o1l">
                    <h2 class="mb-0">Customize Painting </h2>
                </div>
            </div>
            <div class="col-md-7">
                <div class="center_o1r text-end">
                    <h6 class="mb-0"><a href="{{route('index')}}">Home</a> <span class="me-2 ms-2"><i
                                class="fa fa-caret-right"></i></span>Customize Painting</h6>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section id="port" class="p_4">
    <div class="container-xl">
        <div class="row port_1 text-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h1 class="font_60">Youtube Channal</h1>
                <span class="icon_line col_pink"><i class="fa fa-square-o"></i></span>
            </div>
        </div>

    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row mb-3">
            <img src="frontend/img/assets/youtubeImg.jpg" class="w-100" alt="youtube Img">
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            @forelse ($videos as $video)
                <div class="col-md-4 mb-4">
                    <iframe width="100%" height="315" src="{{ $video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            @empty
                <p>No videos added yet.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection
