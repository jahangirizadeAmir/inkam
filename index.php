<?php
session_start();
include "inc/db.php";
include "inc/sharj.php";
include "inc/my_frame.php";
$sharj = new sharj();
$conn = new db();
if (isset($_SESSION['userId']) && $_SESSION['userId'] != "") {
    $userId = $conn->real($_SESSION['userId']);
    $selectUser = mysqli_query($conn->conn(), "SELECT * FROM inviteCode where inviteCodeUserId='$userId' and status='1'");
    $rowInviteCode = mysqli_fetch_assoc($selectUser);
    $invCode = $rowInviteCode['inviteCodeText'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>اینکام | سیستم جامع خرید محصولات و خدمات مجازی</title>
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
    <script src="js/inputMask.js"></script>
    <script src="js/profile.js"></script>
    <script src="app/assets/js/warm-canvas.js"></script>
    <link rel="icon" type="image/ico" href="favicon.ico">
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
<body class="slider-area warm-canvas">
<canvas class="worms sketch" height="531" width="1440"
        style="position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;"></canvas>
<div class="pull-right col-md-2 col-sm-6 col-xs-12 menuDiv" id="menuDiv">
    <ul class="menuList">
        <li style="
    padding: 3px;
" onclick="
            ProfileChange('homeDashbord');
                        hideMenu();
            ">
            <i class="iconMenuLeft inkam"
               style="    position: relative;
    top: 10px;"><img style="width: 37px;
    /* height: 10px; */
    padding: 9px;
    position: relative;
    bottom: 3px;" src="img/iconDoor.png"></i>
            صفحه اصلی
            <br>
            <span style="color: #e4e4e4;
    margin-right: 48px;">خرید محصولات</span>
        </li>

        <li style="
    padding: 3px;
" onclick="
        $('#userOption').show();
        ProfileChange('miniDashbord');
">
            <i class="fas fa-tachometer-alt iconMenuLeft orange"
               style="    position: relative;
    top: 10px;"></i>
            پیشخوان
            <br>
            <span style="color: #e4e4e4;
    margin-right: 48px;">خلاصه حساب کاربری ، افزایش اعتبار ، درخواست واریز وجه</span>
        </li>


        <li style="padding: 3px;" onclick="

        $('#userOption').show();
        ProfileChange('userProfile');

">
            <i class="fa fa-user-alt iconMenuLeft blue"
               style="    position: relative;
    top: 10px;"></i>
            ویرایش پروفایل <br>
            <span style="color: #e4e4e4;
    margin-right: 48px;">تغییر رمز عبور ، ثبت کد معرف ، تغییر نام و نام خانوادگی</span>
        </li>


        <li style="padding: 3px;"
            onclick="
        $('#userOption').show();
        ProfileChange('MyUser');
"
        >
            <i class="fa fa-users iconMenuLeft red"
               style="position: relative;
    top: 10px;"></i> مدیریت کاربران<br>
            <span style="color: #e4e4e4;
    margin-right: 48px;">دعوت کاربر ، مدیریت شناسه ها ، لیست کاربران</span>
        </li>


        <li style="padding: 3px;"
            onclick="
        $('#userOption').show();
        ProfileChange('report');
">
            <i class="fas fa-chart-line iconMenuLeft green"
               style="position: relative;top: 10px;"></i>
            گزارشات <br>
            <span style="color: #e4e4e4;
    margin-right: 48px;">گزارشات مالی ،‌ گزارشات خرید ، گزارشات درآمد</span>

        </li>


        <li style="padding: 3px;"
            onclick="
        $('#userOption').show();
        ProfileChange('contactListP');
        ">
            <i class="fa fa-address-book iconMenuLeft rebeccapurple"
               style="position: relative;top: 10px;"
            ></i>
            دفترچه تلفن <br>
            <span style="color: #e4e4e4;
    margin-right: 48px;">لیست دفترچه تلفن</span>
        </li>
    </ul>
</div>
<div class="col-md-12 col-sm-12 col-xs-12" style="position: absolute;z-index: 310;margin-bottom: 15px">
    <ul id="itemLeft" class="menuLeft col-md-6 col-sm-6 col-xs-6"
        style="position: relative;z-index: 888;width: 100%">
        <li class=""><a href="index.php"><img src="img/logoType.png" class="logo"></a></li>
        <?php
        if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']) {
        ?>
        <li style="position: relative;">
            <div class="dropdown">
                <img src="img/plus.png" class="not img-responsive" id="menuLeft2" data-toggle="dropdown">
                <ul class="dropdown-menu center dropdown-menu-left pull-left extended tasks-bar" role="menu"
                    style="width: 271px!important;"
                    aria-labelledby="menuLeft2">
                    <div class="notify-arrow-center notify-arrow-green"></div>
                    <li style="width: 100%">
                        <p class="green">دوستان خود را به اینکام دعوت کنید</p>
                    </li>
                    <li>
                        <div class="alert alert-success" id="okInv"
                             style="direction: rtl;text-align: right;display: none">
                        </div>
                        <div class="alert alert-danger" id="ErrorInv"
                             style="direction: rtl;text-align: right;display: none">
                        </div>
                    </li>
                    <li style="width: 100%;padding: 0 10px 0 10px">
                        <div class="form-group">
                            <label for="input" style="color: #000;">شماره تلفن</label>
                            <input id="input3" type="text" value="" onkeydown="complateInvMSG()"
                                   onkeyup="complateInvMSG()" placeholder="" class="form-control">
                        </div>
                    </li>
                    <li style="width: 100%;padding: 0 10px 0 10px">
                        <div class="form-group">
                            <p style="direction: rtl;height: auto" id="msgInv" class="form-control" disabled>مشترک <span
                                        id="InvTellShow" style="color: #000000;margin: 0;
    width: auto;
    padding: 0!important;">شماره تلفن</span> شما از طرف <?php echo $_SESSION['userName'] ?> به اپلیکیشن اینکام دعوت شده
                                اید با اینکام خرید شارژ ، بسته اینترنتی ، قبوض و بلیط مسافرتی را با تخفیف انجام دهید و
                                با معرفی اپلیکیشن اینکام مادام العمر کسب درآمد کنید
                                <br>
                                لینک دانلود اپ : www.inkam.ir/app
                                <br>
                                توجه : در زمان ثبت نام کد معرف را <?php echo $invCode ?> وارد کنید
                            </p>
                        </div>
                    </li>
                    <li style="width: 100%;padding: 0 10px 0 10px">
                        <div class="form-group">
                            <p onclick="inv()" class="btn btn-group-vertical btn-success">ارسال</>
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
                $cot = "'";
                $selectMSg = mysqli_query($conn->conn(), "
SELECT * From noti where noti.notiUserId='$userId' ORDER BY date(noti.notiRegDate) DESC , time(noti.notiRegTime) DESC 
");
                while ($rowMsg = mysqli_fetch_assoc($selectMSg)) {
                    if ($rowMsg['notiView'] == 0) {
                        $i++;
                        $htmlMsg .= '<li style="" class="noti active" id="' . $rowMsg["notiId"] . '" onclick="showModalMsg(' . $cot . $rowMsg["notiId"] . $cot . ',' . $cot . 'noti' . $cot . ')">
                            <div class="notiBag" id="bag' . $rowMsg["notiId"] . '" style=""></div>
                            <p>' . $rowMsg['notiShortText'] . '</p>
                            <p style="font-size: 10px;color: #999999;">' . $conn->jalali($rowMsg['notiRegDate']) . '-' . $rowMsg['notiRegTime'] . '</p>
                        </li>';
                    } else {
                        $htmlMsg .= '<li style="" id="' . $rowMsg["notiId"] . '" class="noti " onclick="showModalMsg(' . $cot . $rowMsg["notiId"] . $cot . ',' . $cot . 'noti' . $cot . ')">
                            <p>' . $rowMsg['notiShortText'] . '</p>
                            <p style="font-size: 10px;color: #999999;">' . $conn->jalali($rowMsg['notiRegDate']) . '-' . $rowMsg['notiRegTime'] . '</p>
                        </li>';
                    }
                }
                ?>
                <img src="img/not.png" class="not img-responsive" id="menuLeft1" data-toggle="dropdown">
                <span class="badge bg-danger" id="showMsgNoti"
                      style="left: 37px;top: 5px;background-color: red"><?php echo $i ?></span>
                <ul class="dropdown-menu dropdown-menu-left  extended tasks-bar" role="menu"
                    aria-labelledby="menuLeft1" style="    width: 257px!important;height: 300px;
    overflow: auto;">
                    <div class="notify-arrow-left notify-arrow-green"></div>
                    <?php
                    echo '<li style="width: 100%">
                            <p class="green" id="notInCount">شما ' . $i . ' اعلان جدید دارید</p>
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
SELECT * From msg where msg.msgUserId='$userId' ORDER BY date(msg.msgRegDate) DESC , time(msg.msgRegTime) DESC
");
                while ($rowMsg = mysqli_fetch_assoc($selectMSg)) {
                    if ($rowMsg['msgView'] == 0) {
                        $i++;
                        $htmlMsg .= '<li style="" id="' . $rowMsg["msgId"] . '" onclick="showModalMsg(' . $cot . $rowMsg["msgId"] . $cot . ',' . $cot . 'msg' . $cot . ')" class="noti active">
                            <div class="notiBag" id="bag' . $rowMsg["msgId"] . '" style=""></div>
                            <h5 style="text-align: right;margin: 0 0 10px 0px;font-weight: 900;
    font-size: 14px;">' . $rowMsg['msgLongText'] . '</h5>
                            <p>' . $rowMsg['msgShortText'] . '</p>
                            <p style="font-size: 10px;color: #999999;">' . $conn->jalali($rowMsg['msgRegDate']) . '</p>
                        </li>';
                    } else {
                        $htmlMsg .= ' <li style="" id="' . $rowMsg["msgId"] . '" onclick="showModalMsg(' . $cot . $rowMsg["msgId"] . $cot . ',' . $cot . 'msg' . $cot . ')" class="noti">
                            <h6 style="    text-align: right;margin: 0 0 10px 0px;font-weight: 900;
    font-size: 14px;">' . $rowMsg['msgLongText'] . '</h6>
                            <p>' . $rowMsg['msgShortText'] . '</p>
                            <p style="font-size: 10px;color: #999999;">' . $conn->jalali($rowMsg['msgRegDate']) . '</p>
                        </li>';
                    }
                }
                ?>
                <img src="img/msg.png" class="not img-responsive" id="menuLeft3" data-toggle="dropdown">
                <span class="badge bg-primary" id="showMsgMsg"
                      style="left: 37px;top: 5px;background-color: orange"><?php echo $i ?></span>
                <ul class="dropdown-menu dropdown-menu-left extended tasks-bar" style="height: 300px;
    overflow: auto;" role="menu"
                    aria-labelledby="menuLeft1">
                    <div class="notify-arrow-left notify-arrow-green"></div>
                    <?php
                    echo '<li style="width: 100%" >
                            <p class="green" id="MSGInCount">شما ' . $i . ' پیام جدید دارید</p>
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
              style=""><i class="fas fa-sort-down" style="    font-size: 18px;
    position: absolute;
    left: 21px;
    top: 8px;"></i> <?php echo $_SESSION['userName'] ?></span>
        <ul class="dropdown-menu extended logout" id="menuProfile" style="display: none">
            <div class="notify-arrow-center notify-arrow-green" style="    right: 137px;
    border-bottom-color: white!important;
    /* border-top-color: red; */
    left: auto;"></div>
            <li class="col-md-9 col-sm-6 col-xs-12" id="dashbord" style="   padding: 0px;
    margin-top: 10px;">
                <p style="
    text-align: center;
    /* padding: 10px; */
">
                    <?php
                    $selectUser = mysqli_query($conn->conn(), "SELECT * FROM user where user.userId='$userId'");
                    $rowSelectUser = mysqli_fetch_assoc($selectUser);
                    $money = $rowSelectUser['userMoney'];

                    ?>
                    <span style="
    width: auto;
    text-align: center;
    padding: 10px;
    background: #3b8390;
    border-radius: 10px;
    color: #fff;
" id="spanMoney"> موجودی کیف پول  : <?php echo toMoney($money) ?> تومان </span>
                </p>
                <div class="col-md-4 col-sm-6 col-xs-12  Circle">
                    <span>تعداد کاربران شما</span>
                    <div class="oneCircle">
                        <span style="    direction: rtl;
    font-size: 16px;
    top: 39px;
    left: 0px;
    position: absolute;">
                            <?php
                            $selectUserCount = mysqli_query($conn->conn(), "SELECT * FROM user where UserOwner='$userId'");
                            $Count = mysqli_num_rows($selectUserCount);
                            echo $Count;
                            ?>
                        </span>
                    </div>
                    <button onclick="$('#userOption').show();ProfileChange('MyUser');" class="btn btn-info2"
                            style="margin-top: 10px;">
                        جزییات بیشتر
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12  Circle">
                    <span>درآمد از خرید  کاربر</span>

                    <div class="threeCircle">
                          <span style="    direction: rtl;
    font-size: 16px;
    top: 39px;
    left: 0px;
    position: absolute;">
<?php

$selectPriceOwne = mysqli_query($conn->conn(), "SELECT sum(payPrice) as sum FROM pay where pay.payUserId='$userId' AND pay.payModel='5'");
$rowPriceOwne = mysqli_fetch_assoc($selectPriceOwne);
if ($rowPriceOwne['sum'] == '')
    echo '0 تومان';
else
    echo $rowPriceOwne['sum'] . ' تومان ';
?>
                          </span>
                    </div>
                    <button class="btn btn-info2" onclick="$('#userOption').show();ProfileChange('MyUser');"
                            style="margin-top: 10px;">
                        جزییات بیشتر
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12  Circle">
                    <span>درآمد خرید از پنل</span>
                    <div class="twoCircle">
                       <span style="    direction: rtl;
    font-size: 16px;
    top: 39px;
    left: 0px;
    position: absolute;">
                           <?php
                           $selectPriceOwne = mysqli_query($conn->conn(), "SELECT sum(payPrice) as sum FROM pay where pay.payUserId='$userId' AND pay.payModel='6'");
                           $rowPriceOwne = mysqli_fetch_assoc($selectPriceOwne);
                           if ($rowPriceOwne['sum'] == '')
                               echo '0 تومان';
                           else
                               echo $rowPriceOwne['sum'] . " تومان ";
                           ?>
                        </span>
                    </div>
                    <button
                            onclick="$('#userOption').show();ProfileChange('report');"
                            class="btn btn-info2" style="margin-top: 10px;">
                        جزییات بیشتر
                    </button>
                </div>


                <p style="
    text-align: center;
    margin:0px;
    /* padding: 10px; */
">
                <span href="logout.php" onclick="window.location.href='logout.php'" style="

    text-align: center;
    padding: 10px;
    background: #ed3833;
    border-radius: 10px;
    color: #fff;
    width: 100%;
    margin-top: 10px;
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    cursor: pointer;
    margin-bottom: 0;
">خروج</span>
                </p>

            </li>

            <li class="col-md-9 col-sm-6 col-xs-12" style="padding :15px 70px 6px;display: none" id="getManey">
                <p style="padding: 5px;
    background: rgba(255, 0, 0, 0.5);
    color: white;display: none" id="getMoneyError">مبلغ به درستی وارد نشده است</p>
                <div class="form-group">
                    <label for="getManeyText" style="color: black">مبلغ را به تومان وارد کنید</label>
                    <input type="text" data-allowzero="true" data-precision="0" data-decimal=" " class="form-control"
                           id="getManeyText1">
                </div>
                <script>
                    $("#getManeyText1").maskMoney();
                </script>
                <div class="form-group" style="position: relative;">
                    <label for="getManeyText" style="color: black">شماره شبا را وارد کنید</label>
                    <input class="form-control"
                           onfocus="showShaba(this.value)"
                           onkeypress="showShaba(this.value)"
                           type="text" id="shaba">
                    <?php
                    $selectShaba = mysqli_query($conn->conn(), "SELECT * FROM shaba where shabaUserId = '$userId'");
                    if (mysqli_num_rows($selectShaba) > 0) {
                        ?>
                        <ul style="
    position: absolute;
    width: 100%;
    border: 1px solid #e4e4e4;
z-index: 9999999999" class="priceSelect" id="selectShaba">
                            <li>می توانید یکی از شماره های شبا ذخیره شده را انتخاب نمایید.</li>
                            <?php
                            while ($rowSelectShaba = mysqli_fetch_assoc($selectShaba)) {
                                ?>
                                <li onclick="fillShaba('<?php echo $rowSelectShaba['shabaId'] ?>')">
                                    <?php echo $rowSelectShaba['shabaNumber'] ?>
                                    - <?php echo $rowSelectShaba['shabaBank']; ?>
                                </li>

                                <?php
                            }
                            ?>
                        </ul>

                        <?php
                    }
                    ?>

                </div>
                <div class="form-group">
                    <label for="getManeyText" style="color: black">نام بانک را وارد کنید</label>
                    <input class="form-control"
                           type="text" id="BankShaba">
                </div>
                <div class="form-group">
                    <span style="float: right;color: #000000;width: auto;position: relative;top: 6px;margin-left: 5px;">ذخیره سازی شبا</span>
                    <input type="checkbox" id="shabaSave" checked>
                    <label for="go"></label>
                </div>
                <div class="form-group">
                    <input type="button" value="ثبت" style="    background: #4fb2a0;
    color: #fff;" onClick="SendRequestGetMoney()"
                           class="btn btn-group-sm btn-info">
                </div>
            </li>
            <li class="col-md-9 col-sm-6 col-xs-12" style="    height: 100%;
    padding: 70px;
    padding-bottom: 10px;
    padding-top: 51px;display: none" id="payMoney">
                <div class="form-group" style="direction: rtl;">
                    <div class="row">
                        <input type="button" onclick="fillPricePay('20,000')" value="۲۰,۰۰۰ تومان"
                               class="btn btn-info2">
                        <input type="button" onclick="fillPricePay('50,000')" value="۵۰,۰۰۰ تومان"
                               class="btn btn-info2">
                        <input type="button" onclick="fillPricePay('100,000')" value="۱۰۰,۰۰۰ تومان"
                               class="btn btn-info2">
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <input type="button" onclick="fillPricePay('300,000')" value="۳۰۰,۰۰۰ تومان"
                               class="btn btn-info2">
                        <input type="button" onclick="fillPricePay('500,000')" value="۵۰۰,۰۰۰ تومان"
                               class="btn btn-info2">
                        <input type="button" onclick="fillPricePay('1,000,000')" value="۱,۰۰۰,۰۰۰ تومان"
                               class="btn btn-info2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="getManeyText" style="color: black">می توانید مبلغ دلخواه خود را وارد کنید</label>
                    <input data-allowzero="true" data-precision="0" data-decimal=" " type="text" style="direction: rtl"
                           class="form-control" placeholder="مبلغ را به تومان وارد کنید." id="getManeyText">
                </div>
                <div class="form-group">
                    <input type="button" onclick="payMoney('walet')" style="    background: #4fb2a0;
    color: #fff;" value="پرداخت" class="btn">
                </div>
                <script>
                    $("#getManeyText2").maskMoney();
                </script>
            </li>

            <li class="col-md-3 col-sm-6 col-xs-12" style="padding:0px 10px 1px 10px;">
                <div class="sul_verticallSplitter"></div>
                <a href="#" id="OnePr" class="active"
                   onclick="profileShow('dashbord','getManey','payMoney','OnePr')">داشبورد</a>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12" style="padding:0px 10px 1px 10px;">
                <a href="#" id="TwoPr"
                   onclick="profileShow('payMoney','getManey','dashbord','TwoPr')">افزایش اعتبار</a>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12" style="padding:0px 10px 1px 10px;">
                <a href="#" id="ThreePr"
                   onclick="profileShow('getManey','payMoney','dashbord','ThreePr')"> درخواست واریز اعتبار</a>
            </li>


        </ul>
        <?php
    } else {
        $display = false;

        ?>
        <input data-allowzero="true" data-precision="0" data-decimal=" " type="text"
               style="display: none;direction: rtl" class="form-control" placeholder="مبلغ را به تومان وارد کنید."
               id="getManeyText">

        <span class="pull-right menu" style=" background: #ffffff;
    padding: 6px 17px 6px 17px;
    font-size: 17px;
    cursor: pointer;
    width: 140px;" id="loginSubmitBtn" onclick="$('#myModal').modal();">ورود / عضویت</span>
        <span class="pull-right menu" id="nameUser" onclick="showProfileMenu()"
              style="display: none"><?php echo $_SESSION['userName'] ?></span>

        <?php
    }
    ?>

    <img src="img/menuIcon.png" onclick="menuShow();" id="menuShow"
         style="<?php $display ? $a = '' : $a = 'display:none';
         echo $a; ?>"
         class="pull-right menu">
</div>
</div>
<?php

if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true){

?>

<div class="col-md-12 col-sm-12 col-xs-12" style="margin: auto;float: none;background: ;padding: 15px 25px;
    width: 100%;
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
        z-index: 300;
    top: 50%;" id="userOption">
    <ul class="dropdown-menu extended logout col-md-6" id="miniDashbord" style="display: none;position: relative;
    z-index: 500;">
        <li class="col-md-9 col-sm-6 col-xs-12" id="dashbord2" style="   padding: 0px;
    margin-top: 10px;">
            <p style="
    text-align: center;
    /* padding: 10px; */
">
                <?php
                $selectUser = mysqli_query($conn->conn(), "SELECT * FROM user where user.userId='$userId'");
                $rowSelectUser = mysqli_fetch_assoc($selectUser);
                $money = $rowSelectUser['userMoney'];

                ?>
                <span style="
    width: auto;
    text-align: center;
    padding: 10px;
    background: #3b8390;
    border-radius: 10px;
    color: #fff;
" id="spanMoney2"> موجودی کیف پول : <?php echo toMoney($money) ?> تومان </span>
            </p>
            <div class="col-md-4 col-sm-6 col-xs-12  Circle">
                <span>تعداد کاربران شما</span>
                <div class="oneCircle">
                        <span style="    direction: rtl;
    font-size: 16px;
    top: 39px;
    left: 0px;
    position: absolute;">
                            <?php
                            $selectUserCount = mysqli_query($conn->conn(), "SELECT * FROM user where UserOwner='$userId'");
                            $Count = mysqli_num_rows($selectUserCount);
                            echo $Count;
                            ?>
                        </span>
                </div>
                <button onclick="$('#userOption').show();ProfileChange('MyUser');" class="btn btn-info2"
                        style="margin-top: 10px;">
                    جزییات بیشتر
                </button>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12  Circle">
                <span>درآمد از خرید  کاربر</span>

                <div class="threeCircle">
                          <span style="    direction: rtl;
    font-size: 16px;
    top: 39px;
    left: 0px;
    position: absolute;">
<?php
$selectPriceOwne = mysqli_query($conn->conn(), "SELECT sum(payPrice) as sum FROM pay where pay.payUserId='$userId' AND pay.payModel='5'");
$rowPriceOwne = mysqli_fetch_assoc($selectPriceOwne);
if ($rowPriceOwne['sum'] == '')
    echo '0 تومان';
else
    echo $rowPriceOwne['sum'] . ' تومان ';
?>
                          </span>
                </div>
                <button onclick="$('#userOption').show();ProfileChange('MyUser');" class="btn btn-info2"
                        style="margin-top: 10px;">
                    جزییات بیشتر
                </button>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12  Circle">
                <span>درآمد خرید از پنل</span>
                <div class="twoCircle">
                       <span style="    direction: rtl;
    font-size: 16px;
    top: 39px;
    left: 0px;
    position: absolute;">
                           <?php
                           $selectPriceOwne = mysqli_query($conn->conn(), "SELECT sum(payPrice) as sum FROM pay where pay.payUserId='$userId' AND pay.payModel='6'");
                           $rowPriceOwne = mysqli_fetch_assoc($selectPriceOwne);
                           if ($rowPriceOwne['sum'] == '')
                               echo '0 تومان';
                           else
                               echo $rowPriceOwne['sum'] . ' تومان ';
                           ?>
                        </span>
                </div>
                <button onclick="$('#userOption').show();ProfileChange('report');" class="btn btn-info2"
                        style="margin-top: 10px;">
                    جزییات بیشتر
                </button>
            </div>


        </li>

        <li class="col-md-9 col-sm-6 col-xs-12" style="padding :15px 70px 6px;display: none" id="getManey2">
            <p style="padding: 5px;
    background: rgba(255, 0, 0, 0.5);
    color: white;display: none" id="getMoneyError2">مبلغ به درستی وارد نشده است</p>
            <div class="form-group">
                <label for="getManeyText" style="color: black">مبلغ را به تومان وارد کنید</label>
                <input type="text" data-allowzero="true" data-precision="0" data-decimal=" " class="form-control"
                       id="getManeyText23">
            </div>
            <script>
                $("#getManeyText23").maskMoney();
            </script>
            <div class="form-group" style="position: relative;">
                <label for="getManeyText" style="color: black">شماره شبا را وارد کنید</label>
                <input class="form-control"
                       onfocus="showShaba2(this.value)"
                       onkeypress="showShaba2(this.value)"
                       type="text" id="shaba2">
                <?php
                $selectShaba = mysqli_query($conn->conn(), "SELECT * FROM shaba where shabaUserId = '$userId'");
                if (mysqli_num_rows($selectShaba) > 0) {
                    ?>
                    <ul style="
    position: absolute;
    width: 100%;
    border: 1px solid #e4e4e4;" class="priceSelect" id="selectShaba2">
                        <li>می توانید یکی از شماره های شبا ذخیره شده را انتخاب نمایید.</li>
                        <?php
                        while ($rowSelectShaba = mysqli_fetch_assoc($selectShaba)) {
                            ?>
                            <li onclick="fillShaba2('<?php echo $rowSelectShaba['shabaId'] ?>')">
                                <?php echo $rowSelectShaba['shabaNumber'] ?>
                                - <?php echo $rowSelectShaba['shabaBank']; ?>
                            </li>

                            <?php
                        }
                        ?>
                    </ul>

                    <?php
                }
                ?>

            </div>
            <div class="form-group">
                <label for="getManeyText" style="color: black">نام بانک را وارد کنید</label>
                <input class="form-control"
                       type="text" id="BankShaba2">
            </div>
            <div class="form-group">
                <span style="float: right;color: #000000;width: auto;position: relative;top: 6px;margin-left: 5px;">ذخیره سازی شبا</span>
                <input type="checkbox" id="shabaSave2" checked>
                <label for="go"></label>
            </div>
            <div class="form-group">
                <input type="button" value="ثبت" style="    background: #4fb2a0;
    color: #fff;" onClick="SendRequestGetMoney2()"
                       class="btn btn-group-sm btn-info">
            </div>
        </li>
        <li class="col-md-9 col-sm-6 col-xs-12" style="    height: 100%;
    padding: 70px;
    padding-bottom: 10px;
    padding-top: 51px;display: none" id="payMoney2">
            <div class="form-group" style="direction: rtl;">
                <div class="row">
                    <input type="button" onclick="fillPricePay2('20,000')" value="۲۰,۰۰۰ تومان"
                           class="btn btn-info2">
                    <input type="button" onclick="fillPricePay2('50,000')" value="۵۰,۰۰۰ تومان"
                           class="btn btn-info2">
                    <input type="button" onclick="fillPricePay2('100,000')" value="۱۰۰,۰۰۰ تومان"
                           class="btn btn-info2">
                </div>
                <div class="row" style="margin-top: 10px">
                    <input type="button" onclick="fillPricePay2('300,000')" value="۳۰۰,۰۰۰ تومان"
                           class="btn btn-info2">
                    <input type="button" onclick="fillPricePay2('500,000')" value="۵۰۰,۰۰۰ تومان"
                           class="btn btn-info2">
                    <input type="button" onclick="fillPricePay2('1,000,000')" value="۱,۰۰۰,۰۰۰ تومان"
                           class="btn btn-info2">
                </div>
            </div>
            <div class="form-group">
                <label for="getManeyText" style="color: black">می توانید مبلغ دلخواه خود را وارد کنید</label>
                <input data-allowzero="true" data-precision="0" data-decimal=" " type="text" style="direction: rtl"
                       class="form-control" placeholder="مبلغ را به تومان وارد کنید." id="getManeyText3">
            </div>
            <div class="form-group">
                <input type="button" onclick="payMoney2('walet')" style="    background: #4fb2a0;
    color: #fff;" value="پرداخت" class="btn">
            </div>
            <script>
                $("#getManeyText").maskMoney();
            </script>
        </li>

        <li class="col-md-3 col-sm-6 col-xs-12" style="padding:0px 10px 1px 10px;">
            <div class="sul_verticallSplitter"></div>
            <a href="#" id="OnePr2" class="active"
               onclick="profileShow('dashbord2','getManey2','payMoney2','OnePr2')">داشبورد</a>
        </li>
        <li class="col-md-3 col-sm-6 col-xs-12" style="padding:0px 10px 1px 10px;">
            <a href="#" id="TwoPr2"
               onclick="profileShow('payMoney2','getManey2','dashbord2','TwoPr2')">افزایش اعتبار</a>
        </li>
        <li class="col-md-3 col-sm-6 col-xs-12" style="padding:0px 10px 1px 10px;">
            <a href="#" id="ThreePr2"
               onclick="profileShow('getManey2','payMoney2','dashbord2','ThreePr2')"> درخواست واریز اعتبار</a>
        </li>

    </ul>
    <div id="userProfile" class="col-md-6"
         style="background: #ffffff;padding: 30px;margin: auto;float: none;display: none;z-index: 500;position: relative;">
        <div class="alert alert-success" id="EditSuc" style="display: none;">
            ویرایش اطلاعات با موفقیت انجام شد
        </div>
        <div class="alert alert-danger" id="EditError" style="display: none;">

        </div>
        <div class="col-xs-12">
            <div class="form-group input-group has-feedback">
                <input type="text" id="editName"
                       class="form-control input-lg ng-pristine ng-valid ng-touched"
                       dir="rtl"
                       style="height: 30px;padding-right: 7px;
    padding-left: 42.5px;"
                       value="<?php echo $_SESSION['userName'] ?>"
                >
                <i class="fa fa-user fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                <div class="input-group-addon">نام و نام خانوادگی / فروشگاه</div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group input-group has-feedback">
                <input type="text" id="OldeditPassword"
                       class="form-control input-lg ng-pristine ng-valid ng-touched"
                       dir="ltr"
                       style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                >
                <i class="fa fa-user fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                <div class="input-group-addon"> رمز عبور قدیم</div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group input-group has-feedback">
                <input type="text" id="editPassword"
                       class="form-control input-lg ng-pristine ng-valid ng-touched"
                       dir="ltr"
                       style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                >
                <i class="fa fa-user fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                <div class="input-group-addon">رمز عبور جدید</div>
            </div>
        </div>

        <?php
        $selectUserProfile = mysqli_query($conn->conn(), "SELECT * FROM user where user.userId='$userId'");
        $rowUser = mysqli_fetch_assoc($selectUserProfile);
        $userOwner = $rowUser['UserOwner'];
        if ($rowUser['userLevel'] == '2') {
            ?>
            <div class="col-xs-12">
                <div class="form-group input-group has-feedback">
                    <input type="text" id="editCode"
                           class="form-control input-lg ng-pristine ng-valid ng-touched"
                           dir="rtl"
                           disabled
                           style="height: 30px;padding-right: 5px;
    padding-left: 42.5px;"
                           value="اینکام"
                    >
                    <i class="fa fa-code-branch fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                    <div class="input-group-addon">نام معرف</div>
                </div>
            </div>

            <?php
        } else {
            if ($userOwner == '') {
                ?>
                <div class="col-xs-12">
                    <div class="form-group input-group has-feedback">
                        <input type="text" id="editCode"
                               class="form-control input-lg ng-pristine ng-valid ng-touched"
                               dir="ltr"
                               style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                        >
                        <i class="fa fa-code-branch fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon">کدمعرف</div>
                    </div>
                </div>

                <?php
            } else {
                $selectOwner = mysqli_query($conn->conn(), "SELECT * FROM user where user.userId='$userOwner'");
                $rowOwner = mysqli_fetch_assoc($selectOwner);
                $userOwnerName = $rowOwner['userFullname'];
                ?>
                <div class="col-xs-12">
                    <div class="form-group input-group has-feedback">
                        <input type="text" id="editCode"
                               class="form-control input-lg ng-pristine ng-valid ng-touched"
                               dir="rtl"
                               disabled
                               style="height: 30px;padding-right: 5px;
    padding-left: 42.5px;"
                               value="<?php echo $userOwnerName ?>"
                        >
                        <i class="fa fa-code-branch fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon">نام معرف</div>
                    </div>
                </div>

                <?php
            }
        }
        ?>
        <span type="button" class="btn btn-info2" onClick="EditPrifile()">ویرایش اطلاعات</span>
    </div>
    <div id="MyUser" class="col-md-7" style="background: #ffffff;padding: 17px;margin: auto;
    float: none;display: none;overflow: auto;    height: auto;z-index: 500;position: relative;
    max-height: 500px;">

        <div class="row state-overview">
            <div class="col-lg-4 col-sm-6">
                <section class="panel">
                    <div class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>

                    <div class="value">
                        <h1 class="count"><?php echo $Count; ?></h1>
                        <p>تعداد کل کاربران</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-sm-6">
                <section class="panel">
                    <div class="symbol red">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <?php
                        $selectUserPayment = mysqli_query($conn->conn(), "SELECT SUM(pay.payPrice) as sumPrice from pay,user where pay.payUserId=user.userId
 and user.UserOwner='$userId' and pay.payModel!='1' and pay.payModel!='5' and pay.payModel!='6' and pay.payModel!='10' ");
                        $rowPayPrice = mysqli_fetch_assoc($selectUserPayment);

                        ?>
                        <h1 class=" count2"
                            style="direction: rtl;"><?php $rowPayPrice['sumPrice'] == null ? $a = "0" : $a = $rowPayPrice['sumPrice'];
                            echo $a . ' تومان '; ?></h1>
                        <p>مجموع مبلغ خرید کاربران</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-sm-6">
                <section class="panel">
                    <div class="symbol yellow">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="value">
                        <h1 style="direction: rtl;" class=" count3"><?php
                            $selectPriceOwne2 = mysqli_query($conn->conn(), "SELECT sum(payPrice) as sum FROM pay where pay.payUserId='$userId' AND pay.payModel='5'");
                            $rowPriceOwne2 = mysqli_fetch_assoc($selectPriceOwne2);
                            if ($rowPriceOwne2['sum'] == '')
                                echo '0 تومان';
                            else {
                                echo $rowPriceOwne2['sum'] . ' تومان ';
                            }
                            ?>
                        </h1>
                        <p>درآمد از خرید کاربران</p>
                    </div>
                </section>
            </div>
        </div>
        <div class="form-group" style="overflow: hidden;">
            <h5>دوستان خود را به اینکام دعوت کنید</h5>
            <div class="alert alert-success" id="profileInvUserSu" style="display: none;direction: rtl">
            </div>
            <div class="col-md-8" style="padding: 0;
    float: right;">
                <input class="form-control pRtl" id="smsInv" type="text" placeholder="شماره تماس">
            </div>
            <div class="col-md-4">
                <input type="button" onclick="SendSmsInv()" class="btn btn-info2" value="ارسال پیامک دعوت">
            </div>
        </div>

        <h5>شناسه های شما</h5>
        <table class="table table-hover" style="direction: rtl">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>تعداد کاربران</th>
                <th>شناسه پیشفرض</th>
            </tr>
            </thead>
            <tbody id="TableInvCode">
            <?php
            $selectInv = mysqli_query($conn->conn(), "SELECT * FROM inviteCode where inviteCodeUserId='$userId'");
            while ($rowInv = mysqli_fetch_assoc($selectInv)) {
                $invId = $rowInv['inviteCodeId'];
                $invCode = $rowInv['inviteCodeText'];
                $selectInvUser = mysqli_query($conn->conn(), "SELECT * FROM user where user.UserOwner='$userId' AND user.userInvCode='$invId'");
                $CountInvUser = mysqli_num_rows($selectInvUser); ?>

                <tr>
                    <td><?php echo $invCode; ?></td>
                    <td><?php echo $CountInvUser; ?></td>
                    <td>
                        <?php
                        if ($rowInv['status'] == '1') {
                            ?>

                            <i class="fa fa-star active inv" id="StarInv<?php echo $invId ?>"
                               onclick="addStar('<?php echo $invId ?>')" style="cursor: pointer"></i>

                            <?php
                        } else {
                            ?>

                            <i class="fa fa-star inv" id="StarInv<?php echo $invId ?>"
                               onclick="addStar('<?php echo $invId ?>')" style="cursor: pointer"></i>


                            <?php
                        }
                        ?>
                    </td>
                </tr>


                <?php
            }
            ?>

            </tbody>
        </table>
        <h5>اضافه کردن شناسه جدید</h5>
        <div class="col-xs-12"
             style="padding: 0;margin-top: 10px;text-align: center">
            <div class="form-group input-group has-feedback"
                 style=""
            >
                <input type="text"
                       class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                       dir="ltr"
                       autocomplete="off"
                       style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"

                       placeholder="شناسه جدید را وارد کنید"
                       id="invCodeSubmit"
                >
                <i class="fa fa-barcode form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                <div class="input-group-addon" style="direction: rtl">شناسه جدید</div>
            </div>
            <input class="btn btn-info2" onclick="submitInvCode()" value="ثبت">
        </div>
        <h5>لیست کاربران</h5>

        <table id="example" class="table table-striped table-bordered" style="width:100%;direction: rtl">
            <thead>
            <tr>
                <th>نام نام خانوادگی - شماره موبایل</th>
                <th>عضو شده با شناسه</th>
                <th>درآمد برای شما</th>
                <th>تاریخ عضویت</th>

            </tr>
            </thead>
            <tbody>

            <?php
            $selectUserInv = mysqli_query($conn->conn(), "SELECT * FROM user where user.UserOwner='$userId'");
            if (mysqli_num_rows($selectUserInv) == 0) {
                echo ' <tr>
                        <td>کاربری یافت نشد</td>
                        <td>نامشخص</td>
                        <td>0</td>
                        <td>نامشحص</td>
                    </tr>';

            } else {

                while ($rowUserInv = mysqli_fetch_assoc($selectUserInv)) {
                    $userInvId = $rowUserInv['userId'];
                    $userInvCode = $rowUserInv['userInvCode'];
                    $selectInvCode = mysqli_query($conn->conn(), "SELECT * FROM inviteCode where inviteCode.inviteCodeId='$userInvCode'");
                    $rowInvCode = mysqli_fetch_assoc($selectInvCode);
                    $invCodeer = $rowInvCode['inviteCodeText'];

                    $selectPaymentThisUser = mysqli_query($conn->conn(), "SELECT sum(payPrice) as sumPayUserForMe
                  FROM pay where pay.userPay='$userInvId' AND pay.payModel='5'");
                    $rowPaymetForMe = mysqli_fetch_assoc($selectPaymentThisUser);
                    $rowPaymetForMe['sumPayUserForMe'] == null ? $lastPay = 0 : $lastPay = $rowPaymetForMe['sumPayUserForMe'];
                    ?>

                    <tr>
                        <td><?php echo $rowUserInv['userFullname'] ?>
                            - <?php echo substr($rowUserInv['userMobile'], 7, 4) . "***" . substr($rowUserInv['userMobile'], 0, 4) ?></td>
                        <td><?php echo $invCodeer ?></td>
                        <td><?php echo $lastPay . " تومان " ?></td>
                        <td><?php echo @jalali($rowUserInv['userRegDate']) ?></td>

                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>

        </table>
    </div>

    <div id="report" class="col-md-10" style="background: #ffffff;padding: 30px;margin: auto;
    display: none;overflow: auto;    height: auto;z-index: 500;position: relative;
    max-height: 600px;">
        <div class="col-xs-12">
            <div class="col-xs-7 pull-right" >
            <div class="col-xs-12" style="direction: rtl;    margin-top: 12px;padding: 0">

                <select id="RTrakonesh" class="col-xs-3 pull-right" >
                    <option selected disabled value="">محل تراکنش</option>
                    <option value="p1" id="p1">پنل</option>
                    <option value="p2" id="p2">کاربر</option>
                </select>
                <select id="RAddRemove" class="col-xs-3 pull-right"  >
                    <option selected disabled value="">کاهش | افزایش</option>
                    <option value="p3" id="p3">کاهش</option>
                    <option value="p4" id="p4">افزایش</option>
                </select>
                <select id="RModelPardakht" class="col-xs-3 pull-right" >
                    <option selected disabled>روش پرداخت</option>
                    <option value="p5" id="p5">آنلاین</option>
                    <option value="p6" id="p6">کیف پول</option>
                </select>
                <select id="RProduct" class="col-xs-3 pull-right"  >
                    <option selected disabled value="">محصول</option>
                    <option value="p7" id="p7">شارژ مستقیم</option>
                    <option value="p8" id="p8">پین شارژ</option>
                    <option value="p9" id="p9">بسته اینترنتی</option>
                    <option value="p10" id="p10">افزایش اعتبار</option>
                </select>
            </div>
            <div class="col-xs-12" style="margin-bottom: 0;margin-top: 13px;padding: 0">
                <div class="form-group input-group has-feedback" id="">
                    <input type="text" id="Rsearch"
                           class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                           dir="ltr"
                           style="height: 30px;padding-right: 0;
    padding-left: 42.5px;
    border-bottom-left-radius: 0;"
                           autocomplete="off"
                           placeholder="شماره سرویس ،‌ پین شارژ ،‌شناسه قبض"
                    >
                    <i class="fa fa-barcode fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                    <div class="input-group-addon" style="padding: 6px 15px;border-bottom-right-radius: 0;"> جزییات
                        پرداخت
                    </div>
                </div>

            </div>
            </div>
            <div class="col-xs-3 pull-right">
                <div class="col-xs-12 pull-right" style="padding: 0;margin-top: 10px; ">
                    <div class="form-group input-group has-feedback" style="" id="">
                        <input type="text"
                               class="form-control input-lg ng-pristine ng-valid ng-touched pRtl pwt-datepicker-input-element"
                               dir="ltr" autocomplete="off" style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;" placeholder="از تاریخ" id="goDate4" >
                        <i class="fa fa-calendar form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                        <div class="input-group-addon" style="direction: rtl">از تاریخ</div>
                    </div>
                </div>
                <div class="col-xs-12 pull-right" style="padding: 0;">
                    <div class="form-group input-group has-feedback" style="" id="">
                        <input type="text"
                               class="form-control input-lg ng-pristine ng-valid ng-touched pRtl pwt-datepicker-input-element"
                               dir="ltr" autocomplete="off" style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;" placeholder="تا تاریخ" id="goDate5" >
                        <i class="fa fa-calendar form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                        <div class="input-group-addon" style="direction: rtl">تا تاریخ</div>
                    </div>
                </div>
            </div>

            <div class="col-xs-1 pull-left" style="text-align: center">
                <span class="btn btn-lg btn-info2" style="
    margin-top: 16px;
" onclick="FilterTabelReport()">جستجو</span>
            </div>


        </div>

        <div class="row state-overview">
            <div class="col-lg-4 col-sm-6">
                <section class="panel" style="border: 2px solid;">
                    <div class="symbol terques" style="    left: -7px;
    position: relative;">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count" id="myUserBuy" style="direction: rtl"> <?php
                            $selectUserPayment = mysqli_query($conn->conn(), "SELECT SUM(pay.payPrice) as sumPrice from pay,user where pay.payUserId=user.userId
                              and user.UserOwner='$userId' and pay.payModel!='1' and pay.payModel!='5' and pay.payModel!='6' and pay.payModel!='10' ");
                            $rowPayPrice = mysqli_fetch_assoc($selectUserPayment);

                            ?>

                            <?php $rowPayPrice['sumPrice'] == null ? $a = "0" : $a = $rowPayPrice['sumPrice'];
                                echo $a; ?>
                            تومان

                        </h1>
                        <p>مجموع مبلغ خرید کاربران</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-sm-6">
                <section class="panel" style="border: 2px solid;">
                    <div class="symbol red" style="    left: -7px;
    position: relative;">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count2" id="myUserMyWalet" style="direction: rtl;"><?php
                            $selectPriceOwne = mysqli_query($conn->conn(), "SELECT sum(payPrice) as sum FROM pay where pay.payUserId='$userId' AND pay.payModel='5'");
                            $rowPriceOwne = mysqli_fetch_assoc($selectPriceOwne);
                            if ($rowPriceOwne['sum'] == '')
                                echo '0 تومان';
                            else
                                echo $rowPriceOwne['sum'] . " تومان ";
                            ?></h1>
                        <p>درآمد از خرید کاربران</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-sm-6">
                <section class="panel" style="border: 2px solid;">
                    <div class="symbol yellow"  style=" left: -7px;
                         position: relative;">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="value">
                        <h1 style="direction: rtl;" class=" count3" id="myBuyeMyWalet">
                            <?php
                            $selectPriceOwne = mysqli_query($conn->conn(), "SELECT sum(payPrice) as sum FROM pay where pay.payUserId='$userId' AND pay.payModel='6'");
                            $rowPriceOwne = mysqli_fetch_assoc($selectPriceOwne);
                            if ($rowPriceOwne['sum'] == '')
                                echo '  تومان';
                            else
                                echo $rowPriceOwne['sum'] . " تومان ";
                            ?>
                        </h1>
                        <p>درآمد خرید از پنل</p>
                    </div>
                </section>
            </div>
        </div>

        <table class="table table-hover" style="direction: rtl">
            <thead>
            <th>ردیف</th>
            <th>روش پرداخت</th>
            <th>افزایش</th>
            <th>کاهش</th>
            <th>مانده کیف پول</th>
            <th>محصول</th>
            <th>جزییات محصول</th>
            <th>توضیحات</th>
            <th>وضعیت</th>
            <th>شماره پیگیری</th>
            <th>تاریخ و ساعت</th>
            </thead>
            <tbody id="ReportTBody">
            <?php
            $i = 1;
            $typeOfPayment = "موفق";
            $color = "green";
            $selectPaymentList = mysqli_query($conn->conn(), "SELECT * FROM pay where pay.payUserId='$userId' ORDER BY date(payRegDate) DESC , time(payRegTime) DESC");
            while ($rowPaymentList = mysqli_fetch_assoc($selectPaymentList)) {
                if (
                    $rowPaymentList['payModel'] == "5" ||
                    $rowPaymentList['payModel'] == "6" ||
                    $rowPaymentList['payModel'] == "1" ||
                    $rowPaymentList['payModel'] == "20"
                ) {
                    $upeer = $rowPaymentList['payPrice'] . "+" . " تومان ";

                } else {
                    $upeer = "0";
                }
                if (
                    $rowPaymentList['payModel'] == "2" ||
                    $rowPaymentList['payModel'] == "3" ||
                    $rowPaymentList['payModel'] == "4" ||
                    $rowPaymentList['payModel'] == "10"
                ) {
                    $countDown = $rowPaymentList['payPrice'] . "-" . " تومان ";
                } else {
                    $countDown = "0";
                }


                if ($rowPaymentList['payModel'] == "2") {
                    $productName = 'بسته اینترنتی';
                    $service = $rowPaymentList['payService'];
                } elseif ($rowPaymentList['payModel'] == "3") {
                    $productName = 'شارژ مستقیم';
                    $service = $rowPaymentList['payService'];
                } elseif ($rowPaymentList['payModel'] == "4") {
                    $productName = 'پین شارژ';
                    $service = $rowPaymentList['payPin'] . '<br>' . $rowPaymentList['paySerial'];

                } else {
                    $productName = '';
                }

                if ($rowPaymentList['payModel'] == '5') {
                    $detail = "درآمد از خرید کاربر";
                    $service = $rowPaymentList['payService'];

                } elseif ($rowPaymentList['payModel'] == '6') {
                    $detail = "درآمد خرید از پنل";
                    $service = $rowPaymentList['payService'];

                    if ($rowPaymentList['payText'] == "2") {
                        $productName = 'بسته اینترنتی';
                    } elseif ($rowPaymentList['payText'] == "3") {
                        $productName = 'شارژ مستقیم';
                    } elseif ($rowPaymentList['payText'] == "4") {
                        $productName = 'پین شارژ';
                    } else {
                        $productName = '';
                    }

                } elseif ($rowPaymentList['payModel'] == '1') {
                    $detail = "افزایش اعتبار";
                    $service = $rowPaymentList['payService'];

                } elseif ($rowPaymentList['payModel'] == '10') {
                    $detail = "درخواست واریز وجه";
                    $service = $rowPaymentList['payService'];

                    //Status Of GetMoney
                    $payId = $rowPaymentList['payId'];
                    $selectGetMoney = mysqli_query($conn->conn(), "SELECT * FROM getMoney where getMoney.getMoneyId='$payId'");
                    $rowPayGet = mysqli_fetch_assoc($selectGetMoney);
                    $Status = $rowPayGet['getMoneyStatus'];
                    if ($Status == "0") {
                        $typeOfPayment = "درانتظار";
                        $color = "#000";
                    }
                } else {
                    $detail = '';
                }
                if($rowPaymentList['payProduct']=='01'){
                    $textModelPay = 'کیف پول';
                }if($rowPaymentList['payProduct']=='02'){
                    $textModelPay = 'آنلاین';
                }

                $date = jalali($rowPaymentList['payRegDate']);
                $time = $rowPaymentList['payRegTime'];

                $dateAndTime = $date . ' - ' . $time;


                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $textModelPay ?></td>
                    <td style="color:green"><?php echo $upeer ?></td>
                    <td style="color:red"><?php echo $countDown ?></td>
                    <td style=""><?php echo $rowPaymentList['lastUserMoney'] . " تومان " ?></td>
                    <td style=""><?php echo $productName ?></td>
                    <td style=""><?php echo $service ?></td>
                    <td style=""><?php echo $detail ?></td>
                    <td style="color:<?php echo $color ?>"><?php echo $typeOfPayment ?></td>
                    <td style=""><?php echo $rowPaymentList['payRef'] ?></td>
                    <td style=""><?php echo $dateAndTime ?></td>
                </tr>
                <?php
                $i++;
            }
            ?>
            </tbody>
        </table>

    </div>

    <div id="contactListP" class="col-md-6" style="background: #ffffff;padding: 30px;margin: auto;
    float: none;display: none;overflow: auto;    height: auto;z-index: 500;position: relative;
    max-height: 600px;">
        <div class="alert alert-success" id="contactAddSuccess" style="direction: rtl;display: none">
            کاربر با موفقیت به دفتر تلفن اضافه شد.
        </div>
        <div class="col-xs-6">
            <div class="form-group input-group has-feedback">
                <input type="text" id="contactNameP"
                       class="form-control input-lg ng-pristine ng-valid ng-touched"
                       dir="ltr"
                       style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                >
                <i class="fa fa-user fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                <div class="input-group-addon">نام و نام خانوادگی</div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group input-group has-feedback">
                <input type="text" id="contactMobileP"
                       class="form-control input-lg ng-pristine ng-valid ng-touched"
                       dir="ltr"
                       style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                >
                <i class="fa fa-mobile fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                <div class="input-group-addon">شماره تلفن</div>
            </div>
        </div>
        <div class="col-xs-12" style="text-align: center;">
            <input type="button" value="ثبت" class="btn btn-info2" onclick="addContact()">
        </div>



        <table id="example1" class="table table-striped table-bordered" style="width:100%;direction: rtl">
            <thead>
            <tr>
                <th>شماره</th>
                <th>نام</th>
                <th>شماره تلفن همراه</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody id="contactListTabelP">

            <?php
            $selectContact = mysqli_query($conn->conn(), "SELECT * FROM contact where contact.contactUserId='$userId'");
            if (mysqli_num_rows($selectContact) == 0) {
                echo '<tr id="justOne">
                        <td>0</td>
                        <td>کاربری یافت نشد</td>
                        <td>نامشخص</td>
                        <td>نامشخص</td>
                    </tr>';

            } else {

                while ($rowUserInv = mysqli_fetch_assoc($selectContact)) {
                    $contactId = $rowUserInv['contactId'];
                    $contactName = $rowUserInv['contactName'];
                    $contactNum = $rowUserInv['contactNum'];
                    $contactMobile = $rowUserInv['contactNumber'];
                    ?>

                    <tr id="contact_<?php echo $contactId ?>">
                        <td><?php echo $contactNum ?></td>
                        <td><?php echo $contactMobile ?></td>
                        <td><?php echo $contactName ?></td>
                        <td><input type="button" value="حذف"
                                   onclick="deleteContact('<?php echo $contactId ?>')"
                                   class="btn btn-xs btn-danger"></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>

        </table>


    </div>
    <?php
    }
    ?>
</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 "
     id="homeDashbord" style="padding:0;position: relative;overflow: visible;height: 100%;display: block;">
    <div class="col-md-12 col-sm-12 col-xs-12" id="icons" style="z-index: 199">
        <div id="part1">
            <div class="col-md-2 hidden-xs hidden-sm animated bounceInRight">
            </div>
<!--            <div class="col-md-2 col-xs-6 col-sm-6 animated bounceInRight"-->
<!--                 onmouseover="add('four')" id="four"-->
<!--                 onmouseleave="remove('four')" style="padding: 10px;">-->
<!--                <img onclick="show('chargePart2Baste')" src="img/bime.png" style="width: 80%">-->
<!--                <p style="width: 100%;text-align: center;font-size: 16px;" class="hidden-sm hidden-xs">بیــمه</p>-->
<!--                <p style="width: 100%;text-align: center;font-size: 30px;" class="hidden-md hidden-lg">بیــمه</p>-->
<!--            </div>-->
<!--            <div class="col-md-2 col-xs-6 col-sm-6 animated bounceInRight1"-->
<!--                 onmouseover="add('three')" id="three"-->
<!--                 onmouseleave="remove('three')" style="padding: 10px;">-->
<!--                <img onclick="show('bilit')" src="img/bilit.png" style="width: 80%">-->
<!--                <p style="width: 100%;text-align: center;font-size: 16px;" class="hidden-sm hidden-xs">بلیط مسـافرتی</p>-->
<!--                <p style="width: 100%;text-align: center;font-size: 30px;" class="hidden-md hidden-lg">بلیط مسـافرتی</p>-->
<!---->
<!--            </div>-->
<!--            <div class="col-md-2 col-xs-6 col-sm-6 animated bounceInRight2"-->
<!--                 onmouseover="add('two')" id="two"-->
<!--                 onmouseleave="remove('two')" style="padding: 10px;">-->
<!--                <img onclick="show('ghabzStep2')" src="img/ghabz.png" style="width: 80%">-->
<!--                <p style="width: 100%;text-align: center;font-size: 16px;" class="hidden-sm hidden-xs">پرداخت قبوض</p>-->
<!--                <p style="width: 100%;text-align: center;font-size: 30px;" class="hidden-md hidden-lg">پرداخت قبوض</p>-->
<!--            </div>-->

            <div class="col-md-2 col-xs-6 col-sm-6 animated bounceInRight"
                style="padding: 10px;">
                <img  src="img/bime.png" style="width: 80%;cursor: default" class="gray">
                <p style="width: 100%;text-align: center;font-size: 16px;" class="hidden-sm hidden-xs">بیــمه</p>
                <p style="width: 100%;text-align: center;font-size: 30px;" class="hidden-md hidden-lg">بیــمه</p>
            </div>
            <div class="col-md-2 col-xs-6 col-sm-6 animated bounceInRight1"
                 style="padding: 10px;">
                <img  src="img/bilit.png" style="width: 80%;cursor: default" class="gray">
                <p style="width: 100%;text-align: center;font-size: 16px;" class="hidden-sm hidden-xs">بلیط مسـافرتی</p>
                <p style="width: 100%;text-align: center;font-size: 30px;" class="hidden-md hidden-lg">بلیط مسـافرتی</p>

            </div>
            <div class="col-md-2 col-xs-6 col-sm-6 animated bounceInRight2"
                  style="padding: 10px;">
                <img  src="img/ghabz.png" style="width: 80%;cursor: default" class="gray">
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
    <div id="chargePart2Baste" class="col-md-10 col-xs-12 col-sm-12" style="z-index: 300">
        <div class="col-md-7" style="margin: auto;
    float: none;
    border: 2px solid #fff;
    background: #71717136;
        box-shadow: -5px 5px 10px rgba(0,0,0,.25);
    padding: 12px;
    border-radius: 30px 0 30px 0;">

            <div class="alert alert-danger" id="payemtError" style="direction: rtl;display: none">
                مبلغ یا نوع بسته خود را انتخاب کنید.
            </div>
            <div class="col-xs-12" style="padding: 0;">

                <div class="form-group input-group has-feedback">
                    <input type="text" id="number1"
                           class="form-control input-lg ng-pristine ng-valid ng-touched"
                           dir="ltr"
                           style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                           onkeydown="checkThis()"
                           onkeyup="checkThis()"
                           onkeypress="checkThis()"
                           placeholder="09*********">
                    <i class="fa fa-phone fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                    <div class="input-group-addon" style="direction: rtl">شماره تلفن همراه یا TD-LTE</div>
                </div>
            </div>
            <?php
            if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                $selectContact = mysqli_query($conn->conn(), "SELECT * FROM contact where contact.contactUserId='$userId'");
                ?>
                <div class="col-xs-12" style="padding: 0;">

                    <div class="form-group input-group has-feedback" id="ContactList">
                        <input type="text" id="inputContact"
                               class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                               dir="ltr"
                               style="height: 30px;padding-right: 0;
    padding-left: 42.5px;
    border-bottom-left-radius: 0;"
                               autocomplete="off"
                               onclick="$('.tableSearch').show()"
                               onkeypress="SerachContact()"
                               onkeydown="SerachContact()"
                               onkeyup="SerachContact()"
                               placeholder="دفترچه تلفن">
                        <i class="fa fa-address-book fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon" style="padding: 6px 15px;border-bottom-right-radius: 0;"> نام و
                            نام خانودگی یا کد کاربر
                        </div>
                    </div>
                    <table style="position: absolute;top: 30px;" class="tableSearch col-md-12">
                        <thead>
                        <tr>
                            <th>کد کاربر</th>
                            <th>نام و نام خانوادگی</th>
                            <th>شماره تلفن همراه</th>
                        </tr>
                        </thead>
                        <tbody id="listContact">
                        <?php
                        if (mysqli_num_rows($selectContact) == 0) {
                            ?>
                            <tr>
                                <td>0</td>
                                <td>کاربری موجود نیست</td>
                                <td>***********</td>
                            </tr>
                            <?php
                        } else {
                            while ($rowContact = mysqli_fetch_assoc($selectContact)) {
                                ?>
                                <tr onclick="SelectNumberContact('<?php echo $rowContact['contactName'] ?>')">
                                    <td><?php echo $rowContact['contactNum'] ?></td>
                                    <td><?php echo $rowContact['contactNumber'] ?></td>
                                    <td><?php echo $rowContact['contactName'] ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php
            }
            ?>
            <br>
            <div class="row" id="operatorList">
                <div class="col-md-2 col-xs-2 col-sm-2
                    col-lg-offset-2 col-md-offset-2
                    col-xs-offset-2 col-sm-offset-2"
                     style="padding: 0px;text-align: center" id="hamrah">
                    <img src="img/hamrah_logo.png" class="gray" style="width: 70%">
                </div>
                <div class="col-md-2 col-xs-2 col-sm-2 "
                     style="margin-left: 40px;margin-right: 40px;padding: 0px;text-align: center"
                     id="irancell">
                    <img src="img/irancell_logo.png" class="gray" style="width: 70%">
                </div>
                <div class="col-md-2 col-xs-2 col-sm-2 "
                     style="padding: 0px;text-align: center"
                     id="rightell">
                    <img src="img/rightell_logo.png" class="gray" style="width: 70%">
                </div>
            </div>
            <div class="row" style="direction: rtl;margin-top: 10px;display: none" id="checkThisIdDiv">
                <div class="col-md-5 col-xs-12 col-sm-6" style="padding: 0;float: right;padding-right: 21px;">
                    <span style="float: right;color: #ffff;position: relative;top: 6px;margin-left: 5px;">سیم کارت ترابرد شده</span>
                    <input type="checkbox" id="go">
                    <label for="go" onclick="checkBoxOne()"></label>
                </div>
                <div class="col-md-7 col-xs-12 col-sm-6" style="padding: 0;display: none" id="trabord">
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
            <div class="col-md-12" style="margin-top: 10px;display: none;padding: 0;" id="model">
                <div class="col-md-4 col-xs-4 col-sm-4 "
                     style="text-align: center;"
                     id="">
                    <div class="bgHamrahMode" onclick="ActiveThis('btnModel3')" id="btnModel3">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        بسته اینترنتی
                        <img src="img/radio.png" style="    width: 22px;
    margin-left: 10px;
    position: absolute;
    top: 3px;
    right: 10px;"
                             id="imgbtnModel3">
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 "
                     style="text-align: center;"
                     id="">
                    <div class="bgIrancellMode" onclick="ActiveThis('btnModel2')" id="btnModel2">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        کد شارژ
                        <img src="img/radio.png" style="    width: 22px;
    margin-left: 10px;
    position: absolute;
    top: 3px;
    right: 10px;"
                             id="imgbtnModel2">
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4  "
                     style="text-align: center;"
                     id="">
                    <div class="bgRightellModel" onclick="ActiveThis('btnModel1')" id="btnModel1">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        شارژ مستقیم
                        <img src="img/radio.png" style="    width: 22px;
    margin-left: 10px;
    position: absolute;
    top: 3px;
    right: 10px;"
                             id="imgbtnModel1">
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 12px;display: none;padding: 0" id="model2">
                <p style="color:#fff">نوع شارژ : </p>
                <div class="col-md-4 col-xs-4 col-sm-4 pull-right"
                     style="text-align: center;"
                     id="chargeModelLog">
                    <div class="bgRightellModel" onclick="ActiveThis('btnModel4')" id="btnModel4">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        شارژ معمولی
                        <img src="img/radio.png" style="    width: 22px;
    margin-left: 10px;
    position: absolute;
    top: 3px;
    right: 10px;"
                             id="imgbtnModel4">
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4  pull-right"
                     style="text-align: center;"
                     id="">
                    <div class="bgIrancellMode" onclick="ActiveThis('btnModel5')" id="btnModel5">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        شارژ شگفت انگیز
                        <img src="img/radio.png" style="    width: 22px;
    margin-left: 10px;
    position: absolute;
    top: 3px;
    right: 10px;"
                             id="imgbtnModel5">
                    </div>
                </div>
                <!--                <div class="col-md-4 col-xs-4 col-sm-4  "-->
                <!--                     style="text-align: center;"-->
                <!--                     id="">-->
                <!--                    <div class="bgHamrahMode" onclick="ActiveThis('btnModel6')" id="btnModel6">-->
                <!--                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">-->
                <!---->
                <!--                        سیمکارت دائمی-->
                <!--                        <img src="img/radio.png" style="    width: 22px;-->
                <!--    margin-left: 10px;-->
                <!--    position: absolute;-->
                <!--    top: 8px;-->
                <!--    right: 10px;"-->
                <!--                             id="imgbtnModel6">-->
                <!--                    </div>-->
                <!--                </div>-->
            </div>
            <div>

                <div class="col-xs-12"
                     onclick="showPriceSelect(document.getElementById('lastPrice').value)"
                     style="padding: 0;margin-top: 10px;display: none" id="price">

                    <div class="form-group input-group has-feedback"
                         style=""
                         id="price">
                        <input type="text"
                               class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                               dir="ltr"
                               autocomplete="off"
                               style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"
                               onfocus="showPriceSelect(this.value)"
                               onkeydown="CheckPrice(this.value)"
                               onkeyup="CheckPrice(this.value)"
                               placeholder="مبلغ را به تومان وارد کنید"
                               id="lastPrice"
                        >
                        <i class=" form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;">تومان</i>
                        <div class="input-group-addon" style="direction: rtl">مبلغ شارژ را وارد کنید</div>
                    </div>

                    <ul style="    top: 30px;
    display: none;
    z-index: 99999999999999999;    width: 100%;" class="priceSelect" id="priceSelect">
                        <li id="li1" onclick="fillPrice('li1')" value="1000">1000 تومان</li>
                        <li id="li2" onclick="fillPrice('li2')" value="2000">2000 تومان</li>
                        <li id="li3" onclick="fillPrice('li3')" value="5000">5000 تومان</li>
                        <li id="li4" onclick="fillPrice('li4')" value="10000">10,000 تومان</li>
                        <li id="li5" onclick="fillPrice('li5')" value="20000">20,000 تومان</li>
                    </ul>
                </div>


                <div class="col-xs-12" style="margin-top: 10px;display: none;padding: 0" id="Baste">
                    <div style="padding: 0" class="col-xs-12" id="modelSim">
                        <p style="padding: 0px;color:#fff;">
                            نوع سیم کارت :
                        </p>
                        <div class="col-xs-12">
                            <div class="col-md-4 col-xs-4 col-sm-4  "
                                 style="text-align: center;float: right"
                                 id="Sli3">
                                <div class="bgHamrahMode" onclick="ActiveThis('btnModel25')" id="btnModel25">
                                    <img src="img/radio.png" style="width: 20px;position: absolute;right: 15px;"
                                         class="logoSmall">

                                    اعتباری
                                    <img src="img/radio.png" style="width: 20px;position: absolute;right: 15px;"
                                         id="imgbtnModel25">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-4 col-sm-4  "
                                 style="text-align: center;float: right"
                                 id="Sli2">
                                <div class="bgIrancellMode" onclick="ActiveThis('btnModel24')" id="btnModel24">
                                    <img src="img/radio.png" style="width: 20px;position: absolute;right: 15px;"
                                         class="logoSmall">

                                    دائمی
                                    <img src="img/radio.png" style="width: 20px;position: absolute;right: 15px;"
                                         id="imgbtnModel24">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-4 col-sm-4"
                                 style="text-align: center;float: right"
                                 id="Sli4">
                                <div class="bgRightellModel" onclick="ActiveThis('btnModel23')" id="btnModel23">
                                    <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;"
                                         class="logoSmall">

                                    دیتا
                                    <img src="img/radio.png" style="width: 20px;position: absolute;right: 15px;"
                                         id="imgbtnModel23">
                                </div>
                            </div>


                            <div class="col-md-4 col-xs-4 col-sm-4  "
                                 style="text-align: center;float: right"
                                 id="Sli1">
                                <div class="bgHamrahMode" onclick="ActiveThis('btnModel26')" id="btnModel26">
                                    <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;"
                                         class="logoSmall">
                                    TD-LTE
                                    <img src="img/radio.png" style="width: 20px;position: absolute;right: 15px;"
                                         id="imgbtnModel26">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 pull-right" style="padding: 0 0 0 5px">

                        <p id="basteLongTitle" style="padding: 0px;display: none;
    color: #fff;
    margin-top: 10px;
    margin-bottom: 5px;">
                            مدت زمان بسته :
                        </p>
                        <span class="form-control"
                              onclick="showBaste()"
                              id="basteLong" style="display: none;margin-top: 0px">
                    </span>
                        <ul style="   top: 38px;
    display: none;
    z-index: 99999999999999999;    width: 100%;" class="priceSelect" id="basteSelect">
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
                    <div class="col-xs-6 pull-right" style="padding: 0 0 0 5px">
                        <p id="basteLastTitle" style="padding: 0px;display: none;
    color: #fff;
    margin-top: 10px;
    margin-bottom: 5px;">
                            حجم بسته :
                        </p>
                        <span class="form-control" style="display: none;font-size: 10px"
                              onclick="showLastBaste()"
                              id="basteLast">
                            حجم مورد نظر را وارد کنید
                        </span>
                        <ul style="   top: 38px;
    display: none;
    z-index: 99999999999999999;    width: 100%;" class="priceSelect" id="basteLastSelect">
                            <li>می توانید یکی از بازه های زیر را انتخاب کنید</li>
                        </ul>
                    </div>
                </div>
                <div style="text-align: center;margin-top: 20px;display: none" id="AccBtnCharge">
                    <span class="
                    btn
                    btn-info3
                    btn-lg
                    " style="position: relative;
    float: none;
    margin: auto;
    top: 5px;"
                          onclick="showFactor()">نمایش پیش فاکتور</span>
                </div>


            </div>
        </div>
    </div>

    <div id="bilit" class="col-md-10 col-xs-12 col-sm-12" style="min-height: 310px;top: 9px;display: none;z-index: 300">
        <div class="col-md-12" id="airPlane">
            <div class="col-md-2 col-xs-3 col-sm-2  col-md-offset-3"
                 style="padding: 0;text-align: center;cursor: pointer">
                <img src="img/bus.png" id="B3"
                     onclick="gabzStep(this.getAttribute('id'))"
                     class="" style="width: 50%;">
                <p style="color: #fff;text-align: center;margin-top: 7px">بلیط اتوبوس</p>

            </div>
            <div class="col-md-2 col-xs-3 col-sm-2 " style="padding: 0;text-align: center;cursor: pointer">
                <img src="img/train.png" id="B2"
                     onclick="gabzStep(this.getAttribute('id'))"
                     class="gray" style="width: 50%;">
                <p style="color: #fff;text-align: center;margin-top: 7px">بلیط قطار</p>

            </div>
            <div class="col-md-2 col-xs-3 col-sm-2 " style="padding: 0;text-align: center;cursor: pointer">
                <img src="img/ariplane.png" id="B1"
                     onclick="gabzStep(this.getAttribute('id'))"
                     class="gray" style="width: 50%;">
                <p style="color: #fff;text-align: center;margin-top: 7px">بلیط هواپیما</p>

            </div>
            <div class="col-md-12" style="margin: auto;
    border: 2px solid #fff;
    position: relative;
    background: #71717136;
            box-shadow: -5px 5px 10px rgba(0,0,0,.25);
top:0px;
    padding: 12px;
    border-radius: 30px 0 30px 0;">


                <div id="airplan" style="">
                    <div class="col-md-5 col-xs-12 col-sm-6" style="padding: 0;float: right;padding-right: 21px;">
                        <span style="float: right;color: #ffff;position: relative;top: 6px;margin-left: 5px;">فقط رفت</span>
                        <input type="radio" id="raft" name="safar" checked>
                        <label for="raft" onclick="changeTeravell('one')"></label>
                        <span style="float: right;color: #ffff;position: relative;top: 6px;margin-left: 5px;margin-right: 20px">رفت و برگشت</span>
                        <input type="radio" id="raftobargash" name="safar">
                        <label for="raftobargash" onclick="changeTeravell('two')"></label>
                    </div>
                    <div class="col-xs-12" style="text-align: center;">

                        <div class="col-xs-5 pull-left"
                             style="padding: 0;margin-top: 10px;">
                            <div class="form-group input-group has-feedback"
                                 style=""
                                 id="">
                                <input type="text"
                                       class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                                       dir="ltr"
                                       autocomplete="off"
                                       style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"
                                       placeholder="نام شهر یا فرودگاه"
                                >
                                <i class="fa fa-plane-arrival form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                                <div class="input-group-addon" style="direction: rtl">مقصد</div>
                            </div>
                        </div>


                        <div class="col-xs-2">
                            <div class="col-xs-6" style="margin: auto;float: none;">
                                <i class="fa fa-long-arrow-alt-left col-xs-12 plane active" style="    font-size: 40px;
    position: relative;
    top: 0px;"></i>
                                <i class="fa fa-long-arrow-alt-right col-xs-12 plane" id="t2" style="font-size: 40px;
    position: relative;
    bottom: 21px;"></i>
                            </div>
                        </div>

                        <div class="col-xs-5 pull-right"
                             style="padding: 0;margin-top: 10px;">
                            <div class="form-group input-group has-feedback"
                                 style=""
                                 id="">
                                <input type="text"
                                       class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                                       dir="ltr"
                                       autocomplete="off"
                                       style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"

                                       placeholder="نام شهر یا فرودگاه"
                                >
                                <i class="fa fa-plane-departure form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                                <div class="input-group-addon" style="direction: rtl">مبدا</div>
                            </div>


                        </div>
                    </div>
                    <div class="col-xs-12" style="text-align: center">
                        <div class="col-xs-3 pull-right"
                             style="padding: 0;margin-top: 10px;">
                            <div class="form-group input-group has-feedback"
                                 style=""
                                 id="">
                                <input type="text"
                                       class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                                       dir="ltr"
                                       autocomplete="off"
                                       style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"
                                       placeholder="تاریخ"
                                       id="goDate"
                                >
                                <i class="fa fa-calendar form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                                <div class="input-group-addon" style="direction: rtl">تاریخ رفت</div>
                            </div>
                        </div>
                        <div class="col-xs-3 pull-right"
                             style="padding: 0;margin-top: 10px; margin-left: 10px;margin-right: 10px">
                            <div class="form-group input-group has-feedback"
                                 style=""
                                 id="">
                                <input type="text"
                                       class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                                       dir="ltr"
                                       autocomplete="off"
                                       style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"
                                       placeholder="تاریخ"
                                       id="goDate2"
                                       disabled
                                >
                                <i class="fa fa-calendar form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                                <div class="input-group-addon" style="direction: rtl">تاریخ برگشت</div>
                            </div>
                        </div>
                        <div class="col-xs-1 pull-right" style="padding: 0;margin: 5px;margin-top: 0">
                            <div class="selectCol">
                                <select name="quantity" id="flight_passenger_count_adult"
                                        class="value-input form-control color-black"
                                        onchange="$.check_Passenger_Bussiness();">
                                    <option value="1">1 بزرگسال</option>
                                    <option value="2">2 بزرگسال</option>
                                    <option value="3">3 بزرگسال</option>
                                    <option value="4">4 بزرگسال</option>
                                    <option value="5">5 بزرگسال</option>
                                    <option value="6">6 بزرگسال</option>
                                    <option value="7">7 بزرگسال</option>
                                    <option value="8">8 بزرگسال</option>
                                    <option value="9">9 بزرگسال</option>
                                </select>
                                <i class="ico fa fa-arrow-down"></i>
                            </div>
                        </div>
                        <div class="col-xs-1 pull-right" style="padding: 0;margin: 5px;margin-top: 0">
                            <div class="selectCol">
                                <select name="quantity" id="flight_passenger_count_child"
                                        class="value-input form-control color-black"
                                        onchange="$.check_Passenger_Bussiness();">
                                    <option value="0">0 کودک</option>
                                    <option value="1">1 کودک</option>
                                    <option value="2">2 کودک</option>
                                    <option value="3">3 کودک</option>
                                    <option value="4">4 کودک</option>
                                    <option value="5">5 کودک</option>
                                    <option value="6">6 کودک</option>
                                    <option value="7">7 کودک</option>
                                    <option value="8">8 کودک</option>
                                </select>
                                <i class="ico fa fa-arrow-down"></i>
                            </div>
                        </div>
                        <div class="col-xs-1 pull-right" style="padding: 0;margin: 5px;margin-top: 0">
                            <div class="selectCol">
                                <select name="quantity" id="flight_passenger_count_infant"
                                        class="value-input form-control color-black"
                                        onchange="$.check_Passenger_Bussiness();">
                                    <option value="0">0 نوزاد</option>
                                    <option value="1">1 نوزاد</option>
                                    <option value="2">2 نوزاد</option>
                                    <option value="3">3 نوزاد</option>
                                    <option value="4">4 نوزاد</option>
                                    <option value="5">5 نوزاد</option>
                                    <option value="6">6 نوزاد</option>
                                    <option value="7">7 نوزاد</option>
                                    <option value="8">8 نوزاد</option>
                                    <option value="9">9 نوزاد</option>
                                </select>
                                <i class="ico fa fa-arrow-down"></i>
                            </div>
                        </div>
                        <div class="col-xs-2 pull-right" style="padding: 0;margin: 5px;margin-top: 0">

                            <div class="selectCol">
                                <select class="form-control" id="Flying_Class">
                                    <option selected="selected" value="3">اکونومی</option>
                                    <option value="1">BUSINESS</option>
                                    <option value="2">PROMO</option>
                                </select>
                                <i class="ico fa fa-arrow-down"></i>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12" style="text-align: center">
                <span class="
                    btn
                    btn-info3
                    btn-lg
                    " style="position: relative;
    float: none;
    margin: auto;
    top: 0px;">جستجوی پرواز</span>
                    </div>
                </div>
                <div id="bus" style="display: none">

                    <div class="col-xs-12" style="text-align: center;">

                        <div class="col-xs-5 pull-left"
                             style="padding: 0;margin-top: 10px;">
                            <div class="form-group input-group has-feedback"
                                 style=""
                                 id="">
                                <input type="text"
                                       class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                                       dir="ltr"
                                       autocomplete="off"
                                       style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"
                                       placeholder="نام استان مقصد"
                                >
                                <i class="fa fa-bus form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                                <div class="input-group-addon" style="direction: rtl">استان مقصد</div>
                            </div>
                        </div>


                        <div class="col-xs-2">
                            <div class="col-xs-6" style="margin: auto;float: none;">
                                <i class="fa fa-long-arrow-alt-left col-xs-12 plane active" style="    font-size: 40px;
    position: relative;
    top: 70px;"></i>
                                <i class="fa fa-long-arrow-alt-right col-xs-12 plane active" id="t2" style="font-size: 40px;
    position: relative;
    bottom: -8px;"></i>
                            </div>
                        </div>

                        <div class="col-xs-5 pull-right"
                             style="padding: 0;margin-top: 10px;">
                            <div class="form-group input-group has-feedback"
                                 style=""
                                 id="">
                                <input type="text"
                                       class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                                       dir="ltr"
                                       autocomplete="off"
                                       style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"

                                       placeholder="نام استان مبدا"
                                >
                                <i class="fa fa-bus form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                                <div class="input-group-addon" style="direction: rtl">استان مبدا</div>
                            </div>


                        </div>
                        <div class="col-xs-5 pull-right"
                             style="padding: 0;margin-top: 10px;">
                            <div class="form-group input-group has-feedback"
                                 style=""
                                 id="">
                                <input type="text"
                                       class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                                       dir="ltr"
                                       autocomplete="off"
                                       style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"

                                       placeholder="نام شهر مبدا"
                                >
                                <i class="fa fa-bus form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                                <div class="input-group-addon" style="direction: rtl">شهر مبدا</div>
                            </div>
                        </div>

                        <div class="col-xs-5 pull-left"
                             style="padding: 0;margin-top: -14px;">
                            <div class="form-group input-group has-feedback"
                                 style=""
                                 id="">
                                <input type="text"
                                       class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                                       dir="ltr"
                                       autocomplete="off"
                                       style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"

                                       placeholder="نام شهر مقصد"
                                >
                                <i class="fa fa-bus form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                                <div class="input-group-addon" style="direction: rtl">شهر مقصد</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12" style="text-align: center">
                        <div class="col-xs-5 pull-right"
                             style="padding: 0;margin-top: 10px;">
                            <div class="form-group input-group has-feedback"
                                 style=""
                                 id="">
                                <input type="text"
                                       class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                                       dir="ltr"
                                       autocomplete="off"
                                       style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"
                                       placeholder="تاریخ"
                                       id="goDate3"
                                >
                                <i class="fa fa-calendar form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                                <div class="input-group-addon" style="direction: rtl">تاریخ رفت</div>
                            </div>
                        </div>


                        <div class="col-xs-12" style="text-align: center">
                <span class="
                    btn
                    btn-info3
                    btn-lg
                    " style="position: relative;
    float: none;
    margin: auto;
    top: 0px;">جستجوی بلیط</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="ghabzStep2" class="col-md-10 col-xs-12 col-sm-12" style="min-height: 310px;top: 25px;    z-index: 300;">
        <div class="col-md-12">
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0;text-align: center;cursor: pointer">
                <img src="img/gas.png" id="G1" onclick="gabzStep(this.getAttribute('id'))"
                     class="" style="width: 55%;">
                <p style="color: #fff;text-align: center;margin-top: 7px">قبض گاز</p>
            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0;text-align: center;cursor: pointer">
                <img src="img/ranandegi.png" id="G2" onclick="gabzStep(this.getAttribute('id'))"
                     class="gray" style="width: 50%;">
                <p style="color: #fff;text-align: center;margin-top: 7px">جریمه رانندگی</p>
            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0;text-align: center;cursor: pointer">
                <img src="img/hamrahGhabz.png" id="G3" onclick="gabzStep(this.getAttribute('id'))"
                     class="gray" style="width: 50%;">
                <p style="color: #fff;text-align: center;margin-top: 7px"> قبض دائمی همراه اول</p>
            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0;text-align: center;cursor: pointer">
                <img src="img/irancellGhabz.png" id="G4" onclick="gabzStep(this.getAttribute('id'))"
                     class="gray" style="width: 50%;">
                <p style="color: #fff;text-align: center;margin-top: 7px"> قبض دائمی ایرانسل</p>
            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0;text-align: center;cursor: pointer">
                <img src="img/gabztellphone.png" id="G5" onclick="gabzStep(this.getAttribute('id'))"
                     class="gray" style="width: 50%;">
                <p style="color: #fff;text-align: center;margin-top: 7px">قبض تلفن ثابت</p>

            </div>
            <div class="col-md-2 col-xs-3 col-sm-2" style="padding: 0;text-align: center;cursor: pointer">
                <img src="img/ghabz.png" id="G6" onclick="gabzStep(this.getAttribute('id'))"
                     class="gray"
                     style="width: 50%;">
                <p style="color: #fff;text-align: center;margin-top: 7px">قبوض شهری</p>
            </div>

            <div class="col-md-12" style="margin: auto;
    border: 2px solid #fff;
    position: relative;
    background: #71717136;
            box-shadow: -5px 5px 10px rgba(0,0,0,.25);
            top:-5px;

    padding: 12px;

    border-radius: 30px 0 30px 0;">
                <div class="page-help-wrapper" style="color: #fff;">
                    <p>
                        <b>مراحل کار :</b>
                    </p>
                    <ol class="page-step-list" style="direction: rtl;margin-bottom: 0">
                        <li>وارد کردن شناسه قبض و شناسه پرداخت</li>
                        <li>مشاهده وضعیت قبض</li>
                        <li>شروع پرداخت و مشاهده پیش فاکتور</li>
                        <li>تکمیل پرداخت</li>
                    </ol>
                </div>
                <div class="col-xs-6 pull-right"
                     style="padding: 4px;margin-top: -2px" id="">

                    <div class="form-group input-group has-feedback"
                         style=""
                         id="">
                        <input type="text"
                               class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                               dir="ltr"
                               autocomplete="off"
                               style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"

                               placeholder="شناسه پرداخت"
                               id=""
                        >
                        <i class="fa fa-barcode form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                        <div class="input-group-addon" style="direction: rtl">شناسه پرداخت</div>
                    </div>
                </div>
                <div class="col-xs-6 pull-right"
                     style="padding: 4px;margin-top: -2px;" id="">

                    <div class="form-group input-group has-feedback"
                         style=""
                         id="price">
                        <input type="text"
                               class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                               dir="ltr"
                               autocomplete="off"
                               style="height: 30px;padding-right: 0;
                               padding-left: 42.5px;"
                               placeholder="شناسه قبض"
                               id=""
                        >
                        <i class="fa fa-barcode form-control-feedback" style="float: left;
    position: absolute;
        font-style: unset;
    left: 2px;"></i>
                        <div class="input-group-addon" style="direction: rtl">شناسه قبض</div>
                    </div>
                </div>
                <div style="text-align: center;margin-top: 20px;" id="">
                    <span class="
                    btn
                    btn-info3
                    btn-lg
                    " style="position: relative;
    float: none;
    margin: auto;
    top: 5px;"
                          onclick="">نمایش استعلام و پیش فاکتور</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer" id="footer" style="position: fixed;z-index:299">
    <div class="pull-left hidden-xs hidden-sm"
         style="position: absolute;bottom: 20px;left: 20px;width: 10%">
        <img src="https://trustseal.enamad.ir/logo.aspx?id=94496&amp;p=Eb1cp9upTf96fW4g" alt=""
             onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=94496&amp;p=Eb1cp9upTf96fW4g&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)"
             style="cursor:pointer;float: right;width: 50%" id="Eb1cp9upTf96fW4g"> <img class="img-responsive"
                                                                                        style="cursor: pointer;width: 50%;float: right"
                                                                                        onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=1008235&p=rfthobpdobpdmcsiuiwkxlaodshw", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                                                                                        alt='logo-samandehi'
                                                                                        src='https://logo.samandehi.ir/logo.aspx?id=1008235&p=nbpdlymalymaaqgwodrfqftiujyn'/>
    </div>
    <div class="col-md-4" id="footerIcon" style="position: absolute;
       bottom: 60px;
    left: 33.5%;
    margin: auto;
    display: none;
    float: none;">
        <div class="col-md-3">
            <div class="tooltip1" style="cursor: default">
<!--                <img class="" onclick="show('chargePart2Baste')" src="img/bime.png" style="">-->
                <img class="gray" onclick="show('chargePart2Baste')" src="img/bime.png" style="">
                <span class="tooltiptext">بیمه</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tooltip1" style="cursor: default">
<!--                <img class="" onclick="show('bilit')" src="img/bilit.png" style="">-->
                <img class="gray" onclick="show('bilit')" src="img/bilit.png" style="">
                <span class="tooltiptext">بلیط مسافرتی</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tooltip1" style="cursor: default">
<!--                <img class="" onclick="show('ghabzStep2')" src="img/ghabz.png" style="">-->
                <img class="gray" onclick="show('ghabzStep2')" src="img/ghabz.png" style="">
                <span class="tooltiptext">پرداخت قبوض</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tooltip1" ƒ>
                <img class="" onclick="show('chargePart2Baste')" src="img/charge&Baste.png" style="">
                <span class="tooltiptext">شارژ و بسته اینترنتی</span>
            </div>
        </div>

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


<script>
    $(document).ready(function () {
        $("#goDate").pDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
        });

        $("#goDate2").pDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
        });
        $("#goDate3").pDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
        });
        $("#goDate4").pDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
        });
        $("#goDate5").pDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
        });
    });
