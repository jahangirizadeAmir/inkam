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
            && isset($_POST['model']) &&
            !empty($_POST['model'])
        ){
            include "../inc/db.php";
            $conn = new db();
            $id = $conn->real($_POST['id']);
            $model = $conn->real($_POST['model']);
            if($model==="msg"){
                $select = mysqli_query($conn->conn(),"SELECT * FROM msg where msgId='$id'");
                $rowMsg = mysqli_fetch_assoc($select);
                $MSG = $rowMsg["msgLongText"];
                if($rowMsg['msgView']==0) $result=true;else $result=false;
                $update = mysqli_query($conn->conn(),"UPDATE msg SET msg.msgView='1' where msgId='$id'");
            }else if($model==="noti"){
                $select = mysqli_query($conn->conn(),"SELECT * FROM noti where notiId='$id'");
                $rowMsg = mysqli_fetch_assoc($select);
                $MSG = $rowMsg["notiLongText"];
                if($rowMsg['notiView']==0) $result=true;else $result=false;
                $update = mysqli_query($conn->conn(),"UPDATE noti SET noti.notiView='1' where notiId='$id'");
            }
            $call = array("Error"=>false,"MSG"=>$MSG,"result"=>$result);
            echo json_encode($call);
        }
    }
}