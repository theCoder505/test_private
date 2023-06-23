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
    <title>Login To Admin Panel</title>
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
                    ADMIN PANEL
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">

                        @php
                            $pastMail = '';
                            $pastPwd = '';
                        @endphp

                        <form method="POST" action="/check-admin-credential">
                            @csrf

                            @if (session()->has('alertMsg'))
                                <div class="alert alert-danger text-center font-weight-bold alert-dismissible fade show"
                                    role="alert">
                                    {{ session()->get('alertMsg') }}
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                @php
                                    $pastMail = session()->get('typedMail');
                                    $pastPwd = session()->get('typedPass');
                                @endphp
                            @endif


                            <div class="form-group">
                                <label class="form-control-label">ADMIN EMAIL</label>
                                <input type="email" class="form-control" name="adminmail" required
                                    value="{{ $pastMail }}">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">ADMIN PASSWORD</label>
                                <input type="password" class="form-control" name="adminpassword" id="adminpassword"
                                    required value="{{ $pastPwd }}">
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <input type="checkbox" id="checkMark" onchange='handleChange(this);'>&nbsp;
                                    Show | <span> <a href="/admin/forget-password">Forget Password?</a> </span>
                                </div>
                                <div class="col-lg-6 login-btm login-button">
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
