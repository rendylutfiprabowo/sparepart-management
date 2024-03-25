@extends('template.new_layout')

@section('sidebar')
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar border-end border-1 collapse bg-white">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('manager/dashboard*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/manager/dashboard">
                        <i class="bi bi-grid"></i>
                        Dashboard
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('manager/addUser*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/manager/addUser">
                        <i class="bi bi-person-add"></i>
                        Add User
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('manager/printReport*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/manager/printReport">
                        <i class="bi bi-printer"></i>
                        Print Report
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
