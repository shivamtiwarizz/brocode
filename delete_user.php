<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location:delete_user.php");
    exit();
}

include 'db_connect.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete the user
    $deleteQuery = "DELETE FROM users WHERE id = $userId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "User ID not provided.";
}
?>
