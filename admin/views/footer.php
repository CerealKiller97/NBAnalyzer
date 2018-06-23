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
<?php if ($page === 'dashboard') : ?>
<script type="text/javascript">
  // Animations initialization
  //pie
  //pie
  /*       let teams = ['PHX','SA','CL','BS ','NY']
              var ctxP = document.getElementById("pieChart").getContext('2d');
              var myPieChart = new Chart(ctxP, {
                  type: 'pie',
                  data: {
                      labels: teams,
                      datasets: [{
                          data: [300, 50, 100, 40, 120],
                          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                      }]
                  },
                  options: {
                      responsive: true
                  }
              })
    
    new WOW().init() */
</script>
<?php elseif($page === 'posts'): ?>
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector('#editor')).catch(error => {
    console.error(error)
  })
</script>
<?php endif; ?>
<script src="js/admin.js"></script>
</body>

</html>