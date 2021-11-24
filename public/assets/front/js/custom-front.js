function validationError(msg){
    html = "<ul class='parsley-errors-list filled' id='parsley-id-7' style='color:red;'><li class='parsley-required'>"+msg+"</li></ul>";
    return html;
}

/*clear error message*/
function clearError(){
    $(".parsley-errors-list.filled").each(function(){
        $(this).empty();
    });
}
  
function displayError(data){
    var result = JSON.parse(data);
    for (var key in result) {
        if(result[key]){
            html = validationError(result[key]);
            $("#"+key+"Err").parent().append(html);
            $("input[name='"+key+"']").addClass('parsley-error');
            $("select[name='"+key+"']").addClass('parsley-error');
        } else {
            $("input[name='"+key+"']").removeClass('parsley-error');
            $("select[name='"+key+"']").removeClass('parsley-error');
        }
    }
}

$(document).ready(function() {
    $('.main-option').on('click', function(e) {
        $('#main-option').hide();
        $('#sub-option').show();
    });
    $('.sub-option').on('click', function(e) {
        $('#main-option').show();
        $('#sub-option').hide();
    });

    $('.setup-radio').on('click', function(e){
        $('.setup').hide();
        $('.setup-'+$(this).val()).show();
    });
});

function destroy(id, link, returnlink){
    var id = id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: link,
        data: {
            'id': id
        },
        beforeSend: function () {
            $("#wait").css("display", "block");
        },
        complete: function () {
            $("#wait").css("display", "none");
        },
        success: function(data){
            location.href = returnlink;
        }, 
    });
}

$(document).on("submit", '#menu', function(event){
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: '/catering',
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function () {
            $("#wait").css("display", "block");
        },
        complete: function () {
            $("#wait").css("display", "none");
        },
        success: function(data){
            clearError();
            if(data=='success'){
                location.href = '/review';
            } else {
                displayError(data);
            }
        },
    });
});
//========= Check validate Form  ============

// Check email confirm
 function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

// Check phonenumber confirm
function isphonenumber(phonenumber) {
    var phoneno = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    if(phonenumber.match(phoneno)) {
        return true;
    }
    else {
        return false;
    }
}
function setError(input, mess){
    $(input).addClass("border-danger");
    $(input).parent().find("p").addClass("text-danger").html(mess);

}
function setSuccess(input){
    $(input).removeClass("border-danger").addClass('border-success');
    $(input).parent().find("p").removeClass("text-danger");
}
$(document).on("submit", '#details', function(event){
    event.preventDefault();
    // console.log("email");
    Fcontact =$('input[name="contact"]').val();
    Fname =$('input[name="name"]').val();
    Femail =$('input[name="email"]').val();
   
    if(Fname == "" &&  Fcontact == "" && Femail == "" ){
        setError($('input[name="name"]'),'This field is required');
        setError($('input[name="contact"]'),'This field is required');
        setError($('input[name="email"]'),'This field is required');
    }

    if(Fname == ""){
        setError($('input[name="name"]'),'The name not empty');
        return false;
    } 

    if(Fname != "" ){
        setSuccess($('input[name="name"]'));
    }
    if(Fcontact == ""){
        setError($('input[name="contact"]'),'Phone number not be empty');
        return false;
    }

    if( Fcontact !="" && isphonenumber(Fcontact) ){
        setSuccess($('input[name="contact"]'));
    } else if(Fcontact !="" && !isphonenumber(Fcontact) ){
        setError($('input[name="contact"]'),'Invalid phone number');
        return false;
    }

    if(Femail == ""){
        setError($('input[name="email"]'),'The email not be empty');
        return false;
    }
    if( Femail !="" && validateEmail(Femail) ){
        setSuccess($('input[name="email"]'));
    } else if(Femail !="" && !validateEmail(Femail) ){
        setError($('input[name="email"]'),'Invalid email');
        return false;
    }
    $.ajax({
        type: "POST",
        url: '/details',
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function () {
            $("#wait").css("display", "block");
        },
        complete: function () {
            $("#wait").css("display", "none");
        },
        success: function(data){
            clearError();
            console.log(data);
            swal("Oops...", "An error occurred. Pleas try again.", "success");
            if(data.status === 'success'){
                location.href = `${data.order}/success`;
            } else {
                displayError(data);
            }
        },
        error: function () {
            swal("Oops...", "An error occurred. Pleas try again.", "error");
        }
    });
});

