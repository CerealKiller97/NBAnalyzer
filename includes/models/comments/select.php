<?php

function countComments ($conn) {
  $sql = 'SELECT COUNT(commentID) as numOfComments FROM comment';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch();
  // Check for any result
  return ($stmt->rowCount() === 1) ? $result : 'No results';
}