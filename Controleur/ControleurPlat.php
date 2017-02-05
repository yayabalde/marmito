<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Plat.php';
/**
 * Contrôleur des actions liées aux plats
 *
 * @author yaya BALDE
 */
class ControleurPlat extends Controleur {

    private $plat;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->plat = new Plat();
    }
    
      // Affiche la liste de tous les plats disponibles
    public function index() {
        $plats = $this->plat->getPlatsDispo();
        $this->genererVue(array('plats' => $plats));
    }

    // Affiche les détails sur un plat
    public function detaile() {
        $pla_id = $this->requete->getParametre("id");
        $plat = $this->plat->getPlat($pla_id);
        $ingredients = $this->plat->getIngredients($pla_id);
        $this->genererVue(array('plat' => $plat, 'ingredients' => $ingredients));
    }
  
    // permet de choisir un plat
    public function reserver() {
        $pla_id = $this->requete->getParametre("id");
		$_SESSION['plat_id'] = $pla_id;
		$pla = $this->plat->getPlat($pla_id);
		 $this->genererVue(array('pla_nom' => $pla['pla_titre']));
    }
	
	

public function reservation(){
	$date_rdv = $this->requete->getParametre("date_rdv");
	$qte = $this->requete->getParametre("qte"); 
if(isset($_SESSION['panier'])&& !empty($_SESSION['panier']) && array_key_exists($date_rdv, $_SESSION['panier'])){
  $msg_erreur = "Vous avez deja un rdv le ". $date_rdv . ". veuillez l'annuler et recommencer";
    $this->genererVue(array('msg_erreur' => $msg_erreur));
  }
else
  {
		$_SESSION['panier'][$date_rdv]['pla_id'] =$_SESSION['plat_id'];
        $_SESSION['panier'][$date_rdv]['pla_qte'] = $qte;
        $pla_id=$_SESSION['plat_id'];
        $pla = $this->plat->getPlat($pla_id);
        $_SESSION['panier'][$date_rdv]['pla_titre'] = $pla['pla_titre'];
        $_SESSION['panier'][$date_rdv]['pla_prix'] = $pla['pla_prix'];
		$prix_total = $pla['pla_prix']*$qte;
		
		if(isset($_SESSION['total_produits'])&&!empty($_SESSION['total_produits'])){
			$_SESSION['total_produits'] += 1; 	$_SESSION['total_prix'] += $prix_total;
		}else{ 
			$_SESSION['total_prix'] = $prix_total;  $_SESSION['total_produits'] = 1;
		}
         $this->genererVue();
		 
}
	}
    
    public function monpanier(){
       $plats = & $_SESSION['panier'];
       $this->genererVue(array('plats' => $plats));
	}
	
   public function  annulerplat(){
		$date_rdv = $this->requete->getParametre("id");
		$prix_total = $_SESSION['panier'][$date_rdv]['pla_prix']*$_SESSION['panier'][$date_rdv]['pla_qte'];
		$_SESSION['total_produits'] -= 1; 	$_SESSION['total_prix'] -= $prix_total;
        unset($_SESSION['panier'][$date_rdv]);
        $this->rediriger("plat/monpanier");
    }

    public function viderpanier(){
		unset($_SESSION['panier'], $_SESSION['total_produits'], $_SESSION['total_prix']);
		$this->rediriger("plat/monpanier");
	}

}