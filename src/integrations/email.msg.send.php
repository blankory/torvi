<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_email_msg($title, $description, $signature, $reply_to, $url)
{
    include dirname(__FILE__) . "/../../secrets.php";
    $username = $secrets->email_username;
    $password = $secrets->email_password;
    $from_name = $secrets->email_from_name;
    $from_address = $secrets->email_from_address;
    $send_to = $secrets->email_send_to; // Array
    //Load Composer's autoloader
    require "vendor/autoload.php";

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(false);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = "smtp.gmail.com"; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = $username; //SMTP username
        $mail->Password = $password; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 465; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Encoding = "base64";
        $mail->CharSet = "UTF-8";

        //Recipients
        $mail->setFrom($from_address, $from_name);
        foreach ($send_to as $email_address) {
            $mail->addAddress($email_address); //Name is optional
        }
        $mail->addReplyTo($reply_to);

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body = nl2br($description . "\n" . $signature);
        $mail->AltBody = nl2br($description . "\n" . $signature);

        $mail->send();
        echo "Message has been sent";
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }
}

?>
