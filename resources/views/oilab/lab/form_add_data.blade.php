@extends('template.laboil')
@section('content')
    <div>
        <!-- lOGO TRAFOINDO -->
        <div class="container d-flex justify-content-center align-items-center">
            <img src="/Asset/LogoTrafoindo.png" alt="Centered Image" style="width: 235px;">
        </div>

        <!-- form salesorder -->
        <div>
            <div>
                <form method="post" action="/orderlist/{{ $salesorderoil->no_so_solab }}/{{$id_history}}/add">
                    @csrf
                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="serial_number" class="form-label">Serial Number</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number"
                                placeholder="Enter No Serial Number">
                        </div>
                        <div class="mb-3">
                            <label for="serial_number" class="form-label">Project</label>
                            <input type="text" class="form-control" id="serial_number" name="nama_project"
                                placeholder="Enter No Serial Number" value="{{ $salesorderoil->project->nama_project }}"
                                disabled>
                            <input type="hidden" class="form-control" id="serial_number" name="id_project"
                                placeholder="Enter No Serial Number" value="{{ $salesorderoil->project->id_project }}">
                        </div>
                        <div class="mb-3">
                            <label for="kva" class="form-label">KVA</label>
                            <input type="text" class="form-control" id="kva" name="kva"
                                placeholder="Enter No KVA">
                        </div>
                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <input class="form-control" list="datalistOptions" id="merk" name="merk"
                                placeholder="Enter Merk">
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Trafo Year</label>
                            <input type="text" class="form-control" id="year" name="year"
                                placeholder="Enter Trafo Year">
                        </div>
                        <div class="mb-3">
                            <label for="voltage" class="form-label">Voltage</label>
                            <input type="text" class="form-control" id="voltage" name="voltage"
                                placeholder="Enter Voltage">
                        </div>
                        <div class="mb-3">
                            <label for="vg" class="form-label">VG</label>
                            <input type="text" class="form-control" id="vg" name="vg" placeholder="Enter VG">
                        </div>
                        <div class="mb-3">
                            <label for="tag_number" class="form-label">Tag Number</label>
                            <input type="number" class="form-control" list="datatagnumber" id="tag_number" name="tag_number"
                                placeholder="Enter Tag Number">
                        </div>
                        <div class="mb-3">
                            <label for="temp_oil" class="form-label">Temp. Oil (°C)</label>
                            <input type="number" class="form-control" id="temperatur_oil" name="temperatur_oil"
                                placeholder="Enter Temperatur Oil">
                        </div>
                        <div class="mb-3">
                            <label for="volume_oil" class="form-label">Volume Oil (Liter)</label>
                            <input type="number" class="form-control" id="volume_oil" name="volume_oil"
                                placeholder="Enter Volume Oil">
                        </div>
                        <div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Sampling</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_sampling">
                            </div>

                        </div>
                        <div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Kedatangan</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_kedatangan">
                            </div>

                        </div>
                        <div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Pengujian</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_pengujian">
                            </div>

                        </div>
                        <div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Pembuatan Laporan</label>
                                <input type="date" class="form-control" id="tanggal"
                                    name="tanggal_pembuatanlaporan">
                            </div>

                        </div>
                        <div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Pengiriman Laporan</label>
                                <input type="date" class="form-control" id="tanggal"
                                    name="tanggal_pengirimanlaporan">
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
                                    class="btn mb-0 merah btn-md shadow-bottom font-weight-bold text-putih align-items-center mt-5">
                                    Submit
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection
