@extends('template.layout')
@section('sidebar')
    <li class="nav-item {{ Request::is('sales/dashboard/salesIndexCrm') ? 'active' : '' }} text-center">
        <a class="nav-link" href="/sales/dashboard/salesIndexCrm" role="button" aria-expanded="false">
            <i class="fa-solid fa-gauge"></i>
            Dashboard
        </a>
    </li>
    {{-- New Dashboard SpareParts --}}
    <li class="nav-item  {{ Request::is('sales/sparepart*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSpareParts"
            aria-expanded="false" aria-controls="collapseTwo">
            <i class="fa-solid fa-screwdriver-wrench "></i>
            <span>Spareparts</span>
        </a>
        <div id="collapseSpareParts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
            style="">
            <div class=" py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu SpareParts</h6>
                <a class="collapse-item {{ Request::is('sales/sparepart/index') ? 'merah text-white' : '' }}"
                    href="/sales/sparepart/index">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Dashboard</span></a>
                <a class="collapse-item {{ Request::is('sales/sparepart/stock') ? 'merah text-white' : '' }}"
                    href="/sales/sparepart/stock"><i class="fa-solid fa-cubes"></i>
                    <span>Stock</span></a>
                <a class="collapse-item {{ Request::is('sales/sparepart/order') ? 'merah text-white' : '' }}"
                    href="/sales/sparepart/order"><i class="fa-solid fa-cart-shopping"></i>
                    <span>Pemesanan</span></a>
                <a class="collapse-item {{ Request::is('sales/sparepart/revision') ? 'merah text-white' : '' }}"
                    href="/sales/sparepart/revision"><i class="fa-solid fa-clipboard-check"></i>
                    <span>Pengajuan Revisi</span></a>
            </div>
        </div>
    </li>
    <li>
        <hr class="sidebar-divider d-none d-md-block">
    </li>

    {{-- New Dashboard OilLab --}}
    <li class="nav-item {{ Request::is('sales/oil*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOil" aria-expanded="false"
            aria-controls="collapseTwo">
            <i class="fa-solid fa-vial"></i>
            <span>OilLab</span>
        </a>
        <div id="collapseOil" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class=" py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu OilLab</h6>
                <a class="collapse-item {{ Request::is('sales/oil/index*') ? 'merah text-white' : '' }}"
                    href="/sales/oil/index"> <i class="fa-solid fa-chart-simple"></i>
                    <span>Dashboard</span></a>
                <a class="collapse-item {{ Request::is('sales/oil/salesorder*') ? 'merah text-white' : '' }}"
                    href="/sales/oil/salesorder"><i class="fa-solid fa-cart-shopping"></i>
                    <span>Sales Order</span></a>
                <a class="collapse-item {{ Request::is('sales/oil/report*') ? 'merah text-white' : '' }}"
                    href="/sales/oil/report"><i class="fa-solid fa-file-circle-check"></i>
                    <span>Report</span></a>
                <a class="collapse-item {{ Request::is('sales/oil/sample*') ? 'merah text-white' : '' }}"
                    href="/sales/oil/sample"><i class="fa-solid fa-vials"></i>
                    <span>Sample</span></a>
                <a class="collapse-item {{ Request::is('sales/oil/history*') ? 'merah text-white' : '' }}"
                    href="/sales/oil/history"><i class="fa-solid fa-file-invoice"></i>
                    <span>History</span></a>
            </div>
        </div>
    </li>
@endsection
