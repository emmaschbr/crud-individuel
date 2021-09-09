<?php


/*
 — Rend la connexion à la base de données prête.
getAllFactures() — Obtenez tous les enregistrements.
getSingleFacture() — Obtenez des enregistrements uniques.
createFacture () — Créer un enregistrement.
updateFacture() — Mettre à jour l'enregistrement.
deleteFacture() — Supprime un enregistrement.
*/
include './model/database.php';

class Facture {
    
        // Connection
        protected $conn;

        // Champs (colonnes)
        public $id;
        public $montant;
        public $description;
        public $tva;
        public $quantite;
        public $date_de_creation;

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
            $this->date_de_creation = htmlspecialchars(strip_tags($this->date_de_creation));
        
            // bind data
            $stmt->bindParam(":montant", $this->montant);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":tva", $this->tva);
            $stmt->bindParam(":quantite", $this->quantite);
            $stmt->bindParam(":creation", $this->date_de_creation);

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
                        date_de_creation
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
        
            $this->id = $dataRow['id'];
            $this->montant = $dataRow['montant'];
            $this->description = $dataRow['description'];
            $this->tva = $dataRow['tva'];
            $this->quantite = $dataRow['quantite'];
            $this->date_de_creation = $dataRow['creation'];
        }        

        // UPDATE facture
        public function updateFacture(){
            $sqlQuery = "UPDATE
                        factures
                    SET
                        id = :id,
                        montant = :montant, 
                        description = :description, 
                        tva = :tva, 
                        quantite = :quantite, 
                        date_de_creation = :date_de_creation
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->Id=htmlspecialchars(strip_tags($this->Id));
            $this->montant=htmlspecialchars(strip_tags($this->montant));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->tva=htmlspecialchars(strip_tags($this->tva));
            $this->quantite=htmlspecialchars(strip_tags($this->quantite));
            $this->date_de_creation=htmlspecialchars(strip_tags($this->date_de_creation));
        
            // bind data
            $stmt->bindParam(":id", $this->Id);
            $stmt->bindParam(":montant", $this->montant);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":tva", $this->tva);
            $stmt->bindParam(":quantite", $this->quantite);
            $stmt->bindParam(":created", $this->date_de_creation);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
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

    }
?>
