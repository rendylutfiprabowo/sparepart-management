@extends('template.salesCrm')
@section('content')
    <div class="card mb-3">
        <div class="card-header merah text-light mb-3 pt-3">
            <h6>Add Order</h6>
        </div>
        @if (session('error'))
            <div class="mx-3">
                <x-error_message text="{{ session('error') }}" />
            </div>
        @endif
        <form method="post" action="/sales/sparepart/order/add">
            @csrf
            <div class="container-fluid">
                <h3 class="my-3">Data Pelanggan</h3>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Delivery Type</label>
                    <select class="form-control" name="jenis_layanan">
                        <option value="1">Delivered by Technician</option>
                        <option value="2">Delievered by Other Party</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Customer Name</label>
                    <select class="form-control select-search" id="select-customer" name="id_customer"
                        onchange="updateForm(this)">
                        <option value="" selected disabled>-- Pilih Customer --</option>
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
                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Sales Name</label>
                    <input type="text" class="form-control" name="sales_name" readonly value="Ahmad Sumbul">
                    <input type="hidden" value="1" name="id_sales">
                </div>
                <div class="mb-3">
                    <label for="dateInput">Order Date</label>
                    <input class="form-control" type="date" id="dateInput" name="date"
                        value="{{ $now->toDateString() }}">
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
                                <select class="form-control col-7 category-select" placeholder="Enter Customer Name" name="category"
                                    id="category">
                                    <option value="" selected disabled>-- Pilih Sparepart --</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id_category }}">{{ $category->nama_category }}</option>
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
                            <select name="stocks[]" id="stock" class="form-control specification-select" onchange="updateItem(this)">

                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center my-3 mb-3">
                    <div onclick="addNewItem()" class="btn btn-secondary">Add Item

                    </div>
                </div>


                <button type="submit"
                    class="btn merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mb-0 mb-2 mt-5">
                    Submit
                </button>
        </form>
        {{-- <script>
            function addNewItem() {
                const formContainer = document.querySelector(".items");
                const originalDiv = formContainer.querySelector(".item");
                const newDiv = originalDiv.cloneNode(true);
                formContainer.appendChild(newDiv);
            }

            function deleteItem(element) {
                element.parentElement.parentElement.parentElement.remove();
            }
        </script> --}}
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
                    var storeId = parts[parts.length - 1];

                    // Find the corresponding specification select element
                    const specificationSelect = event.target.parentElement.parentElement.parentElement.querySelector('.specification-select');

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
                if(itemElements.length>1){
                    element.parentElement.parentElement.parentElement.remove();
                };

            }
        </script>

        {{-- <script>
            $(document).ready(function() {
                var url = window.location.href;
                var parts = url.split('/');
                var storeId = parts[parts.length - 1];
                $('#category').on('change', function() {
                    var categoryId = $(this).val();
                    var stockDropdown = $('#stock');

                    // Clear existing options
                    stockDropdown.empty();

                    if (categoryId) {
                        // Fetch stocks based on the selected category and current store using an AJAX request
                        $.ajax({
                            url: '/get/stock/' + categoryId + '/' + storeId,
                            type: 'GET',
                            success: function(data) {
                                // Populate the stock dropdown with the retrieved data
                                $.each(data, function(index, stock) {
                                    stockDropdown.append('<option value="' + stock.id_stock +
                                        '">' + stock.spesifikasi_sparepart + '</option>');
                                });
                            }
                        });
                    }
                });
            });
        </script> --}}


    </div>
    </div>
@endsection
