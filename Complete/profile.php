<?php session_start();

$servername='localhost';
$username='root';
$password='';
$dbname = "vesrepo";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	   die('Could not Connect My Sql:' .mysql_error());
}
// if (!$_SESSION['username'] ||!$_SESSION['id']||!$_SESSION['branch']||!$_SESSION['year']){
// 	header('location:check.php');
// }
if (!isset($_SESSION["loggedin"])){
	header("location:check.php");
}
$user_first=$_SESSION['username'];
$userid= $_SESSION['id'];
$branch= $_SESSION['branch'];
$year= $_SESSION['year'];
	// echo "$userid";


// }

?>
<!DOCTYPE html>
<html>

<head>
	<title>Professional profile</title>
	<link rel="stylesheet" type="text/css" href="profile.css">
	<link rel="stylesheet" type="text/css"
		href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/4d01ce16d1.js" crossorigin="anonymous"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
		integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="xepOnline.jqPlugin.js"></script>
	<link rel="stylesheet" href="modal.css">
	<link rel="stylesheet" href="footer.css">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
</head>

<body>
	<?php
	
	// $update_sql="UPDATE profile set account_id=1014 WHERE user_id='{$userid}'";
	// $upd= mysqli_query($conn,$update_sql);
	// if (mysqli_query($conn, $update_sql)) {
	// 	echo "Record updated successfully";
	//   } else {
	// 	echo "Error updating record: " . mysqli_error($conn);
	//   }
	  
	  

	$account_id= "SELECT account_id from profile where profile.user_id='{$userid}'";
	$account_result=mysqli_query($conn, $account_id);
	foreach($account_result as $account_results){
		foreach($account_results as $key => $accountid){
			"$key: $accountid";
		}
	}
	//include_once 'config.php';
	if(isset($_POST['save']))
	{	 
		echo "submitted";
		// $_SESSION["loggedin"]=TRUE;
		 $title = $_POST['title'];
		 $st_date = $_POST['st_date'];
		 $end_date = $_POST['end_date'];
		 //$desc = $_POST['desc'];
		 $img = $_POST['img'];
		 $role= $_POST['role'];
		 $sql = "INSERT INTO internships (company_name,start_date, end_date,cert_pic, account_id, Role)
		 VALUES ('$title','$st_date','$end_date','$img', '$accountid', '$role') " ;
		 if (mysqli_query($conn, $sql)) {
			echo "New record created successfully !";
		 } else {
			echo "Error: " . $sql . "
	" . mysqli_error($conn);
		 }
		 
	}
	 if(isset($_POST['save_comp']))
	 {	 
		
	 	 $title_comp = $_POST['title_comp'];
	 	 $date = $_POST['date'];
	 	 $desc = $_POST['desc'];
	 	 //$desc = $_POST['desc'];
	 	 $img = $_POST['img'];
	 	 $sql = "INSERT INTO competitions (name,description,cert_pic,date, account_id)
	 	 VALUES ('$title_comp','$desc','$date','$img', '$accountid')" ;
	 	 if (mysqli_query($conn, $sql)) {
	 		echo "New record created successfully !";
	 	 } else {
	 		echo "Error: " . $sql . "
	 " . mysqli_error($conn);
	 	 }
		 
	 }
	 if(isset($_POST['save_other']))
	 {	 
		
	 	 $type = $_POST['type'];
	 	 $date = $_POST['date'];
	 	 $desc = $_POST['desc'];
	 	 //$desc = $_POST['desc'];
	 	 $img = $_POST['img'];
	 	 $sql = "INSERT INTO other (type,description,date,cert_pic, account_id)
	 	 VALUES ('$type','$desc','$date','$img', '$accountid')" ;
	 	 if (mysqli_query($conn, $sql)) {
	 		echo "New record created successfully !";
	 	 } else {
	 		echo "Error: " . $sql . "
	 " . mysqli_error($conn);
	 	 }
		 
	 }
	 if(isset($_POST['save_course']))
	{	 
		
		 $name = $_POST['name'];
		 $st_date = $_POST['st_date'];
		 $end_date = $_POST['end_date'];
		 //$desc = $_POST['desc'];
		 $img = $_POST['img'];
		 
		 $sql = "INSERT INTO courses (name,start_date, end_date,cert_pic, account_id)
		 VALUES ('$name','$st_date','$end_date','$img', '$accountid')" ;
		 if (mysqli_query($conn, $sql)) {
			echo "New record created successfully !";
		 } else {
			echo "Error: " . $sql . "
	" . mysqli_error($conn);
		 }
		 
	}
	if(isset($_POST['save_work']))
	{	 
		
		 $name = $_POST['name'];
		 $date = $_POST['date'];
		 //$desc = $_POST['desc'];
		 $img = $_POST['img'];
		 
		 $sql = "INSERT INTO workshops (name,date,cert_pic, account_id)
		 VALUES ('$name','$date','$img', '$accountid')" ;
		 if (mysqli_query($conn, $sql)) {
			echo "New record created successfully !";
		 } else {
			echo "Error: " . $sql . "
	" . mysqli_error($conn);
		 }
		 
	}
	if(isset($_POST['save_hobbies']))
	{	 
		
		 $hob = $_POST['hob'];
		 
	$sql = "UPDATE profile SET hobbies='{$hob}' WHERE account_id='{$accountid}'" ;
		 if (mysqli_query($conn, $sql)) {
			echo "New record created successfully !";
		 } else {
			echo "Error: " . $sql . "
	" . mysqli_error($conn);
		 }
		 
	}
	
	$query2= "SELECT * from internships where account_id='{$accountid}'";
	$result2= mysqli_query($conn, $query2);
	$query3= "SELECT * from competitions where account_id='{$accountid}'";
	$result3= mysqli_query($conn, $query3);
	$query4= "SELECT * from other where account_id='{$accountid}'";
	$result4= mysqli_query($conn, $query4);
	$query5= "SELECT * from courses where account_id='{$accountid}'";
	$result5= mysqli_query($conn, $query5);
	$query6= "SELECT * from workshops where account_id='{$accountid}'";
	$result6= mysqli_query($conn, $query6);
	$query_hob= "SELECT hobbies from profile where account_id='{$accountid}'";
	$result_hobbies=mysqli_query($conn, $query_hob);
	?>

