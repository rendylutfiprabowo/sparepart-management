@extends('template.salesCrm')

@section('title', 'Detail Order Sparepart ')

@section('contents')
    <div class="d-flex align-items-center">
        <div>
            <a href="/sales/sparepart/order" class="btn btn-danger btn-sm"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="ms-3">
            <h3 class="text-muted">Detail Order Customer</h3>
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
                                                <td> : {{ $order->id_store }}</td>
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

    <br>

    {{-- FORM  --}}

    <div class="card rounded-4 mb-3 p-4">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
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
                <h3 class="text-dark my-2 text-start">List SPK</h3>
            </tr>
            <br>
        </thead>
        <table class="table-bordered table">
            <thead class="table-light text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Code Material</th>
                    <th scope="col">Items Name</th>
                    <th scope="col">Specification</th>
                    <th scope="col">Qty</th>
                    @if ($type == null)
                        <th scope="col">Delete</th>
                    @endif
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
                        @if ($type == null)
                            <td class="table-plus"><a href="/sales/sparepart/order/remove-item/{{ $booking->id_booked }}"
                                    id="liveToastBtn"><i class="bi bi-trash text-danger"></i></a></td>
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
                                <select class="form-select category-select" placeholder="Enter Customer Name"
                                    name="category" id="category">
                                    <option value="" selected disabled>-- Pilih Sparepart --</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id_category }}">{{ $category->nama_category }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="col d-flex align-items-center fw-bold mx-3 text-right">qty</div>
                                <input class="form-control mx-3" name="qty" value="0">
                                <input class="form-control mx-3" name="dim" disabled>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Spesifikasi</label>
                            <select name="stock" id="stock" class="form-select specification-select"
                                onchange="updateItem(this)">

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-danger btn-sm" type="submit">Add Item</button>
                        </div>

                    </div>
                </div>
            </form>
        @endif
        <div>
            @if ($type == null || $type == 'MEMO')
                <form action="/sales/sparepart/order/{{ $order->id_order }}/add-do" method="post">
                    @csrf
                    <label for=""><b>Input No. DO/Memo DO</b> </label>
                    <div class="row my-2">
                        <div class="col-3">
                            <select name="do-memo" id="" class="form-select">
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


                    <div class="modal-footer gap-2 pt-4">
                        <a href="/sales/sparepart/order" class="btn btn-secondary"> Back</a>
                        @if ($type != 'DO')
                            <button type="submit" class="btn btn-success"> Submit</button>
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
                    <a href="/sales/sparepart/order" class="btn btn-danger btn-sm mt-2"> Back</a>
                </div>
            @endif
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


    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
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
