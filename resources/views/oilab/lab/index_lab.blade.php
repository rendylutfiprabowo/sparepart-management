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
                            <h2><b>{{ $totalDGA }}</b></h2>
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
                            <h2><b>{{ $totalFuran }}</b></h2>
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
                            <h2><b>{{ $totalOA }}</b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card merah text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <div>
                                <h4><b>All Samples</b></h4>
                            </div>
                            <div>
                                <h3><i class="fa-solid fa-calculator"></i></h3>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h2><b> {{ $totalAllSamples }}</b></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
