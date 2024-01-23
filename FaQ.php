<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/FaQ.css">
    <link rel="icon" href="assets/icon.png">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Compressed CSS -->
    <link rel="stylesheet" href=
    "https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" />
          
        <!-- Compressed JavaScript -->
        <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        </script>
        <script src=
    "https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js">
        </script>
        
             
            
             
         
    <title>FaQ</title>
</head>

<body>
    <div id="nav-placeholder">

    </div>
      
    <script>
    $(function(){
      $("#nav-placeholder").load("navbar.php");
    });
    </script>




<div class="faq-container">
    <details>
      <summary>
        <span class="faq-title">
          How long does the course take?
        </span>
        <img src="assets/plus.svg" class="expand-icon" />
      </summary>        
      <div class="faq-content">
        The video content takes more than 4.5 hours. ...
      </div>
    </details>
    <details>
      <summary>
        <span class="faq-title">
          Who teaches courses on Atheros Learning?
        </span>
        <img src="assets/plus.svg" class="expand-icon" />
      </summary>        
      <div class="faq-content">
        The authors of the courses are mostly ...
      </div>
    </details>
    <details>
      <summary>
        <span class="faq-title">How is the course different from other UX/UI design courses?</span>
        <img src="assets/plus.svg" class="expand-icon" />
      </summary>        
      <div class="faq-content">The key aspect is that this course provides a clear overview of the whole design process and principles, that represent necessary information for being successful within the industry. You will also get direct support from the author of this course, who is ready to answer all your questions and care about your next steps. Last but not least is the fact, that it's not only about video content, but you will also get access to the unique database of design resources and special offers from the partners of the course.</div>
    </details>
    <details>
      <summary>
        <span class="faq-title">Do I get a certificate after completing a course?</span>
        <img src="assets/plus.svg" class="expand-icon" />
      </summary>        
      <div class="faq-content">Yes, after successfully finishing the quizzes within the course, you can download a certificate, proving all gained knowledge and skills.</div>
    </details>
    <details>
      <summary>
        <span class="faq-title">Are there any hidden fees within the course?</span>
        <img src="assets/plus.svg" class="expand-icon" />
      </summary>        
      <div class="faq-content"> Absolutely not! You will gain all benefits and features with the one-time payment, unlocking the course.</div>
    </details>
  </div>

  <div style="margin-top: 101px;" id="footer-placeholder">
  </div>
  
      <script>
          $(function () {
              $("#footer-placeholder").load("footer.php");
          });
      </script>













<script>
    class Accordion {
    constructor(el) {
      this.el = el;
      this.summary = el.querySelector('summary');
      this.content = el.querySelector('.faq-content');
      this.expandIcon = this.summary.querySelector('.expand-icon')
      this.animation = null;
      this.isClosing = false;
      this.isExpanding = false;
      this.summary.addEventListener('click', (e) => this.onClick(e));
    }
  
    onClick(e) {
      e.preventDefault();
      this.el.style.overflow = 'hidden';

      if (this.isClosing || !this.el.open) {
        this.open();
      } else if (this.isExpanding || this.el.open) {
        this.shrink();
      }
    }
  
    shrink() {
      this.isClosing = true;

      const startHeight = `${this.el.offsetHeight}px`;
      const endHeight = `${this.summary.offsetHeight}px`;

      if (this.animation) {
        this.animation.cancel();
      }
      
      this.animation = this.el.animate({
        height: [startHeight, endHeight]
      }, {
        duration: 400,
        easing: 'ease-out'
      });

      this.animation.onfinish = () => {
        this.expandIcon.setAttribute('src', 'assets/plus.svg');
        return this.onAnimationFinish(false);
      }
      this.animation.oncancel = () => {
        this.expandIcon.setAttribute('src', 'assets/plus.svg');
        return this.isClosing = false;
      }
    }
  
    open() {
      this.el.style.height = `${this.el.offsetHeight}px`;
      this.el.open = true;
      window.requestAnimationFrame(() => this.expand());
    }
  
    expand() {
      this.isExpanding = true;

      const startHeight = `${this.el.offsetHeight}px`;
      const endHeight = `${this.summary.offsetHeight + 
                           this.content.offsetHeight}px`;

      if (this.animation) {
        this.animation.cancel();
      }
      
      this.animation = this.el.animate({
        height: [startHeight, endHeight]
      }, {
        duration: 350,
        easing: 'ease-out'
      });

      this.animation.onfinish = () => {
        this.expandIcon.setAttribute(
            'src',
            'assets/minus.svg'
        );
        return this.onAnimationFinish(true);
      }
      this.animation.oncancel = () => {
        this.expandIcon.setAttribute(
            'src',
            'assets/minus.svg'
        );
        return this.isExpanding = false;
      }
    }
  
    onAnimationFinish(open) {
      this.el.open = open;
      this.animation = null;
      this.isClosing = false;
      this.isExpanding = false;
      this.el.style.height = this.el.style.overflow = '';
    }
  }
  
  document.querySelectorAll('details').forEach((el) => {
    new Accordion(el);
  });
</script>

</body>
</html>