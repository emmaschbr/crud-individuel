<?php


/*
 — Rend la connexion à la base de données prête.
getAllFactures() — Obtenez tous les enregistrements.
getSingleFacture() — Obtenez des enregistrements uniques.
createFacture () — Créer un enregistrement.
updateFacture() — Mettre à jour l'enregistrement.
deleteFacture() — Supprime un enregistrement.
*/

include '/xampp/htdocs/crud-individuel/model/database.php';

class Produit {
    
        // Connection
        private $conn;

        // Table
        private $db_table = "produit";

        // Columns
        public $id;
        public $nom;
        public $ref;
        public $description;
        public $prix;

        // Db connection
        public function __construct(){
            $Db = new Database();
            $this->conn = $Db->getConnexion();
        }

        // GET ALL
        public function getAllProduits(){
            $sqlQuery = "SELECT * FROM produit";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createProduit(){
            $sqlQuery = "INSERT INTO
                        produit
                    SET
                        nom = :nom, 
                        ref = :ref, 
                        description = :description, 
                        prix = :prix";
                        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // nettoyage des données
            $this->nom = htmlspecialchars(strip_tags($this->nom));
            $this->ref = htmlspecialchars(strip_tags($this->ref));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->prix = htmlspecialchars(strip_tags($this->prix));
        
            // Lie notre parametre ":parametre" 
            $stmt->bindParam(":nom", $this->nom);
            $stmt->bindParam(":ref", $this->ref);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":prix", $this->prix);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleProduit(){
            $sqlQuery = "SELECT
                        id, 
                        nom, 
                        ref, 
                        description, 
                        prix, 
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->id = $dataRow['id'];
            $this->nom = $dataRow['nom'];
            $this->ref = $dataRow['ref'];
            $this->description = $dataRow['description'];
            $this->prix = $dataRow['prix'];
        }        

        // UPDATE facture
        public function updateProduit(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        nom = :nom, 
                        ref = :ref, 
                        description = :description, 
                        prix = :prix, 
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->nom=htmlspecialchars(strip_tags($this->nom));
            $this->ref=htmlspecialchars(strip_tags($this->ref));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->prix=htmlspecialchars(strip_tags($this->prix));
        
            // bind data
            $stmt->bindParam(":ID", $this->id);
            $stmt->bindParam(":montant", $this->nom);
            $stmt->bindParam(":description", $this->ref);
            $stmt->bindParam(":tva", $this->description);
            $stmt->bindParam(":quantite", $this->prix);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteProduit(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
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
