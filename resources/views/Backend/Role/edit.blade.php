@extends('Backend.master')

@section('main-content')
<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Edit Role</h6>
        <a href="{{ route('role.index') }}" class="btn btn-outline-primary mb-3" style="float:right;">
            <i class="fa fa-arrow-left"></i> Back to Roles
        </a>
    </div>
    <div class="card-body">
        <form id="basic-form" method="post" action="{{ route('role.update', $role->id) }}">
            @csrf
            @method('PUT')
            <div class="row g-3 align-items-center">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Role Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               placeholder="Enter Role Name" value="{{ old('name', $role->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" style="margin-bottom: 20px; display: block; font-size: 18px; font-weight: bold;">
                    Permissions
                </label>

                <div class="mb-3">
                    <input type="checkbox" id="select-all"> <label for="select-all"><strong>Select All</strong></label>
                </div>

                @foreach ($getRecord as $getRecords)
                    <div class="row align-items-center" style="margin-bottom: 15px; background: #f8f9fa; padding: 10px; border-radius: 5px;">
                        <div class="col-md-4">
                            <strong style="font-size: 16px; color: #333;">{{ $getRecords['name'] }}</strong>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                @foreach ($getRecords['group'] as $group)
                                    @php
                                        $checked = in_array($group['id'], $getRolePermission->pluck('permissions_id')->toArray()) ? 'checked' : '';
                                    @endphp
                                    <div class="col-md-3">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" {{ $checked }} name="permission_id[]" value="{{ $group['id'] }}" id="permissions_id{{ $group['id'] }}" class="permission-checkbox">
                                            <label for="permissions_id{{ $group['id'] }}" class="permission-label">{{ $group['name'] }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary mt-2">Update Role</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('select-all').addEventListener('change', function () {
        let checkboxes = document.querySelectorAll('.permission-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
</script>
@endsection
