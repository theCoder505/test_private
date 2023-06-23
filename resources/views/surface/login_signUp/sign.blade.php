@extends('surface.layouts.app')

@section('title')
    Welcome To {{ $appname }}
@endsection


@section('content')
    <style>
        body {
            background-color: #4158D0;
            background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
        }
    </style>
    <div id="signupin_page">
        <h3 class="text-center mb-5"> <span class="login_signup_text"> Signup </span> On {{ $appname }} </h3>
        <div class="row">
            <div class="col-md-6">

                <div class="all_tablines_holder">
                    <div id="signup" class="sign_tabline activated_line" onclick="activateForm('signup')">Sing Up</div>
                    <div id="login" class="sign_tabline" onclick="activateForm('login')">Sing In</div>
                </div>

                <div class="alertBox d-none"></div>
                <div class="sucessAlertBox d-none"></div>

                <input type="hidden" class="_token" value="<?php echo csrf_token(); ?>">




                <div id="main_form" class="user_login_common signup">
                    <form action="/sign-up-new-user" method="post">
                        @csrf


                        <div class="signup_main_form">
                            <div class="form-group">
                                <select class="user_acc_type underlinedInput" id="acc_type" name="user_acc_type" required>
                                    <option disabled>Select Account Type</option>
                                    <option value="menufacturer">Menufacturer</option>
                                    <option value="influencer">Influencer</option>
                                    <option value="entrepreneur">Entrepreneur</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="acc_name underlinedInput" name="acc_name" required
                                    placeholder="Your Account Name">
                            </div>

                            <div class="form-group">
                                <input type="text" class="full_name underlinedInput" name="full_name" required
                                    placeholder="Your Full Name">
                            </div>

                            <div class="form-group">
                                <input type="email" class="email_addr underlinedInput" name="email_addr" required
                                    placeholder="Email">
                            </div>

                            <div class="form-group">
                                <input type="password" class="user_pwd underlinedInput" name="user_pwd" required
                                    placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-dark submitButton btn-block btn-lg mt-4">SUBMIT</button>
                        </div>



                        <div class="six_digit_otp_part d-none">
                            <div class="form-group">
                                <input type="text" class="user_otp underlinedInput" name="user_otp" required maxlength="6"
                                    placeholder="Submit 6 Digit OTP From Mail">
                            </div>

                            <button type="submit" class="btn btn-dark signupButton btn-block btn-lg mt-4">SIGNUP</button>
                        </div>

                    </form>
                </div>






                <div id="main_form" class="user_login_common login d-none">



                    <form method="post" class="login_form login_part">
                        @csrf


                        <div class="form-group">
                            <select class="login_acc_type underlinedInput" id="acc_type" name="user_acc_type" required>
                                <option disabled>Select Account Type</option>
                                <option value="menufacturer">Menufacturer</option>
                                <option value="influencer">Influencer</option>
                                <option value="entrepreneur">Entrepreneur</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="email" class="login_email_addr underlinedInput" name="email_addr" required placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="password" class="login_pwd underlinedInput" name="user_pwd" required placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-dark btn-block btn-lg mt-4 loginUser">LOGIN</button>
                        <p class="forget_pwd_text">Forget Password?</p>

                    </form>


                    <form method="post" class="login_form forget_pwd d-none">
                        @csrf

                        <div class="form-group">
                            <select class="forget_user_acc_type underlinedInput" id="acc_type" name="user_acc_type"
                                required>
                                <option disabled>Select Account Type</option>
                                <option value="menufacturer">Menufacturer</option>
                                <option value="influencer">Influencer</option>
                                <option value="entrepreneur">Entrepreneur</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="email" class="forget_email_addr underlinedInput" name="forget_email_addr"
                                required placeholder="Email">
                        </div>

                        <div class="forget_pwd_setup d-none">
                            <div class="form-group">
                                <input type="text" class="typed_otp underlinedInput" name="typed_otp" required
                                    placeholder="Submit OTP From Mail" maxlength="6">
                            </div>

                            <div class="form-group">
                                <input type="text" class="new_password underlinedInput" name="new_password" required
                                    placeholder="Set New Password">
                            </div>
                            <button type="submit" class="btn btn-success checkOtpSubmit btn-block btn-lg mt-4">Submit</button>
                        </div>

                        <button type="submit" class="btn btn-danger btn-block btn-lg mt-4 forgetPwdBtn">
                            Send 6 Digit OTP
                        </button>

                    </form>



                </div>



            </div>
            <div class="col-md-6">
                <div class="img_parent_div">
                    <img alt="image" src="{{ asset('surface/assets/images/rightsideimage.jpg') }}"
                        data-id="{{ asset('surface/assets/images/signin.jpg') }}" class="signup_sideimg">
                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script>
        let currentUrl = window.location.href;
        if (currentUrl.indexOf("sign-up") !== -1) {
            $(".sign_up").addClass("active");
            $("#signup").click();
        } else {
            $(".sign_in").addClass("active");
            $("#login").click();
            $(".login_form").removeClass("d-none");
            $(".forget_pwd").addClass("d-none");
        }
    </script>
@endsection
