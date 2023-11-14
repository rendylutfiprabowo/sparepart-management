@extends('template.salesCrm')

@section('title', 'SpareParts | Stock')

@section('contents')
    <div class="col-md-12">
        <div class="card p-3">
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
                                <li><a class="dropdown-item" href="/sales/sparepart/stock">Semua Store</a>
                                </li>
                                @foreach ($stores as $store)
                                    <li><a class="dropdown-item"
                                            href="/sales/sparepart/stock/{{ $store->id_store }}">{{ $store->nama_store }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <x-searchbar url="/{{ request()->path() }}" value="{{ request()->input('search') }}" />
                </div>
            </div>

            <div class="table-responsive">
                @if ($stocks->count() != 0)
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
                            @php
                                $no = ($stocks->currentPage() - 1) * $stocks->perPage();
                            @endphp

                            @foreach ($stocks as $stock)
                                <tr>
                                    <th class="" scope="row">{{ ++$no }}</th>
                                    <td class="" scope="col">{{ $stock->sparepart->codematerial_sparepart }}</td>
                                    <td class="" scope="col">{{ $stock->sparepart->category->nama_category }}</td>
                                    <td class="" scope="col">{{ $stock->sparepart->spesifikasi_sparepart }}</td>
                                    <td class="" scope="col">{{ $stock->qty_stock }}</td>
                                    <td class="" scope="col">{{ $stock->store_sparepart->nama_store }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a href="#" class="btn" type="button">
                                                    <i class="bi bi-cart-fill text-danger"></i>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="#" class="btn" type="button">
                                                    <i class="bi bi-file-pdf-fill text-danger"></i>
                                                </a>
                                            </div>
                                        </div>

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
@endsection
