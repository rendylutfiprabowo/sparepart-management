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
                        <th scope="col">ID Customer</th>
                        <th scope="col">Nama Customer</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jenis Usaha</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($dataCust) > 0)
                        @foreach ($dataCust as $dataTable)
                            <tr>
                                <td scope="row">{{ $dataTable->id_customer }}</th>
                                <td><a class="fw-bold"
                                        href="{{ url('/sales/customer/customerDetails/' . $dataTable->id_customer) }}">{{ $dataTable->nama_customer }}</a>
                                </td>
                                <td>{{ $dataTable->phone_customer }}</td>
                                <td> <a href="#">{{ $dataTable->email_customer }}</a></td>
                                <td>{{ $dataTable->jenisusaha_customer }}</td>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Data Customer</h1>
                    <button type="button" class="btn-close text-danger" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-2">
                        <form class="needs-validation" action="{{ route('addCust') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="idCustomer" class="form-label">ID CUSTOMER</label>
                                    <input type="text" class="form-control" id="idCustomer" name="id_customer" required>
                                </div>
                                <div class="col-12">
                                    <label for="namaCustomer" class="form-label">Nama Customer</label>
                                    <input type="text" class="form-control" id="namaCustomer" name="nama_customer"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone </label>
                                    <input type="text" class="form-control" id="phone" name="phone_customer">
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="email" name="email_customer">
                                </div>
                                <div class="col-12">
                                    <label for="Jenis Usaha" class="form-label">Jenis Usaha </label>
                                    <input type="text" class="form-control" id="JjenisUsaha" name="jenisusaha_customer">
                                </div>
                            </div>
                            <br>
                            <div>
                                <button class=" btn btn-danger w-100" type="submit">Tambahkan</button>
                            </div>
                            @if (session('status'))
                                <div id="trigger"></div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- TOAST SUCCESS --}}
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast text-bg-success rounded" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                Data Customer Berhasil Ditambahkan !
            </div>
        </div>
    </div>

@endsection
