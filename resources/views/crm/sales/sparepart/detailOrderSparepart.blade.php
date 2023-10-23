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
                    @if ($type == null)
                        <th scope="col">Hapus</th>
                    @endif
                </tr>
            </thead>
            @foreach ($order->booked as $no => $booking)
                <tbody class="text-center">
                    <tr>
                        <td class="table-plus">{{ $no + 1 }}</td>
                        <td class="table-plus">{{ $booking->stock->sparepart->nama_sparepart }}</td>
                        <td class="table-plus">{{ $booking->stock->id_sparepart }}</td>
                        <td class="table-plus">{{ $booking->qty_booked }}</td>
                        @if ($type == null)
                            <td class="table-plus"><a
                                    href="/sales/sparepart/order/remove-item/{{ $booking->id_booked }}">Hapus</a></td>
                        @endif
                    </tr>
                </tbody>
            @endforeach
        </table>
        @if ($type == null)
            <form action="/sales/sparepart/order/{{ $order->id_order }}/add-item" method="post">
                @csrf
                <div class="items">
                    <div class="item mb-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                            <div class="d-flex">
                                <select class="form-control col-7" placeholder="Enter Customer Name" name="stock"
                                    onchange="updateItem(this)">
                                    <option value="" selected disabled>-- Pilih Sparepart --</option>
                                    @foreach ($stocks as $stock)
                                        <option value="{{ $stock->id_stock }}"
                                            data-spec="{{ $stock->sparepart->spesifikasi_sparepart }}"
                                            data-dim="{{ $stock->sparepart->satuan }}">
                                            {{ $stock->sparepart->nama_sparepart }}</option>
                                    @endforeach
                                </select>
                                <div class="col d-flex align-items-center mx-3 text-right">qty</div>
                                <input class="col form-control mx-3" name="qty" value="0">
                                <input class="col form-control mx-3" name="dim" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Spesifikasi</label>
                            <input type="text" class="form-control" name="spesifikasi" readonly>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">Tambahkan Item</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif
        <div class="">
            @if ($type == null || $type == 'MEMO')
                <form action="/sales/sparepart/order/{{ $order->id_order }}/add-do" method="post">
                    @csrf
                    <label for=""><b>Input No. DO/Memo DO</b> </label>
                    <div class="row my-2">
                        <div class="col-3">
                            <select name="do-memo" id="" class="form-control">
                                <option value="1">DO</option>
                                <option value="2"
                                    {{ $order->memo_order && !$order->spk_order ? "selected='true'" : '' }}>MEMO/DO
                                </option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="No. DO/Memo DO" name="no-do-memo"
                                @if ($order->do_order != null) value="{{ $order->do_order }}" readonly
                                
                            @elseif($order->memo_order != null)
                                value="{{ $order->memo_order }}" @endif>
                        </div>
                    </div>
                    <label for=""><b>Input No. SPK</b> </label>
                    <input type="text" class="form-control my-2" placeholder="No. SPK" name="no-spk"
                        @if ($order->spk_order != null) value="{{ $order->spk_order }}"
                                readonly @endif>


                    <div class="modal-footer">
                        <a href="/sales/sparepart/order" class="btn merah text-white"> Back</a>
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
                            <option value="2"
                                {{ $order->memo_order && !$order->spk_order ? "selected='true'" : '' }}>MEMO/DO</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="No. DO/Memo DO" name="no-do-memo"
                            @if ($order->do_order != null) value="{{ $order->do_order }}" readonly
                        
                    @elseif($order->memo_order != null)
                        value="{{ $order->memo_order }}" @endif>
                    </div>
                </div>
                <label for=""><b>Input No. SPK</b> </label>
                <input type="text" class="form-control my-2" placeholder="No. SPK" name="no-spk"
                    @if ($order->spk_order != null) value="{{ $order->spk_order }}"
                        readonly @endif>
                <div class="modal-footer">
                    <a href="/sales/sparepart/order" class="btn merah text-white"> Back</a>
                </div>
            @endif
        </div>
    </div>

    </div>
    <script>
        function updateItem(select) {
            var selectedOption = $(select).find(":selected");
            var spesifikasi = $(select).closest(".item").find('input[name="spesifikasi"]');
            var dimension = $(select).closest(".item").find('input[name="dim"]');

            var dataSpec = selectedOption.data("spec");
            var dataDim = selectedOption.data("dim");
            spesifikasi.val(dataSpec);
            dimension.val(dataDim);
        }
    </script>
@endsection
