@extends('template.salesCrm')
@section('title', 'Dashboard Sales')
@section('contents')

    {{-- <x-page-heading>
        Dashboard Analytic
    </x-page-heading>

    <div class="row">
        <x-card cardTitles="Total Order" subTitles="Monthly" iconClass="bi bi-graph-up" percents="{{ $totalOrderSP }} "
            href="#" />
        <x-card cardTitles="Total Customers" subTitles="Monthly" iconClass="bi-person-up " percents="{{ $customersTotal }} "
            href="#" />
        <x-card cardTitles="Total Projects" subTitles="Monthly" iconClass="bi-journal-arrow-up "
            percents="{{ $projectsTotal }} " href="#" />
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
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">SP Order</th>
                                <th scope="col">Oil labs</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salesData as $datasales)
                                <tr>
                                    <td scope="row">{{ $datasales->id_sales }}</td>
                                    <td>{{ $datasales->nama_sales }}</td>
                                    <td>{{ $datasales->phone_sales }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-card-default>
        </div>
    </div>

    {{-- Bar Chart --}}
    {{-- <script>
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
    </script> --}}
 

@endsection
