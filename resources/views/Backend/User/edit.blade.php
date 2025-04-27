@extends('Backend.master')

@section('main-content')
<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Edit User</h6>
        <a href="{{ route('user.index') }}" class="btn btn-outline-primary mb-3" style="float:right;">
            <i class="fa fa-arrow-left"></i> Back to Users
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('user.update', $getRecord->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $getRecord->name) }}" placeholder="Enter user name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $getRecord->email) }}" placeholder="Enter user email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password (Leave empty if not changing)</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                        value="{{ old('password') }}" placeholder="Enter new password">
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', 'togglePasswordIcon')">
                        <i id="togglePasswordIcon" class="fa fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        value="{{ old('password_confirmation') }}" placeholder="Re-enter new password">
                    <button type="button" class="btn btn-outline-secondary"
                        onclick="togglePassword('password_confirmation', 'toggleConfirmPasswordIcon')">
                        <i id="toggleConfirmPasswordIcon" class="fa fa-eye"></i>
                    </button>
                </div>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Select Role</label>
                <select name="role" id="role" class="form-control">
                    @foreach ($getRole as $getRecords)
                        <option value="{{ $getRecords->id }}"
                            {{ old('role', $getRecord->role) == $getRecords->id ? 'selected' : '' }}>
                            {{ $getRecords->name }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger" id="roleError"></span>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update User</button>
        </form>
    </div>
</div>

<script>
    function togglePassword(fieldId, iconId) {
        let passwordField = document.getElementById(fieldId);
        let icon = document.getElementById(iconId);

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
@endsection
