<?php
//Import PHPMailer classes into the global namespace
require 'plugins/PHPMailer/src/PHPMailer.php';
require 'plugins/PHPMailer/src/SMTP.php';
require 'plugins/PHPMailer/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class SendMail{
//These must be at the top of your script, not inside a function
public function SendMail($mailMsg){
    //Load Composer's autoloader
    
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'imusila254@gmail.com';                     //SMTP username
        $mail->Password   = 'wera gswu modk nskc';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set 
    
        //Recipients
        $mail->setFrom('ics@gmail.com', 'ICS 2024');
        $mail->addAddress($mailMsg['to_email'], $mailMsg['to_name']);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $mailMsg['subject'];
        $mail->Body    = nl2br($mailMsg['message']);
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
    echo "An error occurred while sending your email. Please try again later.";
    }
}
}