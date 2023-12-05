@extends('template.salesCrm')
@section('title', 'Oil Sales History')
@section('contents')

    <p style="font-size: 23px; color: black;">HISTORY HASIL PENGETESAN</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
                <div class="card-body shadow">
                    <h6 class="text-start font-weight-bold " style="color: black;">Seluruh history Form report yang sudah
                        complete ditampilkan pada halaman ini. </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card p-4 rounded-4">
                <thead>
                    <tr>
                        <h3 class="text-start text-dark my-4" style="font-weight: bold;">Daftar Form Report</h3>
                    </tr>
                    <hr class="mt-1" style="background-color: black;">
                </thead>
                <table class=" text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>No seri</th>
                            <th>Merk</th>
                            <th>Tahun</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trafos as $id => $trafo)
                        <tr>
                            <td>{{$id+1}}</td>
                            <td>{{$trafo->customer->nama_customer}}</td>
                            <td>{{$trafo->serial_number}}</td>
                            <td>{{$trafo->merk}}</td>
                            <td>{{$trafo->year}}</td>
                            <td><a href="/sales/oil/history/detail" class="btn btn-danger text-putih">detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
