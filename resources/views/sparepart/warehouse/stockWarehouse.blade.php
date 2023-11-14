@extends('template.warehouseSparepart')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Stock Warehouse</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-start">
                        <div class="dropdown mb-3 me-3">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                List Cabang
                            </a>
                            <div>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="/warehouse/stock">Semua Toko</a>
                                    @foreach ($stores as $store)
                                        <a class="dropdown-item"
                                            href="/warehouse/stock/{{ $store->id_store }}">{{ $store->nama_store }}</a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addproduct"><i class="fa-solid fa-plus"></i> Add Product
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
            <table class="table-bordered table" width="100%" cellspacing="">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code Material</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Spesification</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <div class="mt-3">
                        @foreach ($notifs as $notif)
                            {{-- @dd($notif->sparepart->category->nama_category) --}}
                            @if ($notif->qty_stock == 0)
                                <div class="alert alert-danger">
                                    Stock{!! '<strong> ' .
                                        $notif->sparepart->category->nama_category .
                                        '</strong>' .
                                        '<strong> ' .
                                        $notif->qty_stock .
                                        ' ' .
                                        $notif->sparepart->satuan .
                                        '</strong>' .
                                        ' di store ' .
                                        '<strong>' .
                                        $notif->store_sparepart->nama_store .
                                        '</strong>' !!}
                                    abisss!!!!
                                </div>
                            @else
                                <div class="alert alert-danger">
                                    Stock{!! '<strong> ' .
                                        $notif->sparepart->category->nama_category .
                                        '</strong>' .
                                        ' sisa ' .
                                        ' ' .
                                        '<strong> ' .
                                        $notif->qty_stock .
                                        ' ' .
                                        $notif->sparepart->satuan .
                                        '</strong>' .
                                        ' di store ' .
                                        '<strong>' .
                                        $notif->store_sparepart->nama_store .
                                        '</strong>' !!}
                                    mau
                                    abisss!!!!
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @php
                        $no = ($spareparts->currentPage() - 1) * $spareparts->perPage();
                    @endphp
                    @foreach ($spareparts as $stock)
                        <tr>
                            <td class="table-plus">{{ ++$no }}</td>
                            <td class="table-plus">{{ $stock->sparepart->codematerial_sparepart }}</td>
                            <td class="table-plus">{{ $stock->sparepart->category->nama_category }}</td>
                            <td class="table-plus">{{ $stock->qty_stock . ' ' . $stock->sparepart->satuan }}</td>
                            <td class="table-plus" style="width:40%">{{ $stock->sparepart->spesifikasi_sparepart }}</td>
                            <td class="table-plus">{{ $stock->store_sparepart->nama_store }}</td>
                            <td><button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#detailproduct-{{ $stock->id }}"><i
                                        class="fa-regular fa-file fa-lg"></i>
                                </button>
                                @if ($stock->id_store == Auth::user()->warehouse->store->id_store)
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addstock-{{ $stock->id }}"><i class="fa-solid fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editsafetystock-{{ $stock->id }}"><i
                                            class="fa-solid fa-shield-heart"></i>
                                    </button>
                                @endif
                            </td>
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
    <div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header merah text-putih">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <input type="text" class="form-control" name="nama_category"
                                    value="{{ old('nama_category') }}" placeholder="Masukkan Nama Product">
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add Stock Modal -->
    @foreach ($spareparts as $stock)
        <div class="modal fade" id="addstock-{{ $stock->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header merah text-putih">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Stock</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        value="{{ $stock->sparepart->codematerial_sparepart }}" disabled
                                        placeholder="Masukkan Code Material">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="nama_sparepart"
                                        value="{{ $stock->sparepart->category->nama_category }}" disabled
                                        placeholder="Masukkan Nama Product">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Spesifikasi</label>
                                    <input type="text" class="form-control" name="spesifikasi_sparepart"
                                        value="{{ $stock->sparepart->spesifikasi_sparepart }}" disabled
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
                                            value="{{ $stock->sparepart->satuan }}" disabled
                                            placeholder="Masukkan Satuan">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!--Edit Safety Stock Modal -->
    @foreach ($spareparts as $stock)
        <div class="modal fade" id="editsafetystock-{{ $stock->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header merah text-putih">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Safety Stock</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        value="{{ $stock->sparepart->codematerial_sparepart }}" disabled
                                        placeholder="Masukkan Code Material">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="nama_sparepart"
                                        value="{{ $stock->sparepart->category->nama_category }}" disabled
                                        placeholder="Masukkan Nama Product">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Spesifikasi</label>
                                    <input type="text" class="form-control" name="spesifikasi_sparepart"
                                        value="{{ $stock->sparepart->spesifikasi_sparepart }}" disabled
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
                                            value="{{ $stock->sparepart->satuan }}" disabled
                                            placeholder="Masukkan Satuan">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!--Detail Modal -->

    @foreach ($spareparts as $stock)
        <div class="modal fade" id="detailproduct-{{ $stock->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header merah text-putih">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <label>{{ $stock->sparepart->category->nama_category }} </label>
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
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
