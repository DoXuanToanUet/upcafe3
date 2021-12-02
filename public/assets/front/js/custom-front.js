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

$(document).on("submit", '#details', function(event){
    event.preventDefault();
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
function checkNoneSelect(input){
    $(input).each(function (){
        count = $(this).find('.countSelectDinner').html();
        intCount = parseInt(count);
    
        if(intCount == 0){
            console.log($(this));
            $(this).find('input[type="checkbox"]').prop("disabled",true);
        }
    })  
    
}
$(document).on('click', '.check-dinner-input', function () {
   
    if($(this).is(":checked")) {
        $('.check-dinner-input').parent().parent().parent().parent().parent().removeClass('border-custom');
        $(this).parent().parent().parent().parent().parent().toggleClass('border-custom');
        // $('#menu').trigger("reset");
        $('.form-check-input').prop("disabled",false);
        $('.form-check-input.carvery-input').prop('checked',false);
        $('.form-check-input.hot-input').prop('checked',false);
        $('.form-check-input.seafood-input').prop('checked',false);
        $('.form-check-input.salad-input').prop('checked',false);
        $('.form-check-input.sweet-input').prop('checked',false);
      
        checkNoneSelect('.cavery-option');
        checkNoneSelect('.hot-option');
        checkNoneSelect('.seafood-option');
        checkNoneSelect('.salad-option');
        checkNoneSelect('.sweet-option');
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

// Scroll left sidebar event
$(".left-sidebar-scroll").scroll(function (){
    var scrollCount = $(this).scrollTop();
    if (scrollCount > 50) {
        $('.main-logo').css('display','none');
      } else {
        $('.main-logo').css('display','block');
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


// Js click Carvery will limit select 
// limit =$('.cavery-option .countSelectCarvery').html();
// countlimt = parseInt(limit);
// console.log(limit);

// $('.cavery-option input[type="checkbox"]').on('change', function(evt) {
//     // console.log("carvery");
//     limit = $(this).parent().parent().parent().find('.countSelectDinner').html();
//     countlimit = parseInt(limit);
//     if($(".option-dinner0 .carvery-input:checked").length >=countlimit) {
        
//         $(".option-dinner0 .carvery-input").not(":checked").attr("disabled",true);
//     } else{
//         $(".option-dinner0 .carvery-input").not(":checked").attr("disabled",false);
//     }
//  });


//  function countSelectDinner(input){
    
//     $(input).each(function (){
       
//         $(this).on('change', function(){
//             limit = $(this).parent().parent().parent().find('.countSelectDinner').html();
//             countlimit = parseInt(limit);
//            countLengthSelect=$(this).parent().parent().parent().parent().find('input[type="checkbox"]:checked').length;

//             //  Other case  
//            if(countLengthSelect >= countlimit){
//                $(this).parent().parent().parent().parent().find('input[type="checkbox"]').not(":checked").attr("disabled",true);
//            }
//            else{
//                $(this).parent().parent().parent().parent().find('input[type="checkbox"]').not(":checked").attr("disabled",false);
//            }
//         })
//     })
//  }
//  countSelectDinner('.cavery-option input[type="checkbox"]');
//  countSelectDinner('.hot-option input[type="checkbox"]');
//  countSelectDinner('.seafood-option input[type="checkbox"]');
//  countSelectDinner('.salad-option input[type="checkbox"]');
//  countSelectDinner('.sweet-option input[type="checkbox"]');
//  $('.cavery-option input[type="checkbox"]').each(function (){
//      $(this).on('change', function(){
//          limit = $(this).parent().parent().parent().find('.countSelectDinner').html();
//          countlimit = parseInt(limit);
//         countLengthSelect=$(this).parent().parent().parent().parent().find('input[type="checkbox"]:checked').length;
//         if(countLengthSelect >= countlimit){
//             $(this).parent().parent().parent().parent().find('input[type="checkbox"]').not(":checked").attr("disabled",true);
//         }else{
//             $(this).parent().parent().parent().parent().find('input[type="checkbox"]').not(":checked").attr("disabled",false);
//         }
//      } )
//  })
 
//  $('.option-dinner1 .cavery-option input[type="checkbox"]').on('change', function(evt) {
//     limit = $(this).parent().parent().parent().find('.countSelectDinner').html();
//     countlimit = parseInt(limit);
//     if($(".option-dinner1 .carvery-input:checked").length >=countlimit) {
        
//         $(".option-dinner1 .carvery-input").not(":checked").attr("disabled",true);
//     } else{
//         $(".option-dinner1 .carvery-input").not(":checked").attr("disabled",false);
//     }
//  });

 
//  $('.option-dinner0 .hot-option input[type="checkbox"]').on('change', function(evt) {
//     console.log("carvery");
//     limit = $(this).parent().parent().parent().find('.countSelectDinner').html();
//     countlimit = parseInt(limit);
//     console.log(countlimit);
//     if($(".option-dinner0 .hot-input:checked").length >=countlimit) {
        
//         $(".option-dinner0 .hot-input").not(":checked").attr("disabled",true);
//     } else{
//         $(".option-dinner0 .hot-input").not(":checked").attr("disabled",false);
//     }
//  });

