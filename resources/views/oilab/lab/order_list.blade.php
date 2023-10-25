@extends('template.laboil')
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
                        <tr class="text-center">
                            <th scope="col">No SO</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Project</th>
                            <th scope="col">Item Test</th>
                            <th scope="col">Report</th>
                            <th scope="col">Input Data</th>
                            <th scope="col">Status</th>
                            <th scope="col">Note</th>
                        </tr>
                    </thead>
                    @foreach($salesorderoil as $solab)
                    <tbody class="text-center ">
                        <td>{{$solab['no_so_solab']}}</td>
                        <td>{{$solab->project->customer->nama_customer}}</td>
                        <td>{{$solab['project']['nama_project']}}</td>
                        <td>
                            @foreach($solab->samples as $sample)
                            <div>{{$sample->scope->nama_scope}}</div>
                            @endforeach
                        </td>
                        <td class="text-center align-middle">
                            <div>
                                @foreach($solab->samples as $sample)
                                @if($sample->scope->nama_scope === 'DGA')
                                <div>
                                <a href="/form_dga_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></i></a>
                                </div>
                                @elseif($sample->scope->nama_scope === 'Furan')
                                <div>
                                <a href="/form_furan_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></i></a>
                                </div>
                                @elseif($sample->scope->nama_scope === 'OA')
                                <div>
                                <a href="/form_oa_lab" class="pdf-link"><i class="fa-regular fa-file fa-lg"></i></a>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </td>
                        <td class="text-center align-middle"><a href="/form_add_data" type="button" class="btn merah text-putih">Add Data</a></td>
                        <td class="text-center align-middle">
                            <div>
                                <strong>Checking</strong>
                            </div>
                        </td>
                        <!-- button modal -->
                        <td class="text-center align-middle"><a href="/order_list" class="btn" type="button" data-toggle="modal" data-target="#exampleModal1"><i class="fa-regular fa-file fa-xl"></i></a></td>
                    </tbody>
                    @endforeach
                </table>
                <!-- Modal 1 -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
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
                                <a href="/orderlist" type="button" class="btn merah text-putih" style="font-weight: bold;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal 2 -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header merah">
                                <h4 class="modal-title btn merah text-putih" id="exampleModalLabel" style="font-weight: bold;">Notes</h4>
                                <button type="button" class="close putih" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action=""></form>
                            </div>
                            <div class="modal-footer">
                                <a href="/orderlist" type="button" class="btn merah text-putih" style="font-weight: bold;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection