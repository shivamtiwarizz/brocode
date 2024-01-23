<?php
include 'db_connect.php'; // Include your database connection file here

// Get the transaction ID from the URL parameter
if (isset($_GET['transaction_id'])) {
    $transactionId = $_GET['transaction_id'];

    // Query the database to fetch invoice details based on the transaction ID
    $query = "SELECT * FROM parking_slots WHERE transaction_id = '$transactionId'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phoneNumber = $row['phoneNumber'];
        $date = $row['date'];
        // Add more invoice details as needed

        // Now, you can display the invoice HTML
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

            <title>Invoice</title>
            <!-- Add your CSS styles or include CSS files here -->
        </head>
        <body>
        <div class="container">
        <img src="mainlogo.png" alt="Temple Logo" class="logo">
        <h2>AMBERNATH TEMPLE TRUST</h2>
        <div class="header">Parking Receipt</div>
        <table>
            <tr>
                <th>Temple Name:</th>
                <td>Ambernath Prachin Mandir</td>
            </tr>
            <tr>
                <th>Temple Address:</th>
                <td>Mahendra nagar, javsai gaon,Ambarnath west</td>
            </tr>
            <tr>
                <th>Donor Name:</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td> <?php echo $email; ?></td>
            </tr>
            <tr>
                <th>phoneNumber:</th>
                <td><?php echo $phoneNumber; ?></td>
            </tr>
            <tr>
                <th>Date:</th>
                <td><?php echo $date; ?></td>
            </tr>
            <tr>
                <th>Parking Fees:</th>
                <td>₹50.00</td>
            </tr>
            <tr>
                <th>Transaction ID:</th>
                <td><?php echo $transactionId; ?></td>
            </tr>
        </table>
        
        <button onclick="printReceipt()">Print / Save as PDF</button>

<script>
    function printReceipt() {
        // Trigger the print dialog
        window.print();
    }

    function saveAsPDF() {
        // Create a new jsPDF instance
        const doc = new jsPDF();

        // Add content to the PDF
        doc.fromHTML(document.querySelector('.container'), 15, 15);

        // Save the PDF
        doc.save('temple_receipt.pdf');
    }
</script>
    </div>
           

            <!-- You can also include a payment button or any other payment processing logic here -->

            <!-- Add your JavaScript if needed -->

        </body>
        </html>
        <?php
    } else {
        echo "Invoice not found.";
    }
} else {
    echo "Transaction ID not provided.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Temple Donation Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        img{
mix-blend-mode:darken;
background-color:black;
padding:10px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #000;
            text-align: center;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 150px;
            margin: 0 auto;
            display: block;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
    </style>
     <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> -->
   
</head>
<body>
   
  

</body>
</html>
