<?php

function insertTeam($conn){
  $sql = 'INSERT INTO teams(id,) VALUES();';
  $stmt = $conn->prepare($sql);
  $stmt->execute([]);
}