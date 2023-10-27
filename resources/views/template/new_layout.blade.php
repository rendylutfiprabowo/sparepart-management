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
    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/new-layout.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
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
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 ">
                {{-- MAIN --}}
                @yield('contents')
                {{-- Footers --}}

            </main>
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 text-bg-danger opacity-80 p-4 mt-4">
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
    <script>
        // TOAST SUCCESS
        const toastTrigger = document.getElementById('trigger')
        const toastLiveExample = document.getElementById('liveToast')

        if (toastTrigger) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            toastBootstrap.show()
        }

        // CHART JS
        var ctx = document.getElementById('chartSales').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'july',
                    'agustus',
                    'september',
                    'october',
                    'novermber',
                    'december'
                ],
                datasets: [{
                    label: 'Sales SpareParts',
                    data: [12, 19, 3, 5, 2, 3, 8, 9, 10, 11, 4, 5, 6],
                    backgroundColor: [
                        '#186F65',
                        '#1F618D',
                        '#F1C40F',
                        '#27AE60',
                        '#884EA0',
                        '#D35400',
                        '#D80032',
                        '#BEADFA',
                        '#FFCC70',
                        '#94A684',
                        '#5C5470',
                        '#ACFADF',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // CHART JS SECONDS
        var ctx = document.getElementById('chartSalesBar').getContext('2d');
        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Floating Bar Chart'
                    }
                }
            }
        };
        const DATA_COUNT = 7;
        const NUMBER_CFG = {
            count: DATA_COUNT,
            min: -100,
            max: 100
        };

        const labels = Utils.months({
            count: 7
        });
        const data = {
            labels: labels,
            datasets: [{
                    label: 'Dataset 1',
                    data: labels.map(() => {
                        return [Utils.rand(-100, 100), Utils.rand(-100, 100)];
                    }),
                    backgroundColor: Utils.CHART_COLORS.red,
                },
                {
                    label: 'Dataset 2',
                    data: labels.map(() => {
                        return [Utils.rand(-100, 100), Utils.rand(-100, 100)];
                    }),
                    backgroundColor: Utils.CHART_COLORS.blue,
                },
            ]
        };
        const actions = [{
            name: 'Randomize',
            handler(chart) {
                chart.data.datasets.forEach(dataset => {
                    dataset.data = chart.data.labels.map(() => {
                        return [Utils.rand(-100, 100), Utils.rand(-100, 100)];
                    });
                });
                chart.update();
            }
        }, ];
    </script>
</body>

</html>
