@extends('template.salesCrm')
@section('title', 'Oil Sales History')
@section('contents')
    <div class="p-3 bg-white rounded shadow-sm">
        <table class="table table-bordered  align-middle text-center" id="dataTable" width="100%" cellspacing="0">
            <thead class="text-center">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Serial Number</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Lihat</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($customers as $no => $customer)
                    @if($customer->trafos)
                    @foreach ($customer->trafos as $key => $trafo)
                        <tr>
                            @if ($key == 0)
                                <td rowspan="{{ $customer->trafos->count() }}">{{ $no + 1 }}</td>
                                <td rowspan="{{ $customer->trafos->count() }}">{{ $customer->nama_customer }}</td>
                            @endif
                            <td> {{ $trafo->serial_number }}</td>
                            <td> {{ $trafo->merk }}</td>
                            <td> {{ $trafo->year }}</td>
                            <td> <a href="/sales/oil/history/{{$trafo->id_trafo}}" class="btn btn-danger"> Detail </a> </td>
                        </tr>
                    @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    {{-- @foreach ($salesorderoil as $solab)
        @foreach ($solab->project->history as $history)
            <div class="modal fade" id="exampleModal{{ $history->id }}" tabindex="-1" id="exampleModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header merah">
                            <h4 class="modal-title btn merah text-putih" id="exampleModalLabel">
                                Notes
                            </h4>
                            <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"
                                style="background-color: white; width: 24px; height: 24px; padding: 0; border: 0; font-size: 10px;"></button>
                        </div>
                        <div class="modal-body">
                            {{ $history->note }}
                        </div>
                        <div class="modal-footer">
                            <a href="/sales/oil/sample" type="button" class="btn merah text-putih">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach --}}
@endsection
