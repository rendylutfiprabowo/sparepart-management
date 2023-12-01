@extends('template.teknisiSparepart')
@section('contents')
    @if ($order->status == 'on-technician')
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

                <div class="items mt-4">
                    <strong><label class="form-label mt-5">Material Diluar Scope</label></strong>
                    <div class="item mt-4">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-8">
                                <select class="form-select category-select" placeholder="Enter Customer Name"
                                    name="category" id="category">
                                    <option value="" selected disabled>-- Pilih Sparepart --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id_category }}">{{ $category->nama_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <strong>qty</strong>
                            </div>
                            <div class="col">
                                <input class="form-control" name="qty[]" value="0">
                            </div>
                            <div class="col">
                                <input class="form-control" name="dim" disabled>
                            </div>
                            <div class="col">
                                <div class="btn btn-danger form-control" onclick="deleteItem(this)"><i
                                        class="bi bi-trash-fill"></i>

                                </div>
                            </div>
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="exampleFormControlInput1" class="form-label">Spesifikasi</label>
                            <select name="stocks[]" id="stock" class="form-select specification-select"
                                onchange="updateItem(this)">
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center my-3 mb-3">
                    <div onclick="addNewItem()" class="btn btn-secondary btn-sm">Add Items</div>
                </div>


                <div class="modal-footer">
                    <a href="/technician/listspk" class="btn merah text-white"> back</a>
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
            @if ($order->revisi == null)
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
                                <input hidden type="text" name="id_stock[]"
                                    value="{{ $booking->stock->id_sparepart }}" id="">
                                <td class="table-plus">{{ $booking->qty_booked }}</td>
                            </tr>
                        </tbody>
                    @endforeach


                    <input hidden type="text" name="id_technician" value="{{ $order->id_technician }}">
                </table>
                <div class="modal-footer">
                    <a href="/technician/listspk" class="btn merah text-white"> back</a>
                </div>
            @else
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
                                <input hidden type="text" name="id_stock[]"
                                    value="{{ $booking->stock->id_sparepart }}" id="">
                                <td class="table-plus">{{ $booking->qty_booked }}</td>
                                <td class="table-plus">
                                    @if ($order->revisi != null)
                                        @if ($booking->vice())
                                            {{ $booking->vice()->qty_booked }}
                                        @else
                                            0
                                        @endif
                                    @else
                                        <input style="text-align:center;" type="number" name="qty_booked[]"
                                            value="0" min="0" max="{{ $booking->qty_booked }}">
                                    @endif
                                    </>
                            </tr>
                        </tbody>
                    @endforeach


                    <input hidden type="text" name="id_technician" value="{{ $order->id_technician }}">
                </table>

                <div class="items mt-5">
                    <strong><label class="form-label mt-5">Material Diluar Scope</label></strong>
                    <div></div>
                    <strong><label class="form-label">Store Name</label></strong>
                    @if ($new == null)
                        <div class="items mt-4">
                            <h3 class="text-muted my-1 text-center">Spareparts</h3>
                            <div class="item mt-4">
                                <div>
                                    <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-8">
                                        <select class="form-select category-select" placeholder="Enter Customer Name"
                                            name="category" id="category">
                                            <option value="" selected disabled>-- Pilih Sparepart --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id_category }}">
                                                    {{ $category->nama_category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <strong>qty</strong>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" name="qty[]" value="0">
                                    </div>
                                    <div class="col">
                                        <input class="form-control" name="dim" disabled>
                                    </div>
                                    <div class="col">
                                        <div class="btn btn-danger form-control" onclick="deleteItem(this)"><i
                                                class="bi bi-trash-fill"></i>

                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mt-4">
                                    <label for="exampleFormControlInput1" class="form-label">Spesifikasi</label>
                                    <select name="stocks[]" id="stock" class="form-select specification-select"
                                        onchange="updateItem(this)">
                                    </select>
                                </div>
                            </div>
                        </div>
                    @else
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
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($new as $booking)
                                <tbody class="text-center">
                                    <tr>
                                        <td class="table-plus">{{ $no++ }}</td>
                                        <td class="table-plus">{{ $booking->stock->id_sparepart }}</td>
                                        <td class="table-plus">{{ $booking->stock->sparepart->category->nama_category }}
                                        </td>
                                        <td class="table-plus">{{ $booking->stock->sparepart->spesifikasi_sparepart }}
                                        </td>
                                        <td class="table-plus">{{ $booking->qty_booked }}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    @endif
                </div>
                @if ($new == null)
                    <div class="d-flex justify-content-center my-3 mb-3">
                        <div onclick="addNewItem()" class="btn btn-secondary btn-sm">Add Items</div>
                    </div>

                    <div class="modal-footer">
                        <a href="/technician/listspk" class="btn merah text-white"> back</a>
                        <button type="submit" class="btn btn-primary"> Submit</button>
                    </div>
                @else
                    <div class="modal-footer">
                        <a href="/technician/listspk" class="btn merah text-white"> back</a>
                    </div>
                @endif
            @endif
    @endif
    </div>
    </div>
    <script>
        function updateItem(select) {
            var selectedOption = $(select).find(":selected");
            var dimension = $(select).closest(".item").find('input[name="dim"]');
            var quantity = $(select).closest(".item").find('input[name="qty[]"]');

            var dataDim = selectedOption.data("dim");
            var dataMax = selectedOption.data("qty");
            dimension.val(dataDim);
            quantity.attr('max', dataMax);
        }
    </script>

    <script>
        let itemCount = 1;

        // Event delegation to handle category select change
        document.addEventListener('change', function(event) {
            if (event.target.classList.contains('category-select')) {
                const categoryId = event.target.value;

                var url = window.location.href;
                var parts = url.split('/');
                var storeId = '{{ $id_store }}';

                // Find the corresponding specification select element
                const specificationSelect = event.target.parentElement.parentElement.parentElement.querySelector(
                    '.specification-select');

                // Clear existing options
                specificationSelect.innerHTML = '';
                const temp = document.createElement('option');
                temp.value = '';
                temp.text = '-- Pilih Spesifikasi --';
                specificationSelect.appendChild(temp);

                if (categoryId) {
                    // Fetch specifications based on the selected category and store using an AJAX request
                    $.ajax({
                        url: '/get/stock/' + categoryId + '/' + storeId,
                        type: 'GET',
                        success: function(data) {
                            console.log(data)

                            // Populate the specification select with the retrieved data
                            data.forEach(function(stock) {
                                const option = document.createElement('option');
                                // option.data-dim=stock.satuan;
                                option.value = stock.id_stock;
                                option.text = stock.spesifikasi_sparepart + (
                                    ` (tersisa ${stock.qty} ${stock.satuan})`);

                                option.setAttribute('data-dim', stock.satuan);
                                option.setAttribute('data-qty', stock.qty)
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
