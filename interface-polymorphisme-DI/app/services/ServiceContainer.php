<?php 


/**
 * SIMULATION SIMPLIFIÉE du Service Container de Laravel
 * 
 * Dans Laravel, c'est lui qui gère toutes les dépendances automatiquement.
 * Ici, on fait une version ultra-simple pour comprendre le principe.
 */

class ServiceContainer {
    // Tableau associatif : "interface" => "classe concrète à utiliser"
    private array $bindings = [];

     /**
     * Enregistre un binding : "Quand on demande l'interface X, crée la classe Y"
     * C'est exactement ce qu'on fait dans la méthode register() d'un ServiceProvider Laravel
     */
    public function bind(string $interface, string $classeConcrete) : void {
        $this->bindings[$interface] = $classeConcrete;
    }

    /**
     * Résout une dépendance : crée l'objet approprié
     * Dans Laravel, c'est automatique via le mécanisme de "reflection"
     */
    public function resolve(string $interface): ?object 
    {
        if (!isset($this->bindings[$interface])) {
            echo "❌ [CONTAINER] Aucune liaison trouvée pour {$interface}\n";
            return null;
        }
        
        $classe = $this->bindings[$interface];
        echo "🔨 [CONTAINER] Création de : {$classe}\n";
        return new $classe();
    }
    
    /**
     * Méthode magique : crée automatiquement NotificationService 
     * avec la bonne dépendance !
     */
    public function creerNotificationService(): NotificationService 
    {
        // Le conteneur sait quel canal utiliser grâce au binding
        $canal = $this->resolve('CanalNotification');
        return new NotificationService($canal);
    }
}