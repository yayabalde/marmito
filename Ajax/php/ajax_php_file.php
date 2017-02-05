<?php

if(isset($_FILES["pla_file"]["type"]) && isset($_POST['pla_img']))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["pla_file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["pla_file"]["type"] == "image/png") || ($_FILES["pla_file"]["type"] == "image/jpg") || ($_FILES["pla_file"]["type"] == "image/jpeg")
) && ($_FILES["pla_file"]["size"] < 100000)
&& in_array($file_extension, $validextensions)) {
if ($_FILES["pla_file"]["error"] > 0)
{
echo "Code erreur: " . $_FILES["pla_file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("../../Contenu/upload/" . $_FILES["pla_file"]["name"])) {
echo $_FILES["pla_file"]["name"] . " <span id='invalid'><b>existe deja.</b></span> ";
}
else
{
$sourcePath = $_FILES['pla_file']['tmp_name']; 
$targetPath = "../../Contenu/upload/".$_FILES['pla_file']['name']; 
move_uploaded_file($sourcePath,$targetPath); 
echo "<span id='success'>Telechargement reussi...!!</span><br/>";
echo "<br/><b>Nom du fichier:</b> " . $_FILES["pla_file"]["name"] . "<br>";
echo "<b>Type:</b> " . $_FILES["pla_file"]["type"] . "<br>";
echo "<b>Taille:</b> " . ($_FILES["pla_file"]["size"] / 1024) . " kB<br>";
echo "<b>Dossier temporaire:</b> " . $_FILES["pla_file"]["tmp_name"] . "<br>";
}
}
}
else
{
echo "<span id='invalid'>*** Erreur: type ou taille de fichier invalide ***<span>";
}
}else{
	echo "vous devez remplir le nom de l'image et choisir une image";
}

?>