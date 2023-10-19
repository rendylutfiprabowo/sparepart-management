@extends('template.salesCrm')

@section('title', 'Oil Sales Report')
@section('content')
<table class="table table class=" table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="text-center">
        <tr>
            <th scope="col">No SO</th>
            <th scope="col">Customer</th>
            <th scope="col">Project</th>
            <th scope="col">Test Item</th>
            <th scope="col">Progress</th>
            <th scope="col">Report</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($salesorderoil as $solab)
        <tr>
            <td>{{$solab['no_so_solab']}}</td>
            <td>{{$solab->project->customer->nama_customer}}</td>
            <td>{{$solab['project']['nama_project']}}</td>
            <td>
                @foreach($solab->samples as $sample)
                <div>{{$sample->scope->nama_scope}}</div>
                @endforeach
            </td>
            <td>
                <div>Complete</div>
                <div>Complete</div>
                <div>Complete</div>
            </td>
            <td><button type="button" class="btn merah text-putih">download</button></td>
            @endforeach
    </tbody>
</table>
@endsection