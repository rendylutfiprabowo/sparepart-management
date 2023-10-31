<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="https://www.trafoindonesia.com/favicon.ico" type="image/x-icon">
    <title>Transformer Solution System - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('/Asset/powerindo.jpg');
            background-size: cover;
            height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-6 col-md-9">
                <div class="card o-hidden my-5 border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="font-weight-bold mb-4 text-gray-800">Welcome To <span
                                                class="text-danger">Trafoindo</span> Solution System
                                        </h1>
                                    </div>
                                    <div>
                                        @if (session('error'))
                                            <x-error_message text="Username/Email & Password Salah" />
                                        @endif
                                    </div>
                                    <form method="post" class="user" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="email_or_username" aria-describedby="emailHelp"
                                                name="email_or_username"
                                                placeholder="Masukkan Email atau Username anda">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button id="button-submit" type="submit"
                                            class="btn btn-danger btn-user btn-block font-weight-bold">
                                            Login
                                        </button>

                                        <hr />
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="#">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============ ALL --}}
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>


    <script>
        // Erro Login Message
        const errorMessage = document.querySelector('.alert-danger');
        if (errorMessage) {

            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 8000);
        }
    </script>

</body>

</html>
