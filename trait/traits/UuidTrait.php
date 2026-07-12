<?php 

// Trait pour générer un identifiant unique universel
trait UuidTrait {
    
    // Propriété qui stockera l'UUID
    private string $uuid;

    // méthode pour générer l'UUID automatiquement
    public function genererUuid() : void {
        // uniqid() génère un ID unique basésur le timestamp
        $this->uuid = uniqid('objet_',true);
    }


    // Getter pour récupérer l'UUID
    public function getUuid(): string {
        return $this->uuid;
    }
}

?>