@extends('frontend.layout.app')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach($categories as $category)
                                                        <li>
                                                            <a href="{{ route('shop', array_merge(request()->except('page'), ['category' => $category->id])) }}">
                                                                {{ $category->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="{{ route('shop', array_merge(request()->except(['page', 'price_range']), ['price_range' => '0-50'])) }}">$0.00 - $50.00</a></li>
                                                    <li><a href="{{ route('shop', array_merge(request()->except(['page', 'price_range']), ['price_range' => '50-100'])) }}">$50.00 - $100.00</a></li>
                                                    <li><a href="{{ route('shop', array_merge(request()->except(['page', 'price_range']), ['price_range' => '100-150'])) }}">$100.00 - $150.00</a></li>
                                                    <li><a href="{{ route('shop', array_merge(request()->except(['page', 'price_range']), ['price_range' => '150-200'])) }}">$150.00 - $200.00</a></li>
                                                    <li><a href="{{ route('shop', array_merge(request()->except(['page', 'price_range']), ['price_range' => '200-250'])) }}">$200.00 - $250.00</a></li>
                                                    <li><a href="{{ route('shop', array_merge(request()->except(['page', 'price_range']), ['price_range' => '250+'])) }}">$250.00+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>
                                        Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} results
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <form method="GET" action="{{ route('shop') }}">
                                        @foreach(request()->except('sort') as $key => $value)
                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                        @endforeach
                                        <p>Sort by Price:</p>
                                        <select name="sort" onchange="this.form.submit()">
                                            <option value="">Default</option>
                                            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Low To High</option>
                                            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>High To Low</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('' . $product->image) }}">
                                    </div>
                                    <div class="product__item__text">
                                        <h6>{{ $product->name }}</h6>
                                        <a href="{{ route('product.detail', $product->slug) }}" class="add-cart">Product Detail</a>
                                        <h5>${{ number_format($product->price, 2) }}</h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p>No products found.</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                {{ $products->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection