<?php
include("ajax_bdd.php");

function ajouterIngredient($ing_des, $ing_est_dispo=true) {
        
           $sql = 'INSERT INTO Ingredient (ing_descr, ing_est_dispo) VALUES (?, ?)';
       
        $res = executerRequete($sql, array($ing_des, $ing_est_dispo));
        if ($res->rowCount() > 0)
            return true;
        else
            return false;

}


if(isset($_POST['ingredient_contenu']) && !empty($_POST['ingredient_contenu'])) {
    $ingredient = $_POST['ingredient_contenu'];
    if(ajouterIngredient($ingredient)){
         echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>ingrdient ajouter avec succes</strong></div>";
    }else{
       echo  "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>erreur dans lexecution de la requette</strong></div>";
     
    }
    
}else{
    echo  "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>erreur envoie donnee vide</strong></div>";
}