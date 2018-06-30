<footer class="page-footer text-center font-small primary-color mt-4 wow fadeIn">
  <hr class="my-4">
  <div class="pb-4">
    <a href="https://www.facebook.com" target="_blank">
      <i class="fab fa-facebook mr-3"></i>
    </a>

    <a href="https://twitter.com" target="_blank">
      <i class="fab fa-twitter mr-3"></i>
    </a>

    <a href="https://www.youtube.com/" target="_blank">
      <i class="fab fa-youtube mr-3"></i>
    </a>

    <a href="https://plus.google.com" target="_blank">
      <i class="fab fa-google-plus mr-3"></i>
    </a>

    <a href="https://dribbble.com" target="_blank">
      <i class="fab fa-dribbble mr-3"></i>
    </a>

    <a href="https://pinterest.com" target="_blank">
      <i class="fab fa-pinterest mr-3"></i>
    </a>

    <a href="https://github.com/CerealKiller97" target="_blank">
      <i class="fab fa-github mr-3"></i>
    </a>

  </div>
  <div class="footer-copyright py-3">
    © 2018 Copyright:
    <a href="https://cerealkiller97.github.io/portfolio" target="_blank"> Stefan Bogdanovic </a>
  </div>

</footer>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script src="js/admin.js"></script>
<?php
  switch ($page):
    case 'dashboard':
      echo "<script src='js/dashboard.js'></script>";
      break;

      case 'posts':
        echo "<script src='https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js'></script>
        <script>
          ClassicEditor.create(document.querySelector('#editor')).catch(error => {
            console.error(error)
          })
        </script>";
      break;

    case 'users':
      echo "<script src='js/user.js'></script>";
      break;

    case 'links':
      echo "<script src='js/links.js'></script>";
      break;
    
endswitch;
?>
</body>
</html>