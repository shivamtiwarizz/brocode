<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submissions</title>
    <style>
        /* Reset default browser styles */
        body, h1, h2, ul {
            margin: 0;
            padding: 0;
        }

        /* Apply some basic styling to the admin panel */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            
            min-height: 100vh;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Card container */
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        /* Card styling */
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Name styling */
        .card .name {
            font-size: 20px;
            font-weight: bold;
        }

        /* Email styling */
        .card .email {
            color: #666;
        }

        /* Message styling */
        .card .message {
            margin-top: 10px;
        }
        .card .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 3px;
            cursor: pointer;
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
<body><div id="nav-placeholder">

</div> 
<script>
        $(function () {
            $("#nav-placeholder").load("admin_nav.php");
        });
    </script>
      
      <?php
    // Include database connection
    include 'db_connect.php';

    // Fetch all contact form data
    $sql = "SELECT * FROM contact_form_data";
    $result = mysqli_query($conn, $sql);

    // Check if any data is available
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='card-container'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card'>";
            echo "<div class='id'>" . $row["id"] . "</div>";
            echo "<div class='name'>" . $row["name"] . "</div>";
            echo "<div class='email'>" . $row["email"] . "</div>";
            echo "<div class='message'>" . $row["message"] . "</div>";
            echo "<button class='delete-btn' onclick='deleteSubmission(" . $row["id"] . ")'>Delete</button>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<h2>No contact form submissions.</h2>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <script>
        // JavaScript function to delete a submission by its ID
        function deleteSubmission(id) {
            if (confirm("Are you sure you want to delete this submission?")) {
                $.post("delete_submission.php", { id: id }, function(data) {
                    if (data === "success") {
                        // Reload the page to update the list
                        location.reload();
                    } else {
                        alert("Failed to delete submission.");
                    }
                });
            }
        }
    </script>
</body>
</html>
