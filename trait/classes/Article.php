<?php 

// require  __DIR__ ."/../traits/LoggableTrait.php";
// require  __DIR__ ."/../traits/UuidTrait.php";

// classe Article : utilise aussi les deux traits (pas de lien avec Utilisateur)

class Article{
    use UuidTrait, LoggableTrait;

    private string $titre;

    public function __construct(string $titre){
        $this->titre = $titre;

        $this->genererUuid();
        $this->log("Nouvel article crée : $titre (UUID : {$this->getUuid()})");
    }


    public function publier() : void {
        $this->log("Article '{$this->titre}' publié ! ");
    }
}

?>