<?php
 session_start();
  if (isset($_SESSION['user'])) {
    session_destroy();
    unset($_SESSION['user']);
    header('Location: ../../index.php?page=home');
  } else {
   header('Location: ../../index.php?page=home'); 
    // header('Location: pera.com');
  }
