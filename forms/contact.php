<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $to = 'admin@goldgalore.com';
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
  $from = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
  $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
  
  if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
      $headers = ['From' => ($name?"<$name> ":'').$from,
              'X-Mailer' => 'PHP/' . phpversion()
             ];
  
      mail($to, $subject, $message."\r\n\r\nfrom: ".$_SERVER['REMOTE_ADDR'], $headers);
      die('OK');
      
  } else {
      die('Invalid address');
  }

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

  $contact->smtp = array(
    'host' => 'localhost',
    'username' => 'root',
    'password' => '12345678',
    'port' => '3306'
  );


  echo $contact->send();
?>
