<?php 

require_once __Dir__ . "/../interfaces/CanalNotification.php";

class NotificationService{

    //  On stocke la dépendance (le canal choisie)
    private CanalNotification $canal;


    // Injection de dépendance par le constructeur
    // (peu importe qui tu es, tant que tu sais envoyer des notifs)
    public function __construct(CanalNotification $canal){
        $this->canal=$canal;
        echo "Notification initialisé avec le canal : " . $canal->getNomCanal() ."\n" ;
    }


    // méthode métier : notifier un client de sa commande
    public function notifierNouvelleCommande(string $client, string $numeroCommande) : void{
        $message = "Votre commande #{$numeroCommande} a bien été enregistré ! ";
        $succes = $this->canal->envoyer($client,$message);
        if($succes){
            echo "Notification evoyé avec succes via {$this->canal->getNomCanal()}";
        }else{
            echo "Echec de l'envoi via {$this->canal->getNomCanal()}";
        }
    }



    // exemple de changement dynamique
    public function changerCanal(CanalNotification $nouveauCanal){
        $this->canal = $nouveauCanal;
        echo "Changement de canal : {$this->canal->getNomCanal()} -> {$nouveauCanal->getNomCanal()}";
    }
}