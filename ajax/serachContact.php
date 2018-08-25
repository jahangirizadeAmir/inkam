<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/25/18
 * Time: 10:01 PM
 */
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(
        isset($_POST['number']) && $_POST['number']!='' &&
        isset($_POST['name']) && $_POST['name']!=''
    ){
        include "../inc/db.php";
        $conn = new db();

        $name = $conn->real($_POST['number']);
        $number = $conn->real($_POST['name']);

        $id = $conn->generate_id();
        $date = $conn->date();
        $time = $conn->time();
        $num = rand(1,999);
        $Insert = mysqli_query($conn->conn(),"INSERT INTO contact 
(contactId, contactName, contactNumber, contactRegDate, contactRegTime, contactNum)
 VALUES ('$id','$name','$number','$date','$time','$num')");
        if($Insert){
            $call = array("Error"=>false);
            echo json_encode($call);
            return;
        }
    }
}