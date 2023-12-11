@extends('template.salesCrm')

@section('title', 'Oil Sales Dashboard')
@section('contents')
    <x-page-heading>
        OIL ANALYTIC
    </x-page-heading>
    <div class="row">
        <x-card cardTitles="DGA " subTitles="Monthly" iconClass="bi-moisture" percents="{{ $totalDGA }}" href="#" />
        <x-card cardTitles="FURAN " subTitles="Monthly" iconClass="bi-moisture" percents="{{ $totalFuran }}" href="#" />
        <x-card cardTitles="OA" subTitles="Monthly" iconClass="bi-moisture" percents="{{ $totalOA }}" href="#" />
    </div>
    <br>
    <div class="table-responsive bg-white rounded p-2 shadow-sm">
        <table class="table text-center">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Customer</th>
                    <th scope="col">No Spk</th>
                    <th scope="col">No So</th>
                    <th scope="col">Sales</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $number = 1;
                @endphp
                @foreach ($dataOilCustomers as $dataOilCust)
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $dataOilCust->project->customer->nama_customer }}</td>
                        <td>{{ $dataOilCust->no_spk_solab }}</td>
                        <td>{{ $dataOilCust->no_so_solab }}</td>
                        <td>{{ $dataOilCust->sales->nama_sales }}</td>
                        <td><small>{{ $dataOilCust->alamat_solab }}</small></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
