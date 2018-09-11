<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/21/18
 * Time: 6:09 PM
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (isset($_SESSION['userLogin']) && $_SESSION["userLogin"] == true) {
        if(
            isset($_POST['id']) &&
            !empty($_POST['id'])
        ){

            include "../inc/db.php";
            $conn = new db();
            $id = $conn->real($_POST['id']);
            $select = mysqli_query($conn->conn(),"SELECT * FROM shaba where shaba.shabaId='$id'");
            $row = mysqli_fetch_assoc($select);
            $call = array("Error"=>false,"shabaNumber"=>$row['shabaNumber'],"shabaBank"=>$row['shabaBank']);
            echo json_encode($call);

        }
    }
}