@extends('template.new_layout')

@section('title', 'Sales Customer Details')

@section('contents')
    <div>
        <div class="d-flex align-items-center">
            <div class="">
                <a href="/sales/customer/salesIndexCustomer" class="btn btn-danger btn-sm"><i class="bi bi-arrow-left"></i></a>
            </div>
            <div class="ms-3">
                <h3 class="text-muted">Detail Customer</h3>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm text-center p-2">
                    <svg class="bd-placeholder-img rounded-circle mt-4" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Photo Customer</title>
                        <rect width="100%" height="100%" fill="var(--bs-danger-color)" />
                    </svg>
                    <h3>{{ $dataCust->nama_customer }}</h3>
                    <p class="text-secondary">ID : {{ $dataCust->id_customer }}</p>
                    <p><a class="btn btn-danger btn-sm" href="#">Contact &raquo;</a></p>
                </div>
            </div>
            <div class="col-md-8 p-2">
                <div class="rounded bg-white shadow-sm p-3">
                    <form class="needs-validation" novalidate>
                        <div class="row overflow-y-auto">
                            <div class="col-12 mb-2">
                                <label for="fullName" class="form-label text-secondary">Full Name</label>
                                <input type="text" class="form-control form-control-sm" id="name_customer"
                                    value="{{ $dataCust->nama_customer }}" disabled>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="phone_customer" class="form-label text-secondary">Phone</label>
                                <input type="text" class="form-control form-control-sm" id="phone_customer"
                                    value="{{ $dataCust->phone_customer }}" disabled>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="email_customer" class="form-label text-secondary">Email</label>
                                <input type="text" class="form-control form-control-sm" id="email_customer"
                                    value="{{ $dataCust->email_customer }}" disabled>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="Jenis usaha" class="form-label text-secondary">Jenis Usaha</label>
                                <input type="text" class="form-control form-control-sm" id="jenis usaha"
                                    value="{{ $dataCust->jenisusaha_customer }}" disabled>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm p-3">
                    <h6>History Status</h6>
                    <div class="mt-3">
                        <label for="progress" class="text-secondary">Transaction</label>
                        <div class="progress mt-2" role="progressbar" aria-label="Basic example" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar bg-danger" style="width: 50%"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm p-3">
                    <h6>SpareParts Orders</h6>
                    <div class="mt-3">
                        <label for="progress" class="text-secondary">Bushing</label>
                        <div class="progress  mt-2" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar bg-danger" style="width: 25%"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm p-3">
                    <h6>Oil Lab History</h6>
                    <div class="mt-3">
                        <label for="progress" class="text-secondary">Testing</label>
                        <div class="progress  mt-2" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar bg-danger" style="width: 85%"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
