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
        <form id="category-form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-6">
                    <!-- Product Name -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter a Product Name">
                        @error('product_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product Description -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Description</label>
                        <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter a Product Description">
                        @error('product_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product Details Description -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Details Description</label>
                        <input type="text" name="product_details_description" id="product_details_description" class="form-control" placeholder="Enter a Product Details Description">
                        @error('product_details_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
{{--
                    <!-- Slug Name Description -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Slug Name</label>
                        <input type="text" name="slug_name_description" id="slug_name_description" class="form-control" placeholder="Enter a Product Slug Name">
                        @error('slug_name_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>  --}}

                    <!-- Regular Price -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Regular Price</label>
                        <input type="number" name="regular_price" id="regular_price" class="form-control" placeholder="Enter a Product Regular Price">
                        @error('regular_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Sale Price -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Sale Price</label>
                        <input type="number" name="sale_price" id="sale_price" class="form-control" placeholder="Enter a Product Sale Price">
                        @error('sale_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Category</label>
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            @foreach($category as $item)
                               <option value="{{ $item->id}}">{{ $item->category_name }}</option>
                            @endforeach
                          </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product SubCategory</label>
                        <select class="form-select" name="subcategory_id" aria-label="Default select example">
                            @foreach($subcategory as $item)
                               <option value="{{ $item->id}}">{{ $item->subcategory_name }}</option>
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
                        <input type="text" name="video_url" id="video_url" class="form-control" placeholder="Enter a Product Video URL">
                        @error('video_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" placeholder="Enter a Product Stock">
                        @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product discount percentage</label>
                        <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" placeholder="Enter a Product discount percentage">
                        @error('discount_percentage')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Size Description -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Size</label>
                        <div id="size-fields">
                            <div class="size-field mb-2">
                                <input type="text" name="size_description[]" class="form-control" placeholder="Enter a Product Size">
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm mt-2" id="add-size-field">Add Size</button>
                        @error('size_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Color</label>
                        <div id="color-fields">
                            <div class="color-field mb-2">
                                <input type="text" name="color_text[]" class="form-control" placeholder="Enter a Product Color">
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm mt-2" id="add-color-field">+ Add Color</button>
                        <button type="button" class="btn btn-outline-danger btn-sm mt-2" id="remove-color-field" style="display:none;">- Remove Color</button>
                        @error('color_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Photo Upload -->
                    <div class="form-group mb-3">
                        <label class="form-label">Upload Product Photo</label>
                        <input type="file" name="photo" class="form-control">
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Gallery Image Upload -->
                    <div class="form-group mb-3">
                        <label class="form-label">Upload Multiple Color Photo</label>
                        <input type="file" name="gallery_image[]" class="form-control"multiple>
                        @error('gallery_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Advertise -->
                    <div class="form-group mb-3">
                        <label class="form-label">Enter a Product Is Advertise ('mins hot deal product')</label>
                        <select name="is_advertise" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('is_advertise')
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
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Add new size field
    $('#add-size-field').on('click', function() {
        let newField = `<div class="size-field mb-2">
                            <input type="text" name="size_description[]" class="form-control" placeholder="Enter a Product Size">
                            <button type="button" class="btn btn-danger btn-sm remove-size-field">Remove</button>
                        </div>`;
        $('#size-fields').append(newField);
    });

    // Remove size field
    $(document).on('click', '.remove-size-field', function() {
        $(this).closest('.size-field').remove();
    });
</script>
<script>
    // Add new color field
    $('#add-color-field').on('click', function() {
        let newField = `<div class="color-field mb-2">
                            <input type="text" name="color_text[]" class="form-control" placeholder="Enter a Product Color">
                        </div>`;
        $('#color-fields').append(newField);
        // Show the "Remove Color" button when there's more than 1 color field
        $('#remove-color-field').show();
    });

    // Remove the last color field (if there are multiple)
    $('#remove-color-field').on('click', function() {
        let lastColorField = $('#color-fields .color-field').last();
        if (lastColorField.length) {
            lastColorField.remove();
        }
        // Hide the "Remove Color" button if there is only one field left
        if ($('#color-fields .color-field').length <= 1) {
            $('#remove-color-field').hide();
        }
    });
</script>
@endsection
