<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/22/18
 * Time: 10:26 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');
if(isset($_POST)) {
    session_start();
    require "inc/melatBank.php";
    require "inc/sharj.php";
    require "inc/PaySharj.php";
    require "inc/db.php";
    $sharj = new sharj();
    $conn = new db();
    $pin = '21';
    $mobile='12141241212412412';
    $oldUser = '0';
    $serial = '22';
    //model==1 walet afzayesh Etebar
    $model = 0;
    $product = '';
    $sellerName='اینکام';


    if (isset($_POST['etebar']) && $_POST['etebar'] == true) {
        if(isset($_SESSION['mobile']) && $_SESSION['mobile']!='') {
            require_once "inc/my_frame.php";
            if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                $mobile = $conn->real($_SESSION['mobile']);
                $id = $conn->real($_SESSION['userId']);
                $selectUser = mysqli_query($conn->conn(),"SELECT * FROM user where userId='$id'");
                $rowuser = mysqli_fetch_assoc($selectUser);
                $userName = $rowuser['userFullName'];
                $userMobile = $rowuser['userMobile'];
                $userLevel = $rowuser['userLevel'];
                if($userLevel=="2"){
                    $sellerName=$userName;
                }
                $checKuser = mysqli_query($conn->conn(),"SELECT * FROM user where user.userMobile like '%$mobile%'");
                if(mysqli_num_rows($checKuser)!=0){
                    $oldUser='1';

                }else {
                    $text = "مشترک $mobile شما از طرف $userName به اپلیکیشن اینکام دعوت شده اید 
                
با اینکام خرید شارژ ، بسته اینترنتی ، قبوض و بلیط مسافرتی را با تخفیف انجام دهید و با معرفی اپلیکیشن اینکام مادام العمر کسب درآمد کنید

لینک دانلود اپلیکیشن : www.inkam.ir/app

توجه : در زمان ثبت نام کد معرف را $userMobile وارد کنید
";
                    @smsForati($mobile, $text);
                }
            }
        }else{
            $sellerName='اینکام';
        }
        $operator = $conn->real($_SESSION['operator']);
        if ($operator == 1) {
            $operator = "rtl";
            $op = 3;
        } else if ($operator == 3) {
            $operator = "mci";
            $op = 1;
        } else if ($operator == 2) {
            $operator = "ir";
            $op = 2;
        }

        if (isset($_SESSION['userId'])) {
            $userId = $conn->real($_SESSION['userId']);
        } else {
            $userId = '';
        }
        $id = $conn->generate_id();
        $trans = $id;
        $price = $conn->real($_SESSION['price']);
        $date = $conn->date();
        $time = $conn->time();
        $trans = '';


        if ($_SESSION['model'] == 'baste') {
            $model = "2";
            if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                $paySharj = new PaySharj($op, 1);

            }
            $simModel = $conn->real($_SESSION['simModel']);
            $code = $conn->real($_SESSION['code']);
            $mobile = $conn->real($_SESSION['mobile']);
            $sharj->topup($price, $mobile, $operator, "false", $code,$sellerName);

        }
        if ($_SESSION['model'] == "sharj") {
            if ($_SESSION['modelSharj'] == 1) {
                $model = "3";
                if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                    $paySharj = new PaySharj($op, 1);
                }
                $mobile = $conn->real($_SESSION['mobile']);
                $real = $price * 10;
                //(mci|hamrah),(ir,irancell),(rtl,rightel)
                $a = $sharj->topup($real, $mobile, $operator, $_SESSION['amz'],'',$sellerName);

            }
            if ($_SESSION['modelSharj'] == 2) {
                $model = "4";
                if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                    $paySharj = new PaySharj($op, 2);
                }
                $simModel = $conn->real($_SESSION['simModel']);
                $mobile = $conn->real($_SESSION['mobile']);
                $real = $price * 10;
                $b = $sharj->pin($op, $real);
                $pin = $b[0]['pin'];
                $serial = $b[0]['serial'];
            }
        }
        $insert = mysqli_query($conn->conn(), "
            INSERT INTO pay 
            (payId, payRef, payRegDate, payRegTime, payUserId, payProduct, payModel,payPrice)
             VALUES
            ('$id',$id,'$date','$time','$userId','$product','$model','$price')
             ");
        if ($insert) {
            echo '<div id="melatBank"></div>
<script language="javascript" type="text/javascript"> 
				function postRefId () {
				var form = document.createElement("form");
				form.setAttribute("method", "POST");
				form.setAttribute("action", "index.php");         
				form.setAttribute("target", "_self");
				var hiddenField = document.createElement("input");              
				hiddenField.setAttribute("name", "mode");
				hiddenField.setAttribute("value", ' . $model . ');
				var hiddenField2 = document.createElement("input");              
				hiddenField2.setAttribute("name","refId");
				hiddenField2.setAttribute("value",' . $trans . ');
				var hiddenField3 = document.createElement("input");              
				hiddenField3.setAttribute("name","mobile");
				hiddenField3.setAttribute("value",' . $mobile . ');
				var hiddenField4 = document.createElement("input");              
				hiddenField4.setAttribute("name", "price");
				hiddenField4.setAttribute("value", ' . $price . ');
				var hiddenField5 = document.createElement("input");              
				hiddenField5.setAttribute("name", "sharjModel");
				hiddenField5.setAttribute("value", ' . $_SESSION['modelSharj'] . ');
				var hiddenField6 = document.createElement("input");              
				hiddenField6.setAttribute("name", "serial");
				hiddenField6.setAttribute("value", ' . $serial . ');
				var hiddenField7 = document.createElement("input");              
				hiddenField7.setAttribute("name", "pin");
				hiddenField7.setAttribute("value", ' . $pin . ');
				form.appendChild(hiddenField);
				form.appendChild(hiddenField2);
				form.appendChild(hiddenField3);
				form.appendChild(hiddenField4);
				form.appendChild(hiddenField5);
				form.appendChild(hiddenField6);
				form.appendChild(hiddenField7);
				document.getElementById("melatBank").appendChild(form);         
				form.submit();
				document.getElementById("melatBank").removeChild(form);
			}
						postRefId();

			</script>';
        }
    }else{
        if(isset($_SESSION['mobile']) && $_SESSION['mobile']!='') {
            if ($_SESSION['model'] != 'walet') {
                require_once "inc/my_frame.php";
                if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                    $mobile = $conn->real($_SESSION['mobile']);
                    $id = $conn->real($_SESSION['userId']);
                    $selectUser = mysqli_query($conn->conn(), "SELECT * FROM user where userId='$id'");
                    $rowuser = mysqli_fetch_assoc($selectUser);
                    $userName = $rowuser['userFullname'];
                    $userMobile = $rowuser['userMobile'];
                    $userLevel = $rowuser['userLevel'];
                    if ($userLevel == "2") {


                        $sellerName = $userName;


                    }
                    $checKuser = mysqli_query($conn->conn(),"SELECT * FROM user where  user.userMobile  like '%$mobile%'");
                    if(mysqli_num_rows($checKuser)!=0){
                        $oldUser='1';

                    }else {
                        $text = "مشترک $mobile شما از طرف $userName به اپلیکیشن اینکام دعوت شده اید 
                
با اینکام خرید شارژ ، بسته اینترنتی ، قبوض و بلیط مسافرتی را با تخفیف انجام دهید و با معرفی اپلیکیشن اینکام مادام العمر کسب درآمد کنید

لینک دانلود اپلیکیشن : www.inkam.ir/app

توجه : در زمان ثبت نام کد معرف را $userMobile وارد کنید
";
                        @smsForati($mobile, $text);
                    }
                }
            }
        }
            $mellat = new MellatBank();
            $results = $mellat->checkPayment($_POST);
