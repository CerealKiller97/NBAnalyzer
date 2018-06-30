<?php
$data = null;
$code = 404;
header('Content-type: application/json');
  if (isset($_POST['addUserInfo'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $favoriteTeam = $_POST['favoriteTeam'];

    $errors = [];

    require '../../modules/regexp.php';

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
  
    if (!$password) {
      array_push($errors, 'Password must not be empty');
    } else if (!checkPassword($password)) {
      array_push($errors, 'Invalid password');
    }
  
    if ($favoriteTeam === '0') {
      array_push($errors, 'You must choose a team!');
    }

    if (count($errors)) {
      $data = $errors;
      $code = 422;
    } else {
      require_once '../../../application/connection.php';
      $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
      // db insert to db
      $data =$hashedPassword; //'You have successfully added new user';
    $code = 201;
    echo json_encode($data);
    http_response_code($code);
  }
  }


  function insertUser ($user, $conn) {
  $sql = "INSERT INTO `user`(`userID`, `firstName`, `lastName`, `username`, `favouriteTeam`, `password`, `token`, `email`, `avatar`, `active`, `roleID`) VALUES ('',:firstName,:lastName,:username,:favouriteTeam,:pass,:token, :email,:avatar,0, 2)";
  $stmt = $conn->prepare($sql);
  $stmt->execute([
    ':firstName'     => $user->firstName,
    ':lastName'      => $user->lastName,
    ':username'      => $user->username,
    ':favouriteTeam' => $user->favouriteTeam,
    ':pass'      => $user->password,    
    ':token'         => $user->token,
    ':email'         => $user->email,
    ':avatar'        => $user->avatar
  ]);
  return ($stmt->rowCount() === 1) ? true: false;
}


function insertUserAdmin () {

}