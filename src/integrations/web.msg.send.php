<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;

function send_web_msg($title, $description, $signature, $reply_to, $url)
{
    include dirname(__FILE__) . "/../../secrets.php";
    $username = $secrets->email_username;
    $password = $secrets->email_password;
    $from_name = $secrets->email_from_name;
    $from_address = $secrets->email_from_address;
    $send_to = $secrets->web_send_to; 
    //Load Composer's autoloader
    require "vendor/autoload.php";

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(false);

	$validator = new EmailValidator();
	$multipleValidations = new MultipleValidationWithAnd([
	    new RFCValidation(),
	    new DNSCheckValidation()
	]);
	//ietf.org has MX records signaling a server with email capabilites
	if(!$validator->isValid($reply_to, $multipleValidations)) {
		return "email_error";
	}

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
        $mail->addAddress($send_to);
        $mail->addReplyTo($reply_to);

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body = nl2br($description . "\n\n" . $signature . "\n");
        $mail->AltBody = nl2br($description . "\n\n" . $signature . "\n");

        $mail->send();
        echo "Message has been sent";
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }
}

?>
