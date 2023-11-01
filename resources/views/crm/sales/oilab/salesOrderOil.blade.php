@extends('template.new_layout')
@section('title', 'Oil Sales Orders')
@section('contents')
    <div>

        <!-- lOGO TRAFOINDO -->
        <!-- <div class="container d-flex justify-content-center align-items-center">
                                        <img src="/Asset/LogoTrafoindo.png" alt="Centered Image" style="width: 235px;">
                                    </div> -->

        <!-- Button Create -->
        <div class="d-flex justify-content-end mx-5">
            <a href="/sales/oil/salesorder/add"
                class="btn mb-0 btn-md shadow-bottom font-weight-bold rounded-pill text-putih align-items-center mt-5"
                style="background-image: url('/Asset/Card BG.png'); background-size: cover; background-repeat: no-repeat;">
                Create <i class="fa-regular fa-square-plus ms-1"></i>
            </a>
        </div>

        <!-- card -->
        <div class="row justify-content-center">
            @foreach ($salesorderoil as $solab)
                <div class="col-4 card card-oil m-5 w-40 align-items-center">
                    <div class="container d-flex justify-content-center align-items-center mt-3">
                        <img src="\Asset\Logo.svg" alt="Centered Image" style="max-width: 10%;">
                    </div>
                    <div class="text-putih mt-5" style="font-size: 1.5vw;">
                        <strong>{{ $solab->project->customer->nama_customer }}</strong>
                    </div>
                    <div class="text-putih mb-3" style="font-size: 1vw;">{{ $solab['project']['nama_project'] }}</div>
                    <div class="text-merah putih mb-3 mt-5 px-2 rounded" style="font-size: 1.1vw;">
                        <b>{{ $solab['no_so_solab'] }}</b>
                    </div>
                    <a href="/sales/oil/salesorder/{{$solab->project->id_project}}" class="btn btn-light mb-2">Detail</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
