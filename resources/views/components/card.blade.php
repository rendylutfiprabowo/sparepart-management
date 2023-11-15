<div class="col-lg-4">
    <div class="card shadow-sm rounded">
        <div class="card-body d-flex justify-content-between">
            <h5 class="card-title">{{ $cardTitles }}</h5>
            <h1 class="text-secondary">
                <i class="bi {{ $iconClass }}" style="color: #A9A9A9">
                    {{ $slot }}
                </i>
            </h1>
        </div>
        <div class="card-body">
            <h3 class="text-danger">{{ $percents }}</h3>
            <small class="text-secondary">For This Month</small>
            <a href="#" class="float-end text-danger text-decoration-none">Detail
                <i class="bi bi-arrow-right-short"></i></a>
        </div>
    </div>
</div>
