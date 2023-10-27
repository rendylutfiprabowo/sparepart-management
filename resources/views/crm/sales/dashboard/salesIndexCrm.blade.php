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
                jam="13:00" classIcon="bi bi-bounding-box" />
            <x-cards judulcard="Trafo Sales" angkaPersen="42" bulan="September"
                infoCard="Sales Profit Trafo Pada Penjualan Bulan Ini" jam="13:00" />
            <x-cards judulcard="Top" angkaPersen="92" bulan="September"
                infoCard="Sales Profit Trafo Pada Penjualan Bulan Ini" jam="13:00" />
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
