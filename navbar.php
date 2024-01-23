<?php
session_start(); ?>
 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="assets/icon.png">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Compressed CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" />

  <link href="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <!-- Compressed JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js">
  </script>
  <style>
    ::-webkit-scrollbar {
      display: none;
    }
body{
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}
    .progress__wrapper {
      position: fixed;
      top: 0px;
      left: 0;
      z-index: 100;
      width: 100%;
      height: 4px;
      background-color: #2c2c2c;
    }

    .progress__bar {
      display: block;
      width: 0;
      height: inherit;
      color: brown;
      background: rgb(255, 255, 255);
    }


    .navbar {
      color: #ffffff;
      background: #000000;

      border-radius: 0;
      border: none;
      box-shadow: 0 4px 0px black;

      position: sticky;
      margin-top: -12px;
    }

    .navbar img {
      margin-left: 30px;
      height: 50px;

    }



    .navbar .nav-item i {
      font-size: 18px;
      margin-right: 3px;
      margin-left: 20px;
    }
   



    .navbar .nav-item span {
      position: relative;
      top: 0px;
      transition: 0.9s;
font-size:17px;
    }

    .navbar .nav-item span:after {
      content: '';
      position: absolute;
      width: 100%;
      transform: scaleX(0);
      margin-bottom: -5px;
      height: 3px;
      bottom: 0;
      left: 0;
      background-color:
        #ffffff;
      transform-origin: bottom right;
      transition: transform 0.36s ease-in-out;
    }

    .navbar .nav-item span:hover:after {
      transform: scaleX(1);
      transform-origin: bottom left;
    }


    .navbar .navbar-nav>a {
      color: #fcfcfc;
      padding: 8px 111px;
      font-size: 17px;
      font-weight: 600;
    }

    .navbar .navbar-nav>a:after {
      content: '';
      position: absolute;
      width: 0%;
      transform: scaleX(0);
      margin-bottom: -5px;
      height: 3px;
      bottom: 0;
      left: 0;
      background-color:
        #ffffff;
      transform-origin: bottom right;
      transition: transform 0.36s ease-in-out;
    }

    .navbar .navbar-nav>a:hover:after {
      transform: scaleX(1);
      transform-origin: bottom left;
    }

    .navbar .dropdown-item i {
      font-size: 16px;
      min-width: 100%;
    }




    .navbar .dropdown-menu {
      position: relative;
      border-radius: 1px;
      background-color: #000000;
      border-color: #000000;
      box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
      margin-left: 0px;
      box-shadow: 0 5px 50px black;
    }

    .navbar .dropdown-menu a {
      color: #ffffff;
      padding: 6px 20px;
      line-height: normal;
      font-size: 20px;
      transition: .0s;
    }



    .dropdown-menu a:hover {
      color: #000000;
      background-color: #fcfcfc;
    }


    .headdonation {
      font-size: 40px;
      font-weight: 700;
    }
    @media (max-width: 768px) {
      /* Example media query for smaller screens */

      /* Modify the navigation bar styles for smaller screens */
      .navbar {
        background-color: #000; /* Change background color */
        margin-top: 0; /* Adjust margin-top */
      }

      .navbar img {
        margin-left: 10px; /* Adjust logo margin */
        height: 40px; /* Adjust logo height */
      }

      .navbar .nav-item i {
        font-size: 16px; /* Adjust icon size */
        margin-right: 2px; /* Adjust icon margin */
        margin-left: 10px; /* Adjust icon margin */
      }

      .navbar .nav-item span {
        font-size: 16px; /* Adjust text size */
      }

      /* Add other responsive styles as needed */
    }
    /* .dark-mode {
  background-color: black;
  color: white;
} 
.darkmode{
  filter: invert(100%);

}
.darkmodebtn{

 margin-left:20% ;
} */
  </style>
  <title>navbar</title>
</head>


<body style="background-attachment: fixed;
background-size: cover;
background-position: center;
overflow: auto;
height: 100%;

