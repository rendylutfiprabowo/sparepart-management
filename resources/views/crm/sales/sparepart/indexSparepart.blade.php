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
                <x-cards judulcard="Memo" angkaPersen="12" bulan="Juni" infoCard="Memo Pada SpareParts" tanggal="13 oct 2023"
                    classIcon="bi bi-bounding-box" />
                <x-cards judulcard="Pengajuan Revisi" angkaPersen="42" bulan="September"
                    infoCard="Sales Profit Trafo Pada Penjualan Bulan Ini" tanggal="13 oct 2023" />
                <x-cards judulcard="DO" angkaPersen="92" bulan="September"
                    infoCard="Sales Profit Trafo Pada Penjualan Bulan Ini" tanggal="13 oct 2023" />
            </div>
            <br />
            <x-page-heading>
                Statistik In Out SpareParts
            </x-page-heading>
        </div>
    </div>
@endsection
