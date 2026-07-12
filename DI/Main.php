<?php 
require_once(__DIR__."/NotificationServiceInterface.php");
require_once(__DIR__."/EmailService.php");
require_once(__DIR__."/SmsService.php");
require_once(__DIR__."/UserNotifier.php");

// On crée les services DE L'EXTÉRIEUR (pas dans UserNotifier)
$emailService = new EmailService();
$smsSerive = new SmsService();

// On INJECTE la dépendance voulue dans UserNotifier
$notifierWithEmail = new UserNotifier($emailService);
$notifierWithSms = new UserNotifier(($smsSerive));

// utilisation 
$notifierWithEmail->notifyUser("john@example.com" , "Bienvenue !");
echo "\n";
$notifierWithSms->notifyUser("0600100" , "votre code est 123");



?>