<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 7/25/18
 * Time: 5:54 PM
 */
if($_SERVER['REQUEST_METHOD']=="POST"){
    session_start();
    if(isset($_POST['mobile']) && !empty($_POST['mobile'])){
        include "../inc/conn.php";
        include "../inc/my_frame.php";
        $conn = connection();
        $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
        $select = mysqli_query($conn,"SELECT * FROM user WHERE userMobile='$mobile'");
        if(mysqli_num_rows($select)==1){
            $call = array("Error"=>false,"Sms"=>false);
            $_SESSION['mobile']=$mobile;
            $_SESSION['code']='';
        }else{
            $a = rand(1000,9999);
            $Sms = @smsForati("$mobile","$a");
            if($Sms==0){
                $call = array("Error"=>false,"Sms"=>true);
                $_SESSION['mobile']=$mobile;
                $_SESSION['code']=$a;
            }else{
                $call = array("Error"=>true,"Sms"=>true);
            }
        }
        echo json_encode($call);
        endfile($conn);
    }

}