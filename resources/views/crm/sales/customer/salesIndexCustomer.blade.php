@extends('template.new_layout')

@section('title', 'Sales Customer')

@section('contents')

    <div class="container-fluid">

        <x-page-heading>
            Dashboard Customer
        </x-page-heading>

        <!-- Card Data User -->
        <div class="row">
            <x-cards judulcard="Total Customer" angkaPersen="{{ count($dataCust) }}" bulan="Juni"
                infoCard="Customer Seluruh Indonesia Terdaftar" jam="13:00" />
        </div>
        <hr />

        {{-- TABLE DATA CUSTOMER --}}
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 font-weight-bold">Data Table Of Customer</h1>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm rounded btn-success" data-bs-toggle="modal"
                data-bs-target="#addCustModal"><i class="bi bi-plus-circle-fill me-1"></i>Add </button>
        </div>

        <div class="row p-2">
            <table class="table table-hover bg-white">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name Customer</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jenis Usaha</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($dataCust) > 0)
                        @foreach ($dataCust as $dataTable)
                            <tr>
                                <th scope="row">{{ $dataTable->id }}</th>
                                <td><a
                                        href="{{ url('/sales/customer/customerDetails' . $dataTable->id) }}">{{ $dataTable->nama_customer }}</a>
                                </td>
                                <td>{{ $dataTable->phone_customer }}</td>
                                <td> <a href="#">{{ $dataTable->email_customer }}</a></td>
                                <td><a href="#" class="text-dark">{{ $dataTable->jenisusaha_customer }}</a></td>
                            </tr>
                        @endforeach
                    @else
                        <p>Tidak ada data customer</p>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Add Customer -->
    <div class="modal fade" id="addCustModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Customer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
