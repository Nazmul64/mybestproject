@extends('Backend.master')
@section('main-content')

<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Add New Category</h6>
        <a href="{{ route('category.index') }}" class="btn btn-outline-primary mb-3">
            <i class="fa fa-arrow-left"></i> Back to category
        </a>
    </div>
    <div class="card-body">
        <form id="category-form" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Category Name -->
            <div class="form-group mb-3">
                <label class="form-label">Enter a Category Name</label>
                <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Enter a Category Name">
                @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category Slug (auto-generated) -->
            <div class="form-group mb-3">
                <label class="form-label">Category Slug</label>
                <input type="text" name="category_slug" id="category_slug" class="form-control" placeholder="Auto-generated slug" readonly>
                @error('category_slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Photo Upload -->
            <div class="form-group mb-3">
                <label class="form-label">Upload Category Photo</label>
                <input type="file" name="photo" class="form-control">
                @error('photo')
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
    document.getElementById('category_name').addEventListener('input', function () {
        let name = this.value;

        // Convert to slug
        let slug = name.toLowerCase()
                      .replace(/[^a-z0-9\s-]/g, '')    // Remove special characters
                      .replace(/\s+/g, '-')            // Replace spaces with dashes
                      .replace(/-+/g, '-')             // Replace multiple dashes with one
                      .trim();

        document.getElementById('category_slug').value = slug;
    });
</script>

@endsection
