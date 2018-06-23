<?php

function insertComment ($body, $postID,$userID,$conn) {
  $sql = 'INSERT INTO comment(commentID,body,postID,userID,time) VALUES(null,:body,:postID,:userID,null)';
  $stmt = $conn->prepare($sql);
  $stmt->execute([
    'body'   => $body,
    'postID' => $postID,
    'userID' => $userID,
    
  ]);
}