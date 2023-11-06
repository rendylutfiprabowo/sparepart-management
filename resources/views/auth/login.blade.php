<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="https://www.trafoindonesia.com/favicon.ico" type="image/x-icon">
    <title>Transformer Solution System - Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* body {
            background-image: url('/Asset/trafindo-bg.jpeg');
            background-size: cover;
            height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(1px);
            -webkit-backdrop-filter: blur(px);
        } */

        .formContainer {
            padding: 24px;
            width: 100%;
            max-width: 340px;
            margin: 0 auto
        }

        .formContainer input {
            height: 48px;
            padding-left: 48px;
            background: rgba(63, 63, 63, 0.4);
            border: 0;
            color: #fff;
        }

        .formContainer input:focus {
            background: rgba(63, 63, 63, 0.4);
            color: #fff;
        }

        .inputLogo {
            position: absolute;
            margin-top: 12px;
            margin-left: 18px;
            color: #fff
        }

        #mainBgn {
            background: url('/Asset/trafindo-bg.jpeg') no-repeat;
            background-size: cover;
            background-position: center bottom
        }


        ::placeholder {
            color: whitesmoke !important;
        }

        .text-shadows {
            text-shadow: 2px 2px 5px gray;
        }

        @media screen and (max-width: 743px) {
            h4 {
                font-size: 34px;
            }

            .formContainer {
                padding: 34px;
                width: 100%;
                max-width: 420px;
                margin: 0 auto
            }
        }
    </style>
</head>

<body>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-6 col-md-9">
                <div class="card o-hidden my-5 border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-4">
                                    <div class="text-center mb-3">
                                        <h1 class="text-gray-800"><span class="text-danger">Trafoindo</span>
                                            Solution System
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
    </div> --}}

    <div class="vh-100 w-100 d-flex align-items-center" id="mainBgn">
        <div class="formContainer">
            <div>
                @if (session('error'))
                    <x-error_message text="Username/Email & Password Salah" />
                @endif
            </div>
            <div class="text-center mb-4 ">
                <h4 class="text-light text-shadows fw-bold">Welcome To Trafindo Solution System</h4>
            </div>
            <form method="POST" class="user" action="{{ route('login') }}">
                @csrf
                <div>
                    <span class="inputLogo"><i class="bi bi-person"></i></span><input type="text"
                        class="form-control rounded shadow-sm" id="email_or_username" name="email_or_username"
                        placeholder="username/email">
                </div>
                <div class="mt-2">
                    <span class="inputLogo"><i class="bi bi-lock"></i></span><input type="password"
                        class="form-control rounded shadow-sm" id="password" name="password" placeholder="password">
                </div>
                <div class="mt-4">
                    <button class="btn btn-danger rounded w-100 fw-bold shadow-sm" type="submit">Login</button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script>
        // Erro Login Message
        const errorMessage = document.querySelector('.alert-danger');
        if (errorMessage) {

            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 5000);
        }
    </script>

</body>

</html>
