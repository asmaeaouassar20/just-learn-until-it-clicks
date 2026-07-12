<?php 

class CaissePremium extends Caisse{

    // On surcharge la propriété statique pour la classe fille.
    protected static string $nomMagasin = "Magasin Premium (reduction -10%)";


    // propriété d'instance pour la réduction.
    private float $reduction = 0.10;

    // On surcharge la méthode ajouter pour appliquer la réduction.
    public function ajouter(float $montant) : void {
        $montantReduit = $montant* (1 - $this->reduction);

        // $this->total est l'instance actuelle (objet CaissePremium).
        $this->total += $montantReduit;
    }


    // On surcharge la méthode afficherTicket pour ajouter une mention.
    public function afficherTicket() : string {
        // Ici, on appelle la méthode du parent pour le texte de base.
        // Mais on utilise $this-> pour le total (qui est modifié par la réduction).
       $tickerParent = parent::afficherTicket() . "\n------------\n";

        return $tickerParent. "(Réduction appliquée !)" ;
    }

    // Nouvelle méthode pour la classe fille.
    public static function getNomMagasinPremium() : string {
        // Ici, self:: fera référence à CaissePremium (car écrit dans cette classe).
        return "Nom Premium : " . self::$nomMagasin;
    }

}

?>