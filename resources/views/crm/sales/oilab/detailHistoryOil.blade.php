@extends('template.salesCrm')

@section('title', 'Oil Detailed History')

@section('contents')
    <h3 class="text-center">Oil Detailed</h3>
    <br>
    <div class="container">
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                    type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Trafos</button>
                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                    type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Detail</button>
            </div>
            <div class="tab-content bg-white rounded shadow-sm" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
                    tabindex="0">
                    <main class="p-4">
                        <div class="row g-5">
                            <div class="col-md-12">
                                <form class="needs-validation" novalidate>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="CustomerName" class="form-label  text-secondary">Customer
                                                Name</label>
                                            <input type="text" class="form-control" id="CustomerName"
                                                value="{{ $trafo->customer->nama_customer }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="serialNumber" class="form-label  text-secondary">Serial
                                                Number</label>
                                            <input type="text" class="form-control" id="serialNumber"
                                                value="{{ $trafo->serial_number }}" disabled>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="Merk" class="form-label  text-secondary">Merk</label>
                                            <input type="text" class="form-control" id="Merk"
                                                value="{{ strtoupper($trafo->merk) }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="year" class="form-label  text-secondary">Year</label>
                                            <input type="text" class="form-control" id="year"
                                                value="{{ $trafo->year }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="voltage" class="form-label  text-secondary">Voltage</label>
                                            <input type="text" class="form-control" id="voltage"
                                                value="{{ $trafo->voltage }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="vg" class="form-label  text-secondary">VG</label>
                                            <input type="text" class="form-control" id="vg"
                                                value="{{ $trafo->vg }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tagnumber" class="form-label  text-secondary">Tag
                                                Number</label>
                                            <input type="text" class="form-control" id="tagnumber"
                                                value="{{ $trafo->tag_number }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="volume_oil" class="form-label  text-secondary">Oil
                                                Volume</label>
                                            <input type="text" class="form-control" id="volume_oil"
                                                value="{{ $trafo->volume_oil }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="oilcolors" class="form-label  text-secondary">Warna
                                                Oil</label>
                                            <input type="text" class="form-control" id="oilcolors"
                                                value="{{ $trafo->warna_oil }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="temperatur_oil"
                                                class="form-label  text-secondary">Temperatur</label>
                                            <input type="text" class="form-control" id="temperatur_oil"
                                                value="{{ $trafo->temperatur_oil }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="kva" class="form-label  text-secondary">Kva</label>
                                            <input type="text" class="form-control" id="kva"
                                                value="{{ $trafo->kva }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="area" class="form-label  text-secondary">Area</label>
                                            <input type="text" class="form-control" id="area"
                                                value="{{ $trafo->area }}" disabled>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="Catatan" class="form-label  text-secondary">Catatan</label>
                                            <input type="text" class="form-control" id="Catatan"
                                                value="{{ $trafo->catatan }}" disabled>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </main>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                    tabindex="0">Other</div>
            </div>
        </div>
    </div>
    <br>

    <div>
        <div class="accordion shadow accordion-flush" id="accordionExample">
            @foreach ($trafo->histories as $key => $history)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $key }}" aria-expanded="true"
                            aria-controls="collapse{{ $key }}">
                            {{ $history->finish }} - {{ $history->project->solab->no_so_solab }} - {{$history->project->solab->no_spk_solab}}
                        </button>
                    </h2>
                    <div id="collapse{{ $key }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach ($history->samples as $sample)
                                <div class="btn btn-danger">{{ $sample->scope->nama_scope }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
