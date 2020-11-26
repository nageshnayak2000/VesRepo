<!DOCTYPE html>
<html>

<head>
	<title>Professional profile</title>
	<link rel="stylesheet" type="text/css" href="profile.css">
	<link rel="stylesheet" type="text/css"
		href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/4d01ce16d1.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="modal.css">
</head>
<body>
	<?php
	$servername='localhost';
	$username='root';
	$password='';
	$dbname = "vesrepo";
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	if(!$conn){
		   die('Could not Connect My Sql:' .mysql_error());
	}
	echo "Connected";
	//include_once 'config.php';
	if(isset($_POST['save']))
	{	 
		
		 $title = $_POST['title'];
		 $st_date = $_POST['st_date'];
		 $end_date = $_POST['end_date'];
		 //$desc = $_POST['desc'];
		 $img = $_POST['img'];
		 $role= $_POST['role'];
		 $sql = "INSERT INTO internships (company_name,start_date, end_date,cert_pic, account_id, Role)
		 VALUES ('$title','$st_date','$end_date','$img', '(SELECT RAND(6))', '$role')" ;
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
	 	 VALUES ('$title_comp','$desc','$date','$img', '(SELECT RAND(6))')" ;
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
	 	 VALUES ('$type','$desc','$date','$img', '(SELECT RAND(6))')" ;
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
		 VALUES ('$name','$st_date','$end_date','$img', '(SELECT RAND(6))')" ;
		 if (mysqli_query($conn, $sql)) {
			echo "New record created successfully !";
		 } else {
			echo "Error: " . $sql . "
	" . mysqli_error($conn);
		 }
		 
	}
	 
	
	$query2= "SELECT * from internships";
	$result2= mysqli_query($conn, $query2);
	$query3= "SELECT * from competitions";
	$result3= mysqli_query($conn, $query3);
	$query4= "SELECT * from other";
	$result4= mysqli_query($conn, $query4);
	$query5= "SELECT * from courses";
	$result5= mysqli_query($conn, $query5);
	?>
		
	

<body>
	<div class="profile-main">
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
					<div class="skill-box">
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
						<div class="heading">
							<p>Internships
								<!-- <label>10 Year Experience</label></p> -->
						</div>
						<div class="desc">
						<?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                          ?>  
							<p><span><i class="fa fa-check-circle" aria-hidden="true"></i></span><span><?php echo $row["Role"]; ?></span><span><span>,</span><?php echo $row["company_name"]; ?></span></p>
                            
                          <?php  
                          }  
                          ?>  
							
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
						<div class="heading">
							<p>Competitions
								<!-- <label>10 Year Experience</label></p> -->
						</div>
						<div class="desc">
						<?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                          ?>  
							<p><span><i class="fa fa-check-circle" aria-hidden="true"></i></span><span><?php echo $row["name"]; ?></span>
                            </p>
                          <?php  
                          }  
                          ?> 
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
						<div class="heading">
							<p>Other
								<!-- <label>10 Year Experience</label></p> -->
						</div>
						<div class="desc">
						<?php  
                          while($row = mysqli_fetch_array($result4))  
                          {  
                          ?>  
							<p><span><i class="fa fa-check-circle" aria-hidden="true"></i></span<span><?php echo $row["type"]; ?></span>
                            </p>
                          <?php  
                          }  
                          ?> 
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
							<div class="name">nagesh nayak</div>
							<div class="basic-details">
								<span>Branch : INFT</span>
								<span>Year : 2018</span>
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
								<span>Sleeping</span>
								<span>Dancing</span>
								<span>Velle rehna</span>
							</div>
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
							<div class="heading">
								<p>Courses
									<!-- <label>10 Year Experience</label></p> -->
							</div>
							<div class="desc">
							<?php 
							// if ($result5==null) {
							// 	echo "No courses added";
							// }
                          while($row = mysqli_fetch_array($result5))  
                          {  
							  
							  if(sizeof($row) == 0 ){?>

							<span><?php	  echo "No courses added"; ?></span>
							<?php
							  }
							  ?>
                          
							<span><?php echo $row["name"]; ?></span>
                            
                          <?php  
                          }  
                          ?> 
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
							<div class="heading">
								<p>Workshops
									<!-- <label>10 Year Experience</label></p> -->
							</div>
							<div class="desc">
							<?php  
                          while($row = mysqli_fetch_array($result5))  
                          {  
                          ?>  
							<p><span><i class="fa fa-check-circle" aria-hidden="true"></i></span<span><?php echo $row["name"]; ?></span>
                            </p>
                          <?php  
                          }  
                          ?> 
							</div>
							<!-- <div class="add-icon">
								<a href="#open-modal"><i class="fas fa-plus-circle fa-2x"></i></a>
							</div> -->
							<input type="checkbox" id="click5" style="display:none" />
						<label for="click5">
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
											<button type="submit" name="save_con">Submit</button>
											<label for="click5" class="btn">
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
							<div class="heading">
								<p>Workshops
									<!-- <label>10 Year Experience</label></p> -->
							</div>
							<div class="desc">
							<?php  
                          while($row = mysqli_fetch_array($result5))  
                          {  
                          ?>  
							<span><?php echo $row["name"]; ?></span>
                            
                          <?php  
                          }  
                          ?> 
							</div>
							<!-- <div class="add-icon">
								<a href="#open-modal"><i class="fas fa-plus-circle fa-2x"></i></a>
							</div> -->
							<input type="checkbox" id="click5" style="display:none" />
						<label for="click5">
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
											<button type="submit" name="save_con">Submit</button>
											<label for="click5" class="btn">
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
						<div class="portfolio-img-box">
							<h3>Web Design</h3>
							<img src="http://nicesnippets.com/demo/up-web-design.jpg">
						</div>
						<div class="portfolio-img-box">
							<h3>Web development</h3>
							<img src="http://nicesnippets.com/demo/up-web-development.png">
						</div>
						<div class="portfolio-img-box">
							<h3>SEO</h3>
							<img src="http://nicesnippets.com/demo/up-seo.jpg">
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