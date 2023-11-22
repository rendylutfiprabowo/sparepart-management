@extends('template.laboil')
@section('content')
    <p style="font-size: 23px; color: black;">LIST ORDER</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
                <div class="card-body shadow">
                    <h6 class="text-start font-weight-bold " style="color: black;">Tabel dibawah ini Informasi data order Oil
                        Lab</h6>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card p-4 rounded-4">
                <thead>
                    <tr>
                        <h3 class="text-start text-dark my-4" style="font-weight: bold;">Daftar Order</h3>
                    </tr>
                    <hr class="mt-1" style="background-color: black;">
                </thead>
                <div class="table-responsive">
                    <table class=" text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center font-weight-bold" style="color: rgb(212, 26, 26);">
                            <tr>
                                <th>No</th>
                                <th>No SO</th>
                                <th>Customer Name</th>
                                {{-- <th>Status</th> --}}
                                <th>Report</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salesorderoil as $key => $solab)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $solab['no_so_solab'] }}</td>
                                    <td>{{ $solab->project->customer->nama_customer }}</td>
                                    {{-- <td>In Progress</td> --}}
                                    <td><a href="/orderlist/{{ $solab->no_so_solab }}" type="button"
                                            class="btn merah text-putih">detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
