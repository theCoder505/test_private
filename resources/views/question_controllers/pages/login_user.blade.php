<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- link styleshites --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">


    <link rel="stylesheet" href="{{ asset('admin/assets/css/adminlogin.css') }}">
    <style>
        body {
            background: #e9e9e9;
        }

        .login-box {
            margin-top: 75px;
            height: auto;
            background: #ffffff;
            text-align: center;
            box-shadow: 0px 0px 20px 5px #c2c2c2;
            border-radius: 15px;
            padding-top: 25px;
            padding-bottom: 25px;
        }

        .login-title {
            margin-top: 15px;
            text-align: center;
            font-size: 30px;
            letter-spacing: 2px;
            margin-top: 15px;
            font-weight: bold;
            color: #000000;
        }

        input[type=email] {
            background-color: transparent;
            border: none;
            border-bottom: 2px solid black;
            border-top: 0px;
            border-radius: 0px;
            font-weight: bold;
            outline: 0;
            margin-bottom: 20px;
            padding-left: 0px;
            color: #000000;
        }

        input:focus{
            background: transparent!important;
            color: #000000!important;
        }

        input[type=password] {
            background-color: transparent;
            border: none;
            border-bottom: 2px solid black;
            border-top: 0px;
            border-radius: 0px;
            font-weight: bold;
            outline: 0;
            margin-bottom: 20px;
            padding-left: 0px;
            color: #000000;
        }

        .btn-outline-primary {
            border-color: #000000;
            color: #ffffff;
            border-radius: 0px;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            background: black;
            padding: 15px 50px;
        }
    </style>
    <title>Login To controller Panel</title>
</head>

<body>





    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    LOGIN TO <br>
                    CONTROLLER PANEL
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">

                        @php
                            $pastMail = '';
                            $pastPwd = '';
                        @endphp

                        <form method="POST" action="/sign-in-question-controler">
                            @csrf

                            @if (session()->has('alertMsg'))
                                <div class="alert alert-danger text-center font-weight-bold alert-dismissible fade show"
                                    role="alert">
                                    {{ session()->get('alertMsg') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                @php
                                    $pastMail = session()->get('typedMail');
                                    $pastPwd = session()->get('typedPass');
                                @endphp
                            @endif


                            <div class="form-group">
                                <label class="form-control-label">CONTROLLER EMAIL</label>
                                <input type="email" class="form-control" name="user_email" required
                                    value="{{ $pastMail }}">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">CONTROLLER PASSWORD</label>
                                <input type="password" class="form-control" name="user_password" id="adminpassword"
                                    required value="{{ $pastPwd }}">
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-12 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>







        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/assets/js/admin.js') }}"></script>

</body>

</html>
