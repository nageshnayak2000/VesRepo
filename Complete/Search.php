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
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">    
    <title>Search Profile</title>
</head>
<body>
    <div class="header">
        <nav id="navbar">
          <div id="logo">
              <img src="/Images/Logo.png" alt="VESIT">
          </div>
          <div class="vl"></div>
          <h1>
            VesRepo
          </h1> 
          <button class="sign_btn"><a href="logout.php">Logout</a></button> 
	  <div class="svg"><svg height="35pt" viewBox="0 -10 490.66667 490" width="35pt" xmlns="http://www.w3.org/2000/svg"><path d="m325.332031 251h-309.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h309.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m240 336.332031c-4.097656 0-8.191406-1.554687-11.308594-4.691406-6.25-6.25-6.25-16.382813 0-22.636719l74.027344-74.023437-74.027344-74.027344c-6.25-6.25-6.25-16.386719 0-22.636719 6.253906-6.25 16.386719-6.25 22.636719 0l85.332031 85.335938c6.25 6.25 6.25 16.382812 0 22.632812l-85.332031 85.332032c-3.136719 3.160156-7.230469 4.714843-11.328125 4.714843zm0 0"/><path d="m256 469.667969c-97.089844 0-182.804688-58.410157-218.410156-148.824219-3.242188-8.191406.808594-17.492188 9.023437-20.734375 8.191407-3.199219 17.515625.789063 20.757813 9.046875 30.742187 78.058594 104.789062 128.511719 188.628906 128.511719 111.742188 0 202.667969-90.925781 202.667969-202.667969s-90.925781-202.667969-202.667969-202.667969c-83.839844 0-157.886719 50.453125-188.628906 128.511719-3.265625 8.257812-12.566406 12.246094-20.757813 9.046875-8.214843-3.242187-12.265625-12.542969-9.023437-20.734375 35.605468-90.414062 121.320312-148.824219 218.410156-148.824219 129.386719 0 234.667969 105.28125 234.667969 234.667969s-105.28125 234.667969-234.667969 234.667969zm0 0"/></svg></div> 
          
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

        <h1>Search Profile</h1>
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
                  <div class="buttons">
                    <button type="submit" name="save_comp">Submit</button>
                </div>
                </form>
              </div>
        </div>
    </div>
    <div class="table-box" >
  
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
        
            <div class="table-cell first-cell">
            
                <p><?php echo $row['first_name']; ?><span> </span><?php echo $row['last_name']; ?></p>
           
            </div>
            <div class="table-cell">
                <p>Student</p>
            </div>
            <div class="table-cell">
                
                <p><?php echo $row['branch']; ?></p>
            </div>
            
            <div class="table-cell">
                <a href="profile_admin.php"><p>View Profile</p></a>

            </div>
            <div class="table-cell">
            <p><?php echo $row['year']; ?></p>
            </div>
              
            <div class="table-cell last-cell">
            <a href="#"><p>Mark</p></a>
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
        
            <div class="table-cell first-cell">
            
                <p><?php echo $row['first_name']; ?><span> </span><?php echo $row['last_name']; ?></p>
           
            </div>
            <div class="table-cell">
                <p>Student</p>
            </div>
            <div class="table-cell">
                
                <p><?php echo $row['branch']; ?></p>
            </div>
            <?php 
           $_SESSION["fname"]=$row['first_name'];
           $_SESSION["iduser"]=$row['user_id'];
           $_SESSION["branch"]=$row['branch'];
           $_SESSION["year"]=$row['year'];
           
            ?>
            <div class="table-cell">
                <a href="profile_admin.php"><p>View Profile</p></a>
            </div>
            <div class="table-cell">
            <p><?php echo $row['year']; ?></p>
            </div>
              
            <div class="table-cell last-cell">
            <a href="#"><p>Mark</p></a>
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
        
            <div class="table-cell first-cell">
            
                <p><?php echo $row['first_name']; ?><span> </span><?php echo $row['last_name']; ?></p>
           
            </div>
            <div class="table-cell">
                <p>Student</p>
            </div>
            <div class="table-cell">
                <p><?php echo $row['branch']; ?></p>
            </div>
            <?php
           $_SESSION["fname"]=$row['first_name'];
           $_SESSION["iduser"]=$row['user_id'];
           $_SESSION["branch"]=$row['branch'];
           $_SESSION["year"]=$row['year'];
           
            ?>
            <div class="table-cell">
                <a href="profile_admin.php"><p>View Profile</p></a>
            </div>
            <div class="table-cell">
            <p><?php echo $row['year']; ?></p>
            </div>
              
            <div class="table-cell last-cell">
            <a href="#"><p>Mark</p></a>
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
        
            <div class="table-cell first-cell">
            
                <p><?php echo $row['first_name']; ?><span> </span><?php echo $row['last_name']; ?></p>
           
            </div>
            <div class="table-cell">
                <p>Student</p>
            </div>
            <div class="table-cell">
                <p><?php echo $row['branch']; ?></p>
            </div>
            <?php 
           $_SESSION["fname"]=$row['first_name'];
           $_SESSION["iduser"]=$row['user_id'];
           $_SESSION["branch"]=$row['branch'];
           $_SESSION["year"]=$row['year'];
           
            ?>
            <div class="table-cell">
                <a href="profile_admin.php"><p>View Profile</p></a>
            </div>
            <div class="table-cell">
            <p><?php echo $row['year']; ?></p>
            </div>
              
            <div class="table-cell last-cell">
            <a href="#"><p>Mark</p></a>
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
        
            <div class="table-cell first-cell">
            
                <p><?php echo $row['first_name']; ?><span> </span><?php echo $row['last_name']; ?></p>
           
            </div>
            <div class="table-cell">
                <p>Student</p>
            </div>
            <div class="table-cell">
                <p><?php echo $row['branch']; ?></p>
            </div>
            <?php 
           $_SESSION["fname"]=$row['first_name'];
           $_SESSION["iduser"]=$row['user_id'];
           $_SESSION["branch"]=$row['branch'];
           $_SESSION["year"]=$row['year'];
           
            ?>
            <div class="table-cell">
                <a href="profile_admin.php"><p>View Profile</p></a>
            </div>
            <div class="table-cell">
            <p><?php echo $row['year']; ?></p>
            </div>
              
            <div class="table-cell last-cell">
            <a href="#"><p>Mark</p></a>
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
        
            <div class="table-cell first-cell">
            
                <p><?php echo $row['first_name']; ?><?php echo $row['last_name']; ?></p>
           
            </div>
            <div class="table-cell">
                <p>Student</p>
            </div>
            <div class="table-cell">
                <p><?php echo $row['branch']; ?></p>
            </div>
            <?php 
           $_SESSION["fname"]=$row['first_name'];
           $_SESSION["iduser"]=$row['user_id'];
           $_SESSION["branch"]=$row['branch'];
           $_SESSION["year"]=$row['year'];
           
            ?>
            <div class="table-cell">
                <a href="profile_admin.php"><p>View Profile</p></a>
            </div>
            <div class="table-cell">
            <p><?php echo $row['year']; ?></p>
            </div>
              
            <div class="table-cell last-cell">
            <a href="#"><p>Mark</p></a>
            </div> 
            
        </div>
        <?php
                          }
                        }
            ?>


        
        </div>
    </div>
    
</body>
</html>