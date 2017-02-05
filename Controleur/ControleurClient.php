<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/Plat.php';
require_once 'Modele/Commande.php';
require_once 'Modele/Utilisateur.php';

class ControleurClient extends ControleurSecurise{

    private $plat;
    private $commande;
    private $client;

    public function __construct() {
        $this->plat = new Plat();
        $this->client = new Utilisateur();
         $this->commande = new Commande();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $this->rediriger("client/profile");
    }
    
    public function profile() {
		$req =& $this->requete;
		$client_id = $_SESSION['uti_id'];
		$client=$this->client -> lire_infos_utilisateur($client_id);
		if($req->existeParametre('id')){
			$id = $req->getParametre('id');
			if($id == "modifierinfos"){
				if($this->modifierinfos()){
					$succes = "La modification de vos informations a bien été effectuée.";
					$client=$this->client -> lire_infos_utilisateur($client_id);
					$this->genererVue(array('client' => $client, 'succes' => $succes));
				}else{
                    $erreur = "Erreur dans la modification de vos informations. Veuillez réessayer.";
				    $this->genererVue(array('client' => $client, 'erreur' => $erreur));
                }
			}elseif($id=="modifieradress"){
				if($this->modifieradress()){
					$succes = "La modification de votre adresse a bien été effectuée.";
					$client=$this->client -> lire_infos_utilisateur($client_id);
					$this->genererVue(array('client' => $client, 'succes' => $succes));
				}else{
                    $erreur = "Erreur dans la modification de votre adresse. Veuillez réessayer.";
				    $this->genererVue(array('client' => $client, 'erreur' => $erreur)); 
                }
			}elseif($id="modifiermdp"){
				if($this->modifiermdp()){
					$succes = "La modification de votre mot de pass a bien été effectuée.";
					$client=$this->client -> lire_infos_utilisateur($client_id);
					$this->genererVue(array('client' => $client, 'succes' => $succes));
				}else{
                    $erreur = "Erreur dans la modification de votre mot de pass. Veuillez réessayer.";
				    $this->genererVue(array('client' => $client, 'erreur' => $erreur));
                }
			}else{
				$this->genererVue(array('client' => $client));
			}
		}else{
			$this->genererVue(array('client' => $client));
		}
    }
	
	public function commandes() {
		$client_id = $_SESSION['uti_id'];
		$com_encours=$this->commande -> getCommandesClient(10, '0');
       $com_fini=$this->commande -> getCommandesClient(3, '1');
       $com_an=$this->commande -> getCommandesClient(3, '2');
       $this->genererVue(array('com_fini' => $com_fini, 'com_encours' => $com_encours, 'com_an' => $com_an ));
    }
    
    
private function modifierinfos() {
	$req =& $this->requete;
	if($req->existeParametre('uti_email') && $req->existeParametre('uti_tel')) {
		$email = $req->getParametre('uti_email');
		$tel = $req->getParametre('uti_tel');
		$id = $_SESSION['uti_id'];
		if($this->client->modifierInfo($id, $email, $tel)){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

private function modifieradress() {
	$req =& $this->requete;
	if($req->existeParametre('uti_num_rue') && $req->existeParametre('uti_rue')&& $req->existeParametre('uti_cp') && $req->existeParametre('uti_ville')) {
    $num = $req->getParametre('uti_num_rue');
    $rue = $req->getParametre('uti_rue');
    $cp = $req->getParametre('uti_cp');
	$ville = $req->getParametre('uti_ville');
	$id = $_SESSION['uti_id'];
	if($this->client->modifierAdress($num, $rue, $cp, $ville, $id)){
			return true;
		}else{
			return false;
	}
	}else{
		return false;
	}
}

private function modifiermdp() {
	$req =& $this->requete;
	$id = $_SESSION['uti_id'];
	if($req->existeParametre('encien_mdp') && $req->existeParametre('nouveau_mdp')&& $req->existeParametre('mdp_verif')) {
    $encien_mdp = $req->getParametre('encien_mdp');
    $nouveau_mdp = $req->getParametre('nouveau_mdp');
	$mdp_verif = $req->getParametre('mdp_verif');
	$mdp = $this->client->getMdp($id);
	if($nouveau_mdp != $mdp_verif){
		return false;
	}elseif(sha1($encien_mdp) != $mdp){
		return false;
	}else{
	if($this->client->modifierMdp(sha1($nouveau_mdp),$id)){
		return true;
	}else{
		return false;
	}
		
	}
	
	}else{
		return false;
	}
}

public function validercommande(){
	$plats = $_SESSION['panier'];
	$this->client->ajouterCommande($_SESSION['uti_id']);
	$id_com = $this->client->getDernierIdCommande();
	
	foreach($plats as $cle => $vals){
		$this->client->ajouterDetailCommande($vals['pla_id'], $id_com[0], $vals['pla_qte'], $cle);
	}

	$email_admin = $this->client->getEmailAdmin();
	$email_client = $_SESSION['uti_email'];

	$message_mail = '<html><head></head><body>
	<p>Votre commande a ete valider. Pour plus de detailes rdv dans votre espace client!</p>
	</body></html>';
	
	$headers_mail  = 'MIME-Version: 1.0'                           ."\r\n";
	$headers_mail .= 'Content-type: text/html; charset=utf-8'      ."\r\n";
	$headers_mail .= 'From: "Marmito" <yayabalde1@gmail.com>'      ."\r\n";
	
	// Envoi du mail
	mail($email_admin, 'Votre commande sur <marmito.com>', [$email_admin, $email_client], $headers_mail);

	unset($_SESSION['panier'], $_SESSION['total_prix'], $_SESSION['total_produits']);
	$this->genererVue();
}



}