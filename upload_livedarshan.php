<?php
session_start();

// Check if the user is an admin, if not, redirect to login page
if (!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit();
}

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $videoLink = $_POST["videoLink"];

    // Delete old video links
    $deleteSql = "DELETE FROM videos";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Old video links deleted successfully!<br>";
    } else {
        echo "Error deleting old video links: " . $conn->error . "<br>";
    }

    // Insert the new video link into the database
    $sql = "INSERT INTO videos (video_link) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $videoLink);
    if ($stmt->execute()) {
        echo "Video link uploaded successfully!";
    } else {
        echo "Error uploading video link: " . $stmt->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
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
    <title>Admin - Upload YouTube Video</title>
</head>
<style>
       
        h1 {
    text-align:center;
            margin-top: 9rem;
            font-weight: 800;
            font-size: 36px;
        }
        form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #000;
        }
    </style>
<body>
<div id="nav-placeholder">

</div> 
<script>
        $(function () {
            $("#nav-placeholder").load("admin_nav.php");
        });
    </script>
    <div >
    <h1>Upload YouTube Video</h1>
    <form style="margin-top:200px; margin-left:37%;" action="upload_livedarshan.php" method="post">
        <label for="videoLink">YouTube Video Link:</label>
        <input type="text" id="videoLink" name="videoLink" required>
        <button type="submit">Upload</button>
    </form></div>
</body>
</html>
