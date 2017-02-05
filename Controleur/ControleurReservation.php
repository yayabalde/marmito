<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Plat.php';
require_once 'Modele/Utilisateur.php';

class ControleurReservation extends Controleur {

    private $plat;
    private $panier;
    private $utilisateur;

    public function __construct() {
        $this->plat = new Plat();
        $this->utilisateur = new Utilisateur();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $this->genererVue();
    }

}