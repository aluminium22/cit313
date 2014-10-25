<?php
	if(isset($_POST['submit'])){

		$first = $_POST['first'];
		$last = $_POST['last'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$sub = $_POST['subject'];
		$msg = $_POST['msg'];

		//email template

		$subject = "Client Request";
		$message = "First: " . $first . "\n".
					"Last: " . $last . "\n".
					"Email: " . $email . "\n".
					"Phone: " . $phone . "\n".
					"Subject: " . $sub . "\n".
					"Message: " . $msg;
 		$to = "aluminiumloch@gmail.com";
		$type = 'plain'; // or HTML
		$charset = 'utf-8';

		$mail     = 'no-reply@'.str_replace('www.', '', $_SERVER['SERVER_NAME']);
		$uniqid   = md5(uniqid(time()));
		$headers  = 'From: '.$mail."\n";
		$headers .= 'Reply-to: '.$mail."\n";
		$headers .= 'Return-Path: '.$mail."\n";
		$headers .= 'Message-ID: <'.$uniqid.'@'.$_SERVER['SERVER_NAME'].">\n";
		$headers .= 'MIME-Version: 1.0'."\n";
		$headers .= 'Date: '.gmdate('D, d M Y H:i:s', time())."\n";
		$headers .= 'X-Priority: 3'."\n";
		$headers .= 'X-MSMail-Priority: Normal'."\n";
		$headers .= 'Content-Type: multipart/mixed;boundary="----------'.$uniqid.'"'."\n\n";
		$headers .= '------------'.$uniqid."\n";
		$headers .= 'Content-type: text/'.$type.';charset='.$charset.''."\n";
		$headers .= 'Content-transfer-encoding: 7bit';

		mail($to, $subject, $message, $headers);
		header('Location: /view/email.php');
		

	}

	else{
		echo "email server is temporarily down.";
	}

?>