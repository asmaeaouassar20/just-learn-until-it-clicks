<?php

// trait pour logger les actions importantes

trait LoggableTrait{
   // Méthode pour enregistrer un message dans un fichier de log
   public function log(string $message) : void {
       $date = date('Y-m-d H:i:s');
       $logMessage = "[$date] $message";

       // écriture dans un fichier log.txt (créé automatiquement)
       file_put_contents('log.txt' , $logMessage);

       // on peut afficher aussi dans la console
       echo "LOG: $logMessage \n";
   }
}

?>