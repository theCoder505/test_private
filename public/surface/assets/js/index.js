// slick carousel of interprenuer slider 
$('#interpreneur').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ],
    autoplay: true,
    autoplaySpeed: 0,
    speed: 4000,
    pauseOnHover: false,
    cssEase: 'linear',
});




$('#company_sliders').owlCarousel({
    loop: true,
    margin: 50,
    nav: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
});


$('#all_review_lines').owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    autoplay: true,
    autoplayTimeout: 50000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
})




function showSignUp() {
    window.location.href = "/sign-up";
}

$(".learnmorebtn").click(function (e) {
    e.preventDefault();
    showSignUp();
});

function activeTab(passedParam) {
    let dataId = $(passedParam).attr("data-id");
    $(".select_type").removeClass("tab_active");
    $(passedParam).addClass("tab_active");
    $(".tabline_data").addClass("d-none");
    $(".tabline_data:nth-child(" + dataId + ")").removeClass("d-none");
}



function showDoing(passedParam) {
    let dataId = $(passedParam).attr("data-id");
    $(".doing_tab").removeClass("doing_active");
    $(passedParam).addClass("doing_active");
    $(".doing_img").addClass("d-none");
    $(".doing_img:nth-child(" + dataId + ")").removeClass("d-none");
}


function showDoingAdmin(passedParam) {
    let dataId = $(passedParam).attr("data-id");
    $(".doing_tab").removeClass("doing_active");
    $(passedParam).addClass("doing_active");
    $(".doing_holder").addClass("d-none");
    $(".doing_holder:nth-child(" + dataId + ")").removeClass("d-none");
}



function changeImg(passedThis) {
    let dataImg = $(passedThis).attr("data-hover");
    $(passedThis).attr("src", dataImg);
}


function defaultImg(passedThis) {
    let dataImg = $(passedThis).attr("data-main");
    $(passedThis).attr("src", dataImg);
}




const collapsibleButtons = document.querySelectorAll(
    ".collapsible-trigger-btn"
);

collapsibleButtons.forEach((collapsibleButton) => {
    const collapsibleContentDataHeight =
        collapsibleButton.nextElementSibling.offsetHeight;
    collapsibleButton.nextElementSibling.style.height = 0;
    collapsibleButton.addEventListener("click", (e) => {
        if (
            !e.currentTarget.parentElement.classList.contains("collapsible-tab__open")
        ) {
            e.currentTarget.parentElement.classList.toggle("collapsible-tab__open");
            e.currentTarget.nextElementSibling.style.height = `${collapsibleContentDataHeight}px`;
        } else {
            e.currentTarget.parentElement.classList.remove("collapsible-tab__open");
            e.currentTarget.nextElementSibling.style.height = 0;
        }
    });
});




$(".see_more_less").click(function () {
    if ($(".grid_petra_4_lines").hasClass("d-none")) {
        $(".grid_petra_4_lines").removeClass("d-none");
        $(this).html("See Less")
    } else {
        $(".grid_petra_4_lines").addClass("d-none");
        $(this).html("See More")
    }
});






function showPosts(passedThis) {
    let dataId = $(passedThis).attr("data-id");

    if (dataId == 'all') {
        $(".blog_item").removeClass("d-none");
    } else {
        $(".blog_item").addClass("d-none");
        $('[data-class="' + dataId + '"]').removeClass("d-none");
        // $(".blog-container ." + dataId).removeClass("d-none");
    }
    $(".post_tabline").removeClass("active_line");
    $('[data-id="' + dataId + '"]').addClass("active_line");
}












function showSpecAllPosts(passedThis) {
    let dataId = $(passedThis).attr("data-id");
    $(".blog_item_2").removeClass("d-none");
    $(".post_tabline_2").removeClass("active_line");
    $('[data-id="' + dataId + '"]').addClass("active_line");
}
















function showSpecIndustryPosts(passedThis) {
    $(".common_exprt_blog").addClass("d-none");
    $(".post_tabline_2").removeClass("active_line");
    $(passedThis).addClass("active_line");
    let name = $(passedThis).attr("data-class");

    $('.common_exprt_blog').each(function () {
        var dataId = $(this).data('id');
        if (dataId.includes(name)) {
            $(this).removeClass('d-none');
        }
    });
}















var firstImgSrc = $(".signup_sideimg").attr("src");
var SecondImgSrc = $(".signup_sideimg").attr("data-id");

