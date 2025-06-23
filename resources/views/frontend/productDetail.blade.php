@extends('frontend.layout.app')
@section('content')
    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <!-- Main product image tab -->
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg"
                                        data-setbg="{{ asset('' . $product->image) }}">
                                    </div>
                                </a>
                            </li>

                            <!-- Additional images tabs -->
                            @if(isset($images) && is_array($images))
                                @foreach($images as $key => $image)
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tabs-image-{{ $key + 2 }}" role="tab">
                                            <div class="product__thumb__pic set-bg" data-setbg="{{ asset('' . $image) }}">
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif

                            <!-- Video tab (only if video exists) -->
                            @if($product->video)
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tabs-video" role="tab">
                                        <div class="product__thumb__pic set-bg"
                                            data-setbg="{{ asset('frontend/img/shop-details/thumb-5.png') }}">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <!-- Main product image content -->
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ asset('' . $product->image) }}" alt="{{ $product->name }}">
                                </div>
                            </div>

                            <!-- Additional images content -->
                            @if(isset($images) && is_array($images))
                                @foreach($images as $key => $image)
                                    <div class="tab-pane" id="tabs-image-{{ $key + 2 }}" role="tabpanel">
                                        <div class="product__details__pic__item">
                                            <img src="{{ asset('' . $image) }}" alt="Product Image {{ $key + 1 }}">
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <!-- Video content (only if video exists) -->
                            @if($product->video)
                                <div class="tab-pane" id="tabs-video" role="tabpanel">
                                    <div class="product__details__pic__item">
                                        <video controls style="width: 100%;">
                                            <source src="{{ asset('' . $product->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{ $product->name }}</h4>
                            <h3>${{ number_format($product->price, 2) }}</h3>
                            <p>{{ $product->short_description }}</p>

                            <div class="product__details__button">
                                <a href="#" 
                                   onclick="openWhatsApp(event)" 
                                   class="btn btn-success" 
                                   target="_blank">
                                    <i class="fa fa-whatsapp me-2 mt-1"></i> Contact on WhatsApp
                                </a>
                            </div>

                            <script>
                                function openWhatsApp(event) {
                                    event.preventDefault();
                                    const productName = "{{ $product->name }}";
                                    const productLink = window.location.href;
                                    const message = `I'm interested in this product: ${productName}\n\nProduct Link: ${productLink}`;
                                    const encodedMessage = encodeURIComponent(message);
                                    
                                    // Check if user is on mobile
                                    const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
                                    
                                    if (isMobile) {
                                        // Open WhatsApp app
                                        window.open(`https://wa.me/+46769551581?text=${encodedMessage}`, '_blank');
                                    } else {
                                        // Open WhatsApp Web
                                        window.open(`https://web.whatsapp.com/send?phone=+46769551581&text=${encodedMessage}`, '_blank');
                                    }
                                }
                            </script>

                            <div class="product__details__last__option">
                                <ul>
                                    <li><span>Categories:</span> {{ $product->category->name ?? 'N/A' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#tabs-5" role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tabs-6" role="tab">Customer
                                        Reviews(5)</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">{{ $product->long_description }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <!-- Review Form -->
                                        <div class="review-form">
                                            <h4>Write a Review</h4>
                                            <form action="{{ route('product.addReview', $product->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Your Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Your Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="rating">Rating</label> 
                                                    <select class="form-control w-100 mb-3" id="rating" name="rating" required>
                                                        <option value="">Select Rating</option>
                                                        <option value="5">5 Stars</option>
                                                        <option value="4">4 Stars</option>
                                                        <option value="3">3 Stars</option>
                                                        <option value="2">2 Stars</option>
                                                        <option value="1">1 Star</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="review">Your Review</label>
                                                    <textarea class="form-control" id="review" name="review" rows="4" required></textarea>
                                                </div>

                                                <button type="submit" class="primary-btn">Submit Review</button>
                                            </form>
                                        </div>

                                        <!-- Display Approved Reviews -->
                                        <div class="reviews-list mt-5">
                                            <h4 class="mb-4">Customer Reviews</h4>
                                            @forelse($product->reviews->where('status', 1) as $review)
                                                <div class="review-item card mb-3 shadow-sm">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <div>
                                                                <h5 class="card-title mb-0">{{ $review->name }}</h5>
                                                                <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                                                            </div>
                                                            <div class="rating">
                                                                @for($i = 1; $i <= 5; $i++)
                                                                    <i class="fa fa-star{{ $i <= $review->rating ? ' text-warning' : ' text-muted' }}"></i>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <p class="card-text">{{ $review->review }}</p>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="alert alert-info">
                                                    <i class="fa fa-info-circle me-2"></i>No reviews yet. Be the first to review this product!
                                                </div>
                                            @endforelse
                                        </div>

                                        <style>
                                            .review-item {
                                                transition: transform 0.2s;
                                            }
                                            .review-item:hover {
                                                transform: translateY(-2px);
                                            }
                                            .rating .fa-star {
                                                font-size: 1.1rem;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Products Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('' . $relatedProduct->image) }}">
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $relatedProduct->name }}</h6>
                                <a href="{{ route('product.detail', $relatedProduct->slug) }}" class="add-cart">Product Detail</a>
                                <h5>${{ number_format($relatedProduct->price, 2) }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Products Section End -->
@endsection

<style>
    .product__details__button .btn-success {
        background-color: #25D366;
        border-color: #25D366;
        padding: 12px 30px;
        font-size: 16px;
        transition: all 0.3s ease;
    }
    .product__details__button .btn-success:hover {
        background-color: #128C7E;
        border-color: #128C7E;
        transform: translateY(-2px);
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
