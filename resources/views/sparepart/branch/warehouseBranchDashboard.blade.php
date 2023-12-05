@extends('template.warehouseBranchSparepart')
@section('title', 'Dashboard Warehouse')

@section('contents')
    <div>
        <x-page-heading>
            Dashboard
        </x-page-heading>

        <div class="row">
            <x-card cardTitles="Total Item" iconClass="bi bi-diagram-3-fill" percents="{{ $totalItem }}" subTitles="For more"
                href="/warehouse/branch/stock" />
            <x-card cardTitles="Total Order" iconClass="bi bi-journal-text" percents="{{ $totalOrder }}" subTitles="For more"
                href="/warehouse/branch/listspk" />
            <x-card cardTitles="Order Closed" iconClass="bi bi-journal-x" percents="{{ $orderClosedNotif }} "
                subTitles="For more" href="#" />
        </div>
        <div class="row mt-2">
            <x-card cardTitles="Item Delivery" iconClass="bi bi-journal-x" percents="{{ $orderProgressNotif }} "
                subTitles="For more" href="" />
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
                    <div id="warehouseCenterChart"></div>
                </div>
            </div>
        </div>
        <br>

        <script>
            // Mengonversi data PHP menjadi format JSON dan menyimpannya di dalam variabel JavaScript
            let orderClosedData = @json($orderClosed);
            let orderProgressData = @json($orderProgress);
            let bookingData = @json($booking);

            // Combine unique months from all datasets
            let allMonths = [...new Set([
                ...orderClosedData.map(entry => entry.month),
                ...orderProgressData.map(entry => entry.month),
                ...bookingData.map(entry => entry.month),
            ])];

            // Extract data for each category (total)
            let orderClosedTotal = orderClosedData.map(entry => entry.total);
            let orderProgressTotal = orderProgressData.map(entry => entry.total);
            let bookingTotal = bookingData.map(entry => entry.total);

            // Konfigurasi ZingChart
            let myConfigWarehouse = {
                type: "bar",
                title: {
                    text: "Order Result",
                },
                legend: {
                    draggable: true,
                },
                scaleX: {
                    label: {
                        text: "Statistics",
                    },
                    labels: allMonths, // Use the combined unique months
                },
                scaleY: {
                    label: {
                        text: "Target",
                    },
                },
                plot: {
                    animation: {
                        effect: "ANIMATION_EXPAND_BOTTOM",
                        method: "ANIMATION_STRONG_EASE_OUT",
                        sequence: "ANIMATION_BY_NODE",
                        speed: 275,
                    },
                },
                series: [{
                    values: bookingTotal,
                    'background-color': "#FF8080",
                    text: "Booking",
                }, {
                    values: orderProgressTotal,
                    'background-color': '#8EACCD',
                    text: "On-Progress",
                }, {
                    values: orderClosedTotal,
                    'background-color': "#618264",
                    text: "Closed",
                }],
            };

            zingchart.render({
                id: "warehouseCenterChart",
                data: myConfigWarehouse,
            });
        </script>
    @endsection
