<?php

require_once './Modele/Utilisateur.php';

$user = new Utilisateur();

if(isset($_POST['uti_email']) && isset($_POST['uti_tel'])) {

    $email = $_POST['uti_email'];
    $tel = $_POST['uti_tel'];
    $id = $_SESSION['uti_id'];

    $user->modifierInfo($id, $email, $tel);
    return true;

}else{
    return true;
}