background-image: url();">

  <div data-sticky-container>
    <div data-sticky>
      <nav class="navbar navbar-expand-lg " id="NavBar">
        <a href="index.php"><img id="navlogo" src="mainLogo.png" alt="logo"></a>
        <!-- <button class="darkmodebtn" onclick="myFunction()"><img class="darkmode" src="assets/dark-mode.png" alt=""></button>
<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script> -->
        </form>
        <div class="navbar-nav ml-auto">
          

          <a href="index.php" class="nav-item nav-link active"><i style="color: rgb(255, 255, 255);"
              class="fa fa-home"></i><span style="color: rgb(255, 255, 255);">HOME</span></a>

          <a href="Aboutus.php" class="nav-item nav-link"><i class="fa fa-info-circle"></i><span>ABOUT</span></a>
          <div class="nav-item dropdown">

            <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle"><i class="fa fa-users"
                style="color: rgb(255, 255, 255);"></i><span
                style="color: rgb(255, 255, 255);  font-weight: 600;  ">SERVICES</span></a>

            <div class="dropdown-menu">
              <a href="gallery.php" class="dropdown-item">Gallery</a>
              <a href="calender.php" class="dropdown-item">Calendar</a>
              <!-- <a href="notification.php" class="dropdown-item">Notifications</a> -->
              <a href="contactus.php" class="dropdown-item">Contact us</a>
              
              <a href="#" data-toggle="dropdown" style="background-color:black;color:white" class="dropdown-item dropdown-toggle">Online Services</a>
              <div class="nav-item dropdown">
                <div class="dropdown-menu bookings" style="margin-left: 150px;">
                  <a href="livedarshan.php" class="dropdown-item">Live darshan</a>
                  <!-- <a href="#" class="dropdown-item">Arati booking</a> -->
                  <a href="parking.php" class="dropdown-item">Parking booking</a>
                </div>
              </div>
              <div class="divider dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item"> Logout</a>
            </div>
          </div>

          <a href="donate.php" class="nav-item nav-link"><i class="fa fa-money"></i><span>DONATION</span></a>
          <a href="store/home.php" class="nav-item nav-link active"><i style="color: rgb(255, 255, 255);"
              class="fa fa-home"></i><span style="color: rgb(255, 255, 255);">STORE</span></a>
           <?php
    if (isset($_SESSION['name'])) {
        echo '<div class="dropdown">
        
        <a href="#" style="background-color: #ffffff00; border-color: #ffffff00;" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> <i style=" margin-right:4px;" class="fa fa-user-circle"
        aria-hidden="true"></i><span style=" font-size: 17px;
        font-weight: 600; text-transform: uppercase; ">' . $_SESSION['name'] . '</span></a>

        <ul class="dropdown-menu" style=" margin-right:0px; z-index:5;">
          <li><a class="dropdown-item" href="profile.php">profile</a></li>
          <li><a class="dropdown-item" href="logout.php">logout</a></li>
         
        </ul>
      </div>
       ';
    } else {
        echo '<a href="log&sign.php" class="nav-item nav-link"><span><i class="fa fa-sign-in"
        aria-hidden="true"></i><span>REGISTER</span></span></a>';
    }
    ?>
              
        </div>
    </div>
    </nav>
  </div>
  <div class="progress__wrapper">
    <span class="progress__bar"></span>
  </div>

  <script>
    const navbar = document.querySelector('#NavBar');
    let top = navbar.offsetTop;
    function stickynavbar() {
      if (window.scrollY >= top) {
        navbar.classList.add('sticky');
      } else {
        navbar.classList.remove('sticky');
      }
    }
    window.addEventListener('scroll', stickynavbar);

  </script>
  <script>
    const body = document.body;
    const progressBar = document.querySelector('.progress__bar');
    console.log(progressBar)
    const updateProgress = () => {
      let scrollPos =
        (window.scrollY / (body.scrollHeight - window.innerHeight)) * 100;
      console.log(scrollPos)
      progressBar.style.width = `${scrollPos}%`;
      requestAnimationFrame(updateProgress);
    };

    updateProgress()
  </script>
  <script>
    $(document).foundation();
  </script>
  </div>

</body>

</html>