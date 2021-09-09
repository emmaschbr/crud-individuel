<?php

require_once('./global/header.html');
require_once('./model/factureModel.php');
//require_once('./model/database.php');
require_once ('./verification.php');


// instanciation

$sql = "SELECT *FROM facture";

$db = new mysqli('localhost', 'root', '', 'crud-individuel');
$result = $db->query($sql);
?>

<body>
<h1>Liste des factures</h1>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>montant</th>
        <th>Description de la facture</th>
        <th>TVA</th>
        <th>Quantite</th>
        <th>Date</th>
        <th></th>
        <th></th>
    </tr>
    </thead>

    <?php
    if ($result) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['id'] ?> </td>
            <td><?php echo $row['montant'] ?> </td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['TVA'] ?></td>
            <td><?php echo $row['quantite'] ?></td>
            <td><?php echo $row['date_de_creation'] ?></td>
            <td><a >Modifier</a></td>
            <td>
                <a href="delete.php?id=<?php echo row['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php }
    }
    ?>
</table>
</body>

