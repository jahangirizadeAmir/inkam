let model;
let simModel;
let price;
let codeBaste;
let amazing;
let textSharj;
let modelSharj;

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
    $('#part1').addClass("animated lightSpeedOut")
    setTimeout(function() {

            $('#ghabzStep2').hide();
            $('#chargePart2Baste').hide();
            $('#bilit').hide();
            $('#footerIcon').show();
            $('#footerIcon').addClass("animated lightSpeedIn");
            $('#'+e).addClass("animated bounceInLeft")
            $('#' + e).show();
        }
,700);

}
function back(e) {
    $('#part1').show();
    $('#' + e).hide();
}
function gabzStep(e) {
    $('#G1').css("width","50%");
    $('#G2').css("width","50%");
    $('#G3').css("width","50%");
    $('#G4').css("width","50%");
    $('#G5').css("width","50%");
    $('#G6').css("width","50%");
    $('#B1').css("width","50%");
    $('#B2').css("width","50%");
    $('#B3').css("width","50%");
    $('#'+e).css("width","55%");
    $('#G1').addClass("gray");
    $('#G2').addClass("gray");
    $('#G3').addClass("gray");
    $('#G4').addClass("gray");
    $('#G5').addClass("gray");
    $('#G6').addClass("gray");
    $('#B1').addClass("gray");
    $('#B2').addClass("gray");
    $('#B3').addClass("gray");
    $('#'+e).removeClass("gray");

    if(e=="B1"){
        $('#airplan').show();
        $('#bus').hide();
    }if(e=="B2"){
        $('#airplan').show();
        $('#bus').hide();
    }
    if(e=="B3"){
        $('#airplan').hide();
        $('#bus').show();
    }
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
    if(number.length > 0){
        $('#ContactList').hide();
        $('.tableSearch').hide();
    }else{
        $('#ContactList').show();

    }
    if (number.length > 2) {
        ActiveThis('btnModel1');
        $('#AccBtnCharge').show();
        $('#checkThisIdDiv').show();
        $('#model').show();
    } else {
        changeSrcImg("Error");
        $("#hamrah img").addClass("gray");
        $("#rightell img").addClass("gray");
        $("#irancell img").addClass("gray");

        $("#model2").hide();
        $('#checkThisIdDiv').hide();
        $('#model').hide();
        $('#price').hide();
    }
    if (number.substring(0, 3) === '091' || number.substring(0, 3) === '099' || number.substring(0, 3) === '91' || number.substring(0, 3) === '99') {
        reload();
        $("#hamrah img").removeClass("gray");
        $("#rightellDiv").show();
        $("#irancellDiv").show();
        $("#hamrahDiv").hide();
        $("#model2").hide();
        cheangeModel('3');
        model = 3;
        $('#btnModel1').click();
    }
    if (number.substring(0, 3) === '093' || number.substring(0, 3) === "090" || number.substring(0, 3) === '094' ||
        number.substring(0, 3) === '93' || number.substring(0, 3) === "90" || number.substring(0, 3) === '94') {
        reload();
        $('#btnModel1').click();

        $('#btnModel4').click();
        $("#irancell img").removeClass("gray");
        $("#rightellDiv").show();
        $("#irancellDiv").hide();
        $("#hamrahDiv").show();
        cheangeModel('2');
        model = 2;
    }
    if (number.substring(0, 3) === "092" || number.substring(0, 3) === "92") {
        $('#btnModel1').click();
        $('#btnModel4').click();
        reload();
        $("#rightell img").removeClass("gray");
        $("#rightellDiv").hide();
        $("#irancellDiv").show();
        $("#hamrahDiv").show();
        cheangeModel('1');
        model = 1;
    }
}
function reload() {


    $("#hamrah img").addClass("gray");
    $("#rightell img").addClass("gray");
    $("#irancell img").addClass("gray");

}
function checkBoxOne() {
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
        $('#basteLongTitle').hide();
        $('#basteSelect').hide();
        $('#basteLast').hide();
        $('#basteLastTitle').hide();
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
        ActiveThis('btnModel1');
        checkThis();
    } else {
        $('#Baste').fadeOut();
        $('#modelSim').hide();
        $('#basteLong').hide();
        $('#basteLongTitle').hide();
        $('#basteSelect').hide();
        $('#basteLast').hide();
        $('#basteLastTitle').hide();
        $('#Select').hide();
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

        $("#hamrah img").removeClass("gray");

        $('#trabord').hide();
        cheangeModel('3');
        model = 3;
        ActiveThis('btnModel1');
    }
    if (e === '2') {
        reload();
        $("#rightell img").removeClass("gray");

        $('#trabord').hide();
        cheangeModel('1');
        model = 1;
        ActiveThis('btnModel1');
        ActiveThis('btnModel4');
    }
    if (e === '3') {
        reload();
        $("#irancell img").removeClass("gray");
        $('#trabord').hide();
        cheangeModel('2');
        model = 2;
        ActiveThis('btnModel1');
        ActiveThis('btnModel4');
    }
}
function profileShow(e1, e2, e3,e4) {
    $("#getManeyText").val("");
    $('#ThreePr').removeClass("active");
    $('#OnePr').removeClass("active");
    $('#TwoPr').removeClass("active");
    $('#ThreePr2').removeClass("active");
    $('#OnePr2').removeClass("active");
    $('#TwoPr2').removeClass("active");
    $('#'+e4).addClass("active");
    $('#' + e1).show();
    $('#' + e2).hide();
    $('#' + e3).hide();
}
function ActiveThis(e) {
    if(e=="btnModel1"){
        if(model==3) {
            textSharj = " شارژ‌ مستقیم همراه اول"
            modelSharj='1';
        }
    }
    if(e=="btnModel2"){
        if(model==1) {
            textSharj = "کد شارژ‌ رایتل"
        }if(model==2) {
            textSharj = "کد شارژ ایرانسل"
        }if(model==3) {
            textSharj = "کد شارژ همراه اول"
        }
        modelSharj='2';
    }
    if(e=="btnModel5"){
        modelSharj='1';
        amazing = "true";
        if(model==1) {
            textSharj = "شارژ شگفت انگیز رایتل"
        }if(model==2) {
            textSharj = "شارژ شگفت انگیز ایرانسل"
        }
    }else{
        if(e=="btnModel6"){
            modelSharj='1';
            textSharj = "شارژ دایمی ایرانسل"
        }if(e=="btnModel4"){
            modelSharj='1';
            if(model==1) {
                textSharj = "شارژ مستقیم رایتل"
            }if(model==2) {
                textSharj = "شارژ‌ مستقیم ایرانسل"
            }
        }
        amazing = "false";
    }

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
    if (e === "btnModel2") {
        $('#price').show();
        $("#lastPrice").attr('readonly', true).val("");

    } else {
        $('#price').hide();
        $("#lastPrice").removeAttr('readonly').val("");
    }
    if (e === "btnModel3" || e === "btnModel23" || e === "btnModel24" || e === "btnModel25"|| e === "btnModel26") {
        $('#Baste').fadeIn();
        $('#modelSimText').text("می توانید یکی از مدلهای سیمکارت را انتخاب کنید");
        showModelSim();
        $('#basteLong').text("مدت زمان بسته را انتخاب کنید");
        $('#basteLast').text("حجم مورد نظر را وارد کنید");
        if( e === "btnModel23" || e === "btnModel24" || e === "btnModel25"|| e === "btnModel26"){
            $('#basteLong').show();
            $('#basteLongTitle').show();
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
        $('#basteLongTitle').hide();
        $('#basteSelect').hide();
        $('#basteLast').hide();
        $('#basteLastTitle').hide();
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
        } else if (e === "btnModel2" || e === "btnModel3") {
            $("#model2").hide();
        }
    }
    else if (model === 1) {
        if (e === "btnModel1") {
            $("#model2").show();
            btnModel6.css("visibility", "hidden");
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
    $('#NameFacktor').text(textSharj);
    $('#priceSelect').fadeOut();
    $("#getManeyText").val($('#lastPrice').val());
    $('#AccBtnCharge').show();
    $("#NumberFacktor").text("شماره سرویس : "+$('#number1').val());
    $('#priceFacktor').text("مبلغ : "+$('#lastPrice').val()+" تومان ");
    var toman = $('#lastPrice').val()*10;
    beforPay(toman.toString(),modelSharj);
}
function CheckPrice(e) {
    $("#NumberFacktor").text("شماره سرویس : "+$('#number1').val());
    $('#priceFacktor').text("مبلغ : "+$('#lastPrice').val()+" تومان ");
    $('#NameFacktor').text(textSharj);
    $("#getManeyText").val($('#lastPrice').val());
    var toman = $('#lastPrice').val()*10;
    beforPay(toman.toString(),modelSharj);
    if (e.length > 1) {
        $('#priceSelect').fadeOut();
        $('#AccBtnCharge').show();
    } else {
        $('#priceSelect').fadeIn();
    }
}
function showPriceSelect(e) {
    if(modelSharj=='2'){
        $('#priceSelect').show();
    }else {
        if (e.length < 3) {
            $('#priceSelect').show();
        }
    }
}
function showShaba(e) {
    if (e.length < 3) {
        $('#selectShaba').show();
    }else{
        if(e.length>0 && e.length>3){
            $('#selectShaba').hide();
        }
    }
}
function showShaba2(e) {
    if (e.length < 3) {
        $('#selectShaba2').show();
    }else{
        if(e.length>0 && e.length>3){
            $('#selectShaba2').hide();
        }
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
            $('#basteLast').fadeIn();
            $('#basteLastTitle').fadeIn();
            $('#basteLastSelect').html(last);
        }
    });
}
function showLastBaste() {
    $('#basteLastSelect').show();
}
function fillBasteLast(e,f,j) {
    codeBaste = j;
    var number = $('#number1').val();
    $('#basteLast').text(e);
    $('#basteLastSelect').fadeOut();
    $('#AccBtnCharge').show();
    e = e.split("-");
    price = f.replace(",","");
    $('#NameFacktor').text(e[0]);
    $("#NumberFacktor").text("شماره سرویس : "+number);
    f =parseInt(price)/10;
    $('#priceFacktor').text("مبلغ : "+f+" تومان ");
    $("#getManeyText").val(price);
    beforPay(price,'1');
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
    $('#basteLongTitle').delay("slow").fadeIn();
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
function inv() {
    $("#ErrorInv").hide();
    $("#okInv").hide();
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
                $("#okInv").text("پیام دعوت با موفقیت به شماره "+mobile+' ارسال شد .').show();
                $("#menuLeft2").click();
            }else{
                $("#ErrorInv").text("شماره "+mobile+" قبلا در اینکام عضو شده است .").show();
                $("#menuLeft2").click();
            }
        }
    });
}
function fillPricePay(e) {
    $('#getManeyText').val(e);
}
function fillPricePay2(e) {
    $('#getManeyText3').val(e);
}
function fillShaba(e) {
    $.ajax({
        url:'ajax/shabaGet.php',
        data:{
            id: e
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){

                $("#shaba2").val(data['shabaNumber']);
                $("#BankShaba2").val(data['shabaBank']);
                $("#selectShaba2").hide();
            }
        }
    });
}
function SendRequestGetMoney() {
    let price, shaba, bankName;
    price = $("#getManeyText2").val();

    shaba=$("#shaba").val();
    bankName = $("#BankShaba").val();
    $.ajax({
        url:'ajax/addGetMoney.php',
        data:{
            price: price.replace(/,/g,''),
            shaba: shaba,
            bankName: bankName
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===true){

                $("#getMoneyError").show().text(data["MSG"]).css("background","rgba(255, 0, 0, 0.5)");
            }else{
                $("#getMoneyError").show().text(data["MSG"]).css("background","rgba(2, 131, 42, 0.5)");
                $("#spanMoney").text("اعتبار فعلی شما "+data['money']+" تومان ");
                $("#spanMoney2").text("اعتبار فعلی شما "+data['money']+" تومان ");

            }
        }
    });
}
function SendRequestGetMoney2() {
    let price, shaba, bankName;
    price = $("#getManeyText23").val();

    shaba=$("#shaba2").val();
    bankName = $("#BankShaba2").val();
    $.ajax({
        url:'ajax/addGetMoney.php',
        data:{
            price: price.replace(/,/g,''),
            shaba: shaba,
            bankName: bankName
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===true){

                $("#getMoneyError2").show().text(data["MSG"]).css("background","rgba(255, 0, 0, 0.5)");
            }else{
                $("#getMoneyError2").show().text(data["MSG"]).css("background","rgba(2, 131, 42, 0.5)");
                $("#spanMoney").text("اعتبار فعلی شما "+data['money']+" تومان ");
                $("#spanMoney2").text("اعتبار فعلی شما "+data['money']+" تومان ");

            }
        }
    });
}
function payMoney(e) {
    let price = $("#getManeyText").val().replace(/,/g, '');
    let mobile = $("#number1").val();
    window.location.href="ajax/goToBank.php?price="+price+"&model="+e+"&code="+codeBaste+"&mobile="+mobile+'&operator='+model+'&sim='+simModel+'&azm='+amazing+'&modelSharj='+modelSharj;
}
function payMoney2(e) {
    let price = $("#getManeyText2").val().replace(/,/g, '');
    let mobile = $("#number1").val();
    window.location.href="ajax/goToBank.php?price="+price+"&model="+e+"&code="+codeBaste+"&mobile="+mobile+'&operator='+model+'&sim='+simModel+'&azm='+amazing+'&modelSharj='+modelSharj;
}
function payMoneyEtebar(e) {
    let price = $("#getManeyText").val().replace(/,/g, '');
    let mobile = $("#number1").val();
    window.location.href="ajax/goToBank.php?price="+price+"&model="+e+"&code="+codeBaste+"&mobile="+mobile+'&operator='+model+'&sim='+simModel+'&azm='+amazing+'&modelSharj='+modelSharj+'&etebar='+true;
}
function beforPay(price,model1) {
    $.ajax({
        url:'ajax/beforePay.php',
        data:{
            price: price.replace(/,/g,''),
            model:model1,
            operator:model
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){
                $('#offerFacktor').text("تخفیف شما روی این محصول : "+data["percent"]+" تومان ");

            }
        }
    });

}
function SelectNumberContact(e) {
    $('#ContactList').hide();
    $('.tableSearch').hide();
    $('#number1').val(e);
    checkThis();
}
function SerachContact() {

    var serach = $('#inputContact').val();
    if(serach!='') {
        $.ajax({
            url: 'ajax/serachContact.php',
            data: {
                serach: serach
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data["Error"] === false) {
                    $('#listContact').html(data['html']);
                }
            }
        });
    }
}
function firstRecover() {
    $("#SendSmsReCover").html('<i class="fas fa-spinner fa-spin"></i>');

    $.ajax({
        url:'ajax/newRecoverPassword.php',
        data:{
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){
                $('#myModal3').modal('toggle');$('#myModal12').modal();
                $("#SendSmsReCover").html('بازیابی کلمه عبور');

            }
        }
    });

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
function showFactor() {
    let priceInside = $('#lastPrice').val();
    if( codeBaste =='' &&  priceInside=='' ){
        $('#payemtError').show();
    }else{
        $('#payemtError').hide();
        $('#myModalFaktor').modal();
    }
}
function removeBlur(){
    $('#itemLeft').removeClass('blur');
    $('#icons').removeClass('blur');
    $('#footer').removeClass('blur');
}

