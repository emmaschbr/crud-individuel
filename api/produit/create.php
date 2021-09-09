<?php
    
    include_once('/xampp/htdocs/fact2PDF/class/produit.php');
    include_once('/xampp/htdocs/fact2PDF/config/database.php');
    
    //header('Content-Type: application/json');

   //La méthode GET est utilisée ici car nous ne pouvions pas utiliser POST (casse)
    $data = $_GET; 
    
    // Instanciation Class facture pour manipuler notre objet Facture 
    $Produit = new Produit();

    // on initialiise les variables
    $Produit->nom = $data['nom'];
    $Produit->ref = $data['ref'];
    $Produit->description = $data['description'];
    $Produit->prix = $data['prix'];

    if($Produit->createProduit()){
        echo 'Le produit a bien été créé !';
    } else{
        echo 'Probleme creation du produit.';
    }
        
?>