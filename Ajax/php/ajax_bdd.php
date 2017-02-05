<?php
  
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=marmito;charset=utf8', 'root',
            '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}


 function executerRequete($sql, $params = null)
{
      $bdd = getBdd();
     if ($params == null) {
            $resultat = $bdd->query($sql);   // exécution directe
        }
        else {
            $resultat = $bdd->prepare($sql); // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
}