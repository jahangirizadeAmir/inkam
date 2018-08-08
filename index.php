<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inkome</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/animation.css" rel="stylesheet" type="text/css">
    <link href="css/iphoneCheckBox.css" rel="stylesheet" type="text/css">
    <script src="js/script.js"></script>
    <script src="js/login.js"></script>

    <link href="css/vesam.css" rel="stylesheet">

    <style>
        .modal-header, h4, .close {
            background-color: #5cb85c;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-footer {
            background-color: #f9f9f9;
        }
    </style>

</head>
<body>
<div class="pull-right col-md-2 col-sm-6 col-xs-12 menuDiv" id="menuDiv">
    <ul class="menuList">
        <li>تست اول</li>
        <li>تست اول</li>
        <li>تست اول</li>
        <li>تست اول</li>
        <li>تست اول</li>
        <li>تست دوم</li>
        <li>تست سوم</li>
    </ul>
</div>
<div class="col-md-12 col-sm-12 col-xs-12" style="position: absolute;z-index: 888;margin-bottom: 15px">
    <ul id="itemLeft" class="menuLeft col-md-6 col-sm-6 col-xs-6" style="position: relative;z-index: 888;width: 100%">
        <li class=""><img src="img/logoType.png" class="logo"></li>
        <li style="position: relative;">
            <div class="dropdown">
                <img src="img/plus.png" class="not img-responsive" id="menuLeft2" data-toggle="dropdown">
                <ul class="dropdown-menu center dropdown-menu-left pull-left extended tasks-bar" role="menu"
                    aria-labelledby="menuLeft2">
                    <div class="notify-arrow-center notify-arrow-green"></div>
                    <li style="width: 100%">
                        <p class="green">دوستان خود را به اینکام دعوت کنید</p>
                    </li>
                    <li style="width: 100%;padding: 0 10px 0 10px">
                        <div class="form-group">
                            <label for="input" style="color: #000;">شماره تلفن</label>
                            <input id="input" type="text" value="09166157859" class="form-control">
                        </div>
                    </li>
                    <li style="width: 100%;padding: 0 10px 0 10px">
                        <div class="form-group">
                            <label for="input3" style="color: #000;">متن پیام</label>
                            <textarea id="input3" class="form-control" disabled>تست شده است که شما ببینید این پیام به صورت پیشفرض است</textarea>
                        </div>
                    </li>
                    <li style="width: 100%;padding: 0 10px 0 10px">
                        <div class="form-group">
                            <input type="button" value="ارسال" class="btn btn-group-vertical btn-success">
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        <li class="" style="position: relative;">
            <div class="dropdown">
                <img src="img/not.png" class="not img-responsive" id="menuLeft1" data-toggle="dropdown">
                <span class="badge bg-danger" style="left: 37px;top: 5px;background-color: red">۲۰</span>
                <ul class="dropdown-menu dropdown-menu-left  extended tasks-bar" role="menu"
                    aria-labelledby="menuLeft1">
                    <div class="notify-arrow-left notify-arrow-green"></div>
                    <li style="width: 100%">
                        <p class="green">شما ۲۰ اعلان جدید دارید</p>
                    </li>
                    <li style="" class="noti active">
                        <div class="notiBag" style=""></div>
                        <p>اعلان اول</p>
                        <p style="font-size: 10px;color: #999999;">دوشنبه ۷ خرداد ۱۳۹۷</p>
                    </li>
                    <li style="" class="noti">
                        <p>اعلان اول</p>
                        <p style="font-size: 10px;color: #999999;">دوشنبه ۷ خرداد ۱۳۹۷</p>

                    </li>
                    <li style="" class="noti active">
                        <div class="notiBag" style=""></div>
                        <p>اعلان اول</p>
                        <p style="font-size: 10px;color: #999999;">دوشنبه ۷ خرداد ۱۳۹۷</p>

                    </li>
                    <li style="" class="noti active">
                        <div class="notiBag" style=""></div>
                        <p>اعلان اول</p>
                        <p style="font-size: 10px;color: #999999;">دوشنبه ۷ خرداد ۱۳۹۷</p>

                    </li>
                    <li style="" class="noti">
                        <p>اعلان اول</p>
                        <p style="font-size: 10px;color: #999999;">دوشنبه ۷ خرداد ۱۳۹۷</p>

                    </li>
                    <li style="" class="noti">
                        <p>اعلان اول</p>
                        <p style="font-size: 10px;color: #999999;">دوشنبه ۷ خرداد ۱۳۹۷</p>

                    </li>
                    <li style="" class="noti">
                        <p>اعلان اول</p>
                        <p style="font-size: 10px;color: #999999;">دوشنبه ۷ خرداد ۱۳۹۷</p>

                    </li>
                    <li class="form-group" style="    width: 100%;">
                        <input type="button" class="form-control btn btn-sm btn-link" value="نمایش بیشتر">
                    </li>
                </ul>
            </div>
        </li>
        <li style="position: relative;">
            <div class="dropdown">
                <img src="img/msg.png" class="not img-responsive" id="menuLeft3" data-toggle="dropdown">
                <span class="badge bg-primary" style="left: 37px;top: 5px;background-color: orange">0</span>
                <ul class="dropdown-menu dropdown-menu-left  extended tasks-bar" role="menu"
                    aria-labelledby="menuLeft1">
                    <div class="notify-arrow-left notify-arrow-green"></div>
                    <li style="width: 100%">
                        <p class="green">شما ۲۰ پیام جدید دارید</p>
                    </li>
                    <li style="" class="noti active">
                        <div class="notiBag" style=""></div>
                        <h5 style="    text-align: right;margin: 0 0 10px 0px;">اعلان اول</h5>
                        <p>اعلان اول</p>
                        <p style="font-size: 10px;color: #999999;">دوشنبه ۷ خرداد ۱۳۹۷</p>

                    </li>
                    <li style="" class="noti">
                        <h6 style="    text-align: right;margin: 0 0 10px 0px;">اعلان اول</h6>
                        <p>اعلان اول</p>
                        <p style="font-size: 10px;color: #999999;">دوشنبه ۷ خرداد ۱۳۹۷</p>

                    </li>
                    <li style="" class="noti active">
                        <div class="notiBag" style=""></div>
                        <h5 style="    text-align: right;margin: 0 0 10px 0px;">اعلان اول</h5>
                        <p>اعلان اول</p>
                        <p style="font-size: 10px;color: #999999;">دوشنبه ۷ خرداد ۱۳۹۷</p>

                    </li>

                    <li class="form-group" style="    width: 100%;">
                        <input type="button" class="form-control btn btn-sm btn-link" value="نمایش بیشتر">
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <?php
    if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']) {
        $display = true;
        ?>
        <span class="pull-right menu" id="nameUser" onclick="showProfileMenu()" style=""><?php echo $_SESSION['userName'] ?></span>;
        <ul class="dropdown-menu extended logout" id="menuProfile" style="display: none">
            <div class="notify-arrow-center notify-arrow-green" style="    right: 55px;
    border-bottom-color: white!important;
    /* border-top-color: red; */
    left: auto;"></div>
            <li class="col-md-9 col-sm-6 col-xs-12" id="dashbord" style="   padding: 30px;
    margin-top: 10px;"><span>
                <div class="col-md-4 col-sm-6 col-xs-12  Circle">
                    <div class="oneCircle">
                        <span style="direction: rtl;font-size: 20px">
                            درآمد شما
                            <br>
                            2000000 ریال
                        </span>
                    </div>
                    <button class="btn btn-default" style="margin-top: 10px;">
                        جزییات بیشتر
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12  Circle">
                    <div class="twoCircle">
                       <span style="direction: rtl;font-size: 20px">
                            درآمد شما
                            <br>
                            2000000 ریال
                        </span>
                     </div>
                     <button class="btn btn-default" style="margin-top: 10px;">
                        جزییات بیشتر
                    </button>

                </div>
                <div class="col-md-4 col-sm-6 col-xs-12  Circle">
                       <div class="threeCircle">
                          <span style="direction: rtl;font-size: 20px">
                            درآمد شما
                            <br>
                            2000000 ریال
                          </span>
                       </div>
                     <button class="btn btn-default" style="margin-top: 10px;">
                        جزییات بیشتر
                    </button>
                </div>
            </span></li>

            <li class="col-md-9 col-sm-6 col-xs-12" style="height: 100%;padding: 70px;display: none;margin-top: 20px" id="payMoney">
                <div class="form-group">
                    <label for="getManey" style="color: black">مبلغ را به تومان وارد کنید</label>
                    <input type="text" class="form-control" id="payMoneyText">
                </div>
                <div class="form-group">
                    <input type="button" value="پرداخت" class="btn btn-group-sm btn-info">
                </div>
            </li>

            <li class="col-md-9 col-sm-6 col-xs-12" style="height: 100%;padding: 70px;display: none" id="getManey">
                <div class="form-group">
                    <label for="getManeyText" style="color: black">مبلغ را به تومان وارد کنید</label>
                    <input type="text" class="form-control" id="getManeyText">
                </div>
                <div class="form-group">
                    <label for="getManeyShaba" style="color: black">شماره شبا را وارد کنید</label>
                    <input type="text" class="form-control" id="getManeyShaba">
                </div>
                <div class="form-group">
                    <label for="bank" style="color: black">بانک خود را وارد کنید</label>
                    <select class="form-control" id="bank">
                        <option>صادرات</option>
                        <option>ملت</option>
                        <option>ملی</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="button" value="پرداخت" class="btn btn-group-sm btn-info">
                </div>
            </li>

            <li class="col-md-3 col-sm-6 col-xs-12" style="margin-top: 20px">
                <a href="#" style="padding: 30px">اعتبار فعلی شما : ۲۰۰۰۰ تومان</a>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12">
                <a href="#" onclick="profileShow('payMoney','getManey','dashbord')" style="padding: 30px"> افزایش اعتبار</a>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12">
                <a href="#" onclick="profileShow('getManey','payMoney','dashbord')" style="padding: 30px">درخواست واریز وجه</a>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12">
                <a href="#" onclick="profileShow('dashbord','getManey','payMoney')"  style="padding: 30px">داشتبورد</a>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12">
                <a href="logout.php" style="padding: 30px"> خروج</a>
            </li>
        </ul>
        <?php
    } else {
        $display = false;

        ?>
        <span class="pull-right menu" id="loginSubmitBtn" onclick="$('#myModal').modal();">ورود / عضویت</span>
        <span class="pull-right menu" id="nameUser" onclick="showProfileMenu()" style="display: none"><?php echo $_SESSION['userName'] ?></span>;

        <?php
    }
    ?>

    <img src="img/menuIcon.png" onclick="menuShow();" id="menuShow"
         style="<?php $display ? $a = '' : $a = 'display:none';
         echo $a; ?>"
         class="pull-right menu">
