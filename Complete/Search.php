<?php  session_start();
$servername='localhost';
$username='root';
$password='';
$dbname = "vesrepo";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	   die('Could not Connect My Sql:' .mysql_error());
} else {
}
if (!isset($_SESSION["loggedin"])){
	header("location:check.php");
}
$userid= $_SESSION['id'];
// if(isset($_POST['internships'])||isset($_POST['competitions'])||isset($_POST['other'])||isset($_POST['courses'])||isset($_POST['workshops'])){
//     echo "<h1>checkedd</h1>";
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Search.css">
    <link rel="stylesheet" href="footer.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <title>Search Profile</title>
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
            <button onclick="location.href='logout.php'" class="sign_btn">Logout</button>
            <div class="svg" onclick="location.href='logout.php'"><svg height="35pt" viewBox="0 -10 490.66667 490"
                    width="35pt" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m474.667969 251h-309.335938c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h309.335938c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
                    <path
                        d="m250.667969 336.332031c-4.097657 0-8.191407-1.554687-11.308594-4.691406l-85.332031-85.332031c-6.25-6.253906-6.25-16.386719 0-22.636719l85.332031-85.332031c6.25-6.25 16.382813-6.25 22.636719 0 6.25 6.25 6.25 16.382812 0 22.632812l-74.027344 74.027344 74.027344 74.027344c6.25 6.25 6.25 16.382812 0 22.632812-3.136719 3.117188-7.234375 4.671875-11.328125 4.671875zm0 0" />
                    <path
                        d="m234.667969 469.667969c-129.386719 0-234.667969-105.28125-234.667969-234.667969s105.28125-234.667969 234.667969-234.667969c97.085937 0 182.804687 58.410157 218.410156 148.824219 3.242187 8.210938-.8125 17.492188-9.023437 20.753906-8.214844 3.203125-17.496094-.789062-20.757813-9.042968-30.742187-78.082032-104.789063-128.535157-188.628906-128.535157-111.746094 0-202.667969 90.925781-202.667969 202.667969s90.921875 202.667969 202.667969 202.667969c83.839843 0 157.886719-50.453125 188.628906-128.511719 3.242187-8.257812 12.523437-12.246094 20.757813-9.046875 8.210937 3.242187 12.265624 12.542969 9.023437 20.757813-35.605469 90.390624-121.324219 148.800781-218.410156 148.800781zm0 0" />
                </svg></div>
        </nav>
    </div>
    <div class="container">
        <?php
    error_reporting(E_ERROR | E_PARSE);
    if(isset($_POST['save_comp'])) { 
        if(!empty($_POST['branch'])) {
            $selected = $_POST['branch'];
            // echo 'You have chosen: ' . $selected;
        } else {
            // echo 'Please select the value.';
        }
        $var_name=$_POST['Search_name'];
            $var_ws = $_POST['workshops']; 
            $var_in = $_POST['internships']; 
            $var_cs = $_POST['courses']; 
            $var_com = $_POST['competitions']; 
            $var_ot = $_POST['other'];
            if(isset($var_name)) {
                $qu_name="SELECT user_id,first_name, last_name, branch, year from user where first_name='{$var_name}' "; 
                $res_name=mysqli_query($conn, $qu_name)or die( mysqli_error($conn));
            } 
            if(isset($var_ws)) { 
                // echo "Option ws submitted successfully";
                $qu_ws="SELECT user_id,first_name, last_name, branch, year from user where user_id in (SELECT user_id from profile where account_id in (select account_id from workshops)) "; 
                $res_ws=mysqli_query($conn, $qu_ws)or die( mysqli_error($conn));
            }
            if(isset($var_in)) { 
                // echo "Option in submitted successfully"; 
                $qu_in="SELECT first_name, last_name, branch, year,user_id from user where user_id in (SELECT user_id from profile where account_id in(select account_id from internships)) "; 
                $res_in=mysqli_query($conn, $qu_in)or die( mysqli_error($conn));
            }
            if(isset($var_cs)) { 
                // echo "Option cs submitted successfully";
                $qu_cs="SELECT first_name, last_name, branch, year, user_id from user where user_id in(SELECT user_id from profile where account_id in(select account_id from courses)) "; 
                $res_cs=mysqli_query($conn, $qu_cs)or die( mysqli_error($conn)); 
            }if(isset($var_com)) { 
                // echo "Option com submitted successfully"; 
                $qu_com="SELECT first_name, last_name, branch, year, user_id from user where user_id in(SELECT user_id from profile where account_id in(select account_id from competitions)) "; 
                $res_com=mysqli_query($conn, $qu_com)or die( mysqli_error($conn)); 
            }

            if(isset($var_ot)) { 
                // echo "Option ot submitted successfully"; 
                $qu_ot="SELECT first_name, last_name, branch, year, user_id from user where user_id in(SELECT user_id from profile where account_id in(select account_id from other)) "; 
                $res_ot=mysqli_query($conn, $qu_ot) or die ("Error: " . mysqli_error($conn)); 
            } else {
                echo "Select option to continue";
            }
        } 
    ?>

        <h1 class="title">Search Profile</h1>
        <div class="Search">
            <form action="Search.php" method="post">

                <div class="entries-1">
                    <input type="text" name="Search_name" placeholder="Search Name">
                    <select name="type" id="type">
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="view_only">View Only-Admin</option>
                    </select>
                    <select name="branch" id="branch">
                        <option value="INFT">INFT</option>
                        <option value="cmpn">CMPN</option>
                        <option value="extc">EXTC</option>
                    </select>
                    <select name="year" id="year">
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
                </div>
                <div class="new">
                    <!-- <form method="POST" action="Search.php"  > -->
                    <div class="form-group">
                        <input type="checkbox" id="int" name="internships">
                        <label for="int">Internships</label>
                    </div>
                    <!-- <div class="buttons">
                    <button type="submit" name="save_comp">Submit</button>
                </div>
                </form>
                <form method="POST" action="Search.php"  > -->
                    <div class="form-group">
                        <input type="checkbox" id="css" name="competitions" value="2">
                        <label for="css">Competitions</label>
                    </div>
                    <!-- <div class="buttons">
                    <button type="submit" name="save_comp">Submit</button>
                </div>
                </form>
                <form method="POST" action="Search.php"  >  -->
                    <div class="form-group">
                        <input type="checkbox" id="javascript" name="other">
                        <label for="javascript">Other</label>
                    </div>
                    <!-- <div class="buttons">
                    <button type="submit" name="save_comp">Submit</button>
                </div>
 </form>
<form method="POST" action="Search.php"  >  -->
                    <div class="form-group">
                        <input type="checkbox" id="cs" name="courses">
                        <label for="cs">Courses</label>
                    </div>
                    <!-- <div class="buttons">
                    <button type="submit" name="save_comp">Submit</button>
                </div>
 </form>
<form method="POST" action="Search.php"  >  -->
                    <div class="form-group">
                        <input type="checkbox" id="ws" name="workshops">
                        <label for="ws">Workshops</label>
                    </div>
                    <div>
                        <button class="buttons" type="submit" name="save_comp">Submit</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <div class="table-box">

        <div class="table-head table-row">
            <div class="table-cell first-cell">
                <p>Name</p>
            </div>
            <div class="table-cell">
                <p>Role</p>
            </div>
            <div class="table-cell">
                <p>Branch</p>
            </div>
            <div class="table-cell">
                <p>Profile</p>
            </div>
            <div class="table-cell last-cell">
                <p>Year</p>
            </div>
            <div class="table-cell last-cell">
                <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </div>
        </div>
        <?php  
error_reporting(E_ERROR | E_PARSE);
        if(mysqli_num_rows($res_name)>0){
                while($row = mysqli_fetch_array($res_name))  
                { 
  
            
            ?>
        <div class="table-row">

            <div data-label="Name" class="table-cell first-cell">

                <p class="table-cell-sec"><?php echo $row['first_name']; ?><span> </span><?php echo $row['last_name']; ?></p>

            </div>
            <div data-label="Role" class="table-cell">
                <p class="table-cell-sec">Student</p>
            </div>
            <div data-label="Branch" class="table-cell">

                <p class="table-cell-sec"><?php echo $row['branch']; ?></p>
            </div>
            <?php 
           $_SESSION["fname"]=$row['first_name'];
           $_SESSION["iduser"]=$row['user_id'];
           $_SESSION["branch"]=$row['branch'];
           $_SESSION["year"]=$row['year'];
           
            ?>

            <div data-label="Profile" class="table-cell">
                <a href="profile_admin.php">
                    <p class="table-cell-sec">View Profile</p>
                </a>

            </div>
            <div data-label="Year" class="table-cell">
                <p class="table-cell-sec"><?php echo $row['year']; ?></p>
            </div>

            <div data-label="Delete" class="table-cell last-cell">
                <a href="#">
                    <p class="table-cell-sec">Mark</p>
                </a>
            </div>

        </div>
        <?php
                          }
                        }
            ?>
        <?php  
