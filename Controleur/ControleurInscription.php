<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';

class ControleurInscription extends Controleur {

    private $utilisateur;

    public function __construct() {
        $this->utilisateur = new Utilisateur();
    }

        // Affiche la liste de tous les billets du blog
public function index() {

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Création d'un tableau des erreurs
$er_insc = array();
$req =& $this->requete;
if ($req->existeParametre('nom')){$nom = $req->getParametre('nom');}else{$er_insc['nom'] = 'Le nom est obligatoire';}
if ($req->existeParametre('prenom')){$prenom = $req->getParametre('prenom');}else{$er_insc['prenom'] = 'Le prenom est obligatoire';}
if ($req->existeParametre('genre')){$genre = $req->getParametre('genre');}else{$er_insc['genre'] = 'Le genre est obligatoire';}
if ($req->existeParametre('email')){$email = $req->getParametre('email');}else{$er_insc['email'] = 'Votre email est obligatoire';}
if ($req->existeParametre('mdp')){$mdp = $req->getParametre('mdp');}else{$er_insc['mdp'] = 'Le mot de pass est obligatoire';}
if ($req->existeParametre('mdp_verif')){$mdp_verif = $req->getParametre('mdp_verif');}else{$er_insc['mdp_verif'] = 'Vous devez confirmer votre mot de pass';}
if ($req->existeParametre('tel')){$tel = $req->getParametre('tel');}else{$er_insc['tel'] = 'Le téléphone est obligatoire';}
if ($req->existeParametre('num')){$num = $req->getParametre('num');}else{$er_insc['num'] = 'Le numéro de rue est obligatoire';}
if ($req->existeParametre('rue')){$rue = $req->getParametre('rue');}else{$er_insc['rue'] = 'Le nom de rue est obligatoire';}
if ($req->existeParametre('cp')){$cp = $req->getParametre('cp');}else{$er_insc['cp'] = 'Le code postal est obligatoire';}
if ($req->existeParametre('ville')){$ville = $req->getParametre('ville');}else{$er_insc['ville'] = 'La ville est obligatoire';}

if (empty($er_insc)) {

	// On vérifie si les 2 mots de passe correspondent
	if ($mdp != $mdp_verif) {$er_insc['mdp-diff'] = "Les deux mots de passes sont différents !";}
    
    if($this->utilisateur->existeTel($tel)){$er_insc['tel_existe'] = "Ce numéro de téléphone est déjà utilisé.";}
    
    if($this->utilisateur->existeEmail($email)){$er_insc['email_existe'] = "Cet adresse email est déjà utilisé";}

	// Si d'autres erreurs ne sont pas survenues
	if (empty($er_insc)) {
        
    // Tire de la documentation PHP sur <http://fr.php.net/uniqid>
    $hash_validation = md5(uniqid(rand(), true));

    // ajouter un client dans la bdd
    $res= $this->utilisateur->ajouter_uti_dans_bdd($nom, $prenom, $genre, $email, sha1($mdp), $tel,$hash_validation, $num, $rue, $cp, $ville);

	// Preparation du mail
	$message_mail = '<html><head></head><body>
	<p>Merci de vous être inscrit sur le site de Marmito !</p>
	<p>Veuillez cliquer sur <a href="'.$_SERVER['PHP_SELF'].'inscription/activation/'.$hash_validation.'">ce lien</a> pour activer votre compte !</p>
	</body></html>';
	
	$headers_mail  = 'MIME-Version: 1.0'                           ."\r\n";
	$headers_mail .= 'Content-type: text/html; charset=utf-8'      ."\r\n";
	$headers_mail .= 'From: "Marmito" <yayabalde1@gmail.com>'      ."\r\n";
	$headers_mail .= 'CC: "Marmito" <yayabalde1@gmail.com>'      ."\r\n";
	
	
	//mail(destinataire,sujet,message,entete(optionnel),parametres(optionnel));
	// Envoi du mail
	mail($email, 'Inscription sur <marmito.com>', $message_mail, $headers_mail);
    
    $this->genererVue(array('succes_inscription' => 'Votre compte a été créer avec succès. Un email dactivation vous a été envoyé à lemail que vous avez renseigné. Après cette etape vous pouvez vous connectez à votre compte. a bientôt'));   

	} else {

		// On affiche à nouveau le formulaire d'inscription
			$this->genererVue(array('erreurs_inscription' => $er_insc));
	}

} else {

	// On affiche à nouveau le formulaire d'inscription
	$this->genererVue(array('erreurs_inscription' => $er_insc));
}
    
}else{
    $this->genererVue();
}
        
}
    
//permet d'activer un compte client
public function activation() {
        $hash = $this->requete->getParametre("id");
        $res = $this->utilisateur->valider_compte_avec_hash($hash);
        if($res){
            $this->genererVue(array('msg_succes' => 'votre compte est maintenant actif.'));
        }else{
            $this->genererVue(array('msg_erreur' => 'Erreur dactivation du compte veuillez contacter la direction.'));
    }
 }



}