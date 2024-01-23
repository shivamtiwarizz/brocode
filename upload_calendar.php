<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload PDF File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
           
        
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            max-width: 200px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f7f7f7;
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
    <div class="container">
        <h1>Upload calender File</h1>
        <form action="upload_calendar.php" method="post" enctype="multipart/form-data">
            <label for="pdfFile">Choose a calender file:</label>
            <input type="file" name="pdfFile" id="pdfFile" accept=".pdf">
            <small style="color:red">*pdf only</small>
            <button type="submit" name="submit">Upload</button>
   
        <?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Delete existing PDF from the database
    $delete_query = "DELETE FROM pdf_files";
    $conn->query($delete_query);

    // Upload and insert the new PDF file
    $pdfData = file_get_contents($_FILES["pdfFile"]["tmp_name"]);
    $pdfData = $conn->real_escape_string($pdfData);

    $insert_query = "INSERT INTO pdf_files (pdf_content) VALUES ('$pdfData')";

    if ($conn->query($insert_query) === TRUE) {
        echo "File uploaded and saved to the database successfully.";
    } else {
        echo "Error uploading file to the database: " . $conn->error;
    }
}

$conn->close();
?>
    </form>
</body>
</html>
