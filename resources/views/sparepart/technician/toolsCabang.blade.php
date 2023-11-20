@extends('template.teknisiSparepart')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 mb-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Tools Warehouse {{ $namaStore }}
                    </h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row">
                <div class="col-md-3 dropdown mb-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        List Cabang
                    </button>
                    <div class="dropdown-menu col-md-3" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/technician/tools">Semua Toko</a>
                        @foreach ($stores as $store)
                            <a class="dropdown-item"
                                href="/technician/tools/{{ $store->id_store }}">{{ $store->nama_store }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <table class="table-bordered table" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Branch</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($tools as $no => $tool)
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $tool->nama_tools }}</td>
                            <td class="table-plus">{{ $tool->qty_tools }}</td>
                            <td class="table-plus">{{ $tool->store->nama_store }}</td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card rounded-4 mb-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Tools Warehouse
                    </h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <a class="btn btn-primary" data-target="" href="/technician/tools/request/add"><i
                            class="fa-solid fa-plus"></i> Request
                        Tools</a>
                </div>
            </div>
            <table class="table-bordered table" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Spk</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                </tbody>
            </table>
        </div>
    </div>
@endsection
