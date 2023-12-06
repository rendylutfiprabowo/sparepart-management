@extends('template.salesCrm')

@section('title', 'Sales Customer Details')

@section('contents')
    <div>
        <div class="d-flex align-items-center">
            <div class="">
                <a href="/sales/customer" class="btn btn-danger btn-sm"><i class="bi bi-arrow-left"></i></a>
            </div>
            <div class="ms-3">
                <h3 class="text-muted">Detail Customer</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm text-center p-2">
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
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm p-3">
                    <h6 class="text-danger">Trafos</h6>
                    <div class="mt-3">
                        <label for="progress" class="text-secondary"> Owned Trafos : {{$dataCust->trafos->count()}}</label>
                        <div class="progress mt-2" role="progressbar" aria-label="Basic example" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar bg-danger" style="width: 50%"></div>
                        </div>
                        <br>
                        <button class="btn btn-sm text-secondary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseHistory" aria-expanded="false" aria-controls="collapseExample">
                            See more
                            <i class="bi bi-arrow-down-short"></i>
                        </button>
                        <div class="collapse" id="collapseHistory">
                            <div class="card card-body border-0">
                                <div class="row">
                                    @foreach ($dataCust->trafos as $trafo)
                                    <div class="col-4"><b>{{$trafo->serial_number}}</b></div>
                                    <div class="col-4">{{$trafo->merk}}</div>
                                    <div class="col-4"><a href="/sales/customer/{{$dataCust->id_customer}}/trafo/{{$trafo->id_trafo}}" class="btn btn-primary">Detail</a></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm p-3">
                    <h6 class="text-danger">SpareParts Orders</h6>
                    <div class="mt-3">
                        <label for="progress" class="text-secondary">Bushing</label>
                        <div class="progress  mt-2" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar bg-danger" style="width: 25%"></div>
                        </div>
                        <br>
                        <button class="btn btn-sm text-secondary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSpareParts" aria-expanded="false" aria-controls="collapseExample">
                            See more
                            <i class="bi bi-arrow-down-short"></i>
                        </button>
                        <div class="collapse" id="collapseSpareParts">
                            <div class="card card-body border-0">
                                Some placeholder content for the collapse component. This panel is hidden by default but
                                revealed when the user activates the relevant trigger.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="bg-white rounded shadow-sm p-3">
                    <h6 class="text-danger">Oil Lab History</h6>
                    <div class="mt-3">
                        <label for="progress" class="text-secondary">Testing</label>
                        <div class="progress  mt-2" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar bg-danger" style="width: 85%"></div>
                        </div>
                        <br>
                        <button class="btn btn-sm text-secondary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOil" aria-expanded="false" aria-controls="collapseExample">
                            See more
                            <i class="bi bi-arrow-down-short"></i>
                        </button>
                        <div class="collapse" id="collapseOil">
                            <div class="card card-body border-0">
                                Some placeholder content for the collapse component. This panel is hidden by default but
                                revealed when the user activates the relevant trigger.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
