@extends('template.salesCrm ')
@section('title', 'Detail Order Oil')
@section('contents')

    <div>
        <x-back-button href="/sales/oil/salesorder" />
    </div>
    <br>
    <div class="row">
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
    <br>
    <div class="row ">
        <div class="col-md-12">
            <div class="card p-4 rounded-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="text-start text-dark my-4" style="font-weight: bold;">list Order</h3>
                </div>
                <hr class="mt-1">
                <div class="table-responsive">
                    <table class=" table table-bordered" id="" width="100%" cellspacing="0">
                        <thead class="table-secondary">
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Item Test</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center align-middle">
                            @foreach ($project->history as $key => $history)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @if ($history->samples->count())
                                        <td>
                                            @foreach ($history->samples as $sample)
                                                <span
                                                    class="badge  @if ($sample->scope->nama_scope == 'OA') text-bg-danger
                                                    @elseif($sample->scope->nama_scope == 'Furan') text-bg-warning
                                                    @elseif($sample->scope->nama_scope == 'DGA') text-bg-secondary @endif ">{{ $sample->scope->nama_scope }}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-center align-middle"> - </td>
                                    @else
                                        <td><span class="badge text-bg-danger">Item Test Belum di Input</span></td>
                                        <td class="text-center align-middle"><a
                                                href="/sales/oil/salesorder/{{ $project->id_project }}/{{ $history->id }}"
                                                class="btn " type="button"><i class="fa-regular fa-file fa-xl"></i></a>
                                        </td>
                                    @endif
                                </tr>
                                <!-- button modal -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




@endsection
