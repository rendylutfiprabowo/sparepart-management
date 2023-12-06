@extends('template.adminoillab')
@section('content')
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
                        <h3 class="text-start text-dark my-4" style="font-weight: bold;">List History Trafo</h3>
                    </tr>
                    <hr class="mt-1" style="background-color: black;">
                </thead>
                <div class="table-responsive">
                    <table class=" text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center font-weight-bold" style="color: rgb(212, 26, 26);">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Serial Number</th>
                                <th scope="col">Merk</th>
                                <th scope="col">Year</th>
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($customers as $no => $customer)
                                @if ($customer->trafos)
                                    @foreach ($customer->trafos as $key => $trafo)
                                        <tr>
                                            @if ($key == 0)
                                                <td rowspan="{{ $customer->trafos->count() }}">{{ $no + 1 }}</td>
                                                <td rowspan="{{ $customer->trafos->count() }}">
                                                    {{ $customer->nama_customer }}</td>
                                            @endif
                                            <td> {{ $trafo->serial_number }}</td>
                                            <td> {{ $trafo->merk }}</td>
                                            <td> {{ $trafo->year }}</td>
                                            <td> <a href="/history_adminlab/{{ $trafo->id_trafo }}" class="btn merah text-putih">
                                                    Detail </a> </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
