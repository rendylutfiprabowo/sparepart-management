@extends('template.salesCrm')

@section('title', 'SpareParts Sales Order')
@section('content')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Stock Warehouse & Store</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="py-2">    
                <a class="btn btn-success" href="/sales/sparepart/order/add">+ Add Order</a>
            </div>
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
                            <td class="table-plus text-danger">{{$order->status}}</td>
                            <td class="table-plus">DO</td>
                            <td class="table-plus">03SA0039214</td>
                            <td>
                                <a href="" class="pdf-link btn" type="button">
                                    <i class="fa-regular fa-file fa-lg"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
