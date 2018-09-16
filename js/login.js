localStorage.setItem("sms","true");
localStorage.setItem("submit","true");
localStorage.setItem("recover","true");

function submitCode() {
    $('#loginSubmitError').hide();
    $('#loginSubmitErrorCode').hide();
    var code = $('#code').val();
    $.ajax({
        url:'ajax/submitCode.php',
        data:{
            code: code
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data['Error']===false){
                $('#myModal').modal('toggle');
                $('#myModal1').modal();
            }else{
                $('#loginSubmitErrorCode').show();
            }
        }
    });
}
function hideFirstLogin() {
    $('#loginSubmitStep2').hide();
    $('#btnSms').show();
}
function errorHide() {
    $('#loginSubmitError').hide();
    $('#loginSubmitErrorCode').hide();
}

function firstLogin() {
    if(localStorage.getItem("sms")=='true') {
        localStorage.setItem("sms","false");
        let check = localStorage.getItem("Sms");
        $("#btnSms").html('<i class="fas fa-spinner fa-spin"></i>');
        $('#loginSubmitError').hide();
        $('#loginSubmitErrorCode').hide();
        var mobile = $('#mobile').val();
        $.ajax({
            url: 'ajax/checkSubmitOrLogin.php',
            data: {
                mobile: mobile
            },
            dataType: 'json',
            type: 'POST',

            success: function (data) {
                localStorage.setItem("sms","true");
                if (data['Error'] === false) {
                    $("#btnSms").html('بعدی');
                    if (data['Sms'] === true) {
                        $('#loginSubmitStep2').show();
                        $('#btnSms').hide();
                    } else {
                        $('#myModal').modal('hide');
                        $('#myModal3').modal('show');
                    }
                } else {
                    $('#loginSubmitError').show();
                    $("#btnSms").html('بعدی');
                }
            }
        });
    }
}

function submit() {
    if(localStorage.getItem("submit")==='true') {
        localStorage.setItem("submit","false");
        $('#submitError').hide();
        var name, pwd, code;
        name = $('#name').val();
        pwd = $('#pwd').val();
        code = $('#codeAgent').val();
        if (name === '') {
            $('#name').css("border", "2px solid red");
            $('#errorSubmit').text('ورود نام اجباریست');
            $('#submitError').show();
            return;
        }
        if (pwd === '') {
            $('#pwd').css("border", "2px solid red");
            $('#errorSubmit').text('ورود رمز عبور اجباریست');
            $('#submitError').show();
            return;
        }
        if (pwd.length < 6) {
            $('#pwd').css("border", "2px solid red");
            $('#errorSubmit').text('رمز عبور می بایست حداقل ۶ کارکتر باشد.');
            $('#submitError').show();
            return;
        }
        $('#submitButton').attr("Onclick", "");

        $.ajax({
            url: 'ajax/submit.php',
            data: {
                name: name,
                pwd: pwd,
                code: code
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                localStorage.setItem("submit","true");

                if (data['Error'] === false) {
                    login(pwd);
                } else {
                    $('#errorSubmit').text(data['MSG']);
                    $('#submitError').show();
                }
            }
        });
    }

}

function login(sq) {
    var pwd;
    if(sq!==''){
        pwd = sq;
    }else {
        pwd = $('#password').val();
    }
    $.ajax({
        url: 'ajax/login.php',
        data: {
            pwd: pwd
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data['Error']===false){
                $('#myModal3').modal('hide');
                $('#myModal2').modal('hide');
                $('#myModal1').modal('hide');
                $('#myModal').modal('hide');
                $('#menuShow').show();
                $('#nameUser').text(data['userName']).show();
                $('#loginSubmitBtn').hide();
                location.reload();
            }else{
                $('#loginError').show();
            }
        }
    });
}
function showProfileMenu(){
     $("#menuProfile").show();

}
$(document).mouseup(function(e)
{
    var container = $("#menuProfile");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0 )
    {
        container.hide();
    }
});


function firstRecover() {
    if(localStorage.getItem("recover")=='true') {
        localStorage.setItem("recover","false");
        $("#SendSmsReCover").html('<i class="fas fa-spinner fa-spin"></i>');

        $.ajax({
            url: 'ajax/newRecoverPassword.php',
            data: {},
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                localStorage.setItem("recover","true");
                if (data["Error"] === false) {
                    $('#myModal3').modal('toggle');
                    $('#myModal12').modal();
                    $("#SendSmsReCover").html('بازیابی کلمه عبور');

                }
            }
        });
    }

}
function recoverPassword() {
    $('#ForegetError').hide();
    let a = $('#nemberBack').val();
    $.ajax({
        url:'ajax/smsCheckRecoverPassword.php',
        data:{
            code:a
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){
                $('#codeRecover').hide();
                $('#newPassword').show();
                $('#recoverBtn').text("تغییر رمز عبور");
                $('#recoverBtn').attr("onclick","recoverLast()");
            }else{
                $('#ForegetError').show();
            }
        }
    });
}
function recoverLast() {
    let password = $('#passrecover').val();
    $.ajax({
        url:'ajax/lastRecoverPassword.php',
        data:{
            password:password
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){
                location.reload();
            }else{

            }
        }
    });
}
