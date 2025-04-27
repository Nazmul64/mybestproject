@extends('Backend.master')
@section('main-content')

<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Add New Websetting</h6>
        <a href="{{ route('websetting.index') }}" class="btn btn-outline-primary mb-3">
            <i class="fa fa-arrow-left"></i> Back to Websetting
        </a>
    </div>
    <div class="card-body">
        <form id="websetting-form" method="POST" action="{{ route('websetting.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Website Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter website address">
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="number" name="phone" class="form-control" placeholder="Enter phone number">
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email address">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Facebook URL</label>
                    <input type="url" name="facebook" class="form-control" placeholder="Enter Facebook URL">
                    @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Twitter URL</label>
                    <input type="url" name="twitter" class="form-control" placeholder="Enter Twitter URL">
                    @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">LinkedIn URL</label>
                    <input type="url" name="linkedin" class="form-control" placeholder="Enter LinkedIn URL">
                    @error('linkedin') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">YouTube URL</label>
                    <input type="url" name="youtube" class="form-control" placeholder="Enter YouTube URL">
                    @error('youtube') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Instagram URL</label>
                    <input type="url" name="instagram" class="form-control" placeholder="Enter Instagram URL">
                    @error('instagram') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">WhatsApp URL</label>
                    <input type="url" name="whatsapp" class="form-control" placeholder="Enter WhatsApp URL">
                    @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Offer Title</label>
                    <input type="text" name="offer_title" class="form-control" placeholder="Enter offer title">
                    @error('offer_title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Fixel Setup Text</label>
                    <input type="text" name="fixel_setup_text" class="form-control" placeholder="Enter fixel setup text">
                    @error('fixel_setup_text') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">SMS Text</label>
                    <input type="text" name="sms_text" class="form-control" placeholder="Enter SMS text">
                    @error('sms_text') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Web Title Text</label>
                    <input type="text" name="webtitle_text" class="form-control" placeholder="Enter web title text">
                    @error('webtitle_text') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Logo Photo</label>
                    <input type="file" name="photo" class="form-control">
                    @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Favicon</label>
                    <input type="file" name="favicon" class="form-control">
                    @error('favicon') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
