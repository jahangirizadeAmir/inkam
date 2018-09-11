<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/21/18
 * Time: 5:38 PM
 */
if($_SERVER["REQUEST_METHOD"]=="POST") {
    session_start();
    if (isset($_SESSION['userLogin']) && $_SESSION["userLogin"] == true) {
        if (isset($_POST["mobile"]) && $_POST["mobile"] != "") {
            include "../inc/my_frame.php";
            include "../inc/db.php";
            $conn = new db();
            $mobile = $conn->real($_POST['mobile']);
            $userId = $conn->real($_SESSION['userId']);
            $select = mysqli_query($conn->conn(), "SELECT * FROM user where userId = '$userId'");

            if(mysqli_num_rows($select)==1){
                $checkUser = mysqli_query($conn->conn(),"SELECT * FROM user where user.userMobile='$mobile'");
                if(mysqli_num_rows($checkUser)!=0){
                    $call = array("Error"=>true);
                    echo json_encode($call);
                    return;
                }
                $selectRow = mysqli_fetch_assoc($select);
                $userName = $selectRow["userFullname"];
                $selectInv = mysqli_query($conn->conn(),"SELECT * FROM inviteCode where inviteCodeUserId='$userId' AND status='1'");
                $invRow = mysqli_fetch_assoc($selectInv);
                $userMobile = $invRow['inviteCodeText'];
                $text = "مشترک $mobile شما از طرف $userName به اپلیکیشن اینکام دعوت شده اید 
                
با اینکام خرید شارژ ، بسته اینترنتی ، قبوض و بلیط مسافرتی را با تخفیف انجام دهید و با معرفی اپلیکیشن اینکام مادام العمر کسب درآمد کنید

لینک دانلود اپلیکیشن : www.inkam.ir/app

توجه : در زمان ثبت نام کد معرف را $userMobile وارد کنید
";
                @smsForati($mobile,$text);
                $call = array("Error"=>false);
                echo json_encode($call);
                return;
            }
        }
    }
}