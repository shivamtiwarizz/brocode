<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php'; // Include your database connection file

    $email = $_POST["email"];
    $pass = $_POST["pass"]; // Corrected variable name

    $sql = "SELECT * FROM users WHERE (pass='$pass' or email='$email')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (isset($row['pass']) && password_verify($pass, $row['pass'])) {
            // Password is correct, set session variables and redirect
           
            $_SESSION['name'] = isset($row['name']) ? $row['name'] : "User"; // Use a default if name is not set
            header("Location: index.php"); // Redirect to dashboard or desired page
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
<html>
<head>
    <title>Login Process</title>
</head>
<body>
    <?php
    if (!empty($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
</body>
</html>

