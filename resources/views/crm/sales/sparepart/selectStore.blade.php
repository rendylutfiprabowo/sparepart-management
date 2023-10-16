@extends('template.salesCrm')
@section('content')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <div class="card-header">PILIH STORE</div>
            <div class="card-body">
                <select name="" id="" onchange="updateForm(this)">
                    @foreach ($stores as $store)
                        <option value="{{ $store->id_store }}">{{ $store->nama_store }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-footer"><a class="btn btn-success" id="order-next"
                    href="/sales/sparepart/order/add/{{ $stores->first()->id_store }}">Next</a></div>
        </div>
    </div>
    </div>
    <script>
        function updateForm(select) {
            var selectedValue = select.value;
            var orderNextButton = document.getElementById("order-next");
            var newHref = "/sales/sparepart/order/add/" + selectedValue;
            orderNextButton.href = newHref;
        }
    </script>
@endsection
