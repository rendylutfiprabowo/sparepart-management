@extends('template.laboil')
@section('content')

<p style="font-size: 23px; color: black;">Form Sample DGA FURAN OA</p>
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
            <div class="card-body shadow">
                <h6 class="text-start font-weight-bold " style="color: black;">Form dibawah ini untuk menginput hasil pengetesan dari DGA FURAN OA! </h6>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card p-4 rounded-4" style="border: 2px solid red;">
            <!--Button download -->
            <div class="d-flex justify-content-end">
                <a href="\Asset\TRANSFORMERS.pdf" class="btn btn-md shadow-bottom font-weight-bold rounded-pill text-putih align-items-center" style="background-image: url('/Asset/Card BG.png'); background-size: cover; background-repeat: no-repeat;">
                    Download <i class="fa-solid fa-download"></i>
                </a>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Hidrogen </strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Hidrogen">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Etana (C2H6)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Etana">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Etilena (C2H4)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Etilena">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Asetilena (C2H2)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Asetilena">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Karbon Dioksida (CO2)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Karbon Dioksida">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Metana (CH4)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Metana">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Karbon Monoksida (CH4)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Karbon Monoksida">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>CO2/CO Ratio</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Ratio">
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"> <strong>Key Gas </strong></label>
                        <!-- Area Chart -->
                        <div class="card shadow mb-4 mt-1">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-muted">Relative Proportion</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                                <hr>
                                Styling for the area chart can be found in the
                                <code>/js/demo/chart-area-demo.js</code> file.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"> <strong>Duval Pentagon </strong></label>
                        <!-- Area Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the donut chart can be found in the
                                    <code>/js/demo/chart-pie-demo.js</code> file.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>5MHF</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result 5MHF">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>2FOL</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result 2FOL">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>2FAL</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result 2FAL">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>2ACF<strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result 2ACF">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>5MEF</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result 5MEF">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Total 2FAL</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Total 2FAL">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Total Furan</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Total Furan">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Estimate DP</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Estimate DP">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Color / Appereance</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Color / Appereance">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Breakdown Voltage (Dielectric Strength)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Breakdown Voltage">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Interfacial Tension</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Interfacial Tension">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Total Acid Number (TAN)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Total Acid Number">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Water Content</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Water Content">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Oil Quality Index (OQIN)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Oil Quality Index (OQIN)">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Sediment & Sludge</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Sediment & Sludge">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Density</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Density">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Corrosive Sulfur</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Corrosive Sulfur">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Flash Point</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Flash Point">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Conclusion</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Conclusion">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Recommendation</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Recommendation">
            </div>

            <!-- button back -->
            <div class="row mb-5">
                <div class="d-flex col justify-content-start">
                    <a href="/orderlist" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <div style="height: 150px;"></div>
    </div>

</div>
@endsection