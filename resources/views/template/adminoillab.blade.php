@extends('template.layout')
@section('sidebar')
<li class="nav-item active">
    <a class="nav-link" href="index_adminlab">
        <i class="fa-solid fa-chart-simple"></i>
        <span>Dashboard</span></a>
</li>


<!-- Nav Item - Order List -->
<li class="nav-item">
    <a class="nav-link" href="report_adminlab">
        <i class="fa-solid fa-file-circle-check"></i>
        <span>Report</span></a>
</li>

<!-- Nav Item - History -->
<li class="nav-item">
    <a class="nav-link" href="history_adminlab">
        <i class="fas fa-fw fa-clock-rotate-left"></i>
        <span>History</span></a>
</li>

@endsection