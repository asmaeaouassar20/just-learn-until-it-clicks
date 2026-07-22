<?php 

require_once __DIR__ . "/../interfaces/CanalNotification.php";

class SMSService implements CanalNotification{

    private $apiKey = "sk-123456789";

    public function envoyer(string $destinataire, string $message) :  bool{
        echo "[SMS] Envoi au {$destinataire} avec clé apu : {$this->apiKey}\n";
        echo "Message : {$message}\n";
        return rand(1,10)>1;
    }

    public function getNomCanal() : string{
        return "SMS";
    }

}
