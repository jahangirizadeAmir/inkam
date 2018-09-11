<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 9/11/18
 * Time: 5:24 PM
 */
if($_SERVER['REQUEST_METHOD']=="POST") {
    session_start();
    if (
        isset($_POST['id']) && $_POST['id'] != ''&&
        isset($_SESSION['userLogin'])
        && $_SESSION['userLogin'] == true
    ) {
        include "../inc/db.php";
        $conn = new db();

        $id = $conn->real($_POST['id']);
        $delete = mysqli_query($conn->conn(),"DELETE FROM contact where contactId='$id'");
        $call=array("Error"=>false,"select"=>"DELETE * FROM contact where contactId='$id'");
        echo json_encode($call);
        return;

    }
}
