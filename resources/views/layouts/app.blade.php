<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <title>@yield('title')Warehouse Management System</title>
</head>
<body>
<!-- top navigation bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebar"
            aria-controls="offcanvasExample"
        >
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
            class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
            href="#"
        >Inventory</a
        >
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#topNavBar"
            aria-controls="topNavBar"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
            <form class="d-flex ms-auto my-3 my-lg-0">
                <div class="input-group">
                    <input
                        class="form-control"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                    />
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle ms-2"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <i class="bi bi-person-fill"></i>
                    </a>
                    @if(Auth::check())
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li>
                                <a class="dropdown-item bg-color-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-start sidebar-nav bg-light text-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-light">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">
                        CORE
                    </div>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        {{__('Operations')}}
                    </div>
                </li>
                <!--Categories-->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#categories">
                        <span class="me-2">
                            <i class="bi bi-layout-split"></i>
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
                            <li>
                                <a href="{{ route('categories.index') }}" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-speedometer2"></i>
                                    </span>
                                    <span>View Categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('categories.create') }}" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-speedometer2"></i>
                                    </span>
                                    <span>Create category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--Units-->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#units">
                        <span class="me-2">
                            <i class="bi bi-layout-split"></i>
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
                            <li>
                                <a href="{{ route('units.index') }}" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-speedometer2"></i>
                                    </span>
                                    <span>View Units</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('units.create') }}" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-speedometer2"></i>
                                    </span>
                                    <span>Create unit</span>
                                </a>
                            </li>

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
                            <li>
                                <a href="{{ route('products.index') }}" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-speedometer2"></i>
                                    </span>
                                    <span>View Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('products.create') }}" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-speedometer2"></i>
                                    </span>
                                    <span>Create product</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--Customers-->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#customers">
                        <span class="me-2">
                            <i class="bi bi-layout-split"></i>
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
                            <li>
                                <a href="{{ route('customers.index') }}" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-speedometer2"></i>
                                    </span>
                                    <span>View Customers</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customers.create') }}" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-speedometer2"></i>
                                    </span>
                                    <span>Add customer</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--Orders-->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#orders">
                        <span class="me-2">
                            <i class="bi bi-basket-fill"></i>
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
                            <li>
                                <a href="{{ route('orders.index') }}" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-speedometer2"></i>
                                    </span>
                                    <span>View Orders</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('orders.create') }}" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-speedometer2"></i>
                                    </span>
                                    <span>Make new Order</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="my-4"><hr class="dropdown-divider bg-light" /></li>

                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Reports
                    </div>
                </li>
                <li>
                    <a href="#" class="nav-link px-3">
                        <span class="me-2"><i class="bi bi-graph-up"></i></span>
                        <span>Charts</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link px-3">
                        <span class="me-2"><i class="bi bi-table"></i></span>
                        <span>Tables</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<main class="mt-5 pt-3">
   @yield('content')
</main>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
