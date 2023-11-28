@extends('template.teknisiSparepart')
@section('title', 'Dashboard Technician')

@section('contents')
    <div>
        <x-page-heading>
            Dashboard
        </x-page-heading>

        <div class="row">
            <x-card cardTitles="Total SPK" iconClass="bi bi-journal-text" percents="{{ $totalOrder }}" subTitles="Monthly"
                href="/warehouse/branch/listspk" />
            <x-card cardTitles="Closed SPK" iconClass="bi bi-journal-x" percents="{{ $orderClosedNotif }} " subTitles="Monthly"
                href="#" />
            <x-card cardTitles="Unfinish SPK " iconClass="bi bi-journal-x" percents="{{ $orderProgress }} "
                subTitles="Monthly" href="#" />
        </div>
        <br>
        <div>
            <nav>
                <div class="" id='myChart'><a class="zc-ref"></a></div>
                {{-- <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Working Graph</button>
                </div>
            </nav>
            <div class="zc-ref tab-pane fade show active rounded bg-white p-2 shadow-sm" id="nav-home" role="tabpanel"
                id="myChart" aria-labelledby="nav-home-tab">
            </div> --}}
        </div>
    </div>
    <br>
    </div>
    <script>
        // Ambil data dari variabel $order
        var orderData = {!! json_encode($order) !!};

        // Ambil label dan data dari $order untuk chart
        var labels = orderData.map(function(item) {
            return item.month;
        });

        var data = orderData.map(function(item) {
            return item.total;
        });

        var myConfig = {
            "type": "line",
            "title": {
                "text": "TECHNICIAN PERFORMANCE",
                "font-size": "24px",
                "adjust-layout": true
            },
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align": "center",
                "adjust-layout": true,
                "toggle-action": "remove",
                "item": {
                    "padding": 7,
                    "marginRight": 17,
                    "cursor": "hand"
                }
            },
            "scale-x": {
                "labels": labels, // Gunakan label dari $order
                "min-value": 0, // Sesuaikan dengan kebutuhan
                "shadow": 0,
                "minor-ticks": 0
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "Total SPK",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "series": [{
                "values": data, // Gunakan data dari $order
                "text": "SPK",
                "line-color": "#007790",
                "legend-item": {
                    "background-color": "#007790",
                    "borderRadius": 5,
                    "font-color": "white"
                },
                "legend-marker": {
                    "visible": false
                },
                "marker": {
                    "background-color": "#007790",
                    "border-width": 1,
                    "shadow": 0,
                    "border-color": "#69dbf1"
                },
                "highlight-marker": {
                    "size": 6,
                    "background-color": "#007790",
                }
            }]
        };

        zingchart.render({
            id: 'myChart',
            data: myConfig,
            height: '100%',
            width: '100%'
        });
    </script>


@endsection
