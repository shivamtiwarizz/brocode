<?php 
    session_start();
    include 'db_connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/icon.png">
    <meta name="viewport" content="width=500px, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" />

    <link href="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.css" rel="stylesheet">
    <script src="home.js"></script>
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->



    <!-- Compressed JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js">
    </script>

    <title>Home Page</title>
</head>


<body style="background-attachment: fixed;
background-size: cover;
background-position: center;
overflow: auto;
height: 100%;

 background-image: url(https://t3.ftcdn.net/jpg/04/38/88/44/360_F_438884479_rkJE00YsXOH3ly8RRoczjDCfqknc2ggj.jpg);">


    <div id="nav-placeholder">

    </div>

    <script>
    $(function() {
        $("#nav-placeholder").load("navbar.php");
    });
    </script>






    <div class="progress__wrapper">
        <span class="progress__bar"></span>
    </div>
    <div style="display: flex; justify-content: center;">

        <div style="display: inline-table;">
            <div class="mainoftest">

                <img src="https://images.squarespace-cdn.com/content/v1/5ce43d00814d800001e52e28/1582084018004-1UJT7MEJQNVO0UIWQ65T/PDF-Tryambakam-Mantra.jpg"
                    style="width: 500px; mix-blend-mode: multiply;margin-left:330px;  " alt="shiva" id="mantra">
            </div>
            <!-- <div class="bd-example" style="width: 100%; margin: 0; overflow: hidden;">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="1911393.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption mt-5" >
          <h5 class="display-4">First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="1911393.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="display-4">Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="1911393.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="display-4">Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
   
  </div>
</div> -->
            <!-- <style>
  #carouselExampleCaptions .carousel-caption {
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0);
    z-index: 2;
    text-align: center;
    margin-left: 200px;
    
  }

  #carouselExampleCaptions img {
    width: 100%;
    height: 100vh;
    max-height: 100vh;
  }

  #carouselExampleCaptions .carousel-indicators li {
    width: 15px;
    height: 15px;
    border-radius: 50%;
  }
  
  .carousel-inner {
    display: flex;
    flex-wrap: nowrap; 
  }
  
  .carousel-inner .carousel-item {
    flex: 0 0 100%; 
  }
</style> -->
            <?php
include 'db_connect.php';
$notification_message = isset($_SESSION['notification_message']) ? $_SESSION['notification_message'] : '';
unset($_SESSION['notification_message']);
$sql = "SELECT * FROM notifications";
$result = $conn->query($sql);
$conn->close();
?>
            <style>
            /* Toast notification styles */
            .notification-toast {
                position: fixed;
                left: 60px;


                background: rgba(255, 255, 255, 0);
                max-width: 0px;
                display: flex;
                align-items: flex-start;
                /* Align the content to the bottom */
                border-radius: var(--border-radius-md);
                transform: translateX(calc(-100% - 40px));
                transition: 1s ease-in-out;
                z-index: 3;
                animation: slideInOut 6s ease-in 1;
            }

            @keyframes slideInOut {

                0%,
                45%,
                100% {
                    transform: translateX(calc(-100% - 0px));
                    opacity: 0;
                    visibility: hidden;
                }

                50%,
                95% {
                    transform: translateX(10%);
                    opacity: 1;
                    visibility: visible;
                }
            }

            .notification-card {
                background-color: #000;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                width: 300px;
                padding: 10px;
                margin-bottom: -54px;
                display: block;
            }

            .notification-content {
                display: flex;

                align-items: center;
                max-width: 300px;
            }

            .notification-message {
                flex: 1;
                padding: 8px;
                color: #fff;
            }


            .close-button1 {


                background: none;
                border: none;
                cursor: pointer;
                padding: 8px;
                font-size: 418px;
                line-height: 1;
                color: #fff;

                z-index: 5;
            }

            .close-button {
                right: -296px;
                margin-top: 106px;
                background: none;
                border: none;
                cursor: pointer;
                padding: 8px;
                font-size: 18px;
                line-height: 1;
                color: #fff;

                z-index: 5;
            }

            .close-button:hover {

                color: #fff;

                z-index: 5;
            }

            @keyframes slideIn {
                from {
                    transform: translateY(100%);
                }

                to {
                    transform: translateY(0);
                }
            }


            .show-notification-button {
                position: fixed;
                top: 80px;
                left: 20px;

                padding: 10px;

                border-radius: 4px;
                cursor: pointer;
                /* transform: translateX(calc(-100% - 40px));
        transition: 1s ease-in-out; */
                z-index: 3;
                animation: slideInOut 16s ease-in 1;
            }

            .show-notification-button1 {
                position: fixed;
                top: 155px;
                /* Adjust as needed */
                left: 20px;
                /* Adjust as needed */

                padding: 4px;
                border: 4px solid black;
                border-radius: 4px;
                cursor: pointer;
            }

            .dark-mode {
                background-color: black;
                color: white;

            }

            .darkmode {
                top: 80px;
                color: white;
                right: 0%;
                position: absolute;
            }

            .darkmode:focus {
                background-color: white;
                color: black;
                border-radius: 50%;
            }
            </style>

            <!-- 
