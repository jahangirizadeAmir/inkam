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
                if(code!==''){
                    $("#editCode").attr('disabled','disabled');
                }
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

function ProfileChange(e) {
    $('#userOption').show();
    $('#homeDashbord').hide();
    $('#report').hide();
    $('#MyUser').hide();
    $('#contactListP').hide();
    $('#miniDashbord').hide();
    $('#menuProfile').hide();
    $('#userProfile').hide();
    $('#subReport').slideUp();
    menuShow();
    $('#' + e).show();
}

// let RModelPardakhtVar,trakoneshVar,RAddRemoveVar,RProductVar;
// function RTarakonesh() {
//     // $('#RTrakonesh').val("p1").change();
//     trakoneshVar = $('#RTrakonesh').val();
//         if (trakoneshVar === 'p2') {
//             $('#Rsearch').prop("disabled", true);
//             $('#RAddRemove').val("p4").change().prop("disabled", true);
//         } else {
//             if(RModelPardakhtVar==='p5' || RProductVar==='p10'){
//
//
//             }else {
//                 $('#RAddRemove').prop("disabled", false);
//             }
//
//             if( RProductVar==='p10') {
//                 $('#Rsearch').prop("disabled", true);
//             }else{
//                 $('#Rsearch').prop("disabled", false);
//             }
//         }
//
//
// }
// function RAddRemove() {
//
//
//     RAddRemoveVar = $('#RAddRemove').val();
//
//
//         if (RAddRemoveVar === 'p3') {
//             $('#RTrakonesh').val("p1").change().prop("disabled", true);
//         } else {
//             if (RAddRemoveVar === 'p4') {
//                 $('#RModelPardakht').val("p6").change().prop("disabled", true);
//             }else{
//                 $('#RModelPardakht').prop("disabled", false);
//             }
//             if(RProductVar!=='p10'){
//                 $('#RTrakonesh').prop("disabled", false);
//             }
//         }
// }
// function RModelPardakht() {
//     RModelPardakhtVar = $('#RModelPardakht').val();
//     if(RModelPardakhtVar==='p5'){
//         $('#RTrakonesh').val("p1").change().prop("disabled", true);
//     }else{
//
//         $('#RTrakonesh').prop("disabled", false);
//         $('#RAddRemove').prop("disabled", false);
//     }
// }
// function RProduct() {
//
//     RProductVar = $("#RProduct").val();
//     if(RProductVar==='p10'){
//         $('#RTrakonesh').val("p1").change().prop("disabled", true);
//         $('#RModelPardakht').val("p5").change().prop("disabled", true);
//         $('#RAddRemove').val("p4").change().prop("disabled", true);
//     }else{
//         $('#RModelPardakht').prop("disabled", false);
//     }
//
// }

function FilterTabelReport() {
    let RModelPardakhtVar,trakoneshVar,RAddRemoveVar,RProductVar,Rsearch,StartDate,EndDate;
    trakoneshVar = $('#RTrakonesh').val();
    RProductVar = $("#RProduct").val();
    RModelPardakhtVar = $('#RModelPardakht').val();
    RAddRemoveVar = $('#RAddRemove').val();
    Rsearch=$('#Rsearch').val();
    StartDate=$('#goDate4').val();
    EndDate=$('#goDate5').val();


    $.ajax({
        url:'ajax/filterReport.php',
        data:{

            modelPardakht:RModelPardakhtVar,
            trakoneshVar:trakoneshVar,
            RAddRemoveVar:RAddRemoveVar,
            RProductVar:RProductVar,
            Rsearch:Rsearch,
            stratDate:StartDate,
            endDate:EndDate

        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){
                $('#ReportTBody').html("").html(data["html"]);
                //myBuyeMyWalet//myUserMyWalet//myUserBuy
                // "myBuy"=>$myBuy,"allUserBuy"=>$allUserBuy,"userBuyMyWalet"=>$UserBuyMyWalet
                if(data['myBuy']!=='') {
                    $('#myBuyeMyWalet').html(data['myBuy']);
                    $('#myUserMyWalet').html(data['userBuyMyWalet']);
                    $('#myUserBuy').html(data['allUserBuy']);
                }
            }
        }
    });
}