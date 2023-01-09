<?php 


$servername ="localhost";
$dBusername ="unn_w22016721";
$dbPassword= "Prodr3amer";
$dbName = "unn_w22016721";

$conn = mysqli_connect($servername, $dBusername, $dbPassword, $dbName);

if(!$conn){
    die('connection failed : . mysqli_connect_error()');
} 