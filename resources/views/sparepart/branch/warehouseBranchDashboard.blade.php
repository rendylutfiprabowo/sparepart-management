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

            // Ekstrak data untuk setiap kategori (total)
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
                    // Set scale label
                    label: {
                        text: "Statistics",
                    },
                    // Convert text on scale indices
                    labels: bookingData.map(entry => entry.month),
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
                        values: bookingTotal,
                        'background-color': "#FF8080",
                        text: "Booking",
                    },
                    {
                        // Plot 2 values, linear data
                        values: orderProgressTotal,
                        'background-color': '#8EACCD',
                        text: "On-Progress",
                    },
                    {
                        // Plot 2 values, linear data
                        values: orderClosedTotal,
                        'background-color': "#618264",
                        text: "Closed",
                    },
                ],
            };

            zingchart.render({
                id: "warehouseCenterChart",
                data: myConfigWarehouse,
            });
        </script>
    @endsection
