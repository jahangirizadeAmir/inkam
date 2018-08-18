<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/18/18
 * Time: 1:21 PM
 */

class sharj
{
    private $userName="t29fUm_WxeVh5J";
    private $password="-.GYnWA0oLDJw";
    private $last;
    private $url="https://ws.nekatelecom.com/";

    public function __construct()
    {
         $this->last =  base64_encode($this->userName.':'.$this->password);
    }

    public function topup($amount,$mobile,$amazing="false",$operator){
        $this->url.="topup";
        $extra = array("amazing"=>$amazing);
        $arrayTopup = array("amount"=>$amount,"mobile"=>$mobile,"operator"=>$operator,"extra"=>$extra);
        return $this->sendRequest($arrayTopup);

    }
    private function sendRequest($data_Json){
        $data_Json = json_encode($data_Json);
        $ch = curl_init($this->url."?format=json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_Json);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("Content-Type: application/json","charset=UTF-8",
                "Authorization: Basic $this->last"));
        $result = curl_exec($ch);
        $jsonResult = json_decode($result,true);
        return $jsonResult;
    }


}