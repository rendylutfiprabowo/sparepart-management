@extends('template.superadmin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mt-4">
        <h1 class="h3 mb-0 text-gray-800">Performance Overview</h1>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body shadow">
                    <h1 class="text-center font-weight-bold ">35</h1>
                    <p class="text-center text-muted font-weight-bold">TEST IN PROGRESS</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <p class="text-right text-muted font-weight-bold text-truncate ">DGA : 12</p>
                        </div>
                        <div class="col">
                            <p class="text-right text-muted font-weight-bold text-truncate">Furan : 10</p>
                        </div>
                        <div class="col">
                            <p class="text-right text-muted font-weight-bold text-truncate">OA : 30</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body shadow">
                    <h1 class="text-center font-weight-bold ">190</h1>
                    <p class="text-center text-muted font-weight-bold">TEST COMPLETED</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <p class="text-right text-muted font-weight-bold text-center">Last Month : 212</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body merah shadow">
                    <h1 class="text-center text-putih font-weight-bold ">35</h1>
                    <p class="text-center text-putih font-weight-bold">CUSTOMER</p>
                    <hr style="background-color: #FFFFFF;">
                    <div class="row">
                        <div class="col">
                            <p class="text-right text-putih font-weight-bold text-center">Last Month : 20</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body merah shadow">
                    <h1 class="text-center text-putih font-weight-bold ">30</h1>
                    <p class="text-center text-putih font-weight-bold">PROJECT</p>
                    <hr style="background-color: #FFFFFF;">
                    <div class="row">
                        <div class="col">
                            <p class="text-right text-putih font-weight-bold text-center">Last Month : 30</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <x-page-heading>
            Dashboard
        </x-page-heading>
        <!-- Content Row Card -->
        <div class="row">
            <x-cards judulcard="Project" angkaPersen="12" bulan="Juni" infoCard="Sales Profit Pada Penjualan Bulan Ini"
                tanggal="15 oct 2023" classIcon="bi bi-bounding-box" />
            <x-cards judulcard="Trafo Sales" angkaPersen="42" bulan="September"
                infoCard="Sales Profit Trafo Pada Penjualan Bulan Ini" tanggal="15 oct 2023" />
            <x-cards judulcard="Top Customer" angkaPersen="1" bulan="September" infoCard="PT. Makmur Jaya Abadi"
                tanggal="11 oct 2023" />
        </div>
        <br>
        <x-page-heading>
            Statistik Sales Profit
        </x-page-heading>
        <div class="row">
            <div class="col-md-4 ">
                <div class="bg-white shadow-sm rounded">
                    <canvas id="chartSales"></canvas>
                </div>

            </div>
            <div class="col-md-8 ">
                <div class="bg-white shadow-sm rounded">
                    <canvas id="chartSalesLine"></canvas>
                </div>

            </div>

        </div>
    </div>
@endsection
