<?php

if (!isset($_SESSION['user'])) {
  header('Location: index.php?page=home');
} 
  include 'application/connection.php';
  include_once 'includes/models/teams/select.php';
  include_once 'includes/modules/functions.php';
  
  $teams = getAllTeams($conn);
  $output = outputAllTeams($teams);
  $favTeam = $_SESSION['user']->favouriteTeam;

  $userID = $_SESSION['user']->userID;
  // Date 

  $dateReg = $_SESSION['user']->registredAt;
  $date = explode(' ',$dateReg);
  $dateWithoutTime = $date[0];
  $dateElemnts = explode('-',$dateWithoutTime);
  //print_r($dateElemnts);
  $fullDate = $dateElemnts[2] . '.' .$dateElemnts[1] .'.' . $dateElemnts[0];
  // placeholder img for default
 // https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/User_font_awesome.svg/2000px-User_font_awesome.svg.png" alt=" user profile logo

 if (isset($_POST['update'])) {
  $avatar = $_FILES['avatar'];
  $fileSIZE = $avatar['size'];
  $fileTMP = $avatar['tmp_name'];
  $fileEXT = $avatar['type'];
  $fileNAME = $avatar['name'];
  define('FILE_SIZE', 2097152); // 2 MB
  $errors = [];

  $allowTypes = ['image/jpeg','image/jpg','image/gif','image/png'];

  if (!in_array($fileEXT,$allowTypes)) {
    array_push($errors, 'Invalid file type');
  } elseif ($fileSIZE > FILE_SIZE) {
    array_push($errors, 'Avatar must be less than 2 MB');        
  } 

  if (count($errors)) {
    $_SESSION['error'] = 'Invalid file type';
  } else {
    $newFile = time() . $fileNAME;
    $filePATH = 'assets/avatars/' . $newFile;
    if (move_uploaded_file($fileTMP, $filePATH)) {
      $filePATHDB = 'assets/avatars/' . $newFile;
      $sql = 'UPDATE user SET avatar = ? WHERE userID = ?;';
      $stmt = $conn->prepare($sql);
      try {
        $stmt->execute([$filePATHDB,$userID]);
        $_SESSION['success'] = 'Successfully updated profile';
        $_SESSION['avatar'] = $filePATHDB;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
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
    <div class="row">
      <div class="col-lg-3 mt-4">
        <div class="card bg-primary">
          <div class="view overlay">
            <img class="card-img-top" src="<?= (!isset($_SESSION['avatar'])) ? $_SESSION['user']->avatar : $_SESSION['avatar'] ?>" alt="<?= $_SESSION['user']->firstName .' '. $_SESSION['user']->lastName ?> logo"
            />
            <a href="#!">
              <div class="mask flex-center rgba-black-strong">
               <p class="text-white">
                <?= $_SESSION['user']->username ?>
               </p>
              </div>
            </a>
          </div>
        </div>
        <form action="<?= $_SERVER['PHP_SELF'] ?>?page=profile" method="post" enctype="multipart/form-data">
        <div class="custom-file mt-2">
          <label class="custom-file-label" for="customFile">Choose file</label>
          <input name="avatar" type="file" class="custom-file-input" id="customFile">
        </div>
      </div>
      <div class="col-lg-9">
        <div class="card-body">  

            <div class="md-form">
                <input type="text" name="firstName" id="profile-first-name" class="form-control"  value="<?= $_SESSION['user']->firstName ?>" disabled />
                <label for="profile-first-name">First Name</label>
            </div>

            <div class="md-form">
                <input type="text" name="lastName" id="profile-last-name" class="form-control" value="<?= $_SESSION['user']->lastName ?>" disabled />
                <label for="profile-last-name" >Last Name</label>
            </div>

            <div class="md-form">
                <input type="text" disabled id="profile-username" class="form-control"  value="<?= $_SESSION['user']->username ?>" disabled />
                <label for="profile-username" >Username</label>
                
            </div>

            <div class="md-form">
                <input type="text" name="email" id="profile-email" class="form-control" value="<?= $_SESSION['user']->email ?>" disabled />
                <label for="profile-email">Email</label>
            </div>

            <div class="md-form">
                <input type="text" id="profile-registered" class="form-control" value="<?=  $fullDate ?>" disabled>
                <label for="profile-registered" class="disabled">Member since </label>
              </div>

            <div class="md-form">
                <input type="password" name="password" id="profile-password" class="form-control" value="" disabled />
                <label for="profile-email">Password</label>
            </div>

        <label>Favorite team</label>
           <div class="md-form">
            <select name="team" id="favTeam" class="custom-select">
          <?php foreach ($teams as $team) : ?>
              <option value="<?= $team->teamID ?>" <?= ($favTeam === $team->teamID)? 'selected' : ''   ?>> <?= $team->name ?> </option>
          <?php endforeach; ?>
            </select>
          </div> 
                
          <button id="updateUserBtn" name="update" type="submit" class="btn btn-primary btn-block mt-4">Update profile</button>
          </form>       
        </div>
      </div>
    </div>
  </div>
  <!-- modal-dialog modal-side modal-top-right -->