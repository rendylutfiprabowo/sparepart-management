@extends('template.layout')
@section('sidebar')
    <li class="nav-item {{ Request::is('superadmin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/superadmin/dashboard">
            <i class="fa-solid fa-chart-simple"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
@endsection
