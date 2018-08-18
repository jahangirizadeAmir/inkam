<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/18/18
 * Time: 1:39 PM
 */
include "inc/sharj.php";
$sharj = new sharj();
$a = $sharj->topup("10000","09369124331","false","mci");
print_r($a);