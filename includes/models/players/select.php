<?php

function getPlayersForTeam ($id, $conn) {
  $sql = 'SELECT p.*,t.name,pos.position,pos.abbreviation
          FROM (player p INNER JOIN team t ON p.teamID = t.teamID)
          INNER JOIN position pos ON p.positionID = pos.positionID
          WHERE t.teamID = ?
          ORDER BY p.jersey';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $result : false;
}

function numOfPlayers($conn) {
  $sql = 'SELECT count(*) AS numOfPlayers FROM player;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch();
  return ($stmt->rowCount() === 1)? $result : false;
}

function getAllPlayers ($conn) {
  $sql = 'SELECT p.playerID,p.firstName,p.lastName,t.name,po.position,po.abbreviation, p.height, p.weight,p.born, p.age,      p.jersey, p.img, t.picture 
  FROM player p INNER JOIN position po
  ON p.positionID = po.positionID INNER join team t
  ON p.teamID = t.teamID 
  ORDER BY p.lastName ASC ;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $result : false;
}