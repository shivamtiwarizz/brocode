<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/icon.png">
     <!-- Compressed CSS -->
     <link rel="stylesheet" href=
     "https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" />
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
         <!-- Compressed JavaScript -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
         <script src=
     "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
         </script>
         <script src=
     "https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js">
         </script>
         <script src="https://kit.fontawesome.com/e5fc44f5ee.js" crossorigin="anonymous"></script>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://kit.fontawesome.com/e5fc44f5ee.js" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    *{
        scroll-behavior: smooth;
    }
   
body {
            font-family: Arial, sans-serif;
        }
        .card-horizontal {
            display: flex;
            flex-direction: row;
            align-items: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .notiimg {
            height: 150px;
            width: 300px;
            object-fit: cover;
            border-radius: 10px 0 0 10px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 16px;
        }
        
        .sidebar {
        width: 100px;
        height: 100%;
        position: fixed;
        top: 40px;
        left: 0;
        background-color: #333;
        color: #fff;
        overflow-y: auto;
        z-index: 5;
    }

    .sidebar a {
        padding: 10px;
        text-decoration: none;
        color: #fff;
        display: block;
    }

    .sidebar a:hover {
        background-color: #555;
    }

    .content {
        margin-left: 250px; /* Adjust this margin to match the sidebar width */
        padding: 20px;
    }
</style>
<body>
<div class="sidebar">
        <h2>Sidebar</h2>
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
        <!-- Add more links as needed -->
    </div>
    <div id="nav-placeholder">

    </div> <div class="content">
        <!-- Your existing content here -->
   
    <div style="display: flex; justify-content: center;  margin-top: 30px;">
    <h1>Notifications <i class="fa fa-bell"></i></h1></div>
    <div >
        <div>
        
    <div  class="container-fluid mt-2">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper" >
                            <img class="notiimg" src="assets/ksp_0651.webp" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="notiimg" src="assets/ksp_0651.webp" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="notiimg" src="assets/ksp_0651.webp" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="notiimg" src="assets/ksp_0651.webp" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
</div> </div>
    <script>
    $(function(){
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