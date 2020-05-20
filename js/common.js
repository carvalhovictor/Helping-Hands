$(document).ready(function(){

    $('.open-login-modal').click(function() {
        $('body').removeClass('off-canvas-right-active');
        $('#login-modal').addClass('is-visible');
    });

    $('.open-register-modal').click(function() {
        $('body').removeClass('off-canvas-right-active');
        $('#register-modal').addClass('is-visible');
    });

    $('.lrm-close-form').click(function() {
        $('.lrm-user-modal').removeClass('is-visible');
        
        $('.lrm-switcher li a').removeClass('selected');
        $('.tab-content').removeClass('is-selected');

        $('.lrm-switcher li:first-child a').addClass('selected');
        $('#tab-1, #tab-3').addClass('is-selected');
    });

    $('.lrm-switcher li a').click(function(){
        var tab_id = $(this).attr('data-tab');

        $('.lrm-switcher li a').removeClass('selected');
        $('.tab-content').removeClass('is-selected');

        $(this).addClass('selected');
        $("#"+tab_id).addClass('is-selected');
    });


    $('ul.menu li.menu-item-has-children').each(function () {
        var menuItem = $(this)
        var menuToggle = $('<span class="menu-item-toggle"><span></span></span>')
    
        menuToggle.insertAfter(menuItem.find('> a'))
          .on('click', function () {
            menuItem.toggleClass('menu-item-expand')
          })
    })

    $('.off-canvas-toggle').offCanvasToggle();
    checkPage();

    function checkPage() {
        var path = window.location.pathname;
        var page = path.split("/").pop();

        if (page == 'hourly.php' || page == 'daily.php' || page == 'about.php' || page == 'profile.php') {
            $('body').addClass('sidebar-right');
        }
    }

})

$.fn['offCanvasToggle'] = function() {
    return this.each(function() {
        var activeClass = $(this).attr('data-target') + '-active';

        $(this).on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            $('body').toggleClass(activeClass);
        });

        $(document).on('click', function() {
            $('body').removeClass(activeClass);
        });

        $('.off-canvas').on('click', function(e) {
            e.stopPropagation();
        });
    });
};

$("#submitForm").click(function() {
    $(this).attr("disabled", true);
    var usertype = $("#usertype").val();
    (usertype == 1) ? getNurseInfo() : getSeniorInfo();
});

function getNurseInfo() {
    var fName = $("#inputName").val();
    var lName = $("#inputLastname").val();
    var lNumber = $("#licenseNumber").val();
    var skills = $("#skills").val();
    var iAddress = $("#inputAddress").val();
    var iCity = $("#inputCity").val();
    var iState = $("#inputState").val();
    var iZip = $("#inputZip").val();
    return {
        fName: fName,
        lName: lName,
        lNumber: lNumber,
        skills: skills,
        iAddress: iAddress,
        iCity: iCity,
        iState: iState,
        iZip: iZip
    };
}

function postNurseData() {
    var arr = [];
    var nurseInfo = getNurseInfo();
    var self = $(this);

    $(".schedule").each(function() {
        var day = $(this).find("input");
        var dayIsChecked = $(day).is(':checked');
        var dayName = $(day).val();
        var schedules = $(this).find("select");
        var schedule = $(schedules[0]).val() + $(schedules[1]).val();
        var obj = {
            day: dayName,
            active: dayIsChecked,
            schedule: schedule
        };
        arr.push(obj);
    });

    $.ajax({
        type: "POST",
        url: 'PHP/Nurse_Profile.php',
        data: {
            schedule: arr,
            nurseid: 1,
            nurseInfo: nurseInfo
        },
        success: function(success) {
            $(self).attr("disabled", false);
            alert("Your profile has been updated successfully.");
            console.log(success);
        },
        error: function(error) {
            $(self).attr("disabled", false);
            alert("An error occurred while updating your profile.");
            console.log(error);
        },
        dataType: 'json'
    });
}

$("input:checkbox").change(function() {
    var parent = $(this).parent().parent().parent();
    var children = parent.find("select");
    if ($(this).is(':checked')) {
        children.attr("disabled", false);
    } else {
        children.attr("disabled", true);
    }
});

$(document).ready(function() {
    $("#but_upload").click(function() {
        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file', files);

        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $("#img").attr("src", response);
                    $(".preview img").show(); 
                } else {
                    alert('file not uploaded');
                }
            },
        });
    });
});

function getSeniorInfo() {
    var fName = $("#inputName").val();
    var lName = $("#inputLastname").val();
    //var pNumber = $("#phoneNumber").val();
    var description = $("#description").val();
    var iAddress = $("#inputAddress").val();
    var iCity = $("#inputCity").val();
    var iState = $("#inputState").val();
    var iZip = $("#inputZip").val();
    return {
        fName: fName,
        lName: lName,
        pNumber: pNumber,
        description: description,
        iAddress: iAddress,
        iCity: iCity,
        iState: iState,
        iZip: iZip
    };
}

function postSeniorData() {
    var seniorInfo = getSeniorInfo();
    var self = $(this);

    $.ajax({
        type: "POST",
        url: 'PHP/Senior_Profile.php',
        data: {
            seniorId: 3,
            seniorInfo: seniorInfo
        },
        success: function(success) {
            $(self).attr("disabled", false);
            alert("Your profile has been updated successfully.");
            console.log(success);
        },
        error: function(error) {
            $(self).attr("disabled", false);
            alert("An error occurred while updating your profile.");
            console.log(error);
        },
        dataType: 'json'
    });
}

