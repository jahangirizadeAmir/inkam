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

    public function topup($amount,$mobile,$operator,$amazing="false",$code=null){
        $this->url.="topup";
        if($code!=null){
            $extra = array("internet"=>$code);
        }else{
            if($amazing!="false") {
                $extra = array("amazing" => $amazing);
            }
        }
        $arrayTopup = array("amount"=>$amount,"mobile"=>$mobile,"operator"=>$operator,"extra"=>$extra);
        $result = $this->sendRequest($arrayTopup);
        return $result;
    }
    public function pin($operator,$amount){
        //1 hamrah
        //2 irancell
        //3 rightell
        $this->url.="pin";
        $list = array([$operator,$amount,1]);
        $array = array("list"=>$list);
        $result = $this->sendRequest($array);
        if(isset($result['status']) && $result['status']==true){
            return $result["pins"];
        }else{
            return false;
        }
    }
    public function packges($date,$operator,$typeSim){
        //Hourly |Daily | Weekly | Monthly | Two Month | Three Month| Four Month| Six Month| Yearly
        //typeSim
        //1 اعتباری
        //2 دیتا
        //3 دایمی
        //4 TD-LTE
        //1 hamrah
        //2 irancell
        //3 rightell
        $this->url.="packages/internet";
        $data_Json=null;
        $result = $this->sendRequest($data_Json);
        $optionSelect = array();
        foreach ($result as $rsArray){
                if($rsArray["operator_id"]!=$operator)continue;
                if($rsArray["period_id"]!=$date)continue;
                if($typeSim!=$rsArray["type_id"])continue;
                $code = $rsArray['code'];
                $name = $rsArray['name'];
                $price = $rsArray['credit'];
                $optionSelect[]=array("name"=>$name,"code"=>$code,"price"=>$this->ToCur($price));
        }
        return $optionSelect;
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
    public function ToCur($val,$symbol=' ',$r=0){
        $n = $val;
        $c = is_float($n) ? 1 : number_format($n,$r);
        $d = '.';
        $t = ',';
        $sign = ($n < 0) ? '-' : '';
        $i = $n=number_format(abs($n),$r);
        $j = (($j = strlen($i)) > 3) ? $j % 3 : 0;
        return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j));
    }

}