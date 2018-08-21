<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/18/18
 * Time: 12:13 PM
 */

class db
{
    private $db_name="inkam";
    private $db_password="nYsqnY6RZq3kYwNT";
    private $db_userName="inkam";
    public function conn(){
        ini_alter('date.timezone','Asia/Tehran');
        date_default_timezone_set("Asia/Tehran");
        $conn = mysqli_connect('localhost',$this->db_userName,$this->db_password,$this->db_name);
        mysqli_set_charset($conn, "utf8");
        ini_alter('date.timezone','Asia/Tehran');
        date_default_timezone_set('Asia/Tehran');
        return $conn;
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
    function real($str){
        $real = mysqli_real_escape_string($this->conn(),$str);
        return $real;
    }
    function date(){
        ini_alter('date.timezone','Asia/Tehran');
        $now = new DateTime();
        $va_date = $now->format('Y-m-d');
        return $va_date;
    }
    function time(){
        ini_alter('date.timezone','Asia/Tehran');
        $now = new DateTime();
        $va_time = $now->format('H:i:s');
        return $va_time;
    }
    function jalali($date){
        $year1 = substr($date,0,4);
        $month1 = substr($date,5,2);
        $day1 = substr($date,8,2);
        include_once ('jdf.php');
        $jalalidate = gregorian_to_jalali($year1,$month1,$day1,'/');
        return $jalalidate;
    }
}