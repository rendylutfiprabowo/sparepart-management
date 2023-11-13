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
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center table-light">
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
                    @foreach ($spk as $no => $spks)
                        <tr>
                            @if ($spks->memo_order != null || ($spks->do_order && $spks->spk_order != null))
                                <td class="table-plus">{{ $no + 1 }}</td>
                                <td class="table-plus">{{ $spks->customer->nama_customer }}</td>
                                <td class="table-plus">
                                    {{ $spks->technician ? $spks->technician->nama_technician : ($spks->status == 'closed' || $spks->status == 'memo-closed' ? 'Delievered by Other Party' : '-') }}
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
        </div>
    </div>
@endsection
