<?php
//header('Content-type: application/json');
$code = 404;
$data = null;
if (isset($_POST['checked'])) {
  require_once '../../../application/connection.php';
  $answer = $_POST['checked'];
  $userID = $_POST['id'];
  $questionID = $_POST['questionID'];

  try {
    insertAnswerOfUser($userID, $answer, $questionID, $conn);
    $code = 201;
    $data = 'Thank you for voting! Have a nice day.';
  } catch (PDOException $e) {
    echo $e->getMessage();
  } 
}
if ($data) {
  echo json_encode($data);
}

http_response_code($code);

function insertAnswerOfUser ($userID, $answerID,$questionID ,$conn) {
  $sql = 'INSERT INTO answer(userID,questionID,suggestionID) VALUES(?,?,?);';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$userID,$answerID,$questionID]);
}