error_reporting(E_ERROR | E_PARSE);
        if(mysqli_num_rows($res_in)>0){
                while($row = mysqli_fetch_array($res_in))  
                { 
  
            
            ?>
        <div class="table-row">

            <div data-label="Name" class="table-cell first-cell">

                <p class="table-cell-sec"><?php echo $row['first_name']; ?><span> </span><?php echo $row['last_name']; ?></p>

            </div>
            <div data-label="Role" class="table-cell">
                <p class="table-cell-sec">Student</p>
            </div>
            <div data-label="Branch" class="table-cell">

                <p class="table-cell-sec"><?php echo $row['branch']; ?></p>
            </div>
            <?php 
           $_SESSION["fname"]=$row['first_name'];
           $_SESSION["iduser"]=$row['user_id'];
           $_SESSION["branch"]=$row['branch'];
           $_SESSION["year"]=$row['year'];
           
            ?>
            <div data-label="Profile" class="table-cell">
                <a href="profile_admin.php">
                    <p class="table-cell-sec">View Profile</p>
                </a>
            </div>
            <div data-label="Year" class="table-cell">
                <p class="table-cell-sec"><?php echo $row['year']; ?></p>
            </div>

            <div data-label="Delete" class="table-cell last-cell">
                <a href="#">
                    <p class="table-cell-sec">Mark</p>
                </a>
            </div>

        </div>
        <?php
                          }
                        }
            ?>
        <?php  
error_reporting(E_ERROR | E_PARSE);
if(mysqli_num_rows($res_ws)>0){
                while($row = mysqli_fetch_array($res_ws))  
                { 
  
            
            ?>
        <div class="table-row">

            <div data-label="Name" class="table-cell first-cell">

                <p class="table-cell-sec"><?php echo $row['first_name']; ?><span> </span><?php echo $row['last_name']; ?></p>

            </div>
            <div data-label="Role" class="table-cell">
                <p class="table-cell-sec">Student</p>
            </div>
            <div data-label="Branch" class="table-cell">
                <p class="table-cell-sec"><?php echo $row['branch']; ?></p>
            </div>
            <?php
           $_SESSION["fname"]=$row['first_name'];
           $_SESSION["iduser"]=$row['user_id'];
           $_SESSION["branch"]=$row['branch'];
           $_SESSION["year"]=$row['year'];
           
            ?>
            <div data-label="Profile" class="table-cell">
                <a href="profile_admin.php">
                    <p class="table-cell-sec">View Profile</p>
                </a>
            </div>
            <div data-label="Year" class="table-cell">
                <p class="table-cell-sec"><?php echo $row['year']; ?></p>
            </div>

            <div data-label="Delete" class="table-cell last-cell">
                <a href="#">
                    <p class="table-cell-sec">Mark</p>
                </a>
            </div>

        </div>
        <?php
                          }
                        }
            ?>
        <?php  
