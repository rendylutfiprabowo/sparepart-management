@extends('template.laboil')
@section('content')
    <p style="font-size: 23px; color: black;">Form Furan</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
                <div class="card-body shadow">
                    <h6 class="text-start font-weight-bold " style="color: black;">Form dibawah ini untuk menginput hasil
                        pengetesan SAMPLE OIL! </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card p-4 rounded-4" style="border: 2px solid red;">
                <!--Button download -->
                {{-- <div class="d-flex justify-content-end">
                    <a href="\Asset\TRANSFORMERS.pdf"
                        class="btn btn-md shadow-bottom font-weight-bold rounded-pill text-putih align-items-center"
                        style="background-image: url('/Asset/Card BG.png'); background-size: cover; background-repeat: no-repeat;">
                        Download <i class="fa-solid fa-download"></i>
                    </a>
                </div> --}}
                <form action="/orderlist/{{ $sample->history->project->solab->no_so_solab }}/{{ $sample->id_sample }}"
                    method="post">
                    @csrf
                    {{-- @dd($form) --}}
                    @foreach ($form as $key => $field)
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"> <strong>{{ $key }}
                                </strong></label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Enter Result {{ $key }}" name="{{$key}}"
                                @if ($field == -1) readonly value="Tidak Diisi" @endif>
                        </div>
                    @endforeach
                    <div class="row mb-5">
                        <div class="d-flex col justify-content-start">
                            <a href="/orderlist"
                                class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                                Back
                            </a>
                        </div>
                        <div class="d-flex col justify-content-end">
                            <button type="submit"
                                class="btn mb-0 btn-success btn-md shadow-bottom font-weight-bold  align-items-center mt-5">submit
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