</script>
<!--login submit recover-->
<script>

    $(document).on('keydown input click', function (e) {
        var key = e.which;
        if (key === 13) {
            if ($('#myModal').is(':visible')) {
                var a = $('#code').val();
                if (a === "") {
                    firstLogin();
                } else {
                    submitCode();
                }
            }
            if ($('#myModal3').is(':visible')) {
                login('');
            }
            if ($('#myModal1').is(':visible')) {
                submit();
            }
            if ($('#myModal12').is(':visible')) {
                recoverPassword();
            }
        }

    });

</script>
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
            <div class="modal-body" style="padding:40px 37px;">
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
                                    <span type="submit" class="btn btn-warning btn-lg" onclick="payMoney('baste')"
                                          style="float: right;background: #ed3833;
    color: #ffffff;"><img
                                                class="" src="img/melatBank.png" style="    width: 24px;
    margin-left: 15px;
    position: relative;
    top: -1px;">پرداخت آنلاین
                                    </span>
                        <?php
                        if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']) {
                            ?>
                            <span class="btn btn-info btn-lg"
                                    onclick="payMoneyEtebar('baste')" style="float: left;"><span
                                        style="    margin-left: 15px;
    position: relative;
    top: 1px;"
                                        class="fas fa-wallet"></span>پرداخت از کیف پول
                            </span>
                            <?php
                        }
                        ?>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-user" style="    position: relative;
    top: 5px;"></span> ورود / عضویت</h4>
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
                <div class="col-xs-12">

                    <div class="form-group input-group has-feedback">
                        <input type="text" id="mobile"
                               class="form-control input-lg ng-pristine ng-valid ng-touched"
                               dir="ltr"
                               style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                        >
                        <i class="fa fa-phone fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon">شماره تماس</div>

                    </div>
                </div>
                <div class="form-group" id="loginSubmitStep2" style="display: none">
                    <br>
                    <p>لطفا کد دریافتی در تلفن همراه خود را وارد کنید</p>

                    <div class="col-xs-12">

                        <div class="form-group input-group has-feedback">
                            <input type="text" id="code"
                                   class="form-control input-lg ng-pristine ng-valid ng-touched"
                                   dir="ltr"
                                   style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                            >
                            <i class="fa fa-code fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                            <div class="input-group-addon">کد دریافتی</div>

                        </div>
                    </div>
                    <br>
                    <span onclick="firstLogin()" id="btnSms1" class="btn btn-info pull-left ">ارسال مجدد کد
                        </span>
                    <span onclick="submitCode()" id="btnSms2" class="btn btn-success pull-right "> تایید کد
                        </span>
                </div>
                <div class="col-xs-12">
                    <span onclick="firstLogin()" id="btnSms" class="btn btn-success btn-block ">بعدی
                    </span>
                </div>
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
                    <div class="form-group input-group has-feedback">
                        <input type="text" id="name"
                               class="form-control input-lg ng-pristine ng-valid ng-touched"
                               dir="ltr"
                               style="height: 30px;padding-right: 5px;
    padding-left: 42.5px;;text-align: right;direction: rtl;font-size:16px"
                        >
                        <i class="fa fa-user-alt fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon" style="font-size: 13px">نام و نام خانوادگی / فروشگاه</div>

                    </div>
                    <div class="form-group input-group has-feedback">
                        <input type="text" id="pwd"
                               class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                               dir="ltr"
                               style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                               placeholder="یک رمز عبور برای خود مشخص کنید"
                        >
                        <i class="fa fa-lock-open fa-fw form-control-feedback" style="float: left;
    posit`ion: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon">رمز عبور</div>

                    </div>
                    <div class="form-group input-group has-feedback">
                        <input type="text" id="codeAgent"
                               class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                               dir="ltr"
                               style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                               placeholder="اختیاری"
                        >
                        <i class="fa fa-code fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon">کد معرف</div>

                    </div>
                    <span type="button" onclick="submit()" id="submitButton" class="btn btn-success btn-block"> ثبت نام
                    </span>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left"
                        onclick="$('#myModal1').modal('toggle');$('#myModal').modal();"><span
                            class="glyphicon glyphicon-arrow-left"></span> صفحه قبل
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
                <div class="col-xs-12">

                    <div class="form-group input-group has-feedback">
                        <input type="text" id="password"
                               class="form-control input-lg ng-pristine ng-valid ng-touched"
                               dir="ltr"
                               style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                        >
                        <i class="fa fa-lock fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon">رمز عبور</div>

                    </div>
                </div>

                <button type="button" onclick="login('')" class="btn btn-success btn-block">ورود
                </button>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left"
                        onclick="$('#myModal3').modal('toggle');$('#myModa').modal();"><span
                            class="fa fa-arrow-left"></span> صفحه قبلی
                </button>
                <button type="submit" class="btn btn-info  pull-right"
                        id="SendSmsReCover"
                        onclick="firstRecover()">
                    بازیابی کلمه عبور
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal12" onkeypress="" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" onclick="$('#myModal12').modal('toggle')">&times;</button>
                <h4><span class="glyphicon glyphicon-paste"></span> بازیابی کلمه عبور </h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <div class="alert alert-danger" id="ForegetError"
                     style="direction: rtl;text-align: right;display: none;">
                    <p id="">کد وارد شده اشتباه است.</p>
                </div>
                <form role="form">
                    <div class="col-xs-12" id="codeRecover">
                        <div class="form-group input-group has-feedback">
                            <input type="text" id="nemberBack"
                                   class="form-control input-lg ng-pristine ng-valid ng-touched"
                                   dir="ltr"
                                   style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                            >
                            <i class="fa fa-code fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                            <div class="input-group-addon">کد دریافتی</div>
                        </div>
                    </div>
                    <div class="col-xs-12" id="newPassword" style="display: none">
                        <div class="form-group input-group has-feedback">
                            <input type="text" id="passrecover"
                                   class="form-control input-lg ng-pristine ng-valid ng-touched"
                                   dir="ltr"
                                   style="height: 30px;padding-right: 0;
    padding-left: 42.5px;"
                            >
                            <i class="fa fa-lock-open fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                            <div class="input-group-addon"> رمز عبور جدید</div>
                        </div>
                    </div>


                    <button type="button" id="recoverBtn" onclick="recoverPassword()" class="btn btn-success btn-block">
                        تایید کد
                    </button>


                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left"
                        onclick="$('#myModal12').modal('toggle');$('#myModal3').modal();"><span
                            class="fa fa-arrow-left"></span>صفحه قبل
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalMsgAlert" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" onclick="$('#modalMsgAlert').modal('toggle')">&times;</button>
                <h4><span class="glyphicon glyphicon-paste"></span> پیام </h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <p id="modalMsgAlretText"></p>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['mode']) && $_POST['mode'] != ''){
$model = $_POST['mode'];
$onclick = '';
if ($model == 1) {
    $textModel = "افزایش اعتبار";
    $onclick = "$('#nameUser').click()";
}
if ($model == 2) {
    $textModel = "خرید بسته اینترنتی";
    echo "<script>show('chargePart2Baste')</script>";
}
if ($model == 3) {
    $textModel = "خرید شارژ مستقیم ";
    echo "<script>show('chargePart2Baste')</script>";
}
if ($model == 4) {
    $textModel = "خرید پین ";
    echo "<script>show('chargePart2Baste')</script>";
}
if ($_POST['oldUser'] == '1') {
    $a = 'پیامک دعوت ارسال نشد ، شماره ';
    $a .= $_POST['mobile'];
    $a .= ' قبلا در اینکام عضو شده است';
    $color = "#b85c5c";
} else {
    $a = 'پیامک دعوت با موفقیت به شماره ';
    $a .= $_POST['mobile'];
    $a .= ' ارسال شد.';
    $color = "#5cb85c";
}
?>
<div class="modal fade" id="modalPay" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" onclick="$('#modalPay').modal('toggle');<?php echo $onclick ?>">
                    &times;
                </button>
                <h4>  <?php echo $textModel ?> با موفقیت انجام شد </h4>
            </div>
            <?php
            if ($model == 1){
            ?>
            <div class="modal-body" style="padding:32px 15px;">
                <p id="modalMsgAlretText">
                    شماره پیگیری تراکنش :
                    <?php echo $_POST['refId'] ?>
                    <br>
                    <br>
                    مبلغ :
                    <?php echo toMoney($_SESSION['price']) ?>
                    تومان
                    <br>
                    <br>
                    اعتبار فعلی شما :
                    <?php echo toMoney($money) ?>
                    تومان
                </p>
                <?php
                }
                ?>
                <?php
                if ($model == 2){
                ?>
                <div class="modal-body" style="padding:40px 15px;">
                    <p id="modalMsgAlretText">
                        شماره پیگیری تراکنش :
                        <?php echo $_POST['refId'] ?>
                        <br>
                        <br>
                        مبلغ :
                        <?php echo toMoney($_SESSION['price'] / 10) ?>
                        تومان
                        <br>
                        <br>
                        شماره سرویس :
                        <?php echo $_POST['mobile'] ?>
                        <br>
                        <br>

                    </p>
                    <?php
                    if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                        ?>
                        <p style="text-align: center;margin-bottom: 20px">
                            <b style="background:<?php echo $color ?>;color:#fff;border-radius: 10px;padding: 7px;font-size:11px"> <?php
                                echo $a;
                                ?> </b>

                        </p>
                        <?php
                    }
                    }
                    ?>

                    <?php
                    if ($model == 3){
                    ?>
                    <div class="modal-body" style="padding:40px 15px;">
                        <p id="modalMsgAlretText">
                            شماره پیگیری تراکنش :
                            <?php echo $_POST['refId'] ?>
                            <br>
                            <br>
                            مبلغ :
                            <?php echo toMoney($_SESSION['price']) ?>
                            تومان
                            <br>
                            <br>
                            شماره سرویس :
                            <?php echo $_POST['mobile'] ?>
                            <br>
                            <br>
                        </p>
                        <?php
                        if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                            ?>
                            <p style="text-align: center;margin-bottom: 20px">
                                <b style="background:<?php echo $color ?>;color:#fff;border-radius: 10px;padding: 7px;font-size:11px"> <?php
                                    echo $a;
                                    ?> </b>

                            </p>

                            <?php
                        }
                        }
                        ?>

                        <?php
                        if ($model == 4){
                        ?>
                        <div class="modal-body" style="padding:40px 15px;">
                            <p id="modalMsgAlretText">
                                شماره پیگیری تراکنش :
                                <?php echo $_POST['refId'] ?>
                                <br>
                                <br>
                                مبلغ :
                                <?php echo toMoney($_SESSION['price']) ?>
                                تومان
                                <br>
                                <br>
                                شماره پین :
                                <?php echo $_POST['pin'] ?>
                                <br>
                                <br>
                                شماره سریال :
                                <?php echo $_POST['serial'] ?>
                                <br>
                                <br>
                            </p>
                            <?php
                            if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                                ?>
                                <p style="text-align: center;margin-bottom: 20px">
                                    <b style="background:<?php echo $color ?>;color:#fff;border-radius: 10px;padding: 7px;font-size: 11px;"> <?php
                                        echo $a;
                                        ?> </b>

                                </p>
                                <?php
                            }
                            }
                            if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true && $model != 1){
                            ?>

                            <div class="col-xs-12" style="border-top: 2px solid #e4e4e4;">
                                <div class="alert alert-success" style="display: none;" id="SucContact">
                                    شماره با موفقیت به سیستم اضافه شد
                                </div>
                                <div class="alert alert-danger" style="display: none;" id="ErrorContact">
                                    این شماره در دفترچه تلفن شما قبلا ثبت شده است
                                </div>
                                <div class="alert alert-danger" style="display: none;" id="DangerContact">
                                    وارد کردن نام اجباریست
                                </div>
                                <br>
                                افزودن شماره سرویس به دفترچه تلفن
                                <br>
                                <input id="NumberContactAdd" value="<?php echo $_POST['mobile'] ?>"
                                       style="display: none;">
                                <div class="form-group input-group has-feedback" style="    margin-top: 15px;">
                                    <input type="text" id="nameConctact"
                                           class="form-control input-lg ng-pristine ng-valid ng-touched"
                                           dir=""
                                           style="text-align: right;
    height: 30px;
    padding-right: 9px;
    padding-left: 42.5px;"
                                    >
                                    <i class="fa fa-address-book fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                                    <div class="input-group-addon">نام و نام خانوادگی</div>


                                </div>
                                <div style="width: 100%;text-align: center">
                            <span class="btn btn-info2" style="cursor: pointer;" onclick="submitContact()">ثبت
                            </span>
                                </div>
                                <script>
                                    function submitContact() {

                                        $('#SucContact').hide();
                                        $('#ErrorContact').hide();
                                        $('#DangerContact').hide();
                                        var name, mobile;

                                        name = $('#nameConctact').val();
                                        mobile = $('#NumberContactAdd').val();

                                        if (name === "") {
                                            $('#DangerContact').show();
                                        }
                                        $.ajax({
                                            url: 'ajax/contactAdd.php',
                                            data: {
                                                name: name,
                                                number: mobile
                                            },
                                            dataType: 'json',
                                            type: 'POST',
                                            success: function (data) {
                                                if (data["Error"] === false) {
                                                    SerachContact();
                                                    $('#SucContact').show();
                                                }else{
                                                    $('#ErrorContact').show();
                                                }
                                            }
                                        });

                                    }
                                </script>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#modalPay').modal();
            </script>
            <?php
            }
            ?>
            <script>
                function showModalMsg(e, f) {


                    $.ajax({
                        url: 'ajax/getMsg.php',
                        data: {
                            id: e,
                            model: f
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            if (data["Error"] === false) {
                                if (f === "msg") {
                                    $('#modalMsgAlert').modal();
                                    $("#modalMsgAlretText").text(data['MSG']);
                                }
                                $("#" + e).removeClass("active");
                                $("#bag" + e).hide();
                                if (data["result"] === true) {
                                    if (f == "noti") {
                                        let countN = $('#showMsgNoti').text()-1;
                                        $('#showMsgNoti').text(countN);
                                        $('#notInCount').text(' شما '+countN.toString()+' اعلان جدید دارید');
                                    } else if (f == "msg") {
                                        let countN = $('#showMsgMsg').text()-1;
                                        $('#showMsgMsg').text(countN);
                                        $('#MSGInCount').text(' شما '+countN.toString()+' پیام جدید دارید');
                                    }
                                }
                            }
                        }
                    });
                }

                function complateInvMSG() {
                    $("#InvTellShow").text($("#input3").val());
                }
            </script>
            <script type="text/javascript">

                window.$crisp = [];
                window.CRISP_WEBSITE_ID = "98efa367-67d2-4844-8685-f5e613094620";
                (function () {
                    d = document;
                    s = d.createElement("script");
                    s.src = "https://client.crisp.chat/l.js";
                    s.async = 1;
                    d.getElementsByTagName("head")[0].appendChild(s);
                })();</script>
</body>
<script src="js/tabel.js"></script>
<script src="js/jqTable.js"></script>
<script>
    if ($('.warm-canvas').length) {
        $('.warm-canvas').glassyWorms({
            colors: ['#ffffff55', '#ffffff55'],
            useStyles: true,
            numParticles: 500,
            tailLength: 40,
            maxForce: 8,
            friction: 0.75,
            gravity: 4,
            interval: 3
            // colors: ['#000'],
            // element: $('<canvas class="worms"></canvas>')[0]
        });
    }
</script>
</html>