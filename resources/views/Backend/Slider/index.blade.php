@extends('Backend.master')

@section('main-content')
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Slider List</h3>
                    <a href="{{ route('slider.create') }}" class="btn btn-outline-primary mb-3" style="float:right;">
                        <i class="fa fa-plus"></i> Add Slider
                    </a>
                </div>
            </div>
        </div>

        <!-- Row for Table -->
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="myDataTable" class="table table-hover align-middle" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $index => $sliders)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $sliders->title }}</td>
                                        <td>{{ $sliders->description }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/sliders/' . $sliders->photo) }}" alt="Slider Image" width="100">
                                        </td>
                                        <td>
                                            <span style="background:{{ $sliders->status == 1 ? 'green' : 'red' }}; color: white; padding: 4px 8px; border-radius: 4px;">
                                                {{ $sliders->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('slider.edit', $sliders->id) }}" class="btn btn-outline-info text-black">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>

                                            <form action="{{ route('slider.destroy', $sliders->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this slider?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger text-white">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