//    print_r($results);
//    print_r($_SESSION);
            if ($results["status"] == "success") {
                $trans = $results["trans"];
                if (isset($_SESSION['model']) ) {
                    if($_SESSION['model'] != 'walet') {
                        $operator = $conn->real($_SESSION['operator']);
                        if ($operator == 1) {
                            $operator = "rtl";
                            $op = 3;
                        } else if ($operator == 3) {
                            $operator = "mci";
                            $op = 1;
                        } else if ($operator == 2) {
                            $operator = "ir";
                            $op = 2;
                        }
                    }
                    if (isset($_SESSION['userId'])) {
                        $userId = $conn->real($_SESSION['userId']);
                    } else {
                        $userId = '';
                    }
                    $id = $conn->generate_id();
                    $price = $conn->real($_SESSION['price']);
                    $date = $conn->date();
                    $time = $conn->time();
                    if ($_SESSION['model'] == 'walet') {
                        $_SESSION['modelSharj'] = '123123123';

                        $model = '1';
                        $select = mysqli_query($conn->conn(), "SELECT * FROM user where userId='$userId'");
                        $row = mysqli_fetch_assoc($select);
                        $money = $row['userMoney'];
                        $lastMoney = (int)$money + (int)$price;
                        $update = mysqli_query($conn->conn(), "UPDATE user set user.userMoney='$lastMoney' where userId='$userId'");
                    }
                    if ($_SESSION['model'] == 'baste') {
                        $model = "2";
                        if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                            $paySharj = new PaySharj($op, 1);
                        }
                        $simModel = $conn->real($_SESSION['simModel']);
                        $code = $conn->real($_SESSION['code']);
                        $mobile = $conn->real($_SESSION['mobile']);
                        $sharj->topup($price, $mobile, $operator, "false", $code,$sellerName);

                    }
                    if ($_SESSION['model'] == "sharj") {
                        if ($_SESSION['modelSharj'] == 1) {
                            $model = "3";
                            if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                                $paySharj = new PaySharj($op, 1);
                            }
                            $mobile = $conn->real($_SESSION['mobile']);
                            $real = $price * 10;
                            //(mci|hamrah),(ir,irancell),(rtl,rightel)
                            $a = $sharj->topup($real, $mobile, $operator, $_SESSION['amz'],'',$sellerName);

                        }
                        if ($_SESSION['modelSharj'] == 2) {
                            $model = "4";
                            if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
                                $paySharj = new PaySharj($op, 2);
                            }
                            $simModel = $conn->real($_SESSION['simModel']);
                            $mobile = $conn->real($_SESSION['mobile']);
                            $real = $price * 10;
                            $b = $sharj->pin($op, $real);
                            $pin = $b[0]['pin'];
                            $serial = $b[0]['serial'];
                        }
                    }
                    $insert = mysqli_query($conn->conn(), "
            INSERT INTO pay 
            (payId, payRef, payRegDate, payRegTime, payUserId, payProduct, payModel,payPrice)
             VALUES
            ('$id','$trans','$date','$time','$userId','$product','$model','$price')
             ");
                    if ($insert) {
                        echo '<div id="melatBank"></div>
<script language="javascript" type="text/javascript"> 
				function postRefId () {
				var form = document.createElement("form");
				form.setAttribute("method", "POST");
				form.setAttribute("action", "index.php");         
				form.setAttribute("target", "_self");
				var hiddenField = document.createElement("input");              
				hiddenField.setAttribute("name", "mode");
				hiddenField.setAttribute("value", ' . $model . ');
				var hiddenField2 = document.createElement("input");              
				hiddenField2.setAttribute("name","refId");
				hiddenField2.setAttribute("value",' . $trans . ');
				var hiddenField3 = document.createElement("input");              
				hiddenField3.setAttribute("name","mobile");
				hiddenField3.setAttribute("value",' . $mobile . ');
				var hiddenField4 = document.createElement("input");              
				hiddenField4.setAttribute("name", "price");
				hiddenField4.setAttribute("value", ' . $price . ');
				var hiddenField5 = document.createElement("input");              
				hiddenField5.setAttribute("name", "sharjModel");
				hiddenField5.setAttribute("value", ' . $_SESSION['modelSharj'] . ');
				var hiddenField6 = document.createElement("input");              
				hiddenField6.setAttribute("name", "serial");
				hiddenField6.setAttribute("value", ' . $serial . ');
				var hiddenField7 = document.createElement("input");              
				hiddenField7.setAttribute("name", "pin");
				hiddenField7.setAttribute("value", ' . $pin . ');
				var hiddenField8 = document.createElement("input");              
				hiddenField8.setAttribute("name", "oldUser");
				hiddenField8.setAttribute("value", '.$oldUser.');
				form.appendChild(hiddenField);
				form.appendChild(hiddenField2);
				form.appendChild(hiddenField3);
				form.appendChild(hiddenField4);
				form.appendChild(hiddenField5);
				form.appendChild(hiddenField6);
				form.appendChild(hiddenField7);
				form.appendChild(hiddenField8);
				document.getElementById("melatBank").appendChild(form);         
				form.submit();
				document.getElementById("melatBank").removeChild(form);
			}
			postRefId();
			</script>';
                    } else {
                        echo mysqli_error($conn->conn());
                    }
                }
            }else{
                echo '<script> window.location.replace("index.php") </script>';
            }

        }


}