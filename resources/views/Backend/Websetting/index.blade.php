@extends('Backend.master')

@section('main-content')
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Websetting List</h3>
                    <a href="{{ route('websetting.create') }}" class="btn btn-outline-primary mb-3">
                        <i class="fa fa-plus"></i> Add Websetting
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
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Instagram</th>
                                    <th>LinkedIn</th>
                                    <th>Youtube</th>
                                    <th>Whatsapp</th>
                                    <th>Offer Title</th>
                                    <th>Fixel Setup Text</th>
                                    <th>SMS Text</th>
                                    <th>Webtitle Text</th>
                                    <th>Favicon</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($websetting as $index => $websetting)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $websetting->address }}</td>
                                        <td>{{ $websetting->phone }}</td>
                                        <td>{{ $websetting->email }}</td>
                                        <td>{{ $websetting->facebook }}</td>
                                        <td>{{ $websetting->twitter }}</td>
                                        <td>{{ $websetting->instagram }}</td>
                                        <td>{{ $websetting->linkedin }}</td>
                                        <td>{{ $websetting->youtube }}</td>
                                        <td>{{ $websetting->whatsapp }}</td>
                                        <td>{{ $websetting->offer_title }}</td>
                                        <td>{{ $websetting->fixel_setup_text }}</td>
                                        <td>{{ $websetting->sms_text }}</td>
                                        <td>{{ $websetting->webtitle_text }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/websettings/' . $websetting->favicon) }}" alt="Favicon" width="50">
                                        </td>
                                        <td>
                                            <img src="{{ asset('uploads/websettings/' . $websetting->photo) }}" alt="Logo" width="80">
                                        </td>
                                        <td>
                                            <span class="badge {{ $websetting->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $websetting->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('websetting.edit', $websetting->id) }}" class="btn btn-outline-info btn-sm mb-1">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('websetting.destroy', $websetting->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
