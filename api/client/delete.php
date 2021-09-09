<?php
    
    include_once('/xampp/htdocs/crud-individuel/model/clientModel.php');
    include_once('/xampp/htdocs/crud-individuel/model/database.php');

   //La méthode GET est utilisée ici car nous ne pouvions pas utiliser POST (casse)
    $data = $_GET; 
    
    // Instanciation Class client pour manipuler notre objet Client 
    $Client = new Client();

    // on initialiise les variables
    $Client->id = $data['id'];

    if($Client->deleteClient()){
        echo "Le client a bien ete supprime.";
    } else{
        "Probleme suppresion client";
    }
        
?>