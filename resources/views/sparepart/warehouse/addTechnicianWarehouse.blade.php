@extends('template.warehouseSparepart')
@section('content')
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
                            <h5>In Progress</h5>
                        </div>
                    </div>
                    <div class="col rounded bg-white p-2 shadow-sm">
                        <h3>Total Item</h3>
                        <div class="badge badge-danger">
                            <h5>55</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/warehouse/add-worker/{{ $order->id_order }}">
        @csrf
        <div class="card rounded-4 p-4">
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
            @if ($order->do_order != null)
                <strong><label class="form-label">DO</label></strong>
                <div class="row">
                    <div class="form-group col-lg-1 mb-3">
                        <input type="text" class="form-control" name="" value="DO" placeholder="" readonly>
                    </div>
                    <div class="form-group col-lg-11 mb-3">
                        <input type="text" class="form-control" name="" value="{{ $order->do_order }}"
                            placeholder="" readonly>
                    </div>
                </div>
                <strong><label class="form-label">No. SPK</label></strong>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="" value="{{ $order->spk_order }}" placeholder=""
                        readonly>
                </div>
                <strong><label class="form-label">No. Nota Penyerahan</label></strong>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                        placeholder="" readonly>
                </div>
                <strong><label class="form-label">No. Surat Jalan</label></strong>
                <div class="form-group">
                    <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                        placeholder="" readonly>
                </div>
            @elseif($order->do_order == null)

            @elseif($order->do_order != null && $order->memo_order != null)
            @endif
            <strong><label class="form-label">Input Technician</label></strong>
            <select class="form-control with-bordered" id="select-technician" placeholder="Enter Technician Name"
                name="id_technician">
                <option value="Pilih Teknisi" placeholder="Pilih Teknisi">
                    @foreach ($technician as $tech)
                <option
                    value="{{ $tech['id_technician'] }}"@if ($order->technician) selected={{ $tech['nama_technician'] == $order->technician->nama_technician ? 'true' : 'false' }} @endif>
                    {{ $tech['nama_technician'] }}
                </option>
            </select>
            @endforeach
            <div class="modal-footer">
                <a href="/warehouse/listspk" class="btn merah text-white"> back</a>
                <button type="submit" href="" class="btn btn-primary"> Submit</button>
            </div>
    </form>
    </div>

    </div>
@endsection
