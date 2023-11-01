@extends('template.laboil')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-4 rounded-4">
            <thead>
                <tr>
                    <h3 class="text-start text-dark my-4" style="font-weight: bold;">list Item</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No SO</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Project</th>
                            <th scope="col">Sales Name</th>
                            <th scope="col">Item Test</th>
                            <th scope="col">Sample</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Notes</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($salesorderoil as $solab)
                        <tr>
                            <td>{{ $solab['no_so_solab'] }}</td>
                            <td>{{ $solab->project->customer->nama_customer }}</td>
                            <td>{{ $solab['project']['nama_project'] }}</td>
                            <td>{{ $solab['sales']['nama_sales'] }}</td>
                            <td>
                                @foreach ($solab->samples as $sample)
                                <div>{{ $sample->scope->nama_scope }}</div>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($solab->samples as $sample)
                                <div>{{ $sample->jumlah_sample }}</div>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($solab->samples as $sample)
                                <div>{{ $sample->status_sample == true ? 'Completed' : 'In Progress' }}</div>
                                @endforeach
                            </td>
                            <td>
                                <button class="btn" type="button" data-toggle="modal" data-target="#note-{{ $solab->no_so_solab }}">
                                    <i class="fa-regular fa-file fa-xl"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            @foreach ($salesorderoil as $solab)
            <div class="modal fade" id="note-{{ $solab->no_so_solab }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header merah">
                            <h5 class="modal-title text-putih" id="exampleModalLabel">Input Notes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/item_test/add/{{ $solab->no_so_solab }}">
                                @csrf
                                <input type="hidden" value="{{ $solab->no_so_solab }}" name="no_so_solab">
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" id="message-text" name="notes_reportsample"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn merah text-putih">Save changes</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach
@endsection