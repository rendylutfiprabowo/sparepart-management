@extends('template.salesCrm')

@section('title', 'Profile Sales')

@section('contents')
    <h3>Sales Profile</h3>
    <div class="container">
        <div class="row gap-4">
            <div class="col-md-4 bg-white shadow-sm p-3 rounded">
                <div class="flex-column text-center">
                    <div>
                        <img class="img-fluid bg-danger"
                            src="https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg?size=626&ext=jpg&ga=GA1.1.1775085579.1701300436&semt=sph"
                            alt="Avatar" style="border-radius: 50%;" width="200" height="180">
                    </div>
                    <h5>{{ $salesProfile->nama_sales }}</h5>
                    <p>ID</p>
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
                        tabindex="0">Profile</div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">Progress</div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                        tabindex="0">History</div>
                </div>
            </div>
        </div>
    </div>
@endsection
