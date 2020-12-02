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
// if (!isset($_SESSION["loggedin"])){
// 	header("location:check.php");
// }
if(isset($_SESSION["fname"])){
    echo "From Admin";
}
$firstname=$_SESSION["fname"];
$userid=$_SESSION["iduser"];
echo $userid;
$branch=$_SESSION["branch"];
$year=$_SESSION["year"];


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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="xepOnline.jqPlugin.js"></script>
	<link rel="stylesheet" href="modal.css">
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
			echo "$key: $accountid";
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
		
	

<body>
<div class="header">
    <nav id="navbar">
      <div id="logo">
          <img src="/Images/Logo.png" alt="VESIT">
      </div>
      <h3>
        VesRepo
	  </h3>     
	  
    </nav>
  </div>
	<div class="profile-main" id ="pp">
		<div class="profile-header">
			<div class="user-detail">
				<div class="user-image">
					<img src="http://nicesnippets.com/demo/up-profile.jpg">
				</div>


			</div>
			<div class="tab-panel-main">
				<ul class="tabs">
					<li class="tab-link current" data-tab="Basic-detail">Basic Detail</li>
					<li class="tab-link" data-tab="Edu-detail">Educational Detail</li>
					<li class="tab-link" data-tab="Portfolio">Portfolio</li>
				</ul>
				<div id="Basic-detail" class="tab-content current">
					<div class="skill-box" id= "skills">
						<ul>
							<li><strong>My Core Skills:</strong></li>
							<li>PROGRAMMING<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
									aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></li>
							<li>ENTERPRENEURSHIP<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
									aria-hidden="true"></i></li>
							<li>COMMUNICATION<i class="fa fa-star" aria-hidden="true"></i></li>
						</ul>
					</div>

					<div class="bio-box" >
						<div class="hover-box" id="print">
						<div class="heading" id="title">
							<p ><a href="internships.php" >Internships</a>
								<!-- <label>10 Year Experience</label></p> -->
						</div>
						<div class="desc" >
						<?php  
						if (mysqli_num_rows($result2)==0){
							echo "No Internships added Yet!";
						}
                          while($row = mysqli_fetch_array($result2))  
                          {  
                          ?>  
							<p><span><i class="fa fa-check-circle" aria-hidden="true"></i></span><span><?php echo $row["Role"]; ?></span><span><span>,</span><?php echo $row["company_name"]; ?></span></p>
                            
                          <?php  
                          }  
                          ?>  
							
						</div>
						</div>

						<input type="checkbox" id="click1" style="display:none" />
						
						<div class="modal">
							<div class="modal__content">
								<div class="title">
									<h1>Add Internships</h1>
								</div>
								<form method="POST" action="profile.php" class="add-form">

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


					</div>

					<div class="bio-box">
					<div class="hover-box" id="print2">

						<div class="heading">
							<p>Competitions
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
							<p><span><i class="fa fa-check-circle" aria-hidden="true"></i></span><span><?php echo $row["name"]; ?></span>
                            </p>
                          <?php  
                          }  
                          ?> 
						</div>
						</div>
						<input type="checkbox" id="click2" style="display:none" />
						
						<div class="modal">
							<div class="modal__content">
								<div class="title">
									<h1>Add Certifications</h1>
								</div>
								<form method="POST" action="profile.php" class="add-form">

								<div class="certificate">
									<div class="input-fields">
										<input type="text" class="input" name="title_comp" placeholder="Title">

										<input name="date" type="text" placeholder="Date" class="input" onfocus="(this.type='date')"
											onblur="(this.type='text')">

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
							<p>Other
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
							<p><span><i class="fa fa-check-circle" aria-hidden="true"></i></span<span><?php echo $row["type"]; ?></span>
                            </p>
                          <?php  
                          }  
                          ?> 
						</div>
						</div>
						<input type="checkbox" id="click3" style="display:none" />
						
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
							<div class="name"><?php echo $firstname ?></div>
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
							<div class="button"><a class="add-button">+</a><span style="font-size:15px; text-decoration-line:underline; font-color:blue;">  Add hobbies</span></div>
						</label>
						<div class="modal">
							<div class="modal__content">
								<div class="title">
									<h1>Add Hobbies</h1>
								</div>
								<form method="POST" action="profile.php" class="add-form">

								<div class="certificate">
									<div class="input-fields">
										<input type="text" name="hob" class="input" placeholder="Tell us your hobby!">

										
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
								<p>Courses
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
						
							<div class="modal">
							<div class="modal__content">
								<div class="title">
									<h1>Add Courses</h1>
								</div>
								<form method="POST" action="profile.php" class="add-form">

								<div class="certificate">
									<div class="input-fields">
										<input type="text" class="input" name="name" placeholder="Name">

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

								<p>Workshops
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
							<p><span><i class="fa fa-check-circle" aria-hidden="true"></i></span<span><?php echo $row["name"]; ?></span>
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
						
							<div class="modal">
							<div class="modal__content">
								<div class="title">
									<h1>Add Workshops</h1>
								</div>
								<form method="POST" action="profile.php" class="add-form">

								<div class="certificate">
									<div class="input-fields">
										<input type="text" class="input" name="name" placeholder="Name">

										<input type="text" name="date" placeholder="Date" class="input" onfocus="(this.type='date')"
											onblur="(this.type='text')">

											

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
				
				<div id="Portfolio" class="tab-content">
					<div class="portfolio-box">
						
					<div class="resume"> 
					<a href="#" onclick="return xepOnline.Formatter.Format(['print','print2','print3','print4','print5'],{render:'download',foStyle:[{background:'white'}]});">
					<button>Print</button>
					</a>
				</div> 	
					</div>
					
				</div>
			</div>
		</div>
		<div style="clear: both;"></div>

	</div>
	  

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