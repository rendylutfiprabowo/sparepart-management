@extends('template.salesCrm')

@section('title', 'Profile Sales')

@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="link-danger text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sales Profile</li>
        </ol>
    </nav>
    <br>
    <br>
    <div class="wrap-sales-profile">
        <div class="container-profiles">
            <div class="row gap-3 p-3 justify-content-center">
                <div class="col-md-4 shadow-sm p-3 rounded bg-white">
                    <div class="flex-column">
                        <div>
                            <h5 class="badge text-bg-danger">ID {{ $salesProfile->id_sales }}</h5>
                        </div>
                        <div class="text-center">
                            <img class="img-fluid border border-2"
                                src="https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg?size=626&ext=jpg&ga=GA1.1.1775085579.1701300436&semt=sph"
                                alt="Avatar" style="border-radius: 50%;" width="160" height="140">
                        </div>
                        <br>
                        <div class="text-center">
                            <h5 class="badge text-bg-danger">{{ $salesProfile->nama_sales }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 bg-white shadow-sm rounded px-4 py-2">
                    <ul class="nav nav-underline" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link link-danger active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link link-danger" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">Progress</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link link-danger" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#contact-tab-pane" type="button" role="tab"
                                aria-controls="contact-tab-pane" aria-selected="false">Performance</button>
                        </li>
                    </ul>
                    <div class="tab-content p-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            <div class="row mb-3">
                                <label for="colFormLabelSm"
                                    class="col-sm-2 col-form-label col-form-label-sm text-secondary">NIP</label>
                                <div class="col-sm-10">
                                    <input type="email" value="{{ $salesProfile->nip_sales }}"
                                        class="form-control form-control-sm" id="colFormLabelSm" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabelSm"
                                    class="col-sm-2 col-form-label col-form-label-sm text-secondary">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="email" value="{{ $salesProfile->nama_sales }}"
                                        class="form-control form-control-sm" id="colFormLabelSm" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabelSm"
                                    class="col-sm-2 col-form-label col-form-label-sm text-secondary">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" value="-" class="form-control form-control-sm"
                                        id="colFormLabelSm" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabelSm"
                                    class="col-sm-2 col-form-label col-form-label-sm text-secondary">Phone</label>
                                <div class="col-sm-10">
                                    <input type="email" value="{{ $salesProfile->phone_sales }}"
                                        class="form-control form-control-sm" id="colFormLabelSm" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">Progress</div>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                            tabindex="0">History</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
