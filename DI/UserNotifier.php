<?php 

require_once(__DIR__."/NotificationServiceInterface.php");

class UserNotifier{

     // La dépendance est stockée dans une propriété privée
     private NotificationServiceInterface $notificationService;

     // INJECTION DE DÉPENDANCE via le CONSTRUCTEUR
    // On ne crée pas le service à l'intérieur, on le REÇOIT de l'extérieur
    public function __construct(NotificationServiceInterface $service){
        $this->notificationService = $service;
    }


     // Méthode qui utilise le service injecté
    public function notifyUser(string $email, string $message) : bool{
        return $this->notificationService->send($email, $message);
    }
}

?>