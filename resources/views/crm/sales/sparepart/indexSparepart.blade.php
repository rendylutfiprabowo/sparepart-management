@extends('template.new_layout')

@section('title', 'SpareParts Dashboard ')
@section('contents')
    <div class="container-fluid">
        <div>
            <x-page-heading>
                SpareParts Dashboard
            </x-page-heading>
            <!-- Content Row Card -->
            <div class="row">
                <x-cards judulcard="Memo" angkaPersen="12" bulan="Juni" infoCard="Memo Pada SpareParts" jam="19:00"
                    classIcon="bi bi-bounding-box" />

                <x-cards judulcard="Pengajuan Revisi" angkaPersen="42" bulan="September"
                    infoCard="Sales Profit Trafo Pada Penjualan Bulan Ini" jam="13:00" />
                <x-cards judulcard="DO" angkaPersen="92" bulan="September"
                    infoCard="Sales Profit Trafo Pada Penjualan Bulan Ini" jam="13:00" />
            </div>
        </div>
    </div>
@endsection
