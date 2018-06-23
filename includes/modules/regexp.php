<?php

/**
 * 
 * Validate name
 * 
 * @param  $name represent name
 * @return boolean
 */

function checkName($name) {
  $reName = '/^[A-Z][a-z]{2,}$/';
  return preg_match($reName, $name);
}

function checkLastName ($lastName) {
  $reLastNAme = '/^[A-Z][a-z]{4,40}(\s[A-Z][a-z]{5,})?$/';
  return preg_match($reLastNAme, $lastName);
}

function checkSubjectMessage ($field) {
  $reSubjectMessage = '/[A-Za-z0-9]{1,50}/';
  return preg_match($reSubjectMessage, $field);
}

function checkPassword ($password) {
  $rePassword = '/^[0-9a-zA-Z]{8,}$/';
  return preg_match($rePassword, $password);
}

function checkUsername ($username) {
  $reUsername = '/^[0-9a-zA-Z]{4,}$/';
  return preg_match($reUsername, $username);
}



