<?php
	$name =$_POST['name'];
	$user_email= $_Post['email'];
	$message=$_POST['message'];
	
	$email_from= 'cunhadofcp@hotmail.com';
	$email_subject="Formulário KAWS";
	$email_body="Nome de Utilizador $name.\n"."Email de Utilizador $user_email.\n". "Mensagem $message.\n";
	
	$to="cunhadofcp@gmail.com";
	$headers ="From: $email_from \r\n";
	$headers .="Reply-To: $user_email \r\n";
	mail($to,$email_subject,$email_body,$headers);
	header("Location: contact_us.php");
?>