<?php
include 'header.php';
if (!isset($_SESSION['logged-in']))
{
    header("Location: redirect.php");
    die();
}

//request the data from the url and pass them to variables and pass the subject and cost to the url

$image = $_REQUEST['photo'];
$subject = $_REQUEST['title'];
$info = $_REQUEST['details'];
$site = $_REQUEST['venue'];
$cost = $_REQUEST['price'];



?>

<div class ='excursion-list'>
 <img src='<?php echo $image; ?>' class='banners2' alt='Destination image in japan' />

        <ul class='excursion-elements'>
            <li class= 'description'>  <?php echo $subject;?> </li>
            <li class= 'description2'> <?php echo $info;?></li>
            <span><p class="venue"><?php echo"Price : £". $cost; ?></p> <i class="fa-solid fa-location-crosshairs"></i><p class="venue"><?php echo $site;?></p> </span>
            <?php
            echo "<button type='button'class='btn' onclick='location.href= \"book.php?title=$subject&price=$cost\"'>BOOK NOW</button>";
            ?>
        </ul>
        </div> 
