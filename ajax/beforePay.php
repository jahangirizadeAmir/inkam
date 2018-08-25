<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/24/18
 * Time: 4:28 PM
 */
if($_SERVER['REQUEST_METHOD']=="POST") {
    session_start();
    if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
        if(
            isset($_POST['price'])
            && $_POST['price']!='' &&
            isset($_POST['operator'])
            && $_POST['operator']!=''
            && isset($_POST['model'])
            && $_POST['model']!=''
        ){

            include "../inc/db.php";
            $conn = new db();
            $price = $conn->real($_POST['price']);
            $model = $conn->real($_POST['model']);
            $operator = $conn->real($_POST['operator']);
            $userId = $conn->real($_SESSION['userId']);
            $select = mysqli_query($conn->conn(),"SELECT * FROM user where userId='$userId'");
            $rowUser = mysqli_fetch_assoc($select);
            $userMode = $rowUser["userLevel"];
            include "../inc/PaySharj.php";
            if($operator==1){
                $operator=3;
            }else{
                if($operator==3){
                    $operator=1;
                }
            }
            $PaySharj = new PaySharj($operator,$model);
            $percent = $PaySharj->beforPay($price,$userMode);
            $percent = round($percent);
            $call = array("Error"=>false,"percent"=>$percent);
            echo json_encode($call);
            return;

        }

    } else {
        $call = array("Error"=>false,"percent"=>"0");
        echo json_encode($call);
        return;
    }
}