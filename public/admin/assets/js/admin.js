function handleChange(checkbox) {
    if (checkbox.checked == true) {
        $("#adminpassword").prop("type", "text");
    } else {
        $("#adminpassword").prop("type", "password");
    }
}




function showPass(checkbox) {
    if (checkbox.checked == true) {
        $(".passwords").prop("type", "text");
    } else {
        $(".passwords").prop("type", "password");
    }
}









// OTP and reseting forget passwords 
function sendOTP() {
    $("#loader").removeClass('d-none');
    let tokenVal = $("#csrfToken").val();
    let adminmail = $("#adminmail").val();

    $.post('/check-forgetting-mail',
        {
            _token: tokenVal,
            askingMail: adminmail,
        }).done(function (response) {
            $("#loader").addClass('d-none');
            if (response == 'proceed') {
                $(".alert").addClass("d-none");
                $(".commonparts").addClass('d-none');
                $("#adminOtppart").removeClass('d-none');
            }
            else if (response == 'tryagain') {
                $(".alert").removeClass("d-none");
                $(".alertMsg").html("Could not send mail. Please try again.");
            }
            else {
                $(".alert").removeClass("d-none");
                $(".alertMsg").html("Admin email not matched");
            }
        });
}















function checkOTP() {

    $("#loader").removeClass('d-none');
    let tokenVal = $("#csrfToken").val();
    let askingOtp = $("#adminOtp").val();

    $.post('/check-admin-otp',
        {
            _token: tokenVal,
            askingOtp: askingOtp,
        }).done(function (response) {
            $("#loader").addClass('d-none');
            if (response == 'proceed') {
                $(".alert").addClass("d-none");
                $(".commonparts").addClass('d-none');
                $("#adminPassSetpart").removeClass('d-none');
            }
            else if (response == 'expires') {
                $(".alert").removeClass("d-none");
                $(".alertMsg").html("OTP time expired! Try again!...");
                $(".commonparts").addClass('d-none');
                $("#adminmailpart").removeClass('d-none');
            }
            else {
                $(".alert").removeClass("d-none");
                $(".alertMsg").html("OTP did not match!...");
            }
        });

}













function confirm() {
    $(".alert").addClass("d-none");
    let tokenVal = $("#csrfToken").val();
    let newpassword = $("#newpassword").val();
    let confrmpassword = $("#confrmpassword").val();
    let newpassLength = $("#newpassword").val().length;

    if (newpassLength < 8) {
        $(".alert").removeClass("d-none");
        $(".alertMsg").html("Passwords must contain atleast 8 characters!");
    } else {
        if (newpassword == confrmpassword) {

            $.post('/set-new-password',
                {
                    _token: tokenVal,
                    setNewPassword: confrmpassword,
                }).done(function (response) {
                    if (response == 'login') {
                        window.location.href = '/admin/admindashboard';
                    } else {
                        $(".alert").removeClass("d-none");
                        $(".alertMsg").html("Could not set new password. Try again.");
                    }
                });
        } else {
            $(".alert").removeClass("d-none");
            $(".alertMsg").html("Passwords not same!");
        }
    }
}










