<?php

function getCommentsForPost ($postID, $conn) {
  $sql = 'SELECT u.username, u.avatar, c.body
          FROM (comment c INNER JOIN post p ON c.postID = p.postID) INNER JOIN user u
          ON c.userID = u.userID 
          WHERE p.postID = ?;';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$postID]);
  /* if ($stmt->rowCount() > 0) {
    # code...
  } else {
    # code...
  } */
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() >0) ? $result : false ; // e da li treba ispitati ako je vracen jedan red da vrati fetch ili ako je vraceno vise redova da bude fetchAll()        
}