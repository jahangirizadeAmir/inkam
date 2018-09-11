<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/18/18
 * Time: 1:39 PM
 */
include "inc/sharj.php";
$sharj = new sharj();
$a = $sharj->topup("5000","09355353551","ir");
print_r($a);


