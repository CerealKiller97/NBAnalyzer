<?php
  header('Content-type: application/json');
  $code = 404;
  if (isset($_POST['login'])) {
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    
    
    // Regular expressions

    $data = ['email' => $email, 'password' => $password];
    echo json_encode(['data' => $data]);
    $code = 204;
  }
  http_response_code($code);

function sanitize ($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}