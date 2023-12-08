@extends('template.managerSparepart')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Account Warehouse</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-start">
                        <div class="">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addproduct"><i class="fa-solid fa-plus"></i> Add Warehouse
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <x-searchbar url="/{{ request()->path() }}" value="{{ request()->input('search') }}" />
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered mt-3 table" width="100%" cellspacing="">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Warehouse</th>
                        <th scope="col">No.HP</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Action</th>
                    </tr>

                </thead>
                <tbody class="text-center">
                    @foreach ($warehouse as $no => $warehouses)
                        @php
                            $no = 1;
                        @endphp
                        <tr>
                            <td class="table-plus">{{ $no++ }}</td>
                            <td class="table-plus">{{ $warehouses->nama_warehouse }}</td>
                            <td class="table-plus">{{ $warehouses->phone_warehouse }}</td>
                            <td class="table-plus">{{ $warehouses->store->nama_store ?? '-' }}</td>
                            </td>
                            <td><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#"><i
                                        class="fa-regular fa-file fa-lg"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12 mt-3">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Account Technician</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-start">
                        <div class="">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addproduct"><i class="fa-solid fa-plus"></i> Add Technician
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <x-searchbar url="/{{ request()->path() }}" value="{{ request()->input('search') }}" />
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered mt-3 table" width="100%" cellspacing="">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Technician Name</th>
                        <th scope="col">No. HP</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($technician as $no => $technicians)
                        @php
                            $no = 1;
                        @endphp
                        <tr>
                            <td class="table-plus">{{ $no++ }}</td>
                            <td class="table-plus">{{ $technicians->nama_technician }}</td>
                            <td class="table-plus">{{ $technicians->phone_technician }}</td>
                            </td>
                            <td><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#"><i
                                        class="fa-regular fa-file fa-lg"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
