@extends('template.layout')
@section('sidebar')
<li class="nav-item active">
    <a class="nav-link" href="/">
        <i class="fa-solid fa-chart-simple"></i>
        <span>Dashboard</span></a>
</li>

<!-- Nav Item - Report -->
<li class="nav-item">
    <a class="nav-link" href="/salesorder">
        <i class="fa-solid fa-address-card"></i>
        <span>Sales Order</span></a>
</li>

<!-- Nav Item - Report -->
<li class="nav-item">
    <a class="nav-link" href="/report_sales">
        <i class="fa-solid fa-file-circle-check"></i>
        <span>Report</span></a>
</li>

<!-- Nav Item - Sample -->
<li class="nav-item">
    <a class="nav-link" href="/sample_sales">
        <i class="fa-solid fa-vials"></i>
        <span>Sample</span></a>
</li>

<!-- Nav Item - History -->
<li class="nav-item">
    <a class="nav-link" href="/history">
        <i class="fas fa-fw fa-clock-rotate-left"></i>
        <span>History</span></a>
</li>
@endsection