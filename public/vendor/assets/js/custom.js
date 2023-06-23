function clickToChangeLogo(passedThis) {
    $(".comp_logo_input").click();
}


function showMultipleImages(passedThis) {
    $("#multple_gallery").html('');
    for (var i = 0; i < $(passedThis)[0].files.length; i++) {
        $("#multple_gallery").append('<div class="gallery_line"><img src="' + window.URL.createObjectURL(passedThis.files[i]) + '"/></div>');
    }
}




function showParticularimage(passedThis) {
    $(".photo_line").removeClass("active_line");
    $(passedThis).addClass("active_line");
    let prod_pic = $(passedThis).children(".prod_pic").attr("src")
    $(".prod_img").attr("src", prod_pic);
}



function showSpecImage(passedThis) {
    let imgSource = $(passedThis).children('img').attr("src");
    $(".item_img").attr("src", imgSource);
    $(".gallery_line").removeClass("activated_line");
    $(passedThis).addClass("activated_line");
}



var starVal = $(".productNumber").val();
var per_unit = $(".per_unit").val();


function calculateAmount(passedParam) {
    let currVal = $(passedParam).val();
    if (currVal < starVal) {
        currVal = starVal;
        $(".productNumber").val(starVal);
    }

    let calcVal = (per_unit * currVal);
    $(".subtotal_amount").html("$" + calcVal);
}









function submitForm(event) {
    event.preventDefault();
    $("#purchase").html('<span class="spinner"></span>');

    $.ajax({
        url: '/accept-order-request',
        method: 'POST',
        data: $('#paymentForm').serialize(),
        success: function (response) {
            if (response == 'success') {
                $("#purchase").remove();
                $("#payment_successful").removeClass('d-none');
            } else {
                $("#purchase").html('Could Not Send. Try Again');
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}






function review_point(passedThis) {
    $(".review_stars").val(passedThis);

    $(".review_icon").removeClass("fa-star");
    $(".review_icon").removeClass("fa-star-o");

    for (let i = 1; i < 6; i++) {
        if (i < (passedThis + 1)) {
            $(".review_icon:nth-child(" + i + ")").removeClass("fa-star-o");
            $(".review_icon:nth-child(" + i + ")").addClass("fa-star");
        } else {
            $(".review_icon:nth-child(" + i + ")").removeClass("fa-star");
            $(".review_icon:nth-child(" + i + ")").addClass("fa-star-o");
        }
    }

}






function copyUrl(passedParam) {
    navigator.clipboard.writeText(passedParam);
    alert("Copied");
}





function readmorebtn(passedThis) {
    if ($(passedThis).parent().children(".read_total").hasClass('d-none')) {
        $(passedThis).html("Read Less");
        $(passedThis).parent().children(".prod_short_desc").addClass('d-none');
        $(passedThis).parent().children(".read_total").removeClass('d-none');
    } else {
        $(passedThis).html("Read More");
        $(passedThis).parent().children(".prod_short_desc").removeClass('d-none');
        $(passedThis).parent().children(".read_total").addClass('d-none');
    }
}









function showReview(passedThis) {
    let dataid = $(passedThis).attr("data-id");
    $(".review_star_icons").html("");
    $(".review_text").html("");
    $.ajax({
        url: '/get-order-review/' + dataid,
        method: 'GET',
        success: function (response) {
            if (response == 'empty') {
                $(".review_text").html("No Review Yet!");
            } else {
                $(".review_text").html(response[0].review_text);

                for (let i = 0; i < response[0].review_stars; i++) {
                    $(".review_star_icons").append('<i class="fa text-warning review_icon fa-star"></i>');
                }
                for (let i = 0; i < (5 - (response[0].review_stars)); i++) {
                    $(".review_star_icons").append('<i class="fa text-warning review_icon fa-star-o"></i>');
                }
            }
            $("#review_popup").modal("show");
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}








function copy_link(passedThis) {
    var textToCopy = $(passedThis).attr("data-link");
    var tempInput = $("<input>");
    $("body").append(tempInput);
    tempInput.val(textToCopy).select();
    document.execCommand("copy");
    tempInput.remove();
    $(passedThis).html("Link Copied!");
}





function skipItem(passedEvent) {
    $(passedEvent).parent().parent().parent().parent().remove();
}



function answerPopup(passedParam) {
    let thisdataid = $(passedParam).attr("data-id");
    $(".question_serial").val(thisdataid);





    $.ajax({
        url: '/see-specific-admin-question/' + thisdataid,
        method: 'GET',
        success: function (response) {
            if (response == 'empty') {
                $(".headline_user_reply").val("");
                $(".user_answer").val("");
                $(".submit_answer").removeClass("d-none");
                $('.headline_user_reply').prop('disabled', false);
                $('.user_answer').prop('disabled', false);
            } else {
                $(".headline_user_reply").val(response[0].answer_headline);
                $(".user_answer").val(response[0].user_answer);
                var currentDate = new Date();
                var targetDate = new Date(response[0].deadline);
                // console.log(currentDate + " <- today | target-> " + targetDate);
                if (currentDate > targetDate) {
                    $(".submit_answer").addClass("d-none");
                    $('.headline_user_reply').prop('disabled', true);
                    $('.user_answer').prop('disabled', true);
                } else {
                    $(".submit_answer").removeClass("d-none");
                    $('.headline_user_reply').prop('disabled', false);
                    $('.user_answer').prop('disabled', false);
                }
            }
            $("#answer_question").modal("show");
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}











function show_spec_part(passedEvent) {
    let thisdataid = $(passedEvent).attr("data-id");
    $(".grid_particle").removeClass("activated_part");
    $(passedEvent).addClass("activated_part");

    $(".common_tables").addClass("d-none");
    $("#" + thisdataid).removeClass("d-none");
}



function copyText(passedEvent) {
    let linkUrl = $(passedEvent).attr("data-url");
    var tempInput = $('<input>');
    tempInput.val(linkUrl);
    $('body').append(tempInput);
    tempInput.select();
    document.execCommand('copy');
    tempInput.remove();
    $(passedEvent).html("Link Copied!");
    setTimeout(() => {
        $(passedEvent).html("Copy URL");
    }, 3500);
}