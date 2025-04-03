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
            <li><a class="m-link active" href="{{ route('admin') }}"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
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
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#categories" href="#">
                    <i class="icofont-chart-flow fs-5"></i> <span>Categories</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="categories">
                        <li><a class="ms-link" href="categorie-list.html">Categories List</a></li>
                        <li><a class="ms-link" href="categorie-list.html">Sub Category List</a></li>
                    </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                    <i class="icofont-truck-loaded fs-5"></i> <span>Products List</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="menu-product">
                        <li><a class="ms-link" href="product-grid.html">Product List</a></li>
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
                <i class="icofont-sale-discount fs-5"></i> <span>Sales Promotion</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-sale">
                    <li><a class="ms-link" href="coupons-list.html">Coupons List</a></li>
                    <li><a class="ms-link" href="coupon-add.html">Coupons Add</a></li>
                    <li><a class="ms-link" href="coupon-edit.html">Coupons Edit</a></li>
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

            <li><a class="m-link" href="store-locator.html"><i class="icofont-focus fs-5"></i> <span>Store Locator</span></a></li>
            <li><a class="m-link" href="ui-elements/ui-alerts.html"><i class="icofont-paint fs-5"></i> <span>UI Components</span></a></li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#page" href="#">
                <i class="icofont-page fs-5"></i> <span>Other Pages</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="page">
                    <li><a class="ms-link" href="admin-profile.html">Profile Page</a></li>
                    <li><a class="ms-link" href="purchase-plan.html">Price Plan Example</a></li>
                    <li><a class="ms-link" href="charts.html">Charts Example</a></li>
                    <li><a class="ms-link" href="table.html">Table Example</a></li>
                    <li><a class="ms-link" href="forms.html">Forms Example</a></li>
                    <li><a class="ms-link" href="icon.html">Icons</a></li>
                    <li><a class="ms-link" href="contact.html">Contact Us</a></li>
                    <li><a class="ms-link" href="todo-list.html">Todo List</a></li>
                </ul>
            </li>
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
