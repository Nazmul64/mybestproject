@extends('frontend.master')

@section('content')

<!-- ekka Cart Start -->
<div class="ec-side-cart-overlay"></div>
<div id="ec-side-cart" class="ec-side-cart">
    <div class="ec-cart-inner">

        <div class="ec-cart-top">
            <div class="ec-cart-title">
                <span class="cart_title">My Cart</span>
                <button class="ec-close">×</button>
            </div>
         @php
            $carts = allcart();
            $cartTotal = 0;
        @endphp

        <ul class="eccart-pro-items">
            @forelse ($carts as $cart)
                @php
                    $itemTotal = ($cart->product->sale_price ?? 0) * ($cart->amount ?? 0);
                    $cartTotal += $itemTotal;
                @endphp

                <li id="cart-item-{{ $cart->id }}">
                    <a href="#" class="sidekka_pro_img">
                        <img src="{{ asset('uploads/product/' . $cart->product->photo) }}" alt="product">
                    </a>
                    <div class="ec-pro-content">
                        <a href="#" class="cart_pro_title">
                            {{ $cart->product->product_name }}
                        </a>
                        <span class="cart-price">
                            ৳{{ round($cart->product->sale_price ?? 0) }} × {{ $cart->amount ?? '' }}
                        </span>
                        <a href="{{ route('remove.view') }}" class="remove remove-cart-item" data-id="{{ $cart->id }}">×</a>
                    </div>
                </li>
            @empty
                <li class="text-center p-3">আপনার কার্ট খালি</li>
            @endforelse
        </ul>

        </div>

        <div class="ec-cart-bottom">
            <div class="cart-sub-total">
                <table class="table cart-table">
                    <tbody>
                        @if(count($carts))
                        <tr>
                            <td class="text-left">Sub-Total :</td>
                            <td class="text-right"> ৳{{ round($cartTotal) }}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="cart_btn">
                <a href="{{ route('remove.view') }}" class="btn btn-primary">View Cart</a>
                <a href="checkout.html" class="btn btn-secondary">Checkout</a>
            </div>
        </div>

    </div>
</div>
<!-- ekka Cart End -->




