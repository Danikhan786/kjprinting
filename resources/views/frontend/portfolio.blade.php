@extends('frontend.layout.app')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Portfolio</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Portfolio</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Portfolio Section Begin -->
    <section class="portfolio spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Our Portfolio</h2>
                    </div>
                </div>
            </div>

            <!-- Portfolio Filter Tabs -->
            <div class="row mb-4">
                <div class="col-lg-12">
                    <ul class="nav nav-pills justify-content-center mb-4" id="portfolioTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" 
                                    id="all-tab" 
                                    data-bs-toggle="pill" 
                                    data-bs-target="#all" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="all" 
                                    aria-selected="true">All</button>
                        </li>
                        @foreach($categories as $category)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" 
                                        id="{{ $category->name }}-tab" 
                                        data-bs-toggle="pill" 
                                        data-bs-target="#{{ $category->name }}" 
                                        type="button" 
                                        role="tab" 
                                        aria-controls="{{ $category->name }}" 
                                        aria-selected="false">{{ $category->name }}</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="portfolioTabContent">
                <!-- All Items Tab -->
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="row g-4">
                        @foreach($categories as $category)
                            @foreach($category->portfolios as $portfolio)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="portfolio__item">
                                        <div class="portfolio__item__pic">
                                            <img src="{{ asset('' . $portfolio->image_path) }}" 
                                                 alt="{{ $portfolio->title }}"
                                                 class="img-fluid">
                                            <div class="portfolio__item__text">
                                                <h5>{{ $portfolio->title }}</h5>
                                                <span>{{ $category->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>

                <!-- Category Tabs -->
                @foreach($categories as $category)
                    <div class="tab-pane fade" id="{{ $category->name }}" role="tabpanel" aria-labelledby="{{ $category->name }}-tab">
                        <div class="row g-4">
                            @foreach($category->portfolios as $portfolio)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="portfolio__item">
                                        <div class="portfolio__item__pic">
                                            <img src="{{ asset('' . $portfolio->image_path) }}" 
                                                 alt="{{ $portfolio->title }}"
                                                 class="img-fluid">
                                            <div class="portfolio__item__text">
                                                <h5>{{ $portfolio->title }}</h5>
                                                <span>{{ $category->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Portfolio Section End -->

    <style>
        .nav-pills .nav-link {
            color: #111111;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 30px;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        .nav-pills .nav-link:hover {
            background-color: #f5f5f5;
        }
        .nav-pills .nav-link.active {
            background-color: #111111;
            color: #ffffff;
        }
        .portfolio__item {
            margin-bottom: 30px;
        }
        .portfolio__item__pic {
            height: 300px;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .portfolio__item__pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .portfolio__item__pic:hover img {
            transform: scale(1.05);
        }
        .portfolio__item__pic:hover .portfolio__item__text {
            opacity: 1;
        }
        .portfolio__item__text {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: #ffffff;
            opacity: 0;
            transition: all 0.3s ease;
        }
        .portfolio__item__text h5 {
            margin-bottom: 5px;
            font-size: 18px;
        }
        .portfolio__item__text span {
            font-size: 14px;
            color: #cccccc;
        }
    </style>

    <!-- Add Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all tabs
            var triggerTabList = [].slice.call(document.querySelectorAll('#portfolioTab button'))
            triggerTabList.forEach(function(triggerEl) {
                var tabTrigger = new bootstrap.Tab(triggerEl)
                triggerEl.addEventListener('click', function(event) {
                    event.preventDefault()
                    tabTrigger.show()
                })
            })
        });
    </script>
@endsection