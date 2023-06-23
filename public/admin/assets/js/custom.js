function previewImage() {
    websiteImage.src = URL.createObjectURL(event.target.files[0]);
}



function editContibuter(passedId) {

    $.ajax({
        url: "/show-details-of-user-" + passedId,
        success: function (result) {
            $("#waitingModal").html(result);
            $(".modal").modal('show');
        }
    });

}





function doAction(rowVal) {
    let actionDataId = (rowVal.getAttribute('data-id'));
    let actionValue = (rowVal.value);

    $.ajax({
        url: "/change-creator/" + actionValue + '/' + actionDataId,
        success: function (result) {
            location.reload();
        }
    });

}





function askToDelete(passedVal) {
    $(".modal").modal('show');
    $("#deletingId").val(passedVal);
}

function deletePermantly() {
    let deletingVal = ($("#deletingId").val());
    $(".modal").modal('hide');

    $.ajax({
        url: "/delete-news-no/" + deletingVal,
        success: function (result) {
            window.location.href = "/admin/all-contents-news";
        }
    });
}






function deleteRss(passedVal) {
    $(".modal").modal('show');
    $("#deletingId").val(passedVal);
}

function deleteConfirm() {
    let deletingVal = ($("#deletingId").val());
    $(".modal").modal('hide');

    $.ajax({
        url: "/deleterss/" + deletingVal,
        success: function (result) {
            if (result == 'deleted') {
                window.location.href = "/admin/create-publishers";
            }
            else {
                alert("Could not delete! Try again later");
            }
        }
    });
}









function editItem(passedVal) {

    $.ajax({
        url: "/getrsseditpopupval/" + passedVal,
        success: function (result) {
            $("#grabbedForm").html(result);
            $("#rssFeedEdit").modal("show");
        }
    });

}





function deleteCatagory(passedVal) {
    $(".modal").modal('show');
    $("#deletingId").val(passedVal);
}


function deleteFinallyCatagory() {
    let deletingVal = ($("#deletingId").val());
    $(".modal").modal('hide');

    $.ajax({
        url: "/deletecatagory/" + deletingVal,
        success: function (result) {
            window.location.href = "/admin/catagories";
        }
    });
}





















function provideMailPass() {
    let tokenVal = $("#csrfToken").val();
    let adminmail = $("#adminmail").val();
    let adminpass = $("#adminpass").val();
    $("#loader").removeClass("d-none");
    $("#alertScs").addClass("d-none");



    $.post('/check-admin-old-mail-pass',
        {
            _token: tokenVal,
            oldmail: adminmail,
            oldPwd: adminpass,
        }).done(function (response) {
            $("#loader").addClass("d-none");

            if (response == 'mailunmatch') {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("Mail Not Matched!");
            } else if (response == 'passunmatch') {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("Passwords Not Matched!");
            } else if (response == 'tryagain') {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("Could not send mail. Try again!");
            } else {
                $("#alertdngr").addClass("d-none");
                $(".commonPart").addClass("d-none");
                $("#submitOtp").removeClass("d-none");
            }
        });

}











function checkMailChangeOTP() {
    let tokenVal = $("#csrfToken").val();
    let askingOtp = $("#otp").val();
    $("#loader").removeClass("d-none");
    $("#alertdngr").addClass("d-none");
    $("#alertScs").addClass("d-none");


    // same url as forget passwords otp checking url ----- 
    $.post('/check-admin-otp',
        {
            _token: tokenVal,
            askingOtp: askingOtp,
        }).done(function (response) {
            $("#loader").addClass('d-none');
            if (response == 'proceed') {
                $(".commonPart").addClass('d-none');
                $("#newEmail").removeClass('d-none');
            }
            else if (response == 'expires') {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("OTP time expired! Try again!...");
                $(".commonPart").addClass('d-none');
                $("#mailPart").removeClass('d-none');
            }
            else {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("OTP did not match!...");
            }
        });
}











function changeNewMail() {
    let newmail = $("#newmail").val();
    let tokenVal = $("#csrfToken").val();
    $("#loader").removeClass("d-none");



    $.post('/set-new-admin-mail',
        {
            _token: tokenVal,
            setnewmail: newmail,
        }).done(function (response) {
            $("#loader").addClass("d-none");
            if (response == 'success') {
                $("#alertScs").removeClass("d-none");
                $(".successMsg").html("Mail Changed Successfully!");
                setInterval(() => {
                    window.location.href = '/admin/change-admin-email';
                }, 1000);
            } else {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("Could not update mail. Try again!");
                $(".commonPart").addClass("d-none");
                $("#mailPart").removeClass("d-none");
            }
        });
}









function showData(passedThis) {

    let tokenVal = $("._token").val();
    let pageType = $(passedThis).val();



    $.post('/admin/get-particular-page-data',
        {
            _token: tokenVal,
            pageType: pageType,
        }).done(function (response) {
            $("#update_content").text(response);
        });
}






function activateInput(passedThis) {
    $(passedThis).parent().children("input").click();
}


function showImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(input).siblings('.user_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}













function pickImage1(passedThis) {
    $(".image1").click();
}

function pickImage2(passedThis) {
    $(".image2").click();
}

function pickImage3(passedThis) {
    $(".image3").click();
}

function pickImage4(passedThis) {
    $(".image4").click();
}

function pickImage5(passedThis) {
    $(".image5").click();
}

function pickImage6(passedThis) {
    $(".image6").click();
}





function showImgae1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".service1").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