function activateForm(passedThis) {
    if (passedThis == 'login') {
        $(".signup_sideimg").attr("src", SecondImgSrc);
        $(".login_form").removeClass("d-none");
        $(".forget_pwd").addClass("d-none");
    } else {
        $(".signup_sideimg").attr("src", firstImgSrc);
        $(".signup_main_form").removeClass("d-none");
    }

    $(".sign_tabline").removeClass("activated_line");
    $("#" + passedThis).addClass("activated_line");
    $(".user_login_common").addClass("d-none");
    $("." + passedThis).removeClass("d-none");

    $(".login_signup_text").html(passedThis);
}



$(".forget_pwd_text").click(function () {
    $(".login_form").addClass("d-none");
    $(".forget_pwd").removeClass("d-none");
    $(".login_signup_text").html("Forget Password");
    $(".sign_tabline").removeClass("activated_line");
});








// forget password sending otp to user
$(".forgetPwdBtn").click(function (event) {
    event.preventDefault();
    let csrfToken = $("._token").val();
    let user_type = $(".forget_user_acc_type").val();
    let email_addr_length = $(".forget_email_addr").val().length;
    let email_addr = ($(".forget_email_addr").val()).trim();



    if (email_addr_length > 0) {
        $(".alertBox").addClass("d-none");
        $(".forgetPwdBtn").html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');

        $.ajax({
            method: "POST",
            url: "/send-otp-to-forget-pwd",
            data: {
                type: user_type,
                user_email: email_addr,
                _token: csrfToken,
            }
        })
            .done(function (response) {
                if (response == 'otp sent') {
                    $(".forget_pwd_setup").removeClass("d-none");
                    $(".forgetPwdBtn").html("Send 6 Digit OTP");
                    $(".forgetPwdBtn").addClass("d-none");
                }
                else if (response == 'nouser') {
                    $(".alertBox").removeClass("d-none");
                    $(".alertBox").html("No Such User Found");
                    $(".forgetPwdBtn").html("Send 6 Digit OTP");
                }
                else {
                    $(".alertBox").addClass("d-none");
                    $(".alertBox").html("Error Occured");
                }
            });


    } else {
        $(".alertBox").removeClass("d-none");
        $(".alertBox").html("All Fields Are Required");
    }
});








// checking with otp 
$(".checkOtpSubmit").click(function (event) {
    event.preventDefault();
    let csrfToken = $("._token").val();
    let user_type = $(".forget_user_acc_type").val();
    let email_addr = ($(".forget_email_addr").val()).trim();
    let email_addr_length = $(".forget_email_addr").val().length;
    let typed_otp = ($(".typed_otp").val()).trim();
    let typed_otp_length = $(".typed_otp").val().length;
    let new_password = ($(".new_password").val()).trim();
    let new_pwd_length = $(".new_password").val().length;



    if (email_addr_length > 0 && new_pwd_length > 0 && typed_otp_length > 0) {
        $(".sucessAlertBox").addClass("d-none");
        $(".alertBox").addClass("d-none");
        $(".checkOtpSubmit").html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');

        $.ajax({
            method: "POST",
            url: "/check-forget-pwd-otp",
            data: {
                user_type: user_type,
                email_addr: email_addr,
                typed_otp: typed_otp,
                new_password: new_password,
                _token: csrfToken,
            }
        })
            .done(function (response) {
                $(".checkOtpSubmit").html('Send 6 Digit OTP');
                if (response == 'matched') {
                    $(".sucessAlertBox").removeClass("d-none");
                    $(".sucessAlertBox").html("Passwords Been Updated. You can login now.");
                }
                else if (response == 'missmatch') {
                    $(".alertBox").removeClass("d-none");
                    $(".alertBox").html("OTP not matched. Try Again!");
                }
                else if (response == 'nouser') {
                    $(".alertBox").removeClass("d-none");
                    $(".alertBox").html("No Such User Found");
                }
                else {
                    $(".alertBox").addClass("d-none");
                    $(".alertBox").html("Error Occured");
                }
            });


    } else {
        $(".alertBox").removeClass("d-none");
        $(".alertBox").html("All Fields Are Required");
    }
});










// login user 
$(".loginUser").click(function (event) {
    event.preventDefault();
    let csrfToken = $("._token").val();
    let user_type = $(".login_acc_type").val();
    let email_addr = ($(".login_email_addr").val()).trim();
    let email_addr_length = $(".login_email_addr").val().length;
    let login_pwd = ($(".login_pwd").val()).trim();
    let login_pwd_length = $(".login_pwd").val().length;



    if (email_addr_length > 0 && login_pwd_length > 0) {
        $(".alertBox").addClass("d-none");
        $(".loginUser").html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');

        $.ajax({
            method: "POST",
            url: "/sign-in-existing-user",
            data: {
                user_type: user_type,
                email_addr: email_addr,
                login_pwd: login_pwd,
                _token: csrfToken,
            }
        })
            .done(function (response) {
                if (response == 'success') {
                    //    send to dashboard 
                    window.location.href = "/" + user_type + "/dashboard";
                }
                else {
                    $(".checkOtpSubmit").addClass("d-none");
                    $(".alertBox").removeClass("d-none");
                    $(".alertBox").html(response);
                    $(".loginUser").html('LOGIN');
                }
            });


    } else {
        $(".alertBox").removeClass("d-none");
        $(".alertBox").html("All Fields Are Required");
    }
});











