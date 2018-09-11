<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 7/25/18
 * Time: 5:54 PM
 */
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    if (
        isset($_POST['code']) &&
        isset($_SESSION['userLogin']) &&
        $_SESSION['userLogin']==true &&

        isset($_POST['name']) &&
        !empty($_POST['name']) &&

        isset($_POST['old']) &&
        isset($_POST['pwd'])
    ) {
        include "../inc/db.php";
        include "../inc/my_frame.php";
        $userOwnerId = ''; //For IDE Don`t Show Error
        $db = new db();
        $conn = $db->conn();
        $userId = $db->real($_SESSION['userId']);
        if(!empty($_POST['old'])) {
            $old = $db->real($_POST['old']);
            $old = passwordHash($old);
            $selectUser = mysqli_query($conn, "

              SELECT * FROM user
              where userId='$userId' AND
              userPassword='$old'
              
               ");
            if (mysqli_num_rows($selectUser) == 0) {
                $call = array("Error" => true, "MSG" => "رمز عبور اشتباه است ");
                echo json_encode($call);
                return;
            }
            if(
                $_POST['pwd']!=''
            ) {
                if (strlen($_POST['pwd']) >= 6) {
                    $pwd = $db->real($_POST['pwd']);
                    $pwd = passwordHash($pwd);
                    $up .= "UPDATE user SET user.userPassword = '$pwd' where userId = '$userId'; ";
                } else {
                    $call = array("Error" => true, "MSG" => "رمز عبور می بایست حداقل ۶ کاراکتر باشد ");
                    echo json_encode($call);
                    return;
                }
            }
        }
        $selectUserGet = mysqli_query($conn,"SELECT * FROM user where user.userId='$userId'");
        $rowSelectuser = mysqli_fetch_assoc($selectUserGet);
        $OwnerId = $rowSelectuser['UserOwner'];
        if($_POST['name']!=''){
            $name = $db->real($_POST['name']);
            $up ="UPDATE user Set user.userFullname = '$name' where user.userId='$userId'; ";
            $_SESSION['userName']=$name;
        }

        if($_POST['code']!=''){
            $code = $db->real($_POST['code']);
            if($OwnerId==''){
                $selectInviteCode = mysqli_query($conn, "
              SELECT * FROM inviteCode where inviteCodeText ='$code'");
                if (mysqli_num_rows($selectInviteCode) == 0) {
                    $call = array("Error" => true, "MSG" => "کاربری با این کد معرف در سیستم موجود نیست");
                    echo json_encode($call);
                    endfile($conn);
                } else {
                    $row = mysqli_fetch_assoc($selectInviteCode);
                    $userOwnerId = $row['inviteCodeUserId'];
                    $invCodeId = $row['inviteCodeId'];
                    require_once "../inc/noti.php";
                    $noti = new noti();
                    $noti->sendNoti($userOwnerId,
                        "تبریک ! ".$_SESSION['mobile']." به کاربران شما اضافه شد. ");
                    $up.="UPDATE user SET user.UserOwner='$userOwnerId',user.userInvCode='$invCodeId' WHERE user.userId='$userId';";
                }
            }
        }
        if(isset($up)){
            $upadate = mysqli_multi_query($conn,$up);
            if($upadate) {
                $call = array("Error" => false,"MSG"=>"ویرایش با موفقیت انجام شد.");
                echo json_encode($call);
                return;
            }else{
                echo $up;
            }
        }else{
            $call=array("Error"=>true,"MSG"=>"اطلاعات را تکمیل نمایید");
            echo json_encode($call);
            return;
        }
    }
}