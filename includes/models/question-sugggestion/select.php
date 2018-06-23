<?php

function getQuestionsForSurvey ($questionID,$conn) {
  $sql = 'SELECT q.questionID,q.questionBody,s.suggestionID,s.suggestionBody 
          FROM questions q INNER JOIN suggestion s 
          ON q.questionID = s.questionID 
          WHERE q.questionID = ?;';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$questionID]);
  $survey = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $survey: false;
}