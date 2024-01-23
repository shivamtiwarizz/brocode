<?php
$showAlert = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';

    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $cnfpass = $_POST["cnfpass"];
    $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $checkEmailQuery);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows > 0) {
        $error = "Email already exists. Please choose a different email address.";
    } else {

    $defaultImage = "defaultimg.jpg"; // Specify the default image filename here
    $targetDirectory = "uploads/"; // Change this to your desired directory

    // Check if an image was uploaded
    if (isset($_FILES["img"]) && $_FILES["img"]["error"] === UPLOAD_ERR_OK) {
         $img = $_FILES["img"]["name"];

         // Check if the file is an image
         $imageFileType = strtolower(pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION));
         $allowedExtensions = array("jpg", "jpeg", "png");
         if (!in_array($imageFileType, $allowedExtensions)) {
            $error = "Invalid image format. Please upload a JPG, JPEG, PNG.";
         } else {
            $targetFilePath = $targetDirectory . $img;

            if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFilePath)) {
                // Generate the hashed password and token
                $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
                $token = bin2hex(random_bytes(15));

                // Continue with the rest of the code to insert the user with the uploaded image
                // Use prepared statement to prevent SQL injection
                $sql = "INSERT INTO users (name, email, pass, token, status, img, date) VALUES (?, ?, ?, ?, 'inactive', ?, current_timestamp())";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $hashedPass, $token, $img);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    $showAlert = true;
                } else {
                    $error = "Error: " . mysqli_error($conn);
                }
            } else {
                $error = "Error uploading image.";
            }
        }
     } 
      else {
       
        $img = $defaultImage;

       
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(15));

        $sql = "INSERT INTO users (name, email, pass, token, status, img, date) VALUES (?, ?, ?, ?, 'active', ?, current_timestamp())";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $hashedPass, $token, $img);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $showAlert = true;
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}}
?>




<!DOCTYPE html>
<html lang="en">
<?php include 'db_connect.php' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/log&sign.css">
    <link rel="icon" href="assets/icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js"></script>

    <title>Login and SignUp</title>
</head>

<body>

    <div style="top:0%;width: 100%; margin-top: 12rem;margin-bottom: 6rem;" id="nav-placeholder">

    </div>
   

    <div class="container" style="margin-top: 101px;" id="container">
        <div style="z-index: 1;" class="form-container sign-up-container">
        <form action="log&sign.php" method="post" enctype="multipart/form-data">
    <h1 class="heading">Create Account</h1>
    <div class="social-container" style="z-index:-1;"></div>
    <span>Sign Up Using email and password</span>
    <input type="text" name="name" placeholder="Name" required/>
    <input type="email" name="email" placeholder="Email" required/>
    <input  type="password" name="pass" id="pass" placeholder="Password" minlength="6" required />
<span  style="position:absolute; top:54%; left:86%;" class="password-toggle-icon">
    <i class="fas fa-eye" id="passwordIcon"></i>
</span>

<input type="password" name="cnfpass" id="cnfpass" placeholder="Confirm Password" minlength="6" required />
<span style="position:absolute; top:65%; left:86%;" class="password-toggle-icon">
    <i class="fas fa-eye" id="cnfPasswordIcon"></i>
</span><br>
    <div id="passMessage" style="color: red; font-size:15px;position:absolute;top:73%;"></div>
    
    <input name="img" placeholder="Confirm Password" type="file">
    <label style="color:grey;font-size: 0.7em;rem;margin-top:-10px;margin-left:-20.5rem" for="img">(optional)</label>
    <button id="btnSig" type="submit" style="padding: 12px;">Sign Up</button>
</form>

        </div>
        <div class="form-container sign-in-container">
    <form action="login_handle.php" method="post">
        <h1 class="heading">Log In</h1>
        <div class="social-container"></div>
        <span>Use your Email and Password for login</span>
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="pass" id="pass1" placeholder="Password"  required />
<span style="position:absolute; top:60%; left:86%;" class="password-toggle-icon">
    <i class="fas fa-eye" id="logpasswordIcon"></i>
