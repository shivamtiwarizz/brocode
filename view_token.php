<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php'; // Include your database connection file

    $email = $_POST["email"];

    // Check if the provided email exists in your users table
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        // Check if there's a token associated with the email
        $tokenSql = "SELECT token FROM users WHERE email=?";
        $stmt = mysqli_prepare($conn, $tokenSql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $tokenResult = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($tokenResult) == 1) {
            $row = mysqli_fetch_assoc($tokenResult);
            $token = $row['token'];
        } else {
            $error = "No password reset token found for this email.";
        }
    } else {
        $error = "Email not found. Please enter a valid email address.";
    }

    mysqli_close($conn);
}
?>

<!-- HTML form for viewing the token -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
    <!-- Compressed JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js">
    </script>
    <title>View Password Reset Token</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;

    }

    h1 {

        text-align: center;
        margin-top: 100px;
        color: #333;
    }

    .container {
        width: 420px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;

        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    input[type="email"] {
        width: 96%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button[type="submit"] {
        background-color: #000;
        color: #fff;
        padding: 10px 20px;
        border: 2px solid black;
        transition: 0.3s;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;

    }

    button[type="submit"]:hover {
        background-color: #fff;
        color: #000;
    }

    p {
        text-align: center;
        margin-top: 10px;
        color: #333;
    }

    .token-box {
        background-color: #f0f0f0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 20px;
    }

    .reset-button {
        text-align: center;
        margin-top: 20px;

    }

    .reset-button p {
        font-size: 16px;
        margin-bottom: 10px;
        color: #333;
    }

    .reset-button button {
        background-color: #000;
        color: #fff;
        padding: 10px 20px;
        border: 2px solid black;
        transition: 0.3s;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }

    .reset-button button:hover {
        background-color: #fff;
        color: #000;
    }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div style="margin-bottom: 101px;" id="nav-placeholder">

    </div>
    <div>
        <h1>View Password Reset Token</h1>
        <div class="container">
            <form action="view_token.php" method="post">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <button style="" type="submit">View Token</button>
            </form>
            <?php
        if (isset($error)) {
            echo '<p style="color: red;">' . $error . '</p>';
        } elseif (isset($token)) {
            echo '<div class="token-box">';
            echo ' <i id="copyToken" style="float:right;" class="fa fa-files-o" aria-hidden="true"></i>';
            echo '<p>Your password reset token is:</p>';
            echo '<div class="token-content">';
           
            echo '<p id="token">' . $token . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="reset-button">';
            echo '<p>Click the copy button to copy your token ID and then reset your password</p>';
            echo '<button onclick="document.location=\'reset_password.php\'">Reset Password</button>';
            echo '</div>';
        }
        ?>

        </div>
    </div>
    <script>
    // JavaScript to copy the token to the clipboard
    const copyTokenButton = document.getElementById("copyToken");
    const tokenElement = document.getElementById("token");

    copyTokenButton.addEventListener("click", function() {
        const tokenText = tokenElement.innerText;
        const textarea = document.createElement("textarea");
        textarea.value = tokenText;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);

        // Provide user feedback
        copyTokenButton.innerText = "Copied!";

    });
    </script>
    <script>
    $(function() {
        $("#nav-placeholder").load("navbar.php");
    });
    </script>
    <div style="margin-top: 101px;" id="footer-placeholder">
    </div>

    <script>
    $(function() {
        $("#footer-placeholder").load("footer.php");
    });
    </script>
</body>

</html>