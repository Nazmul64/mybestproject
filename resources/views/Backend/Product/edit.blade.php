@extends('Backend.master')
@section('main-content')

<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Add New Category</h6>
        <a href="{{ route('products.index') }}" class="btn btn-outline-primary mb-3">
            <i class="fa fa-arrow-left"></i> Back to category
        </a>
    </div>
    <div class="card-body">
        <form id="category-form" method="POST" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-6">
                    <!-- Product Name -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter a Product Name" value="{{ old('product_name', $product->product_name) }}">
                        @error('product_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product Description -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Description</label>
                        <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter a Product Description" value="{{ old('product_description', $product->product_description) }}">
                        @error('product_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product Details Description -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Details Description</label>
                        <input type="text" name="product_details_description" id="product_details_description" class="form-control" placeholder="Enter a Product Details Description" value="{{ old('product_details_description', $product->product_details_description) }}">
                        @error('product_details_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Regular Price -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Regular Price</label>
                        <input type="number" name="regular_price" id="regular_price" class="form-control" placeholder="Enter a Product Regular Price" value="{{ old('regular_price', $product->regular_price) }}">
                        @error('regular_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Sale Price -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Sale Price</label>
                        <input type="number" name="sale_price" id="sale_price" class="form-control" placeholder="Enter a Product Sale Price" value="{{ old('sale_price', $product->sale_price) }}">
                        @error('sale_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Category</label>
                        <select class="form-select" name="category_id">
                            @foreach($category as $item)
                                <option value="{{ $item->id }}" {{ old('category_id', $selectedCategoryId ?? null) == $item->id ? 'selected' : '' }}>{{ $item->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- SubCategory -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product SubCategory</label>
                        <select class="form-select" name="subcategory_id">
                            @foreach($subcategory as $item)
                                <option value="{{ $item->id }}">{{ $item->subcategory_name }}</option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="col-md-6">
                    <!-- Video URL -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Video URL</label>
                        <input type="text" name="video_url" id="video_url" class="form-control" placeholder="Enter a Product Video URL" value="{{ old('video_url', $product->video_url) }}">
                        @error('video_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" placeholder="Enter a Product Stock" value="{{ old('stock', $product->stock) }}">
                        @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Discount Percentage -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Discount Percentage</label>
                        <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" placeholder="Enter a Product discount percentage" value="{{ old('discount_percentage', $product->discount_percentage) }}">
                        @error('discount_percentage')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Size Description -->
                    @if(is_array(json_decode($product->size_description)))
                        @foreach(json_decode($product->size_description) as $index => $size)
                            <div class="d-flex mb-2 align-items-center">
                                <input type="text" name="size_description[]" class="form-control me-2" placeholder="Product Size Description" value="{{ $size }}">
                                <button type="button" class="btn btn-danger btn-sm remove-field"><i class="fas fa-times"></i> Remove</button>
                            </div>
                        @endforeach
                    @else
                        <div class="d-flex mb-2 align-items-center">
                            <input type="text" name="size_description[]" class="form-control me-2" placeholder="Product Size Description" value="{{ $product->size_description }}">
                            <button type="button" class="btn btn-danger btn-sm remove-field"><i class="fas fa-times"></i> Remove</button>
                        </div>
                    @endif
                    <div id="dynamic-size-fields"></div>
                    <button type="button" id="add-size-field" class="btn btn-primary mt-2">+ Add Size</button>

                    <!-- Product Colors -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter Product Colors</label>
                        <div id="color-fields">
                            @if(!empty($product->color_text))
                                @php $color_texts = json_decode($product->color_text, true); @endphp
                                @foreach($color_texts as $color)
                                    <div class="color-field mb-2">
                                        <input type="text" name="color_text[]" class="form-control" value="{{ $color }}" placeholder="Enter product color">
                                    </div>
                                @endforeach
                            @else
                                <div class="color-field mb-2">
                                    <input type="text" name="color_text[]" class="form-control" placeholder="Enter product color">
                                </div>
                            @endif
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm mt-2" id="add-color-field">+ Add Color</button>
                        <button type="button" class="btn btn-outline-danger btn-sm mt-2" id="remove-color-field">- Remove Color</button>
                        @error('color_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label d-block">Old Uploaded Product Photo</label>
                        @if(!empty($product->photo) && file_exists(public_path('uploads/product/' . $product->photo)))
                            <img src="{{ asset('uploads/product/' . $product->photo) }}" alt="Product Photo" class="img-thumbnail" style="max-width: 150px;">
                        @else
                            <p class="text-muted">No photo uploaded yet.</p>
                        @endif
                    </div>

                    <!-- Photo Upload -->
                    <div class="form-group mb-3">
                        <label class="form-label">Upload new  Product Photo</label>
                        <input type="file" name="new_photo" class="form-control">
                        @error('new_photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Photo Upload -->
                    <div class="form-group mb-3">
                        <label class="form-label">Upload new  Product gallery image Photo</label>
                        <input type="file" name="new_gallery_image[]" class="form-control"multiple>
                        @error('new_gallery_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Gallery Image Upload -->
                    <div class="form-group mb-3">
                        <label class="form-label">Upload Multiple Color Photo</label>
                        @php $gallery_images = json_decode($product->gallery_image, true); @endphp
                        @if(is_array($gallery_images))
                            @foreach($gallery_images as $image)
                                @if(file_exists(public_path('uploads/product/' . $image)))
                                    <img src="{{ asset('uploads/product/' . $image) }}" style="width: 100px; height: auto; margin-right: 5px;">
                                @else
                                    <p>File not found: {{ $image }}</p>
                                @endif
                            @endforeach
                        @else
                            <p>No Color Photos Available</p>
                        @endif
                    </div>

                    <!-- Is Advertise -->
                    <div class="form-group mb-3">
                        <label class="form-label">Is Advertise (Hot Deal Product)</label>
                        <select name="is_advertise" class="form-control">
                            <option value="1" {{ $product->is_advertise == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $product->is_advertise == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('is_advertise')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#add-size-field').on('click', function () {
            const newField = `
                <div class="d-flex mb-2 align-items-center">
                    <input type="text" name="size_description[]" class="form-control me-2" placeholder="Enter Size">
                    <button type="button" class="btn btn-danger btn-sm remove-field">
                        <i class="fas fa-times"></i> Remove
                    </button>
                </div>
            `;
            $('#dynamic-size-fields').append(newField);
        });

        $(document).on('click', '.remove-field', function () {
            $(this).closest('div').remove();
        });

        const addBtn = document.getElementById('add-color-field');
        const removeBtn = document.getElementById('remove-color-field');
        const container = document.getElementById('color-fields');

        addBtn.addEventListener('click', function () {
            const newField = document.createElement('div');
            newField.classList.add('color-field', 'mb-2');
            newField.innerHTML = `<input type="text" name="color_text[]" class="form-control" placeholder="Enter product color">`;
            container.appendChild(newField);
        });

        removeBtn.addEventListener('click', function () {
            const fields = container.querySelectorAll('.color-field');
            if (fields.length > 1) {
                fields[fields.length - 1].remove();
            }
        });
    });
</script>
@endsection
