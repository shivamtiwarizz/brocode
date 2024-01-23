<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js">
    </script>
	<title>Document</title>
</head>
<body>
	<div style="width: 100%;" id="nav-placeholder">

	</div>

	<script>
		$(function () {
			$("#nav-placeholder").load("navbar.php");
		});
	</script>
<style>
        body {
            font-family: Avenir, sans-serif;
            margin: 0;
            background-color: #fff;
        }

        div.contain {
            margin: 50px;
        }

        div#quad {
            background-color: #fff;
            font-size: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.8);
        }

        div#quad figure {
            margin: 5px;
            width: calc(25% - 10px);
            height: auto;
            transition: 1s;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        div#quad figure:hover {
            cursor: pointer;
            z-index: 4;
        }

        div#quad figure img {
            width: 776px;
            height: 343px;
			object-fit: cover; /
        }

        div#quad figure figcaption {
            margin: 0;
            opacity: 0;
            background: rgba(0, 0, 0, 0.3);
            color: #fff;
            padding: 0.3rem;
            font-size: 1.2rem;
            position: absolute;
            bottom: 0;
            width: 100%;
            transition: 1s 1s opacity;
        }

        .expanded {
            transform: scale(1.2);
            z-index: 4;
        }

        div#quad figure.expanded figcaption {
            opacity: 0;
            z-index: 5;
            margin-bottom: 20px;
            text-align: center;
        }

        div.full figure:not(.expanded) {
            pointer-events: none;
        }
    </style>
</head>
<body>
<div class="contain">
    <div style="display: flex; justify-content: center;">
        <div id="quad">
            <figure>
                <img src="assets/gallery/Ambernath_Shiv_Temple.jpg" >
                <figcaption>Rose Red Wine</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img2.jpg" alt>
                <figcaption>Green Glass Bottle</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img3.jpg" alt>
                <figcaption>Guinness Barrels, Dublin</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img4.jpg" alt>
                <figcaption>Crystal Skull Vodka</figcaption>
            </figure>
        </div>
		
    </div><div id="quad">
            <figure>
                <img src="assets/gallery/img5.jpg" >
                <figcaption>Rose Red Wine</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img6.jpg" alt>
                <figcaption>Green Glass Bottle</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img7.jpeg" alt>
                <figcaption>Guinness Barrels, Dublin</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img8.jpg" alt>
                <figcaption>Crystal Skull Vodka</figcaption>
            </figure>
        </div><div id="quad">
            <figure>
                <img src="assets/gallery/img9.jpeg" >
                <figcaption>Rose Red Wine</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img10.jpg" alt>
                <figcaption>Green Glass Bottle</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img11.webp" alt>
                <figcaption>Guinness Barrels, Dublin</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img12.jpg" alt>
                <figcaption>Crystal Skull Vodka</figcaption>
            </figure>
        </div>
		<div id="quad">
            <figure>
                <img src="assets/gallery/img13.jpg" >
                <figcaption>Rose Red Wine</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img14.jpg" alt>
                <figcaption>Green Glass Bottle</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img15.webp" alt>
                <figcaption>Guinness Barrels, Dublin</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img16.jpg" alt>
                <figcaption>Crystal Skull Vodka</figcaption>
            </figure>
        </div>
		<div id="quad">
            <figure>
                <img src="assets/gallery/img17.jpg" >
                <figcaption>Rose Red Wine</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img18.jpg" alt>
                <figcaption>Green Glass Bottle</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img19.jpg" alt>
                <figcaption>Guinness Barrels, Dublin</figcaption>
            </figure>
            <figure>
                <img src="assets/gallery/img20.webp" alt>
                <figcaption>Crystal Skull Vodka</figcaption>
            </figure>
        </div>
		
    <!-- </div> -->
</div>
<div id="footer-placeholder">
</div>
<script>var quadimages = document.querySelectorAll("#quad figure");
for(i=0; i<quadimages.length; i++) {
  quadimages[i].addEventListener('click', function(){ this.classList.toggle("expanded"); quad.classList.toggle("full") }); 
}</script>
    <script>
        $(function () {
            $("#footer-placeholder").load("footer.php");
        });
    </script>

</body>

</html>