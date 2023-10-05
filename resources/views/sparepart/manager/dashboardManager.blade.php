@extends('template.managerSparepart')
@section('content')
    <p style="font-size: 23px; color: black;">REPORT TEST HISTORY</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-3">
                            <div class="text-merah"><strong>Customer Name</strong></div>
                            <div class="text-merah"><strong>Status Customer</strong></div>
                            <div class="text-merah"><strong>Negara Asal</strong></div>
                        </div>
                        <div class="col-3">
                            <div class="text-black">PLN</div>
                            <div class="text-black">Aktif</div>
                            <div class="text-black">Indonesia</div>
                        </div>
                        <div class="col-3">
                            <div class="text-merah"><strong>Tahun</strong></div>
                            <div class="text-merah"><strong>No Tag</strong></div>
                            <div class="text-merah"><strong>Merk</strong></div>
                        </div>
                        <div class="col-3">
                            <div class="text-black">2015</div>
                            <div class="text-black">ASJB15</div>
                            <div class="text-black">Desalter FOC 1</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
