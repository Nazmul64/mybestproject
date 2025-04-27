@extends('frontend.master')

@section('content')
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Log In</h2>
                    <h2 class="ec-title">Log In</h2>
                    <p class="sub-title mb-3">Best place to buy and sell digital products</p>
                </div>
            </div>

            <div class="col-md-6 offset-md-3">
                <div class="ec-login-wrapper">
                    <div class="ec-login-container">
                        <div class="ec-login-form">
                            <form method="POST" action="{{ route('user.auth') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address*</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email address" value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="passwordField" class="form-label">Password*</label>
                                    <input type="password" id="passwordField" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" required>
                                    <span onclick="togglePassword()" id="togglePassword" style="position: absolute; right: 10px; top: 38px; cursor: pointer;">👁️</span>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Forgot Password --}}
                                <div class="mb-3 text-end">
                                    <a href="#" class="text-muted">Forgot Password?</a>
                                </div>

                                {{-- Buttons --}}
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <a href="" class="btn btn-outline-secondary">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- JavaScript --}}
<script>
    // Show/Hide Password Function
    function togglePassword() {
        const passwordField = document.getElementById("passwordField");
        const toggleIcon = document.getElementById("togglePassword");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.textContent = "🙈";
        } else {
            passwordField.type = "password";
            toggleIcon.textContent = "👁️";
        }
    }
</script>
@endsection
