@extends('template.new_layout')

@section('title', 'Select Store')

@section('contents')

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 mt-4 text-center">
                <div class="d-inline-flex align-items-center gap-4">
                    <h1 class="">Silahkan Pilih Store <span class="">
                            <i class="bi bi-shop"></i>
                        </span></h1>
                </div>
                <select class="form-select mt-2" aria-label="Default select example" name="" id=""
                    onchange="updateForm(this)">
                    @foreach ($stores as $store)
                        <option value="{{ $store->id_store }}">{{ $store->nama_store }}</option>
                    @endforeach
                </select>
                <div class="d-grid">
                    <a class="btn btn-danger px-5 mb-5 mt-4"
                        href="/sales/sparepart/order/add/{{ $stores->first()->id_store }}" id="order-next">
                        Next <span class="ms-1"><i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
            </div>

        </div>
    </div>
    {{-- <div class="jumbotron bg-white rounded shadow-sm">
        <h1 class="display-5 text-gray-800">Silahkan Pilih Store</h1>
        <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id autem labore modi numquam suscipit
            voluptas ratione ea eos doloribus nobis, ipsam sunt corrupti harum rerum quam fugit voluptatum delectus omnis.
        </p>
        <div class="input-group">
            <select name="" id="" onchange="updateForm(this)" class="custom-select" id="inputGroupSelect04"
                aria-label="Example select with button addon">
                @foreach ($stores as $store)
                    <option value="{{ $store->id_store }}">{{ $store->nama_store }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <a href="/sales/sparepart/order/add/{{ $stores->first()->id_store }}" id="order-next"
                class="btn text-gray-100 merah btn-user btn-block font-weight-bold">Next</a>
        </div>
    </div> --}}

    <script>
        function updateForm(select) {
            var selectedValue = select.value;
            var orderNextButton = document.getElementById("order-next");
            var newHref = "/sales/sparepart/order/add/" + selectedValue;
            orderNextButton.href = newHref;
        }
    </script>
@endsection
