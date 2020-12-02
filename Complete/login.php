<!DOCTYPE html>
<html>
<head>
	<title>Login Student</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
<div class="header">
    <nav id="navbar">
      <div id="logo">
          <img src="Logo.png" alt="VESIT">
      </div>
      <h3>
        VesRepo
      </h3>     
    </nav>
  </div>
  <div class="container_body">
  <div class="cont">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form sign-in">
        <h2>Sign In</h2>
        <label>
            <span>Email Address</span>
            <input type="email" name="email">
        </label>
        <label>
            <span>Password</span>
            <input type="password" name="password">
        </label>
        <button class="submit" type="submit" name="login">Sign In</button>
        <!-- <p class="forgot-pass">Forgot Password ?</p> -->
        </div>
    </form>

    <?php session_start();
    $_SESSION["loggedin"]=TRUE;

        if(isset($_POST['login'])){

            include "config.php";
            $email = $_POST['email'];
            $password = sha1($_POST['password']);

            $sql = "SELECT * FROM user WHERE ves_email = '{$email}' AND password = '{$password}'";
          
            $result = mysqli_query($conn, $sql) or die("Query Falied");	          
              
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result)){
                  
                    $_SESSION["id"] = $row['user_id'];
                    $_SESSION["email"] = $row['ves_email'];
                    $_SESSION["username"]= $row['first_name'];
                    $_SESSION["branch"]= $row['branch'];
                    $_SESSION["year"]= $row['year'];


                }
                header("Location: profile.php");


                //  $_SESSION["username"]= $row['first_name']
            }
            else{
                echo "Enter correct user name or password";
            }


        }

    ?>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover great amount of new opportunities!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
        <button onclick="location.href='registration.php'" type="button" class="submit">Register As Student</button>
        <button type="button" class="submit">Register As Admin</button>
      </div>
    </div>
  </div>

<script type="text/javascript" src="login.js"></script> 
      </div>
</body> 
</html>