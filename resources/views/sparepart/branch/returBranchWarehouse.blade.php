@extends('template.warehouseBranchSparepart')

@section('title', 'ReturBranch')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">Sparepart Transaction Data: </h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
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
                    @foreach ($order as $no => $orders)
                        <tr>
                            @if ($orders->memo_order != null || ($orders->do_order && $orders->spk_order != null))
                                <td class="table-plus">{{ $no + 1 }}</td>
                                <td class="table-plus">{{ $orders->customer->nama_customer }}</td>
                                <td class="table-plus">
                                    {{ $orders->technician ? $orders->technician->nama_technician : ($orders->status == 'closed' || $orders->status == 'memo-closed' ? 'Delievered by Other Party' : '-') }}
                                </td>

                                <td class="table-plus">
                                    <b
                                        class="@if ($orders->status == 'closed') badge text-bg-success
                                    @elseif ($orders->status == 'closed-memo-do-revisi' || $orders->status == 'memo-closed') badge text-bg-primary
                                    @elseif($orders->status == 'on-warehouse' || $orders->status == 'on-technician')
                                    badge text-bg-warning
                                    @elseif($orders->status == 'revisi')
                                    badge text-bg-info
                                    @elseif($orders->status == 'canceled')
                                    badge text-bg-danger @endif">{{ $orders->status }}
                                    </b>
                                </td>
                                <td class="table-plus">
                                    {{ $orders->do_order ? $orders->do_order : ($orders->memo_order ? $orders->memo_order : '-') }}
                                </td>
                                <td class="table-plus">{{ $orders->spk_order }}</td>
                                <td><a href="/warehouse/branch/detailReturItem/{{ $orders->id_order }}" class="btn btn-dark"
                                        type="button"><i class="fa-regular fa-file fa-lg"></i></a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                <li class="page-item {{ $order->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $order->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item {{ $order->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $order->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
