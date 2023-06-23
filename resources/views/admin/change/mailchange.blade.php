@extends('admin.layouts.app')

@section('title')
    Change Admin Email
@endsection

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row">
                    <div class="col">
                        <h2 class="title text-center mb-3 mb-md-4">Change Admin Email</h2>
                    </div>
                </div>

                <div class="field-bg">

                    <div class="row admin-gap">

                        <div class="col-12 d-none" id="loader">
                            <center>
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </center>
                        </div>

                        <div class="col-12">
                            <div class="alert alert-danger text-center alert-dismissible fade show d-none" role="alert"
                                id="alertdngr">
                                <span class="alertTxt"></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="alert alert-success text-center alert-dismissible fade show d-none" role="alert"
                                id="alertScs">
                                <span class="successMsg"></span>
                            </div>
                            <input type="hidden" id="csrfToken" name="_token" value="{{ csrf_token() }}" />
                        </div>


                        <div class="col-12 text-center site-info-content commonPart" id="mailPart">
                            <div id="changeEmail" class="text-left">
                                <label class="mb-1" for="oldEmail">Old Email:</label><br>
                                <input class="form-control mb-2" type="email" id="adminmail">
                                <label class="mb-1" for="adminPassword">Admin Password:</label><br>
                                <input class="form-control mb-2" type="password" id="adminpass">
                            </div>
                            <small>A 6 digit OTP will be sent to admin mail. OTP will be available just for 15 minutes.
                            </small>
                            <button type="button" class="btn done-btn create-btn mt-3"
                                onclick="provideMailPass()">Submit</button>
                            <div class="bottom-border my-5"></div>
                        </div>


                        <div id="submitOtp" class="col-12 text-center site-info-content commonPart d-none">
                            <div class="text-left">
                                <label class="mb-1" for="submitOtp">Submit OTP:</label><br>
                                <input class="form-control mb-2" type="text" id="otp" maxlength="6">
                            </div>
                            <button type="button" class="btn done-btn create-btn mt-3"
                                onclick="checkMailChangeOTP()">Submit</button>
                            <div class="bottom-border my-5"></div>
                        </div>


                        <div class="col-12 text-center site-info-content commonPart d-none" id="newEmail">
                            <div class="text-left">
                                <label class="mb-1" for="newEmail">Set New Email:</label><br>
                                <input class="form-control mb-2" type="email" id="newmail">
                            </div>
                            <button type="submit" class="btn done-btn create-btn mt-3"
                                onclick="changeNewMail()">Submit</button>

                        </div>


                    </div>
                </div>




            </div>
        </div>
    </div>



    <script>
        $(".mailchange").addClass("credentialActivate");
    </script>
@endsection
