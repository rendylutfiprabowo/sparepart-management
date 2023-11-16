@extends('template.laboil')
@section('content')
    <div>

        <!-- Judul dan card -->
        <div class="d-sm-flex align-items-center justify-content-between mt-4">
            <h1 class="h3 mb-0 text-gray-800 ">Performance Overview</h1>
        </div>
        <div class="row mt-4 d-flex justify-content-between">
            <div class="col-lg-3">
                <div class="card merah text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <div>
                                <h4><b>DGA</b></h4>
                            </div>
                            <div>
                                <h3><i class="fa-solid fa-droplet"></i></h3>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h2><b>4</b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card merah text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <div>
                                <h4><b>Furan</b></h4>
                            </div>
                            <div>
                                <h3><i class="fa-solid fa-flask"></i></h3>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h2><b>1</b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card merah text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <div>
                                <h4><b>OA</b></h4>
                            </div>
                            <div>
                                <h3><i class="fa-solid fa-flask-vial"></i></h3>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h2><b>1</b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card merah text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <div>
                                <h4><b>Customer</b></h4>
                            </div>
                            <div>
                                <h3><i class="fa-solid fa-users"></i>
                                    <h3>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h2><b>1</b></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{-- <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between">
                            <div>PROJECT</div>
                            <div>KANAN</div>
                        </div>
                        <br>
                        <div class="text-center">
                            <h1>4</h1>
                        </div>
                    </div>
                    <div class="card-footer merah">

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between">
                            <div>CUSTOMER</div>
                            <div>KANAN</div>
                        </div>
                        <br>
                        <div class="text-center">
                            <h1>4</h1>
                        </div>
                    </div>
                    <div class="card-footer merah">

                    </div>
                </div>
            </div>
        </div> --}}

        <div class="d-sm-flex align-items-center justify-content-between mt-4">
            <h1 class="h3 mb-0 text-gray-800">Analytics Overview</h1>
        </div>

        <!-- Area Chart -->
        <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-muted">TEST EACH MONTH</h6>
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
@endsection
