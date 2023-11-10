@extends('template.new_layout')

@section('sidebar')
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar border-end border-1 collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('warehouse/dashboard*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="#">
                        <i class="bi bi-grid"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('warehouse/branch/stock*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/warehouse/branch/stock">
                        <i class="bi bi-box"></i>
                        Stock
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('warehouse/branch/listspk*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/warehouse/branch/listspk">
                        <i class="bi bi-list-task"></i>
                        List Spk
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('warehouse/branch/returItem*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/warehouse/branch/returItem">
                        <i class="bi bi-recycle"></i>
                        Return Item
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('warehouse/branch/tools*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/warehouse/branch/tools">
                        <i class="bi bi-wrench-adjustable"></i>
                        Tools
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('#') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="#">
                        <i class="bi bi-clipboard2-plus"></i>
                        Request Items
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- <li class="nav-item {{ Request::is('warehouse/dashboard*') ? 'active' : '' }}">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-chart-simple"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Report -->
    <li class="nav-item {{ Request::is('warehouse/branch/stock*') ? 'active' : '' }}">
        <a class="nav-link" href="/warehouse/branch/stock">
            <i class="fa-solid fa-address-card"></i>
            <span>Stock</span></a>
    </li>

    <!-- Nav Item - Report -->
    <li class="nav-item {{ Request::is('warehouse/branch/listspk*') ? 'active' : '' }}">
        <a class="nav-link" href="/warehouse/branch/listspk">
            <i class="fa-solid fa-file-circle-check"></i>
            <span>List SPK</span></a>
    </li>
    <li class="nav-item {{ Request::is('warehouse/branch/returItem*') ? 'active' : '' }}">
        <a class="nav-link" href="/warehouse/branch/returItem">
            <i class="fa-solid fa-tent-arrow-turn-left"></i>
            <span>Return Item</span></a>
    </li>
    <li class="nav-item {{ Request::is('warehouse/branch/tools*') ? 'active' : '' }}">
        <a class="nav-link" href="/warehouse/branch/tools">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <span>Tools</span></a>
    </li>
    <li class="nav-item {{ Request::is('warehouse/branch/request-item*') ? 'active' : '' }}">
        <a class="nav-link" href="/warehouse/branch/request-item">
            <i class="fa-solid fa-receipt"></i>
            <span>Request Item</span></a>
    </li> --}}
@endsection
