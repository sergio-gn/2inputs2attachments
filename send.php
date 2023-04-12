<?php
require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");

 $mail = new PHPMailer\PHPMailer\PHPMailer();
 $mail->IsSMTP(); // enable SMTP
 $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
 $mail->SMTPAuth = true; // authentication enabled
 $mail->SMTPSecure = 'tsl'; // secure transfer enabled REQUIRED for Gmail
 $mail->Host = "mail.examplehost.com";
 $mail->Port = 587; // or 587
 $mail->IsHTML(true);
 $mail->Username = "exampleemail@example.com";
 $mail->Password = "ExamplePassword123";
 $mail->SetFrom("exampleemail@example.com");
 $mail->Subject = "Assunto da mensagem";
 $mail->Body = "Escreva o texto do email aqui";
 $mail->AddAddress("exampleemailadded@gmail.com");
 for ($i=0; $i < count($_FILES['file']['tmp_name']); $i++){
      $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);
 }
 
    if(!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
       echo "Mensagem enviada com sucesso";
    }
?>
