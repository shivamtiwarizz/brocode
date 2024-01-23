<?php
include 'db_connect.php';

session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['email'])) {
    header("Location: log&sign.php");
    exit();
}

function generateUniqueTransactionId($conn) {
    $unique = false;
    $transactionId = '';

    // Generate a unique 12-digit transaction ID
    while (!$unique) {
        $transactionId = mt_rand(100000000000, 999999999999); // Generates a random 12-digit number
        $checkQuery = "SELECT COUNT(*) as count FROM parking_slots WHERE transaction_id = '$transactionId'";
        $result = $conn->query($checkQuery);
        $row = $result->fetch_assoc();

        if ($row['count'] == 0) {
            $unique = true;
        }
    }

    return $transactionId;
}

function reserveParkingSlot($conn, $slotId, $name, $email, $phoneNumber, $transactionId) {
    // Update the database with reservation details and transaction ID
    $updateQuery = "UPDATE parking_slots SET is_reserved = 1, name = '$name', email = '$email', phoneNumber = '$phoneNumber', transaction_id = '$transactionId' WHERE id = $slotId";

    if ($conn->query($updateQuery) === TRUE) {
        return true; // Reservation and data insertion successful
    } else {
        return false; // Update failed
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reserve'])) {
        // You should sanitize and validate user inputs here before using them in the function.
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];

        // Retrieve an available empty slot ID from the database
        $query = "SELECT id FROM parking_slots WHERE is_reserved = 0 LIMIT 1";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $slotId = $row['id'];
            $transactionId = generateUniqueTransactionId($conn); // Generate a unique transaction ID

            if (reserveParkingSlot($conn, $slotId, $name, $email, $phoneNumber, $transactionId)) {
                echo '<div style="top:4.8rem; position:absolute;" class="message success">Parking slot reserved successfully.</div>';
                echo '<center ><button style="top:8rem; position:absolute; margin-left:-67px;" type="button" class="btn btn-dark" onclick="showInvoice(\'' . $transactionId . '\')">Show Invoice</button></center>';
            } else {
                echo '<div style="margin-top:4.8rem;" class="message error">Parking slot reservation failed.</div>';
            }
        } else {
            echo '<div style="margin-top:4.8rem;" class="message error">No available slots.</div>';
        }
    }
}
?>
<script>
function showInvoice(transactionId) {
    window.open('invoice.php?transaction_id=' + transactionId, 'Invoice', 'width=600,height=400');
}</script>


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
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js">
    </script>
    <title>Parking Reservation</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .message {
            padding: 10px;
            margin-bottom: 90px;
            text-align: center;
            border-radius: 4px;
            width: 50%;
            position: relative;
          left: 25%;
        }
        .success {
            background-color: #000000cd;
            color: #ffffff;
            border: 1px solid #D6E9C6;
        }
        .error {
            background-color: #FFBABA;
            color: #D8000C;
            border: 1px solid #D9534F;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 80px;
        }
        .form {
            max-width: 400px;
            margin: 90px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
       
    </style>
</head>
<body>
<div id="nav-placeholder" style="margin-top:15px;">

</div>
    <h1 style="margin-top:120px;">Parking Reservation</h1><div style="display: flex; justify-content: center;">
    <form method="POST" class="form">
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <label for="email">Email:</label>
    <input type="text" name="email"   required>
    <label for="phoneNumber">Phone Number:</label>
    <input type="text" name="phoneNumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"  required>
    <!-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" -->
    <!-- <label for="money">Amount Paid:</label>
    <input type="text" name="money" required> -->
    <center>   <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">
     Pay No
</button> </center>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 70%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="width:90%;" id="exampleModalLongTitle">Parking booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      

     
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/payment.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
    <link
        href='http://fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body>
   
    <meta name="robots" content="noindex">

    <body>
       
        <div id="w3lDemoBar" class="w3l-demo-bar">
            <div class="main">
                <div class="content">
                    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#horizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion           
                                width: 'auto', //auto or any width like 600px
                                fit: true // 100% fit in a container
                            });
                        });
                    </script>
                    <div class="sap_tabs">
                        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                            <div class="pay-tabs">
                                <h2>Select Payment Method</h2>
                                <ul class="resp-tabs-list">
                                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label
                                                class="pic1"></label>UPI</span></li>
                                </ul>
                            </div>
                            <div class="resp-tabs-container">
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                <div class="payment-info">
    <h3 class="pay-title">UPI Payment Info</h3>
    <form>
        <div class="tab-for">
            <h5>Amount</h5>
            <input class="pay-logo" type="text"  placeholder="50" disabled>
        </div>
        <div class="tab-for">
            <h5>UPI ID</h5>
            <input class="pay-logo" type="text"  placeholder="Enter the UPI ID" required>
        </div>
        
        <center><button style=" background-color: #000000;" class="button mr-5" type="submit" name="reserve">Reserve Parking Slot</button></center>
    </form>
</div>
                                </div>
                                <style>
                                    .resp-tab-item {
                                        float: left;

                                    }
                                    .text_box {
                                        width: 180%;
                                    }

                                </style>
                              
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</body>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>





   <center></center> 
</form></div>
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
