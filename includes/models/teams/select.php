<?php

/**
 * 
 * Get Eastern teams
 * 
 * @param  object $conn respresents instance of database connection
 * @return arr:object||string
 */
function getAllEasternTeams($conn) {
  $sql = 'SELECT * FROM team WHERE conferenceID = 1;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $result : 'No teams found';
}

/**
 * 
 * Get Western teams
 * 
 * @param  object $conn respresents instance of database connection
 * @return arr:object||string
 */
function getAllWesternTeams($conn) {
  $sql = 'SELECT * FROM team WHERE conferenceID = 2;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $result : 'No teams found';
}

/**
 * 
 * Get all teams info
 * 
 * @param  object $conn respresents instance of database connection * 
 * @return array:object||string
 */

function getAllTeams($conn) {
  $sql = 'SELECT teamID,name 
          FROM team';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $result : 'No teams found';
}

/**
 * 
 * Get specific team info
 * 
 * @param  int $id represents id of team
 * @param  object $conn respresents instance of database connection  
 * @return object||string
 */

function getTeam($id, $conn) {
  $sql = 'SELECT t.name, t.picture, t.founded, d.division, c.fullName, a.arena, conf.conference
          FROM (((team t INNER JOIN division d ON t.divisionID = d.divisionID)
                         INNER JOIN coach c ON t.coachID = c.coachID)
                         INNER JOIN arena a ON t.arenaID = a.arenaID)
                         INNER JOIN conference conf ON d.conferenceID = conf.conferenceID
  WHERE t.teamID = ?;';     
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  $result = $stmt->fetch();
  return ($stmt->rowCount() === 1)? $result : 'No team found';
}

function numOfTeams($conn) {
  $sql = 'SELECT count(*) AS numOfTeams FROM team';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch();
  return ($stmt->rowCount() > 0)? $result : false;
}