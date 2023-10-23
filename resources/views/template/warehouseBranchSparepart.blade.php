@extends('template.layout')
@section('sidebar')
    <li class="nav-item {{ Request::is('warehouse/dashboard*') ? 'active' : '' }}">
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
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-tent-arrow-turn-left"></i>
            <span>Return Item</span></a>
    </li>
    <li class="nav-item {{ Request::is('warehouse/branch/tools*') ? 'active' : '' }}">
        <a class="nav-link" href="/warehouse/branch/tools">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <span>Tools</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-receipt"></i>
            <span>Request Item</span></a>
    </li>
@endsection