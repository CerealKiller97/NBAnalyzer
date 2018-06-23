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
  return ($stmt->rowCount() > 0)? $result : 'No players found';
}

function numOfPlayers($conn) {
  $sql = 'SELECT count(*) AS numOfPlayers FROM player;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch();
  return ($stmt->rowCount() > 0)? $result : false;
}
