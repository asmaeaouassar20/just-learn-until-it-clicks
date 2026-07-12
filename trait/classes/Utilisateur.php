<?php 

// Classe Utilisateur : utilise les deux traits



class Utilisateur {

   // importer les deux traits
    use UuidTrait, LoggableTrait;
    
    private string $nom;

    public function __construct(string $nom){
       $this->nom = $nom;

        // appeller les méthodes des traits
        $this->genererUuid();
        $this->log("Nouvel utilisateur crée : $nom (UUID : {$this->getUuid()})");

    }

    // méthode spécifique à l'utilisateur
    public function changerNom(string $nouveauNom) : void{
        $ancienNom = $this->nom;
        $this->nom = $nouveauNom;
        $this->log("Utilisateur renommé de '$ancienNom' à '$nouveauNom'");
    }
    

}

?>