<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Document</title>
</head>

<body style="background-attachment: fixed;
background-size: cover;
background-position: center;
overflow: auto;
height: 100%;

 background-image: url(assets/Picsart_23-09-05_12-40-43-186.png);" >
    <div id="nav-placeholder">
    </div>
    <div >
        <div>
           
        <?php
    include 'db_connect.php';

    // Retrieve the PDF content from the database
    $select_query = "SELECT pdf_content FROM pdf_files ORDER BY id DESC LIMIT 1";
    $result = $conn->query($select_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pdfContent = $row['pdf_content'];

        // Create a base64-encoded data URI for embedding the PDF
        $pdfDataUri = 'data:application/pdf;base64,' . base64_encode($pdfContent);

        // Display the PDF using the <embed> tag
        echo '<center> <embed style="overflow-y: hidden;" type="application/pdf"
        src="' . $pdfDataUri . '#toolbar=0&navpanes=0&scrollbar=0&statusbar=0&"
        width="810" height="820"></center>';

    } else {
        echo '<p>No PDF file found.</p>';
    }

    $conn->close();
    ?>

  
         
    </div>

</div>
<div id="footer-placeholder">
</div>

    <script>
        $(function () {
            $("#footer-placeholder").load("footer.php");
        });
    </script>
    <script>
        $(function () {
            $("#nav-placeholder").load("navbar.php");
        });
    </script>

</body>

</html>