// signup user and send otp
$(".submitButton").click(function (event) {
    event.preventDefault();
    let csrfToken = $("._token").val();

    let user_acc_type = ($(".user_acc_type").val()).trim();
    let user_acc_type_len = $(".user_acc_type").val().length;

    let acc_name = ($(".acc_name").val()).trim();
    let acc_name_len = $(".acc_name").val().length;

    let full_name = ($(".full_name").val()).trim();
    let full_name_len = $(".full_name").val().length;

    let email_addr = ($(".email_addr").val()).trim();
    let email_addr_len = $(".email_addr").val().length;

    let user_pwd = ($(".user_pwd").val()).trim();
    let user_pwd_len = $(".user_pwd").val().length;


    if ((user_acc_type_len == 0) || (acc_name_len == 0) || (full_name_len == 0) || (email_addr_len == 0) || (user_pwd_len == 0)) {
        $(".alertBox").removeClass("d-none");
        $(".alertBox").html("All Fields Are Required");
    } else {
        $(".alertBox").addClass("d-none");
        $(".submitButton").html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');

        $.ajax({
            method: "POST",
            url: "/add-new-user-with-otp",
            data: {
                user_acc_type: user_acc_type,
                acc_name: acc_name,
                full_name: full_name,
                email_addr: email_addr,
                user_pwd: user_pwd,
                _token: csrfToken,
            }
        })
            .done(function (response) {
                $(".submitButton").html('SUBMIT');
                if (response == 'success') {
                    $(".alertBox").addClass("d-none");
                    $(".six_digit_otp_part").removeClass("d-none");
                    $(".signup_main_form").addClass("d-none");
                } else {
                    $(".alertBox").removeClass("d-none");
                    $(".alertBox").html(response);
                }

            });
    }


});














$(".signupButton").click(function (event) {
    event.preventDefault();
    let csrfToken = $("._token").val();

    let user_acc_type = ($(".user_acc_type").val()).trim();
    let email_addr = ($(".email_addr").val()).trim();
    let user_otp = ($(".user_otp").val()).trim();

    $.ajax({
        method: "POST",
        url: "/check-user-otp-and-add-user",
        data: {
            user_acc_type: user_acc_type,
            email_addr: email_addr,
            user_otp: user_otp,
            _token: csrfToken,
        }
    })
        .done(function (response) {
            if (response == 'matched') {
                $(".alertBox").addClass("d-none");
                $(".six_digit_otp_part").addClass("d-none");
                $(".sucessAlertBox").removeClass("d-none");
                $(".signup form")[0].reset();
                $(".sucessAlertBox").html("OTP Matched! Welcome To Our System, you can login now!");
            } else {
                $(".alertBox").removeClass("d-none");
                $(".alertBox").html("OTP NOT Matched! Try again!");
            }
        });
});









function activate_tab(event) {
    $(".img_bar").removeClass("activated_bar");
    $(event).addClass("activated_bar");

    let image_src = $(event).children(".main_img").attr("src");
    console.log(image_src);
    $(".home_img_holder").attr("src", image_src);
}


function showImage(passedThis) {
    if (passedThis.files && passedThis.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(passedThis).parent(".img_bar").children(".main_img").attr('src', e.target.result);
            $(".home_img_holder").attr('src', e.target.result);
        }
        reader.readAsDataURL(passedThis.files[0]);
    }
}



function activateInput(passedThis) {
    $(passedThis).parent().children(".file_input").click();
}


function showSpecImageInSpecField(passedThis) {
    if (passedThis.files && passedThis.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(passedThis).parent().children(".image_thing").attr('src', e.target.result);
        }
        reader.readAsDataURL(passedThis.files[0]);
    }
}






function change_on_main_title(passedThis) {
    let written = $(passedThis).html();
    $(".super_blog_title").html(written);
}



function make_title_changes(passedThis) {
    let data_headline_id = $(passedThis).attr('data-headline');
    let written = $(passedThis).html();
    $(".users_head_line" + data_headline_id).html(written);
}






