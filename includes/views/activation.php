<?php
if (isset($_GET['nacelno'])) {
  $token = $_GET['nacelno'];
  require_once 'application/connection.php';
  require_once 'includes/models/users/update.php'; 
  try {
    $result = activateUser($token, $conn); 
  } catch (PDOException $x) {
    echo $x->getMessage();
  }
} 
//

/* if (!isset($_SESSION['user'])) {
  header('Location: index.php?page=home');
} else {
    header("Location: index.php");
}  */
?>

  <div class="container mt-5 animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">
          <div class="text-white text-center py-5 px-4 my-5">
            <div>
              <h1 class="card-title pt-3 mb-5 font-bold">
                <strong>You have successfully activated your account</strong>
              </h1>
              <p class="mx-5 mb-5 font-weight-bold">
                Enjoy your time on NBAnalyzer.
              </p>
              <p>

              </p>
              <a href="index.php?page=home" class="btn btn-rounded">
                <i class="fa fa-clone left"></i> Return to home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>