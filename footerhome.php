<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=500px, initial-scale=1.0">

  <style>
    footer {

      background: #000000;
      color: white;
      overflow: hidden;


      width: 115rem;
      margin-bottom: -6rem;
      margin-left: -19rem;

    }

    .footer-top-wrapper {
      display: flex;
      /* flex-direction: row; */
      justify-content: center;
      flex-wrap: nowrap;
      
      margin: 0 auto;
      padding: 16px;
      max-width: 60rem;
      min-height: 140px;
      margin-left: 25rem;
      
    }

    .footer-top-wrapper>section {
      width: 325px;
    }

    h2 {
      text-align: center;
      color: #d2d0e6;
      margin-top: 0px;
      margin-bottom: 16px;
      opacity: 0.7;
      font-size: 26px;
      font-weight: 700;
    }

    menu {
      text-align: center;
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    menu li {
      margin-bottom: 16px;
    }


    .logo {
      margin-left: 25%;
      width: 80px;
      margin-bottom: 25px;
      background-blend-mode: screen;
    }

    .social-links {
      display: flex;
      flex-direction: row-reverse;
      gap: 42px;
      width: 180px;
    }

    .social-links img {
      width: 24px;
      height: 24px;
    }

    .footer-top {
      max-width: 800px;
    }

    .footer-bottom {
      height: 60px;

      /* display: flex; */
      text-align: center;
      align-items: center;
      justify-content: center;
      width: 100%;
      background-color: #1f1b3d;
      padding: 4px;
    }

    .footer-bottom>small {
      font-size: 16px;
      margin: 0 4px;
      margin-left: 0px;
    }

    a {
      text-decoration: none;
      color: #d2d0e6;
      text-align: center;
    }

    

    hr{
      margin-left: 327px;
      display: flex;
      width: 60%;
      /* size: 2px; */
      /* margin: auto; */
      /* align-items: center; */
      /* padding-left: 50px; */
    }
  </style>
  <title>footer</title>
</head>


<body style="background-attachment: fixed;
background-size: cover;
background-position: center;
overflow: auto;
height: 100%;

background-image: url();">


  <div>

    <footer id="footer">

      <section class="footer-top-wrapper">
        <section class='footer-top'>
    
          <img class="logo" style="filter: invert(100%);" src="Lord Shiva logo.jpeg" title='Logo' alt='Logo' />
          <span class='social-links'>
            <a>
              <img src="assets/instagram.svg" title='Instagram' alt='Instagram' />
            </a>
            <a>
              <img src="assets/youtube.svg" title='Facebook' alt='Facebook' />
            </a>
            <a>
              <img src="assets/linkedin.svg" title='Linkedin' alt='Linkedin' />
            </a>
            <a>
              <img src="assets/twitter.svg" title='Twitter' alt='Twitter' />
            </a>
          </span>
        </section>
        <section>
          <menu>
            <h2>Ambernath Temple Trust</h2>
            <li>
              <a style="text-decoration: none ; color: white;" href="home.php">Home Page</a>
            </li>
            <li>
              <a style="text-decoration: none ; color: white;" href="store/home.php">Store</a>
            </li>
            <li>
            <a style="text-decoration: none ; color: white;" href="privacy&policy.php">privacy & policy</a>
            </li>
          </menu>
        </section>
        <section>
          <menu>
            <h2 style="margin-bottom: 13px;">Any Grivences?</h2>
           
            <li>
              <a style="text-decoration: none ; color: white;" href="contactus.php">Contact Us</a>
            </li>
            <li>
              <a style="text-decoration: none ; color: white;" href="FaQ.php">FAQ</a>
            </li>
          </menu>
        </section>
        <section>
          <menu>
            <h2 style="margin-bottom: 33px;margin-top: 15px;">Address</h2>
            <li>
              <a style="text-decoration: none ; color: white;margin-bottom: -40px;" href="">Mahendra nagar, javsai gaon</a>
            </li>
            <li>
              <a style="text-decoration: none ; color: white;" href="">ambarnath west ,thane,</a>
            </li>
            <li>
              <a style="text-decoration: none ; color: white;" href=""> Maharashtra 421501</a>
            </li>
          </menu>
        </section>
      </section>
      <hr>
      <a style="z-index: 5; position: fixed; bottom: 0; left: -16%; margin-left: 10px; margin-bottom: 10px; "
      href="#top"><img style="height: 50px;filter: invert(100%); " src="./assets/arrow_up.png" alt=""></a>
      <section class="footer-bottom">
     
        <small>© Ambernath Temple Trust | 2023 All Rights Reserved</small>
      </section>


    </footer>
  </div> 
</body>

</html>
    
