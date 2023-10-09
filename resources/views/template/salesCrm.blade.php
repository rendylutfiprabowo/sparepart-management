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

    <li class="nav-item {{ Request::is('sales/sparepart*') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#collapseSparePart" role="button" aria-expanded="false"
            aria-controls="collapseSparePart">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            Spareparts
        </a>
    </li>
    <div class="collapse" id="collapseSparePart">
        <div class="">
            <li class="nav-item {{ Request::is('sales/sparepart/index*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/sparepart/index">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item {{ Request::is('sales/sparepart/stock*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/sparepart/stock">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Stock</span></a>
            </li>
            <li class="nav-item {{ Request::is('sales/sparepart/order*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/sparepart/order">
                    <i class="fa-solid fa-file-circle-check"></i>
                    <span>Pemesanan</span></a>
            </li>
            <li class="nav-item {{ Request::is('sales/sparepart/revision*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/sparepart/revision">
                    <i class="fas fa-fw fa-clock-rotate-left"></i>
                    <span>Pengajuan Revisi</span></a>
            </li>
        </div>
    </div>

    <li class="nav-item {{ Request::is('sales/oil*') ? 'active' : '' }}">
        <a class="nav-link collapsed" data-toggle="collapse" href="#collapseOil" role="button" aria-expanded="false"
            aria-controls="collapseOil">
            <i class="fa-solid fa-oil-can"></i>
            Oil Lab
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
            <li class="nav-item {{ Request::is('sales/oil/sample*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/oil/sample">
                    <i class="fa-solid fa-file-circle-check"></i>
                    <span>Sample</span></a>
            </li>
            <li class="nav-item {{ Request::is('sales/oil/history*') ? 'active' : '' }}">
                <a class="nav-link pl-5" href="/sales/oil/history">
                    <i class="fas fa-fw fa-clock-rotate-left"></i>
                    <span>History</span></a>
            </li>
        </div>
    </div>
@endsection
