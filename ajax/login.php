<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 7/25/18
 * Time: 5:54 PM
 */
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    //byby
    if (
        isset($_SESSION['mobile']) &&
        !empty($_SESSION['mobile']) &&
        isset($_POST['pwd']) &&
        !empty($_POST['pwd'])
    ) {
        include "../inc/db.php";
        $db = new db();
        include "../inc/my_frame.php";
        $userOwnerId = ''; //For IDE Don`t Show Error
        $conn = $db->conn();
        $name = $db->real($_SESSION['mobile']);
        $pwd  = $db->real($_POST['pwd']);
        $pwd = $db->converNumberToEn($pwd);
        $pwd  = passwordHash($pwd);
        $selectUser = mysqli_query($conn,"
           SELECT * FROM user where 
           user.userMobile='$name' AND
           user.userPassword='$pwd'
           ");

        if(mysqli_num_rows($selectUser)==0){
            $call = array('Error'=>$pwd);
        }else{
            $userRow = mysqli_fetch_assoc($selectUser);
            $userName = $userRow['userFullname'];
            $call = array('Error'=>false,'userName'=>$userName);
            $_SESSION['userLogin']=true;
            $_SESSION['userName']=$userName;
            $_SESSION['userId']=$userRow['userId'];
            $_SESSION['userLevel']=$userRow['userLevel'];
        }
        echo json_encode($call);
        endfile($conn);
    }
}