function showImgae2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".service2").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


function showImgae3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".service3").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


function showImgae4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".service4").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


function showImgae5(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".service5").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


function showImgae6(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".service6").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}






function addNew(passedThis) {
    let toappenddiv = '<div class="add_details_line row">' +
        '<div class="form-group col-md-5">' +
        '<label>Qualification</label>' +
        '<input type="text" class="form-control" required name="qualification[]">' +
        '</div>' +
        '<div class="form-group col-md-5">' +
        '<label>Additional value</label>' +
        '<input type="number" class="form-control" required name="add_val[]">' +
        '</div>' +
        '<div class="col-md-2 pos_relative">' +
        '<div class="btn btn-danger btn-sm bnt_bottom" onclick="removeIt(this)">Remove</div>' +
        '</div>' +
        '</div>';
    $(".additonal_details").append(toappenddiv);
}




function removeIt(passedThis) {
    $(passedThis).parent().parent().remove();
}





function showAddNewPost(passedThis) {
    $(".showAddNewPost").removeClass("d-none");
    $(passedThis).remove();
}







function showMultipleImages(passedThis) {
    $("#multple_gallery").html('');
    for (var i = 0; i < $(passedThis)[0].files.length; i++) {
        $("#multple_gallery").append('<div class="gallery_line"><img src="' + window.URL.createObjectURL(passedThis.files[i]) + '"/></div>');
    }
}






function loadFile(event) {
    var image = document.getElementById('outPutImage');
    image.src = URL.createObjectURL(event.target.files[0]);
}



function loadFile2(event) {
    var image = document.getElementById('outPutImage2');
    image.src = URL.createObjectURL(event.target.files[0]);
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









function popupDetails(passedThis) {
    let dataSpecId = $(passedThis).data("id");
    let tokenVal = $(".tokenVal").val();
    $(".reply_id").val(dataSpecId);
    $("#showQuestionPopUp").modal("show");




    $.post('/admin/get-response-data',
        {
            _token: tokenVal,
            data_id: dataSpecId,
        }).done(function (response) {
            $(".replier_id").val(response[0].replier_id);
            $(".question_serial").val(response[0].question_serial);
            $(".qstnreply").html(response[0].user_answer);

            if (response[0].citation == 1) {
                $(".citation_btn").html("Already Citated! Remove From Citation.");
                $(".citation_btn").removeClass("btn-primary");
                $(".citation_btn").addClass("btn-danger");
            } else {
                $(".citation_btn").removeClass("btn-primary");
                $(".citation_btn").removeClass("btn-danger");
                $(".citation_btn").addClass("btn-primary");
                $(".citation_btn").html("Add For Citation");
            }
        });

}


















function showRelatedData(passedThis) {
    let dataSpecId = $(passedThis).data("id");
    let tokenVal = $(".tokenVal").val();
    $(".spec_id").val(dataSpecId);
    $("#question_reply").modal("show");




    $.post('/admin/get-question-specific-response',
        {
            _token: tokenVal,
            data_id: dataSpecId,
        }).done(function (response) {

            $(".edit_question_image").attr('src', response[0].question_image);
            $(".edit_question_title").val(response[0].title);

            let selected_value = response[0].user_type;
            // $(".edit_user_type option").each(function () {
            //     if ($(this).val() == selected_value) {
            //         $(this).attr("selected", "selected");
            //     }
            // });


            let selected_industries = response[0].industries_data;
            $(".edit_industry_data input").removeAttr("checked");

            $(".edit_industry_data input").each(function () {
                if (selected_industries.includes($(this).val())) {
                    $(this).attr("checked", "true");
                }
            });

            $(".deadline_time").val(response[0].deadline);
            $(".source").val(response[0].source);
            $(".edit_question_details").val(response[0].details);
            if (response[0].controller_id == null) {
                $(".user_type").html('Admin');
            }else{
                $(".user_type").html('Controller');
            }
        });

}










function showRelatedData2(passedThis) {
    let dataSpecId = $(passedThis).data("id");
    let tokenVal = $(".tokenVal").val();
    $(".spec_id").val(dataSpecId);
    $("#question_reply").modal("show");




    $.post('/admin/get-question-specific-response',
        {
            _token: tokenVal,
            data_id: dataSpecId,
        }).done(function (response) {

            $(".edit_question_image").attr('src', response[0].question_image);
            $(".edit_question_title").val(response[0].title);

            let selected_value = response[0].user_type;
            // $(".edit_user_type option").each(function () {
            //     if ($(this).val() == selected_value) {
            //         $(this).attr("selected", "selected");
            //     }
            // });


            let selected_industries = response[0].industries_data;
            $(".edit_industry_data input").removeAttr("checked");

            $(".edit_industry_data input").each(function () {
                if (selected_industries.includes($(this).val())) {
                    $(this).attr("checked", "true");
                }
            });

            $(".deadline").val(response[0].deadline);
            $(".comment_text").val(response[0].comment);
            $(".edit_question_details").html(response[0].details);
            $(".responses").html(response[0].tot_resp);

            let link = '/admin/see-experts-blog-view/' + response[0].question_id + '/' + response[0].title;
            $(".blog_link").attr("href", link);
        });

}
