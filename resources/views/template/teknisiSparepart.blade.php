@extends('template.layout')
@section('sidebar')
    <li class="nav-item {{ Request::is('technician/index*') ? 'active' : '' }}">
        <a class="nav-link" href="/technician/index">
            <i class="fa-solid fa-chart-simple"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Report -->
    <li class="nav-item {{ Request::is('technician/listspk*') ? 'active' : '' }}">
        <a class="nav-link" href="/technician/listspk">
            <i class="fa-solid fa-file-circle-check"></i>
            <span>List SPK</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <span>Request Tools</span></a>
    </li>
@endsection
