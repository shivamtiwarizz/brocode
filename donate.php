
<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['email'])) {
    header("Location: log&sign.php");
    exit();
}
?>
 <?php include 'db_connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="css/donate.css">
    <title>Donate</title>
    <link rel="icon" href="assets/icon.png">
    <!-- Compressed CSS -->
    <link rel="stylesheet" href=
    "https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
        <!-- Compressed JavaScript -->
        <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        </script>
        <script src=
    "https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js">
        </script>
</head>
<body style="background-attachment: fixed;
background-size: cover;
background-position: center;
overflow: auto;
height: 100%;

background-image: url(assets/bannerShiva.jpg);">
    <!-- ----------------------------------------NAVBAR----------------------------------------------------->
    <div id="nav-placeholder">

    </div>
      
    <script>
    $(function(){
      $("#nav-placeholder").load("navbar.php");
    });
    </script>

    <!-- --------------------------------------------DONATE----------------------------------------------------->
    <div class="donate">
        <div class="donate_container">
            <h1>Let's Make a Change Together!</h1>
            <p>The greatest use of a life is to spend it on something that will outlast it.</p>
            <p class="second">Any help or donation,<br>no matter how big or small,<br> will be whole-heartedly and deeply appreciated.</p>
            <div class="side_btn">
                
                <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_MVsgUQmfp5ZrhK" async> </script> </form>
            </div>
        </div>
    </div>
    <!-- --------------------------------------------FOOTER-------------------------------------------------------->
    <div id="footer-placeholder">
    </div>
    
        <script>
            $(function () {
                $("#footer-placeholder").load("footer.php");
            });
        </script>
   
      
    
</body>
</html>
