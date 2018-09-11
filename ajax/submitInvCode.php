<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 9/4/18
 * Time: 1:15 PM
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (isset($_SESSION['userLogin']) && $_SESSION["userLogin"] == true) {
        if (
            isset($_POST['invCode']) &&
            !empty($_POST['invCode'])
        ) {
            include "../inc/db.php";
            $conn = new db();
            $invCode = $conn->real($_POST['invCode']);
            $userId = $conn->real($_SESSION['userId']);
            $id = $conn->generate_id();
            $insert = mysqli_query($conn->conn(),"INSERT INTO inviteCode
 (inviteCodeId, inviteCodeText, inviteCodeUserId, status) VALUE ('$id','$invCode','$userId','0')");
            $call=array("Error"=>false,"id"=>$id);
            echo json_encode($call);

        }
    }
}