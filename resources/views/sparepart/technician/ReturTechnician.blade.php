@extends('template.teknisiSparepart')
@section('content')
    <form method="POST" action="/warehouse/add-worker/branch/{{ $order->id_order }}">
        @csrf
        <div class="card rounded-4 p-4">
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
            @elseif($order->do_order == null)
                <strong><label class="form-label">Memo DO</label></strong>
                <div class="row">
                    <div class="form-group col-lg-1 mb-3">
                        <input type="text" class="form-control" name="" value="DO" placeholder="" readonly>
                    </div>
                    <div class="form-group col-lg-11 mb-3">
                        <input type="text" class="form-control" name="" value="{{ $order->memo_order }}"
                            placeholder="" readonly>
                    </div>
                </div>
                <strong><label class="form-label">No. SPK</label></strong>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="" value="{{ $order->spk_order }}" placeholder=""
                        readonly>
                </div>
            @elseif($order->do_order != null && $order->memo_order != null)
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
            @endif
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
                        <th scope="col">Return</th>
                    </tr>
                </thead>
                @foreach ($order->booked as $no => $booking)
                    <tbody class="text-center">
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $booking->stock->sparepart->nama_sparepart }}</td>
                            <td class="table-plus">{{ $booking->stock->id_sparepart }}</td>
                            <td class="table-plus">{{ $booking->qty_booked }}</td>
                            <td class="table-plus">
                                <input style="border:none;" type="number" name="return_quantity[]" value="0"
                                    min="0" max="{{ $booking->qty_booked }}">
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>

            <strong><label class="form-label mt-5">Material Diluar Scope</label></strong>
            <strong><label class="form-label">Store Name</label></strong>
            <div class="items">
                <div class="item mb-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                        <div class="d-flex">
                            <select class="form-control col-7" placeholder="" name="stocks[]"
                                onchange="updateItem(this)">
                                <option value="NULL" selected disabled>--Pilih Sparepart--</option>
                                @foreach ($stocks as $stock)
                                    <option value="{{ $stock->id_stock }}"
                                        data-spec="{{ $stock->sparepart->spesifikasi_sparepart }}"
                                        data-dim="{{ $stock->sparepart->satuan }}">
                                        {{ $stock->sparepart->nama_sparepart }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="col d-flex align-items-center mx-3 text-right">qty</div>
                            <input class="col form-control mx-3" name="qty[]" value="0">
                            <input class="col form-control mx-3" name="dim"
                                value="{{ $stocks ? $stocks->first()->sparepart->satuan : '' }}" readonly>
                            <div class="col btn btn-danger form-control ml-3" onclick="deleteItem(this)">hapus</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Spesifikasi</label>
                        <input type="text" class="form-control" name="spesifikasi" readonly>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center my-3 mb-3">
                <div onclick="addNewItem()" class="btn btn-secondary">Add Item

                </div>
            </div>


            <div class="modal-footer">
                <a href="/warehouse/branch/listspk" class="btn merah text-white"> back</a>
                <button type="submit" href="" class="btn btn-primary"> Submit</button>
            </div>

    </form>
    <script>
        function addNewItem() {
            const formContainer = document.querySelector(".items");
            const originalDiv = formContainer.querySelector(".item");
            const newDiv = originalDiv.cloneNode(true);
            formContainer.appendChild(newDiv);
        }

        function deleteItem(element) {
            element.parentElement.parentElement.parentElement.remove();
        }
    </script>
    <script>
        function updateForm(sel) {
            var selectedOption = $('#select-customer').find('option:selected');
            var phoneNumberInput = $('input[name="phone_number"]');
            var addressInput = $('input[name="address"]');

            // Update the input values based on the selected customer
            phoneNumberInput.val(selectedOption.data('phone'));
            addressInput.val(selectedOption.data('address'));
        }

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
    </div>
    </div>
@endsection
