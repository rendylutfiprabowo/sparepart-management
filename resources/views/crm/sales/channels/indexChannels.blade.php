@extends('template.salesCrm')
@section('title', 'Channel Trafindo')

@section('contents')
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white bg-danger rounded shadow-sm">
            <div class="lh-1 ms-2">
                <h5 class="text-white mb-0">TRAFINDO CHANNEL</h5>
            </div>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0 text-muted">Social Management</h6>
            <br>
            <div class="d-flex  align-items-center">
                <div>
                    <h5>
                        <i class="bi bi-instagram"></i>
                    </h5>
                </div>
                <div class="ms-2">
                    <a href="https://www.instagram.com/trafindo_transformers/?hl=en"
                        class="text-decoration-none fw-medium text-dark">
                        Instagram
                    </a>
                </div>

            </div>
            <div class="d-flex  align-items-center">
                <div>
                    <h5>
                        <i class="bi bi-youtube"></i>
                    </h5>
                </div>
                <div class="ms-2">
                    <a href="#" class="text-decoration-none fw-medium text-dark">
                        Youtube
                    </a>
                </div>
            </div>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0 text-muted">Other Management</h6>
            <div class="d-flex pt-2 align-items-center">
                <div>
                    <h5>
                        <i class="bi bi-file-earmark-bar-graph"></i>
                    </h5>
                </div>
                <div class="ms-2">
                    <a href="https://docs.google.com/forms/d/1SePzejtBUvjmbkCwIcszDcRQ1L-ssBDOPL-pD_rxbh0/edit"
                        class="link-danger text-decoration-none">
                        Survey
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
