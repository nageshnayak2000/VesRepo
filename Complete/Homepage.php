<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VesRepo</title>
  <link rel="stylesheet" href="Homepage.css">
  <link rel="stylesheet" href="footer.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap" rel="stylesheet">
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
      <button onclick="location.href='login.php'" class="sign_btn btn1">Sign in</button>
      <div class="svg" onclick="location.href='login.php'"><svg height="35pt" viewBox="0 -10 490.66667 490" width="35pt"
          xmlns="http://www.w3.org/2000/svg">
          <path
            d="m325.332031 251h-309.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h309.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
          <path
            d="m240 336.332031c-4.097656 0-8.191406-1.554687-11.308594-4.691406-6.25-6.25-6.25-16.382813 0-22.636719l74.027344-74.023437-74.027344-74.027344c-6.25-6.25-6.25-16.386719 0-22.636719 6.253906-6.25 16.386719-6.25 22.636719 0l85.332031 85.335938c6.25 6.25 6.25 16.382812 0 22.632812l-85.332031 85.332032c-3.136719 3.160156-7.230469 4.714843-11.328125 4.714843zm0 0" />
          <path
            d="m256 469.667969c-97.089844 0-182.804688-58.410157-218.410156-148.824219-3.242188-8.191406.808594-17.492188 9.023437-20.734375 8.191407-3.199219 17.515625.789063 20.757813 9.046875 30.742187 78.058594 104.789062 128.511719 188.628906 128.511719 111.742188 0 202.667969-90.925781 202.667969-202.667969s-90.925781-202.667969-202.667969-202.667969c-83.839844 0-157.886719 50.453125-188.628906 128.511719-3.265625 8.257812-12.566406 12.246094-20.757813 9.046875-8.214843-3.242187-12.265625-12.542969-9.023437-20.734375 35.605468-90.414062 121.320312-148.824219 218.410156-148.824219 129.386719 0 234.667969 105.28125 234.667969 234.667969s-105.28125 234.667969-234.667969 234.667969zm0 0" />
        </svg></div>
    </nav>
  </div>
  <div class="container">
    <h1 id=header_vesrepo>
      Welcome to VESIT Repository,<br>
      the largest student collection drive <br>of VESIT
    </h1>
    <section class="container1">
      <button data-hover="click me!">
        <div>View Profile</div>
      </button>
    </section>
    <section class="container2">
      <button onclick="location.href='registration.php'" data-hover="click me!">
        <div>Register Here</div>
      </button>
    </section>
    <section class="container3">
      <button data-hover="click me!">
        <div>Search Profile</div>
      </button>
    </section>
    <div class="circular-img">
      <img src="Webp.net-resizeimage (2).png ">
    </div>
  </div>

  <footer>
    <div class="footer">
      <div class="box">
        <h2>About us</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod totam soluta nesciunt, enim praesentium animi
          ab odit, similique vitae adipisci officia, vel consequatur accusantium?</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda vitae nisi iure provident fuga, omnis
          odit dolorem repellat cum ducimus, quis architecto perspiciatis id.</p>
        <div class="social">
          <a href="#">
            <i class="fab fa-facebook"></i>
          </a>
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="#">
            <i class="fab fa-youtube"></i>
          </a>
        </div>
      </div>
      <div class="box">
        <h2>Address</h2>
        <div class="address">
          <a href="#">
            <i class="fas fa-map-marker-alt"></i>
            123B Viet Nam
          </a>
          <a href="#">
            <i class="fas fa-phone-square-alt"></i>
            +84-23432123
          </a>
          <a href="#">
            <i class="fas fa-envelope"></i>
            abc@gmail.com
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