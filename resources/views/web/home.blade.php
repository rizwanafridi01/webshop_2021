
@extends('layouts.layout-web')
@section('content')



<div class="slider-area">
    <div class="container-fluid p-0">
        <div class="main-slider-active-1 owl-carousel slider-nav-position-2 slider-nav-style-2">
            <div class="single-main-slider slider-animated-2 bg-img slider-height-2" style="background-image:url({{ asset('web_assets/images/slider/slider01.jpg') }});">
                <div class="row g-0">
                    <div class="col-12">
                        <div class="main-slider-content-2 text-center">
                            <h1 class="animated">Daisy Marc Jecobs</h1>
                            <p class="animated">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>
                            <div class="btn-style-3 btn-hover-2">
                                <a class="animated bs3-white-text bs3-yellow-bg bs3-ptb bs3-ptb bs3-border-radius ptb-2-white-hover" href="product-details.html">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-main-slider slider-animated-2 bg-img slider-height-2" style="background-image:url({{ asset('web_assets/images/slider/slider02.jpg') }});">
                <div class="row g-0">
                    <div class="col-12">
                        <div class="main-slider-content-2 text-center">
                            <h1 class="animated">Vestibulum ante ipsum primis</h1>
                            <p class="animated">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>
                            <div class="btn-style-3 btn-hover-2">
                                <a class="animated bs3-white-text bs3-yellow-bg bs3-ptb bs3-ptb bs3-border-radius ptb-2-white-hover" href="product-details.html">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-area pt-50 pb-85">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="banner-wrap banner-zoom mb-30">
                    <div class="banner-img">
                        <a href="product-details.html"><img src="{{ asset('web_assets/images/banner/banner01.jpg') }}" alt="banner"></a>
                    </div>
                    <div class="banner-content-1 banner-position-1">
                        <h5>Gaming Headset for PS4</h5>
                        <h2 class="yellow">Sale Off 30%</h2>
                        <span>only Rs 138.00</span>
                        <div class="btn-style-3 btn-hover-2">
                            <a class="animated bs3-white-text bs3-yellow-bg bs3-ptb-2 bs3-border-radius ptb-2-white-hover" href="product-details.html">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="banner-wrap banner-zoom mb-30">
                    <div class="banner-img">
                        <a href="product-details.html"><img src="{{ asset('web_assets/images/banner/banner03.jpg') }}" alt="banner"></a>
                        <div class="banner-badge">
                            <span>-25%</span>
                        </div>
                    </div>
                    <div class="banner-content-2 banner-position-2">
                        <h2><a style="color:wheat" href="#">New Orginal HtBook Air</a></h2>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-12 col-md-12">
                <div class="banner-wrap banner-zoom mb-30">
                    <div class="banner-img">
                        <a href="product-details.html"><img src="assets/images/banner/banner-4.jpg" alt="banner"></a>
                    </div>
                    <div class="banner-content-1 banner-position-1">
                        <h5>HT COOLPIX B500 Digital Camera</h5>
                        <h2 class="lightblue">Off 20%</h2>
                        <span>only $138.00</span>
                        <div class="btn-style-3 btn-hover-2">
                            <a class="animated bs3-white-text bs3-yellow-bg bs3-ptb-2 bs3-border-radius ptb-2-white-hover" href="product-details.html">Shop now</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="product-area pb-115">
    <div class="container">
        <div class="section-title-2 text-center mb-30">
            <h2>New Products</h2>
        </div>
    </div>
    <div class="section-padding-1">
        <div class="container-fluid">
            <div class="row">
                @if(!empty($products))
                @foreach($products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-wrap mb-55">
                            <div class="product-img pro-theme-color-border product-border mb-25">
                                <a href="#">
                                    @if (!empty($product->thumbnail))
                                    <img style="height: 400px" src="{{ asset('files/'.$product->thumbnail) }}" alt="{{ $product->name }}">
                                    @else
                                        <img style="height: 400px" src="{{ asset('files/'.$product->thumbnail) }}" alt="$product->thumbnail">
                                    @endif
                                </a>
                                <span class="badge-green badge-right-20 badge-top-20 badge-ptb-1">NEW</span>
                                <div class="product-action product-action-position-1 pro-action-theme-color">
                                    <a title="Add to Cart" href="{{ route('add.to.cart', $product->id) }}"><i class="fa fa-cart-arrow-down"></i></a>
                                    <a data-bs-toggle="modal" class="product_info" data-bs-target="#exampleModal" href="#"><i class="fa fa-search-plus"></i></a>
                                    <a title="Add to Wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                    <a title="Add to Compare" href="#"><i class="fa fa-compress"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="#">{!! $product->excerpt !!}</a></h4>
                                <div class="product-price">
                                    <span class="new-price">AED {{ $product->currentAmount }}</span>
                                    @if($product->discount != 0)
                                        &nbsp; &nbsp; &nbsp;<span class="old-price">AED {{ $product->amount }}</span>
                                    @endif
                                </div>

                                    <input type="text" id="product_id" class="product_id" name="product_id" value="{{ $product->id }}">
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif



                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-wrap mb-55">
                        <div class="product-img pro-theme-color-border product-border mb-25">
                            <a href="product-details.html">
                                <img  src="{{ asset('web_assets/images/product/p5.jpg') }}" alt="">
                            </a>
                            <div class="product-action product-action-position-1 pro-action-theme-color">
                                <a title="Add to Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-search-plus"></i></a>
                                <a title="Add to Wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                <a title="Add to Compare" href="#"><i class="fa fa-compress"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">iPhone 11 Case, Heavy Duty [Military Grade] </a></h4>
                            <div class="product-price">
                                <span class="new-price">Rs 20.99</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-wrap mb-55">
                        <div class="product-img pro-theme-color-border product-border mb-25">
                            <a href="product-details.html">
                                <img src="{{ asset('web_assets/images/product/p5.jpg') }}" alt="">
                            </a>
                            <span class="badge-theme-color badge-right-20 badge-top-20 badge-ptb-1">-25%</span>
                            <div class="product-action product-action-position-1 pro-action-theme-color">
                                <a title="Add to Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-search-plus"></i></a>
                                <a title="Add to Wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                <a title="Add to Compare" href="#"><i class="fa fa-compress"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Libratone Track Air+ True Wireless Active Noise</a></h4>
                            <div class="product-price">
                                <span class="old-price">Rs 59.99</span>
                                <span class="new-price">Rs 35.99</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-wrap mb-55">
                        <div class="product-img pro-theme-color-border product-border mb-25">
                            <a href="product-details.html">
                                <img src="{{ asset('web_assets/images/product/p6.jpg') }}" alt="">
                            </a>
                            <div class="product-action product-action-position-1 pro-action-theme-color">
                                <a title="Add to Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-search-plus"></i></a>
                                <a title="Add to Wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                <a title="Add to Compare" href="#"><i class="fa fa-compress"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Acer Aspire C24-865-UA91 AIO Desktop</a></h4>
                            <div class="product-price">
                                <span class="new-price">Rs 50.99</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-wrap mb-55">
                        <div class="product-img pro-theme-color-border product-border mb-25">
                            <a href="product-details.html">
                                <img src="{{ asset('web_assets/images/product/p7.jpg') }}" alt="">
                            </a>
                            <div class="product-action product-action-position-1 pro-action-theme-color">
                                <a title="Add to Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-search-plus"></i></a>
                                <a title="Add to Wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                <a title="Add to Compare" href="#"><i class="fa fa-compress"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">iBUYPOWER Gaming PC Computer Desktop</a></h4>
                            <div class="product-price">
                                <span class="new-price">Rs 60.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-wrap mb-55">
                        <div class="product-img pro-theme-color-border product-border mb-25">
                            <a href="product-details.html">
                                <img src="{{ asset('web_assets/images/product/p8.jpg') }}" alt="">
                            </a>
                            <span class="badge-theme-color badge-right-20 badge-top-20 badge-ptb-1">-30%</span>
                            <div class="product-action product-action-position-1 pro-action-theme-color">
                                <a title="Add to Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-search-plus"></i></a>
                                <a title="Add to Wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                <a title="Add to Compare" href="#"><i class="fa fa-compress"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Andoer Gimbal 3-Axis Handheld Stabilizer</a></h4>
                            <div class="product-price">
                                <span class="old-price">Rs 70.99</span>
                                <span class="new-price">Rs 66.99</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-wrap mb-55">
                        <div class="product-img pro-theme-color-border product-border mb-25">
                            <a href="product-details.html">
                                <img src="{{ asset('web_assets/images/product/p9.jpg') }}" alt="">
                            </a>
                            <div class="product-action product-action-position-1 pro-action-theme-color">
                                <a title="Add to Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-search-plus"></i></a>
                                <a title="Add to Wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                <a title="Add to Compare" href="#"><i class="fa fa-compress"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Acer Aspire TC-885-UA92 Desktop</a></h4>
                            <div class="product-price">
                                <span class="new-price">Rs 90.99</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-wrap mb-55">
                        <div class="product-img pro-theme-color-border product-border mb-25">
                            <a href="product-details.html">
                                <img src="{{ asset('web_assets/images/product/p11.jpg') }}" alt="">
                            </a>
                            <div class="product-action product-action-position-1 pro-action-theme-color">
                                <a title="Add to Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-search-plus"></i></a>
                                <a title="Add to Wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                <a title="Add to Compare" href="#"><i class="fa fa-compress"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Polaroid ZIP Wireless Mobile Photo Mini Printer</a></h4>
                            <div class="product-price">
                                <span class="new-price">Rs 60.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="load-btn-style-1 text-center">
                <a href="shop-fullwide.html">
                    View more products
                </a>
            </div>
        </div>
    </div>
</div>

<div class="deal-area padding-55-row-col pt-90 bg-blue">
    <div class="container">
        <div class="bg-white deal-ptb deal-ntv-mrg">
            <div class="section-title-2 section-title-2-white text-center mb-60">
                <h2>Hot deal this week</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrap mb-35">
                        <div class="product-img  product-img-zoom pro-border-none product-border mb-15">
                            <a href="product-details.html">
                                <img src="{{ asset('web_assets/images/product/p14.png') }}" alt="">
                            </a>
                            <div class="deal-count">
                                <div class="timer-style-1">
                                    <div data-countdown="2022/01/01"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">External DVD CD Drive, Aluminum</a></h4>
                            <div class="product-price price-color-yellow">
                                <span class="old-price">Rs 70.99</span>
                                <span class="new-price">Rs 60.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrap mb-35">
                        <div class="product-img product-img-zoom pro-border-none product-border mb-15">
                            <a href="product-details.html">
                                <img src="{{ asset('web_assets/images/product/p14.png') }}" alt="">
                            </a>
                            <div class="deal-count">
                                <div class="timer-style-1">
                                    <div data-countdown="2022/01/01"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">External DVD CD Drive, Aluminum</a></h4>
                            <div class="product-price price-color-yellow">
                                <span class="old-price">Rs 70.99</span>
                                <span class="new-price">Rs 60.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrap mb-35">
                        <div class="product-img product-img-zoom pro-border-none product-border mb-15">
                            <a href="product-details.html">
                                <img src="{{ asset('web_assets/images/product/p14.png') }}" alt="">
                            </a>
                            <div class="deal-count">
                                <div class="timer-style-1">
                                    <div data-countdown="2022/01/01"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">External DVD CD Drive, Aluminum</a></h4>
                            <div class="product-price price-color-yellow">
                                <span class="old-price">Rs 70.99</span>
                                <span class="new-price">Rs 60.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="deal-all-pro text-center">
                <a href="shop-fullwide.html">View all deal</a>
            </div>
        </div>
    </div>
</div>

<div class="featured-categories section-padding-1 pt-110 pb-120">
    <div class="container-fluid">
        <div class="section-title-2 text-center mb-60">
            <h2>Featured Categories</h2>
        </div>
        <div class="featured-categories-active owl-carousel slick-dot-style-1">
            <div class="featured-categories-wrap">
                <div class="single-featured-categories mb-25">
                    <div class="featured-categories-content">
                        <h3><a href="#">Lotram Epsum</a></h3>
                        <p>35 products from Rs 35.00</p>
                        <div class="btn-style-3 btn-hover-2">
                            <a class="animated bs3-gray-text bs3-gray-bg bs3-ptb-3 bs3-border-radius ptb-2-theme-hover font-dec" href="product-details.html">Shop now</a>
                        </div>
                    </div>
                    <div class="featured-categories-img">
                        <a href="#"><img src="{{ asset('web_assets/images/product/p17.png') }}" alt="categories"></a>
                    </div>
                </div>
            </div>

            <div class="featured-categories-wrap">
                <div class="single-featured-categories mb-25">
                    <div class="featured-categories-content">
                        <h3><a href="#">Loram Epsum</a></h3>
                        <p>35 products from Rs 35.00</p>
                        <div class="btn-style-3 btn-hover-2">
                            <a class="animated bs3-gray-text bs3-gray-bg bs3-ptb-3 bs3-border-radius ptb-2-theme-hover font-dec" href="product-details.html">Shop now</a>
                        </div>
                    </div>
                    <div class="featured-categories-img">
                        <a href="#"><img src="{{ asset('web_assets/images/product/p17.png') }}" alt="categories"></a>
                    </div>
                </div>
            </div>
            <div class="featured-categories-wrap">
                <div class="single-featured-categories mb-25">
                    <div class="featured-categories-content">
                        <h3><a href="#">Loram Epsum</a></h3>
                        <p>35 products from Rs 35.00</p>
                        <div class="btn-style-3 btn-hover-2">
                            <a class="animated bs3-gray-text bs3-gray-bg bs3-ptb-3 bs3-border-radius ptb-2-theme-hover font-dec" href="product-details.html">Shop now</a>
                        </div>
                    </div>
                    <div class="featured-categories-img">
                        <a href="#"><img src="{{ asset('web_assets/images/product/p17.png') }}" alt="categories"></a>
                    </div>
                </div>
            </div>
            <div class="featured-categories-wrap">
                <div class="single-featured-categories mb-25">
                    <div class="featured-categories-content">
                        <h3><a href="#">Loram Epsum</a></h3>
                        <p>35 products from Rs 35.00</p>
                        <div class="btn-style-3 btn-hover-2">
                            <a class="animated bs3-gray-text bs3-gray-bg bs3-ptb-3 bs3-border-radius ptb-2-theme-hover font-dec" href="product-details.html">Shop now</a>
                        </div>
                    </div>
                    <div class="featured-categories-img">
                        <a href="#"><img src="{{ asset('web_assets/images/product/p17.png') }}" alt="categories"></a>
                    </div>
                </div>
            </div>
            <div class="featured-categories-wrap">
                <div class="single-featured-categories mb-25">
                    <div class="featured-categories-content">
                        <h3><a href="#">Loram Epsum</a></h3>
                        <p>35 products from Rs 35.00</p>
                        <div class="btn-style-3 btn-hover-2">
                            <a class="animated bs3-gray-text bs3-gray-bg bs3-ptb-3 bs3-border-radius ptb-2-theme-hover font-dec" href="product-details.html">Shop now</a>
                        </div>
                    </div>
                    <div class="featured-categories-img">
                        <a href="#"><img src="{{ asset('web_assets/images/product/p17.png') }}" alt="categories"></a>
                    </div>
                </div>
            </div>
            <div class="featured-categories-wrap">
                <div class="single-featured-categories mb-25">
                    <div class="featured-categories-content">
                        <h3><a href="#">Camera & Photo</a></h3>
                        <p>35 products from $35.00</p>
                        <div class="btn-style-3 btn-hover-2">
                            <a class="animated bs3-gray-text bs3-gray-bg bs3-ptb-3 bs3-border-radius ptb-2-theme-hover font-dec" href="product-details.html">Shop now</a>
                        </div>
                    </div>
                    <div class="featured-categories-img">
                        <a href="#"><img src="{{ asset('web_assets/images/product/p17.png') }}" alt="categories"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="banner-gradient-area pt-40 pb-40">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="banner-zoom-wrap">
                    <a class="zoom-img" href="product-details.html">
                        <img alt="image" src="{{ asset('web_assets/images/product/p19.png') }}">
                        <img alt="image" src="{{ asset('web_assets/images/product/p19.png') }}">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="banner-zoom-content ml-90">
                    <h2>Lorem Ipsum is simply  <br> dummy text</h2>
                    <div class="btn-style-3 btn-hover-2">
                        <a class="animated bs3-white-text bs3-yellow-bg bs3-ptb bs3-border-radius ptb-2-white-hover" href="product-details.html">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="brand-logo-area pt-100 pb-100 section-padding-3">
    <div class="container-fluid">
        <div class="section-title-3 st-bg-white st-mrg-botton text-center">
            <h2>Clients</h2>
        </div>
        <div class="round-border-1 brand-logo-ptb">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-logo-active owl-carousel">
                        <div class="single-brand-logo">
                            <img src="{{ asset('web_assets/images/brand-logo/brand-logo-1.png') }}" alt="">
                        </div>
                        <div class="single-brand-logo">
                            <img src="{{ asset('web_assets/images/brand-logo/brand-logo-2.png') }}" alt="">
                        </div>
                        <div class="single-brand-logo">
                            <img src="{{ asset('web_assets/images/brand-logo/brand-logo-3.png') }}" alt="">
                        </div>
                        <div class="single-brand-logo">
                            <img src="{{ asset('web_assets/images/brand-logo/brand-logo-4.png') }}" alt="">
                        </div>
                        <div class="single-brand-logo">
                            <img src="{{ asset('web_assets/images/brand-logo/brand-logo-5.png') }}" alt="">
                        </div>
                        <div class="single-brand-logo">
                            <img src="{{ asset('web_assets/images/brand-logo/brand-logo-6.png') }}" alt="">
                        </div>
                        <div class="single-brand-logo">
                            <img src="{{ asset('web_assets/images/brand-logo/brand-logo-3.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class=" ti-close " aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
                <div class="row g-0">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-slider-active owl-carousel" id="product_galleries">
{{--                            <a class="img-popup" href="{{ asset('web_assets/images/product/quickview-1.jpg') }}"><img src="{{ asset('web_assets/images/product/quickview-elec-1.jpg') }}" alt=""></a>--}}
{{--                            <a class="img-popup" href="{{ asset('web_assets/images/product/quickview-2.jpg') }}"><img src="{{ asset('web_assets/images/product/quickview-elec-2.jpg') }}" alt=""></a>--}}
                        </div>
                        <!-- Thumbnail Large Image End -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-details-content quickview-content-padding">
                            <h2 class="uppercase" id="productName">JAW SHARK WOMEN T-SHIRT</h2>
                            <h3 id="productPrice">$19.99</h3>
                            <div class="product-details-peragraph" id="productExcerpt">
                                <p>Sed ligula sapien, fermentum id est eget, viverra auctor sem. Vivamus maximus enim vitae urna porta, ut euismod nibh lacinia. Pellentesque at diam sed libero tincidunt feugiat.</p>
                            </div>
                            <div class="product-details-action-wrap">
                                <div class="product-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                    </div>
                                </div>
                                <div class="product-details-cart">
                                    <a title="Add to cart" href="#">Add to cart</a>
                                </div>
                                <div class="product-details-wishlist">
                                    <a title="Add to wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="product-details-compare">
                                    <a title="Add to compare" href="#"><i class="fa fa-compress"></i></a>
                                </div>
                            </div>
                            <div class="product-details-meta">
                                <div id="product_classifications" class="row">

                                </div>
                            </div>
                            <div class="product-details-info">
                                <a href="#"><i class=" ti-location-pin "></i>Check Store availability</a>
                                <a href="#"><i class=" ti-shopping-cart "></i>Delivery and Return</a>
                                <a href="#"><i class="ti-pin"></i>Ask a Question</a>
                            </div>
                            <div class="product-details-social-wrap">
                                <span>SHARE THIS PRODUCT</span>
                                <div class="product-details-social">
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a>
                                    <a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
<script>
    $(document).ready(function (){
        $('.product_info').click(function (){
            var Id = $('#product_id').val();
            // Id = $(this).val();
            // alert(Id)
            if(Id>0){
                $.ajax({
                    url: "{{ URL('productDetails') }}/" + Id,
                    type: "get",
                    dataType: "json",
                    success: function (result) {
                        if (result !== "Failed") {
                            console.log(result);
                            //console.log(result.customer_prices[0].Rate);
                             $('#productName').text(result.name);
                             $('#productPrice').text(result.currentAmount);
                             $('#productExcerpt').text(result.excerpt);
                            $("#product_classifications").html('');
                            var product_classifications = '';
                            if (result.product_classifications.length > 0)
                            {
                                for (var i = 0; i < result.product_classifications.length; i++) {
                                    // vehicleDetails += '<option value="' + result.customer_vehicles[i].registrationNumber + '">' + result.customer_vehicles[i].registrationNumber + '</option>';
                                    // product_classifications += '<th value="' + result.product_classifications[i].id + '">'+ result.product_classifications[i].name +'</th>';
                                    product_classifications += '<div class="col-6"><span>' + result.product_classifications[i].name + ': ' + result.product_classifications[i].description + '</span></div>'
                                }
                            }
                            else {
                                product_classifications += '<span colspan="2" value="0">No Data</span>';
                            }


                            $('#product_galleries').html('');
                            var product_galleries = '';
                            if (result.product_galleries.length > 0)
                            {
                                for (var j = 0; j < result.product_galleries.length; j++) {
                                    // vehicleDetails += '<option value="' + result.customer_vehicles[i].registrationNumber + '">' + result.customer_vehicles[i].registrationNumber + '</option>';
                                    // product_classifications += '<th value="' + result.product_classifications[i].id + '">'+ result.product_classifications[i].name +'</th>';
                                    {{--product_galleries += '<a class="img-popup" href="{{ asset('web_assets/images/product/quickview-1.jpg') }}"><img src="{{ asset('files/'+ result.product_galleries[j].galleryImages +') }}" alt=""></a>'--}}
                                    {{--    product_galleries += '<a class="img-popup" href="{{ asset('web_assets/images/product/quickview-1.jpg') }}"><img src="{{ asset('files') }}/'+ result.product_galleries[j].galleryImages +'" alt=""></a>';--}}
                                        product_galleries += '<a class="img-popup" target="_blank" href="{{ asset('files') }}/'+ result.product_galleries[j].galleryImages +'"><img src="{{ asset('files') }}/'+ result.product_galleries[j].galleryImages +'" alt=""></a>'
                                }
                            }
                            else {
                                product_galleries += '<span colspan="2" value="0">No Data</span>';
                            }
                            $("#product_galleries").append(product_galleries);
                            $("#product_classifications").append(product_classifications);
                        } else {
                            alert(result);
                        }
                    },
                    error: function (errormessage) {
                        alert(errormessage);
                    }
                });
            }
        });
    });
</script>

@endsection


