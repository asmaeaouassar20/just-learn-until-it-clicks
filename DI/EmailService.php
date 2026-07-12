<?php 


class EmailService implements NotificationServiceInterface{
    public function send(string $to, string $message):bool{
        echo "Envoir d'email à $to : $message";
        return true;
    }
}

?>