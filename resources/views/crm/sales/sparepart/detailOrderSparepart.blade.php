@extends('template.salesCrm')
@section('content')
    <div class="col-md-12">
        <div>
            <div class="row cols-2 mb-4">
                <div class="col d-sm-flex rounded bg-white shadow-sm">
                    <div class="p-2">
                        <i class="fa-solid fa-2x fa-circle-exclamation"></i>
                    </div>

                    <div class="">
                        @if (session('success'))
                            <div class="bg-success">
                                {{session('success')}}
                            </div>
                        @endif
                        <table class="table-sm table-borderless table">
                            <tbody>
                                <tr>
                                    <th scope="row">Customer Name </th>
                                    <td>: {{ $order->customer->nama_customer }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">Order Number </th>
                                    <td>: 5858588585</td>

                                </tr>
                                <tr>
                                    <th scope="row">Order Date</th>
                                    <td>: {{ $order->date_order }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td>: Lampung Ujung Utara, Tanggamus, Kota Lampung Rt09/Rw7</td>
                                </tr>
                                <tr>
                                    <th scope="row">Store</th>
                                    <td>: {{ $order->store->nama_store }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <div class="col mb-3 rounded bg-white p-2 shadow-sm">
                        <h3>Booking Status</h3>
                        <hr>
                        <div class="badge-primary badge">
                            <h5>{{ $order->status }}</h5>
                        </div>
                    </div>
                    <div class="col rounded bg-white p-2 shadow-sm">
                        <h3>Total Item</h3>
                        @php
                            $sum = 0;
                            foreach ($order->booked as $booked) {
                                $sum += $booked->qty_booked;
                            }
                        @endphp
                        <div class="badge badge-danger">
                            <h5>{{ $sum }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card rounded-4 p-4 mb-3">
        <thead>
            <tr>
                <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List SPK</h3>
            </tr>
            <hr class="mt-1" style="background-color: black;">
        </thead>
        <table class="table-bordered table" width="100%" cellspacing="0">
            <thead class="text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Items Name</th>
                    <th scope="col">Code Material</th>
                    <th scope="col">Qty</th>
                </tr>
            </thead>
            @foreach ($order->booked as $no => $booking)
                <tbody class="text-center">
                    <tr>
                        <td class="table-plus">{{ $no + 1 }}</td>
                        <td class="table-plus">{{ $booking->stock->sparepart->nama_sparepart }}</td>
                        <td class="table-plus">{{ $booking->stock->id_sparepart }}</td>
                        <td class="table-plus">{{ $booking->qty_booked }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        <div class="">
            <form action="/sales/sparepart/order/{{$order->id_order}}/add-do" method="post">
                @csrf
                <label for=""><b>Input No. DO/Memo DO</b> </label>
                <div class="row my-2">
                    <div class="col-3">
                        <select name="do-memo" id="" class="form-control">
                            <option value="1">DO</option>
                            <option value="2">MEMO/DO</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="No. DO/Memo DO" name="no-do-memo">
                    </div>
                </div>
                <label for=""><b>Input No. SPK</b> </label>
                <input type="text" class="form-control my-2" placeholder="No. SPK" name="no-spk">


                <div class="modal-footer">
                    <a href="/sales/sparepart/order" class="btn merah text-white"> Back</a>
                    <button type="submit" class="btn btn-primary"> Submit</button>
                </div>
            </form>
        </div>
    </div>

    </div>
@endsection
