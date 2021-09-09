<?php
    include "config.php";

    if(isset($_POST['update'])) {
        $facture_id = $_GET['ID'];
        $montant = $_POST['montant'];
        $description = $_POST['description'];
        $TVA = $_POST['TVA'];
        $quantite = $_POST['quantite'];

        $sql = "UPDATE `factures` SET `montant` = '$montant', 
                      `description` = '$description', 
                      `TVA` = '$TVA', 
                      WHERE `id` = '$facture_id'";

        $result = $db->query($sql);

        if($result == TRUE){
            echo "Record Updated Successfully";
        } else {
            echo "Error:" . $sql . "<br>" . $db->error;
        }
    }

    if(isset($_GET['ID'])) {
        $facture_id = $_GET['ID'];

        $_sql = "SELECT *FROM `factures` WHERE `id` = '$facture_id'";

        $result = $db->query($_sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $montant = $row['montant'];
                $description = $row['description'];
                $TVA = $row['TVA'];
                $id = $row['ID'];
            }

?>

<!DOCTYPE html>
<html>
    <body>

        <h2> Facture Update Form</h2>

        <form action="" method="post">
            <fieldset>
                <legend>Personal Information:</legend>
                Montant:<br>
                <input type="text" name="montant" value="<?php echo $montant; ?>">
                <input type="hiden" name="facture_id" value="<?php echo $id; ?>">
                <br>
                Description:<br>
                <input type="text" name="description" value="<?php echo $description; ?>">
                <br>
                TVA:
                <input type="text" name="TVA" value="<?php echo $TVA; ?>">
                <br><br>
                <input type="submit" name="update" value="Update">
            </fieldset>
        </form>
    </body>
</html>
    <?php
        } else {
            //Si la valeur de l'id et incorrect alors l'utilisateur est renvoyé vers la page index.php
            header('Location: index.php');
        }
    }
?>
