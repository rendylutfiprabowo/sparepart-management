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
        <hr>
        <x-page-heading>
            Statistik Sales Profit
        </x-page-heading>

        <div class="row">
            <div class="col-md-7">
                <canvas id="chartSales"></canvas>
            </div>
            <div class="col-md-5">
                <canvas id="chartSalesBar"></canvas>
            </div>
        </div>
    </div>
@endsection
