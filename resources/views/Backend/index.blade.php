@extends('Backend.master')
@section('main-content')
<div class="container-xxl">
    <div class="row g-3">
        <div class="col-lg-12 col-md-12">
            <div class="tab-filter d-flex align-items-center justify-content-between mb-3 flex-wrap">

                <div class="date-filter d-flex align-items-center mt-2 mt-sm-0 w-sm-100">
                    <div class="input-group">
                        <input type="date" class="form-control">
                        <button class="btn btn-primary" type="button"><i class="icofont-filter fs-5"></i></button>
                    </div>
                </div>
            </div>
            <div class="tab-content mt-1">
                <div class="tab-pane fade show active" id="summery-today">
                    <div class="row g-1 g-sm-3 mb-3 row-deck">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Revenue</span>
                                        <div><span class="fs-6 fw-bold me-2">14,208</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-student-alt fs-3 color-light-orange"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Staff</span>
                                        <div><span class="fs-6 fw-bold me-2">2314</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Customer</span>
                                        <div><span class="fs-6 fw-bold me-2">$1770</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-sale-discount fs-3 color-santa-fe"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Product</span>
                                        <div><span class="fs-6 fw-bold me-2">185</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-calculator-alt-2 fs-3 color-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Orders</span>
                                        <div><span class="fs-6 fw-bold me-2">$35000</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Processing</span>
                                        <div><span class="fs-6 fw-bold me-2">11452</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-users-social fs-3 color-light-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Pending Delivery</span>
                                        <div><span class="fs-6 fw-bold me-2">184511</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-bag fs-3 color-light-orange"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Pending Payment</span>
                                        <div><span class="fs-6 fw-bold me-2">122</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-star fs-3 color-lightyellow"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Hold</span>
                                        <div><span class="fs-6 fw-bold me-2">32</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-handshake-deal fs-3 color-lavender-purple"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Cancelded </span>
                                        <div><span class="fs-6 fw-bold me-2">32</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-handshake-deal fs-3 color-lavender-purple"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Completed Orders </span>
                                        <div><span class="fs-6 fw-bold me-2">32</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-handshake-deal fs-3 color-lavender-purple"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left-info">
                                        <span class="text-muted">Total Delivered Orders </span>
                                        <div><span class="fs-6 fw-bold me-2">32</span></div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="icofont-handshake-deal fs-3 color-lavender-purple"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row end -->
                </div>



            </div>
        </div>
    </div><!-- Row end  -->
    <div class="row g-3 mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                    <h6 class="m-0 fw-bold">Recent Transactions</h6>
                </div>
                <div class="card-body">

                    <!-- Actions (Buttons and Select Dropdowns) -->
                    <div class="mb-3 d-flex flex-wrap gap-2">
                        <a class="btn btn-success text-white">Add Order</a>

                        <select class="form-select" style="width: 200px;" aria-label="Select Order Type">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>

                        <select class="form-select" style="width: 200px;" aria-label="Select Employee">
                            <option selected>Select Employee</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>

                        <a class="btn btn-danger text-white">Delete</a>
                        <a class="btn btn-primary text-white">Print Invoice</a>
                        <a class="btn btn-secondary text-white">Export</a>
                    </div>

                    <!-- Data Table -->
                    <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Order ID</th>
                                <th>Item</th>
                                <th>Customer Name</th>
                                <th>Payment Info</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td><strong>#Order-78414</strong></td>
                                <td>
                                    <img src="{{ asset('Backend') }}/assets/images/product/product-1.jpg" class="avatar lg rounded me-2" alt="product-image">
                                    <span>Oculus VR</span>
                                </td>
                                <td>Molly</td>
                                <td>Credit Card</td>
                                <td>$420</td>
                                <td><span class="badge bg-warning">Progress</span></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
