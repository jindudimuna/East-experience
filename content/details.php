<?php
include 'header.php';
if (!isset($_SESSION['logged-in']))
{
    header("Location: redirect.php");
    die();
}

include 'db.php';
//check if the confirm button was clicked
//next fetch the data passed to the url

if (isset($_REQUEST['CONFIRM'])) {



    $Name = $_REQUEST['first-name'] ;
    $SurName = $_REQUEST['last-name'];
    $date = $_REQUEST['date'];
    $excursion = $_REQUEST['excursionsname'];
    $ticketNum = $_REQUEST['ticket'];
    $cost = $_REQUEST['excursionprice'];
    $comments = $_REQUEST['notes'];

    $price = $ticketNum * $cost;

    //query the database to select the database that matches the string $excursion.

    $sql = "SELECT excursionID FROM `excursions` WHERE excursion_name = '$excursion'";
    $result = mysqli_query($conn, $sql) or die("invalid query");
    if ($row = mysqli_fetch_assoc($result)) {
        $excursionID = $row['excursionID'];
    }
// query the database to select the database that matches the string $name.

    $sql = "SELECT `UserID` FROM `SignUp` WHERE `UsersFirstName` = '$Name'";
    $result = mysqli_query($conn, $sql) or die("invalid query");

    if ($row = mysqli_fetch_assoc($result)) {
        $customerID = $row['UserID'];
    }

    //prepare an sql query to insert variables using prepared statements
    $sql = "INSERT INTO `booking`( `excursionID`, `customerID`, `excursion_date`, `num_guests`, `total_booking_cost`, `booking_notes`) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "iissis", $excursionID, $customerID, $date, $ticketNum, $price, $comments );      

        if (!mysqli_stmt_execute($stmt)) {
            echo "ERROOOORRRRRR";
        }
        mysqli_stmt_close($stmt);
   

    }    
}
?>
    <h1 class="details-message">HERE ARE YOUR EXCURSION DETAILS</h1>

    <div class="details-list">
        <p class="details"> NAME: </p>
        <p class="details-info"><?php echo $Name." $SurName" ; ?></p>
        <p class="details"> DATE </p>
        <p class="details-info"><?php echo $date; ?></p>
        <p class="details"> EXCURSION </p>
        <p class="details-info"><?php echo $excursion ; ?></p>
        <p class="details">NUMBER OF TICKETS </p>
        <p class="details-info"><?php echo $ticketNum ; ?></p>
        <p class="details">PRICE</p>
        <p class="details-info"><?php echo "£". $price ; ?></p>
        <p class="details">COMMENTS </p>
        <p class="details-info"><?php echo $comments ; ?></p>


        <input type="button" value="Confirm booking" class="btn" name="button"  onclick='location.href= "index.php"'>
    </div>

    <?php
include 'footer.php';
?>