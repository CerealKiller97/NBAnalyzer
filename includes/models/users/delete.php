<?php

$code = 500;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-Requested-With');
if (isset($_POST['delete'])) {
  require_once '../../../application/connection.php';
  $id = $_POST['id'];
  try {
    $res = deleteUser($id, $conn);
    if ($res) {
      $code = 204;
    } else {
      $code = 500;
    }
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
  
}
http_response_code($code);

function deleteUser ($id, $conn) {
  $sql = 'UPDATE user SET deleted = 1 WHERE userID = ?;';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  return ($stmt->rowCount() === 1) ? true : false;
}