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
                    <table class="table table-bordered align-middle text-center" id="dataTable" cellspacing="0"
                        style="outline: 1px solid">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">No SO</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Project</th>
                                <th scope="col">Sales Name</th>
                                <th scope="col">Trafo</th>
                                <th scope="col">Item Test</th>
                                <th scope="col">Notes</th>
                            </tr>
                        </thead>
                        <tbody class="text-center ">
                            @foreach ($salesorderoil as $no => $solab)
                                @foreach ($solab->project->history as $key => $history)
                                    <tr>
                                        @if ($key == 0)
                                            <td rowspan="{{ $solab->project->history->count() }}">{{ $no + 1 }}</td>
                                            <td rowspan="{{ $solab->project->history->count() }}">{{ $solab->no_so_solab }}
                                            </td>
                                            <td rowspan="{{ $solab->project->history->count() }}">
                                                {{ $solab->project->customer->nama_customer }}</td>
                                            <td rowspan="{{ $solab->project->history->count() }}">
                                                {{ $solab->project->nama_project }}</td>
                                            <td rowspan="{{ $solab->project->history->count() }}">
                                                {{ $solab->sales->nama_sales }}</td>
                                        @endif
                                        <td>
                                            @if ($history->trafo)
                                                {{ $history->trafo->serial_number }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                @foreach ($history->samples as $sample)
                                                    <div>{{ $sample->scope->nama_scope }}</div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="d-flex flex-column  ">
                                            @if ($history->note === 'lengkap')
                                                <i class="fa-solid fa-check pt-2"></i>
                                            @elseif ($history->note === 'tidak lengkap')
                                                <i class="fa-solid fa-times pt-2"></i>
                                            @else
                                                <button class="btn" type="button" data-toggle="modal"
                                                    data-target="#note-{{ $history->id }}">
                                                    <i class="fa-regular fa-file fa-xl pt-2"></i>
                                                </button>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal -->
                @foreach ($salesorderoil as $solab)
                    @foreach ($solab->project->history as $history)
                        <div class="modal fade" id="note-{{ $history->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header merah">
                                        <h5 class="modal-title text-putih" id="exampleModalLabel">Input Notes</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="/item_test/add/{{ $history->id }}">
                                            @csrf
                                            <input type="hidden" value="{{ $solab->no_so_solab }}" name="no_so_solab">
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Message:</label>
                                                <textarea class="form-control" id="message-text" name="notes_reportsample"></textarea>
                                            </div>
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif

                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
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
                    @endforeach
                @endforeach

            </div>
        </div>
    </div>
    </div>
@endsection
