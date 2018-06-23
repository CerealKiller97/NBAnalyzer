<?php
  header('Content-type: application/json');
  
  $code = 500;
  $data = 'Server error please try later.';  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  //require '../vendor/autoload.php';
  require '../vendor/phpmailer/phpmailer/src/Exception.php';
  require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require '../vendor/phpmailer/phpmailer/src/SMTP.php';

if (isset($_POST['register'])) {
  // Grabing fields
   $firstName = trim($_POST['firstName']);
  $lastName = trim($_POST['lastName']);
  $email = trim($_POST['email']);
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $favoriteTeam = $_POST['favoriteTeam']; //? $_POST['favoriteTeam'] : null ;
  $confirmPassword = trim($_POST['confirm']);  

   require '../../includes/modules/regexp.php';
  $errors = [];

  if (!$firstName) {
    array_push($errors, 'First name must not be empty');
  } else if (!checkName($firstName)) {
    array_push($errors, 'Invalid first name');
  }

  if (!$lastName) {
    array_push($errors, 'Last name must not be empty');
  } else if (!checkName($lastName)) {
    array_push($errors, 'Invalid last name');
  }

  if (!$email) {
    array_push($errors, 'Email must not be empty');
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, ' Invalid Email ');
  }

  if (!$username) {
    array_push($errors, 'Username must not be empty');
  } else if (!checkUsername($username)) {
    array_push($errors, 'Invalid username');
  }

  if (!$password) {
    array_push($errors, 'Password must not be empty');
  } else if (!checkPassword($password)) {
    array_push($errors, 'Invalid password');
  }

  if ($password !== $confirmPassword) {
    array_push($errors, 'Passwords do not match');    
  }

  if ($favoriteTeam === '0') {
    array_push($errors, 'You must choose a team!');
  }

  if (count($errors)) {
    $code = 422;
    $data = $errors;
  } else {
    require_once '../../application/connection.php';
    require_once '../../includes/models/users/insert.php';
    
    $user = new stdClass();
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $token =  bin2hex(random_bytes(60));

    $user->firstName = $firstName;
    $user->lastName = $lastName;
    $user->username = $username;
    $user->favouriteTeam = $favoriteTeam;
    $user->token = $token;
    $user->email = $email;
    $user->password = $hashedPassword;
    $user->avatar = 'assets/avatars/user.png';

   // var_dump($user);
    try {
      $query = insertUser($user, $conn);
     // var_dump($query);
      if ($query) {
        $code = 201;
          
        if ($code === 201) {
        $mail = new PHPMailer(true);
        try {
          //Server settings
          $mail->SMTPDebug = 0; 
          $mail->isSMTP(); 
          $mail->Host = 'smtp.gmail.com'; 
          $mail->SMTPAuth = true; 
          $mail->Username = 'auditornephp@gmail.com'; 
          $mail->Password = 'Sifra123'; 
          $mail->SMTPSecure = 'tls'; 
          $mail->Port = 587; 
          
          $mail->SMTPOptions = [
            'ssl' =>  [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                ]
              ];  

        //Recipients
       $mail->setFrom('auditonephp@gmail.com', 'NBAnalyzer');
        $mail->addAddress($email);  
        //Content
        $fullUrl = "http://nbanalyzer.infinityfreeapp.com/"; // pa ja sam hardkodovao idi dole i vidi e sad ga imamo sacem prepravim
         $mail->Subject = 'Activate your account';
      $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
      
      <head>
        <title>Founder Mantras</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Founder Mantras Email Forms">
        <meta name="keywords" content="Founder Mantras">
        <style type="text/css">
          body {
            font: 14px/20px Arial, sans-serif;
            margin: 0;
            padding: 75px 0 0 0;
            text-align: center;
            -webkit-text-size-adjust: none;
          }
      
          p {
            padding: 0 0 10px 0;
          }

          ul li {
            list-style-type: none;
          }

          a {
            text-decoration: none;
          }
      
          h1 img {
            max-width: 100%;
            height: auto !important;
            vertical-align: bottom;
          }
      
          h2 {
            font-size: 22px;
            line-height: 28px;
            margin: 0 0 12px 0;
          }
      
          h3 {
            margin: 0 0 12px 0;
          }
      
          .headerBar {
            background: none;
            padding: 0;
            border: none;
          }
      
          .wrapper {
            width: 600px;
            margin: 0 auto 10px auto;
            text-align: left;
          }
      
          input.button {
            border: none !important;
          }
      
          .button {
            display: inline-block;
            font-weight: 500;
            font-size: 16px;
            line-height: 42px;
            font-family: Arial, sans-serif;
            width: auto;
            white-space: nowrap;
            height: 42px;
            margin: 12px 5px 12px 0;
            padding: 0 22px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            border: 0;
            border-radius: 3px;
            vertical-align: top;
          }
      
          .button span {
            display: inline;
            font-family: Arial, sans-serif;
            text-decoration: none;
            font-weight: 500;
            font-style: normal;
            font-size: 16px;
            line-height: 42px;
            cursor: pointer;
            border: none;
          }
      
          .rounded6 {
            border-radius: 6px;
          }
      
          .poweredWrapper {
            padding: 20px 0;
            width: 560px;
            margin: 0 auto;
          }
      
          .poweredBy {
            display: block;
          }
      
          span.or {
            display: inline-block;
            height: 32px;
            line-height: 32px;
            padding: 0 5px;
            margin: 5px 5px 0 0;
          }
      
          .clear {
            clear: both;
          }
      
          .profile-list {
            display: block;
            margin: 15px 20px;
            padding: 0;
            list-style: none;
            border-top: 1px solid #eee;
          }
      
          .profile-list li {
            display: block;
            margin: 0;
            padding: 5px 0;
            border-bottom: 1px solid #eee;
          }
      
          html[dir=rtl] .wrapper,
          html[dir=rtl] .container,
          html[dir=rtl] label {
            text-align: right !important;
          }
      
          html[dir=rtl] ul.interestgroup_field label {
            padding: 0;
          }
      
          html[dir=rtl] ul.interestgroup_field input {
            margin-left: 5px;
          }
      
          html[dir=rtl] .hidden-from-view {
            right: -5000px;
            left: auto;
          }
      
          body,
          #bodyTable {
            background-color: #3BADFF;
          }
      
          h1 {
            font-size: 28px;
            line-height: 110%;
            margin-bottom: 30px;
            margin-top: 0;
            padding: 0;
          }
      
          #templateContainer {
            background-color: #3BADFF;
          }
      
          #templateBody {
            background-color: #3BADFF;
          }
      
          .bodyContent {
            line-height: 150%;
            font-family: Helvetica;
            font-size: 14px;
            color: #ffffff;
            padding: 20px;
          }
      
          a:link,
          a:active,
          a:visited,
          a {
            color: #f3f3f3;
          }
      
          .button:link,
          .button:active,
          .button:visited,
          .button,
          .button span {
            background-color: #ffffff !important;
            color: #3BADFF !important;
          }
      
          .button:hover {
            background-color: #000000 !important;
            color: #ffffff !important;
          }
      
          label {
            line-height: 150%;
            font-family: Helvetica;
            font-size: 16px;
            color: #ffffff;
          }
      
          .field-group input,
          select,
          textarea,
          .dijitInputField {
            font-family: Helvetica;
            color: #333333 !important;
          }
      
          .asterisk {
            color: #111111;
            font-size: 20px;
          }
      
          label .asterisk {
            visibility: hidden;
          }
      
          .indicates-required {
            display: none;
          }
      
          .field-help {
            color: #777;
          }
      
          .error,
          .errorText {
            color: #ffffff;
            font-weight: bold;
          }
      
          @media (max-width: 620px) {
            body {
              width: 100%;
              -webkit-font-smoothing: antialiased;
              padding: 10px 0 0 0 !important;
              min-width: 300px !important;
            }
      
          }
      
          @media (max-width: 620px) {
            .wrapper,
            .poweredWrapper {
              width: auto !important;
              max-width: 600px !important;
              padding: 0 10px;
            }
      
          }
      
          @media (max-width: 620px) {
            #templateContainer,
            #templateBody,
            #templateContainer table {
              width: 100% !important;
              -moz-box-sizing: border-box;
              -webkit-box-sizing: border-box;
              box-sizing: border-box;
            }
      
          }
      
          @media (max-width: 620px) {
            .addressfield span {
              width: auto;
              float: none;
              padding-right: 0;
            }
      
          }
      
          @media (max-width: 620px) {
            .captcha {
              width: auto;
              float: none;
            }
      
          }
        </style>
      
        <style type="text/css">
        </style>
      </head>
      
      <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="font: 14px/20px Arial, sans-serif;margin: 0;padding: 15px 0 0 0;text-align: center;-webkit-text-size-adjust: none;background-color: #4285f4;">
        <center>
          <table border="0" cellpadding="20" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color: #4285f4;">
            <tr>
              <td align="center" valign="top">
                <!-- // BEGIN CONTAINER -->
                <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer" class="rounded6" style="border-radius: 6px;background-color: #4285f4;">
                  <tr>
                    <td align="center" valign="top">
                      <!-- // BEGIN HEADER -->
                      <table border="0" cellpadding="0" cellspacing="0" width="600">
                        <tr>
                          <td>
                            <h1 align="center" style="font-size: 28px; line-height: 110%; margin-bottom: 30px; margin-top: 0; padding: 0; color:#f8f9fa !important; ">
                              Thanks for joining NBAnalyzer!
                            </h1>
      
                          </td>
                        </tr>
                      </table>
                      <!-- END HEADER \\ -->
                    </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">
                      <!-- // BEGIN BODY -->
                      <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody" class="rounded6" style="border-radius: 6px;background-color: #4285f4;">
                        <tr>
                          <td align="left" valign="top" class="bodyContent" style="line-height: 150%;font-family: Helvetica;font-size: 14px;color: #ffffff;padding: 20px;">
                            <h2 style="font-size: 22px;line-height: 28px;margin: 0 0 12px 0; color:#f8f9fa !important; font-weight: 100;">Please confirm your email address to continue. Click the link below to get started.
                            </h2> 
                            <a class="button" href="'.$fullUrl.'index.php?page=activation&nacelno='.$token.'" style="color: #4285f4 !important;display: inline-block;font-weight: 500;font-size: 16px;line-height: 42px;font-family:Arial, sans-serif;width: auto;white-space: nowrap;height: 42px;margin: 12px 5px 12px 0;padding: 0 22px;text-decoration: none;text-align: center;cursor: pointer;border: 0;border-radius: 3px;vertical-align: top;background-color: #ffffff !important;">
                              <span style="display: inline;font-family:Arial, sans-serif;text-decoration: none;font-weight: 500;font-style: normal;font-size: 18px;line-height: 42px;cursor: pointer;border: none;background-color: #ffffff !important;color: #f8f9fa !important; font-weight: bold;"></span> Confirm Email Address
                            </a>
                           
                            <div>
                              <p style="padding:10px; margin-bottom: -13px; font-weight: bold; background-color: #1c2331; text-align: center; color:#f8f9fa !important; ">In case you forgot your infos :)</p>
                              
                                <ul style="padding: 0 0 10px 0; border-radius: 1px; border: 2px solid #f8f9fa; padding: 1em; line-height: 2.5em; color:#f8f9fa !important; ">
                                  <li>
                                      <b style="color:#f8f9fa !important;" >First Name</b>: '.$firstName.'
                                  </li>
                                  <li>
                                      <b style="color:#f8f9fa !important;" >Last Name</b>: '.$lastName.'
                                  </li>
                                  <li>
                                      <b style="color:#f8f9fa !important;" >Username</b>: '.$username.'
                                  </li>
                                  <li>
                                      <b style="color:#f8f9fa !important; text-decoration: none; ">Email</b>: '.$email.'
                                  </li>
                                  <li>
                                      <b style="color:#f8f9fa !important;" >Password</b>: '.$password.'
                                  </li>
                                </ul>
                  
                              
                              <p style="padding: 0 0 10px 0; color:#f8f9fa !important;">For any questions, please contact:
                                <br>
                                <br> 
                                <a href="mailto:bogdanovicstefan1997@gmail.com" style="color:#f8f9fa !important; padding:1em; background-color: #1c2331;">Email: bogdanovicstefan1997@gmail.com</a>
                              </p>
                            </div>
                            <span itemscope itemtype="http://schema.org/EmailMessage">
                              <span itemprop="description" content="We need to confirm your email address."></span>
      
                              <span itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction">
                                <meta itemprop="name" content="Confirm Subscription">
                                <span itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler">
                                  <meta itemprop="url" content="https://foundermantras.us7.list-manage.com/subscribe/smartmail-confirm?u=1b74d38c8380f562118a12b0b&id=8fde0ceecc&e=d060b89991&inline=true">
                                  <link itemprop="method" href="http://schema.org/HttpRequestMethod/POST">
                                </span>
                              </span>
                            </span>
                          </td>
                        </tr>
                      </table>
                      <!-- END BODY \\ -->
                    </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">
                      <!-- // BEGIN FOOTER -->
                      <table border="0" cellpadding="20" cellspacing="0" width="600">
                        <tr>
                          <td align="center" valign="top"></td>
                        </tr>
                      </table>
                      <!-- END FOOTER \\ -->
                    </td>
                  </tr>
                </table>
                <!-- END CONTAINER \\ -->
              </td>
            </tr>
          </table>
        </center>
      </body>   
      </html>'; 
        $mail->Body = $body;       
        $mail->isHTML(true); 
         $mail->send(); 
         $code = 201;
    $data = 'Registration successfull. </br> Please check your email.';
     } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
      }     
}   
     } catch(PDOException $e) {
      $code = 409; // conflict two same identical entities two users with same username or email --> should remove email unique from DB
      $data = 'Email address is unavailable' . $e->getMessage();
    }
  
  }  
 
  } 
echo json_encode($data);
http_response_code($code);