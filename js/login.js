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
            if(data['Error']===false){
                $("#btnSms").html('بعدی');
                if(data['Sms']===true){
                    $('#loginSubmitStep2').show();
                    $('#btnSms').hide();
                }else{
                    $('#myModal').modal('hide');
                    $('#myModal3').modal('show');
                }
            }else{
                $('#loginSubmitError').show();
            }
        }
    });
}

function submit() {

    $('#submitError').hide();
    var name,pwd,code;
    name = $('#name').val();
    pwd = $('#pwd').val();
    code = $('#codeAgent').val();
    if(name===''){
        $('#name').css("border","2px solid red");
        $('#errorSubmit').text('ورود نام اجباریست');
        $('#submitError').show();
        return;
    }if(pwd===''){
        $('#pwd').css("border","2px solid red");
        $('#errorSubmit').text('ورود رمز عبور اجباریست');
        $('#submitError').show();
        return;
    }
    if(pwd.length<6){
        $('#pwd').css("border","2px solid red");
        $('#errorSubmit').text('رمز عبور می بایست حداقل ۶ کارکتر باشد.');
        $('#submitError').show();
        return;
    }
    $.ajax({
        url: 'ajax/submit.php',
        data: {
            name: name,
            pwd: pwd,
            code:code
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data['Error']===false){
                login(pwd);
            }else{
                $('#errorSubmit').text(data['MSG']);
                $('#submitError').show();
            }
        }
    });

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
