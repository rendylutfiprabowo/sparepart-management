@extends('template.modoillab')
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
                            <th class="text-center" scope="col">No SO</th>
                            <th class="text-center" scope="col">Customer</th>
                            <th class="text-center" scope="col">Project</th>
                            <th class="text-center" scope="col">Pic</th>
                            <th class="text-center" scope="col">Item Test</th>
                            <th class="text-center" scope="col">Report</th>
                            <th class="text-center" scope="col">Notes</th>
                            <th class="text-center" scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td class="text-center align-middle">A9099885</td>
                            <td class="text-center align-middle">Pertamina Indonesia</td>
                            <td class="text-center align-middle">Cilacap</td>
                            <td class="text-center align-middle">Nisa</td>
                            <td class="text-center align-middle">
                                <div>
                                    DGA
                                </div>
                                <div>
                                    Furan
                                </div>
                                <div>
                                    OA
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <div><a href="/reviewreport_modlab" type="button" class="btn btn-sm merah text-putih">Preview</a></div>
                            </td>
                            <td class="text-center align-middle"><a href="/report_modlab" class="btn" type="button" data-toggle="modal" data-target="#exampleModal1"><i class="fa-regular fa-file fa-xl"></i></a></td>
                            <td class="text-center align-middle">
                                <strong>Inspection</strong>
                            </td>
                    </tbody>
                    <tbody class="text-center">
                        <tr>
                            <td class="text-center align-middle">A10012381</td>
                            <td class="text-center align-middle">PLN</td>
                            <td class="text-center align-middle">Tangerang</td>
                            <td class="text-center align-middle">fika</td>
                            <td class="text-center align-middle">
                                <div>
                                    DGA
                                </div>
                                <div>
                                    Furan
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <div><a href="/reviewreport_modlab" type="button" class="btn btn-sm merah text-putih">Preview</a></div>
                            </td>
                            <td class="text-center align-middle"><a href="/report_modlab" class="btn" type="button" data-toggle="modal" data-target="#exampleModal2"><i class="fa-regular fa-file fa-xl"></i></a></td>
                            </td>
                            <td class="text-center align-middle">
                                <strong>Inspection</strong>
                            </td>
                    </tbody>
                </table>
                <!-- modal1 -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header merah">
                                <h4 class="modal-title btn merah text-putih" id="exampleModalLabel" style="font-weight: bold;">Notes</h4>
                                <button type="button" class="close putih" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="">Terlihat kejanggalan pada diagram duval Pentagon</form>
                            </div>
                            <div class="modal-footer">
                                <a href="/report_modlab" type="button" class="btn merah text-putih" style="font-weight: bold;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal2 -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header merah">
                                <h4 class="modal-title btn merah text-putih" id="exampleModalLabel" style="font-weight: bold;">Notes</h4>
                                <button type="button" class="close putih" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="">terlihat peletakan salah</form>
                            </div>
                            <div class="modal-footer">
                                <a href="/report_modlab" type="button" class="btn merah text-putih" style="font-weight: bold;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection