@extends('template.laboil')
@section('content')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-merah"><strong>No So</strong></div>
                            <div class="text-black"><strong>{{ $salesorderoil->no_so_solab }}</strong></div>
                        </div>
                        <div class="col-6">
                            <div class="text-merah"><strong>Project</strong></div>
                            <div class="text-black"><strong>{{ $salesorderoil->project->nama_project }}</strong></div>
                        </div>
                        <div class="col-6">
                            <div class="text-merah"><strong>Customer Name</strong></div>
                            <div class="text-black"><strong>{{ $salesorderoil->project->customer->nama_customer }}</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-merah"><strong>Sales Name</strong></div>
                            <div class="text-black"><strong>{{ $salesorderoil->sales->nama_sales }}</strong></div>
                        </div>
                    </div>
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
                </div>
                <hr class="mt-1" style="background-color: black;">
                </thead>
                <div class="table-responsive">

                    <table class=" table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center font-weight-bold" style="color: rgb(212, 26, 26);">
                            <tr class="text-center">
                                <th scope="col">Serial Number</th>
                                <th scope="col">KVA</th>
                                <th scope="col">Merk Trafo</th>
                                <th scope="col">Item Test</th>
                                <th scope="col">Report</th>
                                <th scope="col">Add Data</th>
                                <th scope="col">Report</th>
                            </tr>
                        </thead>
                        <tbody class="text-center ">
                            @foreach ($salesorderoil->project->history as $history)
                                <tr>
                                    @if ($history->trafo)
                                        <td>{{ $history->trafo->serial_number }}</td>
                                        <td>{{ $history->trafo->kva }}</td>
                                        <td>{{ $history->trafo->merk }}</td>

                                        <td class="text-center align-middle">
                                            @foreach ($history->samples as $sample)
                                                <div>{{ $sample->scope->nama_scope }}</div>
                                            @endforeach
                                        </td>
                                    @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>
                                            @foreach ($history->samples as $sample)
                                                <div>{{ $sample->scope->nama_scope }}</div>
                                            @endforeach
                                        </td>
                                    @endif

                                    <td class="text-center align-middle">
                                        <div>
                                            @foreach ($history->samples as $sample)
                                                <div>
                                                    <a href="/orderlist/{{ $salesorderoil->no_so_solab }}/{{ $sample->id_sample }}"
                                                        class="pdf-link"><i class="fa-regular fa-file fa-lg"></i></a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="/orderlist/{{ $salesorderoil->no_so_solab }}/{{ $history->id }}/add"
                                            type="button" class="btn-sm btn merah text-putih mx-auto">Add Data<i
                                                class="fa-regular fa-square-plus ml-2 "></i></a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ url('generate-pdf') }}" type="button"
                                            class="btn-sm btn merah text-putih mx-auto"><i
                                                class="fa-solid fa-download"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
