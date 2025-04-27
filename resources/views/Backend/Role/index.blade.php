@extends('Backend.master')
@section('main-content')

<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Role List</h3>

                    <a href="{{ route('role.create') }}" class="btn btn-outline-primary mb-3" style="float:right;">
                        <i class="fa fa-plus"></i> Add Role
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
                                    <th>Role Name</th>

                                       <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($role as $index => $roles)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $roles->name }}</td>
                                        <td>
                                            <!-- Edit Button -->

                                            <a href="{{ route('role.edit', $roles->id) }}" class="btn btn-outline-info text-black">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>

                                            <!-- Delete Button with Confirmation -->

                                            <form action="{{ route('role.destroy', $roles->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this role?');">
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
