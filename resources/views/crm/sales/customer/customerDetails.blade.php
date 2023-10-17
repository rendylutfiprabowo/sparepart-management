@extends('template.salesCrm')

@section('title', 'Sales Customer Details')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-merah font-weight-bold">Customer Details</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50 "></i> Export</a>
        </div>

        <!-- Card Data User -->
        <div class="row">
            {{-- Card Total Customer --}}
            <x-card-crm titles='Total Customers ' prices='{{ count($dataCust) }}' icons='fa-solid fa-2x fa-users-line' />

            {{-- Card Total Projects --}}
            <x-card-crm titles='Total Projects ' prices='{{ count($dataCust) }}' icons='fa-solid fa-2x fa-users-line' />
        </div>
        <hr />
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-merah font-weight-bold">Table Of Customer</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm rounded btn-success"><i
                    class="fas fa-plus fa-sm text-white-50 "></i> Add </a>
        </div>

    </div>
@endsection
