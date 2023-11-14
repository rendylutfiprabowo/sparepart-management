@extends('template.warehouseBranchSparepart')
@section('title', 'Stock warehouse')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Stock Branch {{ $namaStore }}
                    </h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="d-flex justify-content-end mb-2">
                <x-searchbar url="/{{ request()->path() }}" value="{{ request()->input('search') }}" />
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered mt-2 table" width="100%" cellspacing="">
                @if ($stocks->count() != 0)
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
                                            $notif->sparepart->satuan !!}
                                        mau
                                        abisss!!!!
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @php
                            $no = ($stocks->currentPage() - 1) * $stocks->perPage();
                        @endphp
                        @foreach ($stocks as $stock)
                            <tr>
                                <td class="table-plus">{{ ++$no }}</td>
                                <td class="table-plus">{{ $stock->sparepart->codematerial_sparepart }}</td>
                                <td class="table-plus">{{ $stock->sparepart->category->nama_category }}</td>
                                <td class="table-plus">{{ $stock->qty_stock . ' ' . $stock->sparepart->satuan }}</td>
                                <td class="table-plus"style="width:40%">{{ $stock->sparepart->spesifikasi_sparepart }}</td>
                                <td>
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                        data-bs-target="#detailproduct-{{ $stock->id }}"><i
                                            class="fa-regular fa-file fa-lg"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addstock-{{ $stock->id }}"><i class="fa-solid fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editsafetystock-{{ $stock->id }}"><i
                                            class="fa-solid fa-shield-heart"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
            <ul class="pagination">
                <li class="page-item {{ $stocks->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link"
                        href="{{ $stocks->previousPageUrl() }}{{ request()->input('search') != null ? '&search=' . request()->input('search') : '' }}"
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item {{ $stocks->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link"
                        href="{{ $stocks->nextPageUrl() }}{{ request()->input('search') != null ? '&search=' . request()->input('search') : '' }}"
                        aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        @else
            <h4 class="text-center"> Result for "{{ request()->input('search') }}" not found </h4>
            @endif
        </div>
    </div>
    </div>
    <!--Add Stock Modal -->
    @foreach ($stocks as $stock)
        <div class="modal fade" id="addstock-{{ $stock->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header merah text-putih">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Stock</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/warehouse/stock/branch/{{ $stock->id }}">
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
        </div>

        <div class="modal fade" id="addstock-{{ $stock->id }}" tabindex="-1" role="dialog"
            aria-labelledby="addstockLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header merah text-putih">
                        <h5 class="modal-title" id="exampleModalLabel">Add Stock</h5>
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
    @foreach ($stocks as $stock)
        <div class="modal fade" id="editsafetystock-{{ $stock->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header merah text-putih">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Safety Stock</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/warehouse/branch/stock/safety-stock/{{ $stock->id }}">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!--Detail Modal -->
    @foreach ($stocks as $stock)
        <div class="modal fade" id="detailproduct-{{ $stock->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header merah text-putih">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
