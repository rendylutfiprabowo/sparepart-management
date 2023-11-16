@extends('template.salesCrm')
@section('title', 'Dashboard Sales')

@section('contents')
    <div>
        <x-page-heading>
            Dashboard
        </x-page-heading>

        <div class="row">
            @php
                // Customer Percentage
                $numberPercent = 1000;
                $percentageCustomers = ($customersTotal / $numberPercent) * 100;
                $percentageProjects = ($projectsTotal / $numberPercent) * 100;
            @endphp
            <x-card cardTitles="Sales Profit" iconClass="bi-bar-chart-line" percents="99%" />
            <x-card cardTitles="Customers" iconClass="bi-people" percents="{{ $percentageCustomers }} %" />
            <x-card cardTitles="Projects" iconClass="bi-person-up" percents="{{ $percentageProjects }} %" />
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
                <div class="tab-pane fade show active shadow-sm bg-white rounded p-2" id="nav-home" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <div id="profitCharts"></div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div id="visitorCharts"></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <x-card-list />
        </div>


    @endsection
