@extends('layouts.layout-web')
@section('content')


    <div class="breadcrumb-area breadcrumb-ptb-3">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center" style="margin-top: 130px">
                <div class="breadcrumb-title" >
                    <h3>Shop</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-area section-padding-1 pt-120 pb-120">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="shop-top-bar">
                        <div class="shop-top-bar-left">
                            <div class="shop-page-list">
                                <ul>
                                    <li>Show</li>
                                    <li class="active"><a href="#">9</a> /</li>
                                    <li><a href="#">12</a> / </li>
                                    <li><a href="#">18</a> / </li>
                                    <li><a href="#">24</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="shop-top-bar-right">
                            <div class="shop-tab nav">
                                <a href="#shop-1" data-bs-toggle="tab"><i class=" ti-view-list-alt "></i></a>
                                <a href="#shop-2" class="active" data-bs-toggle="tab"><i class=" ti-layout-grid4"></i></a>
                                <a href="#shop-3" data-bs-toggle="tab"><i class="ti-layout-grid2"></i></a>
                            </div>
                            <div class="shop-short-by ml-40">
                                <span>Default sorting <i class="fa fa-angle-down angle-down"></i></span>
                                <ul>
                                    <li class="active"><a href="#">Default sorting</a></li>
                                    <li><a href="#">Sort by popularity</a></li>
                                    <li><a href="#">Sort by average rating</a></li>
                                    <li><a href="#">Sort by latest</a></li>
                                    <li><a href="#">Sort by price: low to high</a></li>
                                    <li><a href="#">Sort by price: high to low</a></li>
                                </ul>
                            </div>
                            <div class="shop-filter ml-25">
                                <a class="shop-filter-active" href="#">Filters <i class="fa fa-angle-down angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-filter-wrapper">
                        <div class="row">
                            <!-- Product Filter -->
                            <div class="col-md-3 col-sm-6 col-xs-12 mb-20">
                                <div class="product-filter">
                                    <h5>Price</h5>
                                    <div class="price-filter">
                                        <ul>
                                            <li><a href="#">$0.00 - $20.00</a></li>
                                            <li><a href="#">$20.00 - $40.00</a></li>
                                            <li><a href="#">$30.00 - $50.00</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Filter -->
                            <div class="col-md-3 col-sm-6 col-xs-12 mb-20">
                                <div class="product-filter">
                                    <h5>Size</h5>
                                    <div class="product-size">
                                        <ul>
                                            <li><a href="#">Full Size</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">S</a></li>
                                            <li><a href="#">XL</a></li>
                                            <li><a href="#">XXL</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Filter -->
                            <div class="col-md-3 col-sm-6 col-xs-12 mb-20">
                                <div class="product-filter">
                                    <h5>Color</h5>
                                    <div class="product-color">
                                        <ul>
                                            <li><a href="#">Blue</a></li>
                                            <li><a href="#">Brown</a></li>
                                            <li><a href="#">Green</a></li>
                                            <li><a href="#"> Pink</a></li>
                                            <li><a href="#">Violet</a></li>
                                            <li><a href="#"> White</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Filter -->
                            <div class="col-md-3 col-sm-6 col-xs-12 mb-20">
                                <div class="product-filter">
                                    <h5>Brands</h5>
                                    <div class="product-brands">
                                        <ul>
                                            <li><a href="#">Airi</a></li>
                                            <li><a href="#">Draven</a></li>
                                            <li><a href="#">Mango</a></li>
                                            <li><a href="#"> Valentino</a></li>
                                            <li><a href="#">Zara </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content jump-3 pt-30">
                        <div id="shop-1" class="tab-pane padding-55-row-col">
                            <div class="shop-list-wrap mb-50">
                                @if(!empty($products))
                                    @foreach($products as $product)

                                    <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-wrap">
                                            <div class="product-img pro-theme-color-border product-border">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('files/'.$product->thumbnail) }}" alt="{{ $product->name }}">
                                                </a>
                                                <div class="shop-list-quickview">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-search-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-sm-6 col-12">
                                        <div class="shop-list-content">
                                            <h3><a href="#">{{ $product->name }}</a></h3>
                                            <div class="pro-list-price">
                                                <span>{{ $product->currentAmount }}</span>
                                            </div>
                                            <p>{!! $product->excerpt !!}</p>
                                            <div class="product-list-action">
                                                <a title="Add to Wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                                <div class="pro-list-actioncart">
                                                    <a title="Add to cart" href="#">Add to cart</a>
                                                </div>
                                                <a title="Add to Compare" href="#"><i class="fa fa-compress"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div id="shop-2" class="tab-pane active padding-55-row-col">
                            <div class="row">
                                @if(!empty($products))
                                    @foreach($products as $product)
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="product-wrap mb-55">
                                                <div class="product-img pro-theme-color-border product-border mb-25">
                                                    <a href="product-details.html">
                                                        <img src="{{ asset('files/'.$product->thumbnail) }}" alt="{{ $product->name }}">
                                                    </a>
{{--                                                    <span class="badge-green badge-right-20 badge-top-20 badge-ptb-1">NEW</span>--}}
                                                    <div class="product-action product-action-position-1 pro-action-theme-color">
                                                        <a title="Add to Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-search-plus"></i></a>
                                                        <a title="Add to Wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                                        <a title="Add to Compare" href="#"><i class="fa fa-compress"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h4><a href="product-details.html">Adapt Active Noise Cancelling Headphones</a></h4>
                                                    <div class="product-price">
                                                        <span class="new-price">$59.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div id="shop-3" class="tab-pane padding-55-row-col">
                            <div class="row">
                                @if(!empty($products))
                                    @foreach($products as $product)
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="product-wrap mb-55">
                                            <div class="product-img pro-theme-color-border product-border mb-25">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('files/'.$product->thumbnail) }}" alt="{{ $product->name }}">
                                                </a>
                                                <span class="badge-green badge-right-20 badge-top-20 badge-ptb-1">NEW</span>
                                                <div class="product-action product-action-position-1 pro-action-theme-color">
                                                    <a title="Add to Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a>
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-search-plus"></i></a>
                                                    <a title="Add to Wishlist" href="#"><i class="fa fa-heart-o"></i></a>
                                                    <a title="Add to Compare" href="#"><i class="fa fa-compress"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">Adapt Active Noise Cancelling Headphones</a></h4>
                                                <div class="product-price">
                                                    <span class="new-price">$59.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="pro-pagination-style text-center">
                            <ul>
                                <li><a class="active" href="#">01</a></li>
                                <li><a href="#">02</a></li>
                                <li><a href="#">03</a></li>
                                <li><a href="#">04</a></li>
                                <li><a href="#">05</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="shop-sidebar-style mt-15 mr-50">
                        <div class="sidebar-widget mb-60">
                            <h4 class="pro-sidebar-title">Categories </h4>
                            <div class="sidebar-widget-categories  mt-50">
                                <ul>
                                    <li class="sw-sub-wrap"><a href="#">Woman</a>
                                        <ul class="sw-sub-menu">
                                            <li><a href="#">Dresses</a></li>
                                            <li><a href="#">Jumpsuits</a></li>
                                            <li><a href="#">Shirts</a></li>
                                            <li><a href="#">T-shirts and tops</a></li>
                                            <li><a href="#">Cardigans and sweaters</a></li>
                                            <li><a href="#">Jackets</a></li>
                                            <li><a href="#">Coats</a></li>
                                            <li><a href="#">Suits</a></li>
                                            <li><a href="#">Trousers</a></li>
                                            <li><a href="#">Jeans</a></li>
                                            <li><a href="#">Shorts</a></li>
                                            <li><a href="#">Skirts</a></li>
                                            <li><a href="#">Beachwear</a></li>
                                        </ul>
                                    </li>
                                    <li class="sw-sub-wrap"><a href="#">Man</a>
                                        <ul class="sw-sub-menu">
                                            <li><a href="#">Dresses</a></li>
                                            <li><a href="#">Jumpsuits</a></li>
                                            <li><a href="#">Shirts</a></li>
                                            <li><a href="#">T-shirts and tops</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Kids</a></li>
                                    <li><a href="#">Acessories</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-65">
                            <h4 class="pro-sidebar-title">prices </h4>
                            <div class="price-filter mt-60">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="price-slider-amount">
                                        <div class="label-input">
                                            <span>Price: </span><input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                        </div>
                                        <button type="button">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-50">
                            <h4 class="pro-sidebar-title">COLOR</h4>
                            <div class="sidebar-widget-color mt-50">
                                <ul>
                                    <li><a class="black active" href="#">Black</a></li>
                                    <li><a class="blue" href="#">Blue</a></li>
                                    <li><a class="green" href="#">Green</a></li>
                                    <li><a class="orange" href="#">Orange</a></li>
                                    <li><a class="pink" href="#">Pink</a></li>
                                    <li><a class="gray" href="#">gray</a></li>
                                    <li><a class="yellow" href="#">Yellow</a></li>
                                    <li><a class="violet" href="#">Violet</a></li>
                                    <li><a class="color-more" href="#">+35 MORE</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-55">
                            <h4 class="pro-sidebar-title">Size</h4>
                            <div class="sidebar-widget-size mt-55">
                                <ul>
                                    <li><a href="#">XL</a></li>
                                    <li><a href="#">L</a></li>
                                    <li><a href="#">M</a></li>
                                    <li><a href="#">S</a></li>
                                    <li><a href="#">XS</a></li>
                                    <li><a href="#">Full Size</a></li>
                                    <li><a class="widget-more-content" href="#">+15 More</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-60">
                            <h4 class="pro-sidebar-title">BRANDS</h4>
                            <div class="sidebar-widget-brand mt-50">
                                <ul>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">MANGO</a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">ZARA</a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">HM</a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">FOREVER 21</a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">UNIQUILO</a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">SIX8</a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">VERSATILE</a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">LACOTE</a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <a class="brand-more" href="#">+35 MORE</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-60">
                            <h4 class="pro-sidebar-title">TAGS</h4>
                            <div class="sidebar-widget-tags mt-55">
                                <ul>
                                    <li><a href="#">Dress</a></li>
                                    <li><a href="#">Blazer</a></li>
                                    <li><a href="#">T-Shirt</a></li>
                                    <li><a href="#">Suit</a></li>
                                    <li><a href="#">Living Gifts</a></li>
                                    <li><a href="#">Living Gifts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="shop-sidebar-banner">
                                <a href="#"><img alt="" src="assets/images/banner/shop-ad-banner.png"></a>
                                <div class="shop-sidebar-content">
                                    <h5>sale up to</h5>
                                    <h2>50%</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
