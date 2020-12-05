<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin_login.css">

    <!-- <link rel="stylesheet" href="footer.css"> -->


    <title>Admin Login</title>
</head>
<body>
<div class="header">
    <nav id="navbar">
      <div id="logo">
        <img src="Logo.png" alt="VESIT">
      </div>
      <h1>
        VesRepo
      </h1>
      <button onclick="location.href='Homepage.php'" class="sign_btn btn1">Back</button>     
    </nav>
  </div>
<form class="box" action="admin_login.php" method="post">
        <h1>Admin | Login</h1>
        <input type="text" name="email" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="login" value="Login">
    </form>
    <div class="circular-img">
      <img src="design.jpg ">
    </div>
        <?php session_start();
            $_SESSION["loggedin"]=TRUE;

        if(isset($_POST['login'])){

            include "config.php";
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM user WHERE ves_email = '{$email}' AND password = '{$password}'";
          
            $result = mysqli_query($conn, $sql) or die("Query Falied");	          
              
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result)){
                  
                    $_SESSION["id"] = $row['user_id'];
                    $_SESSION["email"] = $row['ves_email'];
                   


                }
                header("Location: Search.php");


                //  $_SESSION["username"]= $row['first_name']
            }
            else{
                echo "Enter correct user name or password";
            }


        }

    ?>
    
    
</body>
</html>