@extends('template.salesCrm')

@section('title', 'Dashboard')

@section('content')
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-danger font-weight-bold">Sales Profit Information</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50 "></i> Export</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            {{-- Card Penjualan Bulanan --}}
            <x-card-crm titles='Total Project (All)' prices='{{ count($dataProjects) }}'
                icons='fa-solid fa-2x fa-diagram-project' />
            {{-- Card Data Penjualan SpareParts --}}
            <x-card-crm titles='Penjualan (SpareParts)' prices='Rp. 511,000,000'
                icons='fa-solid text-primary fa-2x fa-wrench' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Oil Lab (Testing)' prices='Rp. 300,000,000'
                icons='fa-solid text-warning fa-2x fa-microscope' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Cancel(Project)' prices='Rp. 76,000,000' icons='fa-solid text-danger fa-2x fa-ban' />
        </div>
    </div>
@endsection
