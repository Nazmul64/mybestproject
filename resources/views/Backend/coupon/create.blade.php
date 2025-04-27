@extends('Backend.master')
@section('main-content')

<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Add New Coupon</h6>
        <a href="{{ route('coupon.index') }}" class="btn btn-outline-primary mb-3">
            <i class="fa fa-arrow-left"></i> Back to Coupon
        </a>
    </div>
    <div class="card-body">
        <form id="coupon-form" method="POST" action="{{ route('coupon.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label class="form-label">Coupon Name</label>
                <input type="text" name="coupon_name" class="form-control" placeholder="Enter a coupon name">
                @error('coupon_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Discount Percentage (%)</label>
                <input type="number" name="discount_percentage" class="form-control" placeholder="Enter discount percentage">
                @error('discount_percentage')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Coupon Validity Date</label>
                <input type="date" name="validity" class="form-control">
                @error('validity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Discount Limit</label>
                <input type="number" name="limit" class="form-control" placeholder="Enter discount usage limit">
                @error('limit')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>

@endsection
