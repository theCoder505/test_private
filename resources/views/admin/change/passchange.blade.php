@extends('admin.layouts.app')

@section('title')
    Change Admin Passwords
@endsection

@section('content')



    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row">
                    <div class="col">
                        <h2 class="title text-center mb-3 mb-md-4">Change Admin Password</h2>
                    </div>
                </div>

                <div class="field-bg">
                    <div class="row  admin-gap">
                        <div id="changeAdminPassword" class="col-12 text-center site-info-content">
                            <div class="text-left">
                                <label class="mb-1" for="adminEmail">Admin Email:</label><br>
                                <input class="form-control mb-2" type="email">
                                <label class="mb-1" for="oldPassword">Old Password:</label><br>
                                <input class="form-control mb-2" type="password">
                            </div>
                            <button type="button" class="btn done-btn create-btn mt-3">Submit</button>
                            <div class="bottom-border my-5"></div>
                        </div>


                        <div id="submitOtp" class="col-12 text-center site-info-content">
                            <div class="text-left">
                                <label class="mb-1" for="submitOtp">Submit OTP:</label><br>
                                <input class="form-control mb-2" type="text">
                            </div>
                            <button type="button" class="btn done-btn create-btn mt-3">Submit</button>
                            <div class="bottom-border my-5"></div>
                        </div>


                        <div class="col-12 text-center site-info-content" id="newPassword">
                            <div class="text-left">
                                <label class="mb-1" for="newPassword">New Password:</label><br>
                                <input class="form-control mb-2" type="password">
                                <label class="mb-1" for="confirmPassword">Confirm Password:</label><br>
                                <input class="form-control mb-2" type="password">
                            </div>
                            <button type="submit" class="btn done-btn create-btn mt-3">Submit</button>

                        </div>


                    </div>
                </div>




            </div>
        </div>
    </div>




    <script>
        $(".passchange").addClass("credentialActivate");
    </script>

@endsection
