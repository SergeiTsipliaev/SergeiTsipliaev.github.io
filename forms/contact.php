<?php

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'serg-ciplaev@yandex.ru';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'host' => 'smtp.yandex.ru',
    'username' => 'serg-ciplaev@yandex.ru',
    'password' => 'serbeen@1991',
    'port' => '465'
  );
  

  $contact->add_message( $_POST['name'], 'Ваше Имя');
  $contact->add_message( $_POST['email'], 'E-mail');
  $contact->add_message( $_POST['message'], 'Сообщение', 10);

  echo $contact->send();
?>
