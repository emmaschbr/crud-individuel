<?php
    require_once('/wamp64/www/fact2PDF/global/header.html');

     include_once('/wamp64/www/fact2PDF/model/clientModel.php');
     require_once('/wamp64/www/fact2PDF/model/database.php');

    $database = new Database();
    $db = $database->getConnexion();

    $client = new Client($db);

    $stmt = $client->getAllClients();
    $itemCount = $stmt->RowCount();

    if($stmt) {
       echo json_encode($itemCount); // affiche le nombre de nos enregistrements
    }

    if($itemCount > 0){
        
        $clientArr = array();
        $clientArr["body"] = array();
        $clientArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            
            extract($row);
            $e = array(
                "id" => $id,
                "nom" => $nom,
                "email" => $email,
                "adresse" => $adresse
            );

            array_push($clientArr["body"], $e);
        }
        echo json_encode($clientArr);
    } else{
        http_response_code(404);
        echo json_encode(
            array("message" => "Aucun enregistrements trouve")
        );
    }

    // //footer
    // include('/wamp64/www/fac2PDF/fact2PDF/global/footer.html');
?>