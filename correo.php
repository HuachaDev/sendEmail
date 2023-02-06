<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
            $dotenv->load();

class Correo
{
    public function sendEmail($path_file = NULL)
    {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['CORREO'];
            $mail->Password =  $_ENV['PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom($_ENV['CORREO']);
            $mail->addAddress('luis.miguel.huachallanqui@mcets-inc.com');

            if(!is_null($path_file)){
                $mail->addAttachment($path_file); 
            }

            $mail->isHTML(true);
            $mail->Subject = 'ENVIO DE CORREO';
            $mail->Body = 'Envio';
            $mail->send();
            echo 'Email Send';
            
        } catch (Exception $e) {
            echo 'ERROR :' . $mail->ErrorInfo;
        }
    }
}

/*
            $a_emails=['lhuachallanqui@autonoma.edu.pe','luis.miguel.huachallanqui@mcets-inc.com'];
            foreach ($a_emails as $value ) {
                $mail->addAddress($value);    
            }
*/
?>