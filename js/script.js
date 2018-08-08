var model;
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
    $('#'+e).addClass('animated').addClass('shake').addClass('infinite').removeClass('bounceInRight').removeClass('bounceInRight1').removeClass('bounceInRight2').removeClass('bounceInRight3');
}
function remove(e) {
    $('#'+e).removeClass('animated').removeClass('shake').removeClass('infinite');
}
function checkThis() {
    var number = $('#number1').val();
    if(number.length>2){

        $('#checkThisIdDiv').show();
        $('#model').show();
    }else{
        $("#model2").hide();
        $('#checkThisIdDiv').hide();
        $('#model').hide();
    }
    if(number.substring(0, 3)==='091' || number.substring(0, 3)==='099' ||number.substring(0, 3)==='91' || number.substring(0, 3)==='99'){
        reload();
        $("#hamrah").css("background-color", "#53c4cd");
        $("#rightellDiv").show();
        $("#irancellDiv").show();
        $("#hamrahDiv").hide();
        $("#model2").hide();
        cheangeModel('3');
        model=3;
    }
    if(number.substring(0, 3)==='093' || number.substring(0, 3)==="090" || number.substring(0, 3)==='094'||
        number.substring(0, 3)==='93' || number.substring(0, 3)==="90" || number.substring(0, 3)==='94'){
        reload();
        $('#irancell').css("background-color","#fee64d");
        $("#rightellDiv").show();
        $("#irancellDiv").hide();
        $("#hamrahDiv").show();
        cheangeModel('2');
        model=2;
    }
    if(number.substring(0, 3)==="092" || number.substring(0, 3)==="92"){
        reload();
        $('#rightell').css("background-color","#992b6c");
        $("#rightellDiv").hide();
        $("#irancellDiv").show();
        $("#hamrahDiv").show();
        cheangeModel('1');
        model=1;
    }
}
function reload() {
    $("#hamrah").css("background-color", "#dddddd");
    $('#irancell').css("background-color","#dddddd");
    $('#rightell').css("background-color","#dddddd");

}
function checkBoxOne() {

    var btnModel1,btnModel2,btnModel3,btnModel4,btnModel5,btnModel6;

    if($('#go').is(":checked")){

        $('#price').hide();
        $('#lastPrice').val("");
        $('#priceSelect').fadeOut();
        $('#operatorList').show();
        $('#trabord').hide();


        btnModel1=$('#btnModel1');
        btnModel2=$('#btnModel2');
        btnModel3=$('#btnModel3');
        btnModel4=$('#btnModel4');
        btnModel6=$('#btnModel6');
        btnModel5=$('#btnModel5');

        btnModel1.removeClass("active");
        btnModel2.removeClass("active");
        btnModel3.removeClass("active");
        btnModel4.removeClass("active");
        btnModel5.removeClass("active");
        btnModel6.removeClass("active");

        $('#Baste').fadeOut();
        $('#modelSim').hide();
        $('#basteLong').hide();
        $('#basteSelect').hide();
        $('#basteLast').hide();
        $('#basteLastSelect').hide();


        if($('#Onerightell').is(":checked")){
            $('#Onerightell').prop('checked', false);
        }
        if($('#OneIrancell').is(":checked")){
            $('#OneIrancell').prop('checked', false);
        }
        if($('#OneHamrah').is(":checked")){
            $('#OneHamrah').prop('checked', false);
        }
        checkThis();

    }else{
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

        btnModel1=$('#btnModel1');
        btnModel2=$('#btnModel2');
        btnModel3=$('#btnModel3');
        btnModel4=$('#btnModel4');
        btnModel6=$('#btnModel6');
        btnModel5=$('#btnModel5');

        btnModel1.removeClass("active");
        btnModel2.removeClass("active");
        btnModel3.removeClass("active");
        btnModel4.removeClass("active");
        btnModel5.removeClass("active");
        btnModel6.removeClass("active");

        $("#model2").hide();
        $('#trabord').show();
        }
}
function checkBoxTwo(e) {
    var btnModel1,btnModel2,btnModel3,btnModel4,btnModel5,btnModel6;

    btnModel1=$('#btnModel1');
    btnModel2=$('#btnModel2');
    btnModel3=$('#btnModel3');
    btnModel4=$('#btnModel4');
    btnModel6=$('#btnModel6');
    btnModel5=$('#btnModel5');

    btnModel1.removeClass("active");
    btnModel2.removeClass("active");
    btnModel3.removeClass("active");
    btnModel4.removeClass("active");
    btnModel5.removeClass("active");
    btnModel6.removeClass("active");

    $("#model2").hide();
    if(e==='1'){
        reload();
        $("#hamrah").css("background-color", "#53c4cd");
        $('#trabord').hide();
        cheangeModel('3');

        model=3;
    }if(e==='2'){
        reload();
        $('#rightell').css("background-color","#992b6c");
        $('#trabord').hide();
        cheangeModel('1');
        model=1;
    }if(e==='3'){
        reload();
        $('#irancell').css("background-color","#fee64d");
        $('#trabord').hide();
        cheangeModel('2');
        model=2;
    }
}
function profileShow(e1,e2,e3) {
    $('#' + e1).show();
    $('#' + e2).hide();
    $('#' + e3).hide();
}
function ActiveThis(e) {
    var btnModel1,btnModel2,btnModel3,btnModel4,btnModel5,btnModel6;
    btnModel1=$('#btnModel1');
    btnModel2=$('#btnModel2');
    btnModel3=$('#btnModel3');
    btnModel4=$('#btnModel4');
    btnModel6=$('#btnModel6');
    btnModel5=$('#btnModel5');

    if(e==="btnModel2"){
        $('#price').show();
    }else{
        $('#price').hide();
    }
    if(e==="btnModel3"){
        $('#Baste').fadeIn();
        $('#modelSimText').text("می توانید یکی از مدلهای سیمکارت را انتخاب کنید");
        $('#basteLong').text("مدت زمان بسته را انتخاب کنید");
        $('#basteLast').text("حجم مورد نظر را وارد کنید");
    }else{

        $('#Baste').hide();
        $('#modelSim').hide();
        $('#basteLong').hide();
        $('#basteSelect').hide();
        $('#basteLast').hide();
        $('#basteLastSelect').hide();



    }
    if( e==="btnModel4" || e==="btnModel5" || e==="btnModel6"){
        $('#price').show();
        btnModel4.removeClass("active");
        btnModel5.removeClass("active");
        btnModel6.removeClass("active");
    }else {
        btnModel1.removeClass("active");
        btnModel2.removeClass("active");
        btnModel3.removeClass("active");
    }
    $('#'+e).addClass("active");

    //irancell charge mostaghim
    if(model===2){
        if(e==="btnModel1"){
            $("#model2").show();
            btnModel6.css("visibility","visible");
            $("#chargeModelLog").removeClass("col-lg-offset-2 col-md-offset-2 col-xs-offset-2 col-md-offset-2");
        }else if(e==="btnModel2" || e==="btnModel3"){
            $("#model2").hide();
        }
    }
    else if(model===1){
        if(e==="btnModel1"){
            $("#model2").show();
            btnModel6.css("visibility","hidden");
            $("#chargeModelLog").addClass("col-lg-offset-2 col-md-offset-2 col-xs-offset-2 col-md-offset-2");
        }else if(e==="btnModel2" || e==="btnModel3"){
            $("#model2").hide();
        }
    }else{
        $("#model2").hide();
        if(e==="btnModel1") {
            $('#price').show();
        }
    }

}

