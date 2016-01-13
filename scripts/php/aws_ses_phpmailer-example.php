<?php
require 'vendor/autoload.php';
use PHPMailer;

class MailComponent extends Component
{
	public function sendmail($user_email, $user_name, $subject, $body)
	{
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'email-smtp.us-east-1.amazonaws.com';
		//$mail->SMTPDebug = 1;

		$mail->SMTPAuth = true;             
		$mail->SMTPSecure = 'ssl';     
		$mail->Port = 465;
		$mail->Username = SMTP_USERNAME;
		$mail->Password =  SMTP_PASSWORD;
		$mail->CharSet = "utf-8";

		$mail->setFrom('from_email','from_title');
		$mail->addAddress($user_email, $user_name);
		$mail->Subject = $subject;
		$mail->Body    = $body;
		$mail->isHTML(true);
		
		if(!$mail->send()) {
			    echo 'Message could not be sent.';
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			 //   echo 'Message has been sent';
		}


	}   





}



?>
