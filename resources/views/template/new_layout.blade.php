<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Trafindo - @yield('title')</title>

    {{-- LINKS --}}
    <link rel="shortcut icon" href="https://www.trafoindonesia.com/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('/css/new-layout.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    {{-- STYLE CUSTOM --}}
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body class="bg-secondary-subtle">
    <header class="navbar sticky-top flex-md-nowrap p-1 bg-white shadow-sm">
        {{-- TOOGLE MOBILE --}}
        <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- LOGO --}}
        <div>
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"> <img src="/Asset/LogoTrafoindo.png"
                    width="120" height="50" class="d-inline-block" alt="LOGO"></a>
        </div>

        {{-- SEARCH BAR --}}
        <x-searchbar />

        {{-- NOTIFICATION --}}
        <div>
            <x-notification />
        </div>
        {{-- USER MENU --}}
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ Auth::user()->username }}
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><button class="dropdown-item" type="button">Profile</button></li>
                <li><button class="dropdown-item" type="button">Setting</button></li>
                <li><a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a></li>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </header>

    {{-- WRAP CONTENT --}}
    <div class="container-fluid">
        <div class="row">
            {{-- SIDEBARS --}}
            @extends('template.sales_sidebar')

            {{-- CONTENTS --}}
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-3 pt-2 ">
                {{-- MAIN --}}
                @yield('contents')
                {{-- Footers --}}

            </main>
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-1 text-bg-light p-4 mt-4">
                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright my-auto text-center">
                            <span>Copyright &copy; Trafoindo 2023</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    {{-- SCRIPT CDN --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('/js/new-layout.js') }}"></script>
</body>

</html>
