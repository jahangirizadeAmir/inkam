function EditPrifile() {
    $('#EditSuc').hide();
    $('#EditError').hide();
    let name,code,password,old;
    name = $('#editName').val();
    code = $('#editCode').val();
    password = $('#editPassword').val();
    old = $('#OldeditPassword').val();
    $.ajax({
        url:'ajax/editProfile.php',
        data:{
            pwd:password,
            name:name,
            code:code,
            old:old
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){
                $('#EditSuc').show();
                $('#nameUser').html('<i class="fas fa-sort-down" style="    font-size: 18px;\n' +
                    '    position: absolute;\n' +
                    '    left: 21px;\n' +
                    '    top: 8px;"></i>'+name+'');
            }else{
                $('#EditError').show().text(data['MSG']);
            }
        }
    });
}