//travell
function changeTeravell(e) {
e=='two'?$('#t2').addClass("active"):$('#t2').removeClass("active");
if(e=='two'){
    $('#goDate2').prop("disabled", false);

}else{
    $('#goDate2').prop("disabled", true);
}
}
function SendSmsInv() {
    let mobile = $('#smsInv').val();
    $.ajax({
        url:'ajax/invSend.php',
        data:{
            mobile: mobile
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){
                $("#profileInvUserSu").text("پیام شما با موفقیت به شماره "+mobile+' ارسال شد .').show();
            }
        }
    });
}
function addStar(e) {
    $('.inv').removeClass('active');
    $.ajax({
        url:'ajax/starInv.php',
        data:{
            id: e
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){
                $('#StarInv'+e).addClass('active');
            }
        }
    });
}
function submitInvCode() {
    let invCode = $('#invCodeSubmit').val();
    $.ajax({
        url:'ajax/submitInvCode.php',
        data:{
            invCode: invCode
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){
                let cot = "'";
                let child = '<tr><td>'+invCode+'</td><td>0</td><td><i class="fa fa-star inv" id="StarInv'+data['id']+'" onclick="addStar('+cot+data['id']+cot+')"></i></td></tr>'
                $('#TableInvCode').append(child);
            }
        }
    });
}
$(document).ready(function() {
    $('#example').DataTable();
    $('#example1').DataTable();
} );
function addContact() {
    let name , mobile;
    name = $('#contactNameP').val();
    mobile = $('#contactMobileP').val();
    $.ajax({
        url:'ajax/contactAdd.php',
        data:{
            name: name,
            number: mobile
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){


                $('#justOne').hide();
                $('#contactAddSuccess').show();
                let cot = "'";
                let child = '<tr id="contact_'+data['id']+'"><td>'+data['number']+'</td><td>'+name+'</td><td>'+mobile+'</td><td><input type="button" class="btn btn-xs btn-danger" value="حذف" onclick="deleteContact('+cot+data['id']+cot+')"></td></tr>'
                $('#contactListTabelP').appendChild(child);
            }
        }
    });
}
function deleteContact(e) {
    $.ajax({
        url:'ajax/deleteContact.php',
        data:{
            id: e
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if(data["Error"]===false){
                $('#contact_'+e).hide();
            }
        }
    });
}