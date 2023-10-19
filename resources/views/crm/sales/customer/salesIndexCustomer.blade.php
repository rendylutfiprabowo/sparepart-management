@extends('template.new_layout')

@section('title', 'Sales Customer')

@section('contents')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-merah font-weight-bold">Customer Data</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50 "></i> Export</a>
        </div>

        <!-- Card Data User -->
        <div class="row">
            {{-- Card Total Customer --}}
            <x-card-crm titles='Total Customers ' prices='{{ count($dataCust) }}'
                icons='fa-solid text-gray-900 fa-2x fa-users-line' />

            {{-- Card Total Projects --}}
            <x-card-crm titles='Total Projects ' prices='{{ count($dataCust) }}'
                icons='fa-solid fa-2x fa-diagram-project text-gray-900' />
        </div>
        <hr />
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-merah font-weight-bold">Table Of Customer</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm rounded btn-success"><i
                    class="fas fa-plus fa-sm text-white-50 "></i> Add </a>
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
                                <td><a href="{{ url('/sales/customer/customerDetails' . $dataTable->id) }}"
                                        class="text-merah">{{ $dataTable->nama_customer }}</a></td>
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
@endsection
