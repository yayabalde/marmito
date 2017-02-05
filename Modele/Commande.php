<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux commandes
 * 
 * @author Yaya BALDE
 */
class Commande extends Modele {
    

    public function getCommandes() {
        $sql = 'select * from Commande';
        $commandes = $this->executerRequete($sql);
        if ($commandes->rowCount() > 0)
            return $commandes;
        else
            throw new Exception("Aucune commande trouver");
    }
    
    
 
    public function getCommandesEnCours() {
        $sql = 'select * from Commande where com_etat="0"';
        $commandes = $this->executerRequete($sql);
        if ($commandes->rowCount() > 0)
            return $commandes;
        else
            throw new Exception("Aucune commande en cours trouver");
    }
    

    public function getCommandesRealisees() {
        $sql = 'select * from Commande where com_etat="2"';
        $commandes = $this->executerRequete($sql);
        if ($commandes->rowCount() > 0)
            return $commandes;
        else
            throw new Exception("Aucune commande trouver");
    }
    
    
        public function getCommandesAnnulees() {
        $sql = 'select * from Commande where com_etat="1"';
        $commandes = $this->executerRequete($sql);
        if ($commandes->rowCount() > 0)
            return $commandes;
        else
            throw new Exception("Aucune commande annuler trouver");
    }
	
	   public function getDateCommande($com_id) {
        $sql = 'select com_date from Commande where com_id=?';
        $com_date = $this->executerRequete($sql, array($com_id));
        if ($com_date->rowCount() > 0){
			$com_date = $com_date->fetch();
			 return $com_date['com_date'];
		} else
            throw new Exception("Aucune commande pour l'utilisateur'$uti_id'");
    }
    
    public function getTousCommandesClient($uti_id) {
       $commmandes = [];
        $sql = 'select com_id from Commande where fk_uti_id=?';
        $com_id = $this->executerRequete($sql, array($uti_id));
        if ($com_id->rowCount() > 0){
			foreach($com_id->fetchAll() as $elt){
				$commmandes[] = $this->getDetaileCommande($elt['com_id']);
			}
			 return $commmandes;
		} else
            return false;
    }
    
    public function getCommandesClient($uti_id, $etat) {
		$commmandes = [];
        $sql = 'select com_id from Commande where fk_uti_id=? and com_etat=?';
        $com_id = $this->executerRequete($sql, array($uti_id, $etat));
         if ($com_id->rowCount() > 0){
			foreach($com_id->fetchAll() as $elt){
				$commmandes[] = $this->getDetaileCommande($elt['com_id']);
			}
			 return $commmandes;
		} else
            return false;
    }
    
    public function getDetaileCommande($com_id) {
       $sql =  'SELECT Plat.pla_id, Plat.pla_titre, Plat.pla_prix, DetailCommande.detc_qte, '.
        'DetailCommande.detc_date_rdv FROM DetailCommande INNER JOIN Plat'.
        ' ON DetailCommande.fk_pla_id = Plat.pla_id where DetailCommande.fk_com_id=?'; 
        
        $detaile = $this->executerRequete($sql, array($com_id));
        if ($detaile->rowCount() > 0)
            return $detaile->fetchAll();
        else
            return false;
    }
    
    
    public function annulerCommande($com_id) {
       $sql =  'UPDATE Commande SET com_etat="1" WHERE com_id=?';
        
        $res = $this->executerRequete($sql, array($com_id));
        if ($res->rowCount() > 0)
            return true;
        else
            throw new Exception("Aucune commande ne correspond à '$com_id'");
    }
	
	public function getDateRdvCommande() {
        $sql = "select DATE_FORMAT(detc_date_rdv,'%Y%m%e') as date_rdv from DetailCommande";
        $res = $this->executerRequete($sql);
        if ($res->rowCount() > 0){
			$tab = [];
			foreach($res->fetchAll() as $cle => $val){
				$tab[] = $val['date_rdv'];
			}
            return $tab;
		}
        else
            throw new Exception("Aucune date trouver'");
    }
	
}