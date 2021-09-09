<?php 
    include "config.php";

    if(isset($_GET['ID'])) {
        $facture_id = $_GET['ID'];

        $sql = "DELETE FROM `factures` WHERE `id` = '$facture_id'";

        $result = $db->query($sql);

        if($result == TRUE) {
            echo "Record deleted Successfully.";
        } else {
            echo "Error:" . $sql . "<br>" . $db->$error;
        }

        header('Location: index.php');

    }
?>
