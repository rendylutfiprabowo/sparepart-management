@extends('template.layout')
@section('sidebar')
    <li class="nav-item {{ Request::is('/manager_spareparts') ? 'active' : '' }}">
        <a class="nav-link" href="/manager_spareparts">
            <i class="fa-solid fa-chart-simple"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Report -->
    <li class="nav-item{{ Request::is('/stock_manager_spareparts*') ? 'active' : '' }}">
        <a class="nav-link" href="/stock_manager_spareparts">
            <i class="fa-solid fa-boxes-stacked"></i>
            <span>Stock</span></a>
    </li>

    <!-- Nav Item - Report -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-helmet-safety"></i>
            <span>Technician</span></a>
    </li>

    <!-- Nav Item - Sample____sssasdds -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-hand-holding-dollar"></i>
            <span>Sales</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/">
            <iconify-icon icon="clarity:clipboard-outline-badged"></iconify-icon>
            <span>Request Item</span></a>
    </li>
@endsection
