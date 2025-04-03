@extends('Backend.master')
@section('main-content') 
<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold ">Add New Role</h6> 
        <a href="{{ route('role.index') }}" class="btn btn-outline-primary mb-3" style="float:right;">
            <i class="fa fa-arrow-left"></i> Back to Roles
        </a>
        
    </div>
    <div class="card-body">
        <form id="basic-form" method="post" action="{{ route('role.update',$role->id) }}">
            @csrf
            @method('put')
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Create Role Name</label>
                        <input type="text" name="name" class="form-control    @error('name') is-invalid  @enderror" placeholder="Enter Create Role Name" value="{{ old('name',$role) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</div>

@endsection

