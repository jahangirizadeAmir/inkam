<?php
/**
 * Copyright (c) 2017.
 * Artiash.com
 * IHIS Moraghebat Project
 * Abadan - aboshanak
 */

error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors", 1);
if (!function_exists('connection')) {
    function connection()
    {
        $conn = mysqli_connect('localhost', 'inkam', 'nYsqnY6RZq3kYwNT', 'inkam');
        mysqli_set_charset($conn, "utf8");
        ini_alter('date.timezone', 'Asia/Tehran');
        date_default_timezone_set('Asia/Tehran');
        return $conn;
    }
}
