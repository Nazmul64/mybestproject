<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">
        <a href="index.html" class="mb-0 brand-icon">
            <span class="logo-icon">
                <i class="bi bi-bag-check-fill fs-4"></i>
            </span>
            <span class="logo-text">eBazar</span>
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">
            @php
                $permissionuserUser =App\Models\Permissionrole::getPermission('User',Auth::user()->role);
                $permissionuserRole =App\Models\Permissionrole::getPermission('Role',Auth::user()->role);
                $permissionuserCategory =App\Models\Permissionrole::getPermission('Category',Auth::user()->role);
                $permissionuserSubCategory =App\Models\Permissionrole::getPermission('SubCategory',Auth::user()->role);
                $permissionuserProduct =App\Models\Permissionrole::getPermission('Product',Auth::user()->role);
                $permissionuserSlider =App\Models\Permissionrole::getPermission('Slider',Auth::user()->role);
                $permissionuserOrder =App\Models\Permissionrole::getPermission('Order',Auth::user()->role);
                $permissionuserSetting =App\Models\Permissionrole::getPermission('Setting',Auth::user()->role);
                $permissionuserShipping =App\Models\Permissionrole::getPermission('Shipping',Auth::user()->role);
                $permissionuserCreateorder =App\Models\Permissionrole::getPermission('CreateOrder',Auth::user()->role);
                $permissionuserprivacy =App\Models\Permissionrole::getPermission('Privacy',Auth::user()->role);
                $permissionuserAbout =App\Models\Permissionrole::getPermission('About',Auth::user()->role);
                $permissionuserContact =App\Models\Permissionrole::getPermission('Contact',Auth::user()->role);
            @endphp
            <li><a class="m-link active" href="{{ route('admin') }}"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>

            {{--  @if(!empty($permissionuserUser) || !empty($permissionuserRole) || !empty($permissionuserCategory) || !empty($permissionuserSubCategory) || !empty($permissionuserProduct) || !empty($permissionuserSlider) || !empty($permissionuserOrder) || !empty($permissionuserSetting) || !empty($permissionuserShipping) || !empty($permissionuserCreateorder) || !empty($permissionuserprivacy) || !empty($permissionuserAbout) || !empty($permissionuserContact))  --}}
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#adminMenu" href="#">
                    <i class="icofont-ui-user-group fs-5"></i> <span>Admin</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#adminRoleMenu" href="#">
                    <i class="fa fa-user"></i> User </i> User
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>

                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="adminRoleMenu">
                    <li><a class="ms-link" href="{{ route('user.index') }}">User List</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#app" href="#">
                    <i class="fa fa-user-shield"></i>admin Role<span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="app">
                    <li><a class="ms-link" href="{{ route('role.index') }}">Role List</a></li>
                </ul>
            </li>
            <li class="collapsed menu-slider">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-slider" href="{{ route('slider.index') }}">
                    <i class="fas fa-sliders-h fs-5"> </i>
                    <span> Slider </span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-slider">
                    <li><a class="ms-link" href="{{ route('slider.index') }}">Slider List</a></li>
                </ul>
            </li>


            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#categories" href="#">
                    <i class="icofont-chart-flow fs-5"></i> <span>Categories</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="categories">
                        <li><a class="ms-link" href="{{ route('category.index') }}">Categories List</a></li>
                        <li><a class="ms-link" href="{{ route('subcategory.index') }}">Sub Category List</a></li>
                    </ul>
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                    <i class="icofont-tags fs-5"></i><span>Products List</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="menu-product">
                        <li><a class="ms-link" href="{{ route('products.index') }}">Product List</a></li>
                    </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-order-unique" href="#">
                    <i class="icofont-fast-delivery fs-5"></i>
                    <span>Shipping Method</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>

                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-order-unique">
                    <li><a class="ms-link" href="{{ route('shipping.index') }}">Shipping Method List</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-order" href="#">
                <i class="icofont-notepad fs-5"></i> <span>Orders</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-order">
                    <li><a class="ms-link" href="order-list.html">Orders List</a></li>
                    <li><a class="ms-link" href="order-details.html">Order Details</a></li>
                    <li><a class="ms-link" href="order-invoices.html">Order Invoices</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#customers-info" href="#">
                <i class="icofont-funky-man fs-5"></i> <span>Customers</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="customers-info">
                    <li><a class="ms-link" href="customers.html">Customers List</a></li>
                    <li><a class="ms-link" href="customer-detail.html">Customers Details</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-sale" href="#">
                <i class="icofont-sale-discount fs-5"></i> <span> Coupons</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-sale">
                    <li><a class="ms-link" href="{{ route('coupon.index') }}">Coupons List</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-inventory" href="#">
                <i class="icofont-chart-histogram fs-5"></i> <span>Inventory</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-inventory">
                    <li><a class="ms-link" href="inventory-info.html">Stock List</a></li>
                    <li><a class="ms-link" href="purchase.html">Purchase</a></li>
                    <li><a class="ms-link" href="supplier.html">Supplier</a></li>
                    <li><a class="ms-link" href="returns.html">Returns</a></li>
                    <li><a class="ms-link" href="department.html">Department</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Componentsone" href="#"><i
                        class="icofont-ui-calculator"></i> <span>Accounts</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-Componentsone">
                    <li><a class="ms-link" href="invoices.html">Invoices </a></li>
                    <li><a class="ms-link" href="expenses.html">Expenses </a></li>
                    <li><a class="ms-link" href="salaryslip.html">Salary Slip </a></li>
                    <li><a class="ms-link" href="create-invoice.html">Create Invoice </a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#page" href="#">
                <i class="icofont-page fs-5"></i> <span>Web Setting</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="page">
                    <li><a class="ms-link" href="{{ route('websetting.index') }}">Web Settings List</a></li>
                </ul>
            </li>

            {{--  @endif  --}}
        </ul>
        <!-- Menu: menu collepce btn -->
        <a  href="{{ route('logout') }}" id="logout-btn" class="btn btn-link sidebar-mini-btn text-light"onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <script>
            document.getElementById('logout-btn').addEventListener('click', function (event) {
                event.preventDefault();
                if (confirm('Are you sure you want to logout?')) {
                    document.getElementById('logout-form').submit();
                }
            });
        </script>

    </div>
</div>
