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
  // echo "$accountid";

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
  $query1="SELECT company_name, Role, start_date, end_date, cert_pic from internships where account_id='{$accountid}'";
  $result=mysqli_query($conn, $query1);

  if(isset($_POST['save']))
	{	 
    // echo "submitted";
		// $_SESSION["loggedin"]=TRUE;
		 $title = $_POST['title'];
		 $st_date = $_POST['st_date'];
		 $end_date = $_POST['end_date'];
		 //$desc = $_POST['desc'];
		 $img = $_POST['img'];
		 $role= $_POST['role'];
		 $sql = "UPDATE internships SET company_name='{$title}',start_date='{$st_date}', end_date='{$end_date}',cert_pic='{$img}', Role='{$role}'  WHERE company_name='{$title}'";
		 if (mysqli_query($conn, $sql)) {
			// echo "New record created successfully !";
		 } else {
			echo "Error: " . $sql . "
	" . mysqli_error($conn);
		 }
		 
	}

  ?>
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
				<button onclick="location.href='profile.php'" class="sign_btn">Back</button>
				<div class="svg" onclick="location.href='profile.php'"><svg height="35pt" viewBox="0 -10 490.66667 490"
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
      <h1>Internships</h1>
    <div class="all">
        <div class="cards">
          
              <?php  
					
              while($row = mysqli_fetch_array($result))  
              {  
              ?>  
              <div class="card shadow-1">
              <div class="card-text">
              <h4><span><i class="fa fa-check-circle" aria-hidden="true"></i><?php echo $row["company_name"]; ?></span></h4>
              <p><span>Post:  </span><span> <?php echo $row["Role"] ?></span></p>
              <p><span>From:  </span><span> <?php echo $row["start_date"] ?></span><span>   To:  </span><span> <?php echo $row["end_date"] ?></span>
              <p><span>Show Certificate  </span><span> <?php echo $row["cert_pic"] ?></span></p>
              <p></p>
              <input type="checkbox" id="click1" style="display:none" />
						<label for="click1">
            <div class="btn2"><p class="text">EDIT</p></div>

            <!-- <button class="btn2">Edit</button> -->
						</label>
            <div class="modal">
							<div class="modal__content">
								<div class="title">
									<h1>Edit Internships</h1>
								</div>
								<form method="POST" action="internships.php" class="add-form">

								<div class="certificate">
									<div class="input-fields">
										<input type="text" class="input" name="title" placeholder="Company name">
										<input type="text" class="input" name="role" placeholder="Role/Position in Company">

										<input type="text" name="st_date" placeholder="Start Date" class="input" onfocus="(this.type='date')"
											onblur="(this.type='text')">

											<input type="text" name="end_date" placeholder="End Date" class="input" onfocus="(this.type='date')"
											onblur="(this.type='text')">

										<!-- <textarea placeholder="Description"></textarea> -->
										<div class="select-image">
											<label for="img">Select image:</label>
											<input type="file" id="img" name="img" accept="image/*">
										</div>
										<div class="buttons">
											<button type="submit" name="save">Submit</button>
											<label for="click1" class="btn">
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