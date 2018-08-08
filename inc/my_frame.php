<?php

/**
 * Copyright (c) 2017.
 * Artiash.com
 * IHIS Moraghebat Project
 * Abadan - aboshanak
 */

function endfile($conn){
    mysqli_close($conn);
    exit(0);
    return;
}


function generate_id()
{
    $now  =  new DateTime();
    ini_alter('date.timezone','Asia/Tehran');
    $now  = $now->format('YmdHis');
    $microtime = microtime();
    $id      = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime);
    $id      = substr($id,11,1);
    $random  = (rand(10000,99999));
    $va_id   = $now.$id.$random;
    return $va_id;
}


function generateRandomString($length = 20){ //FUNCTION FOR generate RAND VAR
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function humanTiming($time)
{
    $time = time() - $time; // to get the time since that moment
    $tokens = array (31536000 => ' سال',
        2592000 => 'ماه',
        604800 => ' هفته',
        86400 => ' روز',
        3600 => ' ساعت',
        60 => ' دقیقه',
        1 => 'ثانیه');
    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.$text;
    }
}



function _date()
{
    ini_alter('date.timezone','Asia/Tehran');
    $now = new DateTime();
    $va_date = $now->format('Y-m-d');
    return $va_date;
}


function _time()
{
    ini_alter('date.timezone','Asia/Tehran');
    $now = new DateTime();
    $va_time = $now->format('H:i:s');
    return $va_time;
}


function toMoney($val,$symbol=' ',$r=0)
{
    $n = $val;
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r);
    $j = (($j = strlen($i)) > 3) ? $j % 3 : 0;
    return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j));
}


function passwordHash($password){
    $va_password=strtolower($password);
    $va_password = hash("SHA512",$va_password);
    $va_password = hash("SHA512",$va_password);
    $va_password = hash("SHA512",$va_password);
    return $va_password;
}


function saveImage($base64img,$url,$name){
    
}


function savecover($base64img,$url,$name){
    define('UPLOAD_DIR1',$url);
    $base64img = str_replace('data:image/jpeg;base64,', '', $base64img);
    $data = base64_decode($base64img);
    $file = UPLOAD_DIR1 .$name.'.jpg';
    file_put_contents($file, $data);
}




function size($bytes)
{
    if ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . 'گیگابایت';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' مگابایت';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' کیلوبایت';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' کیلوبایت';
    }
    else
    {
        $bytes = '0 کیلوبایت';
    }
    return $bytes;
}




function get_extension($file_name){
    $ext = explode('.', $file_name);
    $ext = array_pop($ext);
    return strtolower($ext);
}



function get_domain($url)
{
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
        return $regs['domain'];
    }
    return false;
}



function curPageURL() {
    $pageURL = 'http';
    if(isset($_SERVER["HTTPS"]))
        if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}


function CheckMeli($code=''){
    $code = (string) preg_replace('/[^0-9]/','',$code);
    if(strlen($code)>10 or strlen($code)<8)
        return false;
    if(strlen($code)==8)
        $code = "00".$code;
    if(strlen($code)==9)
        $code = "0".$code;
    $list_code = str_split($code);
    $last = (int) $list_code[9];
    unset($list_code[9]);
    $i = 10;
    $sum = 0;
    foreach($list_code as $key=>$_)
    {
        $sum += intval($_) * $i;
        $i--;
    }
    $mod =(int) $sum % 11;
    if($mod >= 2)
        $mod = 11 - $mod;
    return $mod == $last;
}


function jalali($date){
    $year1 = substr($date,0,4);
    $month1 = substr($date,5,2);
    $day1 = substr($date,8,2);
    include_once ('jdf.php');
    $jalalidate = gregorian_to_jalali($year1,$month1,$day1,'/');
    return $jalalidate;
}


function checktime($start,$end){
    $ceck_start = strtotime($start);
    $check_end = strtotime($end);
    if( $ceck_start > $check_end ){
        return false;
    }else if ($ceck_start == $check_end ){
        return false;
    }else{
        return true;
    }
}


function gregory($date){
    $year1 = substr($date,0,4);
    $month1 = substr($date,5,2);
    $day1 = substr($date,8,2);
    include_once ('jdf.php');
    $gery = jalali_to_gregorian($year1,$month1,$day1,'-');
    return $gery;
}


