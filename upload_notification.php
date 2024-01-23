<?php
session_start();

// Check if the user is an admin, if not, redirect to the login page
if (!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit();
}

include 'db_connect.php';

// Initialize the notification message variable
$notification_message = "";

// Handle deleting a notification
// if (isset($_POST['delete_notification'])) {
//     $notification_id = $_POST['delete_notification'];

//     // Delete the notification from the database
//     $delete_sql = "DELETE FROM notifications WHERE id = $notification_id";

//     if ($conn->query($delete_sql) === TRUE) {
//         $notification_message = "Notification deleted successfully.";
//     } else {
//         $notification_message = "Error deleting notification: " . $conn->error;
//     }
// }
if (isset($_POST['delete_notification'])) {
    $notification_id = $_POST['delete_notification'];
    $delete_query = "DELETE FROM notifications WHERE id = $notification_id";
    if ($conn->query($delete_query)) {
        $_SESSION['delete_success'] = true;
        header('Location: upload_notification.php'); // Redirect to the same page
        exit(); // Make sure to exit after redirection
    } else {
        echo '<p>Error deleting donation record: ' . $conn->error . '</p>';
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form has been submitted
    unset($_SESSION['notification_message']);
    // Get the notification message from the form
    $message = $_POST['message'];

    // Insert the message into the database
    $insert_sql = "INSERT INTO notifications (message) VALUES ('$message')";

    if ($conn->query($insert_sql) === TRUE) {
        // Save the message in a session variable
        $_SESSION['notification_message'] = "Notification uploaded successfully.";
    } else {
        $_SESSION['notification_message'] = "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}

// Check if there is a notification message in the session
if (isset($_SESSION['notification_message'])) {
    $notification_message = $_SESSION['notification_message'];

    // Clear the notification message from the session
    unset($_SESSION['notification_message']);
}

// Retrieve notifications from the database
$sql = "SELECT * FROM notifications";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Upload</title>
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
    <style>
        /* Styles for notifications and close buttons */
        .notification-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        .notification-card {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .notification-message {
            color: #333;
        }

        /* Styles for the form */
        h1 {
            margin-top: 20px;
            text-align:center;
            font-size: 24px;
            font-weight:600;
        }
        form {
            margin-bottom: 20px;
            margin-top: 20px;
            width: 90%;
            
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button[type="submit"] {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #000;
        }

        /* Styles for notifications in table format */
        table {
           
            width: 90%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f7f7f7;
        }
        td:last-child {
            text-align: center;
        }
        .delete-button {
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .delete-button:hover {
            background-color: #cc0000;
        }
    </style> <h1>Upload Notification</h1>
  <div style=" display: flex; justify-content: center;">
    
      <form action="upload_notification.php" method="post">
        <label for="message">Notification Message:</label>
        <input type="text" id="message" name="message" required>
        <button type="submit">Upload Notification</button>
      </form>
    </div>
   <!-- Display notifications in a table format -->
   <div style=" display: flex;
            justify-content: center;">
<table>
    <thead>
        <tr>
            <th>Notification Message</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['message']; ?></td>
                <td>
                    <form action="upload_notification.php" method="post">
                        <input type="hidden" name="delete_notification" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="delete-button">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>


    <!-- Display notifications with a delete button -->
    <?php while ($row = $result->fetch_assoc()) : ?>
        
                    <div class="notification-message"><?php echo $row['message']; ?></div>
                    <form action="upload_notification.php" method="post">
                        <input type="hidden" name="delete_notification" value="<?php echo $row['id']; ?>">
                        <button type="submit">Delete Notification</button>
                    </form>
                </div>
          
    <?php endwhile; ?>
</body>
</html>

