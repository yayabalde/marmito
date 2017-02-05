<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';


class ControleurContact extends Controleur {
        private $client;
    
    public function __construct() {
        $this->client = new Utilisateur();
    }
    
    
    public function index() {
        
if (array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Affiche la liste de tous les billets du blog
        if ($this->requete->existeParametre("civilite") && $this->requete->existeParametre("nom")&& $this->requete->existeParametre("email")&& $this->requete->existeParametre("sujet")&& $this->requete->existeParametre("message")) {
            $civilite = $this->requete->getParametre("civilite");
            $nom = $this->requete->getParametre("nom");
            $sujet = $this->requete->getParametre("sujet");
            $email = $this->requete->getParametre("email");
            $message = $this->requete->getParametre("message");
            
            if($this->client-> ajouter_contact($civilite, $nom, $email, $sujet, $message)){
                $this->genererVue(array('msg'=>'Votre message a bien été enregistré. Il sera traité dans les meilleurs délais. Nous vous en remercions.'));
            }
            $this->client->ajouter_contact($civilite, $nom, $email, $sujet, $message);
        }
        else{
            $this->genererVue(array('msg'=>'Tous les champs sont obligatoires.'));
            //throw new Exception("Action impossible : login ou mot de passe non défini");
        }
}else{
     $this->genererVue();
}
        
}
    
}
