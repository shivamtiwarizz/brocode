<?php
session_start();



include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and escape the input data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Use a prepared statement to insert data into the database
    $sql = "INSERT INTO contact_form_data (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters to the prepared statement
    $stmt->bind_param("sss", $name, $email, $message);
    
    if ($stmt->execute()) {
        echo "Data submitted and stored in the database successfully!";
    } else {
        echo "Error uploading data: " . $stmt->error;
    }
    
    $stmt->close();
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Responsive Contact Us Form | CodingLab </title>

    <link rel="stylesheet" href="css/contactus.css">
    <link rel="icon" href="assets/icon.png">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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


<style>
    /* Style for the "Send Now" button */
.button1 {
    text-align: center;
    margin-top: 20px;
}

.button1 input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.button1 input[type="submit"]:hover {
    background-color: #0056b3;
}

</style>
</head>

<body style="background-attachment: fixed;
background-size: cover;
background-position: center;
overflow: auto;
height: 100%;

 background-image: url(assets/Picsart_23-09-05_12-40-43-186.png);" >
    <div style="top:0%;width: 100%;" id="nav-placeholder">

        </div>

    <script>
        $(function () {
            $("#nav-placeholder").load("navbar.php");
        });
    </script>
    <div class="container">
       
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">Mahendra nagar, javsai gaon</div>
                    <div class="text-two">Ambarnath west</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+91 8898226111</div>
                    <div class="text-two">+91 8850206084</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">AmbernathTemple@gmail.com</div>
                    <div class="text-two">AmbernathTrush@gmail.com</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send us a message</div>
                <p>If you have any work from me or any types of quries related to my tutorial, you can send me message
                    from here. It's my pleasure to help you.</p>
                    <form action="contactus.php" method="post">
    <div class="input-box">
        <input type="text" class="name" name="name" placeholder="Enter your name" required>
    </div>
    <div class="input-box">
        <input type="text" class="email" name="email" placeholder="Enter your email" required >
    </div>
    <div class="input-box message-box">
        <input type="text" class="message" name="message" placeholder="Enter your message" required>
    </div>
    <div class="button1">
                        <input type="submit" value="Send Now">
                    </div>
</form>

            </div>
        </div>
<img style="filter: contrast(100%);" src="Screenshot 2023-08-16 133202.jpg" alt="">
    </div>

    <!-- <div class="col-12 mb-n2 p-0">
        <iframe style="width: 100%; height: 500px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div> -->
   <div style="margin-top: 101px;" id="footer-placeholder">
</div>

    <script>
        $(function () {
            $("#footer-placeholder").load("footer.php");
        });
    </script>
  
</body>

</html>