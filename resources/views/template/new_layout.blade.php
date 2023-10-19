<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Trafindo - @yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/new-layout.css') }}" rel="stylesheet">
</head>

<body>
    <header class="navbar sticky-top flex-md-nowrap bg-white p-0 shadow-sm">
        {{-- LOGO --}}
        <div>
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"> <img src="/Asset/LogoTrafoindo.png"
                    width="120" height="50" class="d-inline-block" alt="trafoindo logo"></a>
        </div>

        {{-- TOOGLE MOBILE --}}
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- USER MENU --}}
        <div class="btn-group me-4">
            <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ Auth::user()->username }}
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><button class="dropdown-item" type="button">Profile</button></li>
                <li><button class="dropdown-item" type="button">Setting</button></li>
                <li><a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a></li>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </header>

    {{-- SIDEBARS --}}
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block shadow-sm bg-white sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link {{ Request::is('sales/dashboard/salesIndexCrm') ? 'text-white active rounded' : '' }}"
                                href="/sales/dashboard/salesIndexCrm">
                                <i class="bi bi-house-fill"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{ Request::is('sales/customer/salesIndexCustomer') ? 'text-white active rounded' : '' }}"
                                href="/sales/customer/salesIndexCustomer">
                                <i class="bi bi-people-fill"></i>
                                Customer
                            </a>
                        </li>
                        {{-- SPAREPARTS --}}
                        <li class="nav-item {{ Request::is('/sales/sparepart/*') ? 'text-white active' : '' }}">
                            <a href="#"
                                class="nav-link d-inline-flex align-items-center gap-1 rounded border-0 collapsed "
                                data-bs-toggle="collapse" data-bs-target="#dashboard-collapse-sp" aria-expanded="false">
                                <i class="bi bi-wrench-adjustable-circle"></i>
                                SpareParts
                                <span class="ms-5">
                                    <i class="bi bi-caret-down-fill"></i>
                                </span>

                            </a>
                            <div class="collapse" id="dashboard-collapse-sp">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li class="ms-4">
                                        <a href="/sales/sparepart/index"
                                            class="nav-link d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/index') ? 'text-white active' : '' }}"><i
                                                class="bi bi-house-gear-fill me-1"></i> <span
                                                class="me-2">Dashboard</span></a>
                                    </li>
                                    <li class="ms-4"><a href="/sales/sparepart/stock"
                                            class=" nav-link link-body-emphasis d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/stock') ? 'text-white active' : '' }}"><i
                                                class="bi bi-box-seam-fill me-1"></i> <span
                                                class="me-2">Stock</span></a>
                                    </li>
                                    <li class="ms-4"><a href="/sales/sparepart/revision"
                                            class=" nav-link link-body-emphasis d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/revision') ? 'text-white active' : '' }}"><i
                                                class="bi bi-file-earmark-diff-fill me-1"></i> <span
                                                class="me-2">Pengajuan Revisi</span></a>
                                    </li>
                                    <li class="ms-4"><a href="/sales/sparepart/order"
                                            class=" nav-link link-body-emphasis d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/order') ? 'text-white active' : '' }}"><i
                                                class="bi bi-cart-plus-fill me-1"></i> <span
                                                class="me-2">Pemesanan</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {{-- LAB OIL --}}
                        <li class="nav-item ">
                            <a href="#"
                                class="nav-link d-inline-flex align-items-center gap-1 rounded border-0 collapsed "
                                data-bs-toggle="collapse" data-bs-target="#dashboard-collapse-oil"
                                aria-expanded="false">
                                <i class="bi bi-fuel-pump-fill"></i>
                                Oil Lab
                                <span class="ms-5">
                                    <i class="bi bi-caret-down-fill"></i>
                                </span>
                            </a>
                            <div class="collapse" id="dashboard-collapse-oil">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li class="ms-4"><a href="/sales/oil/index"
                                            class="nav-link d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/index') ? 'text-white active' : '' }}"><i
                                                class="bi bi-cart-plus-fill me-1"></i> <span
                                                class="me-2">Dashboard</span></a>
                                    </li>
                                    <li class="ms-4"><a href="/sales/oil/salesorder"
                                            class=" nav-link link-body-emphasis d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/salesorder*') ? 'text-white active' : '' }}"><i
                                                class="bi bi-bag-plus-fill me-1"></i> <span class="me-2">Sales
                                                Order</span></a>
                                    </li>
                                    <li class="ms-4"><a href="/sales/oil/report"
                                            class=" nav-link link-body-emphasis d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/report*') ? 'text-white active' : '' }}">Report
                                        </a>
                                    </li>
                                    <li class="ms-4"><a href="/sales/oil/sample"
                                            class=" nav-link link-body-emphasis d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/sample*') ? 'text-white active' : '' }}">Sample</a>
                                    </li>
                                    <li class="ms-4"><a href="/sales/oil/history"
                                            class=" nav-link link-body-emphasis d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/history*') ? 'text-white active' : '' }}">History</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span class="text-secondary">Laporan Lainnya</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Bulanan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 bg-body-tertiary">
                @yield('contents')
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
</body>

</html>
