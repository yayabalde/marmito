<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux plats
 * 
 * @author Yaya BALDE
 */
class Plat extends Modele {

    /** Renvoie la liste des plats disponibles pour être commandé
     * 
     * @return PDOStatement La liste des plats disponibles
     */
    public function getPlatsDispo() {
        $sql = 'select * from Plat where pla_est_dispo=1 order by pla_titre desc';
        $plats = $this->executerRequete($sql);
        return $plats;
    }
    
    /** Renvoie la liste des plats nom disponible actuellement
     * 
     * @return PDOStatement La liste des plats indisponibles
     */
    public function getPlatsIndispo() {
        $sql = 'select * from Plat where pla_est_dispo=0 order by pla_titre desc';
        $plats = $this->executerRequete($sql);
        return $plats;
    }
    
    /** Renvoie la liste de tous les plats (disponible ou pas)
     * 
     * @return PDOStatement La liste des plats
     */
    public function getTousPlats() {
        $sql = 'select * from Plat order by pla_titre desc';
        $plats = $this->executerRequete($sql);
        return $plats;
    }

    /** Renvoie les informations sur un plat
     * 
     * @param int $id L'identifiant du plat
     * @return array Le plat
     * @throws Exception Si l'identifiant du plat est inconnu
     */
    public function getPlat($pla_id) {
        $sql = 'select * from Plat where pla_id=?';
        $plat = $this->executerRequete($sql, array($pla_id));
        if ($plat->rowCount() > 0)
            return $plat->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun plat ne correspond à l'identifiant '$pla_id'");
    }
    
    public function getIngredients($pla_id){
        $sql = 'SELECT Ingredient.ing_descr, DetailPlat.detp_ing_dose'
        .' FROM DetailPlat'
        .' INNER JOIN Ingredient'
        .' ON DetailPlat.fk_ing_id = Ingredient.ing_id where DetailPlat.fk_pla_id=?';
        $ingredients = $this->executerRequete($sql, array($pla_id));
        if ($ingredients->rowCount() > 0)
            return $ingredients;
        else
            throw new Exception("Aucun plat ne correspond à l'identifiant '$pla_id'");
    }

    /**
     * Renvoie le nombre total des plats
     * 
     * @return int Le nombre de plats
     */
    public function getNombrePlats()
    {
        $sql = 'select count(*) as nbPlats from Plat';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbPlats'];
    }
    
     public function getImages()
    {
        $sql = 'select pla_img from Plat';
        $imgs = $this->executerRequete($sql);
        return $imgs;
    }
}