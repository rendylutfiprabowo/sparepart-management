@extends('template.salesCrm')
@section('title', 'Dashboard Sales')

@section('contents')
    <div>
        <x-page-heading>
            Dashboard
        </x-page-heading>
        <!-- Content Row Card -->
        <div class="row">
            <!-- Congratulations card -->
            <div class="col-md-12 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title">Congrats <span style="color: #FA7070">{{ Auth::user()->username }} </span> 🎉
                        </h3>
                        <hr>
                        <p class="pb-0">Best seller of the month</p>
                        <h4 class="mb-1" style="color: #6A9C89;">Rp. 420.950.955</h4>
                        <p class="mb-2 pb-1">78% of target 🚀</p>
                        <a href="#" class="btn btn-sm btn-danger">View Sales</a>
                    </div>
                    <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/icons/misc/triangle-light.png"
                        class="scaleX-n1-rtl position-absolute bottom-0 end-0" width="166" alt="triangle background"
                        data-app-light-img="icons/misc/triangle-light.png" data-app-dark-img="icons/misc/triangle-dark.png">
                    <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/illustrations/trophy.png"
                        class="scaleX-n1-rtl position-absolute bottom-0 end-0 me-4 mb-4 pb-2" width="83"
                        alt="view sales">
                </div>
            </div>
            <!--/ Congratulations card -->

            <!-- Transactions -->
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Transactions</h5>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-chevron-compact-down"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3"><span class="fw-medium">Total 48.5% growth</span> 😎 this month</p>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-primary rounded shadow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor"
                                                class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Sales</div>
                                        <h5 class="mb-0">245k</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-success rounded shadow">
                                            <i class="mdi mdi-account-outline mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Customers</div>
                                        <h5 class="mb-0">12.5k</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-warning rounded shadow">
                                            <i class="mdi mdi-cellphone-link mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Product</div>
                                        <h5 class="mb-0">1.54k</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-info rounded shadow">
                                            <i class="mdi mdi-currency-usd mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="small mb-1">Revenue</div>
                                        <h5 class="mb-0">$88k</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
        {{-- <div class="row">
            <x-cards judulcard="Project" angkaPersen="12" bulan="Juni" infoCard="Sales Profit Pada Penjualan Bulan Ini"
                tanggal="15 oct 2023" classIcon="bi bi-bounding-box" />
            <x-cards judulcard="Trafo Sales" angkaPersen="42" bulan="September"
                infoCard="Sales Profit Trafo Pada Penjualan Bulan Ini" tanggal="15 oct 2023" />
            <x-cards judulcard="Top Customer" angkaPersen="1" bulan="September" infoCard="PT. Makmur Jaya Abadi"
                tanggal="11 oct 2023" />
        </div> --}}
        <br>
        <x-page-heading>
            Statistik Sales Profit
        </x-page-heading>
        <div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Selling</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Visitor</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active shadow-sm bg-white rounded p-2" id="nav-home" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <div id="profitCharts"></div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div id="visitorCharts"></div>
                </div>
            </div>

        </div>


    @endsection