function updateChange(passedThis) {
    let csrfToken = $("._token").val();
    let reply_id = $(passedThis).parent(".answer_line").children(".reply_id").val();
    let reply_headline = $(passedThis).parent(".answer_line").children(".user_ans_headline").html();
    let reply_answer = $(passedThis).parent(".answer_line").children(".user_answer").html();
    $(passedThis).html('<div class="spinner-border"></div>');

    $.ajax({
        method: "POST",
        url: "/update-question-reply",
        data: {
            reply_id: reply_id,
            reply_headline: reply_headline,
            reply_answer: reply_answer,
            _token: csrfToken,
        }
    })
        .done(function (response) {
            if (response == 'updated') {
                $(passedThis).html("Updated!");
                setTimeout(() => {
                    $(passedThis).html("Update Reply");
                }, 3500);
            } else {
                $(passedThis).html("Could Not Update! Try Later.");
                setTimeout(() => {
                    $(passedThis).html("Update Reply");
                }, 3500);
            }
        });
}












function updateQuestion(passedThis) {
    let _token = $("._token").val();
    let question_id = $(".question_id").val();
    let blog_main_image = $("input[name='blog_main_image']")[0].files[0];
    let main_question = $(".main_question").html();
    let question_details = $(".question_details").html();
    $(passedThis).html('<div class="spinner-border"></div>');

    var formData = new FormData();
    formData.append('_token', _token);
    formData.append('question_id', question_id);
    formData.append('question_image', blog_main_image);
    formData.append('main_question', main_question);
    formData.append('question_details', question_details);

    $.ajax({
        url: '/update-specific-question',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response == 'updated') {
                $(passedThis).html("Updated Successfully!");
                setTimeout(() => {
                    $(passedThis).html("Update Question");
                }, 3500);
            } else {
                $(passedThis).html("Could Not Update! Try Later.");
                setTimeout(() => {
                    $(passedThis).html("Update Question");
                }, 3500);
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });


}










function addNewBrand(passedThis) {

    $(".branding_tabs").html('');
    for (var i = 0; i < $(passedThis)[0].files.length; i++) {
        $(".branding_tabs").append('<div class="brand_tab"> <img src="' + window.URL.createObjectURL(passedThis.files[i]) + '" alt="img" class="brand_img image_thing"></div>');
    }
}





















