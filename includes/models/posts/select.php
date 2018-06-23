<?php

function getAllPost ($conn) {
  $sql = 'SELECT * FROM post ORDER BY time DESC;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $posts = $stmt->fetchAll();
  return ($stmt->rowCount() > 0) ? $posts : false ;
}

function getPost ($id, $conn) {
  $sql = 'SELECT * FROM post WHERE postID = ?;';
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  $post = $stmt->fetch();
  return ($stmt->rowCount() === 1) ? $post : 'No news' ;
}

function getNumberOfPosts ($conn) {
  $sql = 'SELECT COUNT(*) as numberOfPosts FROM post;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $post = $stmt->fetch();
  return ($stmt->rowCount() === 1) ? $post : false;
}

function getLatestPosts ($conn) {
  $sql = 'SELECT * FROM post ORDER BY time DESC LIMIT 0,3;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $posts = $stmt->fetchAll();
  return ($stmt->rowCount() > 0) ? $posts : false;
}

function getDraftNews ($conn) {
  $sql = 'SELECT * FROM post WHERE draft = 1 ORDER BY time DESC ;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $posts = $stmt->fetchAll();
  return ($stmt->rowCount() > 0) ? $posts : false;
}

function getTradeNews ($conn) {
  $sql = 'SELECT * FROM post WHERE draft = 0 ORDER BY time DESC ;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $posts = $stmt->fetchAll();
  return ($stmt->rowCount() > 0) ? $posts : false;
}

function getCountOfTradeNews ($conn) {
  $sql = 'SELECT COUNT(*) AS numOfLinks FROM post WHERE draft = 0;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $posts = $stmt->fetch();
  return ($stmt->rowCount() === 1) ? $posts : false ;
}

function getCountOfDraftNews ($conn) {
  $sql = 'SELECT COUNT(*) AS numOfLinks FROM post WHERE draft = 1;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $posts = $stmt->fetch();
  return ($stmt->rowCount() === 1) ? $posts : false ;
}