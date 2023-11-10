@extends('template.salesCrm ')
@section('contents')
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
                        <div class="text-black"><strong>{{ $salesorderoil->project->customer->nama_customer }}</strong></div>
                    </div>
                    <div class="col-6">
                        <div class="text-merah"><strong>Sales Name</strong></div>
                        <div class="text-black"><strong>Maulana</strong></div>
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
                <table class=" table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Item Test</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center ">
                        @foreach($project->history as $key => $history)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            @if($history->samples->count())
                            <td>
                                @foreach ($history->samples as $sample)
                                    <div>{{$sample->scope->nama_scope}}</div>
                                @endforeach
                            </td>
                            <td class="text-center align-middle"></td>
                            @else
                            <td> Item Test Belum di Input </td>
                            <td class="text-center align-middle"><a href="/sales/oil/salesorder/{{$project->id_project}}/{{$history->id}}" class="btn" type="button"><i class="fa-regular fa-file fa-xl"></i></a></td>
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
</div>



@endsection