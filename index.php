<?php

// Contrôleur frontal : instancie un routeur pour traiter toutes les requêtes entrantes du site

require 'Framework/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();