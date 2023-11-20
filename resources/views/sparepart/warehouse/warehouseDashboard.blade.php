@extends('template.warehouseSparepart')
@section('title', 'Dashboard Warehouse')

@section('contents')
    <div>
        <x-page-heading>
            Dashboard
        </x-page-heading>

        <div class="row">
            <x-card cardTitles="Total Item" iconClass="bi bi-diagram-3-fill" percents="{{ $totalItem }}" />
            <x-card cardTitles="Total Order" iconClass="bi bi-journal-text" percents="{{ $totalOrder }} " />
            <x-card cardTitles="Order Closed" iconClass="bi bi-journal-x" percents="{{ $orderClosed }} " />
        </div>
        <div class="row mt-2">
            <x-card cardTitles="Item Delivery" iconClass="bi bi-journal-x" percents="{{ $orderClosed }} " />
        </div>
        <br>
        <div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Order Result</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active rounded bg-white p-2 shadow-sm" id="nav-home" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <div id="warehouseCenterSparepart"></div>
                </div>
            </div>
        </div>
        <br>
        {{-- <div class="row">
            <x-card-list :salesData="$salesData" />
        </div> --}}

        <script>
            let percentageSales = {{ $booking }}
            let orderProgress = {{ $orderProgress }};
            let orderClosed = {{ $orderClosed }};
            let currentDate = new Date();
            let year = currentDate.getFullYear();
            let month = currentDate.getMonth() + 1;
            let date = currentDate.getDate();

            let formattedDate = year + '-' + (month < 10 ? '0' + month : month) + '-' + (date < 10 ? '0' + date :
                date);

            let myConfigProfit = {
                type: "bar",
                title: {
                    text: "Order Result",
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
                        values: [booking],
                        'background-color': "#FF8080",
                        text: "Booking",
                    },
                    {
                        // Plot 2 values, linear data
                        values: [orderProgress],
                        'background-color': '#8EACCD',
                        text: "On-Progress",
                    },
                    {
                        // Plot 2 values, linear data
                        values: [orderClosed],
                        'background-color': "#618264",
                        text: "Closed",
                    },
                ],
            };
        </script>
    @endsection
