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
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="dropdown mb-3">
                            <button class="btn btn-outline-danger btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                List Cabang
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/technician/tools">Semua Store</a>
                                </li>
                                @foreach ($stores as $store)
                                    <li><a class="dropdown-item"
                                            href="/technician/tools/{{ $store->id_store }}">{{ $store->nama_store }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <x-searchbar url="/{{ request()->path() }}" value="{{ request()->input('search') }}" />
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
            <ul class="pagination">
                <li class="page-item {{ $tools->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $tools->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item {{ $tools->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $tools->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
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
                        <th scope="col">Tools Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Status</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Finish Date</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($techTools as $no => $tech)
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $tech->tools->nama_tools }}</td>
                            <td class="table-plus">{{ $tech->qty_technician_tools }}</td>
                            <td class="table-plus"><b
                                    class="@if ($tech->status == 'closed') badge text-bg-success
                        @elseif ($tech->status == 'closed-memo-do-revisi' || $tech->status == 'memo-closed') badge text-bg-primary
                        @elseif($tech->status == 'on-warehouse' || $tech->status == 'on-technician')
                        badge text-bg-warning
                        @elseif($tech->status == 'revisi')
                        badge text-bg-info
                        @elseif($tech->status == 'canceled')
                        badge text-bg-danger @endif">{{ $tech->status }}
                                </b></td>
                            <td class="table-plus">{{ $tech->start_date }}</td>
                            <td class="table-plus">{{ $tech->finish_date ? $tech->finish_date : '-' }}</td>
                            <td class="table-plus">{{ $tech->tools->store->nama_store }}</td>
                            <td class="table-plus">
                                <div class="row justify-content-center">

                                    @if ($tech->status == 'on-technician')
                                        <form method="post" action="/technician/tools/return/{{ $tech->id_tools }}">
                                            @csrf
                                            <input type="hidden" name="status" value="return">
                                            <button type="submit" class="btn btn-primary">Return</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                <li class="page-item {{ $techTools->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $techTools->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item {{ $techTools->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $techTools->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
