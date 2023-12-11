<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="system of trafindo solution">
    <title>Trafindo - @yield('title')</title>

    {{-- LINK CDN  --}}
    <link rel="shortcut icon" href="https://www.trafoindonesia.com/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>

    {{-- LINK STYLE --}}
    <link href="{{ asset('/css/new-layout.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <style>
        html,
        body {
            height: 500px;
            width: 100%;
        }

        #myChart {
            height: 500px;
            width: 100%;
            min-height: 150px;
        }

        .zc-ref {
            display: none;
        }
    </style>
</head>

<body class="bg-secondary-subtle">
    {{-- HEADER --}}
    <header class="navbar d-flex justify-content-between fixed-top bg-white p-1 px-3 shadow-sm">
        <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- LOGO  --}}
        <div>
            <a class="navbar-brand" href="#"> <img src="/Asset/LogoTrafoindo.png" width="120" height="50"
                    class="d-inline-block" alt="LOGO"></a>
        </div>


        <div class="d-flex gap-2 align-items-center">
            @if (auth()->user()->id_role == 2)
                <!-- Tampilkan tombol "Add Data Customer" hanya untuk peran "sales" -->
                <div>
                    <x-button-secondary class="d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#modalAddCust"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                            <path
                                d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                        </svg></x-button-secondary>
                </div>

                <div>
                    <x-notification />
                </div>

                <div>
                    <x-emails />
                </div>
            @endif



            {{-- NOTIFICATION --}}


            {{-- EMAIL --}}


            {{-- USER MENU --}}
            <div class="vr"></div>
            <div class="dropdown">
                <button type="button"
                    class="btn dropdown-toggle d-flex align-items-center  {{ Request::is('sales/profile/indexProfile') ? 'text-danger' : '' }}"
                    data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    {{ Auth::user()->username }}
                </button>
                <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-end shadow">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 {{ Request::is('sales/profile/indexProfile') ? 'bg-danger text-white' : '' }}"
                            href="/sales/profile/indexProfile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                            </svg>
                            Profile
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item  d-flex align-items-center gap-2" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                            Logout
                        </a>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    {{-- =========== WRAP CONTENT =========== --}}
    <div class="container-fluid ">
        <br>
        <br>
        <div class="row mt-2">
            {{-- SIDEBAR / HEADER --}}
            @yield('sidebar')

            {{-- CONTENT --}}
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-3 pt-3">
                @yield('contents')
                @yield('contents2')
                <br>
                <br>
            </main>
            {{-- FOOTER --}}
            <div class="col-md-9 ms-sm-auto col-lg-10 footer-custom border-top border-1 bg-white p-2">
                <div class="text-center">
                    <small class="text-secondary">&copy; 2023 PT. Trafindo, All rights reserved.</small>
                </div>
            </div>
        </div>
    </div>
    {{-- =========== WRAP CONTENT END =========== --}}

    {{-- MODAL FORM CUSTOMERS --}}
    <div class="modal fade" id="modalAddCust" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambahkan Customers</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-2">
                        <form class="needs-validation" action="{{ route('addCust') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="idCustomer" class="form-label">ID CUSTOMER</label>
                                    <input type="text" class="form-control" id="idCustomer" name="id_customer"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="namaCustomer" class="form-label">Nama Customer</label>
                                    <input type="text" class="form-control" id="namaCustomer"
                                        name="nama_customer" required>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone </label>
                                    <input type="text" class="form-control" id="phone" name="phone_customer">
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="email" name="email_customer">
                                </div>
                                <div class="col-12">
                                    <label for="Jenis Usaha" class="form-label">Jenis Usaha </label>
                                    <input type="text" class="form-control" id="JenisUsaha"
                                        name="jenisusaha_customer">
                                </div>
                            </div>
                            <br>
                            <div>
                                <button class="btn btn-danger w-100" type="submit">Submit</button>
                            </div>
                            @if (session('status'))
                                <div id="trigger"></div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPT / CDN / PLUGIN --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/js/sales-crm.js') }}"></script>
    <script src="{{ asset('/js/technician.js') }}"></script>
</body>

</html>
