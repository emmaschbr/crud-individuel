<?php
include "config.php";

$sql = "SELECT *FROM factures";

$result = $db->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title> View Page </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Users</h2>
        <table class="table">

            <head>
                <tr>
                    <th>ID</th>
                    <th>Montant</th>
                    <th>Description</th>
                    <th>TVA</th>
                    <th>quantite</th>
                    <th></th>
                </tr>
            </head>

            <tbody><?php
                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['montant']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['TVA']; ?></td>
                            <td><?php echo $row['quantite']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update.php?id=<?php echo $row['ID']; ?>">
                                    Edit</a>&nbsp;
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['ID']; ?>">
                                    Delete</a>
                            </td>
                        </tr>
                <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>