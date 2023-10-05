@extends('template.laboil')
@section('content')

<p style="font-size: 23px; color: black;">Form DGA</p>
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
            <div class="card-body shadow">
                <h6 class="text-start font-weight-bold " style="color: black;">Form dibawah ini untuk menginput hasil pengetesan dari DGA! </h6>
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
                <label for="exampleFormControlInput1" class="form-label"> <strong>Conclusion</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Metana">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Recommendation</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Metana">
            </div>


            <!-- button back -->
            <div class="row mb-5">
                <div class="d-flex col justify-content-start">
                    <a href="/form_dga_lab" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                        Back
                    </a>
                </div>
                <div class="d-flex col justify-content-end">
                    <a href="/order_list" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                        Submit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection