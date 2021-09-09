<?php
    
    include_once('/xampp/htdocs/fact2PDF/model/clientModel.php');
    include_once('/xampp/htdocs/fact2PDF/model/database.php');

   //La méthode GET est utilisée ici car nous ne pouvions pas utiliser POST (casse)
    $data = $_GET; 
    
    // Instanciation Class facture pour manipuler notre objet Facture 
    $Client = new Client();

    // on initialiise les variables
    $Client->nom = $data['nom'];
    $Client->email = $data['email'];
    $Client->telephone = $data['telephone'];
    $Client->adresse = $data['adresse'];

    if($Client->createClient()){
        echo 'Le client a bien été créé !';
    } else{
        echo 'Probleme creation du client.';
    }
        
?>