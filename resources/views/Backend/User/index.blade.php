@extends('Backend.master')
@section('main-content')

<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">User List</h3>
                    <a href="{{ route('user.create') }}" class="btn btn-outline-primary mb-3" style="float:right;">
                        <i class="fa fa-plus"></i> Add User
                    </a>
                </div>

            </div>
        </div> <!-- Row end  -->
        <div class="row g-3 mb-3">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <table id="myDataTable" class="table table-hover align-middle" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>User Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->email === 'admin@gmail.com')
                                                    admin@gmail.com
                                                @else
                                                {{ $user->password }}
                                                @endif
                                            </td>

                                            <td>
                                                <!-- Edit Button -->
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-info text-black">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>

                                                <!-- Delete Button with Confirmation -->
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger text-white">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