<<<<<<< HEAD
<body>
<div class="header">
    <nav id="navbar">
      <div id="logo">
          <img src="/Images/Logo.png" alt="VESIT">
      </div>
      <h3>
        VesRepo
	  </h3>     
	  <button class="sign_btn"><a href="logout.php">Logout</a></button> 
    
    </nav>
  </div>
	<div class="profile-main" id ="pp">
		<div class="profile-header">
			<div class="user-detail">
				<div class="user-image">
					<img src="http://nicesnippets.com/demo/up-profile.jpg">
=======


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
>>>>>>> 702fa9cfa1c3edec17bafe3cf770dd5e00d90815
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


		<div class="profile-main" id="pp">
			<div class="profile-header">
				<div class="user-detail">
					<div class="user-image">
						<img src="https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png">
					</div>


				</div>
				<div class="tab-panel-main">
					<ul class="tabs">
						<li class="tab-link current" data-tab="Basic-detail">Basic Detail</li>
						<li class="tab-link" data-tab="Edu-detail">Educational Detail</li>
						<li class="tab-link" data-tab="Portfolio">Portfolio</li>
					</ul>
					<div id="Basic-detail" class="tab-content current">
						<div class="skill-box" id="skills">
							<ul>
								<li><strong>My Core Skills:</strong></li>
								<li>PROGRAMMING<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
										aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></li>
								<li>ENTERPRENEURSHIP<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
										aria-hidden="true"></i></li>
								<li>COMMUNICATION<i class="fa fa-star" aria-hidden="true"></i></li>
							</ul>
						</div>

						<div class="bio-box">
							<div class="hover-box" id="print">
								<div class="heading" id="title">
									<p><a href="internships.php">Internships</a>
										<!-- <label>10 Year Experience</label></p> -->
								</div>
								<div class="desc">
									<?php  
						if (mysqli_num_rows($result2)==0){
							echo "No Internships added Yet!";
						}
                          while($row = mysqli_fetch_array($result2))  
                          {  
                          ?>
									<p><span><i class="fa fa-check-circle"
												aria-hidden="true"></i></span><span><?php echo $row["Role"]; ?></span><span><span>,</span><?php echo $row["company_name"]; ?></span>
									</p>

									<?php  
                          }  
                          ?>

								</div>
							</div>

							<input type="checkbox" id="click1" style="display:none" />
							<label for="click1">
								<div class="button"><a class="add-button">+</a></div>
							</label>
							<div class="modal">
								<div class="modal__content">
									<div class="title">
										<h1>Add Internships</h1>
									</div>
									<form method="POST" action="profile.php" class="add-form">

										<div class="certificate">
											<div class="input-fields">
												<input type="text" class="input" name="title"
													placeholder="Company name">
												<input type="text" class="input" name="role"
													placeholder="Role/Position in Company">

												<input type="text" name="st_date" placeholder="Start Date" class="input"
													onfocus="(this.type='date')" onblur="(this.type='text')">

												<input type="text" name="end_date" placeholder="End Date" class="input"
													onfocus="(this.type='date')" onblur="(this.type='text')">

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


						</div>

						<div class="bio-box">
							<div class="hover-box" id="print2">

								<div class="heading">
									<p><a href="competitions.php">Competitions</a>
										<!-- <label>10 Year Experience</label></p> -->
								</div>
								<div class="desc">
									<?php  
						if (mysqli_num_rows($result3)==0){
							echo "No Competitions added Yet!";
						}
                          while($row = mysqli_fetch_array($result3))  
                          {  
                          ?>
									<p><span><i class="fa fa-check-circle"
												aria-hidden="true"></i></span><span><?php echo $row["name"]; ?></span>
									</p>
									<?php  
                          }  
                          ?>
								</div>
							</div>
							<input type="checkbox" id="click2" style="display:none" />
							<label for="click2">
								<div class="button"><a class="add-button">+</a></div>
							</label>
							<div class="modal">
								<div class="modal__content">
									<div class="title">
										<h1>Add Certifications</h1>
									</div>
									<form method="POST" action="profile.php" class="add-form">

										<div class="certificate">
											<div class="input-fields">
												<input type="text" class="input" name="title_comp" placeholder="Title">

												<input name="date" type="text" placeholder="Date" class="input"
													onfocus="(this.type='date')" onblur="(this.type='text')">

												<textarea name="desc" placeholder="Description"></textarea>
												<div class="select-image">
													<label for="img">Select image:</label>
													<input type="file" id="img" name="img" accept="image/*">
												</div>
												<div class="buttons">
													<button type="submit" name="save_comp">Submit</button>
													<label for="click2" class="btn">
														<a class="button-theme">Close</a>
													</label>
												</div>
											</div>
										</div>
									</form>

								</div>
							</div>
							<div class="overlay"></div>
						</div>
						<div class="bio-box">
							<div class="hover-box" id="print3">

								<div class="heading">
									<p><a href="other.php">Other</a>
										<!-- <label>10 Year Experience</label></p> -->
								</div>
								<div class="desc">
									<?php  
						if (mysqli_num_rows($result4)==0){
							echo "Nothing Yet!";
						}
                          while($row = mysqli_fetch_array($result4))  
                          {  
                          ?>
									<p><span><i class="fa fa-check-circle" aria-hidden="true"></i></span<span>
											<?php echo $row["type"]; ?></span>
									</p>
									<?php  
                          }  
                          ?>
								</div>
							</div>
							<input type="checkbox" id="click3" style="display:none" />
							<label for="click3">
								<div class="button"><a class="add-button">+</a></div>
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

												<input type="text" name="date" placeholder="Date" class="input"
													onfocus="(this.type='date')" onblur="(this.type='text')">

												<textarea name="desc" placeholder="Description"></textarea>
												<div class="select-image">
													<label for="img">Select image:</label>
													<input type="file" id="img" name="img" accept="image/*">
												</div>
												<div class="buttons">
													<button type="submit" name="save_other">Submit</button>
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
						</div>

						<div class="detail-box">
							<div class="personal-info-first">
								<div class="name"><?php echo $user_first ?></div>
								<div class="basic-details">
									<span>Branch : <?php echo $branch?></span>
									<span>Year : <?php echo $year?></span>
								</div>

							</div>

							<div class="personal-info-second">
								<h2>Contact</h2>
								<div class="social-icons">
									<i class="fa fa-facebook"></i>
									<i class="fa fa-twitter"></i>
									<i class="fa fa-linkedin"></i>
									<i class="fa fa-google"></i>
									<i class="fa fa-instagram"></i>
									<!-- <a href="#" type="button" class="msg-btn"><i class="fa fa-envelope-o"
											aria-hidden="true"></i>Send Message</a> -->
								</div>


							</div>
							<div class="personal-info-last">
								<h2>Hobbies</h2>
								<div class="hobbies-list">
									<?php  
						if (mysqli_num_rows($result_hobbies)==0){
							echo "Add Hobbies!";
						} 
                          while($row = mysqli_fetch_array($result_hobbies))  
                          {  
                          ?>
									<p><span></i></span><span><?php echo $row["hobbies"]; ?></span><span><span></p>

									<?php  
						  }  
						
                          ?>
								</div>
								<input type="checkbox" id="click7" style="display:none" />
								<label for="click7">
									<div class="button"><a class="add-button">+</a><span
											style="font-size:15px; text-decoration-line:underline; font-color:blue;">
											</span></div>
								</label>
								<div class="modal">
									<div class="modal__content">
										<div class="title">
											<h1>Add Hobbies</h1>
										</div>
										<form method="POST" action="profile.php" class="add-form">

											<div class="certificate">
												<div class="input-fields">
													<input type="text" name="hob" class="input"
														placeholder="Tell us your hobby!">


													<div class="buttons">
														<button type="submit" name="save_hobbies">Submit</button>
														<label for="click7" class="btn">
															<a class="button-theme">Close</a>
														</label>
													</div>
												</div>
											</div>
										</form>

									</div>
								</div>
								<div class="overlay"></div>
							</div>

						</div>
					</div>



					<div class="divider"></div>

					<div id="Edu-detail" class="tab-content">
						<div class="Edu-box-main">
							<!-- <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education</h2>
						 <div class="Edu-box">
						 	<h5><span>Graphic designer</span> <br>
						 		2005 - 2007 | Infoway Corporation</h5>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						 </div>
						 <div class="Edu-box">
						 	<h5><span>Web designer</span> <br>
						 		2007 - 2009 | Light Corporation</h5>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						 </div> -->

							<div class="bio-box">
								<div class="hover-box" id="print4">

									<div class="heading">
										<p><a href="courses.php">Courses</a>
											<!-- <label>10 Year Experience</label></p> -->
									</div>
									<div class="desc">
										<?php 
							// if ($result5==null) {
							// 	echo "No courses added";
							// }
							if (mysqli_num_rows($result5)==0){
								echo "No Courses added Yet!";
							}
                          while($row = mysqli_fetch_array($result5))  
                          {  
							  
							  
							  ?>

										<span><?php echo $row["name"]; ?></span>

										<?php  
                          }  
                          ?>
									</div>
								</div>
								<!-- <div class="add-icon">
								<a href="#open-modal"><i class="fas fa-plus-circle fa-2x"></i></a>
							</div> -->
								<input type="checkbox" id="click4" style="display:none" />
								<label for="click4">
									<div class="button"><a class="add-button">+</a></div>
								</label>
								<div class="modal">
									<div class="modal__content">
										<div class="title">
											<h1>Add Courses</h1>
										</div>
										<form method="POST" action="profile.php" class="add-form">

											<div class="certificate">
												<div class="input-fields">
													<input type="text" class="input" name="name" placeholder="Name">

													<input type="text" name="st_date" placeholder="Start Date"
														class="input" onfocus="(this.type='date')"
														onblur="(this.type='text')">

													<input type="text" name="end_date" placeholder="End Date"
														class="input" onfocus="(this.type='date')"
														onblur="(this.type='text')">

													<!-- <textarea placeholder="Description"></textarea> -->
													<div class="select-image">
														<label for="img">Select image:</label>
														<input type="file" id="img" name="img" accept="image/*">
													</div>
													<div class="buttons">
														<button type="submit" name="save_course">Submit</button>
														<label for="click4" class="btn">
															<a class="button-theme">Close</a>
														</label>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="overlay"></div>
							</div>


							<div class="bio-box">
								<div class="hover-box" id="print5">

									<div class="heading">

										<p><a href="workshops.php">Workshops</a>
											<!-- <label>10 Year Experience</label></p> -->
									</div>
									<div class="desc">
										<?php  
							if (mysqli_num_rows($result6)==0){
								echo "No Workshops added";
							}
                          while($row = mysqli_fetch_array($result6))  
                          {  
                          ?>
										<p><span><i class="fa fa-check-circle" aria-hidden="true"></i></span<span>
												<?php echo $row["name"]; ?></span>
										</p>
										<?php  
                          }  
                          ?>
									</div>
								</div>
								<!-- <div class="add-icon">
								<a href="#open-modal"><i class="fas fa-plus-circle fa-2x"></i></a>
							</div> -->
								<input type="checkbox" id="click6" style="display:none" />
								<label for="click6">
									<div class="button"><a class="add-button">+</a></div>
								</label>
								<div class="modal">
									<div class="modal__content">
										<div class="title">
											<h1>Add Workshops</h1>
										</div>
										<form method="POST" action="profile.php" class="add-form">

											<div class="certificate">
												<div class="input-fields">
													<input type="text" class="input" name="name" placeholder="Name">

													<input type="text" name="date" placeholder="Date" class="input"
														onfocus="(this.type='date')" onblur="(this.type='text')">



													<!-- <textarea placeholder="Description"></textarea> -->
													<div class="select-image">
														<label for="img">Select image:</label>
														<input type="file" id="img" name="img" accept="image/*">
													</div>
													<div class="buttons">
														<button type="submit" name="save_work">Submit</button>
														<label for="click6" class="btn">
															<a class="button-theme">Close</a>
														</label>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="overlay"></div>
							</div>

						</div>
					</div>



					<div class="divider"></div>

					<div id="Portfolio" class="tab-content">
						<div class="portfolio-box" id="port">
							<div id="header">
								<div class="left"></div>
								<div class="stuff">
									<br><br>
									<h1>My Resume</h1>
									<h2><?php echo "$user_first" ?></h2>
									<h3>Branch, <?php echo "$branch" ?></h3>
									<hr />
									<br>
									<p class="head">Internships</p>

									<?php  
						$query2= "SELECT * from internships where account_id='{$accountid}'";
						$result2= mysqli_query($conn, $query2);
						$query3= "SELECT * from competitions where account_id='{$accountid}'";
						$result3= mysqli_query($conn, $query3);
						$query4= "SELECT * from other where account_id='{$accountid}'";
						$result4= mysqli_query($conn, $query4);
						$query5= "SELECT * from courses where account_id='{$accountid}'";
						$result5= mysqli_query($conn, $query5);
						$query6= "SELECT * from workshops where account_id='{$accountid}'";
						$result6= mysqli_query($conn, $query6);
						if (mysqli_num_rows($result2)==0){
							echo "No Internships added Yet!";
						}
                          while($row = mysqli_fetch_array($result2))  
                          {  
						  ?>
									<ul>
										<li><?php echo $row["Role"]; ?></span><span><span>,</span><?php echo $row["company_name"]; ?>
										</li>
									</ul>
									<?php  
                          }  
                          ?>

									<p class="head">Competitions</p>
									<?php
							if (mysqli_num_rows($result3)==0){
							echo "No Competitions added Yet!";
						}
                          while($row = mysqli_fetch_array($result3))  
                          {  
						  ?>
									<ul>
										<li><?php echo $row["name"]; ?></li>
									</ul>
									<?php  
                          }  
                          ?>
									<p class="head">Courses </p>
									<?php
							if (mysqli_num_rows($result5)==0){
							echo "No Competitions added Yet!";
						}
                          while($row = mysqli_fetch_array($result5))  
                          {  
						  ?>
									<ul>
										<li><?php echo $row["name"]; ?></li>
									</ul>
									<?php  
                          }  
                          ?>
									<p class="head">Workshops attended</p>
									<?php
							if (mysqli_num_rows($result6)==0){
							echo "No Competitions added Yet!";
						}
                          while($row = mysqli_fetch_array($result6))  
                          {  
						  ?>
									<ul>
										<li><?php echo $row["name"]; ?></li>
									</ul>
									<?php  
                          }  
                          ?>
									<p class="head">Extracurriculars</p>
									<?php
							if (mysqli_num_rows($result4)==0){
							echo "No Competitions added Yet!";
						}
                          while($row = mysqli_fetch_array($result4))  
                          {  
						  ?>
									<ul>
										<li><?php echo $row["type"]; ?></li>
									</ul>
									<?php  
                          }  
                          ?>
								</div>
							</div>
							<div class="right"></div>
							<div id="footer">
							</div>
							<div class="resume">
								<a href="#"
									onclick="return xepOnline.Formatter.Format('header',{render:'download',foStyle:[{background:'white'}]});">
									<button class="button-two" data-hover="click me!">
										<div>Print</div>
									</button>
								</a>
							</div>

						</div>
					</div>
					<div style="clear: both;"></div>
				</div>

			</div>

		</div>

		<footer>
			<div class="footer">
				<div class="box">
					<h2>About us</h2>
					<p>Vivekanand Education Society’s Institute of Technology (VESIT) was established in 1984, with the
						aim of providing professional education in the field of Engineering.</p>

					<p>This institute is affiliated to the University of Mumbai and follows the rules and regulations
						laid down by government, AICTE, and University for admission.</p>

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


		<script type="text/javascript">
			$(document).ready(function () {
				$('ul.tabs li').click(function () {
					var tab_id = $(this).attr('data-tab');

					$('ul.tabs li').removeClass('current');
					$('.tab-content').removeClass('current');

					$(this).addClass('current');
					$("#" + tab_id).addClass('current');
				});
			});

		</script>
		<!-- <script>
	var coll = document.getElementsByClassName("add-icon");
	var i;
	
	for (i = 0; i < coll.length; i++) {
	  coll[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var content = this.nextElementSibling;
		if (content.style.display === "block") {
		  content.style.display = "none";
		} else {
		  content.style.display = "block";
		}
	  });
	}
</script> -->
	</body>

</html>