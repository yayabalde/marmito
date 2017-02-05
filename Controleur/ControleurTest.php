<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Plat.php';
require_once 'Modele/Commande.php';
require_once 'Modele/Utilisateur.php';
require_once 'Modele/Ingredient.php';
//require_once 'Modele/DetailPlat.php';
//require_once 'Modele/DetailCommande.php';

class ControleurTest extends Controleur{

    private $plat;
    private $commande;
    private $client;
     private $ingredient;
     private $detailplat;
     private $detailcommande;

    public function __construct() {
        $this->plat = new Plat();
        $this->client = new Utilisateur();
         $this->commande = new Commande();
         $this->ingredient = new Ingredient();
       //  $this->detailplat = new DetailPlat();
        // $this->detailcommande = new DetailCommande();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $test = $this->client->getUtilisateurs();
        $this->genererVue(['test' => $test]);
    }
    
  

}