<!-- Category Sidebar start -->
<div class="ec-side-cat-overlay"></div>
<div class="col-lg-3 category-sidebar" data-animation="fadeIn">
    <div class="cat-sidebar">
        <div class="cat-sidebar-box">
            <div class="ec-sidebar-wrap">
                <!-- Sidebar Category Block -->
                <div class="ec-sidebar-block">
                    <div class="ec-sb-title">
                        <h3 class="ec-sidebar-title">Category<button class="ec-close">×</button></h3>
                    </div>
                    <div class="ec-sb-block-content">
                        <ul>
                            <li>
                                <div class="ec-sidebar-block-item"><img src="{{ asset('frontend') }}/assets/images/icons/dress-8.png"
                                        class="svg_img" alt="drink" />Cothes</div>
                                <ul style="display: block;">
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Shirt <span
                                                    title="Available Stock">- 25</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">shorts & jeans <span
                                                    title="Available Stock">- 52</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">jacket<span
                                                    title="Available Stock">- 500</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">dress & frock <span
                                                    title="Available Stock">- 35</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="ec-sb-block-content">
                        <ul>
                            <li>
                                <div class="ec-sidebar-block-item"><img src="{{ asset('frontend') }}/assets/images/icons/shoes-8.png"
                                        class="svg_img" alt="drink" />Footwear</div>
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Sports <span
                                                    title="Available Stock">- 25</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Formal <span
                                                    title="Available Stock">- 52</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Casual <span
                                                    title="Available Stock">- 40</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">safety shoes <span
                                                    title="Available Stock">- 35</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="ec-sb-block-content">
                        <ul>
                            <li>
                                <div class="ec-sidebar-block-item"><img src="{{ asset('frontend') }}/assets/images/icons/jewelry-8.png"
                                        class="svg_img" alt="drink" />jewelry</div>
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Earrings <span
                                                    title="Available Stock">- 50</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Couple Rings <span
                                                    title="Available Stock">- 35</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Necklace <span
                                                    title="Available Stock">- 40</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="ec-sb-block-content">
                        <ul>
                            <li>
                                <div class="ec-sidebar-block-item"><img src="{{ asset('frontend') }}/assets/images/icons/perfume-8.png"
                                        class="svg_img" alt="drink" />perfume</div>
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Clothes perfume<span
                                                    title="Available Stock">- 4 pcs</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">deodorant <span
                                                    title="Available Stock">- 52 pcs</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Flower fragrance <span
                                                    title="Available Stock">- 10 pack</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a href="shop-left-sidebar-col-3.html">Air
                                                Freshener<span title="Available Stock">- 35 pack</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="ec-sb-block-content">
                        <ul>
                            <li>
                                <div class="ec-sidebar-block-item"><img src="{{ asset('frontend') }}/assets/images/icons/cosmetics-8.png"
                                        class="svg_img" alt="drink" />cosmetics</div>
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">shampoo<span
                                                    title="Available Stock"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Sunscreen<span
                                                    title="Available Stock"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a href="shop-left-sidebar-col-3.html">body
                                                wash<span title="Available Stock"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">makeup kit<span
                                                    title="Available Stock"></span></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="ec-sb-block-content">
                        <ul>
                            <li>
                                <div class="ec-sidebar-block-item"><img src="{{ asset('frontend') }}/assets/images/icons/glasses-8.png"
                                        class="svg_img" alt="drink" />glasses</div>
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Sunglasses <span
                                                    title="Available Stock">- 20</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">Lenses <span
                                                    title="Available Stock">- 52</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="ec-sb-block-content">
                        <ul>
                            <li>
                                <div class="ec-sidebar-block-item"><img src="{{ asset('frontend') }}/assets/images/icons/bag-8.png"
                                        class="svg_img" alt="drink" />bags</div>
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">shopping bag <span
                                                    title="Available Stock">- 25</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a href="shop-left-sidebar-col-3.html">Gym
                                                backpack <span title="Available Stock">- 52</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">purse <span
                                                    title="Available Stock">- 40</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a
                                                href="shop-left-sidebar-col-3.html">wallet <span
                                                    title="Available Stock">- 35</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar Category Block -->
            </div>
        </div>
        <div class="ec-sidebar-slider-cat">
            <div class="ec-sb-slider-title">Best Sellers</div>
            <div class="ec-sb-pro-sl">
                <div>
                    <div class="ec-sb-pro-sl-item">
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src="{{ asset('frontend') }}/assets/images/product-image/1.jpg" alt="product" /></a>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">baby fabric shoes</a></h5>
                            <div class="ec-pro-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                            </div>
                            <span class="ec-price">
                                <span class="old-price">$5.00</span>
                                <span class="new-price">$4.00</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ec-sb-pro-sl-item">
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src="{{ asset('frontend') }}/assets/images/product-image/2.jpg" alt="product" /></a>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Men's hoodies t-shirt</a>
                            </h5>
                            <div class="ec-pro-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star"></i>
                            </div>
                            <span class="ec-price">
                                <span class="old-price">$10.00</span>
                                <span class="new-price">$7.00</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ec-sb-pro-sl-item">
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src="{{ asset('frontend') }}/assets/images/product-image/3.jpg" alt="product" /></a>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Girls t-shirt</a></h5>
                            <div class="ec-pro-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star"></i>
                                <i class="ecicon eci-star"></i>
                            </div>
                            <span class="ec-price">
                                <span class="old-price">$5.00</span>
                                <span class="new-price">$3.00</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ec-sb-pro-sl-item">
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src="{{ asset('frontend') }}/assets/images/product-image/4.jpg" alt="product" /></a>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">woolen hat for men</a></h5>
                            <div class="ec-pro-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                            </div>
                            <span class="ec-price">
                                <span class="old-price">$15.00</span>
                                <span class="new-price">$12.00</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ec-sb-pro-sl-item">
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src="{{ asset('frontend') }}/assets/images/product-image/5.jpg" alt="product" /></a>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Womens purse</a></h5>
                            <div class="ec-pro-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star"></i>
                            </div>
                            <span class="ec-price">
                                <span class="old-price">$15.00</span>
                                <span class="new-price">$12.00</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ec-sb-pro-sl-item">
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src="{{ asset('frontend') }}/assets/images/product-image/6.jpg" alt="product" /></a>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Baby toy doctor kit</a>
                            </h5>
                            <div class="ec-pro-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star"></i>
                                <i class="ecicon eci-star"></i>
                                <i class="ecicon eci-star"></i>
                            </div>
                            <span class="ec-price">
                                <span class="old-price">$50.00</span>
                                <span class="new-price">$45.00</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ec-sb-pro-sl-item">
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src="{{ asset('frontend') }}/assets/images/product-image/7.jpg" alt="product" /></a>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">teddy bear baby toy</a>
                            </h5>
                            <div class="ec-pro-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                            </div>
                            <span class="ec-price">
                                <span class="old-price">$35.00</span>
                                <span class="new-price">$25.00</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ec-sb-pro-sl-item">
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src="{{ asset('frontend') }}/assets/images/product-image/2.jpg" alt="product" /></a>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Mens hoodies blue</a></h5>
                            <div class="ec-pro-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star"></i>
                                <i class="ecicon eci-star"></i>
                            </div>
                            <span class="ec-price">
                                <span class="old-price">$15.00</span>
                                <span class="new-price">$13.00</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Slider Start -->
