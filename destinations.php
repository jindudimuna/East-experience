<?php
include 'header.php';

// include './includes/excursionlist.php';
?>

    <div class="hero-3">
        <div class="hero-text-3">
            <h1 class="hero-welcome-3">DESTINATIONS</h1>
<!-- closing tag for hero-text-3 -->
        </div>
   
        </div>

    <?php 

include './db.php';

$sql = " SELECT *  FROM `excursions` ";
$result = mysqli_query($conn,$sql) or die("invalid query") ;
if ($result){
while($row = mysqli_fetch_assoc($result)){
        $title = $row['excursion_name'];
        $details = $row['description'];
            $pic = $row['Image'];
        $fee = $row['price_per_person'];
        $location = $row['location'];


        echo "<div class ='excursion-list'> ";
        echo " <img src='$pic' class='banners2' alt='Destination image in japan' />";

  echo      "<ul class='excursion-elements'>";
         echo   "<li class= 'description'><a class = 'excursion' href='#'>  $title </a></li>";
          echo  "<li class= 'description'> $details </li>";
        echo "</ul>";
     echo "  </div> ";

   
}
}
?>

<?php
include 'footer.php';
?>