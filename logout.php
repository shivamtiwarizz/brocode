<?php
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Prevent output buffering
ob_start();

// Redirect to the login page
header("Location: log&sign.php"); // Change "log&sign.php" to the actual login page URL

// Clean output buffer
ob_end_flush();

exit();
?>