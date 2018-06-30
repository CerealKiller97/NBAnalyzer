<?php 
$data = null;
$code = 404;

if (isset($_POST['addLink'])) {
  $page = $_POST['page'];
  $href = $_POST['href'];
  $rePage = '/^[A-Z][a-z]{2,}$/';
  $reHref= '/^[a-z]{2,}$/';
  $errors = [];

  if (!$page) {
    array_push($errors, 'Page must not be empty');
  } else if (!preg_match($rePage, $page)) {
    array_push($errors, 'Invalid page name');      
  }

  if (!$href) {
    array_push($errors, 'Href must not be empty');
  } else if (!preg_match($reHref, $href)) {
    array_push($errors, 'Invalid href name');      
  }

  if (count($errors)) {
    $data = $errors;
  } else {
    require_once '../../../application/connection.php';
    try {
      $res = insertLink($page, $href, $conn);
      if ($res) {
        $data = 'Link added';
        $code = 201;
      } else {
        $data = 'Server error';
        $code = 500;
      } 
    } catch (PDOException $e) {
      $data = $e->getMessage();
      $code = 500;   
    }  
  }
  echo json_encode($data);
  http_response_code($code);
}


function insertLink ($page, $href, $conn){
  $sql = 'INSERT INTO navigation (page,href) VALUES(?,?)';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$page, $href]);
  return ($stmt->rowCount() === 1)? true : false;
}