@extends('template.new_layout')
@section('title', 'Channel Trafindo')

@section('contents')
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white bg-danger rounded shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="38" fill="currentColor"
                class="bi bi-microsoft-teams" viewBox="0 0 16 16">
                <path
                    d="M9.186 4.797a2.42 2.42 0 1 0-2.86-2.448h1.178c.929 0 1.682.753 1.682 1.682v.766Zm-4.295 7.738h2.613c.929 0 1.682-.753 1.682-1.682V5.58h2.783a.7.7 0 0 1 .682.716v4.294a4.197 4.197 0 0 1-4.093 4.293c-1.618-.04-3-.99-3.667-2.35Zm10.737-9.372a1.674 1.674 0 1 1-3.349 0 1.674 1.674 0 0 1 3.349 0Zm-2.238 9.488c-.04 0-.08 0-.12-.002a5.19 5.19 0 0 0 .381-2.07V6.306a1.692 1.692 0 0 0-.15-.725h1.792c.39 0 .707.317.707.707v3.765a2.598 2.598 0 0 1-2.598 2.598h-.013Z" />
                <path
                    d="M.682 3.349h6.822c.377 0 .682.305.682.682v6.822a.682.682 0 0 1-.682.682H.682A.682.682 0 0 1 0 10.853V4.03c0-.377.305-.682.682-.682Zm5.206 2.596v-.72h-3.59v.72h1.357V9.66h.87V5.945h1.363Z" />
            </svg>
            <div class="lh-1 ms-2">
                <h1 class="h6 mb-0 text-white lh-2">TRAFINDO CHANNEL</h1>
                <small>Customer Relation Management</small>
            </div>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0 text-muted">Social Management</h6>
            <div class="d-flex pt-2 align-items-center">
                <div>
                    <h5>
                        <i class="bi bi-whatsapp"></i>
                    </h5>
                </div>
                <div class="ms-2">
                    <a href="#" class="">
                        <strong class="">WhatsApp API Business</strong>
                    </a>
                </div>
            </div>
            <div class="d-flex pt-2 align-items-center">
                <div>
                    <h5>
                        <i class="bi bi-instagram"></i>
                    </h5>
                </div>
                <div class="ms-2">
                    <a href="#" class="">
                        <strong class="d-block text-gray-dark">Instagram</strong>
                    </a>
                </div>

            </div>
            <div class="d-flex pt-2 align-items-center">
                <div>
                    <h5>
                        <i class="bi bi-youtube"></i>
                    </h5>
                </div>
                <div class="ms-2">
                    <a href="#" class="">
                        <strong class="d-block text-gray-dark">Youtube</strong>
                    </a>
                </div>
            </div>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0 text-muted">Other Management</h6>
            <div class="d-flex pt-2 align-items-center">
                <div>
                    <h5>
                        <i class="bi bi-chat-left-text"></i>
                    </h5>
                </div>
                <div class="ms-2">
                    <a href="#" class="">
                        <strong class="">Feedback</strong>
                    </a>
                </div>
            </div>
            <div class="d-flex pt-2 align-items-center">
                <div>
                    <h5>
                        <i class="bi bi-file-earmark-bar-graph"></i>
                    </h5>
                </div>
                <div class="ms-2">
                    <a href="#" class="">
                        <strong class="d-block text-gray-dark">Survey</strong>
                    </a>
                </div>

            </div>
            <div class="d-flex pt-2 align-items-center">
                <div>
                    <h5>
                        <i class="bi bi-exclamation-circle"></i>
                    </h5>
                </div>
                <div class="ms-2">
                    <a href="#" class="">
                        <strong class="d-block text-gray-dark">About</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
