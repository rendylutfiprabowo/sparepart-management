@extends('template.salesOil')
@section('content')
<div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Notification</h1>
    </div>

    <!-- Notification -->
    <div>
        <button type="button" class="btn putih btn-sm shadow font-weight-bold position-relative">
            Report
            <span class="position-absolute top-0 start-100 text-putih translate-middle badge rounded-pill bg-danger">
                99+
        </button>
        <button type="button" class="btn mx-4 putih btn-sm shadow font-weight-bold position-relative">
            Sample
            <span class="position-absolute top-0 start-100 text-putih translate-middle badge rounded-pill bg-danger">
                34+
        </button>
    </div>

    <!-- Judul dan card -->
    <div class="d-sm-flex align-items-center justify-content-between mt-4">
        <h1 class="h3 mb-0 text-gray-800">Performance Overview</h1>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body shadow">
                    <h1 class="text-center font-weight-bold ">35</h1>
                    <p class="text-center text-muted font-weight-bold">TEST IN PROGRESS</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <p class="text-right text-muted font-weight-bold text-truncate ">DGA : 12</p>
                        </div>
                        <div class="col">
                            <p class="text-right text-muted font-weight-bold text-truncate">Furan : 10</p>
                        </div>
                        <div class="col">
                            <p class="text-right text-muted font-weight-bold text-truncate">OA : 30</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body shadow">
                    <h1 class="text-center font-weight-bold ">190</h1>
                    <p class="text-center text-muted font-weight-bold">TEST COMPLETED</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <p class="text-right text-muted font-weight-bold text-center">Last Month : 212</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body merah shadow">
                    <h1 class="text-center text-putih font-weight-bold ">35</h1>
                    <p class="text-center text-putih font-weight-bold">CUSTOMER</p>
                    <hr style="background-color: #FFFFFF;">
                    <div class="row">
                        <div class="col">
                            <p class="text-right text-putih font-weight-bold text-center">Last Month : 20</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body merah shadow">
                    <h1 class="text-center text-putih font-weight-bold ">30</h1>
                    <p class="text-center text-putih font-weight-bold">PROJECT</p>
                    <hr style="background-color: #FFFFFF;">
                    <div class="row">
                        <div class="col">
                            <p class="text-right text-putih font-weight-bold text-center">Last Month : 30</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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