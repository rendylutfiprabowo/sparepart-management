@extends('template.new_layout')
@section('contents')
    <div class="col-md-12">
        <div>
            <div class="row cols-2 mb-4">
                <div class="col d-sm-flex rounded bg-white shadow-sm">
                    <div class="p-2">
                        <i class="fa-solid fa-2x fa-circle-exclamation"></i>
                    </div>

                    <div class="">
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

    <div class="card rounded-4 mb-3 p-4">
        @if (session('success'))
            <div class="bg-success text-light rounded text-center">
                {{ session('success') }}
            </div>
        @endif
        @error('qty')
            <div class="bg-danger text-light rounded text-center">
                {{ $message }}
            </div>
        @enderror
        <thead>
            <tr>
                <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Return</h3>
            </tr>
            <hr class="mt-1" style="background-color: black;">
        </thead>
        <table class="table-bordered table" width="100%" cellspacing="0">
            <thead class="text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Items Name</th>
                    <th scope="col">Specification</th>
                    <th scope="col">Code Material</th>
                    <th scope="col">Qty</th>
                </tr>
            </thead>
            @foreach ($revision as $no => $booking)
                <tbody class="text-center">
                    <tr>
                        <td class="table-plus">{{ $no + 1 }}</td>
                        <td class="table-plus">{{ $booking->stock->sparepart->category->nama_category }}</td>
                        <td class="table-plus">{{ $booking->stock->sparepart->spesifikasi_sparepart }}</td>
                        <td class="table-plus">{{ $booking->stock->id_sparepart }}</td>
                        <td class="table-plus">{{ $booking->qty_booked }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        <thead>
            <tr>
                <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List New Item</h3>
            </tr>
            <hr class="mt-1" style="background-color: black;">
        </thead>
        <table class="table-bordered table" width="100%" cellspacing="0">
            <thead class="text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Code Material</th>
                    <th scope="col">Items Name</th>
                    <th scope="col">Specification</th>
                    <th scope="col">Qty</th>
                </tr>
            </thead>
            @foreach ($new as $key => $booking)
                <tbody class="text-center">
                    <tr>
                        <td class="table-plus">{{ $key + 1 }}</td>
                        <td class="table-plus">{{ $booking->stock->id_sparepart }}</td>
                        <td class="table-plus">{{ $booking->stock->sparepart->category->nama_category }}</td>
                        <td class="table-plus">{{ $booking->stock->sparepart->spesifikasi_sparepart }}</td>
                        <td class="table-plus">{{ $booking->qty_booked }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        <div class="">
            @if ($type == null || $type == 'MEMO')
                <form action="/sales/sparepart/revision/{{ $order->id_order }}" method="post">
                    @csrf
                    <label for=""><b>Input No. DO/Memo DO</b> </label>
                    <div class="row my-5">
                        <div class="col-3">
                            <select name="do-memo" id="" class="form-control">
                                @if($order->do_order)
                                    <option value="1">DO</option>
                                @elseif($order->memo_order)
                                    <option value="2">MEMO/DO</option>
                                @endif
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="No. DO/Memo DO" name="no-do-memo"
                                @if ($type == 'DO') value="{{ $order->revisi->do_order }}" readonly
                                
                            @else
                                value="{{ $order->revisi->memo_order }}" @endif>
                        </div>
                    </div>
                    <div class="modal-footer my-3">
                        <a href="/sales/sparepart/revision" class="btn merah text-white me-2"> Back</a>
                        @if ($type != 'DO')
                            <button type="submit" class="btn btn-primary"> Submit</button>
                        @endif
                    </div>
                </form>
            @else
                <label for=""><b>Input No. DO/Memo DO</b> </label>
                <div class="row my-2">
                    <div class="col-3">
                        <select name="do-memo" id="" class="form-control">
                            <option value="1">DO</option>
                        </select>
                     </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="No. DO/Memo DO" name="no-do-memo"
                            value="{{ $order->do_order }}" readonly>
                    </div>
                </div>
                <div class="modal-footer my-3">
                    <a href="/sales/sparepart/revision" class="btn merah btn-danger text-white"> Back</a>
                </div>
            @endif
        </div>
    </div>
@endsection
