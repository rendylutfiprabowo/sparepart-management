@extends('template.warehouseBranchSparepart')
@section('title', 'List SPK')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded p-4">
            <thead>
                <tr>
                    <h3 class="my-2 text-start">Sparepart Transaction Data: </h3>
                </tr>
                <br>
            </thead>
            <form action="/{{ request()->path() }}" method="GET" class="input-group w-25">
                <div class="dropdown mb-3 me-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="/warehouse/branch/listspk">All</a></li>
                        @foreach ($status as $key => $stat)
                            <li><button class="dropdown-item" name="search" value="{{ $key }}"
                                    type="submit">{{ $key }}</button></li>
                        @endforeach
                    </ul>
                </div>
            </form>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-light text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Technician Name</th>
                        <th scope="col">Sales Name</th>
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
                    @foreach ($spk as $spks)
                        <tr>
                            @if ($spks->memo_order != null || ($spks->do_order && $spks->spk_order != null))
                                <td class="table-plus">{{ ++$no }}</td>
                                <td class="table-plus">{{ $spks->customer->nama_customer }}</td>
                                <td class="table-plus">
                                    {{ $spks->technician ? $spks->technician->nama_technician : ($spks->status == 'closed' || $spks->status == 'memo-closed' ? 'Delievered by Other Party' : '-') }}
                                </td>
                                <td class="table-plus">
                                    {{ $spks->sales->nama_sales }}
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
                                <td><a href="/warehouse/view-order/branch/{{ $spks->id_order }}"
                                        class="btn btn-outline-danger" type="button"><i class="bi bi-file-text"></i></a>
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
