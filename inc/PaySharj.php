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
                $this->percentAgent = 1.5;
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
        $this->conn = new db();
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
        }
    }
    private function userOwner($userId,$price){
        if($userId!="") {
            $select = mysqli_query($this->conn->conn(), "SELECT * FROM user where userId=$userId");
            $rowUser = mysqli_num_rows($select);
            $level = $rowUser["userLevel"];
            $money = $rowUser["userMoney"];
                if($level==1){
                    $percent = ( (int)($price/100) * (int) $this->percentUserInv);
                    $lastPercent = round($percent,0,PHP_ROUND_HALF_DOWN);
                    $lastMoney = (int) $money + (int) $lastPercent;
                    $this->update($userId,$money);
                }
                if($level==2){
                    $percent = ( (int)($price/100) * (int) $this->percentAgentInv);
                    $lastPercent = round($percent,0,PHP_ROUND_HALF_DOWN);
                    $lastMoney = (int) $money + (int) $lastPercent;
                    $this->update($userId,$money);
                }
        }
    }
    private function update($userId,$Money){
        $update = mysqli_query($this->conn->conn(),"UPDATE user SET userMoney='$Money' where userId=$userId");
        if($update){
            return true;
        }else{
            return false;
        }
    }

}