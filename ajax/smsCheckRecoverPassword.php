<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/26/18
 * Time: 4:27 AM
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    if (
        isset($_SESSION['mobile']) &&
        $_SESSION['mobile'] != '' &&
        isset($_SESSION['code']) &&
        $_SESSION['code'] != '' &&
        isset($_POST['code']) &&
        $_POST['code'] != ''
    ) {
        include "../inc/db.php";
        $conn = new db();
        $mobile = $conn->real($_SESSION['mobile']);
        $codeSms = $conn->real($_SESSION['code']);
        $code = $conn->real($_POST['code']);
        $code=$conn->converNumberToEn($code);
        $codeSms===$code?$error=false:$error=true;
        $call = array("Error"=>$error);
        echo json_encode($call);
        return;
    }
}