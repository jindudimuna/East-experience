<?php
ini_set("session.save_path", "/home/unn_w22016721/sessionData");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'header.php';
?>
<?php 

include "db.php";


$Username = $pwd = '';
$errors = array('wrong' => '',);

//check if submit was clicked
if (isset($_POST["submit"])) {

    //check if username is empty
    if (empty($_POST['username'])) {
        $errors['username'] = 'Please enter a username <br>';
        } else{
            $Username = $_POST["username"];
   
            //query the database to look for the login string that was entered
        $sql = " SELECT userName, UserID FROM `SignUp` WHERE userName ='$Username'";
        $result = mysqli_query($conn,$sql) or die("invalid query") ;
            if($row = mysqli_fetch_assoc($result)){
                $userID = $row['UserID'];
            }
    //check if it appears once
        if (mysqli_num_rows($result) == 1 ) {
            $Username = $_POST["username"];
        } else {
            $errors['wrong'] = 'username or password incorrect <br>';
 
        }
   }


   //check if password is empty and fetch the usershashed password

    if (empty($_POST['Password'])) {
        $errors['Password'] = 'Password cannot be empty';
    } else {
        $pwd = $_POST["Password"];
        $sql = "SELECT UsersPassword FROM `SignUp` WHERE UserName = '$Username'";
        $result = mysqli_query($conn, $sql) or die("invalid query");
        $hashedpwd = mysqli_fetch_assoc($result)['UsersPassword'];

//compare the passwords
        $checkpwd = password_verify($pwd, $hashedpwd);

  

        if ($checkpwd) {
            # code...
            $pwd = $_POST["Password"];
        }else{
            $errors['wrong'] = 'username or password incorrect <br>';

        }
    }



    if (!array_filter($errors)) {

        $Username = mysqli_real_escape_string($conn, $_POST['username']);
        $pwd = mysqli_real_escape_string($conn, $_POST['Password']);
        $_SESSION['logged-in'] = true;
        if ($_SESSION['logged-in']) {
            # code...
            $_SESSION['username'] = $Username;
            $_SESSION['userID'] = $userID;

            // echo "session has beenet";
            // echo $_SESSION['username'];
            header("location: index.php");
          
        }
       

    }
}
?>

    <section class="create">

        <h1 class="account"> LOGIN</h1>

<!-- closing tag for create section -->
    </section>

        <form class="signup-form" action="login.php" method="POST">

            <div class="login-form">

                <div>
                    <p class="title"> Username</p>
                    <input type="text" name="username" class="field" value="<?php echo htmlspecialchars($Username); ?>">
               </div>
        
               <div>
                <p class="title"> Password</p>
                <input type="password" name="Password" class="field" value="<?php echo htmlspecialchars($pwd); ?>">

           </div>
</div>
  <p class="red-text"><?php echo $errors['wrong'] ?></p>

<div class="submit">
    <input type="submit" value="LOGIN" class="btn" name= "submit">
    <!-- closing tag for submit -->
</div>
</form>
<?php
include 'footer.php';
?>