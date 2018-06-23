<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
      case 'home':
        require 'includes/views/home.php';       
        break;

      case 'profile':
        require 'includes/views/profile-user.php';       
        break;
      
      case 'features':
        require 'includes/views/features.php';
        break;
      
      case 'team':
        require 'includes/views/team.php';
        break;  

      case 'contact':
        require 'includes/views/contact.php';
        break;   

      case 'features':
        require 'includes/views/features.php';
        break; 

      case 'teams':
        require 'includes/views/teams.php';
        break;
       
      case 'admin':
        require 'includes/views/teams.php';
        break;   

      case 'logout':
        require 'includes/views/logout.php';
        break;

      default:
        require 'includes/views/404.php';               
        break;
    }
  }