</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 " style="padding:0;position: relative;overflow: visible;height: 100%">
    <div class="col-md-12 col-sm-12 col-xs-12" id="icons">
        <div id="part1">
            <div class="col-md-2 hidden-xs hidden-sm animated bounceInRight">
            </div>
            <div class="col-md-2 col-xs-6 col-sm-6 animated bounceInRight"
                 onmouseover="add('four')" id="four"
                 onmouseleave="remove('four')" style="padding: 10px;">
                <img onclick="show('chargePart2Baste')" src="img/bime.png" style="width: 80%">
                <p style="width: 100%;text-align: center;font-size: 16px;" class="hidden-sm hidden-xs">بیــمه</p>
                <p style="width: 100%;text-align: center;font-size: 30px;" class="hidden-md hidden-lg">بیــمه</p>
            </div>
            <div class="col-md-2 col-xs-6 col-sm-6 animated bounceInRight1"
                 onmouseover="add('three')" id="three"
                 onmouseleave="remove('three')" style="padding: 10px;">
                <img onclick="show('chargePart2Baste')" src="img/bilit.png" style="width: 80%">
                <p style="width: 100%;text-align: center;font-size: 16px;" class="hidden-sm hidden-xs">بلیط مسـافرتی</p>
                <p style="width: 100%;text-align: center;font-size: 30px;" class="hidden-md hidden-lg">بلیط مسـافرتی</p>

            </div>
            <div class="col-md-2 col-xs-6 col-sm-6 animated bounceInRight2"
                 onmouseover="add('two')" id="two"
                 onmouseleave="remove('two')" style="padding: 10px;">
                <img onclick="show('ghabzStep2')" src="img/ghabz.png" style="width: 80%">
                <p style="width: 100%;text-align: center;font-size: 16px;" class="hidden-sm hidden-xs">پرداخت قبوض</p>
                <p style="width: 100%;text-align: center;font-size: 30px;" class="hidden-md hidden-lg">پرداخت قبوض</p>


            </div>
            <div class="col-md-2 col-xs-6 col-sm-6 animated bounceInRight3"
                 onmouseover="add('one')" id="one"
                 onmouseleave="remove('one')" style="padding: 10px;">
                <img onclick="show('chargePart2Baste')" src="img/charge&Baste.png" style="width: 80%">
                <p style="width: 100%;text-align: center;font-size: 16px;" class="hidden-sm hidden-xs"> شارژ و بسته
                    اینترنتی</p>
                <p style="width: 100%;text-align: center;font-size: 30px;" class="hidden-md hidden-lg"> شارژ و بسته
                    اینترنتی</p>
            </div>
        </div>


    </div>
    <div id="chargePart2Baste" class="col-md-10 col-xs-12 col-sm-12" style="">
        <div class="col-md-6" style="margin: auto;float: none;">
            <div class="form-group" style="margin-bottom: 20px;overflow: hidden">
                <label for="number1">شماره برای خرید مستقیم شارژ یا دریافت کد </label>
                <input type="text" id="number1" onkeydown="checkThis()" style="" class="form-control"
                       placeholder="09*********">
            </div>
            <div class="form-group" style="margin-bottom: -7px">

                <input type="text" class="form-control"
                       style="direction: rtl"
                       onfocus="$('.tableSearch').show()"
                       onblur="$('.tableSearch').hide()"
                       placeholder="نام ، شماره تلفن ،‌ شماره اختصاص یافته به کاربر">

                <table style="" class="tableSearch">
                    <thead>
                    <tr>
                        <th>شماره اختصاص یافته به کاربر</th>
                        <th>نام</th>
                        <th>شماره تلفن همراه</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>امیر</td>
                        <td>۰۹۱۶۶۱۵۷۸۵۹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>امیر</td>
                        <td>۰۹۱۶۶۱۵۷۸۵۹</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row" id="operatorList">
                <div class="col-md-2 col-xs-2 col-sm-2
                    col-lg-offset-3 col-md-offset-3
                    col-xs-offset-3 col-sm-offset-3"
                     style="background-color: #dddddd;padding: 10px;text-align: center" id="hamrah">
                    <img src="img/hamrahAval.png" style="width: 70%">
                </div>
                <div class="col-md-2 col-xs-2 col-sm-2 "
                     style="background-color: #dddddd;;margin-left: 20px;margin-right: 20px;padding: 10px;text-align: center"
                     id="irancell">
                    <img src="img/hamrahAval.png" style="width: 70%">
                </div>
                <div class="col-md-2 col-xs-2 col-sm-2 "
                     style="background-color: #dddddd;padding: 10px;text-align: center"
                     id="rightell">
                    <img src="img/hamrahAval.png" style="width: 70%">
                </div>
            </div>
            <div class="row" style="direction: rtl;margin-top: 10px;display: none" id="checkThisIdDiv">
                <div class="col-md-4 col-xs-12 col-sm-6" style="padding: 0;float: right">
                    <span style="float: right;color: #ffff;position: relative;top: 6px;margin-left: 5px;">سیمکارت ترابرد شده</span>
                    <input type="checkbox" id="go">
                    <label for="go" onclick="checkBoxOne()"></label>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6" style="padding: 0;display: none" id="trabord">
                    <div class="col-md-4 col-xs-12 col-sm-4" style="padding: 0;float: right" id="hamrahDiv">
                        <span style="float: right;color: #ffff;position: relative;top: 6px;margin-left: 5px;">همراه اول</span>
                        <input type="radio" name="trabord" id="OneHamrah">
                        <label for="OneHamrah" id="OneHamrahLabel" onclick="checkBoxTwo('1')"></label>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-4" style="padding: 0;float: right" id="rightellDiv">
                        <span style="float: right;color: #ffff;position: relative;top: 6px;margin-left: 5px;">رایتل</span>
                        <input type="radio" name="trabord" id="Onerightell">
                        <label for="Onerightell" id="OnerightellLabel" onclick="checkBoxTwo('2')"></label>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-4" style="padding: 0;float: right" id="irancellDiv">
                        <span style="float: right;color: #ffff;position: relative;top: 6px;margin-left: 5px;">ایرانسل</span>
                        <input type="radio" name="trabord" id="OneIrancell">
                        <label for="OneIrancell" id="OneIrancellLabel" onclick="checkBoxTwo('3')"></label>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="margin-top: 10px;display: none" id="model">
                <div class="col-md-4 col-xs-4 col-sm-4  "
                     style="text-align: center;"
                     id="">
                    <div class="bgRightellModel" onclick="ActiveThis('btnModel1')" id="btnModel1">
                        شارژ مستقیم
                    </div>
                </div>

                <div class="col-md-4 col-xs-4 col-sm-4  "
                     style="text-align: center;"
                     id="">
                    <div class="bgIrancellMode" onclick="ActiveThis('btnModel2')" id="btnModel2">
                        کد شارژ
                    </div>
                </div>

                <div class="col-md-4 col-xs-4 col-sm-4  "
                     style="text-align: center;"
                     id="">
                    <div class="bgHamrahMode" onclick="ActiveThis('btnModel3')" id="btnModel3">
                        بسته اینترنتی
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;display: none" id="model2">
                <div class="col-md-4 col-xs-4 col-sm-4"
                     style="text-align: center;"
                     id="chargeModelLog">
                    <div class="bgRightellModel" onclick="ActiveThis('btnModel4')" id="btnModel4">
                        شارژ معمولی
                    </div>
                </div>

                <div class="col-md-4 col-xs-4 col-sm-4  "
                     style="text-align: center;"
                     id="">
                    <div class="bgIrancellMode" onclick="ActiveThis('btnModel5')" id="btnModel5">
                        شارژ شگفت انگیز
                    </div>
                </div>

                <div class="col-md-4 col-xs-4 col-sm-4  "
                     style="text-align: center;"
                     id="">
                    <div class="bgHamrahMode" onclick="ActiveThis('btnModel6')" id="btnModel6">
                        سیمکارت دایمی
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group" style="margin-top: 20px;display: none" id="price">
                    <label>مبلغ شارژ را وارد کنید</label>
                    <input class="form-control" onfocus="showPriceSelect(this.value)" onkeydown="CheckPrice(this.value)" type="text" placeholder="مبلغ به تومان" id="lastPrice">
                    <ul style="" class="priceSelect" id="priceSelect">
                        <li >می توانید یکی از مبالغ زیر را انتخاب کنید</li>
                        <li id="li1" onclick="fillPrice('li1')" value="10000">10000</li>
                        <li id="li2" onclick="fillPrice('li2')" value="20000">20000</li>
                        <li id="li3" onclick="fillPrice('li3')" value="30000">30000</li>
                        <li id="li4" onclick="fillPrice('li4')" value="40000">40000</li>
                        <li id="li5" onclick="fillPrice('li5')" value="50000">50000</li>
                        <li id="li6" onclick="fillPrice('li6')" value="100000">100000</li>
                        <li id="li7" onclick="fillPrice('li7')" value="200000">200000</li>
                    </ul>
                </div>

                <div  class="form-group" style="margin-top: 50px;display: none" id="Baste" >
                    <br>
                    <span class="form-control"
                          onclick="showModelSim()"
                          id="modelSimText">
                        نوع سیمکارت خود را انتخاب کنید
                    </span>
                    <ul style="" class="priceSelect" id="modelSim">
                        <li >می توانید یکی از مدلهای سیمکارت را انتخاب کنید</li>
                        <li id="Sli1" onclick="fillGetSim(this.innerText)"  value="10000">TD-LTE</li>
                        <li id="Sli2" onclick="fillGetSim(this.innerText)"  value="20000">دایمی</li>
                        <li id="Sli3" onclick="fillGetSim(this.innerText)"  value="30000">اعتباری</li>
                        <li id="Sli4" onclick="fillGetSim(this.innerText)"  value="40000">دیتا</li>
                    </ul>
                    <br>
                    <span class="form-control"
                            onclick="showBaste()"
                            id="basteLong" style="display: none">
                        مدت زمان بسته را انتخاب کنید
                    </span>
                    <ul style="" class="priceSelect" id="basteSelect">
                        <li >می توانید یکی از بازه های زیر را انتخاب کنید</li>
                        <li  onclick="fillBaste(this.innerText)" value="10000">یکماه</li>
                        <li  onclick="fillBaste(this.innerText)" value="20000">دوماه</li>
                        <li  onclick="fillBaste(this.innerText)" value="30000">سه ماه</li>
                        <li  onclick="fillBaste(this.innerText)" value="40000">شش ماه</li>
                        <li  onclick="fillBaste(this.innerText)" value="50000">یکسال</li>
                    </ul>
                    <br>
                    <span class="form-control" style="display: none"
                            onclick="showLastBaste()"
                            id="basteLast">
                        حجم مورد نظر را وارد کنید
                    </span>
                    <ul style="" class="priceSelect" id="basteLastSelect">
                        <li >می توانید یکی از بازه های زیر را انتخاب کنید</li>
                        <li  onclick="fillBasteLast(this.innerText)" value="10000">یک گیگ</li>
                        <li  onclick="fillBasteLast(this.innerText)" value="20000">دوگیگ</li>
                        <li  onclick="fillBasteLast(this.innerText)" value="30000">سه گیگ</li>
                        <li  onclick="fillBasteLast(this.innerText)" value="40000">چهار گیگ</li>
                        <li  onclick="fillBasteLast(this.innerText)" value="50000">پنج گیگ</li>
                    </ul>


                </div>
            </div>
        </div>
    </div>
    <div id="ghabzStep2" class="col-md-10 col-xs-12 col-sm-12" style="min-height: 310px;">
        <span class="back" onclick="back('ghabzStep2')">×</span>
        <div class="col-md-12">
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0">
                <img src="img/gas.png" onclick="step2Charge('ghabzStep2','ghabzStep3','part1Ghabz')"
                     class="pull-right" style="width: 100%;">
            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0">
                <img src="img/ranandegi.png" onclick="step2Charge('ghabzStep2','ghabzStep3','part2Ghabz')"
                     class="pull-left" style="width: 100%;">
            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0">
                <img src="img/hamrahGhabz.png" onclick="step2Charge('ghabzStep2','ghabzStep3','part3Ghabz')"
                     class="pull-left" style="width: 100%;">
            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0">
                <img src="img/irancellGhabz.png" onclick="step2Charge('ghabzStep2','ghabzStep3','part3Ghabz')"
                     class="pull-left" style="width: 100%;">
            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0">
                <img src="img/gabztellphone.png" onclick="step2Charge('ghabzStep2','ghabzStep3','part1Ghabz')"
                     class="pull-left" style="width: 100%;">
            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0">
                <img src="img/ghabzShahri.png" onclick="step2Charge('ghabzStep2','ghabzStep3')" class="pull-left"
                     style="width: 100%;">
            </div>
        </div>
    </div>




    <div id="ghabzStep3" class="col-md-10 col-xs-12 col-sm-12" style="min-height: 310px;">
        <span class="back" onclick="back('ghabzStep3')">×</span>
        <div class="col-md-12">
            <div class="col-md-12" id="part1Ghabz" style="display:none">
                <p style="text-align: right;direction: rtl;    margin-top: 0;">
                    به فروشگاه اینکام خوش آمدید! در این صفحه می توانید با وارد کردن شماره اشتراک 16 رقمی روی قبض
                    استعلام دوره را گرفته و پرداخت کنید.
                </p>
                <label for="ghasEshterak">
                    برای شروع شماره اشتراک خود را وارد کرده و کلید استعلام دوره را انتخاب نمایید
                </label>
                <div class="form-group">
                    <input class="form-control" type="text" id="ghasEshterak" placeholder="****************">
                </div>
                <span class="btnPayment">پرداخت</span>
                <br>
                <h5>نکاتی که باید توجه داشت</h5>

                <ul class="ulDes">
                    <li>تسویه مبلغ پرداختی تا 72 ساعت طول می کشد.</li>
                    <li>در صورت تمایل به پرداخت با شناسه قبض و شناسه پرداخت به صفحه پرداخت قبوض شهری مراجعه کنید.
                    </li>
                </ul>


            </div>
            <div class="col-md-12" id="part2Ghabz" style="display:none">
                <p style="text-align: right;direction: rtl;    margin-top: 0;">
                    به فروشگاه اینکام خوش آمدید! در این صفحه می توانید ریز جرائم وسیله نقلیه خود را استعلام گرفته و
                    پرداخت کنید. </p>
                <label for="khalafi">
                    شماره 8 رقمی پشت کارت ماشین را وارد کرده و کلید استعلام را انتخاب نمایید
                </label>
                <div class="form-group">
                    <input class="form-control" type="text" id="khalafi" placeholder="********">
                </div>
                <span class="btnPayment">پرداخت</span>
                <br>
                <h5>نکاتی که باید توجه داشت</h5>

                <ul class="ulDes">
                    <li>پس از استعلام می توانید هر تعداد از جرائم که تمایل دارید را پرداخت کنید و ملزم به پرداخت همه
                        جریمه ها نیستید.
                    </li>
                    <li>در هر روز به میزان سقف تراکنش بانکیتان می توانید جریمه پرداخت کنید.</li>
                    <li>جرائم پرداختی بلافاصله از سیستم پلیس+10 پاک می شود اما از سایت راهور تا یک هفته ممکن است طول
                        بکشد.
                    </li>
                    <li>در صورت تمایل به پرداخت با شناسه قبض و شناسه پرداخت به صفحه پرداخت قبوض شهری مراجعه کنید.
                    </li>
                    <li>در هر روز به میزان سقف تراکنش بانکیتان می توانید جریمه پرداخت کنید.</li>
                    <li>اگر جریمه ای را پرداخت کردید و در سیم پی از ریز جرائم شما پاک نشد با پشتیبانی ما تماس
                        بگیرید. (41576-021)
                    </li>
                </ul>


            </div>
            <div class="col-md-12" id="part3Ghabz" style="display:none">
                <p style="text-align: right;direction: rtl;    margin-top: 0;">
                    به فروشگاه اینکام خوش آمدید! در این قسمت می توانید با وارد کردن شماره همراه استعلام میان دوره و
                    پایان دوره قبض خود را بگیرید. <label for="hamrahavalGhabz">
                    </label>
                <div class="form-group">
                    <input class="form-control" type="text" id="hamrahavalGhabz" placeholder="0912*******">
                </div>
                <span class="btnPayment">پرداخت</span>
                <br>
                <h5>نکاتی که باید توجه داشت</h5>

                <ul class="ulDes">
                    <li>حتما شماره را با صفر وارد کنید.
                    </li>
                    <li>شماره ای که وارد می کنید باید خط دائمی همراه اول باشد.
                    </li>
                    <li>صفر شدن مبلغ قبض پایان دوره شما تا پایان دوره طول می کشد. توجه کنید که دو بار پرداخت نکنید.
                    </li>
                    <li>صفر شدن مبلغ قبض میان دوره تا 72 ساعت پس از پرداخت انجام می شود اما مبلغ قبض پایان دوره تا
                        پایانِ دوره صفر نخواهد شد (دو بار پرداخت نکنید)
                    </li>
                    <li>اگر با این شرایط آشنا نبودید و پس از دیدن صفر نشدن قبض پایان دوره دوباره قبض را پرداخت کردید
                        نگران نباشید، مبلغ مازاد در بستانکاری شما نشسته و برای قبض های آینده مصرف می شود.
                    </li>
                    <li>به سفارش همراه اول بهتر است که یک روش برای پرداخت قبض خود انتخاب کنید (یا پایان دوره یا میان
                        دوره)
                    </li>
                    <li>در صورت تمایل به پرداخت با شناسه قبض و شناسه پرداخت به صفحه پرداخت قبوض شهری مراجعه کنید.
                    </li>
                </ul>


            </div>
        </div>
    </div>
    <div class="footer" id="footer">
        <div class="pull-left hidden-xs hidden-sm"
             style="position: absolute;bottom: 20px;left: 20px;width: 10%">
            <img class="img-responsive" src="img/samandehi.png">
        </div>
        <span style="border-top: 1px solid #ffffff;width: auto   ">
            <span>
                <img src="img/iconLeftTelegram.png">
                <img src="img/iconLeftInstagram.png">
                <img src="img/iconLeftTwitter.png">
            </span>
                |
            <span>معرفی اینکام</span>
            |
            <span>تماس با ما</span>
            |
            <span>دانلود اپلیکیشن</span>
            </span>
    </div>
