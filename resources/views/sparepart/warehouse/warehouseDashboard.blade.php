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
                    <div id="profitCharts"></div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div id="visitorCharts"></div>
                </div>
            </div>
        </div>
        <br>
        {{-- <div class="row">
            <x-card-list :salesData="$salesData" />
        </div> --}}
    @endsection
