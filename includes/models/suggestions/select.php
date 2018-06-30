<?php

function getAllSuggestions ($conn) {
  $sql = 'SELECT q.questionBody,s.suggestionID, s.suggestionBody
          FROM suggestion s INNER JOIN questions q 
          ON s.questionID = q.questionID;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $result : false;        
}