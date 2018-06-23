<?php
  header('Content-type: application/json');
  session_start();
  $data = '';
  $code = 404;

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $rePassword = '/^[0-9a-zA-Z]{8,}$/';

  $errors = [];

  if (!$email) {
    array_push($errors, 'Email must not be empty');
  } elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    array_push($errors, 'Invalid email');    
  }

  if (!$password) { 
    array_push($errors, 'Password must not be empty');
  } else if (!preg_match($rePassword ,$password)) {
    array_push($errors, 'Invalid password');
  }
  
  
  if (count($errors)) {
    $data = $errors;
    $code = 422;
  } else {
    require_once '../../application/connection.php';
    require_once '../../includes/models/users/select.php';
    //$hashedPwd = password_hash($password, PASSWORD_BCRYPT);
    $passwordDB = fetchHashPass($email, $conn);
    try {
      $user = verifyUser($email, $password ,$passwordDB, $conn);
      //var_dump($user);
      if ($user !== 'Password does not match') {       
          $_SESSION['user'] = $user; // samo da ispitam is_object
          $data = 'You have successfully logged in';
          $code = 200;
      } else { // nema usera
          $data = 'Email and password do not match';
          $code = 422;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }  
  }
} 
echo json_encode($data);
http_response_code($code);