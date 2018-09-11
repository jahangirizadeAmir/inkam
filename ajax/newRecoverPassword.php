<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/26/18
 * Time: 4:23 AM
 */
if($_SERVER['REQUEST_METHOD']=='POST'){
    session_start();
    if(isset($_SESSION['mobile']) && $_SESSION['mobile']!=''){
        include "../inc/db.php";
        $conn = new db();
        $mobile=$conn->real($_SESSION['mobile']);
        $smsCode = rand();
        $a = rand(1000,9999);
        include "../inc/my_frame.php";
        $_SESSION['code']=$a;
        $smsText = "کد فراموشی رمز عبور اینکام شما: ".$a;
        @smsForati($_SESSION['mobile'],$smsText);
        $call = array("Error"=>false);
        echo json_encode($call);
        mysqli_close($conn->conn());
    }
}