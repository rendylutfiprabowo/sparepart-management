<div class="col-lg-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Sales Team</h5>
                <small><a href="#" class="text-decoration-none text-danger">Show more</a></small>
            </div>
            <br>
            @foreach ($salesData as $sales)
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <img src="https://media.istockphoto.com/vectors/user-vector-id1138452882?k=20&m=1138452882&s=170667a&w=0&h=VPcCtAjIcXjS88hse2EL6bD_YLOYzh2V8fDdNCfOiB4="
                            class="img-circle" alt="avatar-profile" width="24" height="24">
                        <a href="#"
                            class="ms-2 mb-2 text-decoration-none text-dark fw-medium">{{ $sales->nama_sales }}</a>
                    </div>
                    <div>
                        <small class="text-secondary">{{ $sales->nip_sales }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
