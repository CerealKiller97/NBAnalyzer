<?php

function getAllQuestions ($conn) {
  $sql = 'SELECT * FROM questions';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $result : false ;
}