<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connect.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];

        // Handle image upload
        if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $img = $_FILES['img']['name'];
            $imgTmpPath = $_FILES['img']['tmp_name'];
            move_uploaded_file($imgTmpPath, 'uploads/' . $img);
        }

        // Update user information
        $updateQuery = "UPDATE users SET name = '$name', img = '$img', email = '$email' WHERE id = $userId";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error updating user: " . mysqli_error($conn);
        }
    }

    // Fetch user information for pre-filling the form
    $selectQuery = "SELECT * FROM users WHERE id = $userId";
    $selectResult = mysqli_query($conn, $selectQuery);
    $user = mysqli_fetch_assoc($selectResult);
} else {
    echo "User ID not provided.";
}
?>
 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
        }
    </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/icon.png">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <label for="img">New Image:</label>
        <input type="file" name="img" accept="image/*"><br>
        <button type="submit">Save Changes</button>
    </form>
    <a href="admin.php">Back to Admin Panel</a>
</body>
</html>
