@extends('template.salesCrm')
@section('title', 'Add Scope Oil')
@section('contents')
    <div>
        <!-- lOGO TRAFOINDO -->
        <div class="container d-flex justify-content-center align-items-center">
            <img src="/Asset/LogoTrafoindo.png" alt="Centered Image" style="width: 235px;">
        </div>
        <!-- form salesorder -->
        <div>
            <!-- form salesorder -->
            <div>
                <div>
                    <form method="post" action="/sales/oil/salesorder/{{ $project->id_project }}/{{ $history->id }}">
                        @csrf
                        <div class="container-fluid">
                            <div class="mb-3">
                                <label for="serial_number" class="form-label">Project</label>
                                <input type="text" class="form-control" id="serial_number" name="nama_project"
                                    placeholder="Enter No Serial Number" readonly value="{{ $project->nama_project }}">
                                <input type="hidden" class="form-control" id="serial_number" name="id_project"
                                    placeholder="Enter No Serial Number" readonly value="{{ $project->id_project }}">
                            </div>
                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Input Scope</label>
                            </div>
                            <div class="row mb-3 border p-3" style="background-color: white;">
                                <div class="col-md-12">
                                    <div>
                                        <h6 class="mt-2"><strong>Scope Name</strong></h6>
                                    </div>

                                    <!-- DGA -->
                                    @foreach ($scopes as $scope)
                                        @if (!$scope->detailed)
                                            <div class="form-check mt-3 ml-2">
                                                <input class="form-check-input" type="checkbox"
                                                    name="check[{{ $scope->nama_scope }}]" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <strong>{{ $scope->nama_scope }}</strong>
                                                </label>
                                            </div>
                                        @else
                                            <div>
                                                <button class="btn btn-white dropdown-toggle mt-2" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse{{$scope->nama_scope}}"
                                                    aria-expanded="false" aria-controls="collapse{{$scope->nama_scope}}">
                                                    <strong>{{ $scope->nama_scope }}</strong>
                                                </button>
                                            </div>
                                            <div class="collapse" id="collapse{{$scope->nama_scope}}">
                                                @foreach (json_decode($scope->form->field_form,true) as $key => $field)
                                                <div class="form-check ml-2 mt-1">
                                                    <input class="form-check-input" type="checkbox" name="check[{{$scope->nama_scope}}][{{$key}}]"
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        <strong>{{$key}}</strong>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- button back -->
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
                            </div>
                    </form>
                </div>
            </div>

        </div>
    @endsection
