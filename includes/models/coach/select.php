<?php

function getAllCoachInfo ($conn) {
  $sql = 'SELECT c.fullName,t.name,t.picture,c.coachID
          FROM coach c INNER JOIN team t 
          ON c.coachID = t.coachID ;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $result : false ;
}