@extends('template.warehouseSparepart')
@section('content')
    <div class="col-md-12">
        @foreach ($order as $no => $orders)
            <form method="POST" action="/warehouse/add-worker/{{ $orders->id_order }}">
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
                        <tbody class="text-center">
                            <tr>
                                <td class="table-plus">{{ $no + 1 }}</td>
                                <td class="table-plus">{{ $orders->booked->stock->sparepart->nama_sparepart }}</td>
                                <td class="table-plus">{{ $orders->booked->stock->id_sparepart }}</td>
                                <td class="table-plus">{{ $orders->booked->qty_booked }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @if ($orders->do_order != null)
                        <strong><label class="form-label">DO</label></strong>
                        <div class="row">
                            <div class="form-group col-lg-1 mb-3">
                                <input type="text" class="form-control" name="" value="DO" placeholder=""
                                    readonly>
                            </div>
                            <div class="form-group col-lg-11 mb-3">
                                <input type="text" class="form-control" name="" value="{{ $orders->do_order }}"
                                    placeholder="" readonly>
                            </div>
                        </div>
                        <strong><label class="form-label">No. SPK</label></strong>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="" value="{{ $orders->spk_order }}"
                                placeholder="" readonly>
                        </div>
                        <strong><label class="form-label">No. Nota Penyerahan</label></strong>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="" value="{{ $orders->spk_order }}"
                                placeholder="" readonly>
                        </div>
                        <strong><label class="form-label">No. Surat Jalan</label></strong>
                        <div class="form-group">
                            <input type="text" class="form-control" name="" value="{{ $orders->spk_order }}"
                                placeholder="" readonly>
                        </div>
                    @elseif($orders->do_order == null)

                    @elseif($orders->do_order != null && $orders->memo_order != null)
                    @endif
        @endforeach
        <strong><label class="form-label">Input Technician</label></strong>
        <select class="form-control with-bordered" id="select-technician" placeholder="Enter Technician Name"
            name="id_technician">
            @foreach ($technician as $tech)
                <option value="{{ $tech['id_technician'] }}">{{ $tech['nama_technician'] }}
                </option>
            @endforeach
        </select>
        <div class="modal-footer">
            <a href="/warehouse/listspk" class="btn merah text-white"> back</a>
            <button type="submit" href="" class="btn btn-primary"> Submit</button>
        </div>
        </form>
    </div>
    </div>
@endsection
