<?php

$server = 'localhost';
$user = 'carforme';
$pass = 'carforme';
$db_name = 'carforme';

$link = mysqli_connect($server, $user, $pass, $db_name);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($link, "SET NAMES 'utf8'");
$salt = 'dglkn349346$%dfh';
?>

