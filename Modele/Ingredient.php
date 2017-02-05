<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux ingredients
 * 
 * @author Yaya BALDE
 */
class Ingredient extends Modele {
    

    public function getIngredients(){
        $sql = 'SELECT * from Ingredient';
        $ingredients = $this->executerRequete($sql);
        if ($ingredients->rowCount() > 0)
            return $ingredients->fetchAll();
        else
            throw new Exception("Aucun ingredient trouver");
    }

    public function ajouterIngredient($ing_des, $ing_est_dispo=true) {
        
           $sql = 'INSERT INTO Ingredient (ing_descr, ing_est_dispo) VALUES (?, ?)';
       
        $res = $this->executerRequete($sql, array($ing_des, $ing_est_dispo));
        if ($res->rowCount() > 0)
            return true;
        else
            return false;

    }
    
     public function supprimerIngredient($id) {
        $sql = ' DELETE FROM Ingredient WHERE ing_id=?';
        $res = $this->executerRequete($sql, array($id));
        if ($res->rowCount() > 0)
            return true;
        else
            return false;
    }
   
    public function modifierIngredient($descrip, $est_dispo, $id) {
        $sql = 'UPDATE Ingredient SET ing_descr=?, ing_est_dispo=? WHERE ing_id=?';
        $res = $this->executerRequete($sql, array($id));
        if ($res->rowCount() > 0)
            return true;
        else
            return false;
    }
    
}