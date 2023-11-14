@extends('template.warehouseSparepart')

@section('title', 'Tools Warehouse')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 mb-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Distribution Warehouse
                    </h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row mb-2">
                <div class="col-md-3">
                    <a class="btn btn-primary" href="/warehouse/branch/request-item/CTR"><i class="fa-solid fa-plus"></i>
                        Request
                        Item</a>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Status</th>
                        <th scope="col">Order date</th>
                        <th scope="col">Received date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($distribution as $no => $dis)
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $dis->id_stock }}</td>
                            <td class="table-plus">{{ $dis->qty_distribution }}</td>
                            <td class="table-plus">{{ $dis->status }}</td>
                            <td class="table-plus">{{ $dis->order_date }}</td>
                            <td class="table-plus">{{ $dis->recieved_date }}</td>
                            <td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
