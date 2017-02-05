<?php

require_once 'Controleur/ControleurSecurise.php';

/**
 * Classe parente des contrôleurs soumis à authentification
 *
 * @author Yaya BALDE
 */
abstract class ControleurSecuriseAdmin extends ControleurSecurise
{

    public function executerAction($action)
    {
        // Vérifie si les informations utilisateur sont présents dans la session
        // Si oui, l'utilisateur s'est déjà authentifié : l'exécution de l'action continue normalement
        // Si non, l'utilisateur est renvoyé vers le contrôleur de connexion
        //verifie en plus que l'utilisateur est bien un admin
        if ($_SESSION['uti_role']=='admin') {
            parent::executerAction($action);
        }
        else {
            $this->rediriger("connexion/accesrefuse");
        }
    }

}