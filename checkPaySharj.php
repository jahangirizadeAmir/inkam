<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 9/11/18
 * Time: 8:25 PM
 */
require "inc/melatBank.php";
require "inc/sharj.php";
require "inc/PaySharj.php";
require "inc/db.php";
$sharj = new sharj();
$conn = new db();
$payCharge = new PaySharj(2,1);
$payCharge->SharjAndBaste(1000,"20180831054058786641");

$price=1000;
$percentUser='0.5';
$agent = '1.5';
$percent = (float)($price/100) * (float) $percentUser;
$lastPercent = round($percent,0,PHP_ROUND_HALF_DOWN);
echo $lastPercent;
echo '<br>';
$percent = (float)($price/100) * (float) $agent;
$lastPercent = round($percent,0,PHP_ROUND_HALF_DOWN);
echo $lastPercent;


