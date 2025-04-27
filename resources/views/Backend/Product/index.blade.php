@extends('Backend.master')

@section('main-content')
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Product List</h3>
                    <a href="{{ route('products.create') }}" class="btn btn-outline-primary mb-3">
                        <i class="fa fa-plus"></i> Add Product
                    </a>
                </div>
            </div>
        </div>

        <!-- Table Row -->
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive" style="max-height: 500px; overflow-y: auto;">
                        <table id="myDataTable" class="table table-hover align-middle text-nowrap" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product Details Description</th>
                                    <th> Product Slug</th>
                                    <th>Regular Price</th>
                                    <th>Sale Price</th>
                                    <th>Video URL</th>
                                    <th>Stock</th>
                                    <th>discount percentage</th>
                                    <th>is advertise</th>
                                    <th>Status</th>
                                    <th>gallery image</th>
                                    <th>Photo</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Category Name</th>
                                    <th>Subcategory Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->product_slug }}</td>
                                        <td>{{ $item->product_description }}</td>
                                        <td>{{ $item->product_details_description }}</td>
                                        <td>{{ $item->regular_price }}</td>
                                        <td>{{ $item->sale_price }}</td>
                                        <td>{{ $item->video_url }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>{{ $item->discount_percentage }}</td>
                                        <td>
                                            <span class="badge {{ $item->is_advertise == 1 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $item->is_advertise == 1 ? 'Advertised' : 'Not Advertised' }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="badge {{ $item->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $item->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if(!empty($item->gallery_image))
                                                @php
                                                    $galleryImages = json_decode($item->gallery_image, true);
                                                @endphp

                                                @if(is_array($galleryImages) && count($galleryImages) > 0)
                                                    @foreach($galleryImages as $image)
                                                        <img src="{{ asset('uploads/product/' . trim($image)) }}" alt="Gallery Image" width="50" class="me-1 mb-1" style="object-fit: cover;">
                                                    @endforeach
                                                @else
                                                    <p>No Image Available</p>
                                                @endif
                                            @else
                                                <p>No Image Available</p>
                                            @endif
                                        </td>



                                        <td>
                                            <img src="{{ asset('uploads/product/' . $item->photo) }}" alt="Logo" width="80">
                                        </td>
                                        <td>
                                            @if(is_array(json_decode($item->size_description)))
                                                @foreach(array_filter(json_decode($item->size_description)) as $size)
                                                    <span class="size-badge">{{ $size }}</span>
                                                @endforeach
                                            @else
                                                <span class="size-badge">{{ $item->size_description }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(is_array(json_decode($item->color_text)))
                                                @foreach(array_filter(json_decode($item->color_text)) as $size)
                                                    <span class="size-badge">{{ $size }}</span>
                                                @endforeach
                                            @else
                                                <span class="size-badge">{{ $item->color_text }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->category->category_name }}</td>
                                        <td>{{ $item->subcategory->subcategory_name ?? 'N/A'}}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $item->id) }}" class="btn btn-outline-info btn-sm mb-1">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('products.destroy', $item->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div>
        </div>
    </div>
</div>
<style>
    .size-container {
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    .size-container > span {
        font-weight: bold;
        color: #333;
    }

    .size-badge {
        padding: 5px 10px;
        border: 1px solid #d90000;
        border-radius: 20px;
        background-color: #fff;
        color: #d90000;
        font-weight: bold;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .size-badge:hover {
        background-color: #d90000;
        color: #fff;
    }

    .size-badge:last-child {
        background-color: #d90000;
        color: #fff;
    }
</style>
@endsection
