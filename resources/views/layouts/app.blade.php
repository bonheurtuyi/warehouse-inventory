<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <title>@yield('title')Warehouse Management System</title>

    @livewireStyles
</head>
<body>
<!-- top navigation bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebar"
                aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">
            Inventory
        </a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#topNavBar"
                aria-controls="topNavBar"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
            <form class="d-flex ms-auto my-3 my-lg-0">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-bell"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ms-2" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://i.pravatar.cc/150?img=12" alt="Avatar" width="30" height="30" class="rounded-circle">
                    </a>
                    @if(Auth::check())
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item bg-color-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endif
                </li>
                <li class="nav-item">
                    <button class="btn btn-light-dark-toggle" type="button" aria-label="Toggle light-dark theme">
                        <i class="bi bi-moon"></i>
                        <i class="bi bi-sun"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<hr style="margin-top: 70px;">

<div class="offcanvas offcanvas-start sidebar-nav bg-light text-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-light">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">
                        CORE
                    </div>
                </li>
                <x-dashboard.dashboard-link link="{{ route('home') }}" icon="bi-speedometer2" name="Dashboard" />

                <li class="my-2">
                    <hr class="dropdown-divider bg-light" />
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        {{__('Operations')}}
                    </div>
                </li>
                <!--Categories-->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#categories">
                        <span class="me-2">
                            <i class="bi bi-grid-fill"></i>
                        </span>
                        <span>Categories</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                 <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="categories">
                        <ul class="navbar-nav ps-3">
                            <x-dashboard.dashboard-link link="{{ route('categories.index') }}" icon="bi-list" name="View Categories" />
                            <x-dashboard.dashboard-link link="{{ route('categories.create') }}" icon="bi-plus" name="Create category" />
                        </ul>
                    </div>
                </li>
                <!--Units-->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#units">
                        <span class="me-2">
                            <i class="bi bi-collection-fill"></i>
                        </span>
                        <span>Units</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                 <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="units">
                        <ul class="navbar-nav ps-3">
                            <x-dashboard.dashboard-link link="{{ route('units.index') }}" icon="bi-list" name="View Units" />
                            <x-dashboard.dashboard-link link="{{ route('units.create') }}" icon="bi-plus" name="Create Unit" />
                        </ul>
                    </div>
                </li>

                <!--Products-->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#products">
                        <span class="me-2">
                            <i class="bi bi-bag-fill"></i>
                        </span>
                        <span>Products</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                 <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="products">
                        <ul class="navbar-nav ps-3">
                            <x-dashboard.dashboard-link link="{{ route('products.index') }}" icon="bi-list" name="View Products" />
                            <x-dashboard.dashboard-link link="{{ route('products.create') }}" icon="bi-plus" name="Create Product" />
                        </ul>
                    </div>
                </li>

                <!--Customers-->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#customers">
                        <span class="me-2">
                            <i class="bi bi-person-lines-fill"></i>
                        </span>
                        <span>Customers</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                 <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="customers">
                        <ul class="navbar-nav ps-3">
                            <x-dashboard.dashboard-link link="{{ route('customers.index') }}" icon="bi-list" name="View Customers" />
                            <x-dashboard.dashboard-link link="{{ route('customers.create') }}" icon="bi-plus" name="Add Customer" />
                        </ul>
                    </div>
                </li>

                <!--Orders-->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#orders">
                        <span class="me-2">
                            <i class="bi bi-cart-fill"></i>
                        </span>
                        <span>Orders</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                 <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="orders">
                        <ul class="navbar-nav ps-3">
                            <x-dashboard.dashboard-link link="{{ route('orders.index') }}" icon="bi-list" name="View Orders" />
                            <x-dashboard.dashboard-link link="{{ route('orders.create') }}" icon="bi-plus" name="Create New Order" />
                            <x-dashboard.dashboard-link link="{{ route('orders.approved') }}" icon="bi-check-circle" name="Approved Orders" />
                            <x-dashboard.dashboard-link link="{{ route('orders.pending') }}" icon="bi-clock" name="Pending Orders" />
                        </ul>
                    </div>
                </li>


                <li class="my-2">
                    <hr class="dropdown-divider bg-light" />
                </li>

                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Reports
                    </div>
                </li>
                <!--Invoices-->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#invoices">
                        <span class="me-2">
                            <i class="bi-file-earmark-text-fill"></i>
                        </span>
                        <span>Invoices</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                 <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="invoices">
                        <ul class="navbar-nav ps-3">
                            <x-dashboard.dashboard-link link="{{ route('invoices.index') }}" icon="bi-list" name="View Invoices" />
                            <x-dashboard.dashboard-link link="{{ route('invoices.create') }}" icon="bi-plus" name="Make New invoice" />
                            <x-dashboard.dashboard-link link="{{ route('invoices.approved') }}" icon="bi-file-check" name="Approved Invoices" />
                            <x-dashboard.dashboard-link link="{{ route('invoices.pending') }}" icon="bi-hourglass" name="Pending Invoices" />
                        </ul>
                    </div>
                </li>
                <!--Reports-->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#reports">
                        <span class="me-2">
                            <i class="bi bi-bar-chart-fill"></i>
                        </span>
                        <span>Reports</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                 <i class="bi bi-chevron-down"></i>
                            </span>
                    </span>
                    </a>
                    <div class="collapse" id="reports">
                        <ul class="navbar-nav ps-3">
                            <x-dashboard.dashboard-link link="{{ route('stock.report') }}" icon="bi-file-earmark-bar-graph" name="Stock Report" />
                        </ul>
                    </div>
                </li>

                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#sales">
                        <span class="me-2">
                            <i class="bi bi-bar-chart-fill"></i>
                        </span>
                        <span>Sales, Revenue & Statistics</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                 <i class="bi bi-chevron-down"></i>
                            </span>
                    </span>
                    </a>
                    <div class="collapse" id="sales">
                        <ul class="navbar-nav ps-3">
                            <x-dashboard.dashboard-link link="{{ route('sales.report') }}" icon="bi-file-earmark-bar-graph" name="Sales & Revenue" />
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
</div>



<main class="mt-5 pt-3">
   @yield('content')
</main>

@livewireScripts
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
</script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
<script src=""></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
