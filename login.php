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
$errors = array('username' => '', 'Password' => '');


if (isset($_POST["submit"])) {

    if (empty($_POST['username'])) {
        $errors['username'] = 'Please enter a username <br>';
        } else{
            $Username = $_POST["username"];
   
        $sql = " SELECT userName FROM `SignUp` WHERE userName ='$Username'";
        $result = mysqli_query($conn,$sql) or die("invalid query") ;
    //   die(mysqli_fetch_assoc($result)['userName']);
        if (mysqli_num_rows($result) == 1 ) {
            $Username = $_POST["username"];
        } else {
            $errors['username'] = 'incorrect username <br>';
 
        }
   }

    if (empty($_POST['Password'])) {
        $errors['Password'] = 'Password cannot be empty';
    } else {
        $pwd = $_POST["Password"];
        $sql = "SELECT UsersPassword FROM `SignUp` WHERE UserName = '$Username'";
        $result = mysqli_query($conn, $sql) or die("invalid query");
        $hashedpwd = mysqli_fetch_assoc($result)['UsersPassword'];


        $checkpwd = password_verify($pwd, $hashedpwd);

        // if(mysqli_num_rows($result) == 1){
        //     $hashpassword;
        // } else {
        //     $errors['Password'] = 'Incorrect Password';
        // }

        if ($checkpwd) {
            # code...
            $pwd = $_POST["Password"];
        }else{
            $errors['Password'] = 'Incorrect Password';

        }
    }



    if (!array_filter($errors)) {

        $Username = mysqli_real_escape_string($conn, $_POST['username']);
        $pwd = mysqli_real_escape_string($conn, $_POST['Password']);
        $_SESSION['logged-in'] = true;
        if ($_SESSION['logged-in']) {
            # code...
            $_SESSION['username'] = $Username;
            // echo "session has been set";
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
                    <p class="red-text"><?php echo $errors['username'] ?></p>
               </div>
        
               <div>
                <p class="title"> Password</p>
                <input type="password" name="Password" class="field" value="<?php echo htmlspecialchars($pwd); ?>">
                <p class="red-text"><?php echo $errors['Password'] ?></p>

           </div>
</div>
<div class="submit">
    <input type="submit" value="LOGIN" class="btn" name= "submit">
    <!-- closing tag for submit -->
</div>
</form>
<?php
include 'footer.php';
?>