<?php

/**
 * Classe modélisant la session.
 * Encapsule la superglobale PHP $_SESSION.
 * 
 * @author Yaya BALDE
 */
class Session
{

    /**
     * Constructeur.
     * Démarre ou restaure la session
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Détruit la session actuelle
     */
    public function detruire()
    {
        // Suppression de toutes les variables et destruction de la session
        $_SESSION = array();
        
        // Suppression des cookies de connexion automatique
        session_destroy();
    }

    /**
     * Ajoute un attribut à la session
     * 
     * @param string $nom Nom de l'attribut
     * @param string $valeur Valeur de l'attribut
     */
    public function setAttribut($nom, $valeur)
    {
        $_SESSION[$nom] = $valeur;
    }

    /**
     * Renvoie vrai si l'attribut existe dans la session
     * 
     * @param string $nom Nom de l'attribut
     * @return bool Vrai si l'attribut existe et sa valeur n'est pas vide 
     */
    public function existeAttribut($nom)
    {
        return (isset($_SESSION[$nom]) && !empty($_SESSION[$nom]));
    }

    /**
     * Renvoie la valeur de l'attribut demandé
     * 
     * @param string $nom Nom de l'attribut
     * @return string Valeur de l'attribut
     * @throws Exception Si l'attribut n'existe pas dans la session
     */
    public function getAttribut($nom)
    {
        if ($this->existeAttribut($nom)) {
            return $_SESSION[$nom];
        }
        else {
            throw new Exception("Attribut '$nom' absent de la session");
        }
    }

}