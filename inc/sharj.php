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
    private $url="https://ws.nekatelecom.com/topup";


    public function __construct()
    {
         $this->last =  base64_encode($this->userName.':'.$this->password);
    }

    public function topup(
        $amount,$mobile,
                          $operator,
                          $amazing="false",
                          $code=null,
                          $seller_name='اینکام'
    )
    {
        $this->url.="topup";
        if($code!=null){
            $extra = array("internet"=>$code,'seller_name'=>$seller_name);
        }else
            if($amazing!="false") {
                $extra = array("amazing" => $amazing,'seller_name'=>$seller_name);
            }
        else{
            $extra = array('seller_name'=>$seller_name);

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
    public function packgesDb($date,$operator,$typeSim){
        //Hourly |Daily | Weekly | Monthly | Two Month | Three Month| Four Month| Six Month| Yearly
        //typeSim
        //1 اعتباری
        //2 دیتا
        //3 دایمی
        //4 TD-LTE
        //1 hamrah
        //2 irancell
        //3 rightell
        require_once "db.php";
        $db = new db();
        $select = mysqli_query($db->conn(),"SELECT * FROM baste");
        while ($rsArray = mysqli_fetch_assoc($select)){
                if($rsArray["basteOperator"]!=$operator)continue;
                if($rsArray["bastePeriod"]!=$date)continue;
                if($typeSim!=$rsArray["basteType"])continue;
                $code = $rsArray['basteCode'];
                $name = $rsArray['basteName'];
                $price = $rsArray['bastePrice'];
                $optionSelect[]=array("name"=>$name,"code"=>$code,"price"=>$this->ToCur($price));
        }
        return $optionSelect;
    }
    public function packges(){
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

        require_once "db.php";
        $db = new db();
        $delete = mysqli_query($db->conn(),"DELETE FROM baste");
        foreach ($result as $rsArray){

                $code = $rsArray['code'];
                $name = $rsArray['name'];
                $price = $rsArray['credit'];
                $typpe = $rsArray['type_id'];
                $priod = $rsArray["period_id"];
                $operator = $rsArray["operator_id"];

                $select = mysqli_query($db->conn(),"INSERT INTO baste
                 (basteCode, basteName, bastePrice,basteType,bastePeriod,basteOperator) 
                 VALUE ('$code','$name','$price','$typpe','$priod','$operator')");

        }
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