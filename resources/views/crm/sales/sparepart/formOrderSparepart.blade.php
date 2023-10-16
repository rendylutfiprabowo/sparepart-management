@extends('template.salesCrm')
@section('content')
    <div class="card mb-3">
        <div class="card-header mb-3 pt-3 merah text-light">
            <h6>Add Order</h6>
        </div>
        <form method="post" action="/sales/sparepart/order/add">
            @csrf
            <div class="container-fluid">
                <h3 class="my-3">Data Pelanggan</h3>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jenis Layanan</label>
                    <select class="form-control" name="jenis_layanan">
                        <option value="1">Jasa</option>
                        <option value="2">Material</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label ">Customer Name</label>
                    <select class="form-control select-search" id="select-customer" name="id_customer"
                        onchange="updateForm(this)">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id_customer }}" data-phone="{{ $customer->phone_customer }}"
                                data-address="{{ $customer->jenisusaha_customer }}">
                                {{ $customer->nama_customer }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Sales Name</label>
                    <input type="text" class="form-control" name="sales_name" readonly value="Ahmad Sumbul">
                    <input type="hidden" value="1" name="id_sales">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" readonly>
                </div>
                <div class="mb-3">
                    <label for="dateInput">Order Date</label>
                    <input class="form-control" type="date" id="dateInput" name="date" value="2001-12-24">
                </div>
                <div class="mb-3">
                    <label for="dateInput">Store</label>
                    <input class="form-control" type="text" id="dateInput" name="nama_store"
                        value="{{ $store->nama_store }}" readonly>
                    <input type="hidden" name="id_store" value="{{ $store->id_store }}">
                </div>
                <div class="items mt-5">
                    <h3 class="my-3">Spareparts</h3>
                    <div class="item mb-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                            <div class="d-flex">
                                <select class="form-control col-7" placeholder="Enter Customer Name" name="stocks[]"
                                    onchange="updateItem(this)">
                                    @foreach ($stocks as $stock)
                                        <option value="{{ $stock->id_stock }}"
                                            data-spec="{{ $stock->sparepart->spesifikasi_sparepart }}"
                                            data-dim="{{ $stock->sparepart->satuan }}">
                                            {{ $stock->sparepart->nama_sparepart }}</option>
                                    @endforeach
                                </select>
                                <div class="col mx-3 d-flex align-items-center text-right">qty</div>
                                <input class="col mx-3 form-control" name="qty[]" value="0">
                                <input class="col mx-3 form-control" name="dim"
                                    value="{{ $stocks->first()->sparepart->satuan }}" readonly>
                                <div class="col ml-3 btn btn-danger form-control" onclick="deleteItem(this)">hapus</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Spesifikasi</label>
                            <input type="text" class="form-control"
                                value="{{ $stocks->first()->sparepart->spesifikasi_sparepart }}" name="spesifikasi"
                                readonly>
                        </div>
                    </div>
                </div>

                <div class="mb-3 d-flex justify-content-center my-3">
                    <div onclick="addNewItem()" class="btn btn-secondary">Add Item

                    </div>
                </div>

                
                <button type="submit" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                    Submit
                </button>
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
@endsection
