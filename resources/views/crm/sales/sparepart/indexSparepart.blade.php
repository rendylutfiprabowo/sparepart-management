@extends('template.salesCrm')

@section('title', 'SpareParts Dashboard ')
@section('contents')
    <div class="container-fluid">
        <x-page-heading>
            SpareParts Dashboard
        </x-page-heading>
        <div class="row">
            <x-card cardTitles="Memo" iconClass="bi-file-earmark-richtext" percents="159K" href="#" />
            <x-card cardTitles="Do" iconClass="bi-file-earmark-richtext" percents="12K" href="#" />
            <x-card cardTitles="Stock" iconClass="bi-box" percents="3k" href="#" />
        </div>
        <br />
        <div class="row">
            <div class="col">
                <div class="p-3 rounded bg-white shadow-sm">
                    <div id="stockCharts"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
