<?php 

ini_set("session.save_path", "/home/unn_w22016721/sessionData");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    session_unset();
    session_destroy();


}

header('location: ./index.php'); 
