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
        isset($_POST['name']) &&
        !empty($_POST['name']) &&
        isset($_POST['pwd']) &&
        !empty($_POST['pwd']) &&
        strlen($_POST['pwd']) >= 6
    ) {
        include "../inc/db.php";
        include "../inc/my_frame.php";
        $userOwnerId = ''; //For IDE Don`t Show Error
        $db = new db();
        $conn = $db->conn();
        $codeAgent = $db->real($_POST['code']);
        $name = $db->real( $_POST['name']);
        $pwd1 =  $db->real($_POST['pwd']);
        if (!empty($codeAgent)) {
            $selectInviteCode = mysqli_query($conn, "
              SELECT * FROM inviteCode where inviteCodeText ='$codeAgent'");
            if (mysqli_num_rows($selectInviteCode) == 0) {
                $call = array("Error" => true, "MSG" => "کاربری با این کد معرف در سیستم موجود نیست");
                echo json_encode($call);
                endfile($conn);
            } else {
                $row = mysqli_fetch_assoc($selectInviteCode);
                $userOwnerId = $row['inviteCodeUserId'];
                $inVid=$row['inviteCodeId'];
                require_once "../inc/noti.php";
                $noti = new noti();
                $noti->sendNoti($userOwnerId,"تبریک ! ".$_SESSION['mobile']." به کاربران شما اضافه شد");
            }
        }else{
            $inVid = '';
        }
        $pwd=$db->converNumberToEn($pwd1);
        $pwd = passwordHash($pwd);
        $id = $db->generate_id();
        $mobile = $db->real($_SESSION['mobile']);
        $mobile=$db->converNumberToEn($mobile);
        $code = $db->real($_SESSION['code']);
        $date = _date();
        $time = _time();
        $idInviteCode = $db->generate_id();

        //user Level 1
        //agent Level 2
        //SubAgent Level 3

        $insertUser = mysqli_query($conn, "
          INSERT INTO user 
            (
             userId, userFullname, userMobile,
             userRegDate, userRegTime, UserOwner,
             userLevel, userCodeSms, userPassword,userInvCode
             ) 
        VALUES
             ('$id','$name','$mobile',
             '$date','$time','$userOwnerId',
             '1','$code','$pwd','$inVid')
             ");
        $InsertInviteCode = mysqli_query($conn, "INSERT INTO inviteCode
        (inviteCodeId, inviteCodeText, inviteCodeUserId,status)
         VALUES 
        ('$idInviteCode','$mobile','$id','1')
        ");
        if ($insertUser && $idInviteCode) {
            include "../inc/msg.php";
            $msg = new msg();
            $msg->sendMsgDefault($id,"WellCome");
            require_once "../inc/my_frame.php";
            @smsForati($mobile," با سلام 
$name عزیز 
به اینکام خوش آمدید

اطلاعات کاربری جهت ورود :
موبایل : $mobile
کلمه عبور : $pwd1

www.inkam.ir");
            $call = array("Error"=>false,"MSG"=>null);
            echo json_encode($call);
            endfile($conn);
        }else{
            $call = array("Error"=>true,"MSG"=>"خطایی در سیستم رخ داده لطفا مجدد سعی نمایید.");
            echo json_encode($call);
            endfile($conn);
        }
    }
}