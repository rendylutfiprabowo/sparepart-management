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
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Hidrogen </strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Hidrogen" name="Hidrogen (H2)">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Etana (C2H6)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Etana" name="Etana (C2H6)">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Etilena (C2H4)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Etilena" name="Etilena (C2H4)">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Asetilena (C2H2)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Asetilena" name="Asetilena (C2H2)">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Karbon Dioksida (CO2)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Karbon Dioksida" name="Karbon Dioksida (CO2)">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Metana (CH4)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Metana" name="Metana (CH4)">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>Karbon Monoksida (CH4)</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Karbon Monoksida" name="Karbon Monoksida (CO)">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> <strong>CO2/CO Ratio</strong></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Result Ratio" name="CO2/CO ratio">
            </div>

            <!-- button back -->
            <div class="row mb-5">
                <div class="d-flex col justify-content-start">
                    <a href="/orderlist" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                        Back
                    </a>
                </div>
                <div class="d-flex col justify-content-end">
                    <a href="/form_dga1_lab" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                        Next
                    </a>
                </div>
            </div>
        </div>
        <div style="height: 150px;"></div>
    </div>

</div>
@endsection