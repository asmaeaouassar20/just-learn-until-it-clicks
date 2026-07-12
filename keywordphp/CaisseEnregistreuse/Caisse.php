<?php 

class Caisse {
    // Propriété statique : elle appartient à la classe, pas à l'objet.
   // Ici, on stocke le nom par défaut de la caisse.

   protected static string $nomMagasin = "Magain Générique";

   // propriété d'instance : chaque objet caisse aura son propre total
   protected float $total = 0.0;


   // méthode d'instance : ajoute un montant au total de l'objet courant
   // ici on utilise $this car on modifie l'objet actuel
   public function ajouter(float $montant) :  void {
        $this->total += $montant; //$this fait référence à l'instance (l'objet) en cours d'utilisation
   }

   // méthode qui afficher le tocket de caisse
   public function afficherTicket() : string{
    $nom = self::$nomMagasin;
    return "Nom Magasin : $nom\n Total : $this->total";
   }


   // on utilise "static::" pour que les classes filles puissent hériter et surcharger ce comportement (Late Static Binding)
   public static function creerInstance() : self {
        // static:: fait référence à la classe qui est appelée au moment de l'exécution.
        // Si on appelle CaissePremium::creerInstance(), static:: fera référence à CaissePremium.
        return new static();
   }


   // méthode qui retourne le nom du magasin.
    // On utilise self:: ici (résolution à la compilation)
    public static function getNomMagasin() : string{
        return self::$nomMagasin;
    }
}

  


?>