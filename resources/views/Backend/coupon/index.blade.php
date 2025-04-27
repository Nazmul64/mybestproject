@extends('Backend.master')

@section('main-content')
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Coupon List</h3>
                    <a href="{{ route('coupon.create') }}" class="btn btn-outline-primary mb-3">
                        <i class="fa fa-plus"></i> Add coupon
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
                                    <th>Coupon Name</th>
                                    <th>Discount Percentage</th>
                                    <th>Validity</th>
                                    <th>Limit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupon as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->coupon_name }}</td>
                                        <td>{{ $item->discount_percentage }}%</td>
                                        <td> {{ $item->validity }}</td>
                                        <td>{{ $item->limit }}</td>



                                        <td>
                                            <a href="{{ route('coupon.edit', $item->id) }}" class="btn btn-outline-info btn-sm mb-1">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('coupon.destroy', $item->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