function check_login($type,$user_name,$password,$IMEI){
    include "conn.php";
    $fo = connection();
    if($type=='health_workers'){
        $check_query = mysqli_query($fo,"SELECT health_workers_id FROM health_workers WHERE health_workers_email='$user_name' AND health_workers_password='$password' AND health_workers.health_workers_IMEI='$IMEI'");
        if (mysqli_num_rows($check_query)==1){
            return true;
        }else{
            $call['result'] ='true';
            $call['login'] ='false';
            $call['data'] = array('error'=>'false','MSG'=>'null');
            echo json_encode($call);
            return false;
        }
    }
    elseif ($type=='doctor'){
        $check_query = mysqli_query($fo, "SELECT doctor.doctor_id FROM doctor
        WHERE doctor_user_name='$user_name' AND
         doctor_password='$password' AND doctor_IMEI='$IMEI'");
        IF (mysqli_num_rows($check_query) == 1) {
            return true;
        }else{
            $call['result'] ='true';
            $call['login'] ='false';
            $call['data'] = array('error'=>'false','MSG'=>'null');
            echo json_encode($call);
            return false;
        }
    }elseif($type=='midwife'){
        $check_query = mysqli_query($fo,"SELECT midwife.midwife_id FROM midwife
        WHERE midwife_username='$user_name' AND
         midwife_password='$password' AND midwife_IMEI='$IMEI'");
        IF (mysqli_num_rows($check_query) == 1) {
            return true;
        }else{
            $call['result'] ='true';
            $call['login'] ='false';
            $call['data'] = array('error'=>'false','MSG'=>'null');
            echo json_encode($call);
            return false;
        }
    }else{
        $call['result'] ='true';
        $call['login'] ='false';
        $call['data'] = array('error'=>'false','MSG'=>'null');
        echo json_encode($call);
        return false;
    }
}


function follow_date($value){
    switch ($value){
        case '1':
            return '6 تا 10';
            break;
        case '2':
            return '11 تا 15';
            break;
        case '3':
            return '16 تا 20';
            break;
        case '4':
            return '21 تا 23';
            break;
        case '5':
            return '24 تا 30';
            break;
        case '6':
            return '31 تا 34';
            break;
        case '7':
            return '35 تا 37';
            break;
        case '8':
            return '38';
            break;
        case '9':
            return '39';
            break;
        case '10':
            return '40';
            break;
        case '11':
            return '41';
            break;
    }
}



function follow_not_wok($value)
{
    switch ($value){
        case '1':
            return '10,22,23,32,33,34,35,36,38,39';
            break;
        case '2':
            return '10,22,23,32,33,34,35,38,39';
            break;
        case '3':
            return '10,32,35,36';
            break;
        case '4':
            return '10,32,35,36';
            break;
        case '5':
            return '12,32,35,36';
            break;
        case '6':
            return '12,27,32,35,36';
            break;
        case '7':
            return '27';
            break;
        case '8':
            return '27,34,36';
            break;
        case '9':
            return '12,27,34,36';
            break;
        case '10':
            return '12,27,34,36';
            break;
        case '11':
            return '27,34,36';
            break;
    }
}



function end_follow_not_work($value){
    switch ($value){
        case '1':
            return '6,32';
            break;
        case '2':
            return '6,32,50';
            break;
        case '3':
            return '1,2,3,34,50';
            break;
    }
}

function midwife_reference_add($health_id,$user_id,$doc_id,$data_text,$date_max){
    include 'conn.php';
    $foo = connection();
    $date = _date();
    $midwife_id = generate_id();
    $midwife_reference = mysqli_query($foo,"INSERT INTO 
                              midwife_reference (midwife_reference_id, midwife_reference_health_workers_id,
                               midwife_reference_reg_date, midwife_reference_max_date, midwife_reference_midwife_id,
                                midwife_reference_status, midwife_reference_user_id, midwife_reference_doc_id,
                                 midwife_reference_for, midwife_reference_text) 
                              VALUES ('$midwife_id','$health_id','$date','$date_max','','0'
                              ,'$user_id','$doc_id','$data_text','')");

}

function get_string_between($string, $start, $end){
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}



function diff_in_weeks_and_days($from, $to) {
    $day   = 24 * 3600;
    $from  = strtotime($from);
    $to    = strtotime($to) + $day;
    $diff  = abs($to - $from);
    $weeks = floor($diff / $day / 7);
    $days  = $diff / $day - $weeks * 7;
    $out   = array();
    if ($weeks) $out[] = "$weeks" . ($weeks > 1 ? 's' : '');
    return implode(', ', $out);
}

function smsForati($mobile,$text){
    ini_set("soap.wsdl_cache_enabled", "0");
    $sms_client = new SoapClient('http://payamak-service.ir/SendService.svc?wsdl', array('encoding'=>'UTF-8'));

    try {
        $parameters['userName'] = "s.forati";
        $parameters['password'] = "4815162342";
        $parameters['fromNumber'] = "10003201";
        $parameters['toNumbers'] = array("$mobile");
        $parameters['messageContent'] = "$text";
        $parameters['isFlash'] = false;
        $recId = array();
        $status = array();
        $parameters['recId'] = &$recId ;
        $parameters['status'] = &$status ;


        return $sms_client->SendSMS($parameters)->SendSMSResult;
    }
    catch (Exception $e)
    {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

