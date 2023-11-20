@extends('template.teknisiSparepart')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 mb-4 p-4">
            <div class="card-header merah text-light mb-3 pt-3">
                <h6>Request Tools</h6>
            </div>
            @if (session('error'))
                <div class="mx-3">
                    <x-error_message text="{{ session('error') }}" />
                </div>
            @endif
            <form method="post" action="/technician/tools/request/add2">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Technician Name</label>
                    <input type="text" class="form-control" name="technician_name" disabled
                        value="{{ $user->technician->first()->nama_technician }}">
                    <input type="hidden" value="{{ $user->technician->first()->id_technician }}" name="id_technician">
                </div>
                <div class="mb-3">
                    <label for="dateInput">Request Tools Date</label>
                    <input class="form-control" type="date" id="dateInput" name="date" value="">
                </div>
                <div class="mb-3">
                    <label for="dateInput">Store</label>
                    <input class="form-control" type="text" id="dateInput" name="nama_store"
                        value="{{ $store->nama_store }}" disabled>
                </div>
                <div class="items mt-4">
                    <h3 class="text-muted my-1 text-center">Tools</h3>
                    <div class="item mt-4">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-8">
                                <select class="form-select category-select" placeholder="Enter Customer Name" name="tools[]"
                                    id="category">
                                    <option value="" selected disabled>-- Pilih Tools --</option>
                                    @foreach ($tools as $tool)
                                        <option value="{{ $tool->id_tools }}">{{ $tool->nama_tools }}</option>
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
                                <div class="btn btn-danger form-control" onclick="deleteItem(this)"><i
                                        class="bi bi-trash-fill"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center my-3 mb-3">
                    <div onclick="addNewItem()" class="btn btn-secondary btn-sm">Add Items</div>
                </div>


                <button type="submit" class="btn btn-danger align-items-center mb-0 mb-2 mt-5">
                    Submit
                </button>
            </form>
        </div>
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
            function updateItem(select) {
                var selectedOption = $(select).find(":selected");
                var quantity = $(select).closest(".item").find('input[name="qty[]"]');

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
                    var storeId = parts[parts.length - 1];

                    // Clear existing options
                    specificationSelect.innerHTML = '';
                    const temp = document.createElement('option');
                    temp.value = '';
                    temp.text = '-- Pilih Spesifikasi --';
                    specificationSelect.appendChild(temp);
                }
            });

            function addNewItem() {
                itemCount++;
                const formContainer = document.querySelector(".items");
                const originalDiv = formContainer.querySelector(".item");
                const newDiv = originalDiv.cloneNode(true);

                // Update IDs and names for the new elements
                newDiv.querySelectorAll('.category-select').forEach((select) => {
                    const id = `category${itemCount}`;
                    select.id = id;
                    select.name = `tools[]`;
                });

                newDiv.querySelector('input[name="qty[]"]').value = '0'; // Reset the quantity field
                newDiv.querySelector('.btn-danger').addEventListener('click', function() {
                    deleteItem(this);
                });

                formContainer.appendChild(newDiv);
            }

            function deleteItem(element) {
                const itemElements = document.querySelectorAll('.item');
                if (itemElements.length > 1) {
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
