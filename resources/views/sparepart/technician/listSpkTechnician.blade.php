@extends('template.teknisiSparepart')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">Sparepart Transaction Data: </h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <form action="/{{ request()->path() }}" method="GET" class="input-group w-25">
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="dropdown mb-3">
                                <button class="btn btn-outline-danger btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Status
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/technician/listspk">All</a></li>
                                    @foreach ($status as $key => $stat)
                                        <li><button class="dropdown-item" name="search" value="{{ $key }}"
                                                type="submit">{{ $key }}</button></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Technician Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">DO/Memo DO</th>
                        <th scope="col">No. SPK</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                        $no = ($spk->currentPage() - 1) * $spk->perPage();
                    @endphp
                    @foreach ($spk as $no => $spks)
                        <tr>
                            @if ($spks->memo_order != null || ($spks->do_order && $spks->spk_order != null))
                                <td class="table-plus">{{ ++$no }}</td>
                                <td class="table-plus">{{ $spks->customer->nama_customer }}</td>
                                <td class="table-plus">{{ $spks->technician ? $spks->technician->nama_technician : '-' }}
                                </td>
                                <td class="table-plus">
                                    <b
                                        class="@if ($spks->status == 'closed') badge text-bg-success
                                    @elseif ($spks->status == 'closed-memo-do-revisi' || $spks->status == 'memo-closed') badge text-bg-primary
                                    @elseif($spks->status == 'on-warehouse' || $spks->status == 'on-technician')
                                    badge text-bg-warning
                                    @elseif($spks->status == 'revisi')
                                    badge text-bg-info
                                    @elseif($spks->status == 'canceled')
                                    badge text-bg-danger @endif">{{ $spks->status }}
                                    </b>
                                </td>
                                <td class="table-plus">
                                    {{ $spks->do_order ? $spks->do_order : ($spks->memo_order ? $spks->memo_order : '-') }}
                                </td>
                                <td class="table-plus">{{ $spks->spk_order }}</td>
                                <td><a href="/technician/listspk/{{ $spks->id_order }}" class="btn btn-dark"
                                        type="button"><i class="fa-regular fa-file fa-lg"></i></a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                <li class="page-item {{ $spk->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $spk->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item {{ $spk->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $spk->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
