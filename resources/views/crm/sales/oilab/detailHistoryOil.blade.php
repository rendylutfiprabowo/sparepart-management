@extends('template.salesCrm')
@section('title', 'Oil Detailed History')
@section('contents')
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Customer Name</strong></div>
                            <div class="text-black"><strong>{{$trafo->customer->nama_customer}}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Serial Number</strong></div>
                            <div class="text-black"><strong>{{$trafo->serial_number}}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Merk</strong></div>
                            <div class="text-black"><strong>{{strtoupper($trafo->merk)}}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Year</strong></div>
                            <div class="text-black"><strong>{{$trafo->year}}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Voltage</strong></div>
                            <div class="text-black"><strong>{{$trafo->voltage}}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Vector Group</strong></div>
                            <div class="text-black"><strong>{{$trafo->vg}}</strong></div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="text-merah"><strong>Temperatur/Volume/Warna Oil</strong></div>
                            <div class="text-black"><strong>{{$trafo->temperatur_oil.'/'.$trafo->volume_oil.'/'.$trafo->warna_oil}}</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="accordion shadow accordion-flush" id="accordionExample">
            @foreach ($trafo->histories as $key => $history)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}"
                        aria-expanded="true" aria-controls="collapse{{$key}}">
                        {{$history->finish}} - {{$history->project->solab->no_so_solab}}
                    </button>
                </h2>
                <div id="collapse{{$key}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach ($history->samples as $sample)
                           <div class="btn btn-danger">{{$sample->scope->nama_scope}}</div> 
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
