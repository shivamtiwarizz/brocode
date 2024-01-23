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
            $resetQuery = "UPDATE parking_slots SET is_reserved = 0, name = NULL, email = NULL, phoneNumber = NULL,transaction_id = NULL WHERE id = $slotIdToDelete";
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
    // Reset all data in the parking_slots table, including transaction_id
    $resetQuery = "UPDATE parking_slots SET is_reserved = 0, name = NULL, email = NULL, phoneNumber = NULL, transaction_id = NULL";
    
    if ($conn->query($resetQuery)) {
        echo "All parking slots have been reset, including transaction IDs.";
    } else {
        echo "Failed to reset parking slots.";
    }

    // Additional SQL statement to explicitly set transaction_id to NULL
    $resetTransactionIdQuery = "UPDATE parking_slots SET transaction_id = NULL";
    if ($conn->query($resetTransactionIdQuery)) {
        echo "Transaction IDs have been reset.";
    } else {
        echo "Failed to reset transaction IDs.";
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
    <link rel="icon" href="assets/icon.png">
    <title>Document</title>  <!-- Compressed CSS -->
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top:500px;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-top: 0;
            padding-top: 10px;
            color: #333;
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .logout-button {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #fff;
            background-color:#000;
            text-decoration: none;
            text-decoration:none;
        }
        .logout-button {
            display: block;
            width: 120px;
            margin: 20px auto;
            padding: 10px;
          
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
         
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body> <div id="nav-placeholder">

</div> 
<script>
        $(function () {
            $("#nav-placeholder").load("admin_nav.php");
        });
    </script>
<ul>
    <?php
if ($reservationsResult->num_rows > 0) {
    echo "<h2>Reservations:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Slot ID</th><th>Name</th><th>Phone Number</th><th>Email</th><th>transaction id</th></tr>";

    while ($row = $reservationsResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['phoneNumber'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        
        echo "<td>" . $row['transaction_id'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No reservations found.";
}
?>

    </ul>

    <div style="margin-top:200px;" class="container">
        <h2>Parking Slot Management</h2>
        <form method="POST" action="admin.php">
            <label for="slot_id">Slot ID to Delete:</label>
            <input type="number" id="slot_id" name="slot_id">
            <button type="submit" style=" padding: 10px 15px; background-color: #000; color: #fff; border: none; border-radius: 4px; cursor: pointer;" name="delete_slot">Delete Parking Slot</button>
            <button type="submit" style=" padding: 10px 15px; background-color: #000; color: #fff; border: none; border-radius: 4px; cursor: pointer;" name="reset_slots">Reset Parking Slots</button>
        </form>
        <a style="" href="logout.php" class="logout-button">Logout</a>
    </div>
</body>
</html>