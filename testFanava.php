<?php
print_r($_POST);

include "inc/Fanava.php";
$fanava = new Fanava();

$fanava->SendRequest(2000);

?>