<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$nombre = $_POST['fullname']; 
$email = $_POST['email'];
$phone = $_POST['phone'];
$mensaje = $_POST['message'];


$mail = new PHPMailer(true);
$mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'alice126566@gmail.com';                     //SMTP username
    $mail->Password   = 'alice12345-';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('alice126566@gmail.com', 'Mensaje de Alice');
    $mail->addAddress('alice126566@gmail.com', 'prueba');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Asunto muy Importante';
    $mail->Body    = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mensaje de Alice </title>
    </head>
    <body>
    <div  style="text-align: left;">
        <label>NOMBRE:</label><label>'.$nombre.'</label><br>
        <label>EMAIL:</label><label> '.$email.'</label><br>
        <label>TELEFONO:</label><label>'.$phone.'</label><br>
        <p>MENSAJE:'.$mensaje.'</p>
        
    </div>
    </body>
    </html>';

    $mail->send();
    echo '<script>alert ("Tu mensaje se envio con exito");</script>';
    echo '<script>window.location="../html/contact.html"</script>'; 
} catch (Exception $e) {
    echo "Error Presentado: {$mail->ErrorInfo}";
}

?>