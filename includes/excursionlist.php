
<?php
include './db.php';

$sql = " SELECT *  FROM `excursions` ";
$result = mysqli_query($conn,$sql) or die("invalid query") ;

while($row = mysqli_fetch_assoc($result)){
    $title = $row['excursion_name'];
    $details = $row['description'];
    $fee;
   
}


// $sql = " SELECT `excursion_name`, `description`, `price_per_person`, `location` FROM `excursions` WHERE `excursionID` = 1";
// $result = mysqli_query($conn,$sql) or die("invalid query") ;

// $excursionName = $description = $price = $location = array();
// while($row = mysqli_fetch_assoc($result)){
//     $excursionName[] = $row['excursion_name'];
//     $description[] = $row['description'];
//     $price[] = $row['price_per_person'];
//     $location[] = $row['location'];
// }

//         $title = $excursionName[0];
//         $details = $description[0];
//         $fee = $price[0];
//         $address = $location[0];




// //second query
//         $sql = " SELECT `excursion_name`, `description`, `price_per_person`, `location` FROM `excursions` WHERE `excursionID` = 2";
//         $result = mysqli_query($conn,$sql) or die("invalid query") ;


            
//             $excursionName = $description = $price = $location = array();
//             while($row = mysqli_fetch_assoc($result)){
//             $excursionName2[] = $row['excursion_name'];
//             $description2[] = $row['description'];
//             $price2[] = $row['price_per_person'];
//             $location2[] = $row['location'];

// }
                        
//                 $title2 = $excursionName2[0];
//                 $details2 = $description2[0];
//                 $fee2 = $price2[0];
//                 $address2 = $location2[0];

// //third query

// $sql = " SELECT `excursion_name`, `description`, `price_per_person`, `location` FROM `excursions` WHERE `excursionID` = 3";
// $result = mysqli_query($conn,$sql) or die("invalid query") ;


    
//     $excursionName = $description = $price = $location = array();
//     while($row = mysqli_fetch_assoc($result)){
//     $excursionName3[] = $row['excursion_name'];
//     $description3[] = $row['description'];
//     $price3[] = $row['price_per_person'];
//     $location3[] = $row['location'];

// }
                
//         $title3 = $excursionName3[0];
//         $details3 = $description3[0];
//         $fee3 = $price3[0];
//         $address3 = $location3[0];


?>