<?php
session_start();

// Check if the user is an admin, if not, redirect to login page
if (!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit();
}

include 'db_connect.php';

// Fetch user data
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

?>

<?php


// Handle add parking slot action
if (isset($_POST['add_slot'])) {
    $insertQuery = "INSERT INTO parking_slots (is_reserved) VALUES (0)";
    $conn->query($insertQuery);
}

function deleteParkingSlot($conn, $slotId) {
    $deleteQuery = "UPDATE parking_slots SET is_reserved = 0 WHERE id  = $slotId";
    if ($conn->query($deleteQuery) === TRUE) {
        return true; // Deletion successful
    } else {
        return false; // Deletion failed
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle delete parking slot action
    if (isset($_POST['delete_slot']) && isset($_POST['slot_id'])) {
        $slotIdToDelete = $_POST['slot_id'];

        if (deleteParkingSlot($conn, $slotIdToDelete)) {
            echo "Parking slot with ID $slotIdToDelete deleted successfully.";

            // Reset the selected slot fields
            $resetQuery = "UPDATE parking_slots SET is_reserved = 0, name = NULL, email = NULL, phoneNumber = NULL WHERE id = $slotIdToDelete";
            if ($conn->query($resetQuery)) {
                echo "Parking slot with ID $slotIdToDelete reset successfully.";
            } else {
                echo "Error resetting parking slot with ID $slotIdToDelete.";
            }
        } else {
            echo "Error deleting parking slot with ID $slotIdToDelete.";
        }
    }
}
// Handle reset parking slots action

if (isset($_POST['reset_slots'])) {
    // Reset all data in the parking_slots table
    $resetQuery = "UPDATE parking_slots SET is_reserved = 0, name = NULL, email = NULL, phoneNumber = NULL";
    
    if ($conn->query($resetQuery)) {
        echo "All parking slots have been reset.";
    } else {
        echo "Failed to reset parking slots.";
    }
}
// Retrieve and display reservations
$reservationsQuery = "SELECT * FROM parking_slots WHERE is_reserved = 1";
$reservationsResult = $conn->query($reservationsQuery);

// Retrieve and display bookings
// Add similar code to retrieve booking information

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        h1{
            text-align:center;
            margin-top: 20px;
        }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .edit-link, .delete-link {
        color: #007bff;
        text-decoration: none;
        margin-right: 10px;
    }

    .delete-link {
        color: #dc3545;
    }
</style>
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
</head>

<body> <div id="nav-placeholder">

</div> 
<script>
        $(function () {
            $("#nav-placeholder").load("admin_nav.php");
        });
    </script>
    <h1>Welcome to Admin Panel</h1>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="edit-link">Edit</a>
                    <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="delete-link">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    


<!-- ... Same as before ... -->
    

</body>
</html>

