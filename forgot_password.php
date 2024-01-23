<!-- forgot_password.php -->
<?php
session_start();
include 'db_connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Generate a random token
        $token = bin2hex(random_bytes(32));

        // Store the token in the database
        $updateSql = "UPDATE users SET pass='$token' WHERE email='$email'";
        mysqli_query($conn, $updateSql);

        // Send a password reset email
        // $subject = "Password Reset Request";
        // $message = "Hello,\n\n";
        // $message .= "You have requested to reset your password. Click the following link to reset your password:\n\n";
        // $message .= "http://yourwebsite.com/reset_password.php?token=$token\n\n"; // Update with your reset password page URL
        // $message .= "If you did not request this, please ignore this email.\n\n";
        // $message .= "Best regards,\nThe Support Team";

        // $headers = "From: no-reply@yourwebsite.com\r\n";
        // $headers .= "Reply-To: support@yourwebsite.com\r\n";
        // $headers .= "X-Mailer: PHP/" . phpversion();

        // mail($email, $subject, $message, $headers);

        if ($result) {
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = ;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 's4952889@gmail.com';                     //SMTP username
                $mail->Password   = 'shivamt..';                               //SMTP password
                $mail->SMTPSecure = 'Tls';            //Enable implicit TLS encryption
                $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('s4952889@gmail.com','Eagle');
                $mail->addAddress($email,$name);
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Welecom To My Website';
                $mail->Body    = '<p> This is the Verifecation Link<b><a href="http://localhost/coursephp/P1/Sliding/?Verification='.$token.'">"http://localhost/coursephp/P1/Sliding/?Verification='.$token.'"</a></b></p>';

                $mail->send();
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            $msg = "<div class='alert alert-info'>we've send a verification code on Your email Address</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Something was Wrong</div>";
            
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/custmersupport.css">
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
    <title>Document</title>
</head>
<body>
    <div id="nav-placeholder">

    </div>
      
    <script>
    $(function(){
      $("#nav-placeholder").load("navbar.php");
    });
    </script>
    <div class="container">
        <h1>Forgot Password</h1>
        <form action="forgot_password.php" method="post">
            <input type="email" name="email" placeholder="Email" required />
            <button type="submit">Reset Password</button>
        </form>

    </div>
    
</body>
</html>
