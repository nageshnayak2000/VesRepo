<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = sha1($_POST['password']);
    $Branch= $_POST['Branch'];
    $Semester= $_POST['Semester'];
    $Year= $_POST['Year'];
    $roll_no= $_POST['roll_no'];

    $sql = "INSERT INTO user(first_name,last_name,ves_email,phone_no,password,branch,semester,year,roll_no)VALUES(?,?,?,?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$firstname,$lastname,$email,$phonenumber,$password,$Branch,$Semester,$Year,$roll_no]);
        if($result){
            echo "Successfully saved.";
            $sql2= "SELECT user_id FROM user WHERE ves_email = '{$email}' AND password = '{$password}' ";
            $result2 = mysqli_query($conn, $sql2) or die("Query Falied");	  
            foreach($result2 as $idd){
                foreach($idd as $key => $id){
                    "$key: $id";
                }
            }        
            $qu="INSERT INTO profile(user_id) VALUES({$id})";
                  if(mysqli_query($conn, $qu)){
                    echo "profile updated";
                    } else {
                      echo mysqli_error($conn);
                  }
                
        }else{
            echo 'There were errors while saving the data';
        }
    }else{
        echo 'No data';
    }