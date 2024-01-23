<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
    <h1>Product Details</h1>
    
    <?php
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve product details from the submitted form data
        $productName = $_POST["product_name"];
        $productdesc = $_POST["product_desc"];
        $price = $_POST["price"];
        
        
        // Display the product details
        echo "<p>Product Name: $productName</p>";
        echo "<p>Product desc: $productdesc</p>";
        echo "<p>Price: &#8377;$price</p>";
        echo "<img src='$productImage' alt='Product Image'>";
    } else {
        // If the form was not submitted, show an error message
        echo "<p>Error: Product details not available.</p>";
    }
    ?>

    <!-- You can add more details or formatting here as needed -->

</body>
</html>