<div class="sticky-header-next-sec ec-main-slider section section-space-pb">
    <div class="ec-slider swiper main-slider-nav main-slider-dot">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
                @if($slider->status == 1)
                    <div class="ec-slide-item swiper-slide">
                        <div class="slider-image-wrapper">
                            <img src="{{ asset('uploads/sliders/'.$slider->photo) }}" alt="{{ $slider->title }}" class="slider-img" />
                            <div class="slider-overlay"></div>
                            <div class="slider-caption container text-white">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-7 col-md-8 col-sm-10">
                                        <div class="ec-slide-content text-center text-md-start">
                                            <h1 class="ec-slide-title fw-bold">{{ $slider->title }}</h1>
                                            <p class="mb-3 d-none d-sm-block">{{ $slider->description }}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Navigation বাটন -->
        <div class="swiper-buttons d-none d-md-block">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>



<section id="featured-category"style="margin-top:-30px;">
<div class="container">
      @if($product->count() > 0)
          <h3 class="text-center fw-bold mb-4"><span style="margin-top:-30px;">Featured Category</span></h3>
      @endif
    <div class="category-slider">
        @foreach($category as $item)
        @if($item->status)
            <div>
                <div class="category-box text-center">
                    <img src="{{ asset('uploads/category') }}/{{ $item->photo }}" alt="{{ $item->category_name }}" class="img-fluid">
                    <p class="fw-bold mt-2 mb-0">{{ $item->category_name }}</p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
</section>
<section class="section ec-new-product section-space-p" id="slider-one">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                   @if($product->count() > 0)
                    <h3 class="fw-bold mb-4 px-4 py-2 text-white" style="background: #0f134f; float: left; border-radius: 25px; display: inline-block;">
                        <span>বিশেষ</span> অফার 🔥!
                    </h3>
                   @endif

                </h3>
            </div>
        </div>

        <div class="slider-one">
            @foreach($product as $item)
            @if($item->is_advertise)
                <div class="ec-product-content px-2">
                    <div class="ec-product-inner border shadow-sm rounded h-100 d-flex flex-column">
                        <div class="ec-pro-image-outer">
                            <div class="ec-pro-image position-relative">
                                <a href="{{ route('productdetails', $item->product_slug) }}" class="image d-block">
                                    <img src="{{ asset('uploads/product') }}/{{ $item->photo ?? '' }}" class="main-image img-fluid w-100" alt="{{ $item->product_name ?? 'Product' }}">
                                    <img src="{{ asset('uploads/product') }}/{{ $item->photo ?? '' }}" class="hover-image img-fluid w-100" alt="{{ $item->product_name ?? 'Product' }}">
                                </a>

                                <div class="ec-pro-actions position-absolute bottom-0 start-0 end-0 d-flex justify-content-center gap-2 p-2">
                                    <button class="btn btn-sm btn-primary"><i class="fi-rr-shopping-basket"></i> কার্ট</button>
                                    @if(whilistcheck($item->id))
                                        <a href="{{ route('whilist.remove', $item->id) }}">
                                            <i class="fa fa-heart-o" style="color:red;"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('whilist.insert', $item->id) }}" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    @endif



                                </div>
                            </div>
                        </div>

                        <!-- প্রোডাক্ট কনটেন্ট -->
                        <div class="ec-pro-content p-3 flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="ec-pro-title mb-2">
                                    <a href="{{ route('productdetails', $item->product_slug) }}" class="text-dark text-decoration-none">
                                        {{ $item->product_name ?? '' }}
                                    </a>
                                </h5>
                                <div class="ec-pro-rating mb-2 text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="ecicon eci-star{{ $i <= 4 ? ' fill' : '' }}"></i>
                                    @endfor
                                </div>
                                <div class="ec-price mb-2">
                                    <span class="old-price text-muted text-decoration-line-through">৳{{ round($item->regular_price ?? 0) }}</span>
                                    <span class="new-price fw-bold text-danger ms-2">৳{{ round($item->sale_price ?? 0) }}</span>
                                </div>
                            </div>
                            <button class="btn btn-sm w-100 mt-2" style="background: #0f134f; color: #fff; border-radius: 5px;">
                                অর্ডার করুন
                            </button>
                        </div>
                    </div>
                </div>
               @endif
            @endforeach
        </div>
    </div>
