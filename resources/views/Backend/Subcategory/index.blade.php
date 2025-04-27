@extends('Backend.master')

@section('main-content')
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Subcategory List</h3>
                    <a href="{{ route('subcategory.create') }}" class="btn btn-outline-primary mb-3">
                        <i class="fa fa-plus"></i> Add Subcategory
                    </a>
                </div>
            </div>
        </div>

        <!-- Table Row -->
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="myDataTable" class="table table-hover align-middle text-nowrap" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>SubCategory Name</th>
                                    <th>SubCategory Slug</th>
                                    <th>Category Name</th>
                                    <th>Subcategory Photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->subcategory_name }}</td>
                                        <td>{{ $item->subcategory_slug }}</td>
                                        <td>{{ $item->category->category_name ?? 'N/A' }}</td>

                                        <td>
                                            <img
                                                src="{{ $item->sub_photo ? asset('uploads/subcategory/' . $item->sub_photo) : asset('uploads/default.png') }}"
                                                alt="Subcategory Photo"
                                                width="50"
                                                height="50"
                                                style="object-fit: cover; border-radius: 5px;"
                                            >
                                        </td>
                                        <td>
                                            <span class="badge {{ $item->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $item->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('subcategory.edit', $item->id) }}" class="btn btn-outline-info btn-sm mb-1">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('subcategory.destroy', $item->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
@endsection
