<?php 


// toute classe qui veut envoyer des notigfications, elle doit obligatoirement avoir ces deux méthodes

interface CanalNotification{
    public function envoyer(string $destinataire, string $message) :bool ;
    public function getNomCanal():string;
}

