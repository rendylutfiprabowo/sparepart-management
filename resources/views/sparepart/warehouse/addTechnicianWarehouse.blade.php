@extends('template.warehouseSparepart')
@section('contents')
    <div class="d-flex align-items-center">
        <div>
            <a href="/sales/sparepart/order" class="btn btn-danger btn-sm"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="ms-3">
            <h3 class="text-muted">Detail Customer</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="">
                            <div class="card text-bg-light shadow-sm">
                                <div class="card-header fw-bold">Information SpareParts</div>
                                <div class="card-body">
                                    <table class="table-borderless table">
                                        <tbody>
                                            <tr>
                                                <th scope="col"><span><i class="bi bi-person"></i></span> Customer Name
                                                </th>
                                                <td> : {{ $order->customer->nama_customer }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col"><span><i class="bi bi-123"></i></span> Order Number</th>
                                                <td> : {{ $order->id_order }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col"><span><i class="bi bi-calendar-check"></i></span> Order
                                                    Date
                                                </th>
                                                <td> : {{ $order->date_order }}</td>
                                            </tr>

                                            <tr>
                                                <th scope="col"><span><i class="bi bi-shop-window"></i></span> Store</th>
                                                <td> : {{ $order->store->nama_store }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col"><span><i class="bi bi-geo-alt"></i></span> Address</th>
                                                <td><small>: Jakarta Barat, Kembangan Puri Indah, Dekat Kampus Mercu
                                                        Buana</small> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="col">
                            <div class="card text-bg-light shadow-sm">
                                <div class="card-header fw-bold">Status </div>
                                <div class="card-body">
                                    @if ($order->status)
                                        <h5 class="card-title text-bg-danger rounded p-2 text-center">{{ $order->status }}
                                        </h5>
                                    @else
                                        <h5 class="card-title p-2 text-center"> - </h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-bg-light mt-2 shadow-sm">
                                <div class="card-header fw-bold">Total Items</div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @php
                                            $sum = 0;
                                            foreach ($order->booked as $booked) {
                                                $sum += $booked->qty_booked;
                                            }
                                        @endphp
                                        {{ $sum }}
                                    </h5>

                                </div>
                            </div>
                            {{-- <h3>Total Item</h3>
                    @php
                        $sum = 0;
                        foreach ($order->booked as $booked) {
                            $sum += $booked->qty_booked;
                        }
                    @endphp
                    <div class="badge badge-danger">
                        <h5>{{ $sum }}</h5>
                    </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @dd($order->id_store) --}}
    @if (Auth::user()->warehouse->store->id_store == $order->id_store)
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
                            <th scope="col">Code Material</th>
                            <th scope="col">Items Name</th>
                            <th scope="col">Spesifikasi</th>
                            <th scope="col">Qty</th>
                        </tr>
                    </thead>
                    @foreach ($order->booked as $no => $booking)
                        <tbody class="text-center">
                            <tr>
                                <td class="table-plus">{{ $no + 1 }}</td>
                                <td class="table-plus">{{ $booking->stock->id_sparepart }}</td>
                                <td class="table-plus">{{ $booking->stock->sparepart->category->nama_category }}</td>
                                <td class="table-plus">{{ $booking->stock->sparepart->spesifikasi_sparepart }}</td>
                                <td class="table-plus">{{ $booking->qty_booked }}</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                @if ($order->jenis_layanan == 1)
                    @if ($order->do_order != null)
                        <strong><label class="form-label">DO</label></strong>
                        <div class="row">
                            <div class="form-group col-lg-1 mb-3">
                                <input type="text" class="form-control" name="" value="DO" placeholder=""
                                    readonly>
                            </div>
                            <div class="form-group col-lg-11 mb-3">
                                <input type="text" class="form-control" name="" value="{{ $order->do_order }}"
                                    placeholder="" readonly>
                            </div>
                        </div>
                        <strong><label class="form-label">No. SPK</label></strong>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                                placeholder="" readonly>
                        </div>
                        <strong><label class="form-label">Nota Penyerahan</label></strong>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="nota_penyerahan"
                                placeholder=""value="{{ $order->nota_penyerahan }}"
                                @if ($order->nota_penyerahan != null) readonly @endif>
                        </div>
                    @elseif($order->do_order == null)
                        <strong><label class="form-label">Memo DO</label></strong>
                        <div class="row">
                            <div class="form-group col-lg-1 mb-3">
                                <input type="text" class="form-control" name="" value="DO" placeholder=""
                                    readonly>
                            </div>
                            <div class="form-group col-lg-11 mb-3">
                                <input type="text" class="form-control" name="" value="{{ $order->memo_order }}"
                                    placeholder="" readonly>
                            </div>
                        </div>
                        <strong><label class="form-label">No. SPK</label></strong>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                                placeholder="" readonly>
                        </div>
                        <strong><label class="form-label">Surat Jalan</label></strong>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="surat_jalan"
                                placeholder=""value="{{ $order->surat_jalan }}"
                                @if ($order->surat_jalan != null) readonly @endif>
                        </div>
                    @elseif($order->do_order != null && $order->memo_order != null)
                        <strong><label class="form-label">DO</label></strong>
                        <div class="row">
                            <div class="form-group col-lg-1 mb-3">
                                <input type="text" class="form-control" name="" value="DO" placeholder=""
                                    readonly>
                            </div>
                            <div class="form-group col-lg-11 mb-3">
                                <input type="text" class="form-control" name=""
                                    value="{{ $order->do_order }}" placeholder="" readonly>
                            </div>
                        </div>
                        <strong><label class="form-label">No. SPK</label></strong>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                                placeholder="" readonly>
                        </div>
                        <strong><label class="form-label">Nota Penyerahan</label></strong>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="nota_penyerahan" placeholder=""
                                value="{{ $order->nota_penyerahan }}" @if ($order->nota_penyerahan != null) readonly @endif>
                        </div>
                        <strong><label class="form-label">Surat Jalan</label></strong>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="surat_jalan" placeholder=""
                                value="{{ $order->surat_jalan }}" @if ($order->surat_jalan != null) readonly @endif>
                        </div>
                    @endif
                    @if ($order->id_technician == null)
                        <strong><label class="form-label">Input Technician</label></strong>
                        <select class="form-control with-bordered" id="select-technician"
                            placeholder="Enter Technician Name" name="id_technician">
                            <option value="" selected disabled>-- Pilih Technician --</option>

                            @foreach ($technician as $tech)
                                <option
                                    value="{{ $tech['id_technician'] }}"@if ($order->technician) selected={{ $tech['nama_technician'] == $order->technician->nama_technician ? 'true' : 'false' }} @endif>
                                    {{ $tech['nama_technician'] }}
                                </option>
                        </select>
                    @endforeach
                    <div class="modal-footer gap-2 pt-4">
                        <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                        <button type="submit" href="" class="btn btn-success"> Submit</button>
                    </div>
                @else
                    <strong><label class="form-label">Technician</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="" placeholder=""
                            value="{{ $order->technician->nama_technician }}" readonly>
                    </div>
                    <div class="modal-footer">
                        <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                    </div>
                @endif
            @elseif ($order->jenis_layanan == 2)
                @if ($order->do_order != null)
                    <strong><label class="form-label">DO</label></strong>
                    <div class="row">
                        <div class="form-group col-lg-1 mb-3">
                            <input type="text" class="form-control" name="" value="DO" placeholder=""
                                readonly>
                        </div>
                        <div class="form-group col-lg-11 mb-3">
                            <input type="text" class="form-control" name="" value="{{ $order->do_order }}"
                                placeholder="" readonly>
                        </div>
                    </div>
                    <strong><label class="form-label">No. SPK</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                            placeholder="" readonly>
                    </div>
                    <strong><label class="form-label">Nota Penyerahan</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="nota_penyerahan"
                            placeholder=""@if ($order->nota_penyerahan != null) value="{{ $order->nota_penyerahan }}" readonly
                    @else
                        value="{{ $order->nota_penyerahan }}" @endif>
                    </div>
                    @if ($order->nota_penyerahan == null)
                        <strong><label class="form-label">Delivery Type</label></strong>
                        <input type="text" class="form-control" name="technician_name" placeholder=""
                            value="Delievered by Other Party" readonly>
                        <div class="modal-footer gap-2 pt-4">
                            <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                            <button type="submit" href="" class="btn btn-success"> Submit</button>
                        </div>
                    @elseif($order->nota_penyerahan != null)
                        <strong><label class="form-label">Delivery Type</label></strong>
                        <input type="text" class="form-control" name="technician_name" placeholder=""
                            value="Delievered by Other Party" readonly>
                        <div class="modal-footer">
                            <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                        </div>
                    @endif
                @elseif($order->do_order == null)
                    <strong><label class="form-label">Memo DO</label></strong>
                    <div class="row">
                        <div class="form-group col-lg-1 mb-3">
                            <input type="text" class="form-control" name="" value="DO" placeholder=""
                                readonly>
                        </div>
                        <div class="form-group col-lg-11 mb-3">
                            <input type="text" class="form-control" name="" value="{{ $order->memo_order }}"
                                placeholder="" readonly>
                        </div>
                    </div>
                    <strong><label class="form-label">No. SPK</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                            placeholder="" readonly>
                    </div>
                    <strong><label class="form-label">Surat Jalan</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="surat_jalan" placeholder=""
                            @if ($order->surat_jalan != null) value="{{ $order->surat_jalan }}" readonly
                        @else
                                value="{{ $order->surat_jalan }}" @endif>
                    </div>
                    @if ($order->surat_jalan == null)
                        <strong><label class="form-label">Delivery Type</label></strong>
                        <input type="text" class="form-control" name="technician_name" placeholder=""
                            value="Delievered by Other Party" readonly>
                        <div class="modal-footer gap-2 pt-4">
                            <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                            <button type="submit" href="" class="btn btn-success"> Submit</button>
                        </div>
                    @elseif($order->surat_jalan != null)
                        <strong><label class="form-label">Delivery Type</label></strong>
                        <input type="text" class="form-control" name="technician_name" placeholder=""
                            value="Delievered by Other Party" readonly>
                        <div class="modal-footer">
                            <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                        </div>
                    @endif
                @endif
    @endif
    </form>
@else
    <form method="POST">
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
                        <th scope="col">Code Material</th>
                        <th scope="col">Items Name</th>
                        <th scope="col">Spesifikasi</th>
                        <th scope="col">Qty</th>
                    </tr>
                </thead>
                @foreach ($order->booked as $no => $booking)
                    <tbody class="text-center">
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $booking->stock->id_sparepart }}</td>
                            <td class="table-plus">{{ $booking->stock->sparepart->category->nama_category }}</td>
                            <td class="table-plus">{{ $booking->stock->sparepart->spesifikasi_sparepart }}</td>
                            <td class="table-plus">{{ $booking->qty_booked }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            @if ($order->jenis_layanan == 1)
                @if ($order->do_order != null)
                    <strong><label class="form-label">DO</label></strong>
                    <div class="row">
                        <div class="form-group col-lg-1 mb-3">
                            <input type="text" class="form-control" name="" value="DO" placeholder=""
                                disabled>
                        </div>
                        <div class="form-group col-lg-11 mb-3">
                            <input type="text" class="form-control" name="" value="{{ $order->do_order }}"
                                placeholder="" disabled>
                        </div>
                    </div>
                    <strong><label class="form-label">No. SPK</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                            placeholder="" disabled>
                    </div>
                    <strong><label class="form-label">Nota Penyerahan</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="nota_penyerahan"
                            placeholder=""value="{{ $order->nota_penyerahan }}" disabled>
                    </div>
                @elseif($order->do_order == null)
                    <strong><label class="form-label">Memo DO</label></strong>
                    <div class="row">
                        <div class="form-group col-lg-1 mb-3">
                            <input type="text" class="form-control" name="" value="DO" placeholder=""
                                disabled>
                        </div>
                        <div class="form-group col-lg-11 mb-3">
                            <input type="text" class="form-control" name="" value="{{ $order->memo_order }}"
                                placeholder="" disabled>
                        </div>
                    </div>
                    <strong><label class="form-label">No. SPK</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                            placeholder="" disabled>
                    </div>
                    <strong><label class="form-label">Surat Jalan</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="surat_jalan"
                            placeholder=""value="{{ $order->surat_jalan }}"
                            @if ($order->surat_jalan != null) disabled @endif>
                    </div>
                @elseif($order->do_order != null && $order->memo_order != null)
                    <strong><label class="form-label">DO</label></strong>
                    <div class="row">
                        <div class="form-group col-lg-1 mb-3">
                            <input type="text" class="form-control" name="" value="DO" placeholder=""
                                disabled>
                        </div>
                        <div class="form-group col-lg-11 mb-3">
                            <input type="text" class="form-control" name="" value="{{ $order->do_order }}"
                                placeholder="" disabled>
                        </div>
                    </div>
                    <strong><label class="form-label">No. SPK</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                            placeholder="" disabled>
                    </div>
                    <strong><label class="form-label">Nota Penyerahan</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="nota_penyerahan" placeholder=""
                            value="{{ $order->nota_penyerahan }}" @if ($order->nota_penyerahan != null) disabled @endif>
                    </div>
                    <strong><label class="form-label">Surat Jalan</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="surat_jalan" placeholder=""
                            value="{{ $order->surat_jalan }}" @if ($order->surat_jalan != null) disabled @endif>
                    </div>
                @endif
                @if ($order->id_technician == null)
                    <strong><label class="form-label">Input Technician</label></strong>
                    <select class="form-control with-bordered" disabled id="select-technician"
                        placeholder="Enter Technician Name" name="id_technician">
                        <option value="" selected disabled>-- Pilih Technician --</option>

                        @foreach ($technician as $tech)
                            <option
                                value="{{ $tech['id_technician'] }}"@if ($order->technician) selected={{ $tech['nama_technician'] == $order->technician->nama_technician ? 'true' : 'false' }} @endif>
                                {{ $tech['nama_technician'] }}
                            </option>
                    </select>
                @endforeach
                <div class="modal-footer">
                    <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                </div>
            @else
                <strong><label class="form-label">Technician</label></strong>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="" placeholder=""
                        value="{{ $order->technician->nama_technician }}" disabled>
                </div>
                <div class="modal-footer">
                    <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                </div>
            @endif
        @elseif ($order->jenis_layanan == 2)
            @if ($order->do_order != null)
                <strong><label class="form-label">DO</label></strong>
                <div class="row">
                    <div class="form-group col-lg-1 mb-3">
                        <input type="text" class="form-control" name="" value="DO" placeholder=""
                            disabled>
                    </div>
                    <div class="form-group col-lg-11 mb-3">
                        <input type="text" class="form-control" name="" value="{{ $order->do_order }}"
                            placeholder="" disabled>
                    </div>
                </div>
                <strong><label class="form-label">No. SPK</label></strong>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                        placeholder="" disabled>
                </div>
                <strong><label class="form-label">Nota Penyerahan</label></strong>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="nota_penyerahan"
                        placeholder=""@if ($order->nota_penyerahan != null) value="{{ $order->nota_penyerahan }}" disabled
                @else
                    value="{{ $order->nota_penyerahan }}" @endif>
                </div>
                @if ($order->nota_penyerahan == null)
                    <strong><label class="form-label">Delivery Type</label></strong>
                    <input type="text" class="form-control" name="technician_name" placeholder=""
                        value="Delievered by Other Party" disabled>
                    <div class="modal-footer">
                        <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                    </div>
                @elseif($order->nota_penyerahan != null)
                    <strong><label class="form-label">Delivery Type</label></strong>
                    <input type="text" class="form-control" name="technician_name" placeholder=""
                        value="Delievered by Other Party" disabled>
                    <div class="modal-footer">
                        <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                    </div>
                @endif
            @elseif($order->do_order == null)
                <strong><label class="form-label">Memo DO</label></strong>
                <div class="row">
                    <div class="form-group col-lg-1 mb-3">
                        <input type="text" class="form-control" name="" value="DO" placeholder=""
                            disabled>
                    </div>
                    <div class="form-group col-lg-11 mb-3">
                        <input type="text" class="form-control" name="" value="{{ $order->memo_order }}"
                            placeholder="" disabled>
                    </div>
                </div>
                <strong><label class="form-label">No. SPK</label></strong>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                        placeholder="" disabled>
                </div>
                <strong><label class="form-label">Surat Jalan</label></strong>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="surat_jalan" placeholder=""
                        @if ($order->surat_jalan != null) value="{{ $order->surat_jalan }}" disabled
                    @else
                            value="{{ $order->surat_jalan }}" @endif>
                </div>
                @if ($order->surat_jalan == null)
                    <strong><label class="form-label">Delivery Type</label></strong>
                    <input type="text" class="form-control" name="technician_name" placeholder=""
                        value="Delievered by Other Party" disabled>
                    <div class="modal-footer">
                        <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                    </div>
                @elseif($order->surat_jalan != null)
                    <strong><label class="form-label">Delivery Type</label></strong>
                    <input type="text" class="form-control" name="technician_name" placeholder=""
                        value="Delievered by Other Party" disabled>
                    <div class="modal-footer">
                        <a href="/warehouse/listspk" class="btn btn-secondary"> back</a>
                    </div>
                @endif
            @endif
            @endif
    </form>
    @endif
    </div>
    </div>
@endsection
