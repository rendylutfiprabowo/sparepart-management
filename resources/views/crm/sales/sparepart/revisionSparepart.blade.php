@extends('template.new_layout')
@section('title', 'Revision SpareParts')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Stock Warehouse & Store</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>

            <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
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
                            <td class="table-plus">{{$order->customer->nama_customer}}</td>
                            <td class="table-plus"><x-status_badge>{{$order->status}}</x-status_badge>
                            </td>
                            <td class="table-plus">{{($order->do_order)?$order->do_order:$order->memo_order}}</td>
                            <td class="table-plus">{{$order->spk_order}}</td>
                            <td>
                                <div class="row">
                                    {{-- <div class="col">
                                        <a href="" class="pdf-link " type="button">
                                            <i class="fa-solid fa-square-check fa-lg"></i>
                                        </a>
                                    </div> --}}

                                    <div class="col">
                                        <a href="/sales/sparepart/revision/{{$order->id_order}}" class="pdf-link " type="button">
                                            <i class="fa-solid fa-file fa-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
