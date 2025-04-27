@extends('Backend.master')
@section('main-content')

<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Edit Category</h6>
        <a href="{{ route('category.index') }}" class="btn btn-outline-primary mb-3">
            <i class="fa fa-arrow-left"></i> Back to Category
        </a>
    </div>
    <div class="card-body">
        <form id="category-form" method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- since this is an update -->

            <div class="form-group mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name"
                    value="{{ old('category_name', $category->category_name) }}">
                @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Category Slug</label>
                <input type="text" name="category_slug" id="category_slug" class="form-control" placeholder="Auto-generated slug"  value="{{ old('category_slug', $category->category_slug) }}">
                @error('category_slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Current Photo</label><br>
                <img src="{{ asset('uploads/category/' . $category->photo) }}" alt="Category Photo" width="80">
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Upload New Photo</label>
                <input type="file" name="new_photo" class="form-control">
                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>

@endsection
