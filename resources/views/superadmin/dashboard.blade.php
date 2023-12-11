@extends('template.superadmin')
@section('contents')
    <x-page-heading>
        DASHBOARD SUPERADMIN TSS
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
@section('contents2')
    <div>


        <div class="row mt-4 d-flex justify-content-between">
            <div class="col-lg-3">
                <div class="card merah text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <div>
                                <h4><b>DGA</b></h4>
                            </div>
                            <div>
                                <h3><i class="fa-solid fa-droplet"></i></h3>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h2><b>{{ $totalDGA }}</b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card merah text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <div>
                                <h4><b>Furan</b></h4>
                            </div>
                            <div>
                                <h3><i class="fa-solid fa-flask"></i></h3>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h2><b>{{ $totalFuran }}</b></h2>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="card merah text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <div>
                                <h4><b>OA</b></h4>
                            </div>
                            <div>
                                <h3><i class="fa-solid fa-flask-vial"></i></h3>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h2><b>{{ $totalOA }}</b></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card merah text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <div>
                                <h4><b>All Samples</b></h4>
                            </div>
                            <div>
                                <h3><i class="fa-solid fa-calculator"></i></h3>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h2><b> {{ $totalAllSamples }}</b></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('contents3')
    <x-page-heading>
        Dashboard
    </x-page-heading>

    <div class="row">
        <x-card cardTitles="Total Item" iconClass="bi bi-diagram-3-fill" percents="{{ $totalItem }}"
            subTitles="For more" href="/warehouse/stock" />
        <x-card cardTitles="Total Order" iconClass="bi bi-journal-text" percents="{{ $totalOrder }}"
            href="/warehouse/listspk" subTitles="For more" />
        <x-card cardTitles="Order Closed" iconClass="bi bi-journal-x" percents="{{ $orderClosedNotif }} " href="#"
            subTitles="For more" />
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
                labels: orderProgressData.map(entry => entry.month),
            },
            scaleY: {
                // Scale label with unicode character
                label: {
                    text: "Total",
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
@endsection --}}
