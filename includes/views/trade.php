<?php
  include_once 'application/connection.php';
  include_once 'includes/models/posts/select.php'; 
  include_once 'includes/models/comments/insert.php';   
  include_once 'includes/models/comments-posts/select.php'; 
  include_once 'includes/modules/functions.php';
  $draftNews = getTradeNews($conn);
  $numOfNews = getCountOfTradeNews($conn);
  $numOfLinksPagination = 0;
  $perPage = 3;
  $from = 0;
  $numOfLinksPagination = ceil($numOfNews->numOfLinks/ $perPage);
  $p = null;
  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  
    $from = $p + ($p * 2); 
  }
    $sql = "SELECT * FROM post WHERE draft = 0 ORDER BY time DESC LIMIT ".$from.",3";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $posts = $stmt->fetchAll();  

?>

<div class="container mt-5">
<section class="my-5">
    <?php foreach ($posts as $post) : ?>
    <div class="row my-5">
      <div class="col-lg-5 col-xl-4">
        <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
          <img class="img-fluid" src="<?= $post->img ?>" alt="Sample image">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
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
  <nav aria-label="pagination example">
    <ul class="pagination justify-content-center">
        <?php for ($i = 0; $i <$numOfLinksPagination; $i++) : ?>
        <li class="page-item <?= (isset($_GET['p']) && $_GET['p'] == $i)? 'active' : ((!isset($_GET['p']) && ($i === 0)))? 'active' : ''  ?>">
          <a class="page-link" href="index.php?page=trade&p=<?= $i ?>"><?= $i+1 ?></a>
        </li>
      <?php endfor; ?>
    </ul>
</nav>
</div>