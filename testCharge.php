<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/18/18
 * Time: 1:39 PM
 */
//include "inc/sharj.php";
//$sharj = new sharj();
////$a = $sharj->topup("1000","09350613201","ir");
//$a = $sharj->pin("2","10000");
//print_r($a);

//include "inc/melatBank.php";
//$melat = new MellatBank();
//$melat->startPayment(3000, "http://google.com");

include "inc/sharj.php";
$sharj = new sharj();
$a = $sharj->packges("Weekly","1","1");
print_r($a);

