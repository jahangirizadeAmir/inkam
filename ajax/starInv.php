<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 9/4/18
 * Time: 12:54 PM
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (isset($_SESSION['userLogin']) && $_SESSION["userLogin"] == true) {
        if (
            isset($_POST['id']) &&
            !empty($_POST['id'])
        ) {
            include "../inc/db.php";
            $conn = new db();
            $id = $conn->real($_POST['id']);
            $userId = $conn->real($_SESSION['userId']);
            $update = mysqli_query($conn->conn(),"UPDATE inviteCode Set inviteCode.status='0' where inviteCode.inviteCodeUserId='$userId'");
            $update2 = mysqli_query($conn->conn(),"UPDATE inviteCode SET inviteCode.status='1' where inviteCode.inviteCodeUserId='$userId' and inviteCode.inviteCodeId='$id'");
            $call = array("Error"=>false);
            echo json_encode($call);
        }
    }
}