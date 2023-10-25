@extends('template.laboil')
@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
            <div class="card-body shadow">
                <div class="row">
                    <div class="col-3">
                        <div class="text-merah "><strong>No So</strong></div>
                        <div class="text-merah"><strong>Project</strong></div>
                    </div>
                    @foreach($salesorderoil as $solab)
                    <div class="col-3">
                        <div class="text-black"> <strong>{{$solab['no_so_solab']}}</strong></div>
                        <div class="text-black"><strong>{{$solab['project']['nama_project']}}</strong></div>
                    </div>
                    <div class="col-3">
                        <div class="text-merah"><strong>Customer Name</strong></div>
                        <div class="text-merah"><strong>Sales Name</strong></div>
                    </div>
                    <div class="col-3">
                        <div class="text-black"><strong>{{$solab->project->customer->nama_customer}}</strong></div>
                        <div class="text-black"><strong>{{$solab['sales']['nama_sales']}}</strong></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card p-4 rounded-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-start text-dark my-4" style="font-weight: bold;">list Order</h3>
                <a href="/form_add_data" type="button" class="btn-sm btn merah text-putih mt-5 mb-1">Add Data<i class="fa-regular fa-square-plus ml-2 "></i></a>
            </div>
            <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="table-responsive">
                <table class=" table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Serial Number</th>
                            <th scope="col">Merk Trafo</th>
                            <th scope="col">Year Trafo</th>
                            <th scope="col">Item Test</th>
                            <th scope="col">Report</th>
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