<!DOCTYPE html>
<html>
<head>
	<title>Login Student</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
  <link rel="stylesheet" href="footer.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
<div class="header">
    <nav id="navbar">
      <div class="left-side">
        <div id="logo">
          <img src="Logo.png" alt="VESIT">
        </div>
        <div class="vl"></div>
        <h1>
          VesRepo
        </h1>
      </div>
      
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
        <!-- <button type="button" class="submit">Register As Admin</button> -->
      </div>
    </div>
  </div>

<script type="text/javascript" src="login.js"></script> 
      </div>


      <footer>
        <div class="footer">
          <div class="box">
            <h2>About us</h2>
            <p>Vivekanand Education Society’s Institute of Technology (VESIT) was established in 1984, with the aim of providing professional education in the field of Engineering.</p>

            <p>This institute is affiliated to the University of Mumbai and follows the rules and regulations laid down by government, AICTE, and University for admission.</p>

            <div class="social">
          <a href="https://www.facebook.com/vesitedu/" target="_blank">
            <i class="fab fa-facebook"></i>
          </a>
          <!-- <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fab fa-instagram"></i>
          </a> -->
          <a href="https://www.linkedin.com/in/vesit/?originalSubdomain=in" target="_blank">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="https://www.youtube.com/channel/UCSztaAQdtzmlb05IedHf9Vg/featured" target="_blank">
            <i class="fab fa-youtube"></i>
          </a>
        </div>
          </div>
          <div class="box">
        <h2>Address</h2>
        <div class="address">
          <a href="https://goo.gl/maps/2dVRjRzv7ujpS3kh9" target="_blank">
            <i class="fas fa-map-marker-alt"></i>
            Hashu Advani Memorial Complex, Collector’s Colony, Chembur, Mumbai – 400 074. India.
          </a>
          <a href="https://api.whatsapp.com/send/?phone=919819186523&text&app_absent=0" target="_blank">
            <i class="fas fa-phone-square-alt"></i>
            +919819186523
          </a>
          <a href="mailto:vesit@ves.ac.in">
            <i class="fas fa-envelope"></i>
            vesit@ves.ac.in
          </a>
        </div>
      </div>
          <div class="box">
            <h2>Contact us</h2>
            <form action="#">
              <label for="mail">Email <span>*</span></label>
              <input type="email" name="mail" id="mail" required>
              <label for="message">Message <span>*</span></label>
              <textarea name="message" id="message" rows="3" required></textarea>
              <button type="submit" id="send" onclick="send()" class="footer-btn">Send</button>
            </form>
          </div>
        </div>
    
        <div class="author">
          <p><span>VESIT</span> copyright &copy; 2020</p>
        </div>
      </footer>
</body> 
</html>