function submitHomepageForm(passedThis) {
    let tokenVal = $(".token").val();

    let slider1 = $("input[name='slider1']")[0].files[0];
    let slider2 = $("input[name='slider2']")[0].files[0];
    let slider3 = $("input[name='slider3']")[0].files[0];
    let slider4 = $("input[name='slider4']")[0].files[0];
    let slider5 = $("input[name='slider5']")[0].files[0];
    let slider6 = $("input[name='slider6']")[0].files[0];
    let slider7 = $("input[name='slider7']")[0].files[0];
    let slider8 = $("input[name='slider8']")[0].files[0];

    let left_img_file = $("input[name='left_img_file']")[0].files[0];
    let right_img_file = $("input[name='right_img_file']")[0].files[0];
    let pdf_src1_img = $("input[name='pdf_src1_img']")[0].files[0];
    let pdf_src2_img = $("input[name='pdf_src2_img']")[0].files[0];
    let pdf_src3_img = $("input[name='pdf_src3_img']")[0].files[0];
    let pdf_src4_img = $("input[name='pdf_src4_img']")[0].files[0];
    let potential_img_1 = $("input[name='potential_img_1']")[0].files[0];
    let potential_img_2 = $("input[name='potential_img_2']")[0].files[0];
    let potential_img_3 = $("input[name='potential_img_3']")[0].files[0];
    let potential_img_4 = $("input[name='potential_img_4']")[0].files[0];
    let overview_img1 = $("input[name='overview_img1']")[0].files[0];
    let overview_img2 = $("input[name='overview_img2']")[0].files[0];
    let overview_img3 = $("input[name='overview_img3']")[0].files[0];
    let sourcing_img = $("input[name='sourcing_img']")[0].files[0];
    let storage_img = $("input[name='storage_img']")[0].files[0];
    let ecommerce_img = $("input[name='ecommerce_img']")[0].files[0];
    let screenshot_img = $("input[name='screenshot_img']")[0].files[0];
    let soap_img = $("input[name='soap_img']")[0].files[0];
    let daddy_img = $("input[name='daddy_img']")[0].files[0];
    let varifiedss_img = $("input[name='varifiedss_img']")[0].files[0];
    let lowcostss_img = $("input[name='lowcostss_img']")[0].files[0];
    let ecomss_img = $("input[name='ecomss_img']")[0].files[0];

    let pdf_file_src1 = $("input[name='pdf_file_src1']")[0].files[0];
    let pdf_file_src2 = $("input[name='pdf_file_src2']")[0].files[0];
    let pdf_file_src3 = $("input[name='pdf_file_src3']")[0].files[0];
    let pdf_file_src4 = $("input[name='pdf_file_src4']")[0].files[0];


    let sec2_title = $(".sec2_title").html();
    let sec2_text = $(".sec2_text").html();

    let sm_dtls_txt_1 = $(".sm_dtls_txt_1").html();
    let sm_dtls_txt_2 = $(".sm_dtls_txt_2").html();
    let sm_dtls_txt_3 = $(".sm_dtls_txt_3").html();
    let sm_dtls_txt_4 = $(".sm_dtls_txt_4").html();


    let potential_title_1 = $(".potential_title_1").html();
    let potential_short_desc_1 = $(".potential_short_desc_1").html();
    let potential_desc_1 = $("input[name='potential_desc_1']").text();

    let potential_title_2 = $(".potential_title_2").html();
    let potential_short_desc_2 = $(".potential_short_desc_2").html();
    let potential_desc_2 = $("input[name='potential_desc_2']").text();

    let potential_title_3 = $(".potential_title_3").html();
    let potential_short_desc_3 = $(".potential_short_desc_3").html();
    let potential_desc_3 = $("input[name='potential_desc_3']").text();

    let potential_title_4 = $(".potential_title_4").html();
    let potential_short_desc_4 = $(".potential_short_desc_4").html();
    let potential_desc_4 = $("input[name='potential_desc_4']").text();


    let overview_text_1 = $(".overview_text_1").html();
    let overview_text_2 = $(".overview_text_2").html();
    let overview_text_3 = $(".overview_text_3").html();

    let sourcing_title = $(".sourcing_title").html();
    let sourcing_text = $(".sourcing_text").html();

    let storage_title = $(".storage_title").html();
    let storage_text = $(".storage_text").html();

    let ecommerce_title = $(".ecommerce_title").html();
    let ecommerce_text = $(".ecommerce_text").html();

    let screenshot_text = $(".screenshot_text").html();

    let soap_text = $(".soap_text").html();

    let daddy_text = $(".daddy_text").html();



    var formData = new FormData();

    let brand_line_images = $("input[name='brand_line_images']")[0].files;
    for (var i = 0; i < brand_line_images.length; i++) {
        formData.append('brand_images[]', brand_line_images[i]);
    }


    formData.append('_token', tokenVal);
    formData.append('slider1', slider1);
    formData.append('slider2', slider2);
    formData.append('slider3', slider3);
    formData.append('slider4', slider4);
    formData.append('slider5', slider5);
    formData.append('slider6', slider6);
    formData.append('slider7', slider7);
    formData.append('slider8', slider8);
    formData.append('left_img_file', left_img_file);
    formData.append('sec2_title', sec2_title);
    formData.append('sec2_text', sec2_text);
    formData.append('right_img_file', right_img_file);
    formData.append('pdf_src1_img', pdf_src1_img);
    formData.append('pdf_file_src1', pdf_file_src1);
    formData.append('sm_dtls_txt_1', sm_dtls_txt_1);
    formData.append('pdf_src2_img', pdf_src2_img);
    formData.append('pdf_file_src2', pdf_file_src2);
    formData.append('sm_dtls_txt_2', sm_dtls_txt_2);
    formData.append('pdf_src3_img', pdf_src3_img);
    formData.append('pdf_file_src3', pdf_file_src3);
    formData.append('sm_dtls_txt_3', sm_dtls_txt_3);
    formData.append('pdf_src4_img', pdf_src4_img);
    formData.append('pdf_file_src4', pdf_file_src4);
    formData.append('sm_dtls_txt_4', sm_dtls_txt_4);
    formData.append('potential_img_1', potential_img_1);
    formData.append('potential_title_1', potential_title_1);
    formData.append('potential_short_desc_1', potential_short_desc_1);
    formData.append('potential_desc_1', potential_desc_1);
    formData.append('potential_img_2', potential_img_2);
    formData.append('potential_title_2', potential_title_2);
    formData.append('potential_short_desc_2', potential_short_desc_2);
    formData.append('potential_desc_2', potential_desc_2);
    formData.append('potential_img_3', potential_img_3);
    formData.append('potential_title_3', potential_title_3);
    formData.append('potential_short_desc_3', potential_short_desc_3);
    formData.append('potential_desc_3', potential_desc_3);
    formData.append('potential_img_4', potential_img_4);
    formData.append('potential_title_4', potential_title_4);
    formData.append('potential_short_desc_4', potential_short_desc_4);
    formData.append('potential_desc_4', potential_desc_4);
    formData.append('overview_img1', overview_img1);
    formData.append('overview_text_1', overview_text_1);
    formData.append('overview_img2', overview_img2);
    formData.append('overview_text_2', overview_text_2);
    formData.append('overview_img3', overview_img3);
    formData.append('overview_text_3', overview_text_3);
    formData.append('sourcing_title', sourcing_title);
    formData.append('sourcing_text', sourcing_text);
    formData.append('sourcing_img', sourcing_img);
    formData.append('storage_img', storage_img);
    formData.append('storage_title', storage_title);
    formData.append('storage_text', storage_text);
    formData.append('ecommerce_title', ecommerce_title);
    formData.append('ecommerce_text', ecommerce_text);
    formData.append('ecommerce_img', ecommerce_img);
    formData.append('screenshot_img', screenshot_img);
    formData.append('screenshot_text', screenshot_text);
    formData.append('soap_img', soap_img);
    formData.append('soap_text', soap_text);
    formData.append('daddy_img', daddy_img);
    formData.append('daddy_text', daddy_text);
    formData.append('varifiedss_img', varifiedss_img);
    formData.append('lowcostss_img', lowcostss_img);
    formData.append('ecomss_img', ecomss_img);



    $(passedThis).html('<div class="spinner-border"></div>');



    $.ajax({
        url: '/admin/update-homepage',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response == 'success') {
                $(passedThis).html('Homepage Updated Successfully!');
            } else {
                $(passedThis).html('Could not update. Reload Page & Try Again!');
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });



}




















