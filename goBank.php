<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/19/18
 * Time: 3:21 AM
 */
if(isset($_GET['price'])){
    include "inc/db.php";
    include "inc/melatBank.php";
    $db = new db();
    $bank = new MellatBank();
    $price = $db->real($_GET['price']);
    $bank->startPayment($price,"http://google.com");
}