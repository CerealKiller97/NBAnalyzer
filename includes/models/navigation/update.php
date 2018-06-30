<?php
$code = 500;
$data = null;
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-Requested-With');
if (isset($_POST['delete'])) {
  require_once '../../../application/connection.php';
  //require_once 'select.php';
  $id = $_POST['id'];
  try {
    $res = deleteLink($id, $conn);
    if ($res) {
      $code = 204;
     // $data = getLinks($conn);
    } else {
      $code = 500;
    }
  } catch(PDOException $e) {
    //$data = $e->getMessage();
    echo $e->getMessage();
  }
  http_response_code($code);
  //echo json_encode($data);

}

function deleteLink ($id, $conn) {
  $sql = 'UPDATE navigation SET deleted = 1 WHERE navigationID = ?;';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  return ($stmt->rowCount() === 1) ? true : false;
}