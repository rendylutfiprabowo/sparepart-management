@extends('template.new_layout')

@section('title', 'SpareParts | Stock')

@section('contents')
    <div class="col-md-12">
        <div class="card  p-3">
            <thead>
                <tr>
                    <h3 class="my-2 text-start">List Stock Warehouse & Store</h3>
                </tr>
                <hr class="mt-1">
            </thead>
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="dropdown mb-3">
                            <button class="btn btn-outline-danger btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                List Cabang
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Code Material</th>
                            <th scope="col">Name</th>
                            <th scope="col">Spec</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Branch</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $no => $stock)
                            <tr>
                                <th class="" scope="row">{{ $no + 1 }}</th>
                                <td class="" scope="col">{{ $stock->sparepart->codematerial_sparepart }}</td>
                                <td class="" scope="col">{{ $stock->sparepart->category->nama_category }}</td>
                                <td class="" scope="col">{{ $stock->sparepart->spesifikasi_sparepart }}</td>
                                <td class="" scope="col">{{ $stock->qty_stock }}</td>
                                <td class="" scope="col">{{ $stock->store_sparepart->nama_store }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="#" class="btn " type="button">
                                                <i class="bi bi-cart-fill text-danger"></i>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="#" class="btn " type="button">
                                                <i class="bi bi-file-pdf-fill text-danger"></i>
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
