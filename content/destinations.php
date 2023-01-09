<?php
    include 'header.php';
if (!isset($_SESSION['logged-in']))
{
    header("Location: redirect.php");
    die();
}

?>

    <div class="hero-3">
        <div class="hero-text-3">
            <h1 class="hero-welcome-3">DESTINATIONS <i class="fa-solid fa-arrow-down"></i></h1>
<!-- closing tag for hero-text-3 -->
        </div>
   
        </div>

    <?php 

include './db.php';

// fetch every thing from the excursions table and then loop over it to create a loop and assign the items to variables

$sql = " SELECT *  FROM `excursions` ";
$result = mysqli_query($conn,$sql) or die("invalid query") ;
if ($result){
while($row = mysqli_fetch_assoc($result)){
        $title = $row['excursion_name'];
        $details = $row['description'];
            $pic = $row['Image'];
        $fee = $row['price_per_person'];
        $location = $row['location'];
            $alt = $row['ALT'];


        echo "<div class ='excursion-list'> ";
        echo " <img src='$pic' class='banners2' alt='$alt' />";

  echo      "<ul class='excursion-elements'>";
         echo   "<li class= 'description'>  $title </li>";
          echo  "<li class= 'description2'> <a class = 'excursion' href=\"view.php?title=$title&details=$details&price=$fee&photo=$pic&venue=$location\">View More</a></li>";
        echo "</ul>";
     echo "  </div> ";

   
}
}
?>

<?php
include 'footer.php';
?>