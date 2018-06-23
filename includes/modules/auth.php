<?php
header('Content-type: application/json');

if (isset($_POST['obj'])) {

  $email = $_POST['email'];
  $password = $_POST['email'];

  $data = ['email' => $email, 'password' => $password];
  $code = 200;
  echo json_encode($data);
} else {
  header('Location: ../../index.php?page=contact');
}
http_response_code($code);

// Registration
/*
if (isset($_POST['send'])) {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];

  $errors = [];

  $reFirstLastName = "/^[A-Z][a-z]{2,15}$/";
  $rePassword = "/^[A-z0-9]{6,20}$/";
  $reUsername = "/^[a-z0-9\_]{4,15}$/";

  if (!$firstName) {
    array_push($errors, "Polje za ime je obavezno.");
  }
  elseif(!preg_match($reFirstLastName, $firstName)) {
    array_push($errors, "Polje za ime je nije dobrog formata.");
  }

  if (!$lastName) {
    array_push($errors, "Polje za prezime je obavezno.");
  }
  elseif(!preg_match($reFirstLastName, $lastName)) {
    array_push($errors, "Polje za prezime je nije dobrog formata.");
  }

  if (!$username) {
    array_push($errors, "Polje za korisnicko ime je obavezno.");
  }
  elseif(!preg_match($reUsername, $username)) {
    array_push($errors, "Polje za korisnicko ime je nije dobrog formata.");
  }

  if (!$_POST['password']) {
    array_push($errors, "Polje za lozinku je obavezno.");
  }
  elseif(!preg_match($rePassword, $_POST['password'])) {
    array_push($errors, "Polje za password je nije dobrog formata.");
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Email adresa nije u dobrom formatu.");
  }

  if (count($errors)) {
    $code = 422;
    $data = $errors;
  } else {
    require "connection.php";
    $upit = 'INSERT INTO korisnik (ime, prezime, email, lozinka, korisnicko_ime, uloga_id)
    VALUES(: ime,: prezime,: email,: password,: username, 2)
    ';
    $statement = $conn - > prepare($upit);
    $statement - > bindParam(":ime", $firstName);
    $statement - > bindParam(":prezime", $lastName);
    $statement - > bindParam(":email", $email);
    $statement - > bindParam(":password", $password);
    $statement - > bindParam(":username", $username);

    try {
      $code = $statement - > execute() ? 201 : 500;
    } catch (PDOException $e) {
      $code = 409;
    }
  }
}
http_response_code($code);
echo json_encode($data); 
*/