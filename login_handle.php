
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php'; // Include your database connection file

    $email = $_POST["email"];
    $pass = $_POST["pass"]; // Corrected variable name

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($pass, $row['pass'])) {
            $_SESSION['email'] = isset($row['email']) ? $row['email'] : "Username";
            $_SESSION['name'] = isset($row['name']) ? $row['name'] : "Username";
            header("Location: index.php"); // Redirect to dashboard or desired page
            exit();
        } else {
            header("Location: log&sign.php");
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }

    mysqli_close($conn);
}
?>