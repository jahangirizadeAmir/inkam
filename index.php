<?php
session_start();
include "inc/db.php";
include "inc/sharj.php";
include "inc/my_frame.php";
$sharj = new sharj();
$conn = new db();
if (isset($_SESSION['userId']) && $_SESSION['userId'] != "") {
    $userId = $conn->real($_SESSION['userId']);
    $selectUser = mysqli_query($conn->conn(),"SELECT * FROM inviteCode where inviteCodeUserId='$userId' and status='1'");
    $rowInviteCode = mysqli_fetch_assoc($selectUser);
    $invCode = $rowInviteCode['inviteCodeText'];
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
    <script src="js/inputMask.js"></script>
    <script src="js/profile.js"></script>

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
        <li style="
    padding: 3px;
" onclick="$('#userOption').hide();
    $('#userProfile').hide();$('#homeDashbord').show();hideMenu()">
            <i class="fa fa-home iconMenuLeft red"
               style="    position: relative;
    top: 10px;"></i>
            پیشخوان
            <br>
        <span style="color: #e4e4e4;
    margin-right: 48px;">اطلاعات کاربری</span>
        </li>


        <li style="padding: 3px;" onclick="
        $('#homeDashbord').hide();
        $('#MyUser').hide();
        $('#userOption').show();
        $('#userProfile').show();
        removeBlur();

">
            <i class="fa fa-user-alt iconMenuLeft blue"
               style="    position: relative;
    top: 10px;"></i>
            ویرایش پروفایل  <br>
        <span style="color: #e4e4e4;
    margin-right: 48px;">ویرایش اطلاعات کاربری</span>
        </li>


        <li style="padding: 3px;"
            onclick="
        $('#homeDashbord').hide();
        $('#MyUser').show();
        $('#userOption').show();
        $('#userProfile').hide();
        removeBlur();

"
        >
            <i class="fa fa-users iconMenuLeft yellow"
               style="position: relative;
    top: 10px;"></i>  مدیریت کاربران<br>
        <span style="color: #e4e4e4;
    margin-right: 48px;">مدیریت زیرمجموعه</span>
        </li>

        <li style="padding: 3px;">
            <i class="fa fa-credit-card iconMenuLeft red"
               style="position: relative;top: 10px;"></i>
            گزارشات            <br>
        <span style="color: #e4e4e4;
    margin-right: 48px;">گزارشات مالی</span>
        </li>

        <li style="padding: 3px;">
            <i class="fa fa-address-book iconMenuLeft red"
               style="position: relative;top: 10px;"></i>
            دفترچه تلفن            <br>
        <span style="color: #e4e4e4;
    margin-right: 48px;">لیست شماره تلفن</span>

        </li>
    </ul>
</div>
<div class="col-md-12 col-sm-12 col-xs-12" style="position: absolute;z-index: 888;margin-bottom: 15px">
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
    padding: 0!important;">شماره تلفن</span>  شما از طرف <?php echo $_SESSION['userName'] ?> به اپلیکیشن اینکام دعوت شده اید با اینکام خرید شارژ ، بسته اینترنتی ، قبوض و بلیط مسافرتی را با تخفیف انجام دهید و با معرفی اپلیکیشن اینکام مادام العمر کسب درآمد کنید
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
SELECT * From noti where noti.notiUserId='$userId' LIMIT 5
");
                while ($rowMsg = mysqli_fetch_assoc($selectMSg)) {
                    if ($rowMsg['notiView'] == 0) {
                        $i++;
                        $htmlMsg .= '<li style="" class="noti active" id="'.$rowMsg["notiId"].'" onclick="showModalMsg(' . $cot . $rowMsg["notiId"] . $cot . ',' . $cot . 'noti' . $cot . ')">
                            <div class="notiBag" id="bag'.$rowMsg["notiId"].'" style=""></div>
                            <p>' . $rowMsg['notiShortText'] . '</p>
                            <p style="font-size: 10px;color: #999999;">' . $conn->jalali($rowMsg['notiRegDate']) . '</p>
                        </li>';
                    } else {
                        $htmlMsg .= '<li style="" id="'.$rowMsg["notiId"].'" class="noti " onclick="showModalMsg(' . $cot . $rowMsg["notiId"] . $cot . ',' . $cot . 'noti' . $cot . ')">
                            <p>' . $rowMsg['notiShortText'] . '</p>
                            <p style="font-size: 10px;color: #999999;">' . $conn->jalali($rowMsg['notiRegDate']) . '</p>
                        </li>';
                    }
                }
                ?>
                <img src="img/not.png" class="not img-responsive" id="menuLeft1" data-toggle="dropdown">
                <span class="badge bg-danger" id="showMsgNoti" style="left: 37px;top: 5px;background-color: red"><?php echo $i ?></span>
                <ul class="dropdown-menu dropdown-menu-left  extended tasks-bar" role="menu"
                    aria-labelledby="menuLeft1" style="width: 257px!important;">
                    <div class="notify-arrow-left notify-arrow-green"></div>
                    <?php
                    echo '<li style="width: 100%">
                            <p class="green">شما ' . $i . ' پیام جدید دارید</p>
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
SELECT * From msg where msg.msgUserId='$userId' LIMIT 5
");
                while ($rowMsg = mysqli_fetch_assoc($selectMSg)) {
                    if ($rowMsg['msgView'] == 0) {
                        $i++;
                        $htmlMsg .= '<li style="" id="'.$rowMsg["msgId"].'" onclick="showModalMsg(' . $cot . $rowMsg["msgId"] . $cot . ',' . $cot . 'msg' . $cot . ')" class="noti active">
                            <div class="notiBag" id="bag'.$rowMsg["msgId"].'" style=""></div>
                            <h5 style="text-align: right;margin: 0 0 10px 0px;">' . $rowMsg['msgShortText'] . '</h5>
                            <p>' . $rowMsg['msgLongText'] . '</p>
                            <p style="font-size: 10px;color: #999999;">' . $conn->jalali($rowMsg['msgRegDate']) . '</p>
                        </li>';
                    } else {
                        $htmlMsg .= ' <li style="" id="'.$rowMsg["msgId"].'" onclick="showModalMsg(' . $cot . $rowMsg["msgId"] . $cot . ',' . $cot . 'msg' . $cot . ')" class="noti">
                            <h6 style="    text-align: right;margin: 0 0 10px 0px;">' . $rowMsg['msgShortText'] . '</h6>
                            <p>' . $rowMsg['msgLongText'] . '</p>
                            <p style="font-size: 10px;color: #999999;">' . $conn->jalali($rowMsg['msgRegDate']) . '</p>
                        </li>';
                    }
                }
                ?>
                <img src="img/msg.png" class="not img-responsive" id="menuLeft3" data-toggle="dropdown">
                <span class="badge bg-primary" id="showMsgMsg"
                      style="left: 37px;top: 5px;background-color: orange"><?php echo $i ?></span>
                <ul class="dropdown-menu dropdown-menu-left  extended tasks-bar" role="menu"
                    aria-labelledby="menuLeft1">
                    <div class="notify-arrow-left notify-arrow-green"></div>
                    <?php
                    echo '<li style="width: 100%">
                            <p class="green">شما ' . $i . ' پیام جدید دارید</p>
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
    top: 8px;"></i> <?php echo $_SESSION['userName'] ?></span>;
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
" id="spanMoney"> اعتبار فعلی شما : <?php echo toMoney($money) ?> تومان </span>
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
                    <button class="btn btn-info2" style="margin-top: 10px;">
                        جزییات بیشتر
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12  Circle">
                    <span>درآمد از خرید پنل</span>
                    <div class="twoCircle">
                       <span style="    direction: rtl;
    font-size: 16px;
    top: 39px;
    left: 0px;
    position: absolute;">
                           <?php
                           $selectPriceOwne = mysqli_query($conn->conn(), "SELECT sum(payPrice) as sum FROM pay where pay.payUserId='$userId' AND pay.payModel='6'");
                           $rowPriceOwne = mysqli_fetch_assoc($selectPriceOwne);
                           if($rowPriceOwne['sum']=='')
                               echo '0 تومان';
                           echo $rowPriceOwne['sum'];
                           ?>
                        </span>
                    </div>
                    <button class="btn btn-info2" style="margin-top: 10px;">
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
$selectPriceOwne = mysqli_query($conn->conn(), "SELECT sum(payPrice) as sum FROM pay where pay.payUserId='$userId' AND pay.payModel='6'");
$rowPriceOwne = mysqli_fetch_assoc($selectPriceOwne);
if($rowPriceOwne['sum']=='')
    echo '0 تومان';
echo $rowPriceOwne['sum'];
?>
                          </span>
                    </div>
                    <button class="btn btn-info2" style="margin-top: 10px;">
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
                           id="getManeyText2">
                </div>
                <script>
                    $("#getManeyText2").maskMoney();
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
                    $("#getManeyText").maskMoney();
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
<?php

if(isset($_SESSION['userLogin']) && $_SESSION['userLogin']==true){

?>

<div class="col-md-12 col-sm-12 col-xs-12" style="margin: auto;float: none;background: ;padding: 15px 25px;
    width: 100%;
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;" id="userOption">
    <div id="userProfile" class="col-md-6" style="background: #ffffff;padding: 30px;margin: auto;float: none;display: none">
        <h3>ویرایش اطلاعات کاربری</h3>
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
                       style="height: 50px;padding-right: 7px;
    padding-left: 42.5px;"
                       value="<?php echo $_SESSION['userName'] ?>"
                >
                <i class="fa fa-user fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                <div class="input-group-addon">نام و نام خانوادگی / نام شرکت</div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group input-group has-feedback">
                <input type="text" id="OldeditPassword"
                       class="form-control input-lg ng-pristine ng-valid ng-touched"
                       dir="ltr"
                       style="height: 50px;padding-right: 0;
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
                       style="height: 50px;padding-right: 0;
    padding-left: 42.5px;"
                >
                <i class="fa fa-user fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                <div class="input-group-addon">رمز عبور جدید</div>
            </div>
        </div>

        <?php
        $selectUserProfile = mysqli_query($conn->conn(),"SELECT * FROM user where user.userId='$userId'");
        $rowUser = mysqli_fetch_assoc($selectUserProfile);
        $userOwner = $rowUser['UserOwner'];
        if($userOwner==''){
            ?>
            <div class="col-xs-12">
                <div class="form-group input-group has-feedback">
                    <input type="text" id="editCode"
                           class="form-control input-lg ng-pristine ng-valid ng-touched"
                           dir="ltr"
                           style="height: 50px;padding-right: 0;
    padding-left: 42.5px;"
                    >
                    <i class="fa fa-code-branch fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                    <div class="input-group-addon">کدمعرف</div>
                </div>
            </div>

        <?php
        }
        else{
    $selectOwner = mysqli_query($conn->conn(),"SELECT * FROM user where user.userId='$userOwner'");
    $rowOwner = mysqli_fetch_assoc($selectOwner);
    $userOwnerName = $rowOwner['userFullname'];
         ?>
            <div class="col-xs-12">
                <div class="form-group input-group has-feedback">
                    <input type="text" id="editCode"
                           class="form-control input-lg ng-pristine ng-valid ng-touched"
                           dir="rtl"
                           style="height: 50px;padding-right: 5px;
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
        ?>
        <span type="button" class="btn btn-info2" onClick="EditPrifile()">ویرایش اطلاعات</span>
    </div>
    <div id="MyUser" class="col-md-6" style="background: #ffffff;padding: 30px;margin: auto;float: none;display: none">
        <h3>مدیریت کاربران</h3>

        <div class="row state-overview">
            <div class="col-lg-4 col-sm-6">
                <section class="panel">
                    <div class="symbol terques">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">495</h1>
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
                        <h1 class=" count2">947</h1>
                        <p>کل خرید کاربران</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-sm-6">
                <section class="panel">
                    <div class="symbol yellow">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count3">328</h1>
                        <p>سود شما از خرید کاربران</p>
                    </div>
                </section>
            </div>
        </div>


        <table class="table table-hover">
            <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
            </tr>
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
    <div id="chargePart2Baste" class="col-md-10 col-xs-12 col-sm-12" style="">
        <div class="col-md-7" style="margin: auto;
    float: none;
    border: 2px solid #fff;
    background: #32487b69;
    padding: 20px;
    border-radius: 30px 0 30px 0;">

            <div class="alert alert-danger" id="payemtError" style="direction: rtl;display: none">
                مبلغ یا نوع بسته خود را انتخاب کنید.
            </div>
            <div class="col-xs-12" style="padding: 0;">

                <div class="form-group input-group has-feedback">
                    <input type="text" id="number1"
                           class="form-control input-lg ng-pristine ng-valid ng-touched"
                           dir="ltr"
                           style="height: 50px;padding-right: 0;
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

                    <div class="form-group input-group has-feedback" id="ContactList" >
                        <input type="text" id="inputContact"
                               class="form-control input-lg ng-pristine ng-valid ng-touched pRtl"
                               dir="ltr"
                               style="height: 50px;padding-right: 0;
    padding-left: 42.5px;
    border-bottom-left-radius: 0;"
                               autocomplete="off"
                               onfocus="$('.tableSearch').show()"
                               onkeypress="SerachContact()"
                               onkeydown="SerachContact()"
                               onblur="$('.tableSearch').hide()"
                               placeholder="دفترچه تلفن">
                        <i class="fa fa-address-book fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon" style="padding: 6px 15px;border-bottom-right-radius: 0;"> نام و نام خانودگی یا کد کاربر </div>
                    </div>
                        <table style="position: absolute;top: 50px;" class="tableSearch col-md-12">
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
                                    <tr onclick="SelectNumberContact('<?php echo $rowContact['contactNumber'] ?>')">
                                        <td><?php echo $rowContact['contactNum'] ?></td>
                                        <td><?php echo $rowContact['contactName'] ?></td>
                                        <td><?php echo $rowContact['contactNumber'] ?></td>
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
                    <img src="img/hamrah_logo.png" class="gray" style="width: 100%">
                </div>
                <div class="col-md-2 col-xs-2 col-sm-2 "
                     style="margin-left: 40px;margin-right: 40px;padding: 0px;text-align: center"
                     id="irancell">
                    <img src="img/irancell_logo.png" class="gray" style="width: 100%">
                </div>
                <div class="col-md-2 col-xs-2 col-sm-2 "
                     style="padding: 0px;text-align: center"
                     id="rightell">
                    <img src="img/rightell_logo.png" class="gray" style="width: 100%">
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
                <div class="col-md-4 col-xs-4 col-sm-4  "
                     style="text-align: center;"
                     id="">
                    <div class="bgRightellModel" onclick="ActiveThis('btnModel1')" id="btnModel1">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        شارژ مستقیم
                        <img src="img/radio.png" style="    width: 22px;
    margin-left: 10px;
    position: absolute;
    top: 8px;
    right: 10px;"
                             id="imgbtnModel1">
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
    top: 8px;
    right: 10px;"
                             id="imgbtnModel2">
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 "
                     style="text-align: center;"
                     id="">
                    <div class="bgHamrahMode" onclick="ActiveThis('btnModel3')" id="btnModel3">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        بسته اینترنتی
                        <img src="img/radio.png" style="    width: 22px;
    margin-left: 10px;
    position: absolute;
    top: 8px;
    right: 10px;"
                             id="imgbtnModel3">
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 12px;display: none;padding: 0" id="model2">
                <p style="color:#fff">نوع شارژ : </p>
                <div class="col-md-4 col-xs-4 col-sm-4"
                     style="text-align: center;"
                     id="chargeModelLog">
                    <div class="bgRightellModel" onclick="ActiveThis('btnModel4')" id="btnModel4">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        شارژ معمولی
                        <img src="img/radio.png" style="    width: 22px;
    margin-left: 10px;
    position: absolute;
    top: 8px;
    right: 10px;"
                             id="imgbtnModel4">
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4  "
                     style="text-align: center;"
                     id="">
                    <div class="bgIrancellMode" onclick="ActiveThis('btnModel5')" id="btnModel5">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">
                        شارژ شگفت انگیز
                        <img src="img/radio.png" style="    width: 22px;
    margin-left: 10px;
    position: absolute;
    top: 8px;
    right: 10px;"
                             id="imgbtnModel5">
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4  "
                     style="text-align: center;"
                     id="">
                    <div class="bgHamrahMode" onclick="ActiveThis('btnModel6')" id="btnModel6">
                        <img src="img/radio.png" style="width: 20px;position: absolute;left: 15px;" class="logoSmall">

                        سیمکارت دایمی
                        <img src="img/radio.png" style="    width: 22px;
    margin-left: 10px;
    position: absolute;
    top: 8px;
    right: 10px;"
                             id="imgbtnModel6">
                    </div>
                </div>
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
                               style="height: 50px;padding-right: 0;
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

                    <ul style="bottom:15px" class="priceSelect" id="priceSelect">
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
                                 id="Sli2">
                                <div class="bgIrancellMode" onclick="ActiveThis('btnModel24')" id="btnModel24">
                                    <img src="img/radio.png" style="width: 20px;position: absolute;right: 15px;"
                                         class="logoSmall">

                                    دایمی
                                    <img src="img/radio.png" style="width: 20px;position: absolute;right: 15px;"
                                         id="imgbtnModel24">
                                </div>
                            </div>
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
                    <div class="col-xs-12" style="padding: 0">

                        <p id="basteLongTitle" style="padding: 0px;display: none;
    color: #fff;
    margin-top: 10px;
    margin-bottom: 5px;">
                            مدت زمان بسته  :
                        </p>
                        <span class="form-control"
                              onclick="showBaste()"
                              id="basteLong" style="display: none;margin-top: 0px">
                    </span>
                        <ul style="bottom: 3px;" class="priceSelect" id="basteSelect">
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
                    <div class="col-xs-12" style="padding: 0">
                        <p id="basteLastTitle" style="padding: 0px;display: none;
    color: #fff;
    margin-top: 10px;
    margin-bottom: 5px;">
                            حجم بسته :
                        </p>
                        <span class="form-control" style="display: none"
                              onclick="showLastBaste()"
                              id="basteLast">
                            حجم مورد نظر را وارد کنید
                        </span>
                        <ul style="" class="priceSelect" id="basteLastSelect">
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
    top: 10px;"
                          onclick="showFactor()">نمایش پیش فاکتور</span>
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
                                    <span type="submit" class="btn btn-success" onclick="payMoney('baste')"
                                          style="float: right;"><span
                                                class="fas fa-credit-card" style="    margin-left: 15px;
    position: relative;
    top: 1px;"></span>پرداخت آنلاین
                                    </span>
                                        <?php
                                        if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']) {
                                            ?>
                                            <button type="submit" class="btn btn-info "
                                                    onclick="payMoneyEtebar('baste')" style="float: left;"><span
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
            <img src="https://trustseal.enamad.ir/logo.aspx?id=94496&amp;p=Eb1cp9upTf96fW4g" alt="" onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=94496&amp;p=Eb1cp9upTf96fW4g&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)" style="cursor:pointer;float: right;width: 50%" id="Eb1cp9upTf96fW4g">            <img class="img-responsive"  style="cursor: pointer;width: 50%;float: right" onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=1008235&p=rfthobpdobpdmcsiuiwkxlaodshw", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt='logo-samandehi' src='https://logo.samandehi.ir/logo.aspx?id=1008235&p=nbpdlymalymaaqgwodrfqftiujyn'/>
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
        $("#goDate").pDatepicker();
    });
