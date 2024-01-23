<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php'; // Include your database connection file

    $email = $_POST["email"];
    $token = $_POST["token"];

    // Check if the provided email and token match what's stored in your database
    $sql = "SELECT * FROM users WHERE email=? AND token=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $token);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        // Token is valid; show the password reset form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newPassword = $_POST["new_password"];

            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the user's password in the users table
            $updatePasswordSql = "UPDATE users SET pass=? WHERE email=?";
            $updatePasswordStmt = mysqli_prepare($conn, $updatePasswordSql);
            mysqli_stmt_bind_param($updatePasswordStmt, "ss", $hashedPassword, $email);
            $updatePasswordResult = mysqli_stmt_execute($updatePasswordStmt);

            if ($updatePasswordResult) {
                // Update the token in the users table (optional)
                $newToken = bin2hex(random_bytes(15));
                $updateTokenSql = "UPDATE users SET token=? WHERE email=?";
                $updateTokenStmt = mysqli_prepare($conn, $updateTokenSql);
                mysqli_stmt_bind_param($updateTokenStmt, "ss", $newToken, $email);
                mysqli_stmt_execute($updateTokenStmt);

                // Display a success message
                $successMessage = "Password reset successful. You can now <a href='log&sign.php'>log in</a> with your new password.";
            } else {
                $error = "Error resetting the password. Please try again.";
            }
        }
    } else {
        $error = "Invalid email or token. Please check your email and token.";
    }

    mysqli_close($conn);
}
?>

<!-- HTML form for resetting the password -->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="assets/icon.png">
         <!-- Compressed CSS -->
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <!-- Compressed JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js">
    </script>
   <style>
    /* CSS for the Reset Password form */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin-top: 20px;
    color: #333;
}

.container {
           
          
            background-color: #fff;
            padding: 20px;
            border-radius: 5px; 
            
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
form {
    width: 100%;
 
    padding: 20px;
    background-color: #fff;
    margin-left:30px;
    border-radius: 5px;
}

form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
    width: 420px;
}

form input[type="email"],
form input[type="text"],
form input[type="password"] {
    width: 100%;
    
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #000;
    color: #fff;
    border: 2px solid black;
    transition:0.3s;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

form button[type="submit"]:hover {
    background-color: #fff;
    color: #000;
}

p {
    text-align: center;
    margin-top: 10px;
    color: #333;
}

   </style>
</head>
<body><div style="margin-bottom: 101px;" id="nav-placeholder">

</div>

    <h1>Reset Password</h1>
    <?php
    if (isset($error)) {
        echo '<p style="color: red;">' . $error . '</p>';
    } elseif (isset($successMessage)) {
        echo '<p style="color: green;">' . $successMessage . '</p>';
    }
    ?><div class="container">
    <form action="reset_password.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="token">Token:</label>
        <input type="text" name="token" required>
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required>
        <button type="submit">Reset Password</button>
    </form></div>
    <script>
        $(function () {
            $("#nav-placeholder").load("navbar.php");
        });
    </script>
 <div style="margin-top: 101px;" id="footer-placeholder">
    </div>

    <script>
        $(function () {
            $("#footer-placeholder").load("footer.php");
        });
    </script>
</body>
</html>
