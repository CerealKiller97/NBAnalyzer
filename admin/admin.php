<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: ../index.php?page=home');
  } elseif ((isset($_SESSION['user']) && $_SESSION['user']->role !== 'Admin')) {
      print_r($_SESSION); // ako nema ovoga udje na admin ako nije admin...WTF??!
      header('Location: ../index.php?page=home');
  }
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }  else {
    header('Location: admin.php?page=dashboard');
  }
  // inc
  include 'views/head.php';
  include 'views/navigation.php';
  // queries
  include '../application/connection.php';
  include '../includes/models/users/select.php';
  include '../includes/models/comments/select.php';
  include '../includes/models/posts/select.php';
  include '../includes/models/teams/select.php';
  include '../includes/models/players/select.php';
  include '../includes/models/coach/select.php';
  include '../includes/models/navigation/select.php';
  include '../includes/models/suggestions/select.php';
  include '../includes/models/questions/select.php';


  include '../includes/modules/functions.php';
  
  $teams = getAllTeams($conn);
  $output = outputAllTeams($teams);

  $numOfComments = countComments($conn);
  $numOfUsers = getAllUsersCount($conn);
  $numOfTeams = numOfTeams($conn);
  $numOfPlayers = numOfPlayers($conn);
  $numOfPosts = getNumberOfPosts($conn);

  switch ($page) {
    case 'dashboard':
      include 'views/dashboard.php';
      break;
    case 'users':
      include 'views/users.php';
      break;

    case 'coach':
      include 'views/coach.php';
      break;

    case 'players':
      include 'views/players.php';
      break;  

    case 'comments':
      include 'views/comments.php';
      break;

    case 'posts':
      include 'views/posts.php';
      break; 

    case 'teams':
      include 'views/teams.php';
      break;  

    case 'survey':
      include 'views/survey.php';
      break;

    case 'question':
      include 'views/question.php';
      break;

    case 'suggestion':
      include 'views/suggestion.php';
      break; 

    case 'links':
      include 'views/links.php';
      break;

    default:
      #code...
        break;
  }
include 'views/footer.php';