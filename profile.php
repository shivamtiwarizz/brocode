<?php
session_start(); ?>

<?php include 'db_connect.php' 

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
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
    <style>
        /* Add this CSS in the <style> section of your HTML code */

/* Edit Profile Form Styles */
.form-container {
    margin-top: 20px;
    max-width: 300px;
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.form-container h4 {
    margin-bottom: 10px;
    color: #333;
}

.form-container label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

.form-container input[type="file"],
.form-container input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-container button[type="submit"] {
    padding: 10px 15px;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.2s ease;
    width: 100%;
}

.form-container button[type="submit"]:hover {
    background-color: #222;
}

    </style>
</head>

<body style="background-attachment: fixed;
background-size: cover;
background-position: center;
overflow: auto;
height: 100%;

background-image: url(assets/lord-shiva-amoled-black-background-illustration-1920x1080-4950.jpg);">
    <div id="nav-placeholder">

 </div>
      <!--  <center>
    <div  class="card">
         <img src="shambhu.jpg" style="margin-top:70px;" alt="profile picture" class="profile__picture">
         <div class="text">
            <h3> </h3>
            <h5>Kalyan</h5>
            <p>May Lord Shiva bless you!</p>
         </div>
         <div class="contact">
            <hr>
            <h4>Thanks for being a devotional devotee!</h4>
        
      </div></div></center> -->

      <center>
      <div class="card-container" style="height:380px">

      <?php
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    
    // Retrieve images associated with the user's email
    $query = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($res) > 0) {
        while ($img = mysqli_fetch_assoc($res)) {
?>
            <img style="border: 1px solid #ffffff;
	border-radius: 50%;
	padding: 7px;
    width: 100px; height:100px;" class="round" src="uploads/<?=$img['img']?>" alt="User Image">
<?php
        }
    } else {
?>
        <img style="border: 1px solid #ffffff;
	border-radius: 50%;
	padding: 7px;
    width: 100px; height:100px;" class="round" src="assets/dp-profile.jpg" alt="No Images Found">
<?php
    }
} else {
?>
    <img style="border: 1px solid #ffffff;
	border-radius: 50%;
	padding: 7px;
    width: 100px; height:100px;" class="round" src="placeholder_image.jpg" alt="Login to See Images">
<?php
}
?>



	<h3><?php
    if (isset($_SESSION['name'])) {
        echo '<div class="dropdown">
        
      <span style="
         text-transform: uppercase; ">' . $_SESSION['name'] . '</span>';
    } ?></h3>
<h6><?php
    if (isset($_SESSION['email'])) {
        echo ' <span style="
         text-transform: uppercase; ">' . $_SESSION['email'] . '</span>';
    } ?></h6>
	<p style="margin-bottom:-100px">Hello Devotee!! <br/> May Lord Shiva bless you!</p>
	<div class="card-container">
 
<!-- Button trigger modal -->
<button style="background-color:white;color:black;" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
Update your profile
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
     
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="display: flex; justify-content: center;">
      <div class="form-container" >
        <h4>Edit Profile</h4>
        <form method="POST" enctype="multipart/form-data">
            <label for="newImage">Profile Image:</label>
            <input type="file" id="newImage" name="newImage">

            <label for="newName">New Name:</label>
            <input type="text" id="newName" name="newName">
        
            <button type="submit" name="updateProfile">Update Profile</button>
        </form>
    </div>
</div>

      </div>
   
    </div>
  </div>
</div>
</div>

<?php
// Handle Profile Update
if (isset($_POST['updateProfile'])) {
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        
        // Handle Profile Image Update
        if ($_FILES['newImage']['size'] > 0) {
            $newImage = $_FILES['newImage']['name'];
            $tempImage = $_FILES['newImage']['tmp_name'];
            $imagePath = "uploads/" . $newImage;
            move_uploaded_file($tempImage, $imagePath);
            
            $updateImageQuery = "UPDATE users SET img = '$newImage' WHERE email = '$email'";
            mysqli_query($conn, $updateImageQuery);
        }
        
        // Handle Name Update
        $newName = $_POST['newName'];
        if (!empty($newName)) {
            $updateNameQuery = "UPDATE users SET name = '$newName' WHERE email = '$email'";
            mysqli_query($conn, $updateNameQuery);
            $_SESSION['name'] = $newName;
        }
    }
}
?>
	</div>

</div></center>
    <script>
        $(function () {
            $("#nav-placeholder").load("navbar.php");
        });
    </script>
 <div style="margin-top: 101px;" id="footer-placeholder">
    </div>

    <script>
        $(function () {
            $("#footer-placeholder").load("footer.php");
        });
    </script>
</body>

</html>