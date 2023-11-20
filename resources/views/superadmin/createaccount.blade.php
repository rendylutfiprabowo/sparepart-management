@extends('template.superadmin')
@section('contents')
    <!-- lOGO TRAFOINDO -->
    <div class="container d-flex justify-content-center align-items-center">
        <img src="/Asset/LogoTrafoindo.png" alt="Centered Image" style="width: 235px;">
    </div>
    <!--  -->
    <!-- form salesorder -->
    <div>
        <form action="/materialstore" method="post">
            @csrf
            <div class="row">
                <div class="col-md-5"></div> <!-- div kosong -->
                <div class="col-md-5"></div> <!-- div kosong -->
                
            </div>
            <div class="container-fluid">
                <div class="mb-3">
                    <label for="id_mr" class="form-label">PR NO</label>
                    <input type="text" class="form-control" id="id_mr" placeholder="Masukan id MR"
                        value="" name="id_mr" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Date</label>
                    <input type="date" class="form-control" id="tanggal" value=""
                        placeholder="Masukan Tanggal" name="tanggal_mr">
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Division Name</label>
                        <input list="options" class="form-control" id="exampleFormControlSelect1"
                            placeholder="Type to search">
                        <datalist id="options">
                            <option value="Option 1">
                            <option value="Option 2">
                            <option value="Option 3">
                        </datalist>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Division Code</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Project"
                        name="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Note</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan"></textarea>
                </div>
                <button type="submit">submit</button>
                <!-- <input type="submit" value="Submit"> -->
        </form>

        <!-- button back -->
        <div class="row mb-5">
            <div class="col-6">
                <a href="\materialrequest" class="btn btn-danger btn-md font-weight-bold text-white mt-5">
                    Back
                </a>
            </div>
            <div class="col-6 text-end">
                <a href="/tabelmaterialmr" type="submit" class="btn btn-danger btn-md font-weight-bold text-white mt-5">
                    Next
                </a>
            </div>
        </div>
    </div>
@endsection
