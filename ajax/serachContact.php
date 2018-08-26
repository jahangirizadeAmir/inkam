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
        isset($_POST['serach']) && $_POST['serach']!=''&&
        isset($_SESSION['userLogin']) && $_SESSION['userLogin']==true

    ){
        include "../inc/db.php";
        $conn = new db();

        $search = $conn->real($_POST['serach']);
        $userId = $conn->real($_SESSION['userId']);

        $selectContact = mysqli_query($conn->conn(),"SELECT * FROM contact 
        where contactUserId='$userId' and (contact.contactName  like '%$search%' 
        OR contact.contactNum like '%$search%')");
        if(mysqli_num_rows($selectContact)==0){
            $html = ' <tr>
                                <td>0</td>
                                <td>کاربری موجود نیست</td>
                                <td>***********</td>
                            </tr>';
        }else{
            $html = '';
            $cot = "'";
            while ($row= mysqli_fetch_assoc($selectContact)){
                $html = '<tr onclick="SelectNumberContact('.$cot.$row['contactNumber'].$cot.')"><td>'.$row['contactNum'].'</td><td>'.$row['contactName'].'</td> <td>'.$row['contactNumber'].'</td></tr>';
            }
        }
        $call = array("Error"=>false,"html"=>$html);
        echo json_encode($call);
        return;
    }else{
        echo '1';
    }
}