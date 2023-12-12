@extends('template.salesCrm')

@section('title', 'Oil Detailed History')

@section('contents')
    <br>
    <div>
        <ul class="nav nav-underline" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link link-danger active" id="home-tab" data-bs-toggle="tab" data-bs-target="#trafo-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Trafo</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link link-danger" id="profile-tab" data-bs-toggle="tab"
                    data-bs-target="#testingoil-tab-pane" type="button" role="tab" aria-controls="testingoil-tab-pane"
                    aria-selected="false">Testing Detail</button>
            </li>
        </ul>
    </div>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="trafo-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">
            <div class="row g-5 p-4 ">
                <div class="col-md-12 bg-white p-4 rounded shadow-sm">
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
                                <input type="text" class="form-control" id="year" value="{{ $trafo->year }}"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="voltage" class="form-label  text-secondary">Voltage</label>
                                <input type="text" class="form-control" id="voltage" value="{{ $trafo->voltage }}"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="vg" class="form-label  text-secondary">VG</label>
                                <input type="text" class="form-control" id="vg" value="{{ $trafo->vg }}"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="tagnumber" class="form-label  text-secondary">Tag
                                    Number</label>
                                <input type="text" class="form-control" id="tagnumber" value="{{ $trafo->tag_number }}"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="volume_oil" class="form-label  text-secondary">Oil
                                    Volume</label>
                                <input type="text" class="form-control" id="volume_oil" value="{{ $trafo->volume_oil }}"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="oilcolors" class="form-label  text-secondary">Warna
                                    Oil</label>
                                <input type="text" class="form-control" id="oilcolors" value="{{ $trafo->warna_oil }}"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="temperatur_oil" class="form-label  text-secondary">Temperatur</label>
                                <input type="text" class="form-control" id="temperatur_oil"
                                    value="{{ $trafo->temperatur_oil }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="kva" class="form-label  text-secondary">Kva</label>
                                <input type="text" class="form-control" id="kva" value="{{ $trafo->kva }}"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="area" class="form-label  text-secondary">Area</label>
                                <input type="text" class="form-control" id="area" value="{{ $trafo->area }}"
                                    disabled>
                            </div>
                            <div class="col-md-12">
                                <label for="Catatan" class="form-label  text-secondary">Catatan</label>
                                <input type="text" class="form-control" id="Catatan" value="{{ $trafo->catatan }}"
                                    disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="tab-pane fade" id="testingoil-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
            tabindex="0">
            <div class="accordion shadow-sm rounded-4" id="accordionExample">
                @foreach ($trafo->histories as $key => $history)
                    <div class="accordion-item">
                        <h6 class="accordion-header">
                            <button class="accordion-button text-bg-light" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $key }}" aria-expanded="true"
                                aria-controls="collapse{{ $key }}"> <span class="badge text-bg-danger"> So :
                                    {{ $history->project->solab->no_so_solab }}</span>
                                {{ $history->finish }} <span class="badge text-bg-danger ms-2"> Spk :
                                    {{ $history->project->solab->no_spk_solab }}</span>
                            </button>
                        </h6>
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
    </div>
@endsection