$(document).on("submit", '#contact', function(event){
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: '/contact',
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function () {
            $("#wait").css("display", "block");
        },
        complete: function () {
            $("#wait").css("display", "none");
        },
        success: function(data){
            clearError();
            if(data=='success'){
                location.reload();
            } else {
                displayError(data);
            }
        },
    });
});

$(document).on("submit", '#editMenu', function(event){
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: '/edit-menu',
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function () {
            $("#wait").css("display", "block");
        },
        complete: function () {
            $("#wait").css("display", "none");
        },
        success: function(data){
            clearError();
            if(data=='success'){
                location.href = '/details';
            } else {
                displayError(data);
            }
        },
    });
});

// Breakfast Js event check border
$(document).on('click', '.check-breakfast', function () {
    if($(this).is(":checked")) {
        $('.check-breakfast').parent().parent().parent().parent().removeClass('border-custom');
        $(this).parent().parent().parent().parent().toggleClass('border-custom');
    }
})

$(document).on('click', '.setup-breakfast-radio', function () {
    if($(this).is(":checked")) {
        $('.setup-breakfast-radio').parent().removeClass('border-background');
        $(this).parent().toggleClass('border-background');
    }
})

// AM Tea event check border
$(document).on('click', '.check-border-input', function () {
    if($(this).is(":checked")) {
        $('.check-border-input').parent().parent().parent().parent().parent().removeClass('border-custom');
        $(this).parent().parent().parent().parent().parent().toggleClass('border-custom');
    }
})

// Dinner event check border
$(document).on('click', '.check-dinner-input', function () {
    if($(this).is(":checked")) {
        $('.check-dinner-input').parent().parent().parent().parent().parent().removeClass('border-custom');
        $(this).parent().parent().parent().parent().parent().toggleClass('border-custom');
    }
})
$(document).on('click', '.setup-dinner-radio', function () {
    if($(this).is(":checked")) {
        $('.setup-dinner-radio').parent().removeClass('border-background');
        $(this).parent().toggleClass('border-background');
    }
})

// Island  event check border

$(document).on('click', '.checkbox-island', function () {
    if($(this).is(":checked")) {
        if($(this).is(":checked")) {
            $('.checkbox-island').parent().parent().removeClass('border-custom');
            $(this).parent().parent().toggleClass('border-custom');
        }
    }
})
$(document).on('click', '.island-options,.high-tea-options', function () {
    if($(this).is(":checked")) {
        // $('.island-options').parent().removeClass('border-background');
        $(this).parent().addClass('border-background');
    } else{
        $(this).parent().removeClass('border-background');
    }
})

// Graze event check border
$(document).on('click', '.check-more-input', function () {
    if($(this).is(":checked")) {
        $('.check-more-input').parent().parent().removeClass('border-custom');
        $(this).parent().parent().toggleClass('border-custom');
    }
})
// Hight Tea event check border
$(document).on('click', '.high-tea,.platter', function () {
    if($(this).is(":checked")) {
        $('.high-tea').parent().parent().parent().removeClass('border-custom');
        $('.platter').parent().parent().parent().removeClass('border-custom');
        $(this).parent().parent().parent().toggleClass('border-custom');
    }
})

$(document).on('click', '.platter-walk-setup', function () {
    if($(this).is(":checked")) {
        $('.platter-walk-setup').parent().parent().parent().removeClass('border-custom');
        $(this).parent().parent().parent().toggleClass('border-custom');
    }
})
$(document).on('click', '.xmas-themed', function () {
    if($(this).is(":checked")) {
        // $('.island-options').parent().removeClass('border-background');
        $(this).parent().parent().parent().addClass('border-custom');
    } else{
        $(this).parent().parent().parent().removeClass('border-custom');
    }
})

// Add event click show check item 
$(function () {
    // showTime = $('#datetimepicker1').val();
    // console.log(showTime);
    // if(showTime){
    //     $('.delivery-show-time').append(`<p>${showTime}</p>`);
    // }
    // var d = $('#datetimepicker1').datetimepicker('getDate');
    // console.log(d);
    // $('#delivery-show-time').append(d);
   
})