error_reporting(E_ERROR | E_PARSE);
if(mysqli_num_rows($res_com)>0){
                while($row = mysqli_fetch_array($res_com))  
                { 
  
            
            ?>
        <div class="table-row">

            <div data-label="Name" class="table-cell first-cell">

                <p class="table-cell-sec"><?php echo $row['first_name']; ?><span> </span><?php echo $row['last_name']; ?></p>

            </div>
            <div data-label="Role" class="table-cell">
                <p class="table-cell-sec">Student</p>
            </div>
            <div data-label="Branch" class="table-cell">
                <p class="table-cell-sec"><?php echo $row['branch']; ?></p>
            </div>
            <?php 
           $_SESSION["fname"]=$row['first_name'];
           $_SESSION["iduser"]=$row['user_id'];
           $_SESSION["branch"]=$row['branch'];
           $_SESSION["year"]=$row['year'];
           
            ?>
            <div data-label="Profile" class="table-cell">
                <a href="profile_admin.php">
                    <p class="table-cell-sec">View Profile</p>
                </a>
            </div>
            <div data-label="Year" class="table-cell">
                <p class="table-cell-sec"><?php echo $row['year']; ?></p>
            </div>

            <div data-label="Delete" class="table-cell last-cell">
                <a href="#">
                    <p class="table-cell-sec">Mark</p>
                </a>
            </div>

        </div>
        <?php
                          }
                        }
            ?>
        <?php  
error_reporting(E_ERROR | E_PARSE);
if(mysqli_num_rows($res_cs)>0){
                while($row = mysqli_fetch_array($res_cs))  
                { 
  
            
            ?>
        <div class="table-row">

            <div data-label="Name" class="table-cell first-cell">

                <p class="table-cell-sec"><?php echo $row['first_name']; ?><span> </span><?php echo $row['last_name']; ?></p>

            </div>
            <div data-label="Role" class="table-cell">
                <p class="table-cell-sec">Student</p>
            </div>
            <div data-label="Branch" class="table-cell">
                <p class="table-cell-sec"><?php echo $row['branch']; ?></p>
            </div>
            <?php 
           $_SESSION["fname"]=$row['first_name'];
           $_SESSION["iduser"]=$row['user_id'];
           $_SESSION["branch"]=$row['branch'];
           $_SESSION["year"]=$row['year'];
           
            ?>
            <div data-label="Profile" class="table-cell">
                <a href="profile_admin.php">
                    <p class="table-cell-sec">View Profile</p>
                </a>
            </div>
            <div data-label="Year" class="table-cell">
                <p class="table-cell-sec"><?php echo $row['year']; ?></p>
            </div>

            <div data-label="Delete" class="table-cell last-cell">
                <a href="#">
                    <p class="table-cell-sec">Mark</p>
                </a>
            </div>

        </div>
        <?php
                          }
                        }
            ?>
        <?php  
error_reporting(E_ERROR | E_PARSE);
if(mysqli_num_rows($res_ot)>0){
                while($row = mysqli_fetch_array($res_ot))  
                { 
  
            
            ?>
        <div class="table-row">

            <div data-label="Name" class="table-cell first-cell">

                <p class="table-cell-sec"><?php echo $row['first_name']; ?><?php echo $row['last_name']; ?></p>

            </div>
            <div data-label="Role" class="table-cell">
                <p class="table-cell-sec">Student</p>
            </div>
            <div data-label="Branch" class="table-cell">
                <p class="table-cell-sec"><?php echo $row['branch']; ?></p>
            </div>
            <?php 
           $_SESSION["fname"]=$row['first_name'];
           $_SESSION["iduser"]=$row['user_id'];
           $_SESSION["branch"]=$row['branch'];
           $_SESSION["year"]=$row['year'];
           
            ?>
            <div data-label="Profile" class="table-cell">
                <a href="profile_admin.php">
                    <p class="table-cell-sec">View Profile</p>
                </a>
            </div>
            <div data-label="Year" class="table-cell">
                <p class="table-cell-sec"><?php echo $row['year']; ?></p>
            </div>

            <div data-label="Delete" class="table-cell last-cell">
                <a href="#">
                    <p class="table-cell-sec">Mark</p>
                </a>
            </div>

        </div>
        <?php
                          }
                        }
            ?>



    </div>
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
          <a href="mailto:wiremeshindia@gmail.com">
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
              <label for="mess">Message <span>*</span></label>
              <textarea name="mess" id="mess" rows="3" required></textarea>
              <button type="submit" class="footer-btn">Send</button>
            </form>
          </div>
        </div>
    
        <div class="author">
          <p><span>VESIT</span> copyright &copy; 2020</p>
        </div>
      </footer>
</body>

</html>