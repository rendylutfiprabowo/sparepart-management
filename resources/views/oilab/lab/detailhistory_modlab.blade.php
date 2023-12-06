@extends('template.modoillab')
@section('content')
    <p style="font-size: 23px; color: black;">REPORT TEST HISTORY</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Customer Name</strong></div>
                            <div class="text-black"><strong>{{ $trafo->customer->nama_customer }}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Serial Number</strong></div>
                            <div class="text-black"><strong>{{ $trafo->serial_number }}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Merk</strong></div>
                            <div class="text-black"><strong>{{ strtoupper($trafo->merk) }}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Pabrikan/Year</strong></div>
                            <div class="text-black"><strong>{{ $trafo->pabrikan . '/' . $trafo->year }}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Voltage</strong></div>
                            <div class="text-black"><strong>{{ $trafo->voltage }}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Vector Group</strong></div>
                            <div class="text-black"><strong>{{ $trafo->vg }}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Temperatur/Volume/Warna Oil</strong></div>
                            <div class="text-black">
                                <strong>{{ $trafo->temperatur_oil . '/' . $trafo->volume_oil . '/' . $trafo->warna_oil }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="accordion" id="accordionExample">
        @foreach ($trafo->histories as $key => $history)
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-dark" type="button" data-toggle="collapse"
                            data-target="#collapseOne{{ $key }}" aria-expanded="true"
                            aria-controls="collapseOne{{ $key }}">
                            {{ $history->finish }} - {{ $history->project->solab->no_so_solab }} -
                            {{ $history->project->solab->no_spk_solab }}
                        </button>
                    </h2>
                </div>

                <div id="collapseOne{{ $key }}" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        @foreach ($history->samples as $sample)
                            <div class="btn merah text-putih">{{ $sample->scope->nama_scope }}</div>
                        @endforeach
                    </div>
                </div>
        @endforeach
    </div>
    </div>
@endsection
