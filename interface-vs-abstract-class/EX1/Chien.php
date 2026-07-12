<?php 

// le chien est un animal 
// => c'est un enfant qui hérite et impémente la classe Animal

class Chien extends Animal {
    public function faireDuBruit(){
        echo "woof !";
    }
}

?>