@extends('template.salesCrm')

@section('title', 'Detail Order Sparepart ')

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
                <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List SPK</h3>
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
                    @if ($type == null)
                        <th scope="col">Hapus</th>
                    @endif
                </tr>
            </thead>
            @foreach ($order->booked as $no => $booking)
                <tbody class="text-center">
                    <tr>
                        <td class="table-plus">{{ $no + 1 }}</td>
                        <td class="table-plus">{{ $booking->stock->sparepart->category->nama_category }}</td>
                        <td class="table-plus">{{ $booking->stock->sparepart->spesifikasi_sparepart }}</td>
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
                                <select class="form-control col-7 category-select" placeholder="Enter Customer Name"
                                    name="category" id="category">
                                    <option value="" selected disabled>-- Pilih Sparepart --</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id_category }}">{{ $category->nama_category }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="col d-flex align-items-center mx-3 text-right">qty</div>
                                <input class="col form-control mx-3" name="qty" value="0">
                                <input class="col form-control mx-3" name="dim" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Spesifikasi</label>
                            <select name="stock" id="stock" class="form-control specification-select"
                                onchange="updateItem(this)">

                            </select>
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
                                <option value="1" {{ $type == 'MEMO' ? "selected='true'" : '' }}>DO</option>
                                <option value="2">MEMO/DO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="No. DO/Memo DO" name="no-do-memo"
                                @if ($type == 'DO') value="{{ $order->do_order }}" readonly
                                
                            @else
                                value="{{ $order->memo_order }}" @endif>
                        </div>
                    </div>
                    <label for=""><b>Input No. SPK</b> </label>
                    <input type="text" class="form-control my-2" placeholder="No. SPK" name="no-spk"
                        @if ($type != null) value="{{ $order->spk_order }}"
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
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="No. DO/Memo DO" name="no-do-memo"
                            value="{{ $order->do_order }}" readonly>
                    </div>
                </div>
                <label for=""><b>Input No. SPK</b> </label>
                <input type="text" class="form-control my-2" placeholder="No. SPK" name="no-spk"
                    value="{{ $order->spk_order }}" readonly>
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
                                console.log('tes');
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
