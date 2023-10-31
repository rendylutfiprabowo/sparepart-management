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
                infoCard="Customer Seluruh Indonesia Terdaftar" tanggal="13 oct 2023" />
        </div>
        <br>
        {{-- TABLE DATA CUSTOMER --}}
        <x-page-heading>
            Table Of Customer
        </x-page-heading>

        <div class="row">
            <div>
                <button type="button" class="btn btn-success shadow-sm" data-bs-toggle="modal"
                    data-bs-target="#addCustModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="26" fill="currentColor"
                        class="bi bi-person-fill-add" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path
                            d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                    </svg>
                </button>
            </div>
            <div class="col bg-white p-3 rounded shadow-sm mt-3">
                <table class="table table-striped">
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
                                    <td scope="row" class="text-secondary">{{ $dataTable->id_customer }}</th>
                                    <td><a class="text-decoration-none"
                                            href="{{ url('/sales/customer/customerDetails/' . $dataTable->id_customer) }}">{{ $dataTable->nama_customer }}</a>
                                    </td>
                                    <td>{{ $dataTable->phone_customer }}</td>
                                    <td> <a href="mailto:{{ $dataTable->email_customer }}"
                                            class="text-decoration-none">{{ $dataTable->email_customer }}</a>
                                    </td>
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
