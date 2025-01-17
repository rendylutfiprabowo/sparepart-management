@extends('template.salesCrm')
@section('title', 'Oil Sales History')
@section('contents')

    <x-page-heading>
        History Hasil Pengetesan
    </x-page-heading>
    <br>
    <div class="p-3 bg-white rounded shadow-sm">
        <table class="table align-middle text-center" id="dataTable" width="100%" cellspacing="0">
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
                    @if ($customer->trafos)
                        @foreach ($customer->trafos as $key => $trafo)
                            <tr>
                                @if ($key == 0)
                                    <td rowspan="{{ $customer->trafos->count() }}">{{ $no + 1 }}</td>
                                    <td rowspan="{{ $customer->trafos->count() }}">{{ $customer->nama_customer }}</td>
                                @endif
                                <td> {{ $trafo->serial_number }}</td>
                                <td> {{ $trafo->merk }}</td>
                                <td> {{ $trafo->year }}</td>
                                <td> <a href="/sales/oil/history/{{ $trafo->id_trafo }}" class="btn btn-danger"> Detail </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
