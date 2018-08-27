<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/21/18
 * Time: 6:09 PM
 *
 *
 *
 *             price: price,
               shaba: shaba,
               bankName: bankName
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (isset($_SESSION['userLogin']) && $_SESSION["userLogin"] == true) {
        if(
            isset($_POST['price']) &&
            !empty($_POST['price']) &&
            is_numeric($_POST['price']) &&
            isset($_POST['shaba']) &&
            !empty($_POST['shaba']) &&
            isset($_POST['bankName']) &&
            !empty($_POST['bankName'])
        ){
            include "../inc/db.php";
            $conn = new db();
            $bankName = $conn->real($_POST['bankName']);
            $Shaba = $conn->real($_POST['shaba']);
            $Price = (int) $conn->real($_POST['price']);
            $id = $conn->generate_id();
            $date = $conn->date();
            $time = $conn->time();

            $userId = $conn->real($_SESSION["userId"]);

            $select = mysqli_query($conn->conn(),"SELECT * FROM user where user.userId='$userId'");
            if(mysqli_num_rows($select)>0){
                $row = mysqli_fetch_assoc($select);
                $userMoney =(int) $row["userMoney"];
                if($Price<5000){
                    $call = array("Error"=>true,"MSG"=>"مبلغ نمی تواند زیر ۵۰۰۰ تومان باشد.");
                    echo json_encode($call);
                    return;
                }
                if($userMoney>=$Price){
                    $lastMoney = $userMoney-$Price;
                    $insert = mysqli_query($conn->conn(),"INSERT INTO getMoney (getMoneyId, getMoneyUserId, getMoneyShaba, getMoneyBank, getMoneyRegDate, getMoneyRegTime, getMoneyPrice) values ('$id','$userId','$Shaba','$bankName','$date','$time','$Price')");
                    if($insert){
                        $update = mysqli_query($conn->conn(),"UPDATE user SET userMoney='$lastMoney' where user.userId='$userId'");
                        if($update){
                            $selectShaba = mysqli_query($conn->conn(),"SELECT * FROM shaba where shabaId='$userId' AND shabaNumber='$Shaba'");
                            if(mysqli_num_rows($selectShaba)==0){
                                $iDShaba = $conn->generate_id();
                                $insertShaba = mysqli_query($conn->conn(),"INSERT INTO shaba (shabaId, shabaUserId, shabaNumber, shabaBank)
                                  VALUES ('$iDShaba','$userId','$Shaba','$bankName')");
                            }
                            $call = array("Error"=>false,"MSG"=>"در خواست با موفقیت ثبت شد و در لیست انتظار قرار گرفت .","money"=>$lastMoney);
                            echo json_encode($call);
                            return;
                        }
                    }
                }else{
                    $call = array("Error"=>true,"MSG"=>"مبلغ درخواستی بیش از مبلغ موجودی است.");
                    echo json_encode($call);
                    return;
                }
            }else{
                $call = array("Error"=>true,"MSG"=>"لطفاْ مجددا سعی نمایید.");
                echo json_encode($call);
                return;
            }
        }else{
            $call = array("Error"=>true,"MSG"=>"در ورود اطلاعات دقت کنید");
            echo json_encode($call);
            return;
        }
    }
}