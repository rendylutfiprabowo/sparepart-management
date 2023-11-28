@extends('template.salesCrm')
@section('title', 'Dashboard Sales')

@section('contents')

    <x-page-heading>
        Dashboard
    </x-page-heading>

    <div class="row">
        @php
            $divideNumber = 1000;
            $percentageCustomers = ($customersTotal / $divideNumber) * 100;
            $percentageProjects = ($projectsTotal / $divideNumber) * 100;
            $percentageSales = $percentageCustomers + $percentageProjects;
        @endphp
        <x-card cardTitles="Total Order" subTitles="Monthly" iconClass="bi bi-graph-up" percents="{{ $percentageSales }} %"
            href="#" />
        <x-card cardTitles="Total Customers" subTitles="Monthly" iconClass="bi-person-up "
            percents="{{ $percentageCustomers }} %" href="#" />
        <x-card cardTitles="Total Projects" subTitles="Monthly" iconClass="bi-journal-arrow-up "
            percents="{{ $percentageProjects }} %" href="#" />
    </div>
    <br>
    <div class="row">
        <div class="col-lg-8">
            <div class="bg-white shadow-sm rounded p-3">
                <canvas id="chartStatistik"></canvas>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="bg-white rounded shadow-sm p-3">
                <canvas id="chartStatistikArea"></canvas>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <x-card-list :salesData="$salesData" href="#" />
        </div>
    </div>

    <script>
        var phpDataChart = {
            percentageSales: @json($percentageSales),
            customersTotal: @json($customersTotal),
            projectsTotal: @json($projectsTotal)
        };
    </script>

@endsection
