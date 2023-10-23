@extends('template.new_layout')

@section('title', 'Sales Customer Details')

@section('contents')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div>
            <p>Nama : {{ $dataCust->nama_customer }}</p>
        </div>

    </div>
@endsection
