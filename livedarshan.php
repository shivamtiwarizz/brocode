<?php
session_start();



include 'db_connect.php';

$videoLink = '';

// Retrieve the latest video link from the database
$sql = "SELECT video_link FROM videos ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $videoLink = $row["video_link"];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

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

    </div><h1 style="text-align: center;margin: 60px 0 1px 0; font-weight: 600; font-size: 40px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">LIVE DARSHAN OF</h1>
    <p style="text-align: center;margin: 1px;font-size: larger; font-weight: 800; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">AMBERNATH SHIV MANDIR GARBHGRIH</p>
    <div style="display: flex; justify-content: center; margin: 50px 0 70px 0;">
        
        <iframe width="949" height="534" src="<?php echo $videoLink; ?>" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    </div>
    <script>
        $(function () {
            $("#nav-placeholder").load("navbar.php");
        });
    </script>
    <div id="footer-placeholder">
    </div>

    <script>
        $(function () {
            $("#footer-placeholder").load("footer.php");
        });
    </script>

</body>

</html>