</div>
<div style="" id="showMenu" onclick="hideMenu()">
</div>

<!--login sbmit recover-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> ورود / عضویت</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <div class="alert alert-danger" id="loginSubmitError"
                     style="direction: rtl;text-align: right;display: none;">
                    <strong> خطا ! </strong> سیستم قادر به ارسال پیام کوتاه برای شما نمی باشد .
                </div>
                <div class="alert alert-danger" id="loginSubmitErrorCode"
                     style="direction: rtl;text-align: right;display: none;">
                    <strong> خطا ! </strong> کد وارد شده اشتباه می باشد .
                </div>
                <p>برای ورود یا ثبت نام شماره تلفن همراه خود را وارد کنید</p>
                <br>
                <form role="form">
                    <div class="form-group">
                        <label for="mobile" style="color:black">شماره تماس</label>
                        <input type="text" class="form-control" id="mobile" placeholder="۰۹*********">
                    </div>
                    <div class="form-group" id="loginSubmitStep2" style="display: none">
                        <br>
                        <p>لطفا کد دریافتی در تلفن همراه خود را وارد کنید</p>
                        <label for="code" style="color:black">کد دریافتی</label>
                        <input type="text" class="form-control" id="code" placeholder="****">
                        <br>
                        <span onclick="firstLogin()" id="btnSms1" class="btn btn-info pull-right ">ارسال مجدد کد
                        </span>
                        <span onclick="submitCode()" id="btnSms2" class="btn btn-success pull-left "> تایید کد
                        </span>
                    </div>

                    <span onclick="firstLogin()" id="btnSms" class="btn btn-success btn-block "> ورود
                    </span>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="hideFirstLogin()" class="btn btn-danger  pull-left" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove"></span> انصراف
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" onclick="$('#myModal1').modal('toggle')">&times;</button>
                <h4><span class="glyphicon glyphicon-user"></span> عضویت </h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <div class="alert alert-danger" id="submitError"
                     style="direction: rtl;text-align: right;display: none;">
                    <p id="errorSubmit"></p>
                </div>
                <form role="form">
                    <div class="form-group">
                        <label for="name" style="color:black">نام و نام خانوادگی</label>
                        <input type="text" class="form-control" id="name" placeholder="۰۹*********">
                    </div>
                    <div class="form-group">
                        <label for="psw1" style="color:black"> رمزعبور</label>
                        <input type="text" class="form-control" id="pwd" placeholder="رمز عبور خود را وارد کنید">
                    </div>
                    <div class="form-group">
                        <label for="psw3" style="color:black">کد معرف</label>
                        <input type="text" class="form-control" id="codeAgent" placeholder="کدمعرف خود را وارد کنید">
                    </div>
                    <span type="button" onclick="submit()" class="btn btn-success btn-block"><span
                                class="glyphicon glyphicon-off"></span> ثبت نام
                    </span>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left"
                        onclick="$('#myModal1').modal('toggle');$('#myModal').modal();"><span
                            class="glyphicon glyphicon-remove"></span> بازگشت
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" onclick="$('#myModal3').modal('toggle')">&times;</button>
                <h4><span class="glyphicon glyphicon-user"></span> ورود </h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <div class="alert alert-danger" id="loginError" style="direction: rtl;text-align: right;display: none;">
                    <p id="">نام کاربری یا رمز عبور اشتباه است.</p>
                </div>
                <form role="form">
                    <div class="form-group">
                        <label for="name" style="color:black">password</label>
                        <input type="password" class="form-control" id="password" placeholder="رمز عبور">
                    </div>
                    <button type="button" onclick="login('')" class="btn btn-success btn-block"><span
                                class="glyphicon glyphicon-off"></span>ورود
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left"
                        onclick="$('#myModal3').modal('toggle');$('#myModa').modal();"><span
                            class="glyphicon glyphicon-remove"></span> بازگشت
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal12" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" onclick="$('#myModal12').modal('toggle')">&times;</button>
                <h4><span class="glyphicon glyphicon-paste"></span> بازیابی کلمه عبور </h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form">
                    <div class="form-group">
                        <label for="name" style="color:black">شماره موبایل</label>
                        <input type="text" class="form-control" id="test" placeholder="۰۹*********">
                    </div>
                    <button type="submit" class="btn btn-success btn-block"><span
                                class="glyphicon glyphicon-off"></span>بازیابی با پیام کوتاه
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left"
                        onclick="$('#myModal12').modal('toggle')"><span
                            class="glyphicon glyphicon-remove"></span> انصراف
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal14" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" onclick="$('#myModal12').modal('toggle')">&times;</button>
                <h4><span class="glyphicon glyphicon-paste"></span> بازیابی کلمه عبور </h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form">
                    <div class="form-group">
                        <label for="name" style="color:black">شماره موبایل</label>
                        <input type="text" class="form-control" id="test22" placeholder="۰۹*********">
                    </div>
                    <button type="submit" class="btn btn-success btn-block"><span
                                class="glyphicon glyphicon-off"></span>بازیابی با پیام کوتاه
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left"
                        onclick="$('#myModal12').modal('toggle')"><span
                            class="glyphicon glyphicon-remove"></span> انصراف
                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>