</span>
        <a href="view_token.php">Forgot your password?</a>
        <button id="btnlog" type="submit" style="padding: 12px;">Log In</button>
    </form>
</div>

        <div class="overlay-container" style="z-index: 1;">
            <div style="z-index: 2;" class="overlay">
                <div style="z-index: 1;" class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Log In</button>
                </div>
                <div style="z-index: 1;" class="overlay-panel overlay-right">
                    <h1>Hello,Devotee!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show mt-5" style="top:620px; position:absolute" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
?>
<?php
    // Display error message if exists
    if (!empty($error)) {
        echo "<div style='color: red; background-color: #f0f0f0; padding: 10px;'>$error</div>";
    } 
    ?>

    <div style="margin-top: 101px;" id="footer-placeholder">
    </div>

    <script>
        $(function () {
            $("#footer-placeholder").load("footer.php");
        });
    </script>
    <script src="./log&sign.js" type="text/javascript"></script>



    <script>
        $(function () {
            $("#nav-placeholder").load("nav2.php");
        });
    </script>
   
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        const passInput = document.getElementById('pass');
        const cnfpassInput = document.getElementById('cnfpass');
        const passMessage = document.getElementById('passMessage');

        passInput.addEventListener('input', function() {
            const passValue = passInput.value;
            const cnfpassValue = cnfpassInput.value;

            if (passValue.length < 6) {
                passMessage.textContent = 'Password must be at least 6 characters';
            } else {
                passMessage.textContent = '';
            }

            if (cnfpassValue.length > 0 && passValue !== cnfpassValue) {
                passMessage.textContent = 'Passwords do not match';
            }
        });

        cnfpassInput.addEventListener('input', function() {
            const passValue = passInput.value;
            const cnfpassValue = cnfpassInput.value;

            if (cnfpassValue.length > 0 && passValue !== cnfpassValue) {
                passMessage.textContent = 'Passwords do not match';
            } else if (passValue.length < 6) {
                passMessage.textContent = 'Password must be at least 6 characters';
            } else {
                passMessage.textContent = '';
            }
        });
    });
</script>


<script>
    // Function to toggle password visibility for Confirm Password
    function toggleCnfPasswordVisibility() {
        var cnfPasswordField = document.getElementById("cnfpass");
        var cnfPasswordIcon = document.getElementById("cnfPasswordIcon");

        if (cnfPasswordField.type === "password") {
            cnfPasswordField.type = "text";
            cnfPasswordIcon.classList.remove("fa-eye");
            cnfPasswordIcon.classList.add("fa-eye-slash");
        } else {
            cnfPasswordField.type = "password";
            cnfPasswordIcon.classList.remove("fa-eye-slash");
            cnfPasswordIcon.classList.add("fa-eye");
        }
    }

    // Function to toggle password visibility for Login Password
    function toggleLoginPasswordVisibility() {
        var loginPasswordField = document.getElementById("pass1");
        var loginPasswordIcon = document.getElementById("logpasswordIcon");

        if (loginPasswordField.type === "password") {
            loginPasswordField.type = "text";
            loginPasswordIcon.classList.remove("fa-eye");
            loginPasswordIcon.classList.add("fa-eye-slash");
        } else {
            loginPasswordField.type = "password";
            loginPasswordIcon.classList.remove("fa-eye-slash");
            loginPasswordIcon.classList.add("fa-eye");
        }
    }
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("pass");
        var passwordIcon = document.getElementById("passwordIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        }
    }

    // Add click event listeners to the password toggle icons
    var toggleCnfPasswordIcon = document.getElementById("cnfPasswordIcon");
    if (toggleCnfPasswordIcon) {
        toggleCnfPasswordIcon.addEventListener("click", toggleCnfPasswordVisibility);
    }

    var toggleLoginPasswordIcon = document.getElementById("logpasswordIcon");
    if (toggleLoginPasswordIcon) {
        toggleLoginPasswordIcon.addEventListener("click", toggleLoginPasswordVisibility);
    }
    var toggleIcon = document.getElementById("passwordIcon");
    if (toggleIcon) {
        toggleIcon.addEventListener("click", togglePasswordVisibility);
    }
</script>

</body>

</html>