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
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    RESET / FORGET PASSWORD?
                </div>


                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">


                        <div id="loader" class="d-none">
                            <img src="{{ asset('admin/assets/images/loader.gif') }}" alt="loaderImg" class="loaderImg">
                        </div>


                        <div class="alert alert-danger text-center font-weight-bold alert-dismissible fade show d-none"
                            role="alert">
                            <span class="alertMsg"></span>
                        </div>


                        <input type="hidden" id="csrfToken" name="_token" value="{{ csrf_token() }}" />




                        <div id="adminmailpart" class="commonparts">
                            <div class="form-group">
                                <label class="form-control-label">ADMIN EMAIL</label>
                                <input type="email" class="form-control" name="adminmail" required value=""
                                    id="adminmail">
                            </div>

                            <small class="text-warning">Clicking here will send a 6 Digit OTP to admin.</small>
                            <div class="col-lg-12 loginbttm mb-4 mt-2">
                                <center>
                                    <button type="submit" class="btn btn-outline-primary"
                                        onclick="sendOTP()">PROCEED</button>
                                </center>
                            </div>
                        </div>

                        <div id="adminOtppart" class="commonparts d-none">
                            <div class="form-group">
                                <label class="form-control-label">6 Digit OTP</label>
                                <input type="text" maxlength="6" class="form-control" name="adminOtp" required
                                    value="" id="adminOtp" placeholder="OTP will valid for next 15 minitues">
                            </div>

                            <div class="col-lg-12 loginbttm mb-4">
                                <center>
                                    <button type="submit" class="btn btn-outline-primary" onclick="checkOTP()">CHECK
                                        OTP</button>
                                </center>
                            </div>
                        </div>

                        <div id="adminPassSetpart" class="commonparts d-none">
                            <div class="form-group">
                                <label class="form-control-label">NEW PASSWORD</label>
                                <input type="password" class="form-control passwords" name="newpassword"
                                    id="newpassword" required value="">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">CONFIRM PASSWORD</label>
                                <input type="password" class="form-control passwords" name="confrmpassword"
                                    id="confrmpassword" required value="">
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <input type="checkbox" id="checkMark" onchange='showPass(this);'>&nbsp;
                                    Show Passwords
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary" onclick="confirm()">CONFIRM
                                        AND LOGIN</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </div>

    <br><br>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/assets/js/admin.js') }}"></script>

</body>

</html>
