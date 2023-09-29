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
            <i class="fa-solid fa-file-circle-check"></i>
            <span>List SPK</span></a>
    </li>
@endsection
