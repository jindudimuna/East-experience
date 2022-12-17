<?php
ini_set("session.save_path", "/home/unn_w22016721/sessionData");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
<!-- css -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Google fonts -->
 
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,500&display=swap" rel="stylesheet">      
      <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">

    </head>
<body>

    <header>

        <nav class="nav-bar">
            <div class="logo">
                <h1 ><a class="Company" href="index.html">East Experience</a></h1>
                <!-- closing tag for Company -->
            </div>
        
        
           
                <ul class="nav-items">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="Design-Notes.pdf" target="_blank">Wireframes</a></li>
                    <li><a href="CREDITS.pdf">Credits</a></li>
                    <li><a href="destinations.php">Destination</a></li>
                    <?php 

                        if (isset($_SESSION['logged-in'])) {
                            # code...
                            echo "<li><a href='book.php'>Book</a></li>";
                            echo " <li><a href='logout.php'>Log out</a></li>";
                        } else{
                            echo "<li><a href='signup.php'>Sign up</a></li>";
                            echo " <li><a href='login.php'>Log in</a></li>";
                        }

                    ?>
                    <!-- <li><a href='signup.php'>Signup</a></li>
                    <li><a href="login.php">login</a></li> -->
                    <!-- <li><a href="details.html"><Details></Details></a></li> -->

                </ul>
        
        
        <!-- closing tag for nav section -->
        </nav>
            </header>
