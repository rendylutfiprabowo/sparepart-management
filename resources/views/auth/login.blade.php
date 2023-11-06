<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="https://www.trafoindonesia.com/favicon.ico" type="image/x-icon">
    <title>Transformer Solution System - Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

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

        .login-block {
            background: #DE6262;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #9A4444, #9A4444);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #9A4444, #9A4444);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            float: left;
            width: 100%;
            padding: 50px 0;
        }

        .banner-sec {
            background-size: cover;
            min-height: 500px;
            border-radius: 0 10px 10px 0;
            padding: 0;
        }

        .container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 8px 12px 0px rgba(0, 0, 0, 0.1);
        }

        .carousel-inner {
            border-radius: 0 10px 10px 0;
        }

        .carousel-caption {
            text-align: left;
            left: 5%;
        }

        .login-sec {
            padding: 50px 30px;
            position: relative;
        }

        .login-sec .copy-text {
            position: absolute;
            width: 80%;
            bottom: 20px;
            font-size: 13px;
            text-align: center;
        }

        .login-sec .copy-text i {
            color: #FEB58A;
        }

        .login-sec .copy-text a {
            color: #E36262;
        }

        .login-sec h2 {
            margin-bottom: 30px;
            font-weight: 800;
            font-size: 30px;
        }

        .login-sec h2:after {
            content: " ";
            width: 100px;
            height: 5px;
            background: #D80032;
            display: block;
            margin-top: 20px;
            border-radius: 3px;
            margin-left: auto;
            margin-right: auto
        }

        .btn-login {
            background: #D80032;
            color: #fff;
            font-weight: 600;
        }

        .banner-text {
            position: absolute;
            bottom: 30px;
            padding-left: 20px;
            background: rgba(0, 0, 0, 0.3);
        }

        .banner-text h2 {
            color: #fff;
            font-weight: 600;
            z-index: 5;
        }

        .banner-text h2:after {
            content: " ";
            width: 80px;
            height: 5px;
            background: #FFF;
            display: block;
            margin-top: 20px;
            border-radius: 3px;
            z-index: 5;
        }

        .banner-text p {
            color: #fff;
            z-index: 5;
        }
    </style>
</head>

<body>

    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-5 login-sec">
                    <h2 class="text-center">Welcome To Trafindo Solution System</h2>
                    <div>
                        @if (session('error'))
                            <x-error_message text="Username/Email & Password Salah" />
                        @endif
                    </div>
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-muted">Username / email</label>
                            <input type="text" class="form-control" id="email_or_username" name="email_or_username">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-muted">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <br>
                        <div class="">
                            <button class="btn btn-danger btn-block">Login</button>
                        </div>
                    </form>
                    <div class="copy-text text-muted">Copyright @Trafindo 2023 </div>
                </div>
                <div class="col-md-7 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-md-block" src="/Asset/trafindo-bg.jpeg" alt="First slide" width="auto"
                                    height="500">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>MANUFACTURING</h2>
                                        <ul>
                                            <li>Integrated manufacturing</li>
                                            <li>Robust Engineering Infrastructure</li>
                                            <li>End-to-end quality control</li>
                                            <li>Customised product development & solutions</li>
                                            <li>Technical & life-cycle service</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-md-block" src="https://www.trafoindonesia.com/img/ctvtthumb1.jpg"
                                    alt="second slide" height="500" width="800">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>CT & VT PRODUCTS</h2>
                                        <ul>
                                            <li>Quality and Reliability for global M&Es</li>
                                            <li>CE Marking (Cert IAS/IDN/10144)</li>
                                            <li>Customization for local & export specifications</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-md-block"
                                    src="https://mikmargracindo.com/wp-content/uploads/2018/07/trafo-trafindo.jpg"
                                    alt="Third slide" height="500" width="800">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>TRANSFORMERS</h2>
                                        <ul>
                                            <li>Quality product design</li>
                                            <li>Efficient manufacturing and delivery</li>
                                            <li>Customised product development</li>
                                            <li>Wide range of technical support solutions</li>
                                            <li>V-Cycle documentation for government utility and multi-national
                                                industries</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>


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
