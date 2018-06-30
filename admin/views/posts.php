<?php
  if (isset($_POST['submit-post'])) {
      $title = $_POST['title'];
      $content = $_POST['content'];
      $postImage = $_FILES['post-img'];
      echo gettype($content);
 /*      echo '<pre>';
        print_r($postImage);
      echo '</pre>'; */
      $draft = isset($_POST['draft']) ? isset($_POST['draft']) : 0;
      echo $draft;
      $fileSIZE = $postImage['size'];
      $fileTMP = $postImage['tmp_name'];
      $fileEXT = $postImage['type'];
      $fileNAME = $postImage['name'];
      define('FILE_SIZE', 2097152); // 2 MB
      $allowTypes = ['image/jpeg','image/jpg','image/gif','image/png'];
      // Regular expressions
      $reTitle = '/^[\w\s]{1,255}$/';

      $errors = [];

      if (!$title) {
        array_push($errors, 'Title must not be empty');
      } elseif (!preg_match($reTitle, $title)) {
        array_push($errors, 'Title can contain everyting except Skadjz');
      }


      if (!in_array($fileEXT,$allowTypes)) {
        array_push($errors, 'Invalid file type');
      } elseif ($fileSIZE > FILE_SIZE) {
        array_push($errors, 'Avatar must be less than 2 MB');        
      } 

      if (!$content) {
        array_push($errors, 'Content field must not be empty');              
      }

       if (count($errors)) {
        $_SESSION['error'] = $errors;
      } else {
        $newFile = time() . $fileNAME;
        $filePATH = '../assets/posts/' . $newFile;

        if (move_uploaded_file($fileTMP, $filePATH)) {
          $filePATHDB = 'assets/posts/' . $newFile;
          $sql = 'INSERT INTO post(title,body,img,draft,userID) VALUES (:title, :body, :img, :draft,16);';
          $stmt = $conn->prepare($sql);
          try {
            $stmt->execute([
              'title' => $title,
              'body'  => $content,
              'img'   => $filePATHDB,
              'draft' => $draft
            ]);
            $_SESSION['success'] = 'Successfully added new post';
          } catch (PDOException $e) {
            echo $e->getMessage();
          }          
      }
    } 
  }
?>


<main class="pt-5 mx-lg-5">
  <div class="container-fluid">
    <!-- <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=posts">  <i class="fa fa-map mr-3"></i>Posts Page</a>
          <span>/</span>
          <span>Dashboard</span>
        </h4>

      </div> -->
      <div class="card mb-4 wow animated fadeIn">
      <div class="card-body d-sm-flex justify-content-between ">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=posts"> <i class="fa fa-map mr-3"></i>Posts Page</a>
          <span>/</span>
          <span>Dashboard</span>
        </h4>
      </div>
    </div>

  <?php if (isset($_SESSION['success'])) : ?>
  <div class="alert success-color">
        <p class="lead text-center text-white my-2"><?= $_SESSION['success'] ?></p>
      </div>
      <?php unset($_SESSION['success']); ?>
      <?php elseif (isset($_SESSION['error'])) : ?>
      <div class="alert danger-color">
        <p class="lead text-center text-white my-2"><?= implode('<br>',$_SESSION['error']) ?></p>
      </div>
      <?php unset($_SESSION['error']); ?>      
  <?php endif; ?>
      <div class="card-body">
        <h4>Posts</h4>

        <form action="<?= $_SERVER['PHP_SELF'] ?>?page=posts" method="POST" enctype="multipart/form-data">
        <div class="md-form">
          <input type="text" name="title" id="post-title" class="form-control" />
          <label for="profile-first-name">Post Title</label>
        </div>


        <div class="custom-file mt-2">
            <label class="custom-file-label" for="customFile">Choose file</label>
            <input name="post-img" type="file" class="custom-file-input" id="customFile">
          </div>


        <div class="md-form">
        <h4 class="my-4">Post Body</h4>
        <textarea name="content" id="editor" placeholder="Post body..."></textarea>
        </div>

        <div class="switch">
          <p>Draft?</p>
          
            <label>
                No
                <input type="checkbox" name="draft" id="draft" />
                <span class="lever"></span>
                Yes
            </label>
        </div>
      <button type="submit" id="postBtn" name="submit-post" class="btn btn-primary">Submit post</button>
    </form>
  </div>
  </div>
</main>