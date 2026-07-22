<?php
// clients/CommandeController.php
require_once __DIR__ . '/../services/NotificationService.php';
require_once __DIR__ . '/../services/ServiceContainer.php';

/**
 * Contrôleur qui gère les commandes
 * Dans Laravel, ce serait un Controller normal
 */
class CommandeController 
{
    private NotificationService $notificationService;
    
    /**
     * Le service est injecté, on ne sait pas quel canal il utilise !
     */
    public function __construct(NotificationService $notificationService) 
    {
        $this->notificationService = $notificationService;
    }
    
    public function traiterNouvelleCommande(string $client, array $produits): void 
    {
        $numeroCommande = "CMD-" . rand(1000, 9999);
                
        echo "\n NOUVELLE COMMANDE\n";
        echo "Client : {$client}\n";
        echo "Produits : " . implode(", ", $produits) . "\n";
        echo "N° Commande : {$numeroCommande}\n";        
        
        // Le contrôleur ne sait pas quel canal est utilisé
        // C'est le conteneur qui a tout configuré !
        $this->notificationService->notifierNouvelleCommande($client, $numeroCommande);
    }
}