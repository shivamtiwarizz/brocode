<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="product_discription_wala/product_discription_style.css">
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

<body>
  <div id="nav-placeholder">

  </div>


  <header role="banner" aria-label="Heading">

    <div class="breadcrumb" role="navigation" aria-label="Breadcrumbs">
               <div class="_cont">
                 <ol>
                   <li><a src="./store.php" title="Back to the frontpage">Home</a></li>
                   <li><a src="store.php" title="">Books</a></li>
                   <li>Agni Puraan</li>
                 </ol>
               </div>
             </div>
           </header>
          <section aria-label="Main content" role="main" class="product-detail">
           <div itemscope>
       <!-- <meta itemprop="url" content="http://html-koder-test.myshopify.com/products/tommy-hilfiger-t-shirt-new-york">
       <meta itemprop="image" content="//cdn.shopify.com/s/files/1/1047/6452/products/product_grande.png?v=1446769025"> -->
       <div class="shadow">   <?php
   
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve product details from the submitted form data
        $productName = $_POST["product_name"];
        $productdesc = $_POST["product_desc"];
        $price = $_POST["price"];
        $productImage = $_POST["product_image"];
        
        // Display the product details
    
       
        
       
        } else {
        // If the form was not submitted, show an error message
        echo "<p>Error: Product details not available.</p>";
        }
        ?>
        <div class="_cont detail-top">
          <div class="cols">
            <div class="left-col">
            
              <div class="big">
                <span id="big-image" class="img" quickbeam="image"><?php echo "<img src='$productImage' alt='Product Image'>";?></span>
                  
              </div>
            </div>
            <div class="right-col">
              <h1 itemprop="name"><?php  echo "<p>$productName</p>"; ?></h1>
              <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <meta itemprop="priceCurrency" content="USD">
                <link itemprop="availability" href="http://schema.org/InStock">
                <div class="price-shipping">
                  <div class="price" id="price-preview" quickbeam="price" quickbeam-price="800">
                  <?php echo "<p>&#8377;$price</p>"; ?>
                  </div>
                </div>
             <p>
             <?php  echo "<p>$productdesc</p>"; ?>
           




             </p>
                <div class="btn-and-quantity-wrap">
                  <div class="btn-and-quantity">
                    <div class="spinner">
                      <span class="btn minus" data-id="2721888517"></span>
                      <input type="text" id="updates_2721888517" name="quantity" value="1" class="quantity-selector">
                      <input type="hidden" id="product_id" name="product_id" value="2721888517">
                      <span class="q">Qty.</span>
                      <span class="btn plus" data-id="2721888517"></span>
                    </div>
                    <div id="AddToCart" quickbeam="add-to-cart">
                    <form action="product_details.php" method="POST">
            <input type="hidden" name="product_desc" value="The Agni Purana is one of the 18 major ancient Hindu texts. It is a Sanskrit text that primarily
                  focuses on various subjects including cosmology, rituals, religious duties, legends, and ethics. The
                  text is named after the deity Agni (fire), emphasizing its role in Vedic rituals. It consists of
                  around 382 chapters and covers a wide range of topics such as creation myths, genealogies, festivals,
                  astrology, and more. The Agni Purana is valued for its insights into Hindu religious practices and
                  mythology.">
                  <input type="hidden" name="product_image" value="./books/Agni_Puraan.jpg"> 
                <input type="hidden" name="product_name" value="Agni Puraan">
                <input type="hidden" name="price" value="499">                
                <button style="color:white;background-color:black;" type="submit">Buy Now</button>
            </form>
                    </div>
                  </div>
                </div>
                </form>
               
                <div class="social-sharing-btn-wrapper">
                  <span id="social_sharing_btn">Share</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <aside class="related">
        <div class="_cont">
          <h2>You might also like</h2>
          <div class="collection-list cols-4" id="collection-list" data-products-per-page="4">
            <a class="product-box">
              <span class="img">
                <span style="background-image: url('./books/Bavam_puraan.jpg')" class="i first"></span>
                <span class="i second" style="background-image: url('./books/Bavam_puraan.jpg')"></span>
              </span>
              <span class="text">
                <strong>Shri Vaaman Puraan</strong>
                <span>
                  ₹499
                </span>
              
              </span>
            </a>
            <a class="product-box">
              <span class="img">
                <span style="background-image: url('./books/Bhagvat_puraan.jpg')" class="i first"></span>
                <span class="i second" style="background-image: url('./books/Bhagvat_puraan.jpg')"></span>
              </span>
              <span class="text">
                <strong>Shrimad Bhagwat Puran</strong>
                <span>
                  ₹499
                </span>
               
              </span>
            </a>
            <a href="/collections/men/products/copy-of-copy-of-copy-of-tommy-hilfiger-t-shirt-new-york-4"
              class="product-box">
              <span class="img">
                <span style="background-image: url('./books/Bhavishya_puraan.jpg')" class="i first"></span>
                <span class="i second" style="background-image: url('./books/Bhavishya_puraan.jpg')"></span>
              </span>
              <span class="text">
                <strong>Bhavishya Puraan</strong>
                <span>
                  ₹499
                </span>
               
              </span>
            </a>
            <a class="product-box">
              <span class="img">
                <span style="background-image: url('./books/Brahmand_puraan.jpg')" class="i first"></span>
                <span class="i second" style="background-image: url('./books/Brahmand_puraan.jpg')"></span>
              </span>
              <span class="text">
                <strong>Brahma Puraan</strong>
                <span>
                  ₹499

                </span>
               
              </span>
            </a>
           
          </div>
          <div class="more-products" id="more-products-wrap">
            <span id="more-products" data-rows_per_page="1">More products</span>
          </div>
        </div>
      </aside>
    </div>

  </section>
 

  <script>
    $(function () {
      $("#footer-placeholder").load("footer.html");
    });
  </script>



  <div id="quick-cart" quickbeam="cart">
    <a id="quick-cart-pay" quickbeam="cart-pay" class="cart-ico">
      <span>
        <strong class="quick-cart-text">Pay<br></strong>
        <span id="quick-cart-price">0</span>
        <span id="quick-cart-pay-total-count">0</span>
      </span>
    </a>
  </div>


  <div id="footer-placeholder">
    
  </div>




  <script src="product_discription_script.js"></script>
  <script>
            $(function () {
                $("#nav-placeholder").load("navbar.php");
            });
        </script>
        

        <script>
            $(function () {
                $("#footer-placeholder").load("footer.php");
            });
        </script>


</body>

</html>