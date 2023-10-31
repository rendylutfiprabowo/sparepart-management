@extends('template.new_layout')

@section('title', 'Dashboard Sales')

@section('contents')
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
