@extends('Backend.master')
@section('main-content')

<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Edit Subcategory</h6>
        <a href="{{ route('subcategory.index') }}" class="btn btn-outline-primary mb-3">
            <i class="fa fa-arrow-left"></i> Back to Subcategory
        </a>
    </div>
    <div class="card-body">
        <form id="category-form" method="POST" action="{{ route('subcategory.update',$subCategory->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <!-- Category Name -->
            <div class="form-group mb-3">
                <label class="form-label">Enter a SubCategory Name</label>
                <input type="text" name="subcategory_name" id="subcategory_name" class="form-control" placeholder="Enter a SubCategory Name"value="{{ old('subcategory_name',$subCategory->subcategory_name) }}">
                @error('subcategory_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category Slug (auto-generated) -->
            <div class="form-group mb-3">
                <label class="form-label">SubCategory Slug</label>
                <input type="text" name="subcategory_slug" id="subcategory_slug" class="form-control" placeholder="Auto-generated slug"value="{{ old('subcategory_slug',$subCategory->subcategory_slug) }}" >
                @error('subcategory_slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Old SubCategory Photo</label><br>
                <img src="{{ asset('uploads/subcategory/' . $subCategory->sub_photo) }}" alt="Subcategory Photo" width="50">
                @error('sub_photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Photo Upload -->
            <div class="form-group mb-3">
                <label class="form-label">Upload SubCategory Photo</label>
                <input type="file" name="new_sub_photo" class="form-control">
                @error('new_sub_photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Choose Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ isset($subcategory) && $category->id == $subcategory->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status Dropdown -->
            <div class="form-group mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Progress bar -->
            <div id="progress-container" class="mt-3" style="display: none;">
                <div class="progress">
                    <div id="upload-progress" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;">0%</div>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>

<!-- Slug Auto-generate Script -->
<script>
    document.getElementById('subcategory_name').addEventListener('input', function () {
        let name = this.value;

        // Convert to slug
        let slug = name.toLowerCase()
                      .replace(/[^a-z0-9\s-]/g, '')    // Remove special characters
                      .replace(/\s+/g, '-')            // Replace spaces with dashes
                      .replace(/-+/g, '-')             // Replace multiple dashes with one
                      .trim();

        document.getElementById('subcategory_slug').value = slug;
    });
</script>

@endsection
