@extends('Backend.master')
@section('main-content')

<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Add New Slider</h6>
        <a href="{{ route('slider.index') }}" class="btn btn-outline-primary mb-3">
            <i class="fa fa-arrow-left"></i> Back to Sliders
        </a>
    </div>
    <div class="card-body">
        <form id="slider-form" method="POST" action="{{ route('slider.update',$sliders->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label class="form-label">Enter A Slider Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter A Slider Title"value="{{ old('title', $sliders->title) }}">
                @error('title')
                   <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Enter A Slider Description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter A Slider Description"value="{{ old('title', $sliders->description) }}">
             @error('description')
                <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Slider Old  Photo</label> <br>
                <img src="{{ asset('uploads/sliders/' . $sliders->photo) }}" alt="Slider Image" width="100">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Enter A Slider Photo</label>
                <input type="file" name="new_photo" class="form-control">
             @error('photo')
                <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Enter A Slider Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $sliders->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $sliders->status == 0 ? 'selected' : '' }}>Inactive</option>
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

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>
@endsection
