<?php
include 'header.php';

if (!isset($_SESSION['logged-in']))
{
    header("Location: redirect.php");
    die();
}

$userID = $_SESSION['userID'];
include 'db.php';

$sql = "SELECT excursions.excursion_name, booking.excursion_date, booking.num_guests, booking.bookingID FROM excursions INNER JOIN booking ON booking.excursionID = excursions.excursionID WHERE customerID =$userID";
$result = mysqli_query($conn,$sql) or die("invalid query") ;
if ($result){
while ($row = mysqli_fetch_assoc($result)) {
    $excName = $row['excursion_name'];
    $excDate = $row['excursion_date'];
    $guests = $row['num_guests'];
    $bookingID = $row['bookingID'];

    echo "<table class ='booking-table'>" ;
	echo "<caption class= 'account'>Here are your bookings</caption>" ;
	echo "<thead>" ;
	echo "<tr>" ;
	echo "<th>Excursion</th>" ;
	echo "<th>Date</th>";
	echo "<th>Number of Tickets</th>";
    echo "<th></th>";
	echo "</thead>";
	echo "<tbody>";
	echo "<tr>";
    echo "<td><p class='location'>$excName</P></td>";
    echo "<td><p class='location'>$excDate</p></td>";
    echo "<td><p class='location'>$guests</p></td>";
    echo "<td><button type='button'class='btn' name='Delete' onclick='location.href= \"delete.php?booking=$bookingID\"'>Delete</button></td>";
	echo "</tr>";

	echo "</tbody>";
    echo "</table>";
}

}

?>

