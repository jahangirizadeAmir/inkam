<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 7/25/18
 * Time: 5:54 PM
 */
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (
        isset($_POST['simModel']) &&
        !empty($_POST['simModel']) &&
        isset($_POST['date']) &&
        !empty($_POST['date']) &&
        isset($_POST['model']) &&
        !empty($_POST['model'])
    ) {
        include "../inc/db.php";
        $db = new db();
        include "../inc/my_frame.php";
        $userOwnerId = ''; //For IDE Don`t Show Error
        $conn = $db->conn();
        $model = $db->real($_POST['model']);
        $simModel  = $db->real($_POST['simModel']);
        $date  = $db->real($_POST['date']);
        //e==1 =>rightell
        //e==2 =>irancell
        //e==3 =>hamrahAval
        if($model==1){
            $model=3;
        }else{
            if($model==3){
                $model=1;
            }
        }

        include "../inc/sharj.php";
        $sharj = new sharj();
        $call = $sharj->packges($date,$model,$simModel);
        echo json_encode($call);

    }
}