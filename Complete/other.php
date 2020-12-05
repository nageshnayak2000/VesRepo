<?php session_start();

$servername='localhost';
$username='root';
$password='';
$dbname = "vesrepo";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	   die('Could not Connect My Sql:' .mysql_error());
}
if(isset($_SESSION["id"])){
  $userid=$_SESSION["id"];
}
// echo "$userid";
$account_id= "SELECT account_id from profile where profile.user_id='{$userid}'";
	$account_result=mysqli_query($conn, $account_id);
	foreach($account_result as $account_results){
		foreach($account_results as $key => $accountid){
			"$key: $accountid";
		}
  }
  //  echo "$accountid";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="internships.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="modal.css">

    <title>Document</title>
</head>
<body>
  <?php
  $query1="SELECT type, description, date, cert_pic from other where account_id='{$accountid}'";
  $result=mysqli_query($conn, $query1);

  if(isset($_POST['upd_other']))
	 {	 
		
	 	 $type = $_POST['type'];
	 	 $date = $_POST['date'];
	 	 $desc = $_POST['desc'];
	 	 //$desc = $_POST['desc'];
	 	 $img = $_POST['img'];
	 	 $sql = "UPDATE other SET type='$type',description='$desc',date='$date',cert_pic='$img' WHERE account_id='$accountid'";
	 	 if (mysqli_query($conn, $sql)) {
	 	
	 	 } else {
	 		echo "Error: " . $sql . "
	 " . mysqli_error($conn);
	 	 }
		 
	 }
  ?>
    <div class="header">
        <nav id="navbar">
          <div id="logo">
              <img src="/Images/Logo.png" alt="VESIT">
          </div>
          <div class="vl"></div>
          <h1>
            VesRepo
          </h1>  
          <button onclick="location.href='profile.php'" class="sign_btn btn1">Back</button>     
     
        </nav>
      </div>
      <h1>Other</h1>
    <div class="all">
        <div class="cards">
          
              <?php  
					
              while($row = mysqli_fetch_array($result))  
              {  
              ?>  
              <div class="card shadow-1">
              <div class="card-text">
              <h4><span><i class="fa fa-check-circle" aria-hidden="true"></i><?php echo $row["type"]; ?></span></h4>
              <p><span>Description:  </span><span> <?php echo $row["description"] ?></span></p>
              <p><span>On:  </span><span> <?php echo $row["date"] ?></span><p><span>Show Certificate  </span><span> <?php echo $row["cert_pic"] ?></span></p>
              <p></p>
              <input type="checkbox" id="click3" style="display:none" />
						<label for="click3">
            <div class="btn2"><p class="text">EDIT</p></div>

            <!-- <button class="btn2">Edit</button> -->
						</label>
                        <div class="modal">
							<div class="modal__content">
								<div class="title">
									<h1>Other Accomplishments</h1>
								</div>
								<form method="POST" action="profile.php" class="add-form">

								<div class="certificate">
									<div class="input-fields">
										<input type="text" name="type" class="input" placeholder="Title">

										<input type="text" name="date" placeholder="Date" class="input" onfocus="(this.type='date')"
											onblur="(this.type='text')">

										<textarea name="desc" placeholder="Description"></textarea>
										<div class="select-image">
											<label for="img">Select image:</label>
											<input type="file" id="img" name="img" accept="image/*">
										</div>
										<div class="buttons">
										<button type="submit" name="upd_other">Submit</button>
											<label for="click3" class="btn">
												<a class="button-theme">Close</a>
											</label>
										</div>
									</div>
								</div>
						</form>

							</div>
						</div>
						<div class="overlay"></div>
              </div></div>
              <?php  
              }  
              ?>  
                
						
      <!-- END .all -->
      <script type="text/javascript">
      $(document).ready(function () {
          $('.card').hover(function() {
                if ($(this).hasClass('open')) {
                    $('.card').removeClass('open');
                    $('.card').removeClass('shadow-2');
                    $(this).addClass('shadow-1');
                    return false;
                } else {
                    $('.card').removeClass('open');
                    $('.card').removeClass('shadow-2');
                    $(this).addClass('open');
                    $(this).addClass('shadow-2');
            }
            });
      });
        </script>

</body>
</html>