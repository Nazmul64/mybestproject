@extends('frontend.master')
@section('content')
<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Single Products</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="ec-breadcrumb-item active">Products</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Sart Single product -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-pro-rightside ec-common-rightside col-lg-9 order-lg-last col-md-12 order-md-first">

                <!-- Single product content Start -->
                <div class="single-pro-block">
                    <div class="single-pro-inner">
                        <div class="row">
                            <div class="single-pro-img">
                                <div class="single-product-scroll">
                                    <!-- Main Image Slider -->
                                    <div class="single-product-cover">
                                        @foreach(json_decode($product->gallery_image ?? '[]') as $key => $photogallery)
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="{{ asset('uploads/product/' . $photogallery) }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Thumbnail Navigation -->
                                    <div class="single-nav-thumb">
                                        @foreach(json_decode($product->gallery_image ?? '[]') as $key => $photogallery)
                                            <div class="single-slide">
                                                <img class="img-responsive" src="{{ asset('uploads/product/' . $photogallery) }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="single-pro-desc">
                                <div class="single-pro-content">
                                    <h5 class="ec-single-title">{{ $product->product_name ?? '' }}</h5>
                                    <div class="ec-single-rating-wrap">
                                        <div class="ec-single-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star-o"></i>
                                        </div>

                                    </div>
                                    <div class="ec-single-price-stoke">
                                        <div class="ec-single-price">
                                            <span class="ec-price">
                                                <span class="new-price">৳ {{ round($product->sale_price ?? 0) }}</span>
                                            </span>
                                        </div>
                                    </div>
                                @php
                                    $stock = $product->stock ?? 0;
                                @endphp
                                
                                <div class="ec-single-price-stoke my-3">
                                    <div class="ec-single-price">
                                        <span class="ec-price">
                                            <span class="badge px-3 py-2 rounded-pill" style="font-size: 16px; background-color: {{ $stock > 0 ? '#198754' : '#dc3545' }}; color: white;">
                                                {{ $stock > 0 ? '✅ Available Stock: ' . $stock : '❌ Out of Stock' }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                

                                    <!-- Color Selector -->
                                    <div class="ec-pro-variation-inner">
                                        <label class="variation-label">Select Colors</label>
                                        <div class="custom-multiselect-wrapper" id="colorSelector{{ $product->id }}">
                                            @foreach(json_decode($product->color_text) as $color)
                                                <div class="custom-option color-option" data-value="{{ $color }}" data-id="{{ $product->id }}" style="background: {{ $color }}; color: white; padding: 5px; margin: 3px; border-radius: 5px;">
                                                    {{ $color }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Size Selector -->
                                    <div class="ec-pro-variation-inner mb-2">
                                        <label class="variation-label">Select Sizes</label>
                                        <div class="custom-multiselect-wrapper" id="sizeSelector{{ $product->id }}">
                                            @foreach(json_decode($product->size_description) as $size)
                                                <div class="custom-option size-option" data-value="{{ $size }}" data-id="{{ $product->id }}" style="border: 1px solid #ccc; padding: 5px; margin: 3px; border-radius: 5px;">
                                                    {{ $size }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Alert -->
                                    <div id="checkResponse{{ $product->id }}" class="text-success mt-2"></div>
                                    <!-- Quantity & Buttons -->

                                    <div class="ec-single-qty">
                                        <form id="addToCartForm{{ $product->id }}">
                                            @csrf
                                            <input type="hidden" name="product_color" class="product_color{{ $product->id }}">
                                            <input type="hidden" name="product_size" class="product_size{{ $product->id }}">
                                            <div class="qty-plus-minus">
                                                <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                            </div>

                                            <div style="display: flex; gap: 10px; align-items: center; margin-top: 10px;">
                                                <button type="submit" class="btn btn-primary" style="background:#0F134F;">অর্ডার করুন</button>
                                                <button type="button" onclick="submitWishlist({{ $product->id }})" class="btn btn-primary" style="background:#0F134F;">
                                                    <i id="wishlist-icon-{{ $product->id }}" class="fa fa-heart {{ $whilist_status ? 'text-danger' : '' }}"></i>
                                                </button>
                                            </div>
                                        </form>

                                    </div>


                                        <!-- Shipping Options -->
                                        <div class="delivery-option">
                                            @foreach ($shipping as $item)
                                                <div class="option-row">
                                                    <span>{{ $item->type ?? '' }}</span>
                                                    <span class="price"><span style="font-size:20px;">৳</span>{{ $item->shipping_cost ?? ''}}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single product content End -->
                <!-- Single product tab start -->
                <div class="ec-single-pro-tab">
                    <div class="ec-single-pro-tab-wrapper">
                        <div class="ec-single-pro-tab-nav">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#ec-spt-nav-details" role="tab" aria-controls="ec-spt-nav-details" aria-selected="true">Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info"
                                         role="tab" aria-controls="ec-spt-nav-info" aria-selected="false">More Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review"
                                         role="tab" aria-controls="ec-spt-nav-review" aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content  ec-single-pro-tab-content">
                            <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                <div class="ec-single-pro-tab-desc">
                                    <p>{!! htmlspecialchars_decode($product->product_description) !!}</p>
                                </div>
                            </div>
                            <div id="ec-spt-nav-info" class="tab-pane fade">
                                <div class="ec-single-pro-tab-moreinfo">
                                    <p>{!! htmlspecialchars_decode($product->product_details_description) !!}</p>

                                </div>
                            </div>

                            <div id="ec-spt-nav-review" class="tab-pane fade">
                                <div class="row">
                                    <div class="ec-t-review-wrapper">
                                        <div class="ec-t-review-item">
                                            <div class="ec-t-review-avtar">
                                                <img src="{{ asset('frontend') }}/assets/images/review-image/1.jpg" alt="" />
                                            </div>
                                            <div class="ec-t-review-content">
                                                <div class="ec-t-review-top">
                                                    <div class="ec-t-review-name">Jeny Doe</div>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-t-review-bottom">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-t-review-item">
                                            <div class="ec-t-review-avtar">
                                                <img src="{{ asset('frontend') }}/assets/images/review-image/2.jpg" alt="" />
                                            </div>
                                            <div class="ec-t-review-content">
                                                <div class="ec-t-review-top">
                                                    <div class="ec-t-review-name">Linda Morgus</div>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-t-review-bottom">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="ec-ratting-content">
                                        <h3>Add a Review</h3>
                                        <div class="ec-ratting-form">
                                            <form action="#">
                                                <div class="ec-ratting-star">
                                                    <span>Your rating:</span>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-ratting-input">
                                                    <input name="your-name" placeholder="Name" type="text" />
                                                </div>
                                                <div class="ec-ratting-input">
                                                    <input name="your-email" placeholder="Email*" type="email"
                                                        required />
                                                </div>
                                                <div class="ec-ratting-input form-submit">
                                                    <textarea name="your-commemt"
                                                        placeholder="Enter Your Comment"></textarea>
                                                    <button class="btn btn-primary" type="submit"
                                                        value="Submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details description area end -->
            </div>
        </div>
    </div>
</section>
<!-- End Single product -->

<!-- Related Product Start -->
<section class="section ec-releted-product section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Related products</h2>
                    <h2 class="ec-title">Related products</h2>
                    <p class="sub-title">Browse The Collection of Top Products</p>
                </div>
            </div>
        </div>
        <div class="row margin-minus-b-30">
            <!-- Related Product Content -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image"
                                    src="{{ asset('frontend') }}/assets/images/product-image/6_1.jpg" alt="Product" />
                                <img class="hover-image"
                                    src="assets/images/product-image/6_2.jpg" alt="Product" />
                            </a>
                            <span class="percentage">20%</span>
                            <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare" title="Compare"><i
                                        class="fi fi-rr-arrows-repeat"></i></a>
                                <button title="Add To Cart" class="add-to-cart"><i
                                        class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Round Neck T-Shirt</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                        <span class="ec-price">
                            <span class="old-price">$27.00</span>
                            <span class="new-price">$22.00</span>
                        </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                            data-src="{{ asset('frontend') }}/assets/images/product-image/6_1.jpg"
                                            data-src-hover="{{ asset('frontend') }}/assets/images/product-image/6_1.jpg"
                                            data-tooltip="Gray"><span
                                                style="background-color:#e8c2ff;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{ asset('frontend') }}/assets/images/product-image/6_2.jpg"
                                            data-src-hover="{{ asset('frontend') }}/assets/images/product-image/6_2.jpg"
                                            data-tooltip="Orange"><span
                                                style="background-color:#9cfdd5;"></span></a></li>
                                </ul>
                            </div>
                            <div class="ec-pro-size">
                                <span class="ec-pro-opt-label">Size</span>
                                <ul class="ec-opt-size">
                                    <li class="active"><a href="#" class="ec-opt-sz"
                                            data-old="$25.00" data-new="$20.00"
                                            data-tooltip="Small">S</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                            data-new="$22.00" data-tooltip="Medium">M</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                            data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image"
                                    src="{{ asset('frontend') }}/assets/images/product-image/7_1.jpg" alt="Product" />
                                <img class="hover-image"
                                    src="{{ asset('frontend') }}/assets/images/product-image/7_2.jpg" alt="Product" />
                            </a>
                            <span class="percentage">20%</span>
                            <span class="flags">
                                <span class="sale">Sale</span>
                            </span>
                            <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare" title="Compare"><i
                                        class="fi fi-rr-arrows-repeat"></i></a>
                                <button title="Add To Cart" class="add-to-cart"><i
                                        class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Full Sleeve Shirt</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                        <span class="ec-price">
                            <span class="old-price">$12.00</span>
                            <span class="new-price">$10.00</span>
                        </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                            data-src="{{ asset('frontend') }}/assets/images/product-image/7_1.jpg"
                                            data-src-hover="{{ asset('frontend') }}/assets/images/product-image/7_1.jpg"
                                            data-tooltip="Gray"><span
                                                style="background-color:#01f1f1;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{ asset('frontend') }}/assets/images/product-image/7_2.jpg"
                                            data-src-hover="{{ asset('frontend') }}/assets/images/product-image/7_2.jpg"
                                            data-tooltip="Orange"><span
                                                style="background-color:#b89df8;"></span></a></li>
                                </ul>
                            </div>
                            <div class="ec-pro-size">
                                <span class="ec-pro-opt-label">Size</span>
                                <ul class="ec-opt-size">
                                    <li class="active"><a href="#" class="ec-opt-sz"
                                            data-old="$12.00" data-new="$10.00"
                                            data-tooltip="Small">S</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$15.00"
                                            data-new="$12.00" data-tooltip="Medium">M</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$20.00"
                                            data-new="$17.00" data-tooltip="Extra Large">XL</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image"
                                    src="{{ asset('frontend') }}/assets/images/product-image/1_1.jpg" alt="Product" />
                                <img class="hover-image"
                                    src="{{ asset('frontend') }}/assets/images/product-image/1_2.jpg" alt="Product" />
                            </a>
                            <span class="percentage">20%</span>
                            <span class="flags">
                                <span class="sale">Sale</span>
                            </span>
                            <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare" title="Compare"><i
                                        class="fi fi-rr-arrows-repeat"></i></a>
                                <button title="Add To Cart" class="add-to-cart"><i
                                        class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Cute Baby Toy's</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                        <span class="ec-price">
                            <span class="old-price">$40.00</span>
                            <span class="new-price">$30.00</span>
                        </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                            data-src="{{ asset('frontend') }}/assets/images/product-image/1_1.jpg"
                                            data-src-hover="{{ asset('frontend') }}/assets/images/product-image/1_1.jpg"
                                            data-tooltip="Gray"><span
                                                style="background-color:#90cdf7;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{ asset('frontend') }}/assets/images/product-image/1_2.jpg"
                                            data-src-hover="{{ asset('frontend') }}/assets/images/product-image/1_2.jpg"
                                            data-tooltip="Orange"><span
                                                style="background-color:#ff3b66;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="assets/images/product-image/1_3.jpg"
                                            data-src-hover="{{ asset('frontend') }}/assets/images/product-image/1_3.jpg"
                                            data-tooltip="Green"><span
                                                style="background-color:#ffc476;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="assets/images/product-image/1_4.jpg"
                                            data-src-hover="{{ asset('frontend') }}/assets/images/product-image/1_4.jpg"
                                            data-tooltip="Sky Blue"><span
                                                style="background-color:#1af0ba;"></span></a></li>
                                </ul>
                            </div>
                            <div class="ec-pro-size">
                                <span class="ec-pro-opt-label">Size</span>
                                <ul class="ec-opt-size">
                                    <li class="active"><a href="#" class="ec-opt-sz"
                                            data-old="$40.00" data-new="$30.00"
                                            data-tooltip="Small">S</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$50.00"
                                            data-new="$40.00" data-tooltip="Medium">M</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image"
                                    src="{{ asset('frontend') }}/assets/images/product-image/2_1.jpg" alt="Product" />
                                <img class="hover-image"
                                    src="{{ asset('frontend') }}/assets/images/product-image/2_2.jpg" alt="Product" />
                            </a>
                            <span class="percentage">20%</span>
                            <span class="flags">
                                <span class="new">New</span>
                            </span>
                            <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare" title="Compare"><i
                                        class="fi fi-rr-arrows-repeat"></i></a>
                                <button title="Add To Cart" class="add-to-cart"><i
                                        class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Jumbo Carry Bag</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                        <span class="ec-price">
                            <span class="old-price">$50.00</span>
                            <span class="new-price">$40.00</span>
                        </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                            data-src="{{ asset('frontend') }}/assets/images/product-image/2_1.jpg"
                                            data-src-hover="{{ asset('frontend') }}/assets/images/product-image/2_2.jpg"
                                            data-tooltip="Gray"><span
                                                style="background-color:#fdbf04;"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related Product end -->
 <script>
                                        function initMultiSelect(wrapperId) {
                                            const wrapper = document.getElementById(wrapperId);
                                            wrapper.querySelectorAll('.custom-option').forEach(option => {
                                                option.addEventListener('click', () => {
                                                    const allOptions = wrapper.querySelectorAll('.custom-option');
                                                    allOptions.forEach(opt => opt.classList.remove('selected'));
                                                    option.classList.add('selected');
                                                });
                                            });
                                        }

                                        document.addEventListener('DOMContentLoaded', function () {
                                            const productId = {{ $product->id }};
                                            initMultiSelect('colorSelector' + productId);
                                            initMultiSelect('sizeSelector' + productId);
                                        });

                                        function submitWishlist(productId) {
                                            const icon = document.getElementById(`wishlist-icon-${productId}`);
                                            const isActive = icon.classList.contains('text-danger');

                                            // যদি রিমুভ করতে চাই
                                            if (isActive) {
                                                fetch(`/whilsit/remove/${productId}`, {
                                                    method: 'GET',
                                                    headers: {
                                                        'X-Requested-With': 'XMLHttpRequest'
                                                    }
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.status === 'success') {
                                                        icon.classList.remove('text-danger');
                                                        toastr.success(data.message);
                                                    } else {
                                                        toastr.warning(data.message);
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);
                                                    toastr.error('কিছু সমস্যা হয়েছে!');
                                                });
                                                return;
                                            }

                                            // অ্যাড করার সময় color ও size নির্বাচন চেক করবো
                                            const colorSelector = document.getElementById('colorSelector' + productId);
                                            const sizeSelector = document.getElementById('sizeSelector' + productId);

                                            const selectedColor = colorSelector.querySelector('.custom-option.selected');
                                            const selectedSize = sizeSelector.querySelector('.custom-option.selected');

                                            if (!selectedColor) {
                                                toastr.warning('অনুগ্রহ করে একটি কালার নির্বাচন করুন।');
                                                return;
                                            }

                                            if (!selectedSize) {
                                                toastr.warning('অনুগ্রহ করে একটি সাইজ নির্বাচন করুন।');
                                                return;
                                            }

                                            $.ajax({
                                                url: "{{ url('whilist/insert') }}/" + productId,
                                                method: 'POST',
                                                data: {
                                                    _token: '{{ csrf_token() }}',
                                                    color: selectedColor.dataset.value,
                                                    size: selectedSize.dataset.value
                                                },
                                                success: function (response) {
                                                    if (response.status === 'success') {
                                                        icon.classList.add('text-danger');
                                                        toastr.success(response.message);
                                                    } else if (response.status === 'warning') {
                                                        toastr.warning(response.message);
                                                    } else {
                                                        toastr.error(response.message);
                                                    }
                                                },
                                                error: function () {
                                                    toastr.error('সার্ভারে সমস্যা হয়েছে।');
                                                }
                                            });
                                        }
                                    </script>
                                    <script>
                                        $(document).ready(function () {

                                            // Color select
                                            $('.color-option').click(function () {
                                                let productId = $(this).data('id');
                                                let selectedColor = $(this).data('value');
                                                $('.product_color' + productId).val(selectedColor);
                                                $('#colorSelector' + productId + ' .color-option').removeClass('selected').css('border', '1px solid #ccc');
                                                $(this).addClass('selected').css('border', '2px solid #000');
                                            });

                                            // Size select
                                            $('.size-option').click(function () {
                                                let productId = $(this).data('id');
                                                let selectedSize = $(this).data('value');
                                                $('.product_size' + productId).val(selectedSize);
                                                $('#sizeSelector' + productId + ' .size-option').removeClass('selected').css('border', '1px solid #ccc');
                                                $(this).addClass('selected').css('border', '2px solid #000');
                                            });

                                            // AJAX Form Submit
                                            $('form[id^="addToCartForm"]').submit(function (e) {
                                                e.preventDefault();

                                                let form = $(this);
                                                let productId = form.attr('id').replace('addToCartForm', '');
                                                let color = form.find('.product_color' + productId).val();
                                                let size = form.find('.product_size' + productId).val();
                                                let qty = form.find('input[name="ec_qtybtn"]').val();
                                                let token = form.find('input[name="_token"]').val();

                                                if (!color) {
                                                    toastr.error('অনুগ্রহ করে একটি কালার সিলেক্ট করুন');
                                                    return;
                                                }

                                                if (!size) {
                                                    toastr.error('অনুগ্রহ করে একটি সাইজ সিলেক্ট করুন');
                                                    return;
                                                }

                                                $.ajax({
                                                    url: '/addto/cart/' + productId,
                                                    method: 'POST',
                                                    data: {
                                                        _token: token,
                                                        product_color: color,
                                                        product_size: size,
                                                        ec_qtybtn: qty
                                                    },
                                                    success: function (response) {
                                                        if (response.status === 'success') {
                                                            toastr.success(response.message);
                                                            // optionally: update cart UI
                                                        } else if (response.status === 'warning') {
                                                            toastr.warning(response.message);
                                                        } else {
                                                            toastr.error(response.message);
                                                        }
                                                    },
                                                    error: function (xhr) {
                                                        if (xhr.status === 422) {
                                                            let errors = xhr.responseJSON.errors;
                                                            $.each(errors, function (key, value) {
                                                                toastr.error(value[0]);
                                                            });
                                                        } else {
                                                            toastr.error('কার্টে যোগ করতে ব্যর্থ হয়েছে!');
                                                        }
                                                    }
                                                });
                                            });
                                        });
                                        </script>

@endsection
