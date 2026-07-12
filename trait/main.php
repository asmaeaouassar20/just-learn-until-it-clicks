<?php 
require __DIR__ . "/traits/LoggableTrait.php";
require  __DIR__ ."/traits/UuidTrait.php";

require "classes/Utilisateur.php";
require "classes/Article.php";
require "classes/Commentaire.php";



$user = new Utilisateur("Alice");
$user->changerNom("Alice Martin");

$article = new Article("Les traits en PHP");
$article->publier();

$commentaire = new Commentaire(("Très bon article"));

echo "UUID de l'utilisateur : ".$user->getUuid()."\n";
echo "UUID de l'article : ".$article->getUuid()."\n";
echo "UUID du commentaire : ".$commentaire->getUuid()."\n";

?>