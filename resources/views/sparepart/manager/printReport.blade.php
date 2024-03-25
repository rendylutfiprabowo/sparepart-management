@extends('template.managerSparepart')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">Laporan Stok Barang Bulanan</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row">
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
                        {{-- <th scope="col">No</th> --}}
                        <th scope="col">Bulan</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Action</th>
                    </tr>

                </thead>
                <tbody class="text-center">


                    <tr>
                        {{-- <td class="table-plus">1</td> --}}
                        <td class="table-plus">Januari</td>
                        <td class="table-plus">2023</td>

                        <td>
                            <a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-print"></i>
                            </a>
                            <a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-info-circle "></i>
                            </a> 
                        </td>
                    </tr>
                    <tr>
                        {{-- <td class="table-plus">1</td> --}}
                        <td class="table-plus">Februari</td>
                        <td class="table-plus">2023</td>

                        <td><a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-print"></i>
                            </a>
                            <a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-info-circle "></i>
                            </a> 
                        </td>
                    </tr>
                    <tr>
                        {{-- <td class="table-plus">1</td> --}}
                        <td class="table-plus">Maret</td>
                        <td class="table-plus">2023</td>

                        <td><a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-print"></i>
                            </a>
                            <a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-info-circle "></i>
                            </a> 
                        </td>
                    </tr>
                    <tr>
                        {{-- <td class="table-plus">1</td> --}}
                        <td class="table-plus">April</td>
                        <td class="table-plus">2023</td>

                        <td><a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-print"></i>
                            </a>
                            <a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-info-circle "></i>
                            </a> 
                        </td>
                    </tr>
                    <tr>
                        {{-- <td class="table-plus">1</td> --}}
                        <td class="table-plus">Mei</td>
                        <td class="table-plus">2023</td>

                        <td><a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-print"></i>
                            </a>
                            <a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-info-circle "></i>
                            </a> 
                        </td>
                    </tr>
                    <tr>
                        {{-- <td class="table-plus">1</td> --}}
                        <td class="table-plus">Juni</td>
                        <td class="table-plus">2023</td>

                        <td><a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-print"></i>
                            </a>
                            <a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-info-circle "></i>
                            </a> 
                        </td>
                    </tr>
                    <tr>
                        {{-- <td class="table-plus">1</td> --}}
                        <td class="table-plus">Juli</td>
                        <td class="table-plus">2023</td>

                        <td><a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-print"></i>
                            </a>
                            <a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-info-circle "></i>
                            </a> 
                        </td>
                    </tr>
                    <tr>
                        {{-- <td class="table-plus">1</td> --}}
                        <td class="table-plus">Agustus</td>
                        <td class="table-plus">2023</td>

                        <td><a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-print"></i>
                            </a>
                            <a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-info-circle "></i>
                            </a> 
                        </td>
                    </tr>
                    <tr>
                        {{-- <td class="table-plus">1</td> --}}
                        <td class="table-plus">September</td>
                        <td class="table-plus">2023</td>

                        <td><a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-print"></i>
                            </a>
                            <a class="btn btn-dark" href="/manager/addUser">
                                <i class="fa fa-info-circle "></i>
                            </a> 
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
