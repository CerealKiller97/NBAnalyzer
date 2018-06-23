<footer class="page-footer font-small unique-color-dark mt-5 pt-0 <?= ($page === '1231')? 'fixed-bottom':'' ?>">
  <div class="primary-color">
    <div class="container">

      <div class="row py-4 d-flex align-items-center">
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-2 mb-md-0">
          <h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
        </div>

        <div class="col-md-6 col-lg-7 text-center text-md-right">
          <!-- Facebook -->
          <a class="fb-ic ml-0" href="https://facebook.com">
            <i class="fab fa-facebook-f social-icon white-text mr-lg-4"></i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic" href="https://twitter.com">
            <i class="fab fa-twitter social-icon white-text mr-lg-4 "></i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic" href="https://plus.google.com">
            <i class="fab fa-google-plus-g social-icon white-text mr-lg-4"> </i>
          </a>
          <!-- Linkedin -->
          <a class="li-ic" href="https://www.linkedin.com">
            <i class="fab fa-linkedin social-icon white-text mr-lg-4"> </i>
          </a>
          <!-- Instagram -->
          <a class="ins-ic" href="https://www.instagram.com">
            <i class="fab fa-instagram social-icon white-text mr-lg-4"> </i>
          </a>
        </div>
      </div>
    </div>
  </div>


<div  class="container mt-4 mb-4 text-center text-md-left">
  <div class="row mt-3">

    <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
      <h6 class="text-uppercase font-weight-bold">
        <strong>NBAnalyzer</strong>
      </h6>
      <hr class="primary-color mb-4 mt-0 d-inline-block mx-auto " style="width: 60px;">
      <p class="text-justify">Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur
        adipisicing elit.</p>
    </div>

    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
      <h6 class="text-uppercase font-weight-bold">
        <strong>Products</strong>
      </h6>
      <hr class="primary-color mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <p>
        <a href="#!">MDBootstrap</a>
      </p>
      <p>
        <a href="#!">MDWordPress</a>
      </p>
      <p>
        <a href="#!">BrandFlow</a>
      </p>
      <p>
        <a href="#!">Bootstrap Angular</a>
      </p>
    </div>

    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
      <h6 class="text-uppercase font-weight-bold">
        <strong>Useful links</strong>
      </h6>
      <hr class="primary-color mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <p>
        <a href="#!">Your Account</a>
      </p>
      <p>
        <a href="#!">Become an Affiliate</a>
      </p>
      <p>
        <a href="#!">Shipping Rates</a>
      </p>
      <p>
        <a href="#!">Help</a>
      </p>
    </div>

    <div class="col-md-4 col-lg-3 col-xl-3">
      <h6 class="text-uppercase font-weight-bold">
        <strong>Contact</strong>
      </h6>
      <hr class="primary-color mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <p>
        <i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
      <p>
        <i class="fa fa-envelope mr-3"></i> info@example.com</p>
      <p>
        <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
      <p>
        <i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
    </div>
  </div>
</div>

<div class="footer-copyright py-3 text-center">
  © <?= date('Y') ?> Copyright:
  <a href="https://cerealkiller97.github.io/portfolio">
    <strong class="text-primary"> Stefan Bogdanovic</strong>
  </a>
</div>
</footer>
  <!-- JS -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
  <?php if ($page === 'home' || $page === 'teams') : ?>
    <script src="js/main.js"></script>
  <?php endif;?>
  <script src="js/jquery.js"></script>
  <?php if ($page === 'contact') : ?>
    <script src="js/contact.js"></script>
  <?php endif; ?>
</body>
</html>