</section>



<section class="section ec-new-product section-space-p" id="arrivals">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <div class="text-center" style="background: green;">
                          @if($product->count() > 0)
                            <h3 class="fw-bold mb-4 px-4 py-2 text-white" style="background: #0f134f; float: left; border-radius: 25px; display: inline-block;">
                                <span style="color: white;font-size:18px;">প্রয়োজনীয় প্রোডাক্ট</span>
                            </h3>
                           @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($product as $item)
             @if($item->status)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4 ec-product-content" data-animation="flipInY">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image" src="{{ asset('uploads/product') }}/{{ $item->photo ?? ''}}" alt="Product" />
                                <img class="hover-image" src="{{ asset('uploads/product') }}/{{ $item->photo ?? ''}}" alt="Product" />
                            </a>
                            <span class="flags">
                                <span class="sale">Sale</span>
                            </span>
                            <div class="ec-pro-actions">
                                <button title="Add To Cart" class="add-to-cart"><i
                                        class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"> <a href="{{ route('productdetails', $item->product_slug) }}">{{ $item->product_name ?? '' }}</a>
                        </h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <span class="ec-price">
                            <span class="old-price">৳{{ round($item->regular_price ?? 0) }}</span>
                            <span class="new-price">৳{{ round($item->sale_price ?? 0) }}</span>
                        </span>
                        <button style="background: #0f134f; color: white; border-radius: 5px; padding: 10px; margin-top: 10px;">
                            অর্ডার করুন
                        </button>

                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<section class="section ec-instagram-section module section-space-p" id="insta">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Instagram Feed</h2>
                    <h2 class="ec-title">Instagram Feed</h2>
                    <p class="sub-title">Share your store with us</p>
                </div>
            </div>
        </div>
    </div>
    <div class="ec-insta-wrapper">
        <div class="ec-insta-outer">
            <div class="container" data-animation="fadeIn">
                <div class="insta-auto">
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="{{ asset('frontend') }}/assets/images/instragram-image/1.jpg"
                                    alt="insta"></a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="{{ asset('frontend') }}/assets/images/instragram-image/2.jpg"
                                    alt="insta"></a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="{{ asset('frontend') }}/assets/images/instragram-image/3.jpg"
                                    alt="insta"></a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="{{ asset('frontend') }}/assets/images/instragram-image/4.jpg"
                                    alt="insta"></a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="{{ asset('frontend') }}/assets/images/instragram-image/5.jpg"
                                    alt="insta"></a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="{{ asset('frontend') }}/assets/images/instragram-image/6.jpg"
                                    alt="insta"></a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="{{ asset('frontend') }}/assets/images/instragram-image/7.jpg"
                                    alt="insta"></a>
                        </div>
                    </div>
                    <!-- instagram item -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Ec Instagram End -->
<script>
    $(document).on('click', '.remove-cart-item', function () {
        var cartId = $(this).data('id');
        var url = "{{ url('/cart/remove') }}/" + cartId;

        if (confirm('আপনি কি নিশ্চিতভাবে এই পণ্যটি কার্ট থেকে সরাতে চান?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload(); // অথবা তুমি AJAX দিয়ে DOM থেকে আইটেম রিমুভ করতেও পারো
                    } else {
                        alert(response.message);
                    }
                }
            });
        }
    });
</script>

@endsection