function saveBrandingPage(passedThis) {
    let tokenVal = $(".token").val();


    let div_1_img = $("input[name='div_1_img']")[0].files[0];
    let div_2_img = $("input[name='div_2_img']")[0].files[0];
    let div_3_img = $("input[name='div_3_img']")[0].files[0];
    let div_4_img = $("input[name='div_4_img']")[0].files[0];
    let div_5_img = $("input[name='div_5_img']")[0].files[0];
    let div_6_img = $("input[name='div_6_img']")[0].files[0];
    let div_7_img = $("input[name='div_7_img']")[0].files[0];
    let div_8_img = $("input[name='div_8_img']")[0].files[0];
    let supply_img = $("input[name='supply_img']")[0].files[0];
    let fulfil_img = $("input[name='fulfil_img']")[0].files[0];
    let ecom_img = $("input[name='ecom_img']")[0].files[0];
    let sec_2_1_img = $("input[name='sec_2_1_img']")[0].files[0];
    let sec_2_2_img = $("input[name='sec_2_2_img']")[0].files[0];
    let sec_2_3_img = $("input[name='sec_2_3_img']")[0].files[0];
    let sec_2_4_img = $("input[name='sec_2_4_img']")[0].files[0];
    let sec_2_5_img = $("input[name='sec_2_5_img']")[0].files[0];
    let sec_2_6_img = $("input[name='sec_2_6_img']")[0].files[0];
    let sec_2_7_img = $("input[name='sec_2_7_img']")[0].files[0];
    let sec_2_8_img = $("input[name='sec_2_8_img']")[0].files[0];


    let sec_1_title = $(".sec_1_title").html();
    let sec_1_short_desac = $(".sec_1_short_desac").html();
    let div_1_title = $(".div_1_title").html();
    let div_1_text = $(".div_1_text").html();
    let div_2_title = $(".div_2_title").html();
    let div_2_text = $(".div_2_text").html();
    let div_3_title = $(".div_3_title").html();
    let div_3_text = $(".div_3_text").html();
    let div_4_title = $(".div_4_title").html();
    let div_4_text = $(".div_4_text").html();
    let div_5_title = $(".div_5_title").html();
    let div_5_text = $(".div_5_text").html();
    let div_6_title = $(".div_6_title").html();
    let div_6_text = $(".div_6_text").html();
    let div_7_title = $(".div_7_title").html();
    let div_7_text = $(".div_7_text").html();
    let div_8_title = $(".div_8_title").html();
    let div_8_text = $(".div_8_text").html();
    let sec_2_title = $(".sec_2_title").html();
    let sec_2_short_desac = $(".sec_2_short_desac").html();
    let supply_title = $(".supply_title").html();
    let supply_text = $(".supply_text").html();
    let fulfil_title = $(".fulfil_title").html();
    let fulfil_text = $(".fulfil_text").html();
    let ecom_title = $(".ecom_title").html();
    let ecom_text = $(".ecom_text").html();
    let sec_2_1_title = $(".sec_2_1_title").html();
    let sec_2_1_text = $(".sec_2_1_text").html();
    let sec_2_2_title = $(".sec_2_2_title").html();
    let sec_2_2_text = $(".sec_2_2_text").html();
    let sec_2_3_title = $(".sec_2_3_title").html();
    let sec_2_3_text = $(".sec_2_3_text").html();
    let sec_2_4_title = $(".sec_2_4_title").html();
    let sec_2_4_text = $(".sec_2_4_text").html();
    let sec_2_5_title = $(".sec_2_5_title").html();
    let sec_2_5_text = $(".sec_2_5_text").html();
    let sec_2_6_title = $(".sec_2_6_title").html();
    let sec_2_6_text = $(".sec_2_6_text").html();
    let sec_2_7_title = $(".sec_2_7_title").html();
    let sec_2_7_text = $(".sec_2_7_text").html();
    let sec_2_8_title = $(".sec_2_8_title").html();
    let sec_2_8_text = $(".sec_2_8_text").html();





    let launch_img = $("input[name='launch_img']")[0].files[0];
    let streamline_img = $("input[name='streamline_img']")[0].files[0];
    let scale_img = $("input[name='scale_img']")[0].files[0];
    let chain_1_img = $("input[name='chain_1_img']")[0].files[0];
    let chain_2_img = $("input[name='chain_2_img']")[0].files[0];
    let chain_3_img = $("input[name='chain_3_img']")[0].files[0];
    let chain_4_img = $("input[name='chain_4_img']")[0].files[0];
    let subscription_1_img = $("input[name='subscription_1_img']")[0].files[0];
    let subscription_2_img = $("input[name='subscription_2_img']")[0].files[0];
    let subscription_3_img = $("input[name='subscription_3_img']")[0].files[0];
    let subscription_4_img = $("input[name='subscription_4_img']")[0].files[0];



    let sec_3_title = $(".sec_3_title").html();
    let launch_title = $(".launch_title").html();
    let launch_text = $(".launch_text").html();
    let launch_red_text = $(".launch_red_text").html();
    let streamline_title = $(".streamline_title").html();
    let streamline_text = $(".streamline_text").html();
    let streamline_red_text = $(".streamline_red_text").html();
    let scale_title = $(".scale_title").html();
    let scale_text = $(".scale_text").html();
    let scale_red_text = $(".scale_red_text").html();
    let sec_4_title = $(".sec_4_title").html();
    let chain_1_title = $(".chain_1_title").html();
    let chain_1_short_text = $(".chain_1_short_text").html();
    let chain_1_long_text = $(".chain_1_long_text").val();
    let chain_2_title = $(".chain_2_title").html();
    let chain_2_short_text = $(".chain_2_short_text").html();
    let chain_2_long_text = $(".chain_2_long_text").val();
    let chain_3_title = $(".chain_3_title").html();
    let chain_3_short_text = $(".chain_3_short_text").html();
    let chain_3_long_text = $(".chain_3_long_text").val();
    let chain_4_title = $(".chain_4_title").html();
    let chain_4_short_text = $(".chain_4_short_text").html();
    let chain_4_long_text = $(".chain_4_long_text").val();
    let sec_5_title = $(".sec_5_title").html();
    let subscription_1_title = $(".subscription_1_title").html();
    let subscription_1_text = $(".subscription_1_text").html();
    let subscription_2_title = $(".subscription_2_title").html();
    let subscription_2_text = $(".subscription_2_text").html();
    let subscription_3_title = $(".subscription_3_title").html();
    let subscription_3_text = $(".subscription_3_text").html();
    let subscription_4_title = $(".subscription_4_title").html();
    let subscription_4_text = $(".subscription_4_text").html();


    $(passedThis).html('<div class="spinner-border"></div>');


    var formData = new FormData();

    formData.append('_token', tokenVal);
    formData.append('div_1_img', div_1_img);
    formData.append('div_2_img', div_2_img);
    formData.append('div_3_img', div_3_img);
    formData.append('div_4_img', div_4_img);
    formData.append('div_5_img', div_5_img);
    formData.append('div_6_img', div_6_img);
    formData.append('div_7_img', div_7_img);
    formData.append('div_8_img', div_8_img);
    formData.append('supply_img', supply_img);
    formData.append('fulfil_img', fulfil_img);
    formData.append('ecom_img', ecom_img);
    formData.append('sec_2_1_img', sec_2_1_img);
    formData.append('sec_2_2_img', sec_2_2_img);
    formData.append('sec_2_3_img', sec_2_3_img);
    formData.append('sec_2_4_img', sec_2_4_img);
    formData.append('sec_2_5_img', sec_2_5_img);
    formData.append('sec_2_6_img', sec_2_6_img);
    formData.append('sec_2_7_img', sec_2_7_img);
    formData.append('sec_2_8_img', sec_2_8_img);
    formData.append('sec_1_title', sec_1_title);
    formData.append('sec_1_short_desac', sec_1_short_desac);
    formData.append('div_1_title', div_1_title);
    formData.append('div_1_text', div_1_text);
    formData.append('div_2_title', div_2_title);
    formData.append('div_2_text', div_2_text);
    formData.append('div_3_title', div_3_title);
    formData.append('div_3_text', div_3_text);
    formData.append('div_4_title', div_4_title);
    formData.append('div_4_text', div_4_text);
    formData.append('div_5_title', div_5_title);
    formData.append('div_5_text', div_5_text);
    formData.append('div_6_title', div_6_title);
    formData.append('div_6_text', div_6_text);
    formData.append('div_7_title', div_7_title);
    formData.append('div_7_text', div_7_text);
    formData.append('div_8_title', div_8_title);
    formData.append('div_8_text', div_8_text);
    formData.append('sec_2_title', sec_2_title);
    formData.append('sec_2_short_desac', sec_2_short_desac);
    formData.append('supply_title', supply_title);
    formData.append('supply_text', supply_text);
    formData.append('fulfil_title', fulfil_title);
    formData.append('fulfil_text', fulfil_text);
    formData.append('ecom_title', ecom_title);
    formData.append('ecom_text', ecom_text);
    formData.append('sec_2_1_title', sec_2_1_title);
    formData.append('sec_2_1_text', sec_2_1_text);
    formData.append('sec_2_2_title', sec_2_2_title);
    formData.append('sec_2_2_text', sec_2_2_text);
    formData.append('sec_2_3_title', sec_2_3_title);
    formData.append('sec_2_3_text', sec_2_3_text);
    formData.append('sec_2_4_title', sec_2_4_title);
    formData.append('sec_2_4_text', sec_2_4_text);
    formData.append('sec_2_5_title', sec_2_5_title);
    formData.append('sec_2_5_text', sec_2_5_text);
    formData.append('sec_2_6_title', sec_2_6_title);
    formData.append('sec_2_6_text', sec_2_6_text);
    formData.append('sec_2_7_title', sec_2_7_title);
    formData.append('sec_2_7_text', sec_2_7_text);
    formData.append('sec_2_8_title', sec_2_8_title);
    formData.append('sec_2_8_text', sec_2_8_text);







    formData.append('launch_img', launch_img);
    formData.append('streamline_img', streamline_img);
    formData.append('scale_img', scale_img);
    formData.append('chain_1_img', chain_1_img);
    formData.append('chain_2_img', chain_2_img);
    formData.append('chain_3_img', chain_3_img);
    formData.append('chain_4_img', chain_4_img);
    formData.append('subscription_1_img', subscription_1_img);
    formData.append('subscription_2_img', subscription_2_img);
    formData.append('subscription_3_img', subscription_3_img);
    formData.append('subscription_4_img', subscription_4_img);
    formData.append('sec_3_title', sec_3_title);
    formData.append('launch_title', launch_title);
    formData.append('launch_text', launch_text);
    formData.append('launch_red_text', launch_red_text);
    formData.append('streamline_title', streamline_title);
    formData.append('streamline_text', streamline_text);
    formData.append('streamline_red_text', streamline_red_text);
    formData.append('scale_title', scale_title);
    formData.append('scale_text', scale_text);
    formData.append('scale_red_text', scale_red_text);
    formData.append('sec_4_title', sec_4_title);
    formData.append('chain_1_title', chain_1_title);
    formData.append('chain_1_short_text', chain_1_short_text);
    formData.append('chain_1_long_text', chain_1_long_text);
    formData.append('chain_2_title', chain_2_title);
    formData.append('chain_2_short_text', chain_2_short_text);
    formData.append('chain_2_long_text', chain_2_long_text);
    formData.append('chain_3_title', chain_3_title);
    formData.append('chain_3_short_text', chain_3_short_text);
    formData.append('chain_3_long_text', chain_3_long_text);
    formData.append('chain_4_title', chain_4_title);
    formData.append('chain_4_short_text', chain_4_short_text);
    formData.append('chain_4_long_text', chain_4_long_text);
    formData.append('sec_5_title', sec_5_title);
    formData.append('subscription_1_title', subscription_1_title);
    formData.append('subscription_1_text', subscription_1_text);
    formData.append('subscription_2_title', subscription_2_title);
    formData.append('subscription_2_text', subscription_2_text);
    formData.append('subscription_3_title', subscription_3_title);
    formData.append('subscription_3_text', subscription_3_text);
    formData.append('subscription_4_title', subscription_4_title);
    formData.append('subscription_4_text', subscription_4_text);


    $.ajax({
        url: '/admin/update-brand-pages-data',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $(passedThis).html('Page Updated Successfully!');
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });



}