<button style="" class="darkmode"  onclick="myFunction()"><img src="assets/dark-mode.png" alt=""></button> -->

            <script>
            function myFunction() {
                var element = document.body;
                element.classList.toggle("dark-mode");
            }
            </script>

            <button class="show-notification-button"><i id="item" class="fa fa-bell"></i> </button>

            <!-- <button onclick="closeNotification(this)" class="show-notification-button1"><i  class="fa fa-times"></i> Close</button> -->

            <?php
$notificationCount = 0; 
while ($row = $result->fetch_assoc()) {
    $notificationCount++; 
    ?>
            <div class="notification-toast" style="bottom: <?php echo ($notificationCount * 100) + 20; ?>px;"
                data-toast>

                <div style="margin-top: 100px;" class="container1">

                    <div class="notification-card" style="display: none;">
                        <div class="notification-content">
                            <div class="notification-message"><?php echo $row['message']; ?></div>
                            <button class="close-button" onclick="closeNotification(this)">&times;</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <script>
            const notificationCards = document.querySelectorAll('.notification-card');
            const showNotificationButton = document.querySelector('.show-notification-button');
            const closeButtons = document.querySelectorAll('.close-button');

            showNotificationButton.addEventListener('click', () => {
                notificationCards.forEach((card, index) => {
                    card.classList.add('appear');
                    card.style.display = 'block';

                    setTimeout(() => {
                        card.classList.remove('appear');
                    }, 500);
                });
            });

            closeButtons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    notificationCards.forEach((card) => {
                        card.style.display = 'none';
                    });
                });
            });
            </script>






            <div data-aos="fade-up" class="aos-init aos-animate">
                <img src="1693736976571.png" style="width: 500px; mix-blend-mode: multiply;" alt="" id="shiva">

            </div>



            <div>
                <audio controls preload="auto" style="margin-left:415px; margin-top:50px">
                    <source id="mySoundClip" src="Maha Mrityunjaya.mp3" type="audio/ogg">
                    <source src="Maha Mrityunjaya.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
            <style>
            #btnn {
                background-color: #000;
                color: white;
                padding: 10px 20px;
                border-radius: 10px;
                border: 3px solid black;
                cursor: pointer;
            }

            /* CSS for button hover effect */
            #btnn:hover {
                background-color: #fff;
                color: #000;
            }

            /* CSS for the container */
            #location {
                text-align: center;
            }

            /* CSS for sunrise/sunset info */
            #sunriseSunsetInfo {
                display: block;
                /* Display elements vertically */
            }
            </style>
            </style>
            <div id="location">
                <button onclick="toggleInfo()" type="button" id="btnn">Sunrise/Sunset Info</button>
                <br>

                <div id="sunriseSunsetInfo">

                    <p id="sunrise"></p>
                    <p id="sunset"></p>
                </div>
            </div>
            <script>
            let infoVisible = false;

            function toggleInfo() {
                infoVisible = !infoVisible;
                let infoDiv = document.getElementById('sunriseSunsetInfo');

                if (infoVisible) {

                    infoDiv.style.display = 'block';
                    fetchSunriseSunsetInfo();
                } else {

                    infoDiv.style.display = 'none';
                }
            }

            function fetchSunriseSunsetInfo() {
                if ("geolocation" in navigator) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        let baseUrl = 'https://api.sunrisesunset.io/json?';
                        let myLatitude = position.coords.latitude;
                        let myLongitude = position.coords.longitude;
                        let fullUrl = baseUrl + "lat=" + myLatitude + "&lng=" + myLongitude + "&date=today";

                        $.ajax({
                            url: fullUrl,
                            dataType: "json",
                            success: function(locationResponse) {
                                let sunriseTag = document.getElementById('sunrise');
                                sunriseTag.innerHTML = "Sunrise today is at: " + locationResponse
                                    .results.sunrise;

                                let sunsetTag = document.getElementById('sunset');
                                sunsetTag.innerHTML = "Sunset today is at: " + locationResponse
                                    .results.sunset;
                            },
                            error: function() {
                                alert(
                                    "Error fetching sunrise/sunset data. Please check your coordinates.");
                            }
                        });
                    });
                } else {
                    alert("Geolocation is not supported by your browser.");
                }
            }
            </script>
            <div style="display: flex; justify-content: center;">
                <article class="box">
                    <h2 class="headdon" style="margin-left:-44%;font-size: 37px; color:#e67c1e;">First of all,Thanks to
                        our
                        donators</h2>
                    <p>"Dear donors, your generosity empowers our sacred temple. Your support fuels spirituality and
                        community.
                        With gratitude, we forge ahead on our spiritual journey. May your kindness echo through
                        generations.
                        Blessings and thanks for your cherished contributions."</p>
                    <div style="display: flex; justify-content: center;">
                        <button class="btn" id="add" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><img
                                src="assets/donation.png"
                                style="filter: invert(100%); height: 23px; margin-bottom: 2px;" alt="">
                            DONATORS</button>
                    </div>
                </article>

                <div style="width: 550px;" class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
                    id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                    <div style="width: 350px;" class="offcanvas-header">


                    </div>
                    <div class="offcanvas-body">
                        <h3 style="font-weight: 700;" class="headerr ml-4">OUT TOP DONATORS</h3>
                        <div class="wrapper">
                            <div class="notifications">
                                <?php
        include 'db_connect.php';

        $sql = "SELECT name, amount FROM donors ORDER BY amount ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="notifications__item">';
                echo '<div class="notifications__item__avatar">';
                echo '<img src="Lord Shiva logo.jpeg" />';
                echo '</div>';
                echo '<div class="notifications__item__content">';
                echo '<span class="notifications__item__title">' . $row['name'] . '</span>';
                echo '<span class="notifications__item__message">Thanks for the donation of ₹' . $row['amount'] . '</span>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No donations yet.</p>';
        }

        $conn->close();
        ?>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <hr>

            <div style="display: flex; justify-content: center; font-size: 50px; font-weight: 700; margin-top: 100px;">
                ABOUT LORD SHIVA
            </div>
            <section style="margin-bottom: 80px;" class="">

                <div class="container py-2">

                    <article class="postcard light green">
                        <a class="postcard__img_link" href="donate.html">
                            <img class="postcard__img" data-aos="fade-right"
                                src="assets/photo-1609609830354-8f615d61b9c8.jpg" alt="Image Title" />
                        </a>
                        <div class="postcard__text t-dark">
                            <h1 class="postcard__title green"><a href="lordshiva.php"
                                    style="text-decoration: none;  font-weight: 600;">Lord Shiva</a></h1>
                            <div class="postcard__subtitle small">

                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">Shiva, a prominent deity in Hinduism, represents the
                                destroyer and transformer within the Holy Trinity. He has a third eye symbolizing
                                wisdom, a serpent coiled around his neck, and is often depicted in meditation or dancing
                                the cosmic dance of creation and destruction. Shiva embodies spirituality, devotion, and
                                the cycle of life.</div>

                        </div>
                    </article>
                    <article class="postcard light blue">
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" data-aos="fade-left" src="assets/images-shivaling.jpg"
                                alt="Image Title" />
                        </a>
                        <div class="postcard__text t-dark">
                            <h1 class="postcard__title blue"><a style="text-decoration: none;  font-weight: 600;"
                                    href="shivalinga.php">Shiva Linga</a></h1>
                            <div class="postcard__subtitle large">

                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">The Shiva Linga is a sacred symbol in Hinduism,
                                representing Lord Shiva's divine energy and the formless aspect of the deity. It is
                                typically a cylindrical stone or pillar often set in a circular base, symbolizing the
                                union of masculine and feminine energies. Devotees worship the Linga as a source of
                                spiritual energy and transformation.</div>
                        </div>
                    </article>
                    <article class="postcard light red">
                        <a class="postcard__img_link" href="shivatandava.php">
                            <img class="postcard__img" data-aos="fade-right"
                                src="assets/lord-shiva-tandav-wallpapers-images-pics-hd-11626695022bofqqforaj.jpg"
                                alt="Image Title" />
                        </a>
                        <div class="postcard__text t-dark">
                            <h1 class="postcard__title red"><a style="text-decoration: none;  font-weight: 600;"
                                    href="shivatandava.php">Shiva Tandava</a></h1>
                            <div class="postcard__subtitle small">

                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">Shiva Tandava is a powerful and vigorous dance performed
                                by Lord Shiva. It symbolizes the cosmic rhythm and the eternal cycle of creation and
                                destruction. Shiva's dance is dynamic, expressing both his divine wrath and benevolence.
                                It's a sacred symbol of cosmic order and the balance between chaos and harmony in the
                                universe.</div>

                        </div>
                    </article>

                    <article class="postcard  light green">
                        <a class="postcard__img_link" href="shivarudraksha.php">
                            <img class="postcard__img" data-aos="fade-left"
                                src="assets/Rudraksha-with-Silver-Spacers-Silver-Buddha-Guru-Mala-1.png"
                                alt="Image Title" />
                        </a>
                        <div class="postcard__text t-dark">
                            <h1 class="postcard__title yellow"><a style="text-decoration: none; font-weight: 600;"
                                    href="shivarudraksha.php">Shiva's Rudraksha</a></h1>
                            <div class="postcard__subtitle small">

                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">Shiva's Rudraksha beads are sacred seeds with natural
                                holes, associated with Lord Shiva. Devotees wear them as prayer beads for meditation and
                                spiritual practices. The beads are believed to have healing and protective properties
                                and symbolize purity and devotion to Shiva, enhancing inner peace and spiritual growth.
                            </div>

                        </div>
                    </article>
                </div>
            </section>


            <div style="display: flex; justify-content: center; font-size: 50px; font-weight: 700;">
                GALLERY
            </div>
            <div data-aos="zoom-in-up" style=" background-color:#ffffff00;">
                <div class="content-container">
                    <div class="profile" data-aos="zoom-in-up">
                        <div class="profile-image">
                            <img src="https://images.mid-day.com/images/images/2017/mar/2-Ambernath-temple.jpg"
                                alt="Profile">
                        </div>
                        <div class="profile-name">
                            <h3>Old pic of Temple</h3>
                            <div class="profile-bio">
                                Rare pictures of the holy Ambernath temple.
                            </div>
                        </div>
                    </div>

                    <div class="profile" data-aos="zoom-in-up">
                        <div class="profile-image">
                            <img src="https://static.toiimg.com/photo/msid-98197599/98197599.jpg" alt="Profile">
                        </div>
                        <div class="profile-name">
                            <h3>New pic of Temple</h3>
                            <div class="profile-bio">Latest image of <b>Ambernath prachin mandir.</b></div>
                        </div>
                    </div>

                    <div class="profile" data-aos="zoom-in-up">
                        <div class="profile-image">
                            <img src="https://zerobeyond.com/wp-content/uploads/2021/09/3-8.jpg" alt="Profile">
                        </div>
                        <div class="profile-name">
                            <h3>Beautiful architecture</h3>
                            <div class="profile-bio">Beautiful architecture <b>Ambernath prachin mandir.</b></div>
                        </div>
                    </div>
                </div>
                <style>
                .box {
                    color: #000000;
                    padding: 2rem;
                    background-color: white;
                    position: relative;
                    box-shadow: 2px 2px 10px black;
                    transition: transform 300ms ease-in-out, box-shadow 400ms ease, background 100ms ease;

                }

                .content-container {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;


                }

                .profile-image {
                    z-index: 5;
                }

                .profile-name {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    z-index: -1;
                    background: var(--background);
                    width: 100%;
                    height: 112px;
                    padding: 8px;
                    display: none;
                    color: #333;
                    text-align: left;
                    transition: ease-in 1s;
                }

                .profile:hover .profile-name {
                    background-color: #fff;
                    display: inline;
                    margin-bottom: -8px;
                }


                .profile-name h3 {
                    margin-bottom: -8px;
                }
                </style>
                <div style="display: flex; justify-content: center; ">
                    <button onclick="document.location='gallery.php'" class="morebutton">More
                        here</button>
                </div>
