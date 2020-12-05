<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style_register.css">
    <link rel="stylesheet" href="footer.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    <title>Simple Registration Form</title>
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
      <button onclick="location.href='Homepage.php'" class="sign_btn">Back</button>
      <div class="svg" onclick="location.href='Homepage.php'"><svg height="35pt" viewBox="0 -10 490.66667 490"
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

    <div class="inner">
        <div class="photo">
            <img src="registration.svg" alt="">
        </div>

        <div class="user-form">
            <h1>Welcome!</h1>
            <form action="registration.php" method="post">
                <!-- <label for="firstname"><b>First Name</b><label> -->
                <input type="text" id="firstname" name="firstname" placeholder="First Name" required>

                <!-- <label for="lastname"><b>Last Name</b><label> -->
                <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>

                <!-- <label for="email"><b>Ves Email</b><label> -->
                <input type="email" id="email" name="email" pattern="^[A-Za-z0-9]+(.|_)+[A-Za-z0-9]+@+ves.ac.in$" placeholder="Ves Email" required>

                <!-- <label for="phonenumber"><b>Phone Number</b><label> -->
                <input type="phone" id="phonenumber" name="phonenumber" placeholder="Phone Number" pattern="[1-9]{1}[0-9]{9}" required>
                                                   
                <!-- <label for="password"><b>Password</b><label> -->
                <input type="password" id="password" name="password" placeholder="Password" required>

                <div class="options">
                    <!-- <label><b>Branch</b></label> -->
                    <select id="Branch" name="Branch"  required>
                        <option value="INFT">INFT</option>
                        <option value="COMP">COMP</option>
                        <option value="EXTC">EXTC</option>
                        <option value="ETRX">ETRX</option>
                        <option value="INST">INST</option>
                    </select>
                    
                    <!-- <label><b>Semester</b></label> -->
                    <select id="Semester" name="Semester" required>
                        <option value="1">Sem &#x2160</option>
                        <option value="2">Sem &#8545</option>
                        <option value="3">Sem &#x2162</option>
                        <option value="4">Sem &#x2163</option>
                        <option value="5">Sem &#x2164</option>
                        <option value="6">Sem &#x2165</option>
                        <option value="7">Sem &#x2166</option>
                        <option value="8">Sem &#x2167</option>
                    </select>

                    <!-- <label><b>Year</b></label> -->
                    <select id="Year" name="Year" required>
                        <option value="First Year">First Year</option>
                            <option value="Second Year">Second Year</option>
                            <option value="Third Year">Third Year</option>
                            <option value="Fourth Year">Fourth Year</option>
                    </select>
                </div>

                <!-- <label for="roll_no"><b>Roll No.</b><label> -->
                <input type="number" id="roll_no" name="roll_no" placeholder="Roll No" required>

                <div class="action-btn">
                    <button type="submit" class="btn primary" id="register">Submit</button>
                </div>

            </form>
        </div>
    </div>
    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        $(function () {
            $('#register').click(function (e) {

                var valid = this.form.checkValidity();

                if (valid) {
                    var firstname = $('#firstname').val();
                    var lastname = $('#lastname').val();
                    var email = $('#email').val();
                    var phonenumber = $('#phonenumber').val();
                    var password = $('#password').val();
                    var Branch = $('#Branch').val();
                    var Semester = $('#Semester').val();
                    var Year = $('#Year').val();
                    var roll_no = $('#roll_no').val();

                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: { firstname: firstname, lastname: lastname, email: email, phonenumber: phonenumber, password: password, Branch: Branch, Semester: Semester, Year: Year, roll_no: roll_no },
                        success: function (data) {
                            Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success',
                                'icon': 'success'
                            }).then(function() {
                                window.location = "Homepage.php";
                            });
                            
                        },
                        error: function (data) {
                            Swal.fire({
                                'title': 'Errors',
                                'text': 'There was an error.',
                                'type': 'error',
                                'icon': 'error'
                            })
                        }
                    });

                } else {
                }
            });


        });
    </script>

    <div class="regis-footer">
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
    </div>
</body>

</html>