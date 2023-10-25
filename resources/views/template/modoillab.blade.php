@extends('template.layout')
@section('sidebar')
<li class="nav-item {{ Request::is('index_modlab') ? 'active' : '' }}">
    <a class="nav-link" href="index_modlab">
        <i class="fa-solid fa-chart-simple"></i>
        <span>Dashboard</span></a>
</li>


<!-- Nav Item - Order List -->
<li class="nav-item {{ Request::is('report_modlab') ? 'active' : '' }}">
    <a class="nav-link" href="report_modlab">
        <i class="fa-solid fa-file-circle-check"></i>
        <span>Report</span></a>
</li>

<!-- Nav Item - History -->
<li class="nav-item {{ Request::is('history_modlab') ? 'active' : '' }}">
    <a class="nav-link" href="history_modlab">
        <i class="fas fa-fw fa-clock-rotate-left"></i>
        <span>History</span></a>
</li>

@endsection