@extends('template.adminoillab')
@section('content')
<p style="font-size: 23px; color: black;">Report Order</p>
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
            <div class="card-body shadow">
                <h6 class="text-start font-weight-bold " style="color: black;">Tabel dibawah ini adalah Form report yang harus dicheck kebenaran data hasilnya.</h6>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card p-4 rounded-4">
            <thead>
                <tr>
                    <h3 class="text-start text-dark my-4" style="font-weight: bold;">Report Order</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="table-responsive">
                <table class=" table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">No SO</th>
                            <th class="text-center" scope="col">Pic</th>
                            <th class="text-center" scope="col">Report</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                             <td class="text-center align-middle">1</td>
                            <td class="text-center align-middle">A9099885</td>
                            <td class="text-center align-middle">Nisa</td>
                            <td class="text-center align-middle">
                                <div><a href="/reviewreport_adminlab" type="button" class="btn btn-sm merah text-putih">Preview</a></div>
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection