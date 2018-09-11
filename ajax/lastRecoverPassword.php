<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/26/18
 * Time: 4:26 AM
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    if (
        isset($_SESSION['mobile']) &&
        $_SESSION['mobile'] != '' &&
        isset($_POST['password']) &&
        $_POST['password'] != ''

    ) {
        include "../inc/db.php";
        $db = new db();
        include "../inc/my_frame.php";
        $pwd = $db->real($_POST['password']);
        $name = $db->real($_SESSION['mobile']);
        $pwd=$db->converNumberToEn($pwd);
        $pwd  = passwordHash($pwd);

        $update = mysqli_query($db->conn(),"UPDATE user SET user.userPassword='$pwd' where user.userMobile='$name'");

        $conn = $db->conn();
        $selectUser = mysqli_query($conn,"
           SELECT * FROM user where 
           user.userMobile='$name' AND
           user.userPassword='$pwd'
           ");

        if(mysqli_num_rows($selectUser)==0){
            $call = array('Error'=>true);
        }else{
            $userRow = mysqli_fetch_assoc($selectUser);
            $userName = $userRow['userFullname'];
            $call = array('Error'=>false,'userName'=>$userName);
            $_SESSION['userLogin']=true;
            $_SESSION['userName']=$userName;
            $_SESSION['userId']=$userRow['userId'];
        }
        echo json_encode($call);
        endfile($conn);
    }
}