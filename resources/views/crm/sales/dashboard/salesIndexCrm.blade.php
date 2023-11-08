@extends('template.new_layout')

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

        <div class="row gy-4">
            <!-- Total Profit Chart & Last month balance -->
            <div class="col-xl-8">
                <div class="card h-100">
                    <div class="row">
                        <div class="col-md-7 pe-md-0">
                            <div class="card-header">
                                <h5 class="mb-0">Total Profit</h5>
                            </div>
                            <div class="card-body">
                                <div id="totalProfitChart"></div>
                            </div>
                        </div>
                        <div class="col-md-5 border-start ps-md-0">
                            <hr class="d-block d-md-none my-0">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-1 display-6">Rp. 987k</h5>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="totalProfit" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalProfit">
                                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-body mb-0">Last month balance Rp.234k</p>
                            </div>
                            <div class="card-body pt-3">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-label-success rounded">
                                            <i class="mdi mdi-trending-up mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3 d-flex flex-column">
                                        <h6 class="mb-1">$48,568.20</h6>
                                        <small>Total Profit</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-label-primary rounded">
                                            <i class="mdi mdi-account-outline mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3 d-flex flex-column">
                                        <h6 class="mb-1">$38,453.25</h6>
                                        <small>Total Income</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-label-secondary rounded">
                                            <i class="mdi mdi-cellphone-link mdi-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3 d-flex flex-column">
                                        <h6 class="mb-1">$2,453.45</h6>
                                        <small>Total Expense</small>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary w-100" type="button">View Report</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Visitors Chart -->
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-header pb-1">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0">Total Visitors</h5>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="totalVisitorsDropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalVisitorsDropdown">
                                    <a class="dropdown-item" href="#">Refresh</a>
                                    <a class="dropdown-item" href="#">Share</a>
                                    <a class="dropdown-item" href="#">Update</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="totalVisitorsChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
