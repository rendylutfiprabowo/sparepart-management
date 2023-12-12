@extends('template.managerSparepart')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Account Warehouse</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-start">
                        <div class="">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addwarehouse"><i class="fa-solid fa-plus"></i> Add Warehouse
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <x-searchbar url="/{{ request()->path() }}" value="{{ request()->input('search') }}" />
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered mt-3 table" width="100%" cellspacing="">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Warehouse</th>
                        <th scope="col">No.HP</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Action</th>
                    </tr>

                </thead>
                <tbody class="text-center">
                    @foreach ($warehouse as $no => $warehouses)
                        @php
                            $no = 1;
                        @endphp
                        <tr>
                            <td class="table-plus">{{ $no++ }}</td>
                            <td class="table-plus">{{ $warehouses->nama_warehouse }}</td>
                            <td class="table-plus">{{ $warehouses->phone_warehouse }}</td>
                            <td class="table-plus">{{ $warehouses->store->nama_store ?? '-' }}</td>
                            </td>
                            <td><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#"><i
                                        class="fa-regular fa-file fa-lg"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12 mt-3">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Account Technician</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-start">
                        <div class="">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addtechnician"><i class="fa-solid fa-plus"></i> Add Technician
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <x-searchbar url="/{{ request()->path() }}" value="{{ request()->input('search') }}" />
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered mt-3 table" width="100%" cellspacing="">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Technician Name</th>
                        <th scope="col">No. HP</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($technician as $no => $technicians)
                        @php
                            $no = 1;
                        @endphp
                        <tr>
                            <td class="table-plus">{{ $no++ }}</td>
                            <td class="table-plus">{{ $technicians->nama_technician }}</td>
                            <td class="table-plus">{{ $technicians->phone_technician }}</td>
                            </td>
                            <td><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#"><i
                                        class="fa-regular fa-file fa-lg"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Add Account Warehouse --}}
    <div class="modal fade" id="addwarehouse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header merah text-putih">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Warehouse Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registrationForm" onsubmit="return validateForm()" method="post"
                        action="/manager/addUser/warehouse">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <div class="alert-title">
                                        <h4>Whoops!</h4>
                                    </div>
                                    There are some problems with your input.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="form-group mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username"
                                    value="{{ old('username') }}" placeholder="Masukkan Username Anda">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="Masukkan Email Anda">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone_warehouse"
                                    value="{{ old('phone_warehouse') }}" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Store</label>
                                <select class="form-control" name="store" id="">
                                    <option disabled selected value="">Silakan Pilih Store</option>
                                    @foreach ($store as $stores)
                                        <option value="{{ $stores->id_store }}">{{ $stores->nama_store }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password1"
                                        placeholder="Masukkan Password Anda">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button"
                                            onclick="togglePasswordVisibility('password1')">
                                            <i class="fa-solid fa-eye" id="eye-icon1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password2" placeholder="Konfirmasi Password Anda">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button"
                                            onclick="togglePasswordVisibility('password2')">
                                            <i class="fa-solid fa-eye" id="eye-icon2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Remaining form fields -->

                            <!- </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Add Account Technician --}}
    <div class="modal fade" id="addtechnician" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header merah text-putih">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Technician Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registrationForm" onsubmit="return validateForm()" method="post"
                        action="/manager/addUser/technician">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <div class="alert-title">
                                        <h4>Whoops!</h4>
                                    </div>
                                    There are some problems with your input.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="form-group mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username"
                                    value="{{ old('username') }}" placeholder="Masukkan Username Anda">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="Masukkan Email Anda">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone_warehouse"
                                    value="{{ old('phone_technician') }}" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">NIP Technician</label>
                                <input type="number" class="form-control" name="nip_technician"
                                    value="{{ old('nip_technician') }}" placeholder="Enter NIP">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password1"
                                        placeholder="Masukkan Password Anda">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button"
                                            onclick="togglePasswordVisibility('password1')">
                                            <i class="fa-solid fa-eye" id="eye-icon1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password2" placeholder="Konfirmasi Password Anda">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button"
                                            onclick="togglePasswordVisibility('password2')">
                                            <i class="fa-solid fa-eye" id="eye-icon2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Remaining form fields -->

                            <!- </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add this script at the end of your Blade template -->
    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var eyeIcon = document.getElementById('eye-icon' + inputId.charAt(inputId.length - 1));

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }

        function validateForm() {
            var password = document.getElementById('password1').value;
            var confirmPassword = document.getElementById('password2').value;

            if (password !== confirmPassword) {
                alert("Password dan Konfirmasi Password harus sama.");
                return false;
            }

            return true;
        }
    </script>


@endsection
