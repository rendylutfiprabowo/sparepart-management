@extends('template.new_layout')

@section('title', 'Dashboard')

@section('contents')
    <div>
        <!-- Content Row Card -->
        <div class="row">
            <x-cards titleCard="INI JUDUL" tanggal="12" bulan="Juni" infoCard="selengkapnya" jam="13:00" />

        </div>

        <div class="row">
            {{-- Card Penjualan Bulanan --}}
            <x-card-crm titles='Total Project (All)' prices='{{ count($dataProjects) }}'
                icons='fa-solid fa-2x fa-diagram-project' />
            {{-- Card Data Penjualan SpareParts --}}
            <x-card-crm titles='Penjualan (SpareParts)' prices='Rp. 511,000,000'
                icons='fa-solid text-primary fa-2x fa-wrench' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Oil Lab (Testing)' prices='Rp. 300,000,000'
                icons='fa-solid text-warning fa-2x fa-microscope' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Cancel(Project)' prices='Rp. 76,000,000' icons='fa-solid text-danger fa-2x fa-ban' />
        </div>

        <div class="row">
            {{-- Card Penjualan Bulanan --}}
            <x-card-crm titles='Total Project (All)' prices='{{ count($dataProjects) }}'
                icons='fa-solid fa-2x fa-diagram-project' />
            {{-- Card Data Penjualan SpareParts --}}
            <x-card-crm titles='Penjualan (SpareParts)' prices='Rp. 511,000,000'
                icons='fa-solid text-primary fa-2x fa-wrench' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Oil Lab (Testing)' prices='Rp. 300,000,000'
                icons='fa-solid text-warning fa-2x fa-microscope' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Cancel(Project)' prices='Rp. 76,000,000' icons='fa-solid text-danger fa-2x fa-ban' />
        </div>

        <div class="row">
            {{-- Card Penjualan Bulanan --}}
            <x-card-crm titles='Total Project (All)' prices='{{ count($dataProjects) }}'
                icons='fa-solid fa-2x fa-diagram-project' />
            {{-- Card Data Penjualan SpareParts --}}
            <x-card-crm titles='Penjualan (SpareParts)' prices='Rp. 511,000,000'
                icons='fa-solid text-primary fa-2x fa-wrench' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Oil Lab (Testing)' prices='Rp. 300,000,000'
                icons='fa-solid text-warning fa-2x fa-microscope' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Cancel(Project)' prices='Rp. 76,000,000' icons='fa-solid text-danger fa-2x fa-ban' />
        </div>

        <div class="row">
            {{-- Card Penjualan Bulanan --}}
            <x-card-crm titles='Total Project (All)' prices='{{ count($dataProjects) }}'
                icons='fa-solid fa-2x fa-diagram-project' />
            {{-- Card Data Penjualan SpareParts --}}
            <x-card-crm titles='Penjualan (SpareParts)' prices='Rp. 511,000,000'
                icons='fa-solid text-primary fa-2x fa-wrench' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Oil Lab (Testing)' prices='Rp. 300,000,000'
                icons='fa-solid text-warning fa-2x fa-microscope' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Cancel(Project)' prices='Rp. 76,000,000' icons='fa-solid text-danger fa-2x fa-ban' />
        </div>

        <div class="row">
            {{-- Card Penjualan Bulanan --}}
            <x-card-crm titles='Total Project (All)' prices='{{ count($dataProjects) }}'
                icons='fa-solid fa-2x fa-diagram-project' />
            {{-- Card Data Penjualan SpareParts --}}
            <x-card-crm titles='Penjualan (SpareParts)' prices='Rp. 511,000,000'
                icons='fa-solid text-primary fa-2x fa-wrench' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Oil Lab (Testing)' prices='Rp. 300,000,000'
                icons='fa-solid text-warning fa-2x fa-microscope' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Cancel(Project)' prices='Rp. 76,000,000' icons='fa-solid text-danger fa-2x fa-ban' />
        </div>

        <div class="row">
            {{-- Card Penjualan Bulanan --}}
            <x-card-crm titles='Total Project (All)' prices='{{ count($dataProjects) }}'
                icons='fa-solid fa-2x fa-diagram-project' />
            {{-- Card Data Penjualan SpareParts --}}
            <x-card-crm titles='Penjualan (SpareParts)' prices='Rp. 511,000,000'
                icons='fa-solid text-primary fa-2x fa-wrench' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Oil Lab (Testing)' prices='Rp. 300,000,000'
                icons='fa-solid text-warning fa-2x fa-microscope' />
            {{-- Card Data Oil Testing Lab --}}
            <x-card-crm titles='Cancel(Project)' prices='Rp. 76,000,000' icons='fa-solid text-danger fa-2x fa-ban' />
        </div>

    </div>
@endsection
