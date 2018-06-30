<?php

function getLinks($conn) {
  $sql = 'SELECT navigationID,href,page FROM navigation WHERE deleted = 0;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $result : null;
}