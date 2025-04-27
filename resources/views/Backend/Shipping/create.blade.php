@extends('Backend.master')
@section('main-content')

<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Add New shipping</h6>
        <a href="{{ route('shipping.index') }}" class="btn btn-outline-primary mb-3">
            <i class="fa fa-arrow-left"></i> Back to shipping
        </a>
    </div>
    <div class="card-body">
        <form id="category-form" method="POST" action="{{ route('shipping.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Category Name -->
            <div class="form-group mb-3">
                <label class="form-label">Entr Shipping Type</label>
                <input type="text" name="type" id="type" class="form-control" placeholder="Entr Shipping Type">
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category Slug (auto-generated) -->
            <div class="form-group mb-3">
                <label class="form-label">Entr Shipping Price</label>
                <input type="text" name="shipping_cost" id="shipping_cost" class="form-control" placeholder="Entr Shipping Price" >
                @error('shipping_cost')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Status Dropdown -->
            <div class="form-group mb-3">
                <label class="form-label">Select Shipping Status</label>
                <select name="is_active" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('is_active')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>



@endsection
