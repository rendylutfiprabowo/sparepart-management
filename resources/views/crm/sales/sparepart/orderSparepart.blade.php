@extends('template.salesCrm')

@section('title', 'SpareParts Sales Order')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start">List Stock Warehouse & Store</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="">
                <a class="btn btn-success btn-sm" href="/sales/sparepart/order/add">+ Add Order</a>
            </div>
            <table class="table-bordered table mt-3" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center table-secondary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">DO/Memo DO</th>
                        <th scope="col">No. SPK</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($orders as $key => $order)
                        <tr>
                            <td class="table-plus">{{ $key }}</td>
                            <td class="table-plus">{{ $order->customer->nama_customer }}</td>
                            <td class="table-plus">
                                @if ($order->status == null)
                                    <b
                                        class="badge text-bg-primary">{{ $now->diffInDays($order->date_order) . ' Days left' }}</b>
                                @else
                                    <b
                                        class="
                                    @if ($order->status == 'closed') badge text-bg-success
                                    @elseif($order->status == 'on-warehouse' || $order->status == 'on-technician')
                                    badge text-bg-warning
                                    @elseif($order->status == 'revisi')
                                    badge text-bg-info
                                    @elseif($order->status == 'canceled')
                                    badge text-bg-danger @endif
                                    ">{{ $order->status }}
                                    </b>
                                @endif
                            </td>
                            <td class="table-plus fw-medium">
                                {{ $order->do_order ? $order->do_order : ($order->memo_order ? $order->memo_order : '-') }}
                            </td>
                            <td class="table-plus fw-medium">{{ $order->spk_order ? $order->spk_order : '-' }}</td>
                            <td>
                                <a href="/sales/sparepart/order/{{ $order->id_order }}" class=" btn" type="button">
                                    <i class="bi bi-file-earmark-text"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
