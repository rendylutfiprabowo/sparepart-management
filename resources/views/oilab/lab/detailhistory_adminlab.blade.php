@extends('template.modoillab')
@section('content')
    <p style="font-size: 23px; color: black;">REPORT TEST HISTORY</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-3">
                            <div class="text-merah "><strong>Customer Name</strong></div>
                            <div class="text-merah"><strong>Tahun</strong></div>
                        </div>
                        <div class="col-3">
                            <div class="text-black">PLN</div>
                            <div class="text-black">2015</div>
                        </div>
                        <div class="col-3">
                            <div class="text-merah"><strong>No Tag</strong></div>
                            <div class="text-merah"><strong>Merk</strong></div>
                        </div>
                        <div class="col-3">
                            <div class="text-black">ASJB15</div>
                            <div class="text-black">Desalter FOC 1</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card p-4 rounded-4">
                <thead>
                    <tr>
                        <h3 class="text-start text-dark my-4" style="font-weight: bold;">List Form Report</h3>
                    </tr>
                    <hr class="mt-1" style="background-color: black;">
                </thead>
                <table class=" table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center font-weight-bold" style="color: rgb(212, 26, 26);">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No SO</th>
                            <th scope="col">No SPK</th>
                            <th scope="col">Test Item</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th scope="row">1</th>
                            <td>09284923890</td>
                            <td>A123982791</td>
                            <td>
                                <div>DGA</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
