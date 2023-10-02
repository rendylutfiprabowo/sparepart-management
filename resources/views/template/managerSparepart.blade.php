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
            <i class="fa-solid fa-boxes-stacked"></i>
            <span>Stock</span></a>
    </li>

    <!-- Nav Item - Report -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-helmet-safety"></i>
            <span>Teknisi</span></a>
    </li>

    <!-- Nav Item - Sample____sssasdds -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-hand-holding-dollar"></i>
            <span>Sales</span></a>
    </li>
@endsection
