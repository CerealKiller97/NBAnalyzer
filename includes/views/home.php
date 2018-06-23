<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade mt-4" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="http://images.performgroup.com/di/library/NBA_Global_CMS_image_storage/45/44/james-harden-draymond-green-ftr-041218jpg_1dhf3u5x8oxdf11wedkpgjbeuz.jpg?t=-1200981302&w=960&quality=70"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive animated fadeInDown">Light mask</h3>
        <p class="animated fadeInUp">First text</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="https://d2juyu303oh9b6.cloudfront.net/image/8fa1e0476bb35b745af12586f74b5de0.jpg?&icq=80&sig=7f0a287aa78cfdb77bdebf1f3bb46b21"
          alt="Second slide">
        <div class="mask rgba-grey-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive animated fadeInDown">Strong mask</h3>
        <p class="animated zoomIn">Secondary text</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="https://wallpapercave.com/wp/wp1827444.jpg" alt="Third slide">
        <div class="mask rgba-grey-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive animated fadeInDown">Slight mask</h3>
        <p class="animated fadeInUp">Third text</p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

<div class="container">
  <h1 class="text-center mt-4">Latest News</h1>

  <?php 
    include 'includes/models/posts/select.php';
    $postsHome = getLatestPosts($conn);
  ?>
  <section class="my-5">
    <?php foreach ($postsHome as $post) : ?>
    <div class="row my-5">

      <!-- Grid column -->
      <div class="col-lg-5 col-xl-4">

        <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
          <img class="img-fluid" src="<?= $post->img ?>" alt="<?= $post->title ?>">
          <a><div class="mask rgba-white-slight"></div></a>
        </div>

      </div>

      <div class="col-lg-7 col-xl-8">
        <h3 class="font-weight-bold mb-3">
          <strong><?= $post->title ?> </strong>
        </h3>
        <p class="dark-grey-text">
        <?= substr($post->body,0,200) ?>
        </p>
        <p>By:
          <a class="font-weight-bold">Stefan Bogdanović</a>
        </p>
        <p>
        <?php  
            $date = explode(' ',$post->time);
            $dateWithoutTime = $date[0];
            $dateElemnts = explode('-',$dateWithoutTime);
            $fullDate = $dateElemnts[2] . '.' .$dateElemnts[1] .'.' . $dateElemnts[0];       
            echo 'Posted on: '. '<span class="font-weight-bold">' . $fullDate . '</span>';        
          ?>
        </p>
        <a href="<?= 'index.php?page=news&id='.$post->postID ?>" class="btn btn-primary btn-md">Read more</a>
      </div>    
    </div>
    <hr/>
    <?php endforeach; ?>
  </section>
</div>
</div>
</div>

<?php 
  include 'includes/models/question-sugggestion/select.php';
  include 'includes/models/answers/insert.php';
  $answers = getQuestionsForSurvey(2,$conn);
  echo '<pre>';
  print_r($answers);
  echo '</pre>';
?>

<?php if (isset($_SESSION['user'])):?> <!-- ako je ulogovan treba da vidi i ako nije glasao -->
<!-- Modal: modalPoll -->
<input type="hidden" id="userID" name="userID" value="<?= $_SESSION['user']->userID ?>">
<div class="modal fade right" id="modalPoll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
  data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-primary" role="document">
    <div class="modal-content">
      <!--Header-->
      <div id="colorHeader" class="modal-header">
        <p id="header" class="heading lead text-center">Survey </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="fa fa-file-text-o fa-4x mb-3 animated rotateIn"></i>
          <p class="text-center font-weight-bold"><?= $answers[0]->questionBody ?> </p>
        </div>
        <hr>

  <?php foreach ($answers as $answer) : ?>
    <div class="form-check mb-4">
      <input class="form-check-input" name="survey" id="survey<?= $answer->suggestionID ?>" type="radio"  value="<?= $answer->suggestionID ?>">
      <label class="form-check-label" for="survey<?= $answer->suggestionID ?>"><?= $answer->suggestionBody ?></label>
      <input type="hidden" class="suggestions" value="<?= $answer->suggestionID ?>">
    </div>
  <?php endforeach; ?>
        <!-- Radio -->
      </div>
        <p id="voteHint" class="ml-4 text-danger"></p>
      <!--Footer-->
      <div class="modal-footer justify-content-center">
      <input type="hidden" id="questionID" value="<?= $answer->questionID ?>">
        <button id="voteBtn" type="button" class="btn btn-primary waves-effect waves-light">Vote
          <i class="fa fa-paper-plane ml-1"></i>
        </button>
        <button type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalPoll -->
<?php endif; ?>

