@extends('template.layout')
@section('sidebar')
<li class="nav-item {{ Request::is('index_lab') ? 'active' : '' }}">
    <a class="nav-link" href="/index_lab">
        <i class="fa-solid fa-chart-simple"></i>
        <span>Dashboard</span></a>
</li>

<!-- Nav Item - Item Test -->
<li class="nav-item {{ Request::is('item_test') ? 'active' : '' }}">
    <a class="nav-link" href="/item_test">
        <i class="fa-solid fa-flask-vial"></i>
        <span>Item Test</span></a>
</li>

<!-- Nav Item - Order List -->
<li class="nav-item {{ Request::is('orderlist') ? 'active' : '' }}">
    <a class="nav-link" href="/orderlist">
        <i class="fa-solid fa-file-circle-check"></i>
        <span>Order List</span></a>
</li>

<!-- Nav Item - History -->
<li class="nav-item {{ Request::is('history_lab') ? 'active' : '' }}">
    <a class="nav-link" href="/history_lab">
        <i class="fas fa-fw fa-clock-rotate-left"></i>
        <span>History</span></a>
</li>

@endsection