<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/25/18
 * Time: 10:01 PM
 */
if($_SERVER['REQUEST_METHOD']=="POST"){
    session_start();
    if(
        isset($_POST['number']) && $_POST['number']!='' &&
        isset($_POST['name']) && $_POST['name']!='' &&
        isset($_SESSION['userLogin'])
        && $_SESSION['userLogin']==true
    ){
        include "../inc/db.php";
        $conn = new db();


        //Name And Number Change Becuase Error in html
        $a = substr($_POST['number'],0,1);
        if($a!="0"){
            $name = "0".$conn->real($_POST['number']);
        }else{
            $name = $conn->real($_POST['number']);
        }
        $number =$conn->real($_POST['name']);
        $userId = $conn->real($_SESSION['userId']);
        $id = $conn->generate_id();
        $date = $conn->date();
        $time = $conn->time();
        $num = rand(100,999);
        $Insert = mysqli_query($conn->conn(),"INSERT INTO contact 
(contactId, contactName, contactNumber, contactRegDate, contactRegTime, contactNum,contactUserId)
 VALUES ('$id','$name','$number','$date','$time','$num','$userId')");
        if($Insert){
            $call = array("Error"=>false,"id"=>$id,"number"=>$num,"a"=>$a);
            echo json_encode($call);
            return;
        }else{
            echo mysqli_error($conn->conn());
        }
    }else{
        echo'1';
    }
}else{
    echo '2';
}