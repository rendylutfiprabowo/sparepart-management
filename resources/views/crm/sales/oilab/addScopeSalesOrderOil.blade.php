@extends('template.salesCrm')
@section('contents')

<div>
    <!-- lOGO TRAFOINDO -->
    <div class="container d-flex justify-content-center align-items-center">
        <img src="/Asset/LogoTrafoindo.png" alt="Centered Image" style="width: 235px;">
    </div>

    <!-- form salesorder -->
    <div>
        <div>
            <form method="post" action="/sales/oil/salesorder/{{$project->id_project}}/{{$history->id}}">
                @csrf
                <div class="container-fluid">
                    <div class="mb-3">
                        <label for="serial_number" class="form-label">Project</label>
                        <input type="text" class="form-control" id="serial_number" name="nama_project" placeholder="Enter No Serial Number" readonly value="{{$project->nama_project}}">
                        <input type="hidden" class="form-control" id="serial_number" name="id_project" placeholder="Enter No Serial Number" readonly value="{{$project->id_project}}">
                    </div>
                    <div>
                        <label for="exampleFormControlTextarea1" class="form-label">Input Scope</label>
                    </div>
                    <div class="row mb-3 border p-3" style="background-color: white;">
                        <div class="col-md-12">
                            <div>
                                <h6 class="mt-2"><strong>Scope Name</strong></h6>
                            </div>

                            <!-- DGA -->
                            <div class="form-check mt-3 ml-2">
                                <input class="form-check-input" type="checkbox" name="check[dga]" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <strong>DGA</strong>
                                </label>
                            </div>

                            <!-- Furan -->
                            <div class="form-check mt-3 ml-2">
                                <input class="form-check-input" type="checkbox" name="check[furan]" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <strong>Furan</strong>
                                </label>
                            </div>

                            <!-- COLLAPSE OA -->
                            <div>
                                <button class="btn btn-white dropdown-toggle mt-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    <strong>Oil Analysis</strong>
                                </button>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="form-check ml-2 mt-1">
                                    <input class="form-check-input" type="checkbox" name="check[oa][bdv]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>BDV</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="check[oa][ift]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>IFT</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="check[oa][water_content]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Water Content</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="check[oa][tan]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>TAN</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="check[oa][sludge_and_sendiment]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Sludge & Sediment</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="check[oa][corrosif_sulfur]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Corrosif Sulfur</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="check[oa][flash_point]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Flash Point</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="check[oa][pcb]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>PCB</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="check[oa][color]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Color</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="check[oa][density]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Density</strong>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- button back -->
                    <div class="row mb-5">
                        <div class="d-flex col justify-content-start">
                            <a href="/orderlist" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                                Back
                            </a>
                        </div>
                        <div class="d-flex col justify-content-end">
                            <button type="submit" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                                Submit
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>
</div>
@endsection