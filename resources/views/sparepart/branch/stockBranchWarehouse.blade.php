@extends('template.warehouseBranchSparepart')
@section('title', 'Stock warehouse')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Stock Cabangs {{ $namaStore }}
                    </h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered table" width="100%" cellspacing="">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code Material</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Spesification</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($spareparts as $no => $stock)
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $stock->sparepart->codematerial_sparepart }}</td>
                            <td class="table-plus">{{ $stock->sparepart->category->nama_category }}</td>
                            <td class="table-plus">{{ $stock->qty_stock . ' ' . $stock->sparepart->satuan }}</td>
                            <td class="table-plus"style="width:40%">{{ $stock->sparepart->spesifikasi_sparepart }}</td>
                            <td><a href="/warehouse/stock/{$id}"data-toggle="modal"
                                    data-target="#detailproduct-{{ $stock->id }}" class="btn btn-dark" type="button"><i
                                        class="fa-regular fa-file fa-lg"></i></a>
                                <a data-toggle="modal" data-target="#addstock-{{ $stock->id }}" class="btn btn-primary"
                                    href="/warehouse/stock/{id_sparepart}"><i class="fa-solid fa-plus"></i></a>
                                <a data-toggle="modal" data-target="#editsafetystock-{{ $stock->id }}"
                                    class="btn btn-success" href="/warehouse/stock/safety-stock/{id_sparepart}"><i
                                        class="fa-solid fa-shield-heart"></i></a>
                            </td>
                            @if ($stock->qty_stock <= 0)
                                <div class="alert alert-danger">
                                    Stock{!! '<strong> ' .
                                        $stock->sparepart->nama_sparepart .
                                        '</strong>' .
                                        '<strong> ' .
                                        $stock->qty_stock .
                                        ' ' .
                                        $stock->sparepart->satuan .
                                        '</strong>' !!}
                                    abisss!!!!
                                </div>
                            @elseif ($stock->isBelowSafetyStock())
                                <div class="alert alert-danger">
                                    Stock{!! '<strong> ' .
                                        $stock->sparepart->nama_sparepart .
                                        '</strong>' .
                                        ' sisa ' .
                                        ' ' .
                                        '<strong> ' .
                                        $stock->qty_stock .
                                        ' ' .
                                        $stock->sparepart->satuan .
                                        '</strong>' .
                                        ' di ' .
                                        '<strong> ' .
                                        $stock->store_sparepart->nama_store .
                                        '</strong> ' !!}
                                    mau
                                    abisss!!!!
                                </div>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <ul class="pagination">
                <li class="page-item {{ $spareparts->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $spareparts->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item {{ $spareparts->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $spareparts->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    {{-- create modal --}}
    <!--Add Product Modal -->
    <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="addproductLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header merah text-putih">
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
                    <button type="button" class="btn merah text-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add Stock Modal -->
    @foreach ($spareparts as $stock)
        <div class="modal fade" id="addstock-{{ $stock->id }}" tabindex="-1" role="dialog"
            aria-labelledby="addstockLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header merah text-putih">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/warehouse/stock/{{ $stock->id }}">
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
                                        value="{{ $stock->sparepart->codematerial_sparepart }}" readonly
                                        placeholder="Masukkan Code Material">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="nama_sparepart"
                                        value="{{ $stock->sparepart->nama_sparepart }}" readonly
                                        placeholder="Masukkan Nama Product">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Spesifikasi</label>
                                    <input type="text" class="form-control" name="spesifikasi_sparepart"
                                        value="{{ $stock->sparepart->spesifikasi_sparepart }}" readonly
                                        placeholder="Masukkan Spesifikasi">
                                </div>
                                <div class="form-group mb-1">
                                    <label class="form-label">Qty</label>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-9 mb-1">
                                        <input type="number" class="form-control" name="qty_stock"
                                            placeholder="Masukan Jumlah Stock">
                                    </div>
                                    <div class="form-group col-md-3 mb-1">
                                        <input type="text" class="form-control" name="satuan"
                                            value="{{ $stock->sparepart->satuan }}" readonly
                                            placeholder="Masukkan Satuan">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn merah text-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!--Edit Safety Stock Modal -->
    @foreach ($spareparts as $stock)
        <div class="modal fade" id="editsafetystock-{{ $stock->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editsafetystockLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header merah text-putih">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Safety Stock</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/warehouse/stock/safety-stock/{{ $stock->id }}">
                            @csrf
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <div class="alert-title">
                                            <h4>Whoops!</h4>
                                        </div>
                                        Wah Gagal
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
                                        value="{{ $stock->sparepart->codematerial_sparepart }}" readonly
                                        placeholder="Masukkan Code Material">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="nama_sparepart"
                                        value="{{ $stock->sparepart->nama_sparepart }}" readonly
                                        placeholder="Masukkan Nama Product">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Spesifikasi</label>
                                    <input type="text" class="form-control" name="spesifikasi_sparepart"
                                        value="{{ $stock->sparepart->spesifikasi_sparepart }}" readonly
                                        placeholder="Masukkan Spesifikasi">
                                </div>
                                <div class="form-group mb-1">
                                    <label class="form-label">Safety Stock</label>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-9 mb-1">
                                        <input type="number" class="form-control" name="safety_stock"
                                            value="{{ $stock->safety_stock }}"
                                            placeholder="Masukan Jumlah Minimum Safety Stock">
                                    </div>
                                    <div class="form-group col-md-3 mb-1">
                                        <input type="text" class="form-control" name="satuan"
                                            value="{{ $stock->sparepart->satuan }}" readonly
                                            placeholder="Masukkan Satuan">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn merah text-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!--Detail Modal -->
    @foreach ($spareparts as $stock)
        <div class="modal fade" id="detailproduct-{{ $stock->id }}" tabindex="-1" role="dialog"
            aria-labelledby="detailproductLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header merah text-putih">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <!-- Tampilkan informasi produk di sini -->
                            <div>
                                <strong class="form-label">Code Material</strong>
                                <div>
                                    <label>{{ $stock->sparepart->codematerial_sparepart }} </label>
                                </div>
                            </div>
                            <div>
                                <strong class="form-label">Product Name</strong>
                                <div>
                                    <label>{{ $stock->sparepart->nama_sparepart }} </label>
                                </div>
                            </div>
                            <div>
                                <strong class="form-label">Spesifikasi</strong>
                                <div>
                                    <label>{{ $stock->sparepart->spesifikasi_sparepart }} </label>
                                </div>
                            </div>
                            <div>
                                <strong class="form-label">Qty</strong>
                                <div>
                                    <label>{{ $stock->qty_stock . ' ' . $stock->sparepart->satuan }} </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn merah text-white" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
