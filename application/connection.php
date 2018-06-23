<?php 
  require_once 'config.php';

try {
  $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", USER, PASSWORD);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
}