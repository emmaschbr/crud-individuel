<?php

include_once('/xampp/htdocs/crud-individuel/class/factureModel.php');
include_once('/xampp/htdocs/crud-individuel/class/database.php');

//La méthode GET est utilisée
$data = $_GET;

// Instanciation Class client pour manipuler notre objet Client
$Fac = new Facture();

// on initialiise les variables
$Fac->ID = $data['id'];
$Fac->montant = $data['montant'];
$Fac->description = $data['description'];
$Fac->tva = $data['tva'];
$Fac->quantite = $data['quantite'];
$Fac->id_produit = $data['id_produit'];

if($Fac->updateFacture()){
    echo "La facture a bien ete modifiée.";
} else{
    "Probleme modification de la facture";
}

?>