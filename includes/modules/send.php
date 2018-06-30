<?php
  header('Content-type: application/json');
  header('Access-Control-Allow-Origin: *'); 
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
  header('Access-Control-Allow-Credentials: true');
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
/*   require '../../php/vendor/phpmailer/phpmailer/src/Exception.php';
  require '../php/vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require '../php/vendor/phpmailer/phpmailer/src/SMTP.php'; */
  require '../../php/vendor/phpmailer/phpmailer/src/Exception.php';
  require '../../php/vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require '../../php/vendor/phpmailer/phpmailer/src/SMTP.php';
$code = 500; 
$data = null;
if (isset($_POST['message'])) {

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $messageField = $_POST['messageField'];

  // Regular expressions
  $reFirstName = '/^[A-Z][a-z]{2,}$/';
  $reLastName = '/^[A-Z][a-z]{4,40}(\s[A-Z][a-z]{5,})?$/';
  $reSubject = '/[A-Za-z0-9]{1,50}/';
  $reMessage = '/[A-Za-z0-9]{1,100}/';

  // Errors array
  $errors = [];

  if (!$firstName) {
    array_push($errors, 'First name must not be empty');
  } else if (!preg_match($reFirstName, $firstName)) {
    array_push($errors, 'Invalid first name');
  }

  if (!$lastName) {
    array_push($errors, 'Last name must not be empty');
  } else if (!preg_match($reFirstName, $lastName)) {
    array_push($errors, 'Invalid Last name');
  }

  if (!$email) {
    array_push($errors, 'Email must not be empty');
  }
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, 'Invalid email');

  }

  if (!$subject) {
    array_push($errors, 'Subject must not be empty');
  } else if (!preg_match($reSubject, $subject)) {
    array_push($errors, 'Invalid subject');
  }

  if (!$messageField) {
    array_push($errors, 'Message must not be empty');
  } else if (!preg_match($reMessage, $messageField)) {
    array_push($errors, 'Invalid message');
  }

  if (count($errors)) {
    $data = $errors;
    $code = 422;
  } else {
    $code = 201;
    if ($code === 201) {
      $mail = new PHPMailer(true); // Passing `true` enables exceptions
      try {
        $token = 'asd1e12334klj12';
        //Server settings
        //$mail - > SMTPDebug = 0; // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'auditornephp@gmail.com'; // SMTP username
        $mail->Password = 'Sifra123'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to

        $mail->SMTPOptions = [
          'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
          ];

        //Recipients
        $mail->setFrom('bogdanovicstefan1997@gmail.com', 'NBAnalyzer contact');
        $mail->addAddress('bogdanovicstefan1997@gmail.com'); // Add a recipient

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'NBAnalyzer contact';
         $content = '<!DOCTYPE html>
         <html>
         
         <head>
           <meta charset="UTF-8">
           <title>Vanilla or chocolate</title>
         
         </head>
         
         <body>
         
           <div style="text-align:left">
             <table cellpadding="10" cellspacing="0" style="width:100%;height:100%;background-color:rgb(255,255,255)">
               <tbody>
                 <tr>
                   <td valign="top">
                     <table align="center" cellpadding="0" cellspacing="0">
                       <tbody>
                         <tr>
                           <td>
                             <table cellpadding="0" cellspacing="0" style="width:586px">
                               <tbody>
                                 <tr>
                                   <td style="text-align:left;margin:0px;padding:10px 0px;border:none;white-space:normal;line-height:normal">
                                     <div>
                                       <div>
                                         <div style="margin:0px;padding:0px;border:none;white-space:normal;line-height:normal;overflow:visible;font-size:11px;font-family:arial;color:rgb(26,36,46);text-align:center;background:none">
                                           <div style="margin:0px;padding:0px;border:none;white-space:normal;line-height:normal;overflow:visible;font-size:11px;font-family:arial;color:rgb(26,36,46);text-align:center;background:none">
                                             <div>
                                               
                                             </div>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                   </td>
                                 </tr>
                                 <tr>
                                   <td style="text-align:left;margin:0px;padding:0px;border:none;white-space:normal;line-height:normal;height:30px;background-color:rgb(255,255,255)">
                                     <div>
                                       <div style="min-height:15px;line-height:15px"> </div>
                                     </div>
                                     <div>
                                       <table width="100%" cellspacing="0" cellpadding="0" style="max-width:586px;margin:0px auto">
                                         <tbody>
                                           <tr>
                                             <td style="text-align:center">
                                               <h1>'.$subject.'</h1>
                                             </td>
                                           </tr>
                                           <tr>
                                             <td style="text-align:left;max-width:550px">
                                               <p style="text-align:left;margin:0px auto;font-family:&#39;Century Gothic&#39;,CenturyGothic,AppleGothic,sans-serif;font-size:18px;line-height:32px;color:rgb(0,0,0)">
                                                 <br> <b>Authour</b>:  '.$firstName.' '.$lastName.'
                                                 <br> <b>Email</b>:  '.$email.'
                                                 
                                                 <br>
                                                 <b>Message</b>:  '.$messageField.'
                                                 <br>
         
         
                                             </td>
                                           </tr>
                                         </tbody>
                                       </table>
                                     </div>
                                     <div>
                                       <div style="min-height:15px;line-height:15px;margin-top:15px;border-top-width:1px;border-top-style:solid;border-top-color:rgb(119,119,119)">
                                       </div>
                                     </div>
                                     <div>
                                       <div style="margin:0px;padding:0px;border:none;white-space:normal;line-height:normal;overflow:visible;font-size:12px;font-family:arial;color:rgb(0,0,0);background:none">
                                         <div style="margin:0px;padding:0px;border:none;white-space:normal;line-height:normal;overflow:visible;font-size:12px;font-family:arial;color:rgb(0,0,0);background:none">
         
                                         </div>
                                       </div>
                                     </div>
                                   </td>
                                 </tr>
                               </tbody>
                             </table>
                           </td>
                         </tr>
                       </tbody>
                     </table>
                   </td>
                 </tr>
               </tbody>
             </table>
           </div>';
        $mail->Body = $content;
        
        if ($mail->send()) {
          $data = 'You have successfully contacted us';
          $code = 200;
        } else {
          $code = 404;
          $data = 'Server error';
        }
      } catch (Exception $e) {      
      echo $e->getMessage(); 
    }
  }
}
}
if ($data) {
  echo json_encode($data);
} 
http_response_code($code);