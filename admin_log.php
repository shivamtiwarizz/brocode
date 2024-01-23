<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php'; // Include your database connection file

    $email = $_POST["email"];
    $pass = $_POST["pass"]; // Corrected variable name

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($pass, $row['pass'])) {
            if ($row['email'] === 'admin@admin.com') {
                $_SESSION['admin'] = true; // Set admin session variable
                header("Location: admin.php"); // Redirect to admin panel
                exit();
            } else {
                // Regular user login
                $_SESSION['email'] = isset($row['email']) ? $row['email'] : "Username";
                $_SESSION['name'] = isset($row['name']) ? $row['name'] : "Username";
                header("Location: index.php"); // Redirect to dashboard or desired page
                exit();
            }
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<?php include 'db_connect.php' ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/log&sign.css">
    <link rel="icon" href="assets/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js"></script>

    <title>Login and SignUp</title>
</head>
<style>
.input-group-append {
    position:absolute;
    top:24%;
    left:90%;
    background-color:#fff;
}
</style>

<body>

    <div style="top:0%;width: 100%; margin-top: 12rem;" id="nav-placeholder">

    </div>


    <div class="container" style="margin-top: 101px;" id="container">

        <div class="form-container sign-in-container">
            <form action="admin_log.php" method="post">
                <h1 class="heading">Log In</h1>
                <div class="social-container"></div>
                <span>Use your Email and Password for login</span>
                <input type="email" name="email" placeholder="Email" required />
                <div class="input-group">
    <input type="password" name="pass" id="passwordField" placeholder="Password" required />
    <div class="input-group-append">
        <span class="input-group-text" id="togglePassword">
            <i class="fas fa-eye-slash" id="passwordIcon"></i>
        </span>
    </div>
</div>


                <a href="forgot_password.php">Forgot your password?</a>
                <button id="btnlog" type="submit" style="padding: 12px;">Log In</button>
            </form>
        </div>

        <div class="overlay-container" style="z-index: 1;">
            <div style="z-index: 2;" class="overlay">

                <div style="z-index: 1;" class="overlay-panel overlay-right">
                    <h1>Hello,Admin!</h1>
                    <p>Enter your personal details to enter in admin page</p>

                </div>
            </div>
        </div>
    </div>
    <?php
   
?>


    <div style="margin-top: 101px;" id="footer-placeholder">
    </div>
  
<script>
    // Function to toggle password visibility
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("passwordField");
        var passwordIcon = document.getElementById("passwordIcon");
        
        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        } else {
            passwordField.type = "password";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        }
    }

    // Add a click event listener to the password icon
    var togglePassword = document.getElementById("togglePassword");
    if (togglePassword) {
        togglePassword.addEventListener("click", togglePasswordVisibility);
    }
</script>


    <script>
    $(function() {
        $("#footer-placeholder").load("footer.php");
    });
    </script>
    <script src="./log&sign.js" type="text/javascript"></script>



    <script>
    $(function() {
        $("#nav-placeholder").load("navbar.php");
    });
    </script>
</body>

</html>