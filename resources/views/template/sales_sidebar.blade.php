<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar border-end collapse">
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
                <a class="nav-link {{ Request::is('sales/dashboard*') ? 'text-white active rounded' : '' }}"
                    href="/sales/dashboard">
                    <i class="bi bi-grid-fill"></i>
                    Dashboard
                </a>
            </li>
            {{-- CUSTOMER --}}
            <li class="nav-item ">
                <a class="nav-link {{ Request::is('sales/customer') ? 'text-white active rounded' : '' }}"
                    href="/sales/customer">
                    <i class="bi bi-people-fill"></i>
                    Customer
                </a>
            </li>

            {{-- SPAREPARTS COLLAPSE MENU --}}
            <li class="nav-item ">
                <a href="#" class="nav-link d-flex rounded border-0 collapsed " data-bs-toggle="collapse"
                    data-bs-target="#dashboard-collapse-sp" aria-expanded="false">
                    <div class="me-auto">
                        <i class="bi bi-tools"></i> SpareParts
                    </div>
                    <div>
                        <span class="ms-5">
                            <i class="bi bi-caret-down-fill"></i>
                        </span>
                    </div>
                </a>
                <div class="collapse " id="dashboard-collapse-sp">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="ms-4">
                            <a href="/sales/sparepart/index"
                                class="nav-link d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/index') ? 'text-white active' : '' }}"><i
                                    class="bi bi-house-gear-fill me-1"></i> <span class="me-2">Dashboard</span></a>
                        </li>
                        <li class="ms-4"><a href="/sales/sparepart/stock"
                                class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/stock') ? 'text-white active' : '' }}"><i
                                    class="bi bi-box-seam-fill me-1"></i> <span class="me-2">Stock</span></a>
                        </li>
                        <li class="ms-4"><a href="/sales/sparepart/revision"
                                class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/revision') ? 'text-white active' : '' }}"><i
                                    class="bi bi-file-earmark-diff-fill me-1"></i> <span class="me-2">Pengajuan
                                    Revisi</span></a>
                        </li>
                        <li class="ms-4"><a href="/sales/sparepart/order"
                                class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/sparepart/order') ? 'text-white active' : '' }}"><i
                                    class="bi bi-cart-plus-fill me-1"></i> <span class="me-2">Pemesanan</span></a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- LAB OIL COLLAPSE MENU --}}
            <li class="nav-item ">
                <a href="#" class="nav-link d-flex rounded border-0 collapsed " data-bs-toggle="collapse"
                    data-bs-target="#dashboard-collapse-oil" aria-expanded="false">
                    <div class="me-auto">
                        <i class="bi bi-droplet-fill"></i>
                        Oil Lab
                    </div>
                    <div>
                        <i class="bi bi-caret-down-fill"></i>
                    </div>
                </a>
                <div class="collapse" id="dashboard-collapse-oil">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="ms-4"><a href="/sales/oil/index"
                                class="nav-link d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/index') ? 'text-white active' : '' }}"><i
                                    class="bi bi-grid-fill me-1"></i> <span class="me-2">Dashboard</span></a>
                        </li>
                        <li class="ms-4"><a href="/sales/oil/salesorder"
                                class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/salesorder*') ? 'text-white active' : '' }}"><i
                                    class="bi bi-bag-plus-fill me-1"></i> <span class="me-2">Sales
                                    Order</span></a>
                        </li>
                        <!-- <li class="ms-4"><a href="/sales/oil/report"
                                class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/report*') ? 'text-white active' : '' }}"><i
                                    class="bi bi-file-earmark-check-fill me-1"></i> <span
                                    class="me-2">Report</span></a>
                        </li> -->
                        <li class="ms-4"><a href="/sales/oil/sample"
                                class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/sample*') ? 'text-white active' : '' }}"><i
                                    class="bi bi-droplet-half me-1"></i> <span class="me-2">Report Sample</span></a>
                        </li>
                        <li class="ms-4"><a href="/sales/oil/history"
                                class=" nav-link  d-inline-flex text-decoration-none rounded {{ Request::is('sales/oil/history*') ? 'text-white active' : '' }}"><i
                                    class="bi bi-clipboard2-pulse-fill me-1"></i> <span
                                    class="me-2">History</span></a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span class="text-secondary">Menu Lainnya</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="/sales/channels/indexChannels">
                    <span><i class="bi bi-pip-fill"></i></span>
                    Channels
                </a>
            </li>
        </ul>
    </div>
</nav>
