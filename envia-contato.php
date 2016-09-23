<?php
require_once('PHPMailerAutoload.php');
session_start();
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'iagogaspar.uema.dpd@gmail.com';
$mail->Password = 'iagogaspar.12qwaszx';

$mail->setFrom("iagogaspar.uema.dpd@gmail.com", "Alura loja");
$mail->addAddress("antonio.iagolg@gmail.com");
$mail->Subject = "Email de contato da loja";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

if($mail->send()) {
	$_SESSION['success'] = "Mensagem enviada com sucesso!";
	header("Location: index.php");
} else {
	$_SESSION['danger'] = "Erro ao enviar a mensagem: " . $mail->ErrorInfo;
	header("Location: contato.php");
}