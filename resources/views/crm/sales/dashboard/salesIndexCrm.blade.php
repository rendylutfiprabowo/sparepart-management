@extends('template.salesCrm')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-merah font-weight-bold">Trafo Sales Profit Information</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50 "></i> Export</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            {{-- Card Penjualan Bulanan --}}
            <x-card-crm titles='Penjualan (All)' prices='Rp. 200,000,000'
                icons='fa-solid text-success fa-2x fa-hand-holding-dollar' />

            {{-- Card Data Penjualan SpareParts --}}
            <x-card-crm titles='Penjualan (SpareParts)' prices='Rp. 511,000,000'
                icons='fa-solid text-primary fa-2x fa-wrench' />

            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Oil Lab (Testing)' prices='Rp. 300,000,000'
                icons='fa-solid text-danger fa-2x fa-microscope' />

        </div>

    </div>
@endsection
