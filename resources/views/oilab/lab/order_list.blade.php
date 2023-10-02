@extends('template.lab')
@section('content')
<p style="font-size: 23px; color: black;">LIST ORDER</p>
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
            <div class="card-body shadow">
                <h6 class="text-start font-weight-bold " style="color: black;">Tabel dibawah ini untuk pengisian data Trafo dan Pengisian Hasil pengecekan Oil Trafo.</h6>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card p-4 rounded-4">
            <thead>
                <tr>
                    <h3 class="text-start text-dark my-4" style="font-weight: bold;">list Order</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="table-responsive">
                <table class=" table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No SO</th>
                            <th class="text-center" scope="col">Customer</th>
                            <th class="text-center" scope="col">Project</th>
                            <th class="text-center" scope="col">Item Test</th>
                            <th class="text-center" scope="col">Action</th>
                            <th class="text-center" scope="col">Input Data</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>A9099885</td>
                            <td>Pertamina Indonesia</td>
                            <td>Cilacap</td>
                            <td>
                                <div>DGA</div>
                                <div>Furan</div>
                                <div>OA</div>
                            </td>
                            <td>
                                <div>
                                    <a href="/form_furan_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_furan_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_oa_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                            </td>
                            <td><a href="/form_add_data" type="button" class="btn merah text-putih">Add Data</a></td>
                        <tr>
                            <td>A9099885</td>
                            <td>Pertamina Indonesia</td>
                            <td>Cilacap</td>
                            <td>
                                <div>DGA</div>
                                <div>Furan</div>
                                <div>OA</div>
                            </td>
                            <td>
                                <div>
                                    <a href="/form_dga_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_furan_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_oa_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                            </td>
                            <td><a href="/form_add_data" type="button" class="btn merah text-putih">Add Data</a></td>
                        <tr>
                            <td>A9099885</td>
                            <td>Pertamina Indonesia</td>
                            <td>Cilacap</td>
                            <td>
                                <div>DGA</div>
                                <div>Furan</div>
                                <div>OA</div>
                            </td>
                            <td>
                                <div>
                                    <a href="/form_dga_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_furan_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_oa_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                            </td>
                            <td><a href="/form_add_data" type="button" class="btn merah text-putih">Add Data</a></td>
                        <tr>
                            <td>A9099885</td>
                            <td>Pertamina Indonesia</td>
                            <td>Cilacap</td>
                            <td>
                                <div>DGA</div>
                                <div>Furan</div>
                                <div>OA</div>
                            </td>
                            <td>
                                <div>
                                    <a href="/form_dga_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_furan_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_oa_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                            </td>
                            <td><a href="/form_add_data" type="button" class="btn merah text-putih">Add Data</a></td>
                        <tr>
                            <td>A9099885</td>
                            <td>Pertamina Indonesia</td>
                            <td>Cilacap</td>
                            <td>
                                <div>DGA</div>
                                <div>Furan</div>
                                <div>OA</div>
                            </td>
                            <td>
                                <div>
                                    <a href="/form_dga_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_furan_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_oa_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                            </td>
                            <td><a href="/form_add_data" type="button" class="btn merah text-putih">Add Data</a></td>
                        <tr>
                            <td>A9099885</td>
                            <td>Pertamina Indonesia</td>
                            <td>Cilacap</td>
                            <td>
                                <div>DGA</div>
                                <div>Furan</div>
                                <div>OA</div>
                            </td>
                            <td>
                                <div>
                                    <a href="/form_dga_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_furan_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_oa_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                            </td>
                            <td><a href="/form_add_data" type="button" class="btn merah text-putih">Add Data</a></td>
                        <tr>
                            <td>A9099885</td>
                            <td>Pertamina Indonesia</td>
                            <td>Cilacap</td>
                            <td>
                                <div>DGA</div>
                                <div>Furan</div>
                                <div>OA</div>
                            </td>
                            <td>
                                <div>
                                    <a href="/form_dga_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_furan_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_oa_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                            </td>
                            <td><a href="/form_add_data" type="button" class="btn merah text-putih">Add Data</a></td>
                        <tr>
                            <td>A9099885</td>
                            <td>Pertamina Indonesia</td>
                            <td>Cilacap</td>
                            <td>
                                <div>DGA</div>
                                <div>Furan</div>
                                <div>OA</div>
                            </td>
                            <td>
                                <div>
                                    <a href="/form_dga_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_furan_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                                <div>
                                    <a href="/form_oa_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></a></i>
                                </div>
                            </td>
                            <td><a href="/form_add_data" type="button" class="btn merah text-putih">Add Data</a></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection