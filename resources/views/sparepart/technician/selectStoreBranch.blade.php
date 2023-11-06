@extends('template.teknisiSparepart')

@section('content')
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
                    <a class="btn btn-danger mb-5 mt-4 px-5"
                        href="/technician/tools/request/add/{{ $stores->first()->id_store }}" id="order-next">
                        Next <span class="ms-1"><i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script>
        function updateForm(select) {
            var selectedValue = select.value;
            var orderNextButton = document.getElementById("order-next");
            var newHref = "/technician/tools/request/add/" + selectedValue;
            orderNextButton.href = newHref;
        }
    </script>
@endsection
