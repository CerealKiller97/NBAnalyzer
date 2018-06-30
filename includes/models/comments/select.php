<?php

function countComments ($conn) {
  $sql = 'SELECT COUNT(commentID) as numOfComments FROM comment';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch();
  // Check for any result
  return ($stmt->rowCount() === 1) ? $result : false;
}

function getAllComments ($conn) {
  $sql = 'SELECT c.body, p.title, p.img,u.avatar,u.username,p.postID
          FROM comment c INNER JOIN post p 
          ON c.postID = p.postID INNER JOIN user u 
          ON c.userID = u.userID 
          ORDER BY p.time DESC  ;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  // Check for any result
  return ($stmt->rowCount() > 0) ? $result : false;
}


