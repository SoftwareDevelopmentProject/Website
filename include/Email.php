<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../include/PHPMailer/src/Exception.php';
require '../include/PHPMailer/src/PHPMailer.php';
require '../include/PHPMailer/src/SMTP.php';

class Email {

    function __construct($email, $subject, $body) {

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            //$mail->SMTPDebug = 3;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'technologyparkbookstore@gmail.com';                 // SMTP username
            $mail->Password = 'Liyi<3Khaibin';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ));

            //Recipients
            $mail->setFrom('technologyparkbookstore@gmail.com', 'Technology Park\'s Bookstore');
            $mail->addAddress($email);               // Name
            //Attachments                               // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
?>
