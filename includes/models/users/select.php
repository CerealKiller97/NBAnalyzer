<?php

$code = 500;

if (isset($_POST['update'])) {
  require_once '../../../application/connection.php';
  $id = $_POST['id'];
  try {
    $res = getUser($id, $conn);
    if ($res) {
      $code = 202;
    } else {
      $code = 500;
    }
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
  echo json_encode($res);
}
http_response_code($code);

/**
 * 
 * Get all users
 * 
 * @param  object $conn respresents instance of database connection
 * @return object | string
 */
$table = "user";

function getAllUsers($conn) {
  $sql = 'SELECT * FROM user ;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  // Check for any result
  return ($stmt->rowCount() > 0) ? $result : false;
}

function getAllUsersCount ($conn) {
  $sql = 'SELECT COUNT(userID) as numOfUsers FROM user WHERE  deleted = 0;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch();
  // Check for any result
  return ($stmt->rowCount() === 1) ? $result : false;
}


/**
 * Get specific user from DB via his ID
 * @param int $id represents id of user from DB
 * @param object $conn respresents instance of database connection
 * @return object | string
 */

function getUser($id, $conn) {
  $sql = 'SELECT * FROM user WHERE userID = ? AND deleted = 0;';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  $result = $stmt->fetch();
   // Check if there is only one user 
  return ($stmt->rowCount() === 1)? $result : 'No user found';
}

function verifyUser ($email, $password, $hashedPwd, $conn) {
  $sql = 'SELECT *
          FROM user u INNER JOIN role r ON u.roleID = r.roleID
          WHERE email = ? AND password = ? AND active = 1 AND deleted = 0;';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$email, $hashedPwd]);
  $user = $stmt->fetch();
  if (($stmt->rowCount() === 1) && password_verify($password, $hashedPwd)) {
    return $user;
  } else {
    return 'Password does not match';
  }
}

function fetchHashPass ($email, $conn) {
  $sql = 'SELECT * FROM user WHERE email = ? AND deleted = 0;';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$email]);
  $rows = $stmt->fetch(PDO::FETCH_ASSOC);
  return $rows['password'];  
}

function checkUser ($token, $conn) {
  $sql = 'SELECT * FROM user WHERE token = ? AND deleted = 0 ;';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$token]);
  $user = $stmt->fetch();
  return ($stmt->rowCount) ? $user : 'No user' ;
}

function getAllUsersTeam($conn) {
  global $table;
  $sql = 'SELECT u.*,r.*,t.name FROM user u INNER JOIN team t ON u.favouriteTeam = t.teamID INNER JOIN role r on u.roleID = r.roleID WHERE u.deleted = 0;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  // Check for any result
  return ($stmt->rowCount() > 0) ? $result : false;
}

