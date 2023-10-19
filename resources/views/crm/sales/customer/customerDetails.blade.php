@extends('template.new_layout')

@section('title', 'Sales Customer Details')

@section('contents')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-merah font-weight-bold">Customer Details</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50 "></i> Export</a>
        </div>
        <div>
            <p>Nama : {{ $dataCustById->nama_customer }}</p>
        </div>

    </div>
@endsection
