<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f7f7f7;
        }

        .notifications {
            max-width: 600px;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .notifications__table {
            width: 100%;
            border-collapse: collapse;
        }

        .notifications__table th,
        .notifications__table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .notifications__table th:last-child,
        .notifications__table td:last-child {
            text-align: center;
        }

        .notifications__table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .notifications__item form {
            display: inline-block;
        }

        .notifications__item button.delete-btn {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .notifications__item button.delete-btn:hover {
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
    <div class="wrapper">
        <div class="notifications">
            <table class="notifications__table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Donation Amount</th>
                    <th>Action</th>
                </tr>
                <?php
                include 'db_connect.php';

                $sql = "SELECT id, name, amount FROM donors";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>₹' . $row['amount'] . '</td>';
                        echo '<td>';
                        echo '<form method="POST">';
                        echo '<input type="hidden" name="delete_id" value="' . $row['id'] . '">';
                        echo '<button style="background-color: #000; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;" type="submit" name="delete_btn" class="delete-btn">Delete</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">No donations yet.</td></tr>';
                }

                if (isset($_POST['delete_btn'])) {
                    $delete_id = $_POST['delete_id'];
                    $delete_query = "DELETE FROM donors WHERE id = $delete_id";
                    if ($conn->query($delete_query)) {
                        $_SESSION['delete_success'] = true;
                        header('Location: delete_donator.php'); // Redirect to the same page
                        exit(); 
                    } else {
                        echo '<p>Error deleting donation record: ' . $conn->error . '</p>';
                    }
                }

                $conn->close();
                ?>
            </table>
        </div>
    </div>
</body>
</html>
