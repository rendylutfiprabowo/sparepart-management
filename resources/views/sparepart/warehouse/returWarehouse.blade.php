@extends('template.warehouseSparepart')
@section('content')
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
                                    {{ $orders->technician ? $orders->technician->nama_technician : '-' }}
                                </td>

                                <td class="table-plus">
                                    @if ($orders->status == 'on-progress')
                                        <b class="text-warning">{{ $orders->status }}</b>
                                    @elseif ($orders->status == 'completed')
                                        <b class="text-success">{{ $orders->status }}</b>
                                    @endif
                                </td>

                                <td class="table-plus">
                                    {{ $orders->spk_order ? $orders->do_order : ($orders->memo_order ? $orders->memo_order : '-') }}
                                </td>
                                <td class="table-plus">{{ $orders->spk_order }}</td>
                                <td><a href="/warehouse/view-order/{{ $orders->id_order }}" class="btn btn-dark"
                                        type="button"><i class="fa-regular fa-file fa-lg"></i></a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
