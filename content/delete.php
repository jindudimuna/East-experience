<?php 

    require_once 'db.php';

$booking = $_REQUEST['booking'];

    $sql = "DELETE FROM `booking` WHERE `bookingID` = '$booking'";
    $result = mysqli_query($conn,$sql) or die("invalid query") ;

header('location: Manage.php ');