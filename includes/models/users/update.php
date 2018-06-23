<?php
header('Content-Type: application/json');
$data = null;
$code = 404;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  include_once 'application/connection.php';
  include_once 'includes/models/teams/select.php';
  include_once 'includes/models/players/select.php';    
  include_once 'includes/modules/functions.php';
}

if (isset($_POST['update'])) {
  $firstName = trim($_POST['firstName']);
  $lastName = trim($_POST['lastName']);
  $email = trim($_POST['email']);
  $username = trim($_POST['username']);
  $favoriteTeam = $_POST['favouriteTeam'];
  $active = $_POST['activeCheck'];
  
  $data = 'You have successfully updated user';
  $errors = [];

  require_once '../../modules/regexp.php';

  if (!$firstName) {
    array_push($errors, 'First name must not be empty');
  } else if (!checkName($firstName)) {
    array_push($errors, 'Invalid first name');
  }

  if (!$lastName) {
    array_push($errors, 'Last name must not be empty');
  } else if (!checkName($lastName)) {
    array_push($errors, 'Invalid last name');
  }

  if (!$email) {
    array_push($errors, 'Email must not be empty');
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, ' Invalid Email ');
  }

  if (!$username) {
    array_push($errors, 'Username must not be empty');
  } else if (!checkUsername($username)) {
    array_push($errors, 'Invalid username');
  }
  
  if ($favoriteTeam === '0') {
    array_push($errors, 'You must choose a team!');
  }

  if (count($errors)) {
    $code = 422;
    $data = $errors;
  } else {
    require_once '../../../application/connection.php';
    try {
      updateUserAdminPanel();      
      $code = 204;
    } catch (PDOException $e) {
      echo $e->getMessage();
      $code = 500;
    }
  }
  echo json_encode($data);
  echo http_response_code($code);
}

function activateUser ($token, $conn) {
  $sql = 'UPDATE user SET active = 1 WHERE token = ?';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$token]);
  return ($stmt->rowCount() === 1)? true : false;
}

function updateUserAdminPanel () {

}