</script>
<!--login submit recover-->
<script>
    $('#myModal').keypress(function(e) {
        // language=JQuery-CSS
        var a  = $('#code').val();
        if(a===""){
            if(e.which === 13) {
                firstLogin();
            }
        }else{
            if(e.which === 13) {
                submitCode();
            }
        }

    });
</script>
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
                               style="height: 50px;padding-right: 0;
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
                                   style="height: 50px;padding-right: 0;
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

<script>
    $('#myModal').keypress(function(e) {
        // language=JQuery-CSS
        var a  = $('#code').val();
        if(a===""){
            if(e.which === 13) {
                firstLogin();
            }
        }else{
            if(e.which === 13) {
                submitCode();
            }
        }

    });
</script>

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
                               style="height: 50px;padding-right: 5px;
    padding-left: 42.5px;;text-align: right;direction: rtl;font-size:16px"
                        >
                        <i class="fa fa-user-alt fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon" style="font-size: 13px">نام و نام خانوادگی / فروشگاه</div>

                    </div>
                    <div class="form-group input-group has-feedback">
                        <input type="text" id="pwd"
                               class="form-control input-lg ng-pristine ng-valid ng-touched"
                               dir="ltr"
                               style="height: 50px;padding-right: 0;
    padding-left: 42.5px;"
                        >
                        <i class="fa fa-lock-open fa-fw form-control-feedback" style="float: left;
    posit`ion: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon">رمز عبور</div>

                    </div>
                    <div class="form-group input-group has-feedback">
                        <input type="text" id="codeAgent"
                               class="form-control input-lg ng-pristine ng-valid ng-touched"
                               dir="ltr"
                               style="height: 50px;padding-right: 0;
    padding-left: 42.5px;"
                        >
                        <i class="fa fa-code fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                        <div class="input-group-addon">کد معرف</div>

                    </div>
                    <span type="button" onclick="submit()" class="btn btn-success btn-block"> ثبت نام
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
                               style="height: 50px;padding-right: 0;
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
                <div class="alert alert-danger" id="ForegetError" style="direction: rtl;text-align: right;display: none;">
                    <p id="">کد وارد شده اشتباه است.</p>
                </div>
                <form role="form">
                    <div class="col-xs-12" id="codeRecover">
                        <div class="form-group input-group has-feedback">
                            <input type="text" id="nemberBack"
                                   class="form-control input-lg ng-pristine ng-valid ng-touched"
                                   dir="ltr"
                                   style="height: 50px;padding-right: 0;
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
                                   style="height: 50px;padding-right: 0;
    padding-left: 42.5px;"
                            >
                            <i class="fa fa-lock-open fa-fw form-control-feedback" style="float: left;
    position: absolute;
    left: 2px;"></i>
                            <div class="input-group-addon"> رمز عبور جدید </div>
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
if ($model == 1) {
    $textModel = "افزایش اعتبار";
}
if ($model == 2) {
    $textModel = "خرید بسته اینترنتی";
}
if ($model == 3) {
    $textModel = "خرید شارژ مستقیم ";
}
if ($model == 4) {
    $textModel = "خرید پین ";
}
?>
<div class="modal fade" id="modalPay" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" onclick="$('#modalPay').modal('toggle');$('#nameUser').click()">
                    &times;
                </button>
                <h4>  <?php echo $textModel ?> با موفقیت انجام شد </h4>
            </div>
            <?php
            if ($model == 1){
            ?>
            <div class="modal-body" style="padding:40px 50px;">
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
                <div class="modal-body" style="padding:40px 50px;">
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
                    </p>
                    <?php
                    }
                    ?>

                    <?php
                    if ($model == 3){
                    ?>
                    <div class="modal-body" style="padding:40px 50px;">
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
                        </p>
                        <?php
                        }
                        ?>

                        <?php
                        if ($model == 4){
                        ?>
                        <div class="modal-body" style="padding:40px 50px;">
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

                            </p>
                            <?php
                            }
                            if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true){
                            ?>

                            <div class="col-xs-12" style="border-top: 2px solid #e4e4e4;">
                                <div class="alert alert-success" style="display: none;" id="SucContact">
                                    شماره با موفقیت به سیستم اضافه شد.
                                </div>
                                <div class="alert alert-danger" style="display: none;" id="DangerContact">
                                    وارد کردن نام اجباریست
                                </div>
                                <br>
                                افزودن شماره سرویس به دفترچه تلفن
                                <br>
                                <input id="NumberContactAdd" value="<?php echo $_SESSION['number'] ?>"
                                       style="display: none;">
                                <div class="form-group input-group has-feedback" style="    margin-top: 15px;">
                                    <input type="text" id="nameConctact"
                                           class="form-control input-lg ng-pristine ng-valid ng-touched"
                                           dir=""
                                           style="text-align: right;
    height: 50px;
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
                                                price: price.replace(/,/g, ''),
                                                name: name,
                                                number: mobile
                                            },
                                            dataType: 'json',
                                            type: 'POST',
                                            success: function (data) {
                                                if (data["Error"] === false) {

                                                    $('#SucContact').show();
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
                                if(f==="msg"){
                                    $('#modalMsgAlert').modal();
                                    $("#modalMsgAlretText").text(data['MSG']);
                                }
                                $("#"+e).removeClass("active");
                                $("#bag"+e).hide();
                                if(data["result"]===true) {
                                    if (f == "noti") {
                                        let countN = $('#showMsgNoti').text();
                                        $('#showMsgNoti').text(countN - 1);
                                    } else if (f == "msg") {
                                        let countN = $('#showMsgMsg').text();
                                        $('#showMsgMsg').text(countN - 1);

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
            <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="98efa367-67d2-4844-8685-f5e613094620";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>
</html>