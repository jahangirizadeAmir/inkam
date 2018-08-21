<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/21/18
 * Time: 3:47 PM
 */

class noti
{
    private $conn;
    private $array;
    public function __construct()
    {
        require_once "db.php";
        $this->conn = new db();
        $this->array = array(
            "WellCome"=>["short"=>"hello","long"=>"hello Word"]
        );

    }
    public function sendNotiDefault($userId,$msgArrayName){
        $userId = $this->conn->real($userId);
        $msg = $this->conn->real($this->array[$msgArrayName]["short"]);
        $shortMsg = $this->conn->real($this->array[$msgArrayName]["long"]);
        $date = $this->conn->date();
        $time = $this->conn->time();
        $id = $this->conn->generate_id();
        $insert = mysqli_query($this->conn->conn(),"INSERT INTO noti
(notiId, notiView, notiShortText, notiLongText, notiRegDate, notiRegTime, notiUserId) 
        VALUES ('$id','0','$shortMsg','$msg','$time','$date','$userId')");
        if($insert){
            return true ;
        }else{
    return false ;
}




    }
    public function sendNoti($userId,$shortMsg,$msg=""){
        $userId = $this->conn->real($userId);
        $msg = $this->conn->real($msg);
        $shortMsg = $this->conn->real($shortMsg);
        $date = $this->conn->date();
        $time = $this->conn->time();
        $id = $this->conn->generate_id();
        $insert = mysqli_query($this->conn->conn(),"INSERT INTO  noti
(notiId, notiView, notiShortText, notiLongText, notiRegDate, notiRegTime, notiUserId)
        VALUES ('$id','0','$shortMsg','$msg','$time','$date','$userId')");
        if($insert){
            return true ;
        }else{
            return false ;
        }
    }


}