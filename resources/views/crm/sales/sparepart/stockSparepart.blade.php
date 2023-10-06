@extends('template.salesCrm')
@section('content')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Stock Warehouse & Store</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="dropdown mb-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    List Cabang
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code Material</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($stocks as $no => $stock)
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $stock->sparepart->nama_sparepart }}</td>
                            <td class="table-plus">{{ $stock->sparepart->codematerial_sparepart }}</td>
                            <td class="table-plus">{{ $stock->qty_stock }}</td>
                            <td class="table-plus">{{ $stock->store_sparepart->nama_store }}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <a href="" class="pdf-link " type="button">
                                            <i class="fa-solid fa-cart-shopping fa-lg"></i>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="" class="pdf-link " type="button">
                                            <i class="fa-solid fa-file fa-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