<!-- 
                <iframe
src="https://www.chatbase.co/chatbot-iframe/dBvvo5V3V0XikXlix2N7W"
width="100%"
style="height: 100%; min-height: 700px"
frameborder="0"
></iframe> -->
<script>
window.embeddedChatbotConfig = {
chatbotId: "dBvvo5V3V0XikXlix2N7W",
domain: "www.chatbase.co"
}
</script>
<script
src="https://www.chatbase.co/embed.min.js"
chatbotId="dBvvo5V3V0XikXlix2N7W"
domain="www.chatbase.co"
defer>
</script>



                <div style="margin-top: 101px;" id="footer-placeholder">
                </div>

                <script>
                $(function() {
                    $("#footer-placeholder").load("footerhome.php");
                });
                </script>


            </div>

















            <script>
            const navbar = document.querySelector('#NavBar');
            let top = navbar.offsetTop;

            function stickynavbar() {
                if (window.scrollY >= top) {
                    navbar.classList.add('sticky');
                } else {
                    navbar.classList.remove('sticky');
                }
            }
            window.addEventListener('scroll', stickynavbar);
            </script>
            <script>
            AOS.init();
            </script>
            <script>
            $(document).foundation();
            </script>


            <script>
            const body = document.body;
            const progressBar = document.querySelector('.progress__bar');
            console.log(progressBar)
            const updateProgress = () => {
                let scrollPos =
                    (window.scrollY / (body.scrollHeight - window.innerHeight)) * 100;
                console.log(scrollPos)
                progressBar.style.width = `${scrollPos}%`;
                requestAnimationFrame(updateProgress);
            };

            updateProgress()
            </script>
            <script>
            window.chatbaseConfig = {
                chatbotId: "fLAhvFeKQkjpLG-62Hly4",
            }
            </script>
            <script src="https://www.chatbase.co/embed.min.js" id="fLAhvFeKQkjpLG-62Hly4" defer>
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
                integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
                crossorigin="anonymous"></script>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </div>
        <!-- <a style="z-index: 5; position: fixed; bottom: 0; left: 0; margin-left: 10px; margin-bottom: 10px; "
      href="#top"><img style="height: 50px; " src="./assets/arrow_up.png" alt=""></a> -->
</body>

</html>