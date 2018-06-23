<?php
    session_start();
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
      header('Location: index.php?page=home');
    }
    require 'includes/views/head.php';
    require 'includes/modules/upload-user-profile.php';
    require 'includes/views/nav.php';
    switch ($page) {
      
        case 'home':
          require 'includes/views/home.php';       
          break;
  
        case 'profile':
          require 'includes/views/profile-user.php';       
          break;
        
        case 'features':
          require 'includes/views/tab-pills.php';
          break;

        case 'news':
          require 'includes/views/news.php';
          break;  
        
        case 'team':
          require 'includes/views/team.php';
          break;  

        case 'activation':
          require 'includes/views/activation.php';
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
         
        case 'draft':
          require 'includes/views/draft.php';
          break;

        case 'trade':
          require 'includes/views/trade.php';
          break;  

        case 'pricing':
          require 'includes/views/pricing.php';
          break;   
  
        default:
          require 'includes/views/404.php';               
          break;
      }
    require 'includes/views/login.php';
    require 'includes/views/register.php';
    require 'includes/views/footer.php';