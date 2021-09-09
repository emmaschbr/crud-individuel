<?php


/*
 — Rend la connexion à la base de données prête.
getAllFactures() — Obtenez tous les enregistrements.
getSingleFacture() — Obtenez des enregistrements uniques.
createFacture () — Créer un enregistrement.
updateFacture() — Mettre à jour l'enregistrement.
deleteFacture() — Supprime un enregistrement.
*/
include '/xampp/htdocs/fact2PDF/model/database.php';

class Facture {
    
        // Connection
        protected $conn;

        // Champs (colonnes)
        public $ID;
        public $montant;
        public $description;
        public $tva;
        public $quantite;
        public $id_produit;
        public $created;

        // Db connection
        public function __construct(){
            $Db = new Database();
            $this->conn = $Db->getConnexion();
        }


        /* -------- INSTRUCTIONS PREPAREES --------- */

        // $stmt est une variable qui 
       
        // GET ALL
        public function getAllFactures(){
            $sql = "SELECT * FROM factures";
            $stmt = $this->conn->prepare($sql); // on prepare notre requete
            $stmt->execute(); // on l'execute
            return $stmt;
        }

        // CREATE
        public function createFacture(){
            
            $sqlQuery = "INSERT INTO
                       factures
                    SET
                        montant = :montant, 
                        description = :description, 
                        tva = :tva, 
                        quantite = :quantite, 
                        id_produit = :id_produit";

            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->montant = htmlspecialchars(strip_tags($this->montant));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->tva = htmlspecialchars(strip_tags($this->tva));
            $this->quantite = htmlspecialchars(strip_tags($this->quantite));
            $this->id_produit = htmlspecialchars(strip_tags($this->id_produit));
        
            // bind data
            $stmt->bindParam(":montant", $this->montant);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":tva", $this->tva);
            $stmt->bindParam(":quantite", $this->quantite);
            $stmt->bindParam(":id_produit", $this->id_produit);

            //var_dump($stmt->debugDumpParams());
            
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleFacture(){
            $sqlQuery = "SELECT
                        id, 
                        montant, 
                        description, 
                        tva, 
                        quantite, 
                        id_produit
                        created
                      FROM
                        factures
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            // on prepare la requete
            $stmt = $this->conn->prepare($sqlQuery);

            // BindParam lie notre paramètre à un nom de variable spécifique
            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC); // Le paramètre indique à PDO de renvoyer le résultat sous forme de tableau associatif
        
            $this->ID = $dataRow['ID'];
            $this->montant = $dataRow['montant'];
            $this->description = $dataRow['description'];
            $this->tva = $dataRow['tva'];
            $this->quantite = $dataRow['quantite'];
            $this->ID_produit = $dataRow['id_produit'];
            $this->created = $dataRow['created'];
        }        

        // UPDATE facture
        public function updateFacture(){
            $sqlQuery = "UPDATE
                        factures
                    SET
                        ID = :ID,
                        montant = :montant, 
                        description = :description, 
                        tva = :tva, 
                        quantite = :quantite, 
                        Id_produit = :Id_produit,
                        created_produit = :created_produit
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->Id=htmlspecialchars(strip_tags($this->Id));
            $this->montant=htmlspecialchars(strip_tags($this->montant));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->tva=htmlspecialchars(strip_tags($this->tva));
            $this->quantite=htmlspecialchars(strip_tags($this->quantite));
            $this->ID_produit=htmlspecialchars(strip_tags($this->ID_produit));
            $this->created=htmlspecialchars(strip_tags($this->created));
        
            // bind data
            $stmt->bindParam(":ID", $this->Id);
            $stmt->bindParam(":montant", $this->montant);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":tva", $this->tva);
            $stmt->bindParam(":quantite", $this->quantite);
            $stmt->bindParam(":Id_produit", $this->ID_produit);
            $stmt->bindParam(":created", $this->created);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteFacture(){
            $sqlQuery = "DELETE FROM factures WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->ID=htmlspecialchars(strip_tags($this->ID));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>
