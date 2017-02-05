<?php
include("ajax_bdd.php");
include("image.php");
function ajouterPlat($pla_titre, $pla_descr, $pla_prix, $pla_img , $pla_est_dispo=true) {
        $sql = "INSERT INTO `plat` (`pla_titre`, `pla_descr`, `pla_prix`,  `pla_img`, `pla_est_dispo`) VALUES (?, ?, ?, ?, ?)";
        $res = executerRequete($sql, array($pla_titre, $pla_descr, $pla_prix, $pla_img , $pla_est_dispo));
        if ($res->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }      
}

if(isset($_POST['pla_titre']) && isset($_POST['pla_descr']) && isset($_POST['pla_prix']) 
   && !empty($_POST['pla_titre']) && !empty($_POST['pla_descr']) && !empty($_POST['pla_prix']) && isset($_FILES["pla_file"]["type"])) {
    $titre = $_POST['pla_titre']; $descr = $_POST['pla_descr']; $prix = $_POST['pla_prix']; 
	$img = str_replace(" ", "", $titre);

//upload 	
$tab_ext = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["pla_file"]["name"]);
$ext = end($temporary);
$img .= "." . $ext;
if ((($_FILES["pla_file"]["type"] == "image/png") || ($_FILES["pla_file"]["type"] == "image/jpg") || ($_FILES["pla_file"]["type"] == "image/jpeg")) && ($_FILES["pla_file"]["size"] < 5000000) && in_array($ext, $tab_ext)) {
if ($_FILES["pla_file"]["error"] > 0)
{
echo  "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Erreur chargement de l'image.</strong></div>";
}
else
{
if (file_exists("../../Contenu/upload/" . $img)) {
echo  "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>une image est deja associé à ce titre!</strong></div>";
}
else
{
$sourcePath = $_FILES['pla_file']['tmp_name']; 
$targetPath = "../../Contenu/upload/" . $img;
$targetPath_min = "../../Contenu/upload/" ."min_" . $img;


    if(ajouterPlat($titre, $descr, $prix, $img)){
        //image: 1000x450 et 350x158
        $new_img = new Image($sourcePath);
        $new_img_min = new Image($sourcePath);
		$new_img->resize_to(1000, 450);
        $new_img_min->resize_to(350, 158);
		$new_img->save_as($targetPath);
        $new_img_min->save_as($targetPath_min);
        
		//	move_uploaded_file($sourcePath,$targetPath); 
         echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>plat ajouter avec succes</strong></div>";
    }else{
       echo  "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>erreur dans lexecution de la requette</strong></div>";
    }
}
}

}
else
{
echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>*** Erreur: type ou taille de fichier invalide ***</strong></div>";;
}
  
}else{
    echo  "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>erreur envoie donnee vide</strong></div>";
}

