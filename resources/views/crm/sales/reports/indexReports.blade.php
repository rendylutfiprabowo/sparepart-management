@extends('template.salesCrm')
@section('title', 'Reports Page')

@section('contents')

    <x-page-heading>
        Dashboard Reports
    </x-page-heading>
    <br>
    <div>
        <div class="row gap-2 p-2">
            <x-card-small href="/" cardTitle="Form Report" colorCard="#FF9B9B" />
            <x-card-small href="/" cardTitle="Inventory Report" colorCard="#8EACCD" />
            <x-card-small href="/" cardTitle="Information" colorCard="#AEC3AE" />
        </div>
    </div>



@endsection
