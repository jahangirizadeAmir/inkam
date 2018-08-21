<?php
session_start();
include "inc/db.php";
$conn = new db();
if (isset($_SESSION['userId']) && $_SESSION['userId'] != "") {
    $userId = $conn->real($_SESSION['userId']);
}
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
    <link href="css/datepicker.css" rel="stylesheet" type="text/css">
    <link href="css/all.css" rel="stylesheet" type="text/css">
    <script src="js/script.js"></script>
    <script src="js/login.js"></script>
    <script src="js/persian-date.js"></script>
    <script src="js/persian-datepicker.js"></script>

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
    <?php
    if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']) {
        ?>
        <ul id="itemLeft" class="menuLeft col-md-6 col-sm-6 col-xs-6"
            style="position: relative;z-index: 888;width: 100%">
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
                                <textarea rows="17" style="direction: rtl" id="input3" class="form-control" disabled>مشترک   { شماره موبایل } شما از طریق  <?php echo $_SESSION['userName']?> به اپلیکیشن اینکام دعوت شده اید
با اینکام خرید شارژ, بسته اینترنتی , قبوض و بلیط مسافرتی را با تخفیف انجام دهید و با معرفی اپلیکیشن اینکام مادام العمر کسب درآمد کتید
لینک دانلود اپ : www.inkam.ir/app
توجه : در زمان ثبت نام نام معرف را <?php echo $_SESSION['userName']?> وارد کنید
</textarea>
                            </div>
                        </li>
                        <li style="width: 100%;padding: 0 10px 0 10px">
                            <div class="form-group">
                                <span class="btn btn-group-vertical btn-success">ارسال</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="" style="position: relative;">
                <div class="dropdown">
                    <?php
                    $i = 0;
                    $htmlMsg = "";
                    $selectMSg = mysqli_query($conn->conn(), "
SELECT * From noti where noti.notiUserId='$userId'
");
                    while ($rowMsg = mysqli_fetch_assoc($selectMSg)) {
                        if ($rowMsg['notiView'] == 0) {
                            $i++;
                            $htmlMsg .='<li style="" class="noti active">
                            <div class="notiBag" style=""></div>
                            <p>'.$rowMsg['notiShortText'].'</p>
                            <p style="font-size: 10px;color: #999999;">'.$conn->jalali($rowMsg['msgRegDate']).'</p>
                        </li>';
                        }
                        else{
                            $htmlMsg .='<li style="" class="noti ">
                            <div class="notiBag" style=""></div>
                            <p>'.$rowMsg['notiShortText'].'</p>
                            <p style="font-size: 10px;color: #999999;">'.$conn->jalali($rowMsg['msgRegDate']).'</p>
                        </li>';
                        }
                    }
                    ?>
                    <img src="img/not.png" class="not img-responsive" id="menuLeft1" data-toggle="dropdown">
                    <span class="badge bg-danger" style="left: 37px;top: 5px;background-color: red"><?php echo $i ?></span>
                    <ul class="dropdown-menu dropdown-menu-left  extended tasks-bar" role="menu"
                        aria-labelledby="menuLeft1">
                        <div class="notify-arrow-left notify-arrow-green"></div>
                        <?php
                        echo '<li style="width: 100%">
                            <p class="green">شما '.$i.' پیام جدید دارید</p>
                        </li>';
                        echo $htmlMsg;
                        ?>

                    </ul>
                </div>
            </li>
            <li style="position: relative;">
                <div class="dropdown">
                    <?php
                        $i = 0;
                        $htmlMsg = "";
                        $selectMSg = mysqli_query($conn->conn(), "
SELECT * From msg where msg.msgUserId='$userId'
");
                        while ($rowMsg = mysqli_fetch_assoc($selectMSg)) {
                            if ($rowMsg['msgView'] == 0) {
                                $i++;
                                $htmlMsg .='<li style="" class="noti active">
                            <div class="notiBag" style=""></div>
                            <h5 style="text-align: right;margin: 0 0 10px 0px;">'.$rowMsg['msgShortText'].'</h5>
                            <p>'.$rowMsg['msgLongText'].'</p>
                            <p style="font-size: 10px;color: #999999;">'.$conn->jalali($rowMsg['msgRegDate']).'</p>
                        </li>';
                            }
                            else{
                                $htmlMsg .=' <li style="" class="noti">
                            <h6 style="    text-align: right;margin: 0 0 10px 0px;">'.$rowMsg['msgShortText'].'</h6>
                            <p>'.$rowMsg['msgLongText'].'</p>
                            <p style="font-size: 10px;color: #999999;">'.$conn->jalali($rowMsg['msgRegDate']).'</p>
                        </li>';
                            }
                        }
?>
                    <img src="img/msg.png" class="not img-responsive" id="menuLeft3" data-toggle="dropdown">
                    <span class="badge bg-primary" style="left: 37px;top: 5px;background-color: orange"><?php echo $i ?></span>
                    <ul class="dropdown-menu dropdown-menu-left  extended tasks-bar" role="menu"
                        aria-labelledby="menuLeft1">
                        <div class="notify-arrow-left notify-arrow-green"></div>
                       <?php
                        echo '<li style="width: 100%">
                            <p class="green">شما '.$i.' پیام جدید دارید</p>
                        </li>';
                        echo $htmlMsg;
                        ?>
                    </ul>
                </div>
            </li>
        </ul>
        <?php
    }
    if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']) {
        $display = true;
        ?>
        <span class="pull-right menu" id="nameUser" onclick="showProfileMenu()"
              style=""><?php echo $_SESSION['userName'] ?></span>;
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

            <li class="col-md-9 col-sm-6 col-xs-12" style="height: 100%;padding: 70px;display: none;margin-top: 20px"
                id="payMoney">
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
                <a href="#" onclick="profileShow('payMoney','getManey','dashbord')" style="padding: 30px"> افزایش
                    اعتبار</a>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12">
                <a href="#" onclick="profileShow('getManey','payMoney','dashbord')" style="padding: 30px">درخواست واریز
                    وجه</a>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12">
                <a href="#" onclick="profileShow('dashbord','getManey','payMoney')" style="padding: 30px">داشتبورد</a>
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
        <span class="pull-right menu" id="nameUser" onclick="showProfileMenu()"
              style="display: none"><?php echo $_SESSION['userName'] ?></span>;

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
                <img onclick="show('bilit')" src="img/bilit.png" style="width: 80%">
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
    <div id="chargePart2Baste" class="col-md-10 col-xs-12 col-sm-12" style="
    background: rgba(66, 66, 66, 0.1);">
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
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        شارژ مستقیم
                        <img src="img/radio.png" style="width: 20px;margin-left: 10px;position: absolute;"
                             id="imgbtnModel1">
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 "
                     style="text-align: center;"
                     id="">
                    <div class="bgIrancellMode" onclick="ActiveThis('btnModel2')" id="btnModel2">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        کد شارژ
                        <img src="img/radio.png" style="width: 20px;margin-left: 10px;position: absolute;"
                             id="imgbtnModel2">
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 "
                     style="text-align: center;"
                     id="">
                    <div class="bgHamrahMode" onclick="ActiveThis('btnModel3')" id="btnModel3">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        بسته اینترنتی
                        <img src="img/radio.png" style="width: 20px;margin-left: 10px;position: absolute;"
                             id="imgbtnModel3">
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;display: none" id="model2">
                <p style="color:#fff">نوع شارژ خود را انتخاب کنید</p>
                <div class="col-md-4 col-xs-4 col-sm-4"
                     style="text-align: center;"
                     id="chargeModelLog">
                    <div class="bgRightellModel" onclick="ActiveThis('btnModel4')" id="btnModel4">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        شارژ معمولی
                        <img src="img/radio.png" style="width: 20px;margin-left: 10px;position: absolute;"
                             id="imgbtnModel4">
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4  "
                     style="text-align: center;"
                     id="">
                    <div class="bgIrancellMode" onclick="ActiveThis('btnModel5')" id="btnModel5">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        شارژ شگفت انگیز
                        <img src="img/radio.png" style="width: 20px;margin-left: 5px;position: absolute;"
                             id="imgbtnModel5">
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4  "
                     style="text-align: center;"
                     id="">
                    <div class="bgHamrahMode" onclick="ActiveThis('btnModel6')" id="btnModel6">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">

                        سیمکارت دایمی
                        <img src="img/radio.png" style="width: 20px;margin-left: 10px;position: absolute;"
                             id="imgbtnModel6">
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group" style="margin-top: 20px;display: none" id="price">
                    <label>مبلغ شارژ را وارد کنید</label>
                    <input class="form-control"
                           onfocus="showPriceSelect(this.value)"
                           onkeydown="CheckPrice(this.value)"
                           type="text" placeholder="مبلغ به تومان" id="lastPrice">
                    <ul style="" class="priceSelect" id="priceSelect">
                        <li>می توانید یکی از مبالغ زیر را انتخاب کنید</li>
                        <li id="li1" onclick="fillPrice('li1')" value="10000">10,000</li>
                        <li id="li2" onclick="fillPrice('li2')" value="20000">20,000</li>
                        <li id="li3" onclick="fillPrice('li3')" value="30000">50,000</li>
                        <li id="li4" onclick="fillPrice('li4')" value="40000">10,0000</li>
                        <li id="li5" onclick="fillPrice('li5')" value="50000">20,0000</li>
                    </ul>
                </div>

                <div class="form-group" style="margin-top: 50px;display: none" id="Baste">
                    <div style="width: 100%" id="modelSim">
                        <p style="padding: 0px;color:#fff;">
                            نوع سیمکارت را انتخاب کنید
                        </p>
                        <div class="row">
                            <div class="col-md-4 col-xs-4 col-sm-4"
                                 style="text-align: center;float: right"
                                 id="Sli4">
                                <div class="bgRightellModel" onclick="ActiveThis('btnModel23')" id="btnModel23">
                                    <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;"
                                         class="logoSmall">

                                    دیتا
                                    <img src="img/radio.png" style="width: 20px;margin-left: 10px;position: absolute;"
                                         id="imgbtnModel23">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-4 col-sm-4  "
                                 style="text-align: center;float: right"
                                 id="Sli2">
                                <div class="bgIrancellMode" onclick="ActiveThis('btnModel24')" id="btnModel24">
                                    <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;"
                                         class="logoSmall">

                                    دایمی
                                    <img src="img/radio.png" style="width: 20px;margin-left: 5px;position: absolute;"
                                         id="imgbtnModel24">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-4 col-sm-4  "
                                 style="text-align: center;float: right"
                                 id="Sli3">
                                <div class="bgHamrahMode" onclick="ActiveThis('btnModel25')" id="btnModel25">
                                    <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;"
                                         class="logoSmall">

                                    اعتباری
                                    <img src="img/radio.png" style="width: 20px;margin-left: 10px;position: absolute;"
                                         id="imgbtnModel25">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-4 col-sm-4  "
                                 style="text-align: center;float: right"
                                 id="Sli1">
                                <div class="bgHamrahMode" onclick="ActiveThis('btnModel26')" id="btnModel26">
                                    <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;"
                                         class="logoSmall">
                                    TD-LTE
                                    <img src="img/radio.png" style="width: 20px;margin-left: 10px;position: absolute;"
                                         id="imgbtnModel26">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">


                        <span class="form-control"
                              onclick="showBaste()"
                              id="basteLong" style="display: none;margin-top: 20px">
                        مدت زمان بسته را انتخاب کنید
                    </span>
                        <ul style="" class="priceSelect" id="basteSelect">
                            <li>می توانید یکی از بازه های زیر را انتخاب کنید</li>
                            <li onclick="fillBaste(this.innerText,this.getAttribute('value'))" value="Hourly">ساعتی</li>
                            <li onclick="fillBaste(this.innerText,this.getAttribute('value'))" value="Daily">روزانه</li>
                            <li onclick="fillBaste(this.innerText,this.getAttribute('value'))" value="Weekly">هفتگی</li>
                            <li onclick="fillBaste(this.innerText,this.getAttribute('value'))" value="Monthly">یک ماهه
                            </li>
                            <li onclick="fillBaste(this.innerText,this.getAttribute('value'))" value="Two Month">دو
                                ماهه
                            </li>
                            <li onclick="fillBaste(this.innerText,this.getAttribute('value'))" value="Three Month">سه
                                ماهه
                            </li>
                            <li onclick="fillBaste(this.innerText,this.getAttribute('value'))" value="Four Month">چهار
                                ماهه
                            </li>
                            <li onclick="fillBaste(this.innerText,this.getAttribute('value'))" value="Six Month">شش
                                ماهه
                            </li>
                            <li onclick="fillBaste(this.innerText,this.getAttribute('value'))" value="Yearly">یکسال</li>
                        </ul>
                    </div>
                    <br>
                    <span class="form-control" style="display: none"
                          onclick="showLastBaste()"
                          id="basteLast">
                        حجم مورد نظر را وارد کنید
                    </span>
                    <ul style="" class="priceSelect" id="basteLastSelect">
                        <li>می توانید یکی از بازه های زیر را انتخاب کنید</li>
                    </ul>
                </div>
                <div style="text-align: center;margin-top: 20px;display: none" id="AccBtnCharge">
                    <span class="btn btn-success btn-lg" style="float: none;margin: auto"
                          onclick="$('#myModalFaktor').modal()">تایید</span>
                </div>

                <div class="modal fade" id="myModalFaktor" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header" style="padding:35px 50px;">
                                <button type="button" class="close" onclick="$('#myModalFaktor').modal('toggle')">
                                    &times;
                                </button>
                                <h4>پیش فاکتور</h4>
                            </div>
                            <div class="modal-body" style="padding:40px 50px;">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="name" style="color:black" id="NameFacktor"> </label>
                                        <br>
                                        <br>
                                        <label for="name" style="color:black" id="NumberFacktor">شماره سرویس</label>
                                        <br>
                                        <br>
                                        <label for="name" style="color:black" id="priceFacktor">مبلغ</label>
                                        <br>
                                        <br>
                                        <?php
                                        if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']) {
                                            ?>
                                            <label for="name" style="color:black" id="offerFacktor">تخفیف شما روی این
                                                محصول</label>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group" style="    overflow: hidden;
    width: 100%;
    position: relative;
    margin-top: 10px;
    top: 25px;
direction: rtl  ">
                                    <span type="submit" class="btn btn-success" onclick="GoBank()"
                                          style="float: right;"><span
                                                class="fas fa-credit-card" style="    margin-left: 15px;
    position: relative;
    top: 1px;"></span>پرداخت آنلاین
                                    </span>
                                        <?php
                                        if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']) {
                                            ?>
                                            <button type="submit" class="btn btn-info " style="float: left;"><span
                                                        style="    margin-left: 15px;
    position: relative;
    top: 1px;"
                                                        class="fas fa-wallet"></span>پرداخت از اعتبار
                                            </button>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger btn-default pull-left"
                                        onclick="$('#myModalFaktor').modal('toggle')"><span
                                            class="glyphicon glyphicon-remove"></span> انصراف
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="bilit" class="col-md-10 col-xs-12 col-sm-12" style="min-height: 310px;top: 120px;display: none">
        <span class="back" onclick="back('bilit')">×</span>
        <div class="col-md-12">
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0">
                <img src="img/bus.png" onclick="step2Charge('bilit','bilit2','part1Bilit')"
                     class="pull-right" style="width: 70%;">
            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0">
                <img src="img/ghatar.png" onclick="step2Charge('bilit','bilit2','part2Bilit')"
                     class="pull-right" style="width: 70%;">
            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0">
                <img src="img/airplan.png" onclick="step2Charge('bilit','bilit2','part3Bilit')"
                     class="pull-right" style="width: 70%;">
            </div>
        </div>
    </div>
    <div id="bilit2" class="col-md-10 col-xs-12 col-sm-12" style="min-height: 310px;top:120px">
        <span class="back" onclick="back('bilit2')">×</span>
        <div class="col-md-12">
            <div class="col-md-12" id="part1Bilit" style="display:none">
                <div class="page-help-wrapper">
                    <p>
                        به اینکام خوش آمدید! در این قسمت امکان خرید بلیط اتوبوس در سرتاسر کشور وجود دارد.
                    </p>
                    <p>
                        <b>مراحل خرید بلیط اتوبوس :</b>
                    </p>
                    <ol class="page-step-list" style="direction: rtl">
                        <li>انتخاب مبدأ، مقصد، تاریخ و جستجوی سرویس</li>
                        <li>انتخاب سرویس دلخواه</li>
                        <li>انتخاب صندلی و وارد کردن نام</li>
                        <li>شروع پرداخت و مشاهده پیش فاکتور</li>
                        <li>تکمیل پرداخت و دریافت بلیط</li>
                    </ol>
                    <p>
                        <b>توجه : در حال حاضر امکان استرداد بلیط تنها از ساعت 8 صبح الی 17 عصر امکان پذیر است.</b>
                    </p>
                </div>
                <div class="page-form-wrapper">

                    <div id="searchForm" class="search-form">
                        <label>
                            <b>مرحله 1 : </b>
                            مبداء، مقصد و تاریخ خود را انتخاب کرده و روی جستجوی بلیط کلیک نمایید.
                        </label>
                        <hr>
                        <br>
                        <br>
                        <div class="form-group">
                            <label>انتخاب استان مبداء </label>
                            <select id="" tabindex="-1" class="form-control" aria-hidden="true">
                                <option value="" selected="" disabled="">انتخاب استان</option>
                                <option value="36000000">استان خوزستان</option>
                                <option value="41000000">استان فارس</option>
                                <option value="85000000">استان کهگیلویه و بویر احمد</option>
                                <option value="67000000">استان زنجان</option>
                                <option value="77000000">استان چهارمحال و بختیاری</option>
                                <option value="81000000">استان لرستان</option>
                                <option value="11000000">استان تهران</option>
                                <option value="61000000">استان سیستان و بلوچستان</option>
                                <option value="73000000">استان کردستان</option>
                                <option value="21000000">استان اصفهان</option>
                                <option value="18000000">استان البرز</option>
                                <option value="26000000">استان آذربایجان شرقی</option>
                                <option value="32000000">استان خراسان شمالی</option>
                                <option value="45000000">استان کرمان</option>
                                <option value="75000000">استان همدان</option>
                                <option value="33000000">استان خراسان جنوبی</option>
                                <option value="57000000">استان آذربایجان غربی</option>
                                <option value="16000000">استان مازندران</option>
                                <option value="97000000">استان گلستان</option>
                                <option value="64000000">استان هرمزگان</option>
                                <option value="93000000">استان یزد</option>
                                <option value="87000000">استان سمنان</option>
                                <option value="51000000">استان مرکزی</option>
                                <option value="54000000">استان گیلان</option>
                                <option value="83000000">استان ایلام</option>
                                <option value="31000000">استان خراسان رضوی</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>انتخاب پایانه مبداء </label>
                            <select id="sourceTerminalCombo" tabindex="-1" class="form-control" aria-hidden="true">
                                <option value="" selected="" disabled="">انتخاب پایانه</option>
                                <option value="36310000">اهواز</option>
                                <option value="36320000">آبادان</option>
                                <option value="36330000">اندیمشک</option>
                                <option value="36360001">بندرماهشهر</option>
                                <option value="36370000">بهبهان</option>
                                <option value="36380000">خرمشهر</option>
                                <option value="36390000">دزفول</option>
                                <option value="36420000">شوش</option>
                                <option value="36450000">شوشتر</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>انتخاب استان مقصد </label>
                            <select id="destenationStateCombo" tabindex="-1" class="form-control" aria-hidden="true">
                                <option value="" selected="" disabled="">انتخاب استان</option>
                                <option value="11000000">استان تهران</option>
                                <option value="14000000">استان قم</option>
                                <option value="15000000">استان قزوین</option>
                                <option value="16000000">استان مازندران</option>
                                <option value="18000000">استان البرز</option>
                                <option value="21000000">استان اصفهان</option>
                                <option value="26000000">استان آذربایجان شرقی</option>
                                <option value="36000000">استان خوزستان</option>
                                <option value="41000000">استان فارس</option>
                                <option value="45000000">استان کرمان</option>
                                <option value="51000000">استان مرکزی</option>
                                <option value="54000000">استان گیلان</option>
                                <option value="57000000">استان آذربایجان غربی</option>
                                <option value="64000000">استان هرمزگان</option>
                                <option value="67000000">استان زنجان</option>
                                <option value="71000000">استان کرمانشاه</option>
                                <option value="73000000">استان کردستان</option>
                                <option value="75000000">استان همدان</option>
                                <option value="77000000">استان چهارمحال و بختیاری</option>
                                <option value="81000000">استان لرستان</option>
                                <option value="83000000">استان ایلام</option>
                                <option value="85000000">استان کهگیلویه و بویر احمد</option>
                                <option value="93000000">استان یزد</option>
                                <option value="95000000">استان بوشهر</option>
                                <option value="97000000">استان گلستان</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>انتخاب پایانه مقصد </label>
                            <select id="destenationTerminalCombo" tabindex="-1" class="form-control" aria-hidden="true">
                                <option value="" selected="" disabled="">انتخاب پایانه</option>
                                <option value="11320000">تهران</option>
                                <option value="11321006">پایانه جنوب(تهران)</option>
                                <option value="11321007">پایانه بیهقی(تهران)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>تاریخ حرکت </label>
                            <input id="goDate" readonly="" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn--blue" title="جستجوی لیست سرویس ها" id="btn btn-primery">جستجوی
                                بلیط</a>
                        </div>
                    </div>


                </div>

            </div>
            <div class="col-md-12" id="part2Bilit" style="display:none">
                <div class="page-help-wrapper">
                    <p>
                        به اینکام خوش آمدید! در این بخش می توانید بلیط قطار سرتاسر کشور را تهیه فرمایید.
                    </p>
                    <p>
                        <b>مراحل خرید بلیط قطار :</b>
                    </p>
                    <ol class="page-step-list" style="direction: rtl">
                        <li>انتخاب مسیر، نوع بلیط، نوع کوپه، تاریخ و تعداد بلیط و جستجوی بلیط</li>
                        <li>انتخاب سرویس دلخواه</li>
                        <li>وارد کردن اطلاعات مسافران</li>
                        <li>بررسی صحت اطلاعات مسافران</li>
                        <li>شروع پرداخت و مشاهده پیش فاکتور</li>
                        <li>تکمیل پرداخت و دریافت بلیط</li>
                    </ol>
                </div>
                <div class="page-form-wrapper">


                    <div id="searchForm">
                        <label>
                            <b>مرحله 1 : </b>
                            برای شروع مبداء، مقصد، تاریخ حرکت و تعداد بلیط را انتخاب کرده و روی کلید جستجوی بلیط کلیک
                            نمایید.

                        </label>
                        <hr>
                        <div id="pathTypeWrapper">
                            <a id="singleWay" title="مسیر یک طرفه" class="switch-btn active" href="#">یک طرفه</a>
                            <a id="twoWay" title="مسیر دو طرفه (رفت و برگشت)" class="switch-btn" href="#">رفت و
                                برگشت</a>
                        </div>
                        <div class="form-group">
                            <label>انتخاب مبدا </label>
                            <select id="sourceStation" tabindex="-1" class="form-control"
                                    aria-hidden="true">
                                <option value="36000000">استان خوزستان</option>
                                <option value="41000000">استان فارس</option>
                                <option value="85000000">استان کهگیلویه و بویر احمد</option>
                                <option value="67000000">استان زنجان</option>
                                <option value="77000000">استان چهارمحال و بختیاری</option>
                                <option value="81000000">استان لرستان</option>
                                <option value="11000000">استان تهران</option>
                                <option value="61000000">استان سیستان و بلوچستان</option>
                                <option value="73000000">استان کردستان</option>
                                <option value="21000000">استان اصفهان</option>
                                <option value="18000000">استان البرز</option>
                                <option value="26000000">استان آذربایجان شرقی</option>
                                <option value="32000000">استان خراسان شمالی</option>
                                <option value="45000000">استان کرمان</option>
                                <option value="75000000">استان همدان</option>
                                <option value="33000000">استان خراسان جنوبی</option>
                                <option value="57000000">استان آذربایجان غربی</option>
                                <option value="16000000">استان مازندران</option>
                                <option value="97000000">استان گلستان</option>
                                <option value="64000000">استان هرمزگان</option>
                                <option value="93000000">استان یزد</option>
                                <option value="87000000">استان سمنان</option>
                                <option value="51000000">استان مرکزی</option>
                                <option value="54000000">استان گیلان</option>
                                <option value="83000000">استان ایلام</option>
                                <option value="31000000">استان خراسان رضوی</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>انتخاب مقصد </label>
                            <select id="destenationStation" tabindex="-1" class="form-control"
                                    aria-hidden="true">
                                <option value="36000000">استان خوزستان</option>
                                <option value="41000000">استان فارس</option>
                                <option value="85000000">استان کهگیلویه و بویر احمد</option>
                                <option value="67000000">استان زنجان</option>
                                <option value="77000000">استان چهارمحال و بختیاری</option>
                                <option value="81000000">استان لرستان</option>
                                <option value="11000000">استان تهران</option>
                                <option value="61000000">استان سیستان و بلوچستان</option>
                                <option value="73000000">استان کردستان</option>
                                <option value="21000000">استان اصفهان</option>
                                <option value="18000000">استان البرز</option>
                                <option value="26000000">استان آذربایجان شرقی</option>
                                <option value="32000000">استان خراسان شمالی</option>
                                <option value="45000000">استان کرمان</option>
                                <option value="75000000">استان همدان</option>
                                <option value="33000000">استان خراسان جنوبی</option>
                                <option value="57000000">استان آذربایجان غربی</option>
                                <option value="16000000">استان مازندران</option>
                                <option value="97000000">استان گلستان</option>
                                <option value="64000000">استان هرمزگان</option>
                                <option value="93000000">استان یزد</option>
                                <option value="87000000">استان سمنان</option>
                                <option value="51000000">استان مرکزی</option>
                                <option value="54000000">استان گیلان</option>
                                <option value="83000000">استان ایلام</option>
                                <option value="31000000">استان خراسان رضوی</option>


                            </select>

                            <div class="form-group">
                                <label>نوع بلیط</label>
                                <select id="ticketType" tabindex="-1" class="form-control" aria-hidden="true">
                                    <option value="1">مسافرین عادی</option>
                                    <option value="2">ویژه برادران</option>
                                    <option value="3">ویژه خواهران</option>
                                    <option value="4">حمل خودرو</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-item-wrapper busy">
                                <label>کوپه دربستی باشد ؟ </label>
                                <div id="trainJustCompartmentWrapper" style="margin: 0 auto; text-align: right;  ">
                                    <a id="noCompartment" class="switch-btn" title="کوپه اشتراکی" href="#">خیر</a>
                                    <a id="yesCompartment" class="switch-btn active" title="کوپه دربستی"
                                       href="#">بله</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="part3Bilit" style="display:none">
                <div class="page-help-wrapper">
                    <p>
                        به اینکام خوش آمدید! در این بخش می توانید بلیط قطار سرتاسر کشور را تهیه فرمایید.
                    </p>
                    <p>
                        <b>مراحل خرید بلیط قطار :</b>
                    </p>
                    <ol class="page-step-list" style="direction: rtl">
                        <li>انتخاب مسیر، نوع بلیط، نوع کوپه، تاریخ و تعداد بلیط و جستجوی بلیط</li>
                        <li>انتخاب سرویس دلخواه</li>
                        <li>وارد کردن اطلاعات مسافران</li>
                        <li>بررسی صحت اطلاعات مسافران</li>
                        <li>شروع پرداخت و مشاهده پیش فاکتور</li>
                        <li>تکمیل پرداخت و دریافت بلیط</li>
                    </ol>
                </div>
                <div class="page-form-wrapper">


                    <div id="searchForm">
                        <label>
                            <b>مرحله 1 : </b>
                            برای شروع مبداء، مقصد، تاریخ حرکت و تعداد بلیط را انتخاب کرده و روی کلید جستجوی بلیط کلیک
                            نمایید.

                        </label>
                        <hr>
                        <div id="pathTypeWrapper">
                            <a id="singleWay" title="مسیر یک طرفه" class="switch-btn active" href="#">یک طرفه</a>
                            <a id="twoWay" title="مسیر دو طرفه (رفت و برگشت)" class="switch-btn" href="#">رفت و
                                برگشت</a>
                        </div>
                        <div class="form-group">
                            <label>انتخاب مبدا </label>
                            <select id="sourceStation" tabindex="-1" class="form-control"
                                    aria-hidden="true">
                                <option value="36000000">استان خوزستان</option>
                                <option value="41000000">استان فارس</option>
                                <option value="85000000">استان کهگیلویه و بویر احمد</option>
                                <option value="67000000">استان زنجان</option>
                                <option value="77000000">استان چهارمحال و بختیاری</option>
                                <option value="81000000">استان لرستان</option>
                                <option value="11000000">استان تهران</option>
                                <option value="61000000">استان سیستان و بلوچستان</option>
                                <option value="73000000">استان کردستان</option>
                                <option value="21000000">استان اصفهان</option>
                                <option value="18000000">استان البرز</option>
                                <option value="26000000">استان آذربایجان شرقی</option>
                                <option value="32000000">استان خراسان شمالی</option>
                                <option value="45000000">استان کرمان</option>
                                <option value="75000000">استان همدان</option>
                                <option value="33000000">استان خراسان جنوبی</option>
                                <option value="57000000">استان آذربایجان غربی</option>
                                <option value="16000000">استان مازندران</option>
                                <option value="97000000">استان گلستان</option>
                                <option value="64000000">استان هرمزگان</option>
                                <option value="93000000">استان یزد</option>
                                <option value="87000000">استان سمنان</option>
                                <option value="51000000">استان مرکزی</option>
                                <option value="54000000">استان گیلان</option>
                                <option value="83000000">استان ایلام</option>
                                <option value="31000000">استان خراسان رضوی</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>انتخاب مقصد </label>
                            <select id="destenationStation" tabindex="-1" class="form-control"
                                    aria-hidden="true">
                                <option value="36000000">استان خوزستان</option>
                                <option value="41000000">استان فارس</option>
                                <option value="85000000">استان کهگیلویه و بویر احمد</option>
                                <option value="67000000">استان زنجان</option>
                                <option value="77000000">استان چهارمحال و بختیاری</option>
                                <option value="81000000">استان لرستان</option>
                                <option value="11000000">استان تهران</option>
                                <option value="61000000">استان سیستان و بلوچستان</option>
                                <option value="73000000">استان کردستان</option>
                                <option value="21000000">استان اصفهان</option>
                                <option value="18000000">استان البرز</option>
                                <option value="26000000">استان آذربایجان شرقی</option>
                                <option value="32000000">استان خراسان شمالی</option>
                                <option value="45000000">استان کرمان</option>
                                <option value="75000000">استان همدان</option>
                                <option value="33000000">استان خراسان جنوبی</option>
                                <option value="57000000">استان آذربایجان غربی</option>
                                <option value="16000000">استان مازندران</option>
                                <option value="97000000">استان گلستان</option>
                                <option value="64000000">استان هرمزگان</option>
                                <option value="93000000">استان یزد</option>
                                <option value="87000000">استان سمنان</option>
                                <option value="51000000">استان مرکزی</option>
                                <option value="54000000">استان گیلان</option>
                                <option value="83000000">استان ایلام</option>
                                <option value="31000000">استان خراسان رضوی</option>


                            </select>

                            <div class="form-group">
                                <label>نوع بلیط</label>
                                <select id="ticketType" tabindex="-1" class="form-control" aria-hidden="true">
                                    <option value="1">مسافرین عادی</option>
                                    <option value="2">ویژه برادران</option>
                                    <option value="3">ویژه خواهران</option>
                                    <option value="4">حمل خودرو</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-item-wrapper busy">
                                <label>کوپه دربستی باشد ؟ </label>
                                <div id="trainJustCompartmentWrapper" style="margin: 0 auto; text-align: right;  ">
                                    <a id="noCompartment" class="switch-btn" title="کوپه اشتراکی" href="#">خیر</a>
                                    <a id="yesCompartment" class="switch-btn active" title="کوپه دربستی"
                                       href="#">بله</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="ghabzStep2" class="col-md-10 col-xs-12 col-sm-12" style="min-height: 310px;top: 120px;">
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
                <img src="img/ghazStep2.png" onclick="step2Charge('ghabzStep2','ghabzStep3','part4Ghabz')"
                     class="pull-left"
                     style="width: 100%;">
            </div>
        </div>
    </div>
    <div id="ghabzStep3" class="col-md-10 col-xs-12 col-sm-12" style="min-height: 310px;top:120px">
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
                    <li>اگر جریمه ای را پرداخت کردید و در اینکام از ریز جرائم شما پاک نشد با پشتیبانی ما تماس
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
            <div class="col-md-12" id="part4Ghabz" style="display:none">
                <div class="page-help-wrapper">
                    <p>
                        به فروشگاه اینکام خوش آمدید! در این قسمت شما می توانید کلیه قبوضی که دارای شناسه قبض و شناسه
                        پرداخت هستند را پرداخت کنید.
                    </p>
                    <p>
                        لطفاً توجه داشته باشید که تسویه شدن قبوض پرداختی تا <span style="color:red;">72 ساعت</span> طول
                        می کشد.
                    </p>
                    <p>
                        <b>مراحل کار :</b>
                    </p>
                    <ol class="page-step-list" style="direction: rtl;">
                        <li>وارد کردن شناسه قبض و شناسه پرداخت</li>
                        <li>مشاهده وضعیت قبض</li>
                        <li>شروع پرداخت و مشاهده پیش فاکتور</li>
                        <li>تکمیل پرداخت</li>
                    </ol>
                </div>
                <div class="form-group">
                    <label for="hamrahavalGhabz">شناسه قبض</label>
                    <input class="form-control" type="text" id="hamrahavalGhabz1" placeholder="شناسه قبض">
                    <br>
                    <label for="hamrahavalGhabz">شناسه پرداخت</label>
                    <input class="form-control" type="text" id="hamrahavalGhabz2" placeholder="شناسه پرداخت">
                </div>
                <span class="btnPayment">پرداخت</span>
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

<script>
    $(document).ready(function () {
        $("#goDate").pDatepicker();
    });
</script>
<!--login submit recover-->
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