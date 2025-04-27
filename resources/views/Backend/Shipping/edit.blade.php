@extends('Backend.master')
@section('main-content')

<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Update Shipping Method</h6>
        <a href="{{ route('shipping.index') }}" class="btn btn-outline-primary mb-3">
            <i class="fa fa-arrow-left"></i> Back to Shipping
        </a>
    </div>

    <div class="card-body">
        <form id="shipping-form" method="POST" action="{{ route('shipping.update', $shipping->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Shipping Type -->
            <div class="form-group mb-3">
                <label class="form-label">Enter Shipping Type</label>
                <input type="text" name="type" id="type" class="form-control" placeholder="Enter Shipping Type" value="{{ old('type', $shipping->type) }}">
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Shipping Cost -->
            <div class="form-group mb-3">
                <label class="form-label">Enter Shipping Price</label>
                <input type="text" name="shipping_cost" id="shipping_cost" class="form-control" placeholder="Enter Shipping Price" value="{{ old('shipping_cost', $shipping->shipping_cost) }}">
                @error('shipping_cost')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Shipping Status -->
            <div class="form-group mb-3">
                <label class="form-label">Select Shipping Status</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active', $shipping->is_active) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active', $shipping->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('is_active')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>

@endsection
