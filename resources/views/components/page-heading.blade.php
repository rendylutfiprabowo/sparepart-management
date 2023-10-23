{{-- INI PAGE HEADING ATAU JUDUL DARI CONTENT YANG INGIN DITAMPILKAN --}}

{{-- <x-page-heading> TEXT </x-page-heading> --}}

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
    <h1 class="h2">{{ $slot }}</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group btn-group-sm me-2">
            <button type="button" class="btn btn-sm btn-outline-danger">Share</button>
            <button type="button" class="btn btn-sm btn-outline-danger">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-danger dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
    </div>
</div>
