@extends('template.sales')
@section('content')

<!-- lOGO TRAFOINDO -->
<div class="container d-flex justify-content-center align-items-center">
    <img src="/Asset/LogoTrafoindo.png" alt="Centered Image" style="width: 235px;">
</div>

<!-- form salesorder -->
<div>
    <div class="container-fluid">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">No SO</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter No SO">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">No SPK</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter No SPK">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Customer Name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Project</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Project">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Sales Name</label>
            <input class="form-control" type="text" placeholder="Bela" aria-label="Disabled input example" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Year Trafo</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Year Trafo">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Addres</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <!-- form input scope -->
        <div>
            <label for="exampleFormControlTextarea1" class="form-label">Input Scope</label>
        </div>
        <div class="row mb-3 border p-3"  style="background-color: white;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <div>
                            <h6 class="mt-2"><strong>Scope Name</strong></h6>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <h6 class="mt-2" style="margin-left: 35px;"><strong>Sample Quantity</strong></h6>
                        </div>
                    </div>
                </div>
                <!-- DGA -->
                <div class="row">
                    <div class="col">
                        <div class="form-check mt-3 ml-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <strong>DGA</strong>
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <div class="container mt-2">
                                <div class="input-group" style="width: 150px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary merah text-putih" type="button" id="minusButton1" style="padding: 0.25rem 0.5rem;">-</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="0" id="quantityInput1" style="height: calc(1.5em + 0.75rem + 2px);">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary merah text-putih" type="button" id="plusButton1" style="padding: 0.25rem 0.5rem;">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Furan -->
                <div class="row">
                    <div class="col">
                        <div class="form-check mt-3 ml-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <strong>Furan</strong>
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <div class="container mt-2">
                                <div class="input-group" style="width: 150px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary merah text-putih" type="button" id="minusButton2" style="padding: 0.25rem 0.5rem;">-</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="0" id="quantityInput2" style="height: calc(1.5em + 0.75rem + 2px);">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary merah text-putih" type="button" id="plusButton2" style="padding: 0.25rem 0.5rem;">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- OA -->
                <div class="row">
                    <div class="col">
                        <div class="dropright mb-3 mt-2">
                            <a class="btn btn-white dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                                <strong>Oil Analisis</strong>
                            </a>
                            <div class="dropdown-menu">
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>BDV</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>IFT</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Water Content</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>TAN</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Sludge & Sediment</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Corrosif Sulfur</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Flash Point</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>PCB</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Color</strong>
                                    </label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Density</strong>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <div class="container mt-2">
                                <div class="input-group" style="width: 150px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary merah text-putih" type="button" id="minusButton3" style="padding: 0.25rem 0.5rem;">-</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="0" id="quantityInput3" style="height: calc(1.5em + 0.75rem + 2px);">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary merah text-putih" type="button" id="plusButton3" style="padding: 0.25rem 0.5rem;">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 150px;"></div>
    <!-- button back -->
    <div class="row  mb-5">
        <div class="d-flex col justify-content-start">
            <a href="/salesorder" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                Back
            </a>
        </div>
        <div class="d-flex col justify-content-end">
            <a href="" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                Submit
            </a>
        </div>
    </div>
</div>


<script>
    // Ambil elemen-elemen yang diperlukan
    var quantityInput1 = document.getElementById("quantityInput1");
    var minusButton1 = document.getElementById("minusButton1");
    var plusButton1 = document.getElementById("plusButton1");

    var quantityInput2 = document.getElementById("quantityInput2");
    var minusButton2 = document.getElementById("minusButton2");
    var plusButton2 = document.getElementById("plusButton2");

    var quantityInput3 = document.getElementById("quantityInput3");
    var minusButton3 = document.getElementById("minusButton3");
    var plusButton3 = document.getElementById("plusButton3");

    // Tambahkan event listener untuk tombol minus pada Baris Pertama
    minusButton1.addEventListener("click", function() {
        var currentValue = parseInt(quantityInput1.value);
        if (currentValue > 0) {
            quantityInput1.value = (currentValue - 1).toString();
        }
    });

    // Tambahkan event listener untuk tombol plus pada Baris Pertama
    plusButton1.addEventListener("click", function() {
        var currentValue = parseInt(quantityInput1.value);
        quantityInput1.value = (currentValue + 1).toString();
    });

    // Tambahkan event listener untuk tombol minus pada Baris Kedua
    minusButton2.addEventListener("click", function() {
        var currentValue = parseInt(quantityInput2.value);
        if (currentValue > 0) {
            quantityInput2.value = (currentValue - 1).toString();
        }
    });

    // Tambahkan event listener untuk tombol plus pada Baris Kedua
    plusButton2.addEventListener("click", function() {
        var currentValue = parseInt(quantityInput2.value);
        quantityInput2.value = (currentValue + 1).toString();
    });

    // Tambahkan event listener untuk tombol minus pada Baris Ketiga
    minusButton3.addEventListener("click", function() {
        var currentValue = parseInt(quantityInput3.value);
        if (currentValue > 0) {
            quantityInput3.value = (currentValue - 1).toString();
        }
    });

    // Tambahkan event listener untuk tombol plus pada Baris Ketiga
    plusButton3.addEventListener("click", function() {
        var currentValue = parseInt(quantityInput3.value);
        quantityInput3.value = (currentValue + 1).toString();
    });
</script>
@endsection