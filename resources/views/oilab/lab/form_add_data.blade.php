@extends('template.laboil')
@section('content')

<div>
    <!-- lOGO TRAFOINDO -->
    <div class="container d-flex justify-content-center align-items-center">
        <img src="/Asset/LogoTrafoindo.png" alt="Centered Image" style="width: 235px;">
    </div>

    <!-- form salesorder -->
    <div>
        <div>
            <form method="post" action="/form_add_data/add">
                @csrf
                <div class="container-fluid">
                    <div class="mb-3">
                        <label for="serial_number" class="form-label">Serial Number</label>
                        <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="Enter No Serial Number">
                    </div>
                    <div class="mb-3">
                        <label for="kva" class="form-label">KVA</label>
                        <input type="text" class="form-control" id="kva" name="kva" placeholder="Enter No KVA">
                    </div>
                    <div class="mb-3">
                        <label for="merk" class="form-label">Merk</label>
                        <input class="form-control" list="datalistOptions" id="merk" name="merk" placeholder="Enter Merk">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Trafo Year</label>
                        <input type="text" class="form-control" id="year" name="year" placeholder="Enter Trafo Year">
                    </div>
                    <div class="mb-3">
                        <label for="voltage" class="form-label">Voltage</label>
                        <input type="text" class="form-control" id="voltage" name="voltage" placeholder="Enter Voltage">
                    </div>
                    <div class="mb-3">
                        <label for="vg" class="form-label">VG</label>
                        <input type="text" class="form-control" id="vg" name="vg" placeholder="Enter VG">
                    </div>
                    <div class="mb-3">
                        <label for="tag_number" class="form-label">Tag Number</label>
                        <input class="form-control" list="datatagnumber" id="tag_number" name="tag_number" placeholder="Enter Tag Number">
                    </div>
                    <div class="mb-3">
                        <label for="temp_oil" class="form-label">Temp. Oil (°C)</label>
                        <input type="text" class="form-control" id="temp_oil" name="temp_oil" placeholder="Enter Temp Oil">
                    </div>
                    <div class="mb-3">
                        <label for="volume_oil" class="form-label">Volume Oil (Liter)</label>
                        <input type="text" class="form-control" id="volume_oil" name="volume_oil" placeholder="Enter Volume Oil">
                    </div>
                    <div>
                        <form>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Sampling</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_sampling">
                            </div>
                        </form>
                    </div>
                    <div>
                        <form>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Kedatangan</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_kedatangan">
                            </div>
                        </form>
                    </div>
                    <div>
                        <form>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Pengujian</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_pengujian">
                            </div>
                        </form>
                    </div>
                    <div>
                        <form>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Pembuatan Laporan</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_pembuatan">
                            </div>
                        </form>
                    </div>
                    <div>
                        <form>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Pengiriman Laporan</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_pengiriman">
                            </div>
                        </form>
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
                                <input class="form-check-input" type="checkbox" name="dga_check" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <strong>DGA</strong>
                                </label>
                            </div>

                            <!-- Furan -->
                            <div class="form-check mt-3 ml-2">
                                <input class="form-check-input" type="checkbox" name="furan_check" id="flexCheckDefault">
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
                                    <input class="form-check-input" type="checkbox" name="oa_check[bdv_check]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>BDV</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="oa_check[bdv_check]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>IFT</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="oa_check[bdv_check]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Water Content</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="oa_check[bdv_check]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>TAN</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="oa_check[bdv_check]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Sludge & Sediment</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="oa_check[bdv_check]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Corrosif Sulfur</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="oa_check[bdv_check]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Flash Point</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="oa_check[bdv_check]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>PCB</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="oa_check[bdv_check]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Color</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" name="oa_check[bdv_check]" id="flexCheckDefault">
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