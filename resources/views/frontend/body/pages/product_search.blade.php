@extends('frontend.master')

@section('content')
<section class="section ec-new-product section-space-p" id="slider-one">
    <div class="container">

        <div class="slider-one">
            @foreach($products as $item)
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
        @endforeach


        </div>
    </div>
</section>


@endsection
