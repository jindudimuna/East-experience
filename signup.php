<?php
ini_set("session.save_path", "/home/unn_w22016721/sessionData");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'header.php';
?>

<?php
include './db.php';
$Fname = $Lname = $email = $mobile = $Username = $pwd = '';


 $errors = array('first-name' =>'', 'last-name' => '', 'email' =>'','username'=>'', 'phone' => '', 'Password' => '');

//check if signup has been clicked
if (isset($_POST['submit'])) {
     # code...

     // check firstname
     if (empty($_POST['first-name'])) {
          
          $errors['first-name'] = 'please enter your firstname<br>';
          // echo $errors['first-name'];

     } else {
          $Fname = $_POST['first-name'];

     }

//check if lastname is empty      
     if(empty($_POST['last-name'])){
          $errors['last-name'] = 'please enter your lastname <br>';
}else {

     $Lname = $_POST['last-name'];
}



//check if email is empty

if(empty($_POST['email'])){
     $errors['email'] = 'please enter a valid email<br>';
     } else{
          $email = $_POST['email'];
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors['email'] = 'please enter a valid email <br>';
     }else {

          $email = $_POST['email'];
     }

}
//check if username is empty
if (empty($_POST['username'])) {
     $errors['username'] = 'please enter a username <br>';
     } else{
     $Username = $_POST['username'];

     $sql = " SELECT userName FROM `SignUp` WHERE userName = '$Username' ";
     $result = mysqli_query($conn,$sql) or die("invalid query") ;
     if (mysqli_num_rows($result) > 0) {
     $errors['username'] = 'Username already exists<br>';

     } else {
     $Username = $_POST['username'];

     }
}

//check if phonenumber is empty 
if (empty($_POST['phone'])) {
     $errors['phone'] = "please enter a phone number with its country code<br>";  
}else{
     $mobile = $_POST['phone'];
     if (!preg_match('/^\\+?[1-9][0-9]{7,14}$/', $mobile)) {
          $errors['phone'] = 'please input your number in the right format <br>';
 }else {

           $mobile = $_POST['phone'];
 }
}

//check if password is empty
if (empty($_POST['Password'])) {
     $errors['Password'] = 'password cannot be empty';
} else{
     $pwd = $_POST['Password'];
     
if($pwd !== $_POST['confirm-password']){
     $errors['Password'] = 'Passwords do not match<br>';
     } else{
     $pwd = $_POST['confirm-password'];
}
}

if(!array_filter($errors)){
     $Fname = mysqli_real_escape_string($conn, $_POST['first-name']);
     $Lname = mysqli_real_escape_string($conn, $_POST['last-name']);
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $Username = mysqli_real_escape_string($conn, $_POST['username']);
     $mobile = mysqli_real_escape_string($conn, $_POST['phone']);
     $pwd = mysqli_real_escape_string($conn, $_POST['Password']);
  
  
     // createUser
       $sql = "INSERT INTO SignUp (usersFirstName, usersLastName, usersEmail, userName, usersPhone, usersPassword) VALUES(?, ?, ?, ?, ?, ?);";
       $stmt = mysqli_stmt_init($conn);
       if (mysqli_stmt_prepare($stmt, $sql)) {
           # code...
       }else {
           
           header('location: ./signup.php?error=stmtfailed'); 
           exit();
       }
      //  hashpassword
       $hashpassword = password_hash($pwd, PASSWORD_DEFAULT);
     //  bind parameters
       mysqli_stmt_bind_param($stmt, "ssssis", $Fname, $Lname, $email, $Username, $mobile, $hashpassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION['logged-in'] = true;
        if ($_SESSION['logged-in']) {
            # code...
            $_SESSION['username'] = $Username;
            // echo "session has been set";
            // echo $_SESSION['username'];
            header("location: index.php");
          
        }
       
       //  exit();
   

 } else{
//     header('location: ./signup.php'); 
}

}

?>
    <section class="create">

        <h1 class="account"> CREATE A NEW ACCOUNT</h1>

<!-- closing tag for create section -->
    </section>

    <!-- <div class="form-list"> -->

        <form class="signup-form" action="signup.php" method="POST">

            <div class="form-style">

           <div>
                <p class="title"> Firstname</p>
                <input type="text" name="first-name" class="field" value="<?php echo htmlspecialchars($Fname); ?>">
                <p class="red-text"><?php echo $errors['first-name']; ?></p>

           </div>

           <div>
                <p class="title"> Lastname</p>
                <input type="text" name="last-name" class="field"value="<?php echo htmlspecialchars($Lname); ?>">
                <p class="red-text"><?php echo $errors['last-name']; ?></p> 
               
               </div>

               <div>
            <p class="title"> Email</p>
            <input type="email" name="email" class="field" placeholder="example@email.com" value="<?php echo htmlspecialchars($email); ?>" >
            <p class="red-text"><?php echo $errors['email']; ?></p>

               </div>
 

       <div>
          <p class="title"> Username</p>
          <input type="text" name="username" class="field" placeholder="username" value="<?php echo htmlspecialchars($Username); ?>">
          <p class="red-text"><?php echo $errors['username']; ?></p>
     </div>

    

       <div>
            <p class="title"> Mobile phone</p>
            <input type="tel" name="phone" class="field" placeholder="+12 345 6789" value="<?php echo htmlspecialchars($mobile); ?>">
            <p class="red-text"><?php echo $errors['phone']; ?></p>

       </div>

       <div>
        <p class="title"> Password</p>
        <input type="password" name="Password" class="field" value="<?php echo htmlspecialchars($pwd); ?>">
        <p class="red-text"><?php echo $errors['Password']; ?></p>  

   </div>

   <div>
        <p class="title"> Confirm Password</p>
        <input type="password" name="confirm-password" class="field" >
   </div>

<!--    
   <div>
           </div> -->
       
           

   <!-- closing tag for form-style -->
  </div>

        <!-- </div> -->
        
       <hr class="line">


       <div class="clause-section">
       
              <p class="clause">By sigining in or creating an account, you agree to our 
                 <a href="#">terms and conditions </a> and <a href="#"> privacy statement</a>. </p>
            <!--closing tag for clause-section  -->
            </div>
          <div class="submit">
               <input type="submit" value="SIGN UP" class="btn" name="submit">
               <!-- closing tag for submit -->
          </div>
        </form>
    
   
        <?php
          include 'footer.php';
        ?>