function cheangeModel(e) {
 //e==1 =>rightell
 //e==2 =>irancell
 //e==3 =>hamrahAval
    var btnModel1,btnModel2,btnModel3,btnModel4,btnModel5,btnModel6;
    btnModel1=$('#btnModel1');
    btnModel2=$('#btnModel2');
    btnModel3=$('#btnModel3');
    btnModel4=$('#btnModel4');
    btnModel5=$('#btnModel5');
    btnModel6=$('#btnModel6');

    if(e==='1') {
        btnModel1.removeClass("bgHamrahMode");
        btnModel2.removeClass("bgHamrahMode");
        btnModel3.removeClass("bgHamrahMode");
        btnModel4.removeClass("bgHamrahMode");
        btnModel5.removeClass("bgHamrahMode");
        btnModel6.removeClass("bgHamrahMode");
        btnModel1.removeClass("bgIrancellMode");
        btnModel2.removeClass("bgIrancellMode");
        btnModel3.removeClass("bgIrancellMode");
        btnModel4.removeClass("bgIrancellMode");
        btnModel5.removeClass("bgIrancellMode");
        btnModel6.removeClass("bgIrancellMode");
        btnModel1.addClass("bgRightellModel");
        btnModel2.addClass("bgRightellModel");
        btnModel3.addClass("bgRightellModel");
        btnModel4.addClass("bgRightellModel");
        btnModel5.addClass("bgRightellModel");
        btnModel6.addClass("bgRightellModel");
    }

    if(e==='2') {
        btnModel1.removeClass("bgHamrahMode");
        btnModel2.removeClass("bgHamrahMode");
        btnModel3.removeClass("bgHamrahMode");
        btnModel4.removeClass("bgHamrahMode");
        btnModel5.removeClass("bgHamrahMode");
        btnModel6.removeClass("bgHamrahMode");
        btnModel1.addClass("bgIrancellMode");
        btnModel2.addClass("bgIrancellMode");
        btnModel3.addClass("bgIrancellMode");
        btnModel4.addClass("bgIrancellMode");
        btnModel5.addClass("bgIrancellMode");
        btnModel6.addClass("bgIrancellMode");
        btnModel1.removeClass("bgRightellModel");
        btnModel2.removeClass("bgRightellModel");
        btnModel3.removeClass("bgRightellModel");
        btnModel4.removeClass("bgRightellModel");
        btnModel5.removeClass("bgRightellModel");
        btnModel6.removeClass("bgRightellModel");
    }

    if(e==='3'){
        btnModel1.addClass("bgHamrahMode");
        btnModel2.addClass("bgHamrahMode");
        btnModel3.addClass("bgHamrahMode");
        btnModel4.addClass("bgHamrahMode");
        btnModel5.addClass("bgHamrahMode");
        btnModel6.addClass("bgHamrahMode");
        btnModel1.removeClass("bgIrancellMode");
        btnModel2.removeClass("bgIrancellMode");
        btnModel3.removeClass("bgIrancellMode");
        btnModel4.removeClass("bgIrancellMode");
        btnModel5.removeClass("bgIrancellMode");
        btnModel6.removeClass("bgIrancellMode");
        btnModel1.removeClass("bgRightellModel");
        btnModel2.removeClass("bgRightellModel");
        btnModel3.removeClass("bgRightellModel");
        btnModel4.removeClass("bgRightellModel");
        btnModel5.removeClass("bgRightellModel");
        btnModel6.removeClass("bgRightellModel");
    }
}

function fillPrice(e) {
    $('#lastPrice').val($('#'+e).attr("value"));
    $('#priceSelect').fadeOut();
}

function CheckPrice(e) {
    if(e.length>1){
        $('#priceSelect').fadeOut();
    }else{
        $('#priceSelect').fadeIn();

    }
}
function showPriceSelect(e) {
    if(e.length<3){
        $('#priceSelect').show();
    }
}
function showBaste() {
    $('#basteSelect').show();
}
function fillBaste(e) {
    $('#basteLong').text(e);
    $('#basteSelect').fadeOut();
    $('#basteLast').delay("slow").fadeIn();
}

function showLastBaste() {
    $('#basteLastSelect').show();
}
function fillBasteLast(e) {
    $('#basteLast').text(e);
    $('#basteLastSelect').fadeOut();
}
function showModelSim() {
    //e==1 =>rightell
    //e==2 =>irancell
    //e==3 =>hamrahAval
    if(model==1){
        $("#Sli4").show();
        $("#Sli1").hide();
    }
    if (model==2){
        $("#Sli4").hide();
        $("#Sli1").show();
    }if(model==3){
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