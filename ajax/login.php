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
        include "../inc/conn.php";
        include "../inc/my_frame.php";
        $userOwnerId = ''; //For IDE Don`t Show Error
        $conn = connection();
        $name = mysqli_real_escape_string($conn, $_SESSION['mobile']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $pwd = passwordHash($pwd);

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
        }
        echo json_encode($call);
        endfile($conn);
    }
}