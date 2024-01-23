<?php
session_start();
include 'db_connect.php';

// Delete records older than 2 minutes
$twoMinutesAgo = date('Y-m-d H:i:s', strtotime('-2 minutes'));
$delete_query = "DELETE FROM donors WHERE upload_date < '$twoMinutesAgo'";
$conn->query($delete_query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $amount = floatval($_POST["amount"]); // Convert amount to numeric format

    $insert_query = "INSERT INTO donors (name, amount) VALUES ('$name', '$amount')";

    if ($conn->query($insert_query) === TRUE) {
        $_SESSION['donation_name'] = $name;
        $_SESSION['donation_amount'] = $amount;
        echo '<div style="margin-top:2rem;" class="notifications__item__title">Donation recorded successfully.</div>';
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Donation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 200px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button[type="submit"] {
            padding: 10px 15px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            width: 100%;
        }
        button[type="submit"]:hover {
            background-color: #222;
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
    <div class="container" style="margin-top:200px;  max-width: 500px;">
        <h2>Upload Top Donators Detail</h2>
        <form method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="amount">Donation Amount ($):</label>
            <input type="text" id="amount" name="amount" required>

            <button type="submit">Submit Donator</button>
            <button style="margin-top:10px;"  onclick="document.location='delete_donator.php'" type="submit">Delete Donator</button>
            
        </form>
        
     
    </div>
    
</body>
</html>
