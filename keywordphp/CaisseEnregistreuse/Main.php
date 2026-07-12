<?php 

require_once(__DIR__."/Caisse.php");
require_once(__DIR__."/CaissePremium.php");


echo "=== TEST AVEC self (résolution à la compilation) ===\n";

// On appelle la méthode statique du parent.
// self:: dans Caisse::getNomMagasin() pointe vers Caisse.
echo Caisse::getNomMagasin() . "\n"; // Affiche : Magasin Générique

// On appelle la méthode statique de l'enfant.
// self:: dans CaissePremium::getNomMagasinPremium() pointe vers CaissePremium.
echo CaissePremium::getNomMagasinPremium() . "\n"; // Affiche : Nom Premium : Magasin Premium (Réduction -10%)

echo "\n=== TEST AVEC \$this (instance) ===\n";

// Création d'une instance de Caisse normale.
$caisseNormale = new Caisse();
$caisseNormale->ajouter(100); // $this->total de l'objet = 100
echo $caisseNormale->afficherTicket() . "\n"; 
// Affiche : Ticket de : Magasin Générique - Total : 100 €

// Création d'une instance de CaissePremium.
$caissePremium = new CaissePremium();
$caissePremium->ajouter(100); // $this->total de l'objet = 90 (réduction de 10%)
echo $caissePremium->afficherTicket() . "\n";
// Affiche : Ticket de : Magasin Premium (Réduction -10%) - Total : 90 € (Réduction appliquée !)

echo "\n=== TEST AVEC static (Late Static Binding) ===\n";

// On utilise la méthode statique creerInstance().
// Dans Caisse, la méthode utilise "new static()".
// Appel depuis la classe parent :
$instance1 = Caisse::creerInstance();
var_dump($instance1); // Objet de type Caisse (normal)

// Appel depuis la classe fille (CaissePremium) :
// static:: dans creerInstance() se résout à CaissePremium (au moment de l'exécution).
$instance2 = CaissePremium::creerInstance();
var_dump($instance2); // Objet de type CaissePremium (important !)

// On vérifie que l'objet créé par CaissePremium::creerInstance() est bien une CaissePremium.
if ($instance2 instanceof CaissePremium) {
    echo "✅ L'instance créée est bien de type CaissePremium !\n";
} else {
    echo "❌ L'instance créée est de type Caisse (si on avait utilisé self::new()).\n";
}
?>