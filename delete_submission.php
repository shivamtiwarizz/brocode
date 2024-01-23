<?php
// Include database connection
include 'db_connect.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID of the submission to be deleted
    $id = $_POST["id"];

    // Delete the submission from the database
    $deleteQuery = "DELETE FROM contact_form_data WHERE id = '$id'";
    
    if (mysqli_query($conn, $deleteQuery)) {
        echo "success";
    } else {
        echo "error";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
