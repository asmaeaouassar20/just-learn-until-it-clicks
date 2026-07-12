<?php 

// avec class abstraite : quand il y a  un "est-un" fort

// classe abstraite = un concept partiellement implémenté

abstract class Animal {

    // Attribu commun avec valeur par défaut
    protected $nombrePattes=4;

    // méthode concrète (code partagé)
    public function dormir(){
        echo "Je dors .... zzzz";
    }


    // méthode abstraite  (chaque animal le fait différemment)
    abstract public function faireDuBruit();
}

?>