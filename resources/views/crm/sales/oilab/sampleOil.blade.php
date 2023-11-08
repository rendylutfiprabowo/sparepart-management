@extends('template.salesCrm')
@section('title', 'Oil Sales Sample')
@section('contents')
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="text-center">
        <tr>
            <th scope="col">No SO</th>
            <th scope="col">Customer</th>
            <th scope="col">Project</th>
            <th scope="col">Sales Name</th>
            <th scope="col">Trafo</th>
            <th scope="col">Item Test</th>
            <th scope="col">Progress</th>
            <th scope="col">Notes</th>
            <th scope="row">Action</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($salesorderoil as $solab)
        <tr>
            <td>
                {{ $solab['no_so_solab'] }}
            </td>
            <td>{{ $solab->project->customer->nama_customer }}</td>
            <td>{{ $solab['project']['nama_project'] }}</td>
            <td>{{ $solab['sales']['nama_sales'] }}</td>
            <td>
                @foreach($solab->project->history as $key => $history)
                <div>
                    {{$key+1}}
                </div>
                @endforeach
            </td>
            <td>
                @foreach ($solab->project->history as $history)
                @foreach($history->samples as $sample)
                <div>{{ $sample->scope->nama_scope }}</div>
                @endforeach
                @endforeach
            </td>
            <td>
                @foreach ($solab->project->history as $history)
                @foreach($history->samples as $sample)
                <div>{{ $sample->status_sample == true ? 'Completed' : 'In Progress' }}</div>
                @endforeach
                @endforeach
            </td>
            <td class="">
                @foreach ($solab->project->history as $history)
                <button href="#" class="btn pt-0" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $history->id }}">
                    <i class="fa-regular fa-file "></i>
                </button>
                @endforeach
            </td>
            <td><button type="button" class="btn merah text-putih">download</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Modal -->
@foreach ($salesorderoil as $solab)
@foreach($solab->project->history as $history)
<div class="modal fade" id="exampleModal{{ $history->id }}" tabindex="-1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header merah">
                <h4 class="modal-title btn merah text-putih" id="exampleModalLabel" style="font-weight: bold;">Notes
                </h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close" style="background-color: white; width: 24px; height: 24px; padding: 0; border: 0; font-size: 10px;"></button>
            </div>
            <div class="modal-body">
                {{$history->note}}
            </div>
            <div class="modal-footer">
                <a href="/sales/oil/sample" type="button" class="btn merah text-putih" style="font-weight: bold;">Back</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach
@endsection