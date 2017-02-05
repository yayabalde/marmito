<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';

/**
 * Contrôleur gérant la connexion au site
 *
 * @author Yaya BALDE
 */
class ControleurConnexion extends Controleur
{
    private $utilisateur;

    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }


    public function index()
    {

// Connexion automatique avec les cookies de l'utilisateur
if ($this->utilisateur->est_connecte() && empty($_COOKIE['uti_id']) && empty($_COOKIE['connexion_auto']))
{
	$utilisateur = $this->utilisateur->lire_infos_utilisateur($_COOKIE['uti_id']);

	if (false !== $utilisateur)
	{
		$navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
		$hash = sha1('aaa'.$utilisateur['uti_email'].'bbb'.$utilisateur['uti_motpass'].'ccc'.$navigateur.'ddd');
		
		if ($_COOKIE['connexion_auto'] == $hash)
		{
                $this->requete->getSession()->setAttribut("uti_id", $utilisateur['uti_id']);
                $this->requete->getSession()->setAttribut("uti_email", $utilisateur['uti_email']);
                $this->requete->getSession()->setAttribut("uti_nom", $utilisateur['uti_nom']);
                $this->requete->getSession()->setAttribut("uti_role", $utilisateur['uti_role']);
                $this->requete->getSession()->setAttribut("uti_prenom", $utilisateur['uti_prenom']);
                
            if($utilisateur['uti_role']=='client'){
                   $this->rediriger("client");
                }else{
                    $this->rediriger("employe");
                }
		}
	}
}else{

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($this->requete->existeParametre("login") && $this->requete->existeParametre("mdp")) {
            $login = $this->requete->getParametre("login");
            $mdp = sha1($this->requete->getParametre("mdp"));
			if($this->requete->existeParametre("connexion_auto")){
				$connexion_auto = $this->requete->getParametre("connexion_auto");
			}
            
            if ($this->utilisateur->connecter($login, $mdp)) {
                $utilisateur = $this->utilisateur->getUtilisateur($login, $mdp);
                $this->requete->getSession()->setAttribut("uti_id", $utilisateur['uti_id']);
                $this->requete->getSession()->setAttribut("uti_email", $utilisateur['uti_email']);
                $this->requete->getSession()->setAttribut("uti_nom", $utilisateur['uti_nom']);
                $this->requete->getSession()->setAttribut("uti_role", $utilisateur['uti_role']);
                $this->requete->getSession()->setAttribut("uti_prenom", $utilisateur['uti_prenom']);
                
        // Mise en place des cookies de connexion automatique
		if (false != $connexion_auto)
		{
			$navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
			$hash_cookie = sha1('aaa'.$login.'bbb'.$mdp.'ccc'.$navigateur.'ddd');
			
			setcookie( 'uti_id', $_SESSION['uti_id'], strtotime("+1 year"), '/');
			setcookie('connexion_auto', $hash_cookie,    strtotime("+1 year"), '/');
		}
         if($utilisateur['uti_role']=='client'){
                   $this->rediriger("client");
                }else{
                    $this->rediriger("employe");
                }
            }
            else{
                $this->genererVue(array('msgErreur' => 'Login ou mot de passe incorrects'));
            }
        }
        else{
            $this->genererVue(array('msgErreur' => 'login et/ou mot de passe non défini'));
            //throw new Exception("Action impossible : login ou mot de passe non défini");
        }
        }else{
             $this->genererVue();
        }
    }
    }

    public function deconnecter()
    {
        if(!$this->requete->getSession()->existeAttribut('uti_id')){
             $this->genererVue(array('msg_erreur' => 'Vous etes dejà deconnecté. Unitile de refaire cette action.'), 'message_deconnexion');
        }else{
             $this->requete->getSession()->detruire();
            $this->genererVue(array('msg_succes' => 'Vous etes deconnecté en toute securité.'), 'message_deconnexion');
            
        }
        
        if(isset($_COOKIE['connexion_auto'])&& isset($_COOKIE['uti_id']) && !empty($_COOKIE['connexion_auto']) &&  !empty($_COOKIE['uti_id'])){
            unset($_COOKIE['connexion_auto']);
            unset($_COOKIE['uti_id']);
        }
        
    }
    
    
    public function accesrefuse()
    {
        $this->genererVue();
    }

}