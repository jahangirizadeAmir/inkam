<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 9/16/18
 * Time: 6:29 PM
 */
include "inc/db.php";
$conn = new db();
$time=$conn->time();
echo $time.'<br>';
$time = date('H:i:s',strtotime('+1 seconds',strtotime($time)));
echo $time;

