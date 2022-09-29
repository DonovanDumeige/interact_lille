<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require "./assets/service/vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "./assets/service/vendor/phpmailer/phpmailer/src/Exception.php";
require "./assets/service/vendor/phpmailer/phpmailer/src/SMTP.php";

require __DIR__."/vendor/autoload.php";

function contact(string $reason, string $request, string $mess, string $email):string{
$mail = new PHPMailer(true);
try{
    // server settings
    $mail->isSMTP();
    $mail->Host = "smtp.mailtrap.io";
    $mail->SMTPAuth = true;
    $mail->Port =25;
    $mail->Username = "votreUsername";
    $mail->Password = "votrePassword";
    $mail->setFrom($email);
    $mail->addAddress("test@test.com");
    $mail->Subjet = $reason;
    $mail->Body = $mess;
    $mail->isHTML(true);

}catch(Exception $e){
    return "Mince ! Le message n'a pas pu être envoyé. <br>
            Mailer Error : {$mail->ErrorInfo}";
}
}


?>