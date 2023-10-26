@extends('template.teknisiSparepart')
@section('content')
    @if ($order->status != 'revisi')
        <form method="POST" action="/technician/listspk/{{ $order->id_order }}/return">
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
                        <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                            placeholder="" readonly>
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
                @elseif($order->do_order != null && $order->memo_order != null)
                    <strong><label class="form-label">DO</label></strong>
                    <div class="row">
                        <div class="form-group col-lg-1 mb-3">
                            <input type="text" class="form-control" name="" value="DO" placeholder=""
                                readonly>
                        </div>
                        <div class="form-group col-lg-11 mb-3">
                            <input hidden type="text" class="form-control" name="" value="{{ $order->do_order }}"
                                placeholder="" readonly>
                        </div>
                    </div>
                    <strong><label class="form-label">No. SPK</label></strong>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                            placeholder="" readonly>
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
                            <th scope="col">Code Material</th>
                            <th scope="col">Items Name</th>
                            <th scope="col">Spesifikasi</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Return</th>
                        </tr>
                    </thead>
                    @foreach ($order->booked as $no => $booking)
                        <tbody class="text-center">
                            <tr>
                                <td class="table-plus">{{ $no + 1 }}</td>
                                <td class="table-plus">{{ $booking->stock->id_sparepart }}</td>
                                <td class="table-plus">{{ $booking->stock->sparepart->category->nama_category }}</td>
                                <td class="table-plus">{{ $booking->stock->sparepart->spesifikasi_sparepart }}</td>
                                <input hidden type="text" name="id_stock[]" value="{{ $booking->stock->id_stock }}"
                                    id="">
                                <td class="table-plus">{{ $booking->qty_booked }}</td>
                                <td class="table-plus">
                                    <input style="text-align:center;" type="number" name="qty_booked[]" value="0"
                                        min="0" max="{{ $booking->qty_booked }}">
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    <input hidden type="text" name="id_technician" value="{{ $order->id_technician }}">
                </table>

                <div class="items mt-5">
                    <strong><label class="form-label mt-5">Material Diluar Scope</label></strong>
                    <strong><label class="form-label">Store Name</label></strong>
                    <div class="item mb-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                            <div class="d-flex">
                                <select class="form-control col-7 category-select" placeholder="Enter Customer Name"
                                    name="category" id="category">
                                    <option value="" selected disabled>-- Pilih Sparepart --</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id_category }}">{{ $category->nama_category }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="col d-flex align-items-center mx-3 text-right">qty</div>
                                <input class="col form-control mx-3" name="qty[]" value="0">
                                <input class="col form-control mx-3" name="dim" readonly>
                                <div class="col btn btn-danger form-control ml-3" onclick="deleteItem(this)">hapus</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Spesifikasi</label>
                            <select name="stocks[]" id="stock" class="form-control specification-select"
                                onchange="updateItem(this)">
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center my-3 mb-3">
                    <div onclick="addNewItem()" class="btn btn-secondary">Add Item

                    </div>
                </div>


                <div class="modal-footer">
                    <a href="/warehouse/branch/listspk" class="btn merah text-white"> back</a>
                    <button type="submit" class="btn btn-primary"> Submit</button>
                </div>
        </form>
    @else
        <div class="card rounded-4 p-4">
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
            @elseif($order->do_order != null && $order->memo_order != null)
                <strong><label class="form-label">DO</label></strong>
                <div class="row">
                    <div class="form-group col-lg-1 mb-3">
                        <input type="text" class="form-control" name="" value="DO" placeholder=""
                            readonly>
                    </div>
                    <div class="form-group col-lg-11 mb-3">
                        <input hidden type="text" class="form-control" name="" value="{{ $order->do_order }}"
                            placeholder="" readonly>
                    </div>
                </div>
                <strong><label class="form-label">No. SPK</label></strong>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="" value="{{ $order->spk_order }}"
                        placeholder="" readonly>
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
                        <th scope="col">Code Material</th>
                        <th scope="col">Items Name</th>
                        <th scope="col">Spesifikasi</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Return</th>
                    </tr>
                </thead>
                {{-- @dd($return) --}}
                @foreach ($order->booked as $no => $booking)
                    <tbody class="text-center">
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $booking->stock->id_sparepart }}</td>
                            <td class="table-plus">{{ $booking->stock->sparepart->category->nama_category }}</td>
                            <td class="table-plus">{{ $booking->stock->sparepart->spesifikasi_sparepart }}</td>
                            <input hidden type="text" name="id_stock[]" value="{{ $booking->stock->id_sparepart }}"
                                id="">
                            <td class="table-plus">{{ $booking->qty_booked }}</td>
                            {{-- @dd($return->where('id_stock', $booking->id_stock)) --}}
                            <td class="table-plus">
                                <input style="text-align:center;" type="number" name="qty_booked[]"
                                    value="{{ $return->where('id_stock', $booking->id_stock) }}" min="0"
                                    max="{{ $booking->qty_booked }}">
                            </td>
                        </tr>
                    </tbody>
                @endforeach
                <input hidden type="text" name="id_technician" value="{{ $order->id_technician }}">
            </table>

            <div class="items mt-5">
                <strong><label class="form-label mt-5">Material Diluar Scope</label></strong>
                <strong><label class="form-label">Store Name</label></strong>
                <div class="item mb-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                        <div class="d-flex">
                            <select class="form-control col-7 category-select" placeholder="Enter Customer Name"
                                name="category" id="category">
                                <option value="" selected disabled>-- Pilih Sparepart --</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->id_category }}">{{ $category->nama_category }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="col d-flex align-items-center mx-3 text-right">qty</div>
                            <input class="col form-control mx-3" name="qty[]" value="0">
                            <input class="col form-control mx-3" name="dim" readonly>
                            <div class="col btn btn-danger form-control ml-3" onclick="deleteItem(this)">hapus</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Spesifikasi</label>
                        <select name="stocks[]" id="stock" class="form-control specification-select"
                            onchange="updateItem(this)">
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center my-3 mb-3">
                <div onclick="addNewItem()" class="btn btn-secondary">Add Item

                </div>
            </div>


            <div class="modal-footer">
                <a href="/warehouse/branch/listspk" class="btn merah text-white"> back</a>
                <button type="submit" class="btn btn-primary"> Submit</button>
            </div>
    @endif
    </div>
    </div>
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
            var dimension = $(select).closest(".item").find('input[name="dim"]');

            var dataDim = selectedOption.data("dim");
            dimension.val(dataDim);
            console.log(dimension.val());
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let itemCount = 1;

        // Event delegation to handle category select change
        document.addEventListener('change', function(event) {
            if (event.target.classList.contains('category-select')) {
                const categoryId = event.target.value;

                var url = window.location.href;
                var parts = url.split('/');
                var storeId = "{{ $order->id_store }}";
                // Find the corresponding specification select element
                const specificationSelect = event.target.parentElement.parentElement.parentElement.querySelector(
                    '.specification-select');

                // Clear existing options
                specificationSelect.innerHTML = '';

                if (categoryId) {
                    // Fetch specifications based on the selected category and store using an AJAX request
                    $.ajax({
                        url: '/get/stock/' + categoryId + '/' + storeId,
                        type: 'GET',
                        success: function(data) {
                            // Populate the specification select with the retrieved data
                            data.forEach(function(stock) {
                                const option = document.createElement('option');
                                // option.data-dim=stock.satuan;
                                option.value = stock.id_stock;
                                option.text = stock.spesifikasi_sparepart;

                                option.setAttribute('data-dim', stock.satuan);
                                specificationSelect.appendChild(option);
                            });
                        }
                    });
                }
            }
        });

        function addNewItem() {
            itemCount++;
            const formContainer = document.querySelector(".items");
            const originalDiv = formContainer.querySelector(".item");
            const newDiv = originalDiv.cloneNode(true);

            // Update IDs and names for the new elements
            newDiv.querySelectorAll('.category-select').forEach((select) => {
                select.id = `category${itemCount}`;
                select.name = `category`;
            });

            newDiv.querySelector('.specification-select').innerHTML = '';

            formContainer.appendChild(newDiv);
        }

        function deleteItem(element) {
            const itemElements = document.querySelectorAll('.item');
            if (itemElements.length > 1) {
                element.parentElement.parentElement.parentElement.remove();
            };

        }
    </script>
@endsection
