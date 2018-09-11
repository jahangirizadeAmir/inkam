<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 9/10/18
 * Time: 8:33 PM
 */

echo'<br>';
echo'<br>';
echo'<br>';
echo'<br>';
echo'<br>';
echo'<br>';
echo'<br>';

include "inc/Fanava.php";
$fanava = new Fanava();
print_r($fanava->Back($_POST));
