@extends('template.laboil')
@section('content')

<p style="font-size: 23px; color: black;">Form Furan</p>
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
            <div class="card-body shadow">
                <h6 class="text-start font-weight-bold " style="color: black;">Form dibawah ini untuk menginput hasil pengetesan dari Furan! </h6>
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

            <!-- button back -->
            <div class="row mb-5">
                <div class="d-flex col justify-content-start">
                    <a href="/order_list" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
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


    @endsection