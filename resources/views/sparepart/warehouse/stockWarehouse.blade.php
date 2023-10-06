@extends('template.warehouseSparepart')
@section('content')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Stock Warehouse</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row">
                <div class="dropdown mb-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        List Cabang
                    </button>
                    <div class="dropdown-menu col-md-3" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#addproduct" href=""><i
                            class="fa-solid fa-plus"></i> Add Product</a>
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
                    @foreach ($spareparts as $no => $stock)
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $stock->sparepart->nama_sparepart }}</td>
                            <td class="table-plus">{{ $stock->sparepart->codematerial_sparepart }}</td>
                            <td class="table-plus">{{ $stock->qty_stock }}</td>
                            <td class="table-plus">{{ $stock->store_sparepart->nama_store }}</td>
                            <td><a href="" class="btn btn-dark" type="button"><i
                                        class="fa-regular fa-file fa-lg"></i></a>
                                <a class="btn btn-primary" href=""><i class="fa-solid fa-plus"></i></a>
                                <a class="btn btn-success" href=""><i class="fa-solid fa-shield-heart"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- create modal --}}
    <!--Add Modal -->
    <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="addproductLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/warehouse/stock/store">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <div class="alert-title">
                                        <h4>Whoops!</h4>
                                    </div>
                                    There are some problems with your input.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="form-group mb-3">
                                <label class="form-label">Code Material</label>
                                <input type="text" class="form-control" name="codematerial_sparepart"
                                    value="{{ old('codematerial_sparepart') }}" placeholder="Masukkan Code Material">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="nama_sparepart"
                                    value="{{ old('nama_sparepart') }}" placeholder="Masukkan Nama Product">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Spesifikasi</label>
                                <input type="text" class="form-control" name="spesifikasi_sparepart"
                                    value="{{ old('spesifikasi_sparepart') }}" placeholder="Masukkan Spesifikasi">
                            </div>
                            <div class="form-group mb-1">
                                <label class="form-label">Satuan</label>
                                <input type="text" class="form-control" name="satuan" value="{{ old('satuan') }}"
                                    placeholder="Masukkan Satuan">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
