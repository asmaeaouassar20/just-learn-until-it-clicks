<?php 

class SmsService implements NotificationServiceInterface{

    public function  send(string $to, string $message) : bool {
        echo "Envoi de SMS à $to : $message";
        return true;
    }
  
}
?>