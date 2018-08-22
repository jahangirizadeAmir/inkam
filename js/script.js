var model;
var simModel;
var price;
function menuShow() {
    var div = document.getElementById("menuDiv");
    div.style.display = "block";
    $('#itemLeft').addClass('blur');
    $('#icons').addClass('blur');
    $('#footer').addClass('blur');
    $('#showMenu').show();
    $('#menuDiv').removeClass('fadeOutRight').addClass('animated').addClass('fadeInRight');
    document.getElementById("menuShow").setAttribute("onclick", "hideMenu()");
}

function hideMenu() {
    var div = document.getElementById("menuDiv");
    $('#itemLeft').removeClass('blur');
    $('#icons').removeClass('blur');
    $('#footer').removeClass('blur');
    $('#showMenu').hide();
    $('#menuDiv').removeClass('fadeInRight').removeClass('animated').addClass('animated').addClass('fadeOutRight');
    document.getElementById("menuShow").setAttribute("src", "img/menuIcon.png");
    document.getElementById("menuShow").setAttribute("onclick", "menuShow()");
}
function show(e) {
    $('#part1').hide();
    $('#' + e).show();
}
function back(e) {
    $('#part1').show();
    $('#' + e).hide();
}
function step2Charge(e, g, f) {
    $('#part1Ghabz').hide();
    $('#part2Ghabz').hide();
    $('#part3Ghabz').hide();
    $('#part4Ghabz').hide();
    $('#' + e).hide();
    $('#' + g).show();
    f = typeof f !== 'undefined' ? f : '';
    if (f !== '') {
        $('#' + f).show();
    }
    var number = $('#number1').val();
    $('#number').val(number);
    $('#number2').val(number);
    $('#number3').val(number);
}
function add(e) {
    $('#' + e).addClass('animated').addClass('shake').addClass('infinite').removeClass('bounceInRight').removeClass('bounceInRight1').removeClass('bounceInRight2').removeClass('bounceInRight3');
}
function remove(e) {
    $('#' + e).removeClass('animated').removeClass('shake').removeClass('infinite');
}
function checkThis() {
    $('#AccBtnCharge').hide();
    var number = $('#number1').val();
    if (number.length > 2) {
        $('#checkThisIdDiv').show();
        $('#model').show();
    } else {
        changeSrcImg("Error");
        $("#hamrah").css("background-color", "#ddd");
        $("#irancell").css("background-color", "#ddd");
        $("#rightell").css("background-color", "#ddd");
        $("#model2").hide();
        $('#checkThisIdDiv').hide();
        $('#model').hide();
    }
    if (number.substring(0, 3) === '091' || number.substring(0, 3) === '099' || number.substring(0, 3) === '91' || number.substring(0, 3) === '99') {
        reload();
        $("#hamrah").css("background-color", "#53c4cd");
        $("#rightellDiv").show();
        $("#irancellDiv").show();
        $("#hamrahDiv").hide();
        $("#model2").hide();
        cheangeModel('3');
        model = 3;
    }
    if (number.substring(0, 3) === '093' || number.substring(0, 3) === "090" || number.substring(0, 3) === '094' ||
        number.substring(0, 3) === '93' || number.substring(0, 3) === "90" || number.substring(0, 3) === '94') {
        reload();
        $('#irancell').css("background-color", "#fee64d");
        $("#rightellDiv").show();
        $("#irancellDiv").hide();
        $("#hamrahDiv").show();
        cheangeModel('2');
        model = 2;
    }
    if (number.substring(0, 3) === "092" || number.substring(0, 3) === "92") {
        reload();
        $('#rightell').css("background-color", "#992b6c");
        $("#rightellDiv").hide();
        $("#irancellDiv").show();
        $("#hamrahDiv").show();
        cheangeModel('1');
        model = 1;
    }
}
function reload() {
    $("#hamrah").css("background-color", "#dddddd");
    $('#irancell').css("background-color", "#dddddd");
    $('#rightell').css("background-color", "#dddddd");

}
function checkBoxOne() {
    $('#AccBtnCharge').hide();
    var btnModel1, btnModel2, btnModel3, btnModel4, btnModel5, btnModel6;
    var btnModel26, btnModel25, btnModel24, btnModel23;
    if ($('#go').is(":checked")) {
        $('#price').hide();
        $('#lastPrice').val("");
        $('#priceSelect').fadeOut();
        $('#operatorList').show();
        $('#trabord').hide();
        btnModel1 = $('#btnModel1');
        btnModel2 = $('#btnModel2');
        btnModel3 = $('#btnModel3');
        btnModel4 = $('#btnModel4');
        btnModel6 = $('#btnModel6');
        btnModel5 = $('#btnModel5');
        btnModel23 = $('#btnModel23');
        btnModel24 = $('#btnModel24');
        btnModel25 = $('#btnModel25');
        btnModel26 = $('#btnModel26');
        btnModel1.removeClass("active");
        btnModel2.removeClass("active");
        btnModel3.removeClass("active");
        btnModel4.removeClass("active");
        btnModel5.removeClass("active");
        btnModel6.removeClass("active");
        btnModel23.removeClass("active");
        btnModel24.removeClass("active");
        btnModel25.removeClass("active");
        btnModel26.removeClass("active");
        $('#Baste').fadeOut();
        $('#modelSim').hide();
        $('#basteLong').hide();
        $('#basteSelect').hide();
        $('#basteLast').hide();
        $('#basteLastSelect').hide();
        if ($('#Onerightell').is(":checked")) {
            $('#Onerightell').prop('checked', false);
        }
        if ($('#OneIrancell').is(":checked")) {
            $('#OneIrancell').prop('checked', false);
        }
        if ($('#OneHamrah').is(":checked")) {
            $('#OneHamrah').prop('checked', false);
        }
        checkThis();
    } else {
        $('#Baste').fadeOut();
        $('#modelSim').hide();
        $('#basteLong').hide();
        $('#basteSelect').hide();
        $('#basteLast').hide();
        $('#basteLastSelect').hide();
        // $('#operatorList').hide();
        $('#price').hide();
        $('#lastPrice').val("");
        $('#priceSelect').fadeOut();
        btnModel1 = $('#btnModel1');
        btnModel2 = $('#btnModel2');
        btnModel3 = $('#btnModel3');
        btnModel4 = $('#btnModel4');
        btnModel6 = $('#btnModel6');
        btnModel5 = $('#btnModel5');
        btnModel23 = $('#btnModel23');
        btnModel24 = $('#btnModel24');
        btnModel25 = $('#btnModel25');
        btnModel26 = $('#btnModel26');
        btnModel1.removeClass("active");
        btnModel2.removeClass("active");
        btnModel3.removeClass("active");
        btnModel4.removeClass("active");
        btnModel5.removeClass("active");
        btnModel6.removeClass("active");
        btnModel23.removeClass("active");
        btnModel24.removeClass("active");
        btnModel25.removeClass("active");
        btnModel26.removeClass("active");
        $("#model2").hide();
        $('#trabord').show();
    }
}
function checkBoxTwo(e) {
    var btnModel1, btnModel2, btnModel3, btnModel4, btnModel5, btnModel6;
    var btnModel26, btnModel25, btnModel24, btnModel23;
    $('#AccBtnCharge').hide();
    btnModel1 = $('#btnModel1');
    btnModel2 = $('#btnModel2');
    btnModel3 = $('#btnModel3');
    btnModel4 = $('#btnModel4');
    btnModel6 = $('#btnModel6');
    btnModel5 = $('#btnModel5');
    btnModel23 = $('#btnModel23');
    btnModel24 = $('#btnModel24');
    btnModel25 = $('#btnModel25');
    btnModel26 = $('#btnModel26');
    btnModel1.removeClass("active");
    btnModel2.removeClass("active");
    btnModel3.removeClass("active");
    btnModel4.removeClass("active");
    btnModel5.removeClass("active");
    btnModel6.removeClass("active");
    btnModel23.removeClass("active");
    btnModel24.removeClass("active");
    btnModel25.removeClass("active");
    btnModel26.removeClass("active");
    $("#model2").hide();
    if (e === '1') {
        reload();
        $("#hamrah").css("background-color", "#53c4cd");
        $('#trabord').hide();
        cheangeModel('3');
        model = 3;
    }
    if (e === '2') {
        reload();
        $('#rightell').css("background-color", "#992b6c");
        $('#trabord').hide();
        cheangeModel('1');
        model = 1;
    }
    if (e === '3') {
        reload();
        $('#irancell').css("background-color", "#fee64d");
        $('#trabord').hide();
        cheangeModel('2');
        model = 2;
    }
}
function profileShow(e1, e2, e3) {
    $('#' + e1).show();
    $('#' + e2).hide();
    $('#' + e3).hide();
}
function ActiveThis(e) {
    var btnModel1, btnModel2, btnModel3, btnModel4, btnModel5, btnModel6;
    var btnModel26, btnModel25, btnModel24, btnModel23;
    $('#AccBtnCharge').hide();
    btnModel1 = $('#btnModel1');
    btnModel2 = $('#btnModel2');
    btnModel3 = $('#btnModel3');
    btnModel4 = $('#btnModel4');
    btnModel6 = $('#btnModel6');
    btnModel5 = $('#btnModel5');
    btnModel23 = $('#btnModel23');
    btnModel24 = $('#btnModel24');
    btnModel25 = $('#btnModel25');
    btnModel26 = $('#btnModel26');
    if (e === "btnModel2") {
        $('#price').show();
        $("#lastPrice").attr('disabled','disabled');

    } else {
        $('#price').hide();
        $("#lastPrice").removeAttr('disabled');
    }
    if (e === "btnModel3" || e === "btnModel23" || e === "btnModel24" || e === "btnModel25"|| e === "btnModel26") {
        $('#Baste').fadeIn();
        $('#modelSimText').text("می توانید یکی از مدلهای سیمکارت را انتخاب کنید");
        showModelSim();
        $('#basteLong').text("مدت زمان بسته را انتخاب کنید");
        $('#basteLast').text("حجم مورد نظر را وارد کنید");
        if( e === "btnModel23" || e === "btnModel24" || e === "btnModel25"|| e === "btnModel26"){
            $('#basteLong').show();
            if(e==="btnModel23"){
                simModel="2";
            }
            else if(e==="btnModel24"){
                simModel="3";
            }
            else if(e==="btnModel25"){
                simModel="1";
            }else if(e==="btnModel26"){
                simModel="4";
            }
            else{
                simModel='';
            }
        }
    } else {
        $('#Baste').hide();
        $('#modelSim').hide();
        $('#basteLong').hide();
        $('#basteSelect').hide();
        $('#basteLast').hide();
        $('#basteLastSelect').hide();
    }
    if (e === "btnModel4" || e === "btnModel5" || e === "btnModel6") {
        $('#price').show();
        btnModel4.removeClass("active");
        btnModel5.removeClass("active");
        btnModel6.removeClass("active");
    } else {
        btnModel1.removeClass("active");
        btnModel2.removeClass("active");
        btnModel3.removeClass("active");
    }
    $('#' + e).addClass("active");
    //irancell charge mostaghim
    if (model === 2) {
        if (e === "btnModel1") {
            $("#model2").show();
            btnModel6.css("visibility", "visible");
            $("#chargeModelLog").removeClass("col-lg-offset-2 col-md-offset-2 col-xs-offset-2 col-md-offset-2");
        } else if (e === "btnModel2" || e === "btnModel3") {
            $("#model2").hide();
        }
    }
    else if (model === 1) {
        if (e === "btnModel1") {
            $("#model2").show();
            btnModel6.css("visibility", "hidden");
            $("#chargeModelLog").addClass("col-lg-offset-2 col-md-offset-2 col-xs-offset-2 col-md-offset-2");
        } else if (e === "btnModel2" || e === "btnModel3") {
            $("#model2").hide();
        }
    } else {
        $("#model2").hide();
        if (e === "btnModel1") {
            $('#price').show();
        }
    }
    changeSrcImg(e);
}
function cheangeModel(e) {
    //e==1 =>rightell
    //e==2 =>irancell
    //e==3 =>hamrahAval
    var btnModel1, btnModel2, btnModel3, btnModel4, btnModel5, btnModel6;
    var btnModel26, btnModel25, btnModel24, btnModel23;
    btnModel1 = $('#btnModel1');
    btnModel2 = $('#btnModel2');
    btnModel3 = $('#btnModel3');
    btnModel4 = $('#btnModel4');
    btnModel6 = $('#btnModel6');
    btnModel5 = $('#btnModel5');
    btnModel23 = $('#btnModel23');
    btnModel24 = $('#btnModel24');
    btnModel25 = $('#btnModel25');
    btnModel26 = $('#btnModel26');
    if (e === '1') {
        $('.logoSmall').attr("src","img/rightell.png");
        btnModel1.removeClass("bgHamrahMode");
        btnModel2.removeClass("bgHamrahMode");
        btnModel3.removeClass("bgHamrahMode");
        btnModel4.removeClass("bgHamrahMode");
        btnModel5.removeClass("bgHamrahMode");
        btnModel6.removeClass("bgHamrahMode");
        btnModel23.removeClass("bgHamrahMode");
        btnModel24.removeClass("bgHamrahMode");
        btnModel25.removeClass("bgHamrahMode");
        btnModel26.removeClass("bgHamrahMode");
        btnModel1.removeClass("bgIrancellMode");
        btnModel2.removeClass("bgIrancellMode");
        btnModel3.removeClass("bgIrancellMode");
        btnModel4.removeClass("bgIrancellMode");
        btnModel5.removeClass("bgIrancellMode");
        btnModel6.removeClass("bgIrancellMode");
        btnModel23.removeClass("bgIrancellMode");
        btnModel24.removeClass("bgIrancellMode");
        btnModel25.removeClass("bgIrancellMode");
        btnModel26.removeClass("bgIrancellMode");
        btnModel1.addClass("bgRightellModel");
        btnModel2.addClass("bgRightellModel");
        btnModel3.addClass("bgRightellModel");
        btnModel4.addClass("bgRightellModel");
        btnModel5.addClass("bgRightellModel");
        btnModel6.addClass("bgRightellModel");
        btnModel23.addClass("bgRightellModel");
        btnModel24.addClass("bgRightellModel");
        btnModel25.addClass("bgRightellModel");
        btnModel26.addClass("bgRightellModel");
    }
    if (e === '2') {
        $('.logoSmall').attr("src","img/irancell.png");
        btnModel1.removeClass("bgHamrahMode");
        btnModel2.removeClass("bgHamrahMode");
        btnModel3.removeClass("bgHamrahMode");
        btnModel4.removeClass("bgHamrahMode");
        btnModel5.removeClass("bgHamrahMode");
        btnModel6.removeClass("bgHamrahMode");
        btnModel23.removeClass("bgHamrahMode");
        btnModel24.removeClass("bgHamrahMode");
        btnModel25.removeClass("bgHamrahMode");
        btnModel26.removeClass("bgHamrahMode");
        btnModel1.addClass("bgIrancellMode");
        btnModel2.addClass("bgIrancellMode");
        btnModel3.addClass("bgIrancellMode");
        btnModel4.addClass("bgIrancellMode");
        btnModel5.addClass("bgIrancellMode");
        btnModel6.addClass("bgIrancellMode");
        btnModel23.addClass("bgIrancellMode");
        btnModel24.addClass("bgIrancellMode");
        btnModel25.addClass("bgIrancellMode");
        btnModel26.addClass("bgIrancellMode");
        btnModel1.removeClass("bgRightellModel");
        btnModel2.removeClass("bgRightellModel");
        btnModel3.removeClass("bgRightellModel");
        btnModel4.removeClass("bgRightellModel");
        btnModel5.removeClass("bgRightellModel");
        btnModel6.removeClass("bgRightellModel");
        btnModel23.removeClass("bgRightellModel");
        btnModel24.removeClass("bgRightellModel");
        btnModel25.removeClass("bgRightellModel");
        btnModel26.removeClass("bgRightellModel");
    }
    if (e === '3') {
        $('.logoSmall').attr("src","img/hamrahAval.png");
        btnModel1.addClass("bgHamrahMode");
        btnModel2.addClass("bgHamrahMode");
        btnModel3.addClass("bgHamrahMode");
        btnModel4.addClass("bgHamrahMode");
        btnModel5.addClass("bgHamrahMode");
        btnModel6.addClass("bgHamrahMode");
        btnModel23.addClass("bgHamrahMode");
        btnModel24.addClass("bgHamrahMode");
        btnModel25.addClass("bgHamrahMode");
        btnModel26.addClass("bgHamrahMode");
        btnModel1.removeClass("bgIrancellMode");
        btnModel2.removeClass("bgIrancellMode");
        btnModel3.removeClass("bgIrancellMode");
        btnModel4.removeClass("bgIrancellMode");
        btnModel5.removeClass("bgIrancellMode");
        btnModel6.removeClass("bgIrancellMode");
        btnModel23.removeClass("bgIrancellMode");
        btnModel24.removeClass("bgIrancellMode");
        btnModel25.removeClass("bgIrancellMode");
        btnModel26.removeClass("bgIrancellMode");
        btnModel1.removeClass("bgRightellModel");
        btnModel2.removeClass("bgRightellModel");
        btnModel3.removeClass("bgRightellModel");
        btnModel4.removeClass("bgRightellModel");
        btnModel5.removeClass("bgRightellModel");
        btnModel6.removeClass("bgRightellModel");
        btnModel23.removeClass("bgRightellModel");
        btnModel24.removeClass("bgRightellModel");
        btnModel25.removeClass("bgRightellModel");
        btnModel26.removeClass("bgRightellModel");
    }
}
function fillPrice(e) {
    $('#lastPrice').val($('#' + e).attr("value"));
    $('#priceSelect').fadeOut();
    $('#AccBtnCharge').show();
}
function CheckPrice(e) {
    if (e.length > 1) {
        $('#priceSelect').fadeOut();
    } else {
        $('#priceSelect').fadeIn();
    }
}
function showPriceSelect(e) {
    if (e.length < 3) {
        $('#priceSelect').show();
    }
}
function showBaste() {
    $('#basteSelect').show();
}
function fillBaste(e,f) {
    $('#basteLong').text(e);
    $('#basteSelect').fadeOut();
    var last="";
    $('#basteLast').text("حجم مورد نظر را وارد کنید");
    var cot="'";
    //AJAX REQUEST FOR GET PACK;
    $.ajax({
        url:'ajax/getPack.php',
        data:{
            model: model,
            simModel: simModel,
            date:f
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data.length==0){
             last+='<li>موردی یافت نشد</li>';
            }else {
                for (i = 0; i < data.length; i++) {
                    last+='<li onclick="fillBasteLast(this.innerText,this.getAttribute('+cot+'value'+cot+'),this.getAttribute('+cot+'data-code'+cot+'))" value="'+data[i]['price']+'" data-code="'+data[i]['code']+'">'+data[i]['name']+'</li>';
                }
            }
            $('#basteLast').delay("slow").fadeIn();
            $('#basteLastSelect').html(last);
        }
    });
}
function showLastBaste() {
    $('#basteLastSelect').show();
}
function fillBasteLast(e,f,j) {
    var number = $('#number1').val();
    $('#basteLast').text(e);
    $('#basteLastSelect').fadeOut();
    $('#AccBtnCharge').show();
    e = e.split("-");
    price = f.replace(",","");
    $('#NameFacktor').text(e[0]);
    $("#NumberFacktor").text("شماره سرویس : "+number);
    $('#priceFacktor').text("مبلغ : "+f+" ریال ");
    $('#offerFacktor').text("مبلغ تخفیف شما : 0");
}
function showModelSim() {
    //e==1 =>rightell
    //e==2 =>irancell
    //e==3 =>hamrahAval
    if (model === 1) {
        $("#Sli4").show();
        $("#Sli1").hide();
    }
    if (model === 2) {
        $("#Sli4").hide();
        $("#Sli1").show();
    }
    if (model === 3) {
        $("#Sli1").hide();
        $("#Sli4").hide();
    }
    $('#modelSim').show();
}
function fillGetSim(e) {
    $('#modelSimText').text(e);
    $('#modelSim').fadeOut();
    $('#basteLong').delay("slow").fadeIn();
}
function changeSrcImg(id) {
    $("#imgbtnModel1").attr("src", "img/radio.png");
    $("#imgbtnModel2").attr("src", "img/radio.png");
    $("#imgbtnModel3").attr("src", "img/radio.png");
    $("#imgbtnModel6").attr("src", "img/radio.png");
    $("#imgbtnModel4").attr("src", "img/radio.png");
    $("#imgbtnModel5").attr("src", "img/radio.png");
    $("#imgbtnModel23").attr("src", "img/radio.png");
    $("#imgbtnModel24").attr("src", "img/radio.png");
    $("#imgbtnModel25").attr("src", "img/radio.png");
    $("#imgbtnModel26").attr("src", "img/radio.png");
    if(id=="btnModel4" || id=="btnModel5" || id=="btnModel6" ){
        $("#imgbtnModel1").attr("src", "img/radio_ok.png");
    }
    if(id=="btnModel23" ||id=="btnModel24" ||id=="btnModel25"||id=="btnModel26" ){
        $("#imgbtnModel3").attr("src", "img/radio_ok.png");
    }
    $("#img" + id).attr("src", "img/radio_ok.png");
}
function GoBank() {
    window.location.href="goBank.php?price="+price;
}
function inv() {
    var mobile = $('#input3').val();
    $.ajax({
        url:'ajax/invSend.php',
        data:{
            mobile: mobile
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){
                $("#okInv").text("پیام شما با موفقیت به شماره "+mobile+' ارسال شد .').show();
                $("#menuLeft2").click();
            }
        }
    });
}