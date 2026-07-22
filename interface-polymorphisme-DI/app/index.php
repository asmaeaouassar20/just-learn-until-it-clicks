<?php
// index.php
/**
 * FICHIER PRINCIPAL : Ici, on décide de la configuration
 * C'est comme si on modifiait le fichier .env et les ServiceProviders
 */

// 1. On inclut tout manuellement (dans Laravel, c'est l'autoloader Composer)
require_once 'interfaces/CanalNotification.php';
require_once 'services/EmailService.php';
require_once 'services/SMSService.php';
require_once 'services/NotificationService.php';
require_once 'services/ServiceContainer.php';
require_once 'clients/CommandeController.php';

// 2. Configuration : on choisit le canal (comme dans un ServiceProvider)
$container = new ServiceContainer();

echo " CONFIGURATION DU CANAL DE NOTIFICATION\n";
echo "-----------------------------------------\n";

// ICI, ON CHANGE UNE SEULE LIGNE POUR CHANGER TOUT LE SYSTÈME !
// Essaie de décommenter l'autre ligne pour voir la différence !

$container->bind('CanalNotification', 'EmailService');   // Choix 1 : Email
// $container->bind('CanalNotification', 'SMSService');  // Choix 2 : SMS

echo "-----------------------------------------\n\n";

// 3. Le conteneur crée le service avec la bonne dépendance
$notificationService = $container->creerNotificationService();

// 4. On crée le contrôleur avec le service déjà configuré
$controller = new CommandeController($notificationService);

// 5. Simulation de commandes
$controller->traiterNouvelleCommande("alice@email.com", ["Livre PHP", "Clavier"]);
$controller->traiterNouvelleCommande("+33612345678", ["Écran 4K", "Souris"]);
$controller->traiterNouvelleCommande("bob@email.com", ["Casque audio"]);

// 6. Démonstration : on peut changer de canal en cours de route !
echo "\n DÉMONSTRATION DE CHANGEMENT DYNAMIQUE DE CANAL\n";
echo "=================================================\n";

$smsService = new SMSService();
$notificationService->changerCanal($smsService);
$controller->traiterNouvelleCommande("+33699999999", ["Urgence : Pack premium"]);

echo "\n FIN DE L'APPLICATION\n";