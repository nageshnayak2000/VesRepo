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
    <title>Simple Registration Form</title>
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
</body>

</html>