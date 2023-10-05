@extends('template.layout')
@section('sidebar')
<li class="nav-item {{ Request::is('sales/oil/index*') ? 'active' : '' }}">
    <a class="nav-link" href="/sales/oil/index">
        <i class="fa-solid fa-chart-simple"></i>
        <span>Dashboard</span></a>
</li>

<!-- Nav Item - Report -->
<li class="nav-item {{ Request::is('sales/oil/salesorder*') ? 'active' : '' }}">
    <a class="nav-link" href="/sales/oil/salesorder">
        <i class="fa-solid fa-address-card"></i>
        <span>Sales Order</span></a>
</li>

<!-- Nav Item - Report -->
<li class="nav-item {{ Request::is('sales/oil/report*') ? 'active' : '' }}">
    <a class="nav-link" href="/sales/oil/report">
        <i class="fa-solid fa-file-circle-check"></i>
        <span>Report</span></a>
</li>

<!-- Nav Item - Sample -->
<li class="nav-item {{ Request::is('sales/oil/sample*') ? 'active' : '' }}">
    <a class="nav-link" href="/sales/oil/sample">
        <i class="fa-solid fa-vials"></i>
        <span>Sample</span></a>
</li>

<!-- Nav Item - History -->
<li class="nav-item {{ Request::is('sales/oil/history*') ? 'active' : '' }}">
    <a class="nav-link" href="/sales/oil/history">
        <i class="fas fa-fw fa-clock-rotate-left"></i>
        <span>History</span></a>
</li>
@endsection