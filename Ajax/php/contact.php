<?php

if(empty($_POST['nom'])      ||
   empty($_POST['email'])     ||
   empty($_POST['sujet'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Vous devez renseigner tous les champs";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['nom']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['sujet']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   

$to = 'yayabalde1@gmail.com';
$email_subject = "Marmito Formulaire de contact:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: yayabalde1@gmail.com\n"; 
$headers .= "Reply-To: $email_address";