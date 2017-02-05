<?php

require_once 'Framework/Modele.php';

/**
 * Modélise un utilisateur du site
 *
 * @author Yaya BALDE
 */
class Utilisateur extends Modele {

    /**
     * Vérifie qu'un utilisateur existe dans la BD
     * 
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($login, $mdp)
    {
        $sql = "select uti_id from Utilisateur where uti_email=? and uti_motpass=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        return ($utilisateur->rowCount() == 1);
    }

    /**
     * Renvoie un utilisateur existant dans la BD
     * 
     * @param string $login Le email
     * @param string $mdp Le mot de passe
     * @return un utilisateur
     * @throws Exception Si aucun utilisateur ne correspond aux paramètres
     */
    public function getUtilisateur($login, $mdp)
    {
        $sql = "select * from Utilisateur where uti_email=? and uti_motpass=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        if ($utilisateur->rowCount() == 1)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }
    
    public function existeEmail($email)
    {
        $sql = "select uti_id from Utilisateur where uti_email=?";
        $utilisateur = $this->executerRequete($sql, array($email));
        return ($utilisateur->rowCount() == 1);
    }
    
    public function existeTel($tel)
    {
        $sql = "select uti_id from Utilisateur where uti_tel=?";
        $utilisateur = $this->executerRequete($sql, array($tel));
        return ($utilisateur->rowCount() == 1);
    }

                
    
   /**
     * @return un vraie si utilisateur est connecté ou faux sinon
     */
    public function est_connecte() {
	   return !empty($_SESSION['uti_id']);
    }
    
    
    public function est_admin() {
	   return $_SESSION['uti_role']=='admin';
    }
    

    /**
     * @param string $uti_id identifiant de l'utilisateur rechercher
     * @return un utilisateur ou false si rien trouver
     */
    public function lire_infos_utilisateur($uti_id) {

	$sql = "select * from Utilisateur where uti_id=?";

	$utilisateur = $this->executerRequete($sql, array($uti_id));
	
	if ($utilisateur->rowCount() == 1) {
	
		return $utilisateur->fetch();
	}
	return false;

}
    
    
  public function valider_compte_avec_hash($hash_validation) {

	$sql = "UPDATE Utilisateur SET uti_hash_val = '', uti_est_actif = 1 WHERE uti_hash_val=?";

	$res=$this->executerRequete($sql, array($hash_validation));

	return ($res->rowCount() == 1);
}
    
public function ajouter_uti_dans_bdd($nom, $prenom, $genre, $email, $mdp, $tel, $hash, $num, $rue, $cp, $ville, $role='client') {

	$sql = 'INSERT INTO `Utilisateur` (`uti_nom`, `uti_prenom`, `uti_genre`, `uti_email`, `uti_motpass`, `uti_tel`, `uti_num_rue`, `uti_rue`, `uti_cp`, `uti_ville`, `uti_role`, `uti_hash_val`, `uti_date_ins`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())';
    $res = $this->executerRequete($sql, array($nom, $prenom, $genre, $email, $mdp, $tel, $num, $rue, $cp, $ville, $role, $hash));
    
    if ($res) {
		return ($res->rowCount() == 1) ;
	}
    return 0;
}

public function ajouter_contact($civilite, $nom, $email, $sujet, $message) {
	$sql = 'INSERT INTO `Contact` (`con_genre`, `con_nom`, `con_email`, `con_sujet`, `con_message`, `con_date`) VALUES (?, ?, ?, ?, ?, NOW())';
	$res=$this->executerRequete($sql, array($civilite, $nom, $email, $sujet, $message));
	return ($res->rowCount() == 1);
}

public function ajouter_news_letter($email) {
	$sql = 'INSERT INTO `NewsLetter` (`new_email`, `new_date_insc`) VALUES (?, NOW())';
	$res=$this->executerRequete($sql, array($email));
	return ($res->rowCount() == 1);
}
    
public function modifierInfo($id, $email, $tel){
    $sql = "UPDATE Utilisateur SET uti_email =?, uti_tel =? WHERE uti_id=?";
    $res=$this->executerRequete($sql, array($email, $tel, $id));
	return ($res->rowCount() == 1);
}

public function modifierAdress($num, $rue, $cp, $ville, $id){
    $sql = "UPDATE Utilisateur SET uti_num_rue =?, uti_rue =?, uti_cp =?, uti_ville =? WHERE uti_id=?";
    $res=$this->executerRequete($sql, array($num, $rue, $cp, $ville,$id));
	return ($res->rowCount() == 1);
}

public function modifierMdp($mdp, $id){
    $sql = "UPDATE Utilisateur SET uti_motpass =? WHERE uti_id=?";
    $res=$this->executerRequete($sql, array($mdp, $id));
	return ($res->rowCount() == 1);
}

public function ajouterCommande($uti_id){
    $sql = 'INSERT INTO `Commande` (`fk_uti_id`, `com_date`) VALUES (?, NOW())';
    $res=$this->executerRequete($sql, array($uti_id));
	return ($res->rowCount() == 1);
}

public function ajouterDetailCommande($pla_id, $com_id, $pla_qte, $dat_rdv){
    $sql = 'INSERT INTO `DetailCommande` (`fk_pla_id`, `fk_com_id`, `detc_qte`, `detc_date_rdv`) VALUES (?, ?, ?, ?)';
    $res=$this->executerRequete($sql, array($pla_id, $com_id, $pla_qte, $dat_rdv));
	return ($res->rowCount() == 1);
}

public function getDernierIdCommande(){
    $sql = 'SELECT MAX(com_id) FROM Commande';
	$res = $this->executerRequete($sql);
	return $res->fetch();
}

public function getEmailAdmin(){
    $sql = "SELECT uti_email FROM Utilisateur WHERE uti_role='admin'";
	$res = $this->executerRequete($sql);
	$res = $res->fetch();
	return $res['uti_role'];
}

/*
public function getInfo($info, $uti_id){
    $sql = "SELECT ? FROM Utilisateur WHERE uti_id=?";
	$res = $this->executerRequete($sql, array($info, $uti_id));
	$res = $res->fetch();
	return $res[$info];
}
*/

public function getMdp($uti_id){
    $sql = "SELECT uti_motpass FROM Utilisateur WHERE uti_id=?";
	$res = $this->executerRequete($sql, array($uti_id));
	$res = $res->fetch();
	return $res['uti_motpass'];
}

 
 public function getUtilisateurs() {

	$sql = "select * from Utilisateur";

	$users = $this->executerRequete($sql);
	
	if ($users->rowCount() > 0) {
	
		return $users->fetchAll();
	}
	return false;

}
  

}