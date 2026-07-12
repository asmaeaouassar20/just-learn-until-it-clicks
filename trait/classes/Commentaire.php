<?php 

// require  __DIR__ ."/../traits/LoggableTrait.php";
// require  __DIR__ ."/../traits/UuidTrait.php";

class Commentaire{
    use UuidTrait, LoggableTrait;
    private string $contenu;

   public function __construct(string $contenu){
      $this->contenu = $contenu;
      
      $this->genererUuid();
      $this->log("commentaire créé : $contenu");
   }
}

?>