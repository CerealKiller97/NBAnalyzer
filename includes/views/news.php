<?php
 include_once 'application/connection.php';
 include_once 'includes/models/posts/select.php'; 
 include_once 'includes/models/comments/insert.php';   
 include_once 'includes/models/comments-posts/select.php'; 
 include_once 'includes/modules/functions.php';

  if (isset($_GET['id'])) {
    $postID = $_GET['id'];
    $post = getPost($postID, $conn);
    $comments = getCommentsForPost($postID,$conn);
  } else {
    $posts = getAllPost($conn);
  }

  if (isset($_POST['commentBtn'])) {
    $comment = $_POST['comment'];
    $userID = $_SESSION['user']->userID;

    if (empty($comment)) {     
      $_SESSION['error'] = 'Comment must not be empty';
  } else {
      try {
        insertComment($comment, $postID, $userID,$conn);
        $_SESSION['success'] = 'Comment successfully posted';     
      } catch (PDOException $e) {
       echo($e->getMessage());
      }
  }  
}

?>
  <div class="container mt-5">
  <?php if (isset($_SESSION['error'])):  ?>
      <div class="alert bg-danger">
      <p class="lead text-center my-2 text-white">
          <?php echo $_SESSION['error'];  ?>
        </p>
      </div>
      <?php unset($_SESSION['error']); ?>
<?php elseif(isset($_SESSION['success'])):  ?>
      <div class="alert bg-success">
        <p class="lead text-center my-2 text-white">
          <?= $_SESSION['success']  ?>
        </p>
      </div>
      <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

<?php if (isset($_GET['id'])) : ?>
    <h1 class="text-center ">
      <?= $post->title ?>
    </h1>
    
    <div class="view overlay zoom">
      <img src="<?= $post->img ?>"
        class="img-fluid mx-auto" alt="">
      <div class="mask flex-center waves-effect waves-light"></div>
    </div>

    <p class="text-justify mt-4">
      <?= $post->body ?>
    </p>
<?php else: ?>
<section class="my-5">
      <?php foreach ($posts as $postNew) : ?>
      <div class="row my-5">
        <div class="col-lg-5 col-xl-4">
          <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
            <img class="img-fluid" src="<?= $postNew->img ?>" alt="Sample image">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
        </div>
        <div class="col-lg-7 col-xl-8">
          <h3 class="font-weight-bold mb-3">
            <strong><?= $postNew->title ?> </strong>
          </h3>
          <p class="dark-grey-text">
          <?= substr($postNew->body,0,200).'....' ?>
          </p>
          <p>By:
            <a class="font-weight-bold">Stefan Bogdanović</a>
          </p>
          <p>
          <?php  
              $date = explode(' ',$postNew->time);
              $dateWithoutTime = $date[0];
              $dateElemnts = explode('-',$dateWithoutTime);
              $fullDate = $dateElemnts[2] . '.' .$dateElemnts[1] .'.' . $dateElemnts[0];       
              echo 'Posted on: '. '<span class="font-weight-bold">' . $fullDate . '</span>';        
            ?>
          </p>
          <a href="<?= 'index.php?page=news&id='.$postNew->postID ?>" class="btn btn-primary btn-md">Read more</a>
        </div>    
      </div>
      <hr/>
      <?php endforeach; ?>
    </section>

<?php endif; ?>
    <div class="row">
      <?php if (isset($_GET['id'])) : ?>
        <?php if(is_array($comments) && count($comments)): ?>
      <h2>Comment section</h2>
        <?php foreach ($comments as $comment) : ?>
          <div class="col-lg-12 my-4">
          <div class="media">
            <img class="d-flex mr-3 <?= ($comment->avatar === 'assets/avatars/user.png')? 'bg-primary' : '' ?> commentAvatar" src="<?= $comment->avatar ?>" alt="<?=$comment->avatar ?> logo">
            <div class="media-body">
              <h5 class="mt-0 font-weight-bold"> <?= $comment->username ?> </h5>
              <p class="lead">
              <?= $comment->body ?>
              </p>
            </div>
          </div>
          </div>
        <?php endforeach; ?>
  <?php endif; ?>
<?php endif; ?>
     
      </div>
      <?php if (isset($_GET['id'])): ?> 
  <?php if (isset($_SESSION['user'])): ?>
      <h3>Post a comment</h3>
      <div class="md-form">
        <form action="<?= $_SERVER['PHP_SELF'] ?>?page=news&id=<?= $postID ?>" method="POST">
          <textarea name="comment" type="text" id="comment" class="form-control md-textarea" rows="3"></textarea>
          <label for="comment">Comment...</label>
          <button type="submit" class="btn btn-primary" name="commentBtn">Post a comment</button>
        </form>
      </div>
      <?php else: ?>
      <div class="alert bg-primary">
     <p class="lead text-center my-2 text-white">In order to comment you must be logged in</p> 
      </div>
    <?php endif; ?>
  <?php endif; ?>
    </div>
  </div>
</div>