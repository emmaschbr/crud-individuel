<?php
    
    include_once('./model/factureModel.php');
    include_once('./model/database.php');

/*// DELETE
function deleteFacture(){
    $sqlQuery = "DELETE FROM factures WHERE id = ?";
    $stmt = $this->conn->prepare($sqlQuery);

    $this->id=htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(1, $this->id);

    if($stmt->execute()){
        return true;
    }
    return false;
}


  //La méthode GET est utilisée ici car nous ne pouvions pas utiliser POST (casse)
    $data = $_GET; 
    
    // Instanciation Class client pour manipuler notre objet Client 
    $Facture = new Facture();

    // on initialiise les variables
    $Facture->id = $data['id'];

    if($Facture->deleteFacture()){
        echo "La facture a bien ete supprime.";
    } else{
        "Probleme suppresion de la facture";
    }*/

if (isset($_GET['id'])) {
    $facture_id = $_GET['id'];

    $sql = "DELETE FROM `factures` WHERE `id` = '$facture_id'";

    $result = $db->query($sql);

    if ($result == TRUE) {
        echo "Record deleted Successfully.";
    } else {
        echo "Error:" . $sql . "<br>" . $db->$error;
    }

    header('Location: view.php');

}

?>