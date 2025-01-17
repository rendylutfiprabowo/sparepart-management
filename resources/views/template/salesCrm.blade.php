@extends('template.new_layout')
@section('sidebar')
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar border-end border-1 collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                {{-- Sidebar Search --}}
                <li class="nav-item sidebar-search d-md-none">
                    <div class="input-group">
                        <input type="text" class="form-control  bg-secondary-subtle" placeholder="Search"
                            aria-label="Search sidebars">
                        <button class="btn btn-danger" type="button"><i class="bi bi-search"></i></button>
                    </div>
                </li>
                {{-- DASHBOARD --}}
                <li class="nav-item ">
                    <a class="nav-link  {{ Request::is('sales/dashboard*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/sales/dashboard">
                        <i class="bi bi-grid me-2"></i>
                        Dashboard
                    </a>
                </li>
                {{-- CUSTOMER --}}
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('sales/customer') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/sales/customer">
                        <i class="bi bi-people me-2"></i>
                        Customers
                    </a>
                </li>

                {{-- SPAREPARTS COLLAPSE MENU --}}
                <li class="nav-item ">
                    <a href="#"
                        class="nav-link d-flex rounded border-0 collapsed {{ Request::is('sales/sparepart*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        data-bs-toggle="collapse" data-bs-target="#dashboard-collapse-sp" aria-expanded="false">
                        <div class="me-auto">
                            <i class="bi bi-tools me-2"></i> Spareparts
                        </div>
                        <div>
                            <span class="ms-5">
                                <i class="bi bi-caret-down"></i>
                            </span>
                        </div>
                    </a>
                    <div class="collapse " id="dashboard-collapse-sp">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li class="ms-4">
                                <a href="/sales/sparepart/index"
                                    class="nav-link d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/index*') ? 'text-danger' : 'fw-normal' }}"><i
                                        class="bi bi-house-gear me-2"></i>Dashboard</a>
                            </li>
                            <li class="ms-4"><a href="/sales/sparepart/stock"
                                    class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/stock*') ? 'text-danger' : 'fw-normal' }}"><i
                                        class="bi bi-box-seam me-2"></i>Stock</a>
                            </li>
                            <li class="ms-4"><a href="/sales/sparepart/revision"
                                    class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/revision*') ? 'text-danger' : 'fw-normal' }}"><i
                                        class="bi bi-file-earmark-diff me-2"></i>Pengajuan
                                    Revisi</a>
                            </li>
                            <li class="ms-4"><a href="/sales/sparepart/order"
                                    class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/order*') ? 'text-danger' : 'fw-normal' }}"><i
                                        class="bi bi-cart-plus me-2"></i>Pemesanan</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- LAB OIL COLLAPSE MENU --}}
                <li class="nav-item ">
                    <a href="#"
                        class="nav-link d-flex rounded border-0 collapsed {{ Request::is('sales/oil*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        data-bs-toggle="collapse" data-bs-target="#dashboard-collapse-oil" aria-expanded="false">
                        <div class="me-auto">
                            <i class="bi bi-droplet me-2"></i>
                            Oil Lab
                        </div>
                        <div>
                            <i class="bi bi-caret-down"></i>
                        </div>
                    </a>
                    <div class="collapse" id="dashboard-collapse-oil">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li class="ms-4"><a href="/sales/oil/index"
                                    class="nav-link d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/index') ? 'text-danger' : 'fw-normal' }}"><i
                                        class="bi bi-grid me-2"></i>Dashboard</a>
                            </li>
                            <li class="ms-4"><a href="/sales/oil/salesorder"
                                    class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/salesorder*') ? 'text-danger' : 'fw-normal' }}"><i
                                        class="bi bi-bag-plus me-2"></i>Sales
                                    Order</a>
                            </li>
                            <li class="ms-4"><a href="/sales/oil/sample"
                                    class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/sample*') ? 'text-danger' : 'fw-normal' }}"><i
                                        class="bi bi-droplet-half me-2"></i>Report Sample</a>
                            </li>
                            <li class="ms-4"><a href="/sales/oil/history"
                                    class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/history*') ? 'text-danger' : 'fw-normal' }}"><i
                                        class="bi bi-clipboard2-pulse me-2"></i>History</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-4 mt-4 mb-3 text-muted">
                <span class="text-secondary">More Menu</span>
            </h6>

            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link rounded {{ Request::is('sales/channels/indexChannels') ? 'text-white active-sidebar-link' : 'fw-normal' }} "
                        href="/sales/channels/indexChannels">
                        <span><i class="bi bi-pip me-2"></i></span>
                        Channels
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded {{ Request::is('sales/reports/indexReports') ? 'text-white active-sidebar-link' : 'fw-normal' }}"
                        href="/sales/reports/indexReports">
                        <span><i class="bi bi-file-text me-2"></i></span>
                        Reports
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
