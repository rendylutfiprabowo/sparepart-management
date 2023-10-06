@extends('template.layout')
@section('sidebar')
    <li class="nav-item text-center">
        <a class="nav-link" href="#" role="button" aria-expanded="false">
            <i class="fa-solid fa-gauge"></i>
            Dashboard
        </a>
    </li>
    <li>
        <hr class="sidebar-divider d-none d-md-block">
    </li>

    <li class="nav-item text-center">
        <a class="nav-link" data-toggle="collapse" href="#collapseSparePart" role="button" aria-expanded="false"
            aria-controls="collapseSparePart">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            Spare Parts
        </a>
    </li>
    <div class="collapse" id="collapseSparePart">
        <div class="">
            <li class="nav-item {{ Request::is('sales/oil/index*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/oil/index">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item {{ Request::is('sales/oil/salesorder*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/oil/salesorder">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Sales Order</span></a>
            </li>
            <li class="nav-item {{ Request::is('sales/oil/report*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/oil/report">
                    <i class="fa-solid fa-file-circle-check"></i>
                    <span>Report</span></a>
            </li>
            <li class="nav-item {{ Request::is('sales/oil/history*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/oil/history">
                    <i class="fas fa-fw fa-clock-rotate-left"></i>
                    <span>History</span></a>
            </li>
        </div>
    </div>
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Menu</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <div class="list-group">
                    <a class="collapse-item {{ Request::is('sales/oil/index*') ? 'active' : '' }}" href="/sales/oil/index">
                        <i class="fa-solid fa-chart-simple"></i> Dashboard</a>
                </div>

                <a class="collapse-item {{ Request::is('sales/oil/salesorder*') ? 'active' : '' }}"
                    href="/sales/oil/salesorder"> <i class="fa-solid fa-address-card"></i> Sales Order</a>
                <a class="collapse-item {{ Request::is('sales/oil/report*') ? 'active' : '' }}" href="/sales/oil/report"> <i
                        class="fa-solid fa-file-circle-check"></i> Report</a>
                <a class="collapse-item {{ Request::is('sales/oil/history*') ? 'active' : '' }}"
                    href="/sales/oil/history"><i class="fas fa-fw fa-clock-rotate-left"></i> History</a>
            </div>
        </div>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#collapseOil" role="button" aria-expanded="false"
            aria-controls="collapseOil">
            <i class="fa-solid fa-oil-can"></i>
            Sales Oil
        </a>
    </li>
    <div class="collapse" id="collapseOil">
        <div class="p-2">
            <li class="nav-item {{ Request::is('sales/oil/index*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/oil/index">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item {{ Request::is('sales/oil/salesorder*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/oil/salesorder">
                    <i class="fa-solid fa-address-card"></i>
                    <span>Sales Order</span></a>
            </li>
            <li class="nav-item {{ Request::is('sales/oil/report*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/oil/report">
                    <i class="fa-solid fa-file-circle-check"></i>
                    <span>Report</span></a>
            </li>
            <li class="nav-item {{ Request::is('sales/oil/history*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/oil/history">
                    <i class="fas fa-fw fa-clock-rotate-left"></i>
                    <span>History</span></a>
            </li>
        </div>
    </div>
@endsection
