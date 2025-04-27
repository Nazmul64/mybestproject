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
        <form id="slider-form" method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label">Enter A Slider Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter A Slider Title">
                @error('title')
                   <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Enter A Slider Description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter A Slider Description">
             @error('description')
                <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Enter A Slider Photo</label>
                <input type="file" name="photo" class="form-control">
             @error('photo')
                <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Enter A Slider Status</label>
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

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.getElementById('slider-form').addEventListener('submit', function(e) {
        e.preventDefault();

        let form = e.target;
        let formData = new FormData(form);
        let xhr = new XMLHttpRequest();

        // Show the progress bar
        document.getElementById('progress-container').style.display = 'block';

        xhr.upload.addEventListener('progress', function(e) {
            if (e.lengthComputable) {
                let percentComplete = Math.round((e.loaded / e.total) * 100);
                let progressBar = document.getElementById('upload-progress');
                progressBar.style.width = percentComplete + '%';
                progressBar.innerText = percentComplete + '%';
            }
        });

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                // Hide progress bar after some delay
                setTimeout(() => {
                    document.getElementById('progress-container').style.display = 'none';
                }, 1000);

                if (xhr.status === 200) {

                    form.reset();
                    document.getElementById('upload-progress').style.width = '0%';
                    document.getElementById('upload-progress').innerText = '0%';
                } else {
                    alert('Upload failed. Please try again.');
                }
            }
        };

        xhr.open('POST', "{{ route('slider.store') }}", true);
        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
        xhr.send(formData);
    });
</script>

@endsection
