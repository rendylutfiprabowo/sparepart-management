<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="https://www.trafoindonesia.com/favicon.ico" type="image/x-icon">
    <title>TSS - Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300;6..12,400;6..12,600;6..12,700;6..12,800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Nunito Sans", sans-serif;
        }

        .formContainer {
            padding: 24px;
            width: 100%;
            max-width: 340px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3));
            border-radius: 5px;
        }

        .formContainer input {
            height: 48px;
            padding-left: 48px;
            background: white;
            border: 0;
            color: black;
        }

        /* .formContainer input:focus {
            background: rgba(63, 63, 63, 0.4);

        } */

        .inputLogo {
            position: absolute;
            margin-top: 12px;
            margin-left: 18px;

        }

        #mainBgn {
            background-size: cover;
            background-position: center bottom;
            position: relative;
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("/Asset/trafindo-bg.jpeg");
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
    <div class="vh-100 w-100 d-flex align-items-center" id="mainBgn">

    </div>
    <div class="formContainer">
        <div>
            @if (session('error'))
                <x-error_message text="Username/Email & Password Salah" />
            @endif
        </div>
        <div class="text-center ">
            <h3 class="text-white fw-bold">Welcome To Trafindo Solution System</h3>
        </div>
        <br>
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
                <button class="btn btn-danger rounded w-100 shadow-sm fw-bold" type="submit">Login</button>
            </div>

        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
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
