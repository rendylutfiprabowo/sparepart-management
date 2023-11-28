<div class="dropdown">
    <button type="button" class="btn  position-relative" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-bell"></i>
        @if (session('status'))
            <span class="position-absolute  translate-middle p-1 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
            </span>
        @endif

    </button>
    <ul class="dropdown-menu shadow dropdown-menu-lg-end">
        <li>
            <h6 class="dropdown-header">Notification</h6>
        </li>
        <li>
            @if (session('status'))
                <p class="dropdown-item">
                    {{ session('status') }}
                </p>
            @else
                <p class="dropdown-item text-secondary">
                    Nothing !
                </p>
            @endif
    </ul>

</div>
