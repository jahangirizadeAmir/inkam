<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/18/18
 * Time: 1:39 PM
 */
include "inc/sharj.php";
$sharj = new sharj();
$a = $sharj->pin("1","10000");
print_r($a);