@extends('template.layout')
@section('sidebar')
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-chart-simple"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Report -->
    <li class="nav-item mt-2">
        <a class="nav-link" href="/salesorder">
            <i class="fa-solid fa-address-card"></i>
            <span>Stock</span></a>
    </li>

    <!-- Nav Item - Report -->
    <li class="nav-item mt-2">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-file-circle-check"></i>
            <span>Pemesanan</span></a>
    </li>

    <!-- Nav Item - Sample____sssasdds -->
    <li class="nav-item mt-2">
        <a class="nav-link" href="/">
            <i class="fa-solid fa-file-pen"></i>
            <span>Pengajuan Revisi</span></a>
    </li>
    
@endsection
