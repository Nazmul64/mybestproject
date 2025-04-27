@extends('frontend.master')

@section('title', 'Order Success')

@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center" style="background-color: #f8f9fa;">
    <div class="row justify-content-center w-100">
        <div class="col-lg-8 col-md-10">
            <div class="card text-center p-5 shadow rounded-4 bg-white border-0">
                <div class="card-body">
                    <div class="mb-4">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 70px;"></i>
                    </div>
                    <h2 class="text-success mb-3">অর্ডার সফলভাবে সম্পন্ন হয়েছে</h2>
                    <p class="text-muted mb-4">
                        আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে। আমাদের কল সেন্টার থেকে ফোন করে আপনার অর্ডারটি কনফার্ম করা হবে।
                    </p>
                    <a href="{{ url('/') }}" class="btn btn-success px-4 py-2 fs-5 rounded-pill">
                        প্রোডাক্ট বাছাই করুন
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endpush

@push('scripts')
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
