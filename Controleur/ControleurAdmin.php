<?php

require_once 'Controleur/ControleurSecuriseAdmin.php';
require_once 'Modele/Plat.php';
require_once 'Modele/Ingredient.php';
require_once 'Modele/Commande.php';
require_once 'Modele/Utilisateur.php';

class ControleurAdmin extends ControleurSecuriseAdmin{

    private $plat;
    private $commande;
    private $user;
    private $ingredient;

    public function __construct() {
        $this->plat = new Plat();
        $this->user = new Utilisateur();
         $this->commande = new Commande();
         $this->ingredient = new Ingredient();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $this->genererVue();
    }

    public function commandes() {
        $cmds = $this->commande->getCommandes();
		$this->genererVue(['cmds' => $cmds]);
    }

	public function ingredients() {
         $ings = $this->ingredient->getIngredients();
        $req =& $this->requete;
        if($req->existeParametre('id')){
            $id = $req->getParametre('id');
            if($id=="ajouter"){
                $this->genererVue([], "ajouteringredient");
            }else{
               $this->genererVue(['ings' => $ings]); 
            }
            
        }else{
            
		     $this->genererVue(['ings' => $ings]);
        }
       
    }
    
    public function plats() {
        $plats = $this->plat->getTousPlats();
        $req =& $this->requete;
        if($req->existeParametre('id')){
            $id = $req->getParametre('id');
            if($id=="ajouter"){
                $this->genererVue([], "ajouterplat");
            }else{
                 $this->genererVue(['plats' => $plats]);
            }
            
        }else{
             
		      $this->genererVue(['plats' => $plats]);
        }
    }

	public function utilisateurs() {
		$users = $this->user->getUtilisateurs();
		$this->genererVue(['users' => $users]);
    }
    
}