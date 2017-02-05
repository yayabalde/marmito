<?php

class Panier{
    private $nom;
    private $total;
    private $produits;
    
    function __construct(){
       $this->nom = &$_SESSION['panier']['nom'];
       $this->total = &$_SESSION['panier']['total'];
       $this->produits = &$_SESSION['panier']['produits'];
    }
    
    function __destruct() {
        unset($this->nom, $this->total, $this->produits);
    }
    
    
    function getProduits(){
        return $this->produits;
    }
    
    function ajouter($ref, $qte){
        if (key_exists($ref, $this->produits)) {
            $this->produits[$ref] += $qte;
        }else{
            $this->produits[$ref]=$qte;
        }
        $this->total += $qte;
    }
    
    function afficher(){
        echo '<table><thead><tr><th>Réference</th><th>Quantité</th></tr></thead><tbody>';
        foreach($this->produits as $c=>$v){
          echo '<tr><td>'.$c.'</td><td>'.$v.'</td><tr>';
        }
         echo '</tbody></table>';
    }
    
    
    function afficher2(){
        echo '<table><thead><tr><th>Réference</th><th>Quantité</th><th></th></tr></thead><tbody>';
        foreach($this->produits as $c=>$v){
          echo '<tr><td>'.$c.'</td><td><form method="post" action=""><input id="qte" type="number" value="'.$v.'" name="qte" min="1" max="50"><input type="submit" value="modifier"></form></td><td><a href="demo.php?a=sup&ref='.$c.'">Supprimer</a></td></tr>';
        }
         echo '</tbody></table>';
    }
    
    function supprimer($ref, $qte){
      if (key_exists($ref, $this->produits)) {
        if($this->produits[$ref]<=$qte){
            $this->produits[$ref]=null;
            $this->produits=array_filter($this->produits, 'strlen');
        }else{
            $this->produits[$ref] -=$qte;
        }
        }
    }
    
    function supprimer2($ref){
      if (key_exists($ref, $this->produits)) {
           unset($this->produits[$ref]);
        }
    }
    
    function vider(){
        $this->total=0;
        $this->produits =[];
    }
    
    function getTotal(){
        return $this->total;
    }
    
    function setTotal($val){
        $this->total = $val;
    }
    
    function getNom(){
        return $this->nom;
    }
    
    function setNom($n){
        $this->nom = $n;
    }
}