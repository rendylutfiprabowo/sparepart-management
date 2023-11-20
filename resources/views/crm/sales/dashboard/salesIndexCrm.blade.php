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
        <x-card cardTitles="Sales Profit" iconClass="bi bi-graph-up" percents="{{ $percentageSales }} %" href="/" />
        <x-card cardTitles="Customers" iconClass="bi-person-up " percents="{{ $percentageCustomers }} %" href="#" />
        <x-card cardTitles="Projects" iconClass="bi-journal-arrow-up " percents="{{ $percentageProjects }} %"
            href="#" />
    </div>
    <br>
    <div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">Selling</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Visitor</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active shadow-sm bg-white rounded p-4" id="nav-home" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <div id="profitCharts"></div>
            </div>
            <div class="tab-pane fade shadow-sm bg-white rounded p-4" id="nav-profile" role="tabpanel"
                aria-labelledby="nav-profile-tab">
                <div id="visitorCharts"></div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <x-card-list :salesData="$salesData" href="#" />
    </div>

    <script>
        let percentageSales = {{ $percentageSales }}
        let customersTotal = {{ $customersTotal }};
        let projectsTotal = {{ $projectsTotal }};
        let currentDate = new Date();
        let year = currentDate.getFullYear();
        let month = currentDate.getMonth() + 1;
        let date = currentDate.getDate();

        let formattedDate = year + '-' + (month < 10 ? '0' + month : month) + '-' + (date < 10 ? '0' + date :
            date);

        let myConfigProfit = {
            type: "bar",
            title: {
                text: "Selling Profit Days",
            },
            legend: {
                draggable: true,
            },
            scaleX: {
                // Set scale label
                label: {
                    text: "Statistics",
                },

                // Convert text on scale indices
                labels: [formattedDate],
            },
            scaleY: {
                // Scale label with unicode character
                label: {
                    text: "Target",
                },
            },
            plot: {
                // Animation docs here:
                // https://www.zingchart.com/docs/tutorials/styling/animation#effect
                animation: {
                    effect: "ANIMATION_EXPAND_BOTTOM",
                    method: "ANIMATION_STRONG_EASE_OUT",
                    sequence: "ANIMATION_BY_NODE",
                    speed: 275,
                },
            },
            series: [{
                    // Plot 1 values, linear data
                    values: [percentageSales],
                    'background-color': "#FF8080",
                    text: "Profitable",
                },
                {
                    // Plot 2 values, linear data
                    values: [customersTotal],
                    'background-color': '#8EACCD',
                    text: "Customers",
                },
                {
                    // Plot 2 values, linear data
                    values: [projectsTotal],
                    'background-color': "#618264",
                    text: "Projects",
                },
            ],
        };
    </script>

@endsection
