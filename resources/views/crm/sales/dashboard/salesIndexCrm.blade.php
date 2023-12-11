@extends('template.salesCrm')
@section('title', 'Dashboard Sales')
@section('contents')

    <x-page-heading>
        Dashboard Analytic
    </x-page-heading>

    <div class="row">
        <x-card cardTitles="Total Order" subTitles="Monthly" iconClass="bi bi-graph-up" percents="{{ $percentageSales }} %"
            href="#" />
        <x-card cardTitles="Total Customers" subTitles="Monthly" iconClass="bi-person-up "
            percents="{{ $percentageCustomers }} %" href="#" />
        <x-card cardTitles="Total Projects" subTitles="Monthly" iconClass="bi-journal-arrow-up "
            percents="{{ $percentageProjects }} %" href="#" />
    </div>
    <br>
    <div class="row ">
        <div class="col-lg-6">
            <x-card-default title="Total Data Count graph" class="text-bg-light text-secondary">
                <canvas id="chartStatistik"></canvas>
            </x-card-default>
        </div>

        <div class="col-lg-6">
            <x-card-default title="Monthly Graph" class="text-bg-light text-secondary">
                <canvas id="chartStatistikLine"></canvas>
            </x-card-default>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8">
            <x-card-default title="Sales Data Team" class="text-bg-light">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">SP Order</th>
                                <th scope="col">Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salesData as $datasales)
                                <tr>
                                    <td scope="row">{{ $datasales->id_sales }}</td>
                                    <td>{{ $datasales->nama_sales }}</td>
                                    <td>{{ $datasales->phone_sales }}</td>

                                    <td>{{ $totalOrderSP }}</td>
                                    @php
                                        $numberTarget = 100;
                                        $result = ($totalOrderSP / $numberTarget) * 100;
                                    @endphp
                                    <td>
                                        <div class="progress" role="progressbar" aria-label="Total Sales Progress"
                                            aria-valuenow="{{ $result }}" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-danger" style="width: {{ $result }}%">

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-card-default>
        </div>
    </div>

    {{-- Bar Chart --}}
    <script>
        var phpDataChart = {
            percentageSales: @json($percentageSales),
            customersTotal: @json($customersTotal),
            projectsTotal: @json($projectsTotal)
        };
    </script>

    <script>
        var phpLineChartData = {
            totalorders: @json($totalOrderSP),
        }
    </script>
    <script>
        var phpOilChart = {
            totalOilSample: @json($oilSample)
        }
    </script>


@endsection
