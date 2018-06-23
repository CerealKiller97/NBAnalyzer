<?php

/* SELECT q.questionBody,u.firstName,u.lastName,s.suggestionBody FROM (questions q INNER JOIN answer a ON q.questionID = a.questionID INNER JOIN suggestion s on a.suggestionID = s.suggestionID ) INNER JOIN user u on a.userID = u.userID 
 */
/**
 * Dohvatanje ukupnog broja glasova
 * @return {type} {description}
 */

function getTotalNumOfVotes ($conn) { // imenilac
  $sql = 'SELECT COUNT(*) AS TotalAnswers FROM answer;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch();
  return ($stmt->rowCount() === 1)? $result : false;
}

/* function foreach () {
  $sql = 'SELECT * FROM suggestion WHERE questionID = ? ;'; // legende 

} */

function getPlayerVotes ($suggestions, $conn) {
  $sql = 'SELECT COUNT(*) AS PlayerVotes ,suggestionBody
          FROM answer a INNER JOIN suggestion s
          ON a.questionID = s.suggestionID
          WHERE a.suggestionID IN (?) GROUP BY a.suggestionID;';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$suggestions]);
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $result : false;       
}

//$suggestions = implode(',',$suggestionsArr);

//getPlayerVotes($suggestions, $conn);

 /* 
  FORMULA ZA ANKETU => % zapis
  intval($player->percentage); da bi dobio int da bi mogao da sabiram
  foreach($players as $player) {
    <?= round(($player->percentage/$total)*100)
  }
 */