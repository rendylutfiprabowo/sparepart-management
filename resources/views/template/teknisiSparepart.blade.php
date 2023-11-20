@extends('template.new_layout')
@section('sidebar')
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar border-end border-1 collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                {{-- Sidebar Search --}}
                {{-- DASHBOARD --}}
                <li class="nav-item ">
                    <a class="nav-link  {{ Request::is('technician/index*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/technician/index">
                        <i class="bi bi-grid"></i>
                        Dashboard
                    </a>
                </li>
                {{-- CUSTOMER --}}
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('technician/listspk*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/technician/listspk">
                        <i class="bi bi-people"></i>
                        List SPK
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('technician/tools*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/technician/tools">
                        <i class="bi bi-people"></i>
                       Technician Tools
                    </a>
                </li>



</nav>


                <!-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar border-end collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            {{-- Sidebar Search --}}
            <li class="nav-item sidebar-search d-md-none">
                <div class="input-group">
                    <input type="text" class="form-control  bg-secondary-subtle" placeholder="Search"
                        aria-label="Search sidebars">
                    <button class="btn btn-danger" type="button"><i class="bi bi-search"></i></button>
                </div>
            </li>
            {{-- DASHBOARD --}}
            <li class="nav-item ">
                <a class="nav-link {{ Request::is('technician/index*') ? 'text-white active rounded' : '' }}"
                    href="/technician/index">
                    <i class="bi bi-grid-fill"></i>
                    Dashboard
                </a>
            </li>
            {{-- List Spk --}}
            <li class="nav-item ">
                <a class="nav-link {{ Request::is('technician/listspk*') ? 'text-white active rounded' : '' }}"
                    href="/technician/listspk">
                    <i class="fa-solid fa-file-circle-check"></i>
                    List Spk
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ Request::is('technician/tools*') ? 'text-white active rounded' : '' }}"
                    href="/technician/tools">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    Request Tools
                </a>
            </li>
        </ul>

    </div>
 
 
 
 
 
 
 
 
 
 
 
 
 





















    <!-- <li class="nav-item {{ Request::is('technician/index*') ? 'active' : '' }}">
        <a class="nav-link" href="/technician/index">
            <i class="fa-solid fa-chart-simple"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ Request::is('technician/listspk*') ? 'active' : '' }}">
        <a class="nav-link" href="/technician/listspk">
            <i class="fa-solid fa-file-circle-check"></i>
            <span>List SPK</span></a>
    </li>
    <li class="nav-item {{ Request::is('technician/tools*') ? 'active' : '' }}">
        <a class="nav-link" href="/technician/tools">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <span>Request Tools</span></a>
    </li> -->
@endsection
