<?php

require_once('/xampp/htdocs/fact2PDF/global/header.html');
require_once('/xampp/htdocs/fact2PDF/model/factureModel.php');
require_once('/xampp/htdocs/fact2PDF/model/database.php');


// instanciation 
$facture = new Facture();

$stmt = $facture->getAllFactures();

$itemCount = $stmt->fetchAll(PDO::FETCH_ASSOC);

  ?>

<body>
 <h1>Liste des factures</h1>
 <table>
   <thead>
     <tr>
       <th>montant</th>
       <th>Description de la facture</th>
       <th>TVA</th>
       <th>Quantite</th>
       <th>Date</th>
     </tr>
   </thead>

   <?php foreach($itemCount as $facture){
     $date = $facture['created'];
    ?>
    <tr>
      <td><?= $facture['montant'] ?></td>
      <td><?= $facture['description'] ?></td>
      <td><?= $facture['TVA'] ?></td>
      <td><?= $facture['quantite'] ?></td>
      <td><?= date('d-M-Y', strtotime($date)) // On formate la date pour l'affichage ?></td> 
    </tr>
    <?php } ?>
  </table>
</body>

