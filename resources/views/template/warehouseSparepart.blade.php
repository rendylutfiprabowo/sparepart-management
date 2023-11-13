@extends('template.new_layout')

@section('sidebar')
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar border-end border-1 collapse bg-white">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('warehouse/dashboard*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/warehouse/dashboard">
                        <i class="bi bi-grid"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/warehouse/stock*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/warehouse/stock">
                        <i class="bi bi-box"></i>
                        Stock
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('warehouse/listspk*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/warehouse/listspk">
                        <i class="bi bi-list-task"></i>
                        List Spk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('warehouse/branch/returItem*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/warehouse/branch/returItem">
                        <i class="bi bi-recycle"></i>
                        Return Item
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('warehouse/tools*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/warehouse/tools">
                        <i class="bi bi-wrench-adjustable"></i>
                        Tools
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('warehouse/branch/request-item*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="#">
                        <i class="bi bi-clipboard2-plus"></i>
                        Request Items
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
