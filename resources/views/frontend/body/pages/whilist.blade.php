@extends('frontend.master')
@section('content')

<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Wishlist</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                            <li class="ec-breadcrumb-item active">Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Wishlist Content -->
<div class="container">
    <div class="wishlist-container">
        <h3 class="wishlist-title">Your Wishlist Items</h3>
        <div class="table-responsive">
            <table class="wishlist-table">
                <thead>
                    <tr>
                        <th>IMAGE</th>
                        <th>PRODUCT NAME</th>
                        <th>UNIT PRICE</th>
                        <th>PRODUCT SIZE</th>
                        <th>PRODUCT COLOR</th>
                        <th>ADD TO CART</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($whilist  as $item)


                        <td data-label="IMAGE">
                            <img src="{{ asset('uploads/product') }}/{{ $item->product->photo }}" alt="Product Image" class="wishlist-image">
                        </td>
                        <td data-label="PRODUCT NAME">{{ $item->product->product_name }}</td>
                        <td data-label="UNIT PRICE">৳{{ round($item->product->sale_price) }}</td>
                        <td data-label="PRODUCT SIZE" ><span style="border:1px solid #0F134F; border-radius:5px;padding:5px;">{{ $item->product_size }}</span></td>
                        <td data-label="PRODUCT COLOR"><span style="border:1px solid #0F134F; border-radius:5px;padding:5px;">{{ $item->product_color }}</span></td>
                        <td data-label="ADD TO CART">
                                <a href="{{ route('wishlist.cart',$item->id) }}" class="wishlist-btn">ADD TO CART</a>
                            <a href="{{ route('whilist.remove',$item->id) }}" class="btn btn-danger" onclick="return confirm('আপনি কি নিশ্চিতভাবে মুছতে চান?')">×</a>
                        </td>
                    </tr>
                    <!-- যদি উইশলিস্ট খালি হয় -->
                    @endforeach
                    @if ($whilist->count() == 0)
                    <tr>
                        <td colspan="6" class="text-center">
                            <p style="color:red;">Your wishlist is totally empty</p>
                        </td>

                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
