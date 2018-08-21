<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/21/18
 * Time: 3:47 PM
 */

class msg
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
    public function sendMsgDefault($userId,$msgArrayName){
        $userId = $this->conn->real($userId);
        $msg = $this->conn->real($this->array[$msgArrayName]["short"]);
        $shortMsg = $this->conn->real($this->array[$msgArrayName]["long"]);
        $date = $this->conn->date();
        $time = $this->conn->time();
        $id = $this->conn->generate_id();
        $insert = mysqli_query($this->conn->conn(),"INSERT INTO msg
          (msgId, msgUserId, msgShortText, msgLongText, msgRegTime, msgRegDate, msgAdminId, msgView)
        VALUES ('$id','$userId','$shortMsg','$msg','$time','$date','','0')");
        if($insert){
            return true ;
        }else{
    return false ;
}




    }
    public function sendMsg($userId,$shortMsg,$msg,$adminId=""){
        $userId = $this->conn->real($userId);
        $msg = $this->conn->real($msg);
        $shortMsg = $this->conn->real($shortMsg);
        $date = $this->conn->date();
        $time = $this->conn->time();
        $id = $this->conn->generate_id();
        $insert = mysqli_query($this->conn->conn(),"INSERT INTO msg
          (msgId, msgUserId, msgShortText, msgLongText, msgRegTime, msgRegDate, msgAdminId, msgView)
        VALUES ('$id','$userId','$shortMsg','$msg','$time','$date','$adminId','0')");
        if($insert){
            return true ;
        }else{
            return false ;
        }
    }


}