<?php 

// 1. On définit d'abord une interface (contrat) pour les services de notification
// Cela permet de garantir que tous les services ont une méthode send()


interface NotificationServiceInterface{
    public function send(string $to, string $message) : bool;
}

?>