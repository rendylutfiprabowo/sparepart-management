@extends('template.warehouseBranchSparepart')

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
        <div class="">
            @if ($type == null || $type == 'MEMO')
                <form action="/sales/sparepart/revision/{{ $order->id_order }}" method="post">
                    @csrf
                    <label for=""><b>No. DO/Memo DO</b> </label>
                    <div class="row my-5">
                        <div class="col-3">
                            <select name="do-memo" id="" readonly class="form-control">
                                @if ($order->do_order)
                                    <option value="1">DO</option>
                                @elseif($order->memo_order)
                                    <option value="2">MEMO/DO</option>
                                @endif
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="No. DO/Memo DO" name="no-do-memo"
                                @if ($type == 'DO') value="{{ $order->do_order }}" readonly
                                
                            @elseif ($type == 'MEMO')
                                value="{{ $order->memo_order }}" @endif>
                        </div>
                    </div>
                    <div class="modal-footer gap-2 pt-4">
                        <a href="/warehouse/branch/returItem" class="btn btn-secondary"> Back</a>
                        @if ($type != 'DO')
                            <button type="submit" class="btn btn-success"> Submit</button>
                        @endif
                    </div>
                </form>
            @else
                <label for=""><b>No. DO/Memo DO</b> </label>
                <div class="row my-2">
                    <div class="col-3">
                        <select name="do-memo" id="" readonly class="form-control">
                            <option value="1">DO</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="No. DO/Memo DO" name="no-do-memo"
                            value="{{ $order->do_order }}" readonly>
                    </div>
                </div>
                <div class="modal-footer my-3">
                    <a href="/warehouse/branch/returItem" class="btn btn-secondary"> Back</a>
                    <button type="submit" class="btn btn-success"> Submit</button>
                </div>
            @endif
        </div>
    </div>
@endsection
