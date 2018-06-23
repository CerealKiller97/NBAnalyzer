<?php


  function insertUser ($user, $conn) {
  $sql = "INSERT INTO `user`(`userID`, `firstName`, `lastName`, `username`, `favouriteTeam`, `password`, `token`, `email`, `avatar`, `active`, `roleID`) VALUES ('',:firstName,:lastName,:username,:favouriteTeam,:pass,:token, :email,:avatar,0, 2)";
  $stmt = $conn->prepare($sql);
  $stmt->execute([
    ':firstName'     => $user->firstName,
    ':lastName'      => $user->lastName,
    ':username'      => $user->username,
    ':favouriteTeam' => $user->favouriteTeam,
    ':pass'      => $user->password,    
    ':token'         => $user->token,
    ':email'         => $user->email,
    ':avatar'        => $user->avatar
  ]);
  return ($stmt->rowCount() === 1) ? true: false;
}
