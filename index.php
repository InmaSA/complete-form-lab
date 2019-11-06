<?php


$e = '';
$sent = '';

// comprobamos que se ha creado la variable _POST['submit'] porque se haya dado al botón de submit
if(isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
// comprobamos que todos los campos están rellenos evitando además que inyecten código

  if(!empty($name)) {
    // eliminamos los espacios antes y después del texto
    $name = trim($name);
    // filtramos la variable y le eliminamos caractetes especiales
    $name = filter_var($name, FILTER_SANITIZE_STRING);
  } else {
    // concatenamos el error al que tuviéramos antes
    $e .= "Please insert name. <br/>";
  }
  
  if(!empty($email)) {
    // eliminamos los espacios antes y después del texto
    $email = trim($email);
    // filtramos la variable y le eliminamos caractetes especiales
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // comprobamos que sea un email válido
    // FILTER_VALIDATE me devuelve false o la variable en caso de que evalúe a true.
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $e .= "Please insert a valid email. <br/>";
    }
  } else {
    $e .= "Please insert your email. <br/>";
  }

  if(!empty($message)) {
    // eliminamos caracteres especiales
    $message = htmlspecialchars($message);
    // eliminamos los espacios antes y después del texto
    $message = trim($message);
    // eliminamos las /
    $message = stripslashes($message);
  } else {
    // concatenamos el error al que tuviéramos antes
    $e .= "Please write your message. <br/>";
  }
  
  if(!$e) {
    $sent_to = 'company@company.com';
    $subject = 'mail sent from myComany name';
    $message_to_send = "From: $name \n";
    $message_to_send .= "Mail: $email \n";
    $message_to_send .= "Message: " . $message;

    mail($sent_to, $subject, $message_to_send);
    $sent = true;
  } 

}

require 'index.view.php';
?>