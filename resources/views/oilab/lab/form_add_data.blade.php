@extends('template.lab')
@section('content')

<div>
    <!-- lOGO TRAFOINDO -->
    <div class="container d-flex justify-content-center align-items-center">
        <img src="/Asset/LogoTrafoindo.png" alt="Centered Image" style="width: 235px;">
    </div>

    <!-- form salesorder -->
    <div>
        <div class="container-fluid">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">KVA</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter No KVA">
            </div>
            <div class="mb-3">
                <label for="exampleDataList" class="form-label">Merk</label>
                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Enter Merk">
                <datalist id="datalistOptions">
                    <option value="Trafo c">
                    <option value="Trafo A">
                    <option value="Trafo kejora">
                    <option value="Trafo trafo">
                    <option value="Trafoindo">
                </datalist>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Year</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Customer Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Voltage</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Voltage">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">VG</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter VG">
            </div>
            <div class="mb-3">
                <label for="exampleDataList" class="form-label">Tag Number</label>
                <input class="form-control" list="datatagnumber" id="exampleDataList" placeholder="Enter Tag Number">
                <datalist id="datatagnumber">
                    <option value="56513213215">
                    <option value="59875613453">
                    <option value="54512168441">
                    <option value="45535421545">
                    <option value="56554682151">
                </datalist>
            </div>
            <div class="mb-3">
                <label for="exampleDataList" class="form-label">Serial Number</label>
                <input class="form-control" list="dataserial" id="exampleDataList" placeholder="Enter Serial Number">
                <datalist id="dataserial">
                    <option value="546542687">
                    <option value="7567373777">
                    <option value="752752727">
                    <option value="477752727">
                    <option value="527572572">
                </datalist>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Temp. Oil (°C) </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Temp Oil">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Volume Oil (Liter)</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Volume Oil">
            </div>
            <div>
                <form>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Sampling</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                </form>
            </div>
            <div>
                <form>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Kedatangan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                </form>
            </div>
            <div>
                <form>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pengujian</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                </form>
            </div>
            <div>
                <form>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pembuatan Laporan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                </form>
            </div>
            <div>
                <form>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pengiriman Laporan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                </form>
            </div>
            
            <!-- button back -->
            <div class="row mb-5">
                <div class="d-flex col justify-content-start">
                    <a href="/order_list" class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
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
        @endsection