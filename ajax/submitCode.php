<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 7/25/18
 * Time: 5:54 PM
 */
if($_SERVER['REQUEST_METHOD']=="POST"){
    session_start();
    if(
        isset($_POST['code']) && !empty($_POST['code'])
        && isset($_SESSION['code'])
        && $_SESSION['code']!=''
    ){
        include "../inc/conn.php";
        include "../inc/my_frame.php";
        $conn = connection();
        $code = mysqli_real_escape_string($conn,$_POST['code']);
        if($code == $_SESSION['code']){
            $call = array("Error"=>false);
        }else{
            $call = array("Error"=>true);
        }
        echo json_encode($call);
        endfile($conn);
    }
}
