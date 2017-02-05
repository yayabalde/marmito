<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Plat.php';

class ControleurEmploye extends Controleur {

    private $plat;

    public function __construct() {
        $this->plat = new Plat();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $this->genererVue();
    }

}