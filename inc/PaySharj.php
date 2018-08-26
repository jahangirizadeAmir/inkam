<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/21/18
 * Time: 2:54 PM
 */

class PaySharj
{

    private $percentAgent;
    private $percentUser;
    private $percentAgentInv;
    private $percentUserInv;
    private $conn;
    private $operator;
    private $noti;
    public function __construct($operator,$model)
    {
        //model == 1 ? mostaghim && baste
        //model == 2 ? code
        //operator 1 = hamrah
        //operator 2 = irancell
        //operator 3 = rightell

        if($operator=="1"){
            if($model=="1") {
                $this->percentAgent = 1.5;
                $this->percentUser = 0.5;
                $this->percentAgentInv = 1;
                $this->percentUserInv = 1;
            }
            if($model=="2") {
                $this->percentAgent = 1.5;
                $this->percentUser = 0.5;
                $this->percentAgentInv = 1;
                $this->percentUserInv = 1;
            }
        }
        if($operator=="2"){
                    if($model=="1") {
                        $this->percentAgent = 2.5;
                        $this->percentUser = 0.5;
                        $this->percentAgentInv = 1;
                        $this->percentUserInv = 1.5;
                    }
                    else if($model=="2"){
                        $this->percentAgent = 1.5;
                        $this->percentUser = 0.5;
                        $this->percentAgentInv = 1;
                        $this->percentUserInv = 1;
                    }
        }
        if($operator=="3"){
            if($model=="1") {

                $this->percentAgent = 2.5;
                $this->percentUser = 0.5;
                $this->percentAgentInv = 1;
                $this->percentUserInv = 1;

            }
            if($model=="2") {

                $this->percentAgent = 2.5;
                $this->percentUser = 0.5;
                $this->percentAgentInv = 1;
                $this->percentUserInv = 1;

            }
        }


        require_once "db.php";
        require_once "noti.php";
        $this->conn = new db();
        $this->noti = new noti();
    }
    public function SharjAndBaste($price,$userId){
        $userId = $this->conn->real($userId);
        $price = $this->conn->real($price);
        $selectUser = mysqli_query($this->conn->conn(),
            "SELECT * FROM user where userId='$userId'");
        $row = mysqli_fetch_assoc($selectUser);
        $level = $row["userLevel"];
        $userAgent = $row["UserOwner"];
        $money = $row["userMoney"];
        if($level==1){

            $this->userOwner($userAgent, $price);
            $percent = ( (int)($price/100) * (int) $this->percentUser);
            $lastPercent = round($percent,0,PHP_ROUND_HALF_DOWN);
            $lastMoney = (int) $money + (int) $lastPercent;
            $msg = "مبلغ".$lastPercent."تومان بابت خرید از پنل به اعتبار شما اضافه شد";
            $this->noti->sendNoti($userId,$msg);
            $this->update($userId,$money);
        }
        //user Level 1
        //agent Level 2
        //SubAgent Level 3
        if($level==2){
            $percent = ( (int)($price/100) * (int) $this->percentAgentInv);
            $lastPercent = round($percent,0,PHP_ROUND_HALF_DOWN);
            $lastMoney = (int) $money + (int) $lastPercent;
            $this->update($userId,$money);
            $msg = "مبلغ".$lastPercent."تومان بابت خرید از پنل به اعتبار شما اضافه شد";
            $this->noti->sendNoti($userId,$msg);

            $id = $this->conn->generate_id();
            $trans = $id;
            $date = $this->conn->date();
            $time = $this->conn->time();
            $product = 'درآمد از خرید';
            $model = '6';
            $insert = mysqli_query($this->conn->conn(), "
                      INSERT INTO pay 
                      (payId, payRef, payRegDate, payRegTime, payUserId, payProduct, payModel,payPrice)
                       VALUES
                     ('$id','$trans','$date','$time','$userId','$product','$model','$price')");


        }
    }
    private function userOwner($userId,$price){
        if($userId!="") {
            $select = mysqli_query($this->conn->conn(), "SELECT * FROM user where userId='$userId'");
            $rowUser = mysqli_fetch_assoc($select);
            $level = $rowUser["userLevel"];
            $money = $rowUser["userMoney"];
            $msg = "مبلغ".$price."تومان بابت خرید کاربر به اعتبار شما اضافه شد";
            $this->noti->sendNoti($userId,$msg);

            if($level==1){
                    $percent = ( (int)($price/100) * (int) $this->percentUserInv);
                    $lastPercent = round($percent,0,PHP_ROUND_HALF_DOWN);
                    $lastMoney = (int) $money + (int) $lastPercent;
                    $this->update($userId,$money);
                    $id = $this->conn->generate_id();
                    $trans = $id;
                    $date = $this->conn->date();
                    $time = $this->conn->time();
                    $product = 'درآمد از کاربر';
                    $model = '5';
                    $insert = mysqli_query($this->conn->conn(), "
                      INSERT INTO pay 
                      (payId, payRef, payRegDate, payRegTime, payUserId, payProduct, payModel,payPrice)
                       VALUES
                     ('$id','$trans','$date','$time','$userId','$product','$model','$price')");
                }
                if($level==2){
                    $percent = ( (int)($price/100) * (int) $this->percentAgentInv);
                    $lastPercent = round($percent,0,PHP_ROUND_HALF_DOWN);
                    $lastMoney = (int) $money + (int) $lastPercent;
                    $this->update($userId,$money);
                    $id = $this->conn->generate_id();
                    $trans = $id;
                    $date = $this->conn->date();
                    $time = $this->conn->time();
                    $product = 'درآمد از کاربر';
                    $model = '5';
                    $insert = mysqli_query($this->conn->conn(), "
                      INSERT INTO pay 
                      (payId, payRef, payRegDate, payRegTime, payUserId, payProduct, payModel,payPrice)
                       VALUES
                     ('$id','$trans','$date','$time','$userId','$product','$model','$price')");
                }
        }
    }
    private function update($userId,$Money){
        $update = mysqli_query($this->conn->conn(),"UPDATE user SET userMoney='$Money' where userId='$userId'");
        if($update){
            return true;
        }else{
            return false;
        }
    }
    public function beforPay($price,$model){
        //$model 1 =>user
        //$model 2=>agent
        if($model=='1'){
            $precent = $this->percentUser;

        }else if($model=='2'){
            $precent = $this->percentAgent;
        }else{
            return false;
        }
        $last = (((int) $price / 100)*$precent)/10;
        return round($last);
    }

}