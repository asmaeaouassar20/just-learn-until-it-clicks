<?php 

// Forme 1 du polymorphisme

require_once __DIR__ . '/../interfaces/CanalNotification.php' ;

class EmailService implements CanalNotification{
    private  $seerveurSMTP = "smtp.maboutique.com";

    public function envoyer(string $destinataire, string $message) : bool {
        echo "[Email] Envoi à {$destinataire} via {$this->seerveurSMTP}\n";
        echo " Message : {$message}";

        // on simule un succès
        return true;
    }

    public function getNomCanal() : string{
        return "Email";
    }
}