@extends('template.new_layout')
@section('sidebar')
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar border-end border-1 collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                {{-- DASHBOARD --}}
                <li class="nav-item ">
                    <a class="nav-link  {{ Request::is('superadmin/dashboard*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/superadmin/dashboard">
                        <i class="bi bi-grid"></i>
                        Dashboard
                    </a>
                </li>
                {{-- BUAT AKUN  --}}
                
                <li class="nav-item ">
                    <a class="nav-link  {{ Request::is('superadmin/createaccount*') ? 'text-white active-sidebar-link rounded' : 'fw-normal' }}"
                        href="/superadmin/createaccount">
                        <i class="bi bi-grid"></i>
                        Create Account
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
