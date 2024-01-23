<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['email'])) {
    header("Location: log&sign.php");
    exit();
}
?>
