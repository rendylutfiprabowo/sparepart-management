@extends('template.salesCrm')
@section('contents')
<!-- lOGO TRAFOINDO -->
<div class="container d-flex justify-content-center align-items-center">
    <img src="/Asset/LogoTrafoindo.png" alt="Centered Image" style="width: 235px;">
</div>

<!-- form salesorder -->
<div>
    <form method="post" action="/sales/oil/salesorder/add">
        @csrf
        <div class="container-fluid">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">No SO</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter No SO" name="no_so_solab">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">No SPK</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter No SPK" name="no_spk_solab">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Customer Name</label>
                <select class="form-control" id="select-customers" placeholder="Enter Customer Name" name="id_customer">
                    @foreach($customers as $key)
                    <option value="{{$key['id_customer']}}">{{$key['nama_customer']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Project</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Project" name="nama_project">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Sales Name</label>
                <input class="form-control" type="text" placeholder="{{ $sales ? $sales->nama_sales : '' }}" aria-label="Disabled input example" value="{{ $sales ? $sales->nama_sales : '' }}" name="nama_sales" disabled>
                <input type="hidden" name="id_sales" value="{{$sales->id_sales}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Addres</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_project"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Transformer Units</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Traformer units" name="qty_trafo">
            </div>
            <!-- form input scope -->
            {{-- <div>
                <label for="exampleFormControlTextarea1" class="form-label">Input Scope</label>
            </div>
            <div class="row mb-3 border p-3" style="background-color: white;">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col">
                            <div>
                                <h6 class="mt-2"><strong>Scope Name</strong></h6>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <h6 class="mt-2" style="margin-left: 22px;"><strong>Sample Quantity</strong></h6>
                            </div>
                        </div>
                    </div>
                    <!-- DGA -->
                    <div class="row">
                        <div class="col">
                            <div class="form-check mt-3 ml-2">
                                <input class="form-check-input" type="checkbox" name="dga_check" id="flexCheckDefaultdga">
                                <label class="form-check-label" for="flexCheckDefaultdga">
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
                                        <input type="text" name="dga_qty" class="form-control text-center" value="0" id="quantityInput1" style="height: calc(1.5em + 0.75rem + 2px);">
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
                                <input class="form-check-input" type="checkbox" name="furan_check" id="flexCheckDefaultfuran">
                                <label class="form-check-label" for="flexCheckDefaultfuran">
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
                                        <input type="text" name="furan_qty" class="form-control text-center" value="0" id="quantityInput2" style="height: calc(1.5em + 0.75rem + 2px);">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary merah text-putih" type="button" id="plusButton2" style="padding: 0.25rem 0.5rem;">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- oil analysis -->
                <div class="row ">
                    <div class="col">
                        <details>
                            <summary>
                                <a class="btn btn-white" role="button">
                                    <strong>Oil Analysis</strong>
                                </a>
                            </summary>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="oa_check[bdv_check]" id="flexCheckDefaultbdv">
                                <label class="form-check-label" for="flexCheckDefaultbdv">
                                    <strong>BDV</strong>
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="oa_check[ift_check]" id="flexCheckDefaultift">
                                <label class="form-check-label" for="flexCheckDefaultift">
                                    <strong>IFT</strong>
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="oa_check[wo_check]" id="flexCheckDefaultwo">
                                <label class="form-check-label" for="flexCheckDefaultwo">
                                    <strong>Water Content</strong>
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="oa_check[tan_check]" id="flexCheckDefaultTAN">
                                <label class="form-check-label" for="flexCheckDefaultTAN">
                                    <strong>TAN</strong>
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="oa_check[sns_check]" id="flexCheckDefaultsns">
                                <label class="form-check-label" for="flexCheckDefaultsns">
                                    <strong>Sludge & Sediment</strong>
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="oa_check[cs_check]" id="flexCheckDefaultoa">
                                <label class="form-check-label" for="flexCheckDefaultoa">
                                    <strong>Corrosif Sulfur</strong>
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="oa_check[fp_check]" id="flexCheckDefaultfp">
                                <label class="form-check-label" for="flexCheckDefaultfp">
                                    <strong>Flash Point</strong>
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="oa_check[pcb_check]" id="flexCheckDefaultPCB">
                                <label class="form-check-label" for="flexCheckDefaultPCB">
                                    <strong>PCB</strong>
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="oa_check[color_check]" id="flexCheckDefaultC">
                                <label class="form-check-label" for="flexCheckDefaultC">
                                    <strong>Color</strong>
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="oa_check[density_check]" id="flexCheckDefaultD">
                                <label class="form-check-label" for="flexCheckDefaultD">
                                    <strong>Density</strong>
                                </label>
                            </div>
                        </details>
                    </div>

                    <div class="col">
                        <div class="container mt-2 ">
                            <div class="input-group" style="width: 150px; margin-left:2.3%">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary merah text-putih" type="button" id="minusButton3" style="padding: 0.25rem 0.5rem;">-</button>
                                </div>
                                <input type="text" name="oa_qty" class="form-control text-center" value="0" id="quantityInput3" style="height: calc(1.5em + 0.75rem + 2px);">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary merah text-putih" type="button" id="plusButton3" style="padding: 0.25rem 0.5rem;">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
    </form>

    <!-- button back -->
    <div class="row  mb-5">
        <div class="d-flex col justify-content-start">
            <a href="/sales/oil/salesorder" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                Back
            </a>
        </div>
        <div class="d-flex col justify-content-end">
            <button type="submit" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                Submit
            </button>
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