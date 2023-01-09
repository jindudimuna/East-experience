<?php
include 'header.php';

if (!isset($_SESSION['logged-in']))
{
    header("Location: redirect.php");
    die();
}

// get the excursion name and price from the for
$excursion = $_REQUEST['title'];
$fee = $_REQUEST['price'];


include 'db.php';
//fetch the session variable
$user = $_SESSION['username'];


//make a query to the database to find the customer details for the logged in username
$sql = " SELECT UsersFirstName, UsersLastName, UsersEmail, UsersPhone FROM `SignUp` WHERE userName = '$user' ";
$result = mysqli_query($conn,$sql) or die("invalid query") ;
while ($row = mysqli_fetch_assoc($result)){
    $Firstname = $row['UsersFirstName'];
    $Lastname = $row['UsersLastName'];
    $EmailAdd = $row['UsersEmail'];
    $Tel = $row['UsersPhone'];
}
?>

    <div class="hero-4">
        <div class="hero-text-4">
            <h1 class="hero-welcome-4">BOOK NOW IN A FEW STEPS <i class="fa-solid fa-arrow-down"></i></h1>
<!-- closing tag for hero-text-3 -->
        </div>

    </div>

   

    <form class="signup-form" action="details.php" >

        <div class="form-style">

       <div>
            <p class="title"> Firstname</p>
            <input type="text" name="first-name" class="field" readonly value="<?php echo $Firstname;?>" >
       </div>

       <div>
            <p class="title"> Lastname</p>
            <input type="text" name="last-name" class="field"  value="<?php echo $Lastname;?> " readonly>
       </div>

       
       <div>
        <p class="title"> Email</p>
        <input type="email" name="email" class="field" placeholder="example@email.com" value="<?php echo $EmailAdd;?> "readonly>
   </div>


   <div>
        <p class="title"> Mobile phone</p>
        <input type="tel" name="phone" class="field" placeholder="+12 345 6789" value="<?php echo $Tel;?>">
   </div>

   <div>
    <p class="title"> Date</p>
    <input type="date" name="date" class="field" min="<?php echo date("Y-m-d") ?>" required >
</div>

<div>
    <p class="title">Excursion</p>
      <input type="text" name="excursion" class="field"  value="<?php echo $excursion;?> "readonly>

</div>


<div class="tickets">
    <p class="title">Number of tickets</p>
   <input type="number" name="ticket" value="1" min="1" max="10">
    <!-- closing tag for tickets div -->
</div>
<div>
<textarea name="notes" placeholder="comments.." class="text-area"></textarea>
</div>
<!-- closing tag for form-style -->
    </div>
    
    <div class="submit">
        <input type="hidden" name="excursionsname" value="<?php echo $excursion; ?>">
        <input type="hidden" name="excursionprice" value="<?php echo $fee; ?>">

        
     <input type='submit'name='CONFIRM' class='btn' accesskey="Enter"></input>

        
        <!-- closing tag for submit -->
   </div>
    </form>
    <?php
include 'footer.php';
?>