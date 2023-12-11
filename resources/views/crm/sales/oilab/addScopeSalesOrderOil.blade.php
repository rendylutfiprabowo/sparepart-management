@extends('template.salesCrm')
@section('title', 'Add Scope Oil')
@section('contents')
    <div>
        <!-- lOGO TRAFOINDO -->
        {{-- <div class="container d-flex justify-content-center align-items-center">
            <img src="/Asset/LogoTrafoindo.png" alt="Centered Image" style="width: 235px;">
        </div> --}}
        <div>
            <h4>Add Scope Oil Testing</h4>
        </div>
        <br>
        <!-- form salesorder -->
        <div>
            <div class="bg-white p-4 rounded-2 shadow-sm">
                <form method="post" action="/sales/oil/salesorder/{{ $project->id_project }}/{{ $history->id }}">
                    @csrf
                    <div>
                        <label for="serial_number" class="form-label text-secondary">Project</label>
                        <input type="text" class="form-control" id="serial_number" name="nama_project"
                            placeholder="Enter No Serial Number" readonly value="{{ $project->nama_project }}">
                        <input type="hidden" class="form-control" id="serial_number" name="id_project"
                            placeholder="Enter No Serial Number" readonly value="{{ $project->id_project }}">
                    </div>
                    <br>
                    <div>
                        <label for="exampleFormControlTextarea1" class="form-label text-secondary">Input Scope </label>
                    </div>
                    <div class="row mb-3 p-2">
                        <div class="col-md-12">
                            <div>
                                <b>Scope Name</b>
                            </div>

                            <!-- DGA -->
                            @foreach ($scopes as $scope)
                                @if (!$scope->detailed)
                                    <div class="form-check mt-3 ml-2">
                                        <input class="form-check-input border border-danger" type="checkbox"
                                            name="check[{{ $scope->nama_scope }}]" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $scope->nama_scope }}
                                        </label>
                                    </div>
                                @else
                                    <div>
                                        <button class="btn btn-white dropdown-toggle mt-2" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $scope->nama_scope }}"
                                            aria-expanded="false" aria-controls="collapse{{ $scope->nama_scope }}">
                                            <strong>{{ $scope->nama_scope }}</strong>
                                        </button>
                                    </div>
                                    <div class="collapse" id="collapse{{ $scope->nama_scope }}">
                                        @foreach (json_decode($scope->form->field_form, true) as $key => $field)
                                            <div class="form-check ml-4 mt-1">
                                                <input class="form-check-input border-danger" type="checkbox"
                                                    name="check[{{ $scope->nama_scope }}][{{ $key }}]"
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <strong>{{ $key }}</strong>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- button back -->
                    <div class="row">
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
