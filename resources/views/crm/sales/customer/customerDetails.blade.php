@extends('template.salesCrm')

@section('title', $dataCust->nama_customer)

@section('contents')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/sales/customer" class="text-decoration-none text-danger">Customer</a>
                </li>
                <li class="breadcrumb-item"><a href="#" class="text-muted text-decoration-none">Detail</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $dataCust->nama_customer }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm text-center p-4">
                    <img src="https://th.bing.com/th/id/R.19fa7497013a87bd77f7adb96beaf768?rik=144XvMigWWj2bw&riu=http%3a%2f%2fwww.pngall.com%2fwp-content%2fuploads%2f5%2fUser-Profile-PNG-High-Quality-Image.png&ehk=%2bat%2brmqQuJrWL609bAlrUPYgzj%2b%2f7L1ErXRTN6ZyxR0%3d&risl=&pid=ImgRaw&r=0"
                        class="bd-placeholder-img rounded-circle mt-4" width="140" height="140">
                    <h3>{{ $dataCust->nama_customer }}</h3>
                    <p class="text-secondary">ID : {{ $dataCust->id_customer }}</p>
                    <br>
                </div>
            </div>

            <div class="col-md-8 p-2">
                <div class="rounded bg-white shadow-sm p-3">
                    <form class="needs-validation" novalidate>
                        <div class="row overflow-y-auto">
                            <div class="col-12 mb-2">
                                <label for="fullName" class="form-label text-secondary">Full Name</label>
                                <input type="text" class="form-control form-control-sm" id="name_customer"
                                    value="{{ $dataCust->nama_customer }}" disabled>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="phone_customer" class="form-label text-secondary">Phone</label>
                                <input type="text" class="form-control form-control-sm" id="phone_customer"
                                    value="{{ $dataCust->phone_customer }}" disabled>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="email_customer" class="form-label text-secondary">Email</label>
                                <input type="text" class="form-control form-control-sm" id="email_customer"
                                    value="{{ $dataCust->email_customer }}" disabled>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="Jenis usaha" class="form-label text-secondary">Jenis Usaha</label>
                                <input type="text" class="form-control form-control-sm" id="jenis usaha"
                                    value="{{ $dataCust->jenisusaha_customer }}" disabled>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- CARD 1 --}}
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm p-3">
                    <h6 class="text-secondary  text-center ">Trafos</h6>
                    <br>
                    <div>
                        <label for="progress" class="text-secondary"> Owned Trafos :
                            {{ $dataCust->trafos->count() }}</label>
                        <div class="progress mt-2" role="progressbar" aria-label="Basic example" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar bg-danger" style="width: {{ $dataCust->trafos->count() }}"></div>
                        </div>
                        <br>
                        <button class="btn btn-sm text-danger" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseHistory" aria-expanded="false" aria-controls="collapseExample">
                            See more
                            <i class="bi bi-arrow-down-short"></i>
                        </button>
                        <div class="collapse" id="collapseHistory">
                            <div class="card card-body border-0">
                                <div class="row">
                                    @foreach ($dataCust->trafos as $trafo)
                                        <div class="col-4"><b>{{ $trafo->serial_number }}</b></div>
                                        <div class="col-4"><small>{{ $trafo->merk }}</small></div>
                                        <div class="col-4"><a
                                                href="/sales/customer/{{ $dataCust->id_customer }}/trafo/{{ $trafo->id_trafo }}"
                                                class="text-danger"><span class="badge text-bg-danger">Detail</span></a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD 2 --}}
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm p-3">
                    <h6 class="text-secondary text-center ">SpareParts Orders</h6>
                    <div>
                        <br>
                        <label for="progress" class="text-secondary">Bushing</label>
                        <div class="progress  mt-2" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar bg-danger" style="width: 25%"></div>
                        </div>
                        <br>
                        <button class="btn btn-sm text-danger" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSpareParts" aria-expanded="false" aria-controls="collapseExample">
                            See more
                            <i class="bi bi-arrow-down-short"></i>
                        </button>
                        <div class="collapse" id="collapseSpareParts">
                            <div class="card card-body border-0">
                                Kosong
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARD 3 --}}
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm p-3">
                    <h6 class="text-secondary text-center ">Oil Lab History</h6>
                    <div>
                        <br>
                        <label for="progress" class="text-secondary">Testing</label>
                        <div class="progress  mt-2" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar bg-danger" style="width: 85%"></div>
                        </div>
                        <br>
                        <button class="btn btn-sm text-danger" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOil" aria-expanded="false" aria-controls="collapseExample">
                            See more
                            <i class="bi bi-arrow-down-short"></i>
                        </button>
                        <div class="collapse" id="collapseOil">
                            <div class="card card-body border-0">
                                Kosong
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
