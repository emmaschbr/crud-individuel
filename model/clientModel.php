<?php

include '/xampp/htdocs/fact2PDF/model/database.php';
class Client {
    
        // Connection
        protected $conn;

        // Columns
        public $id;
        public $nom;
        public $email;
        public $telephone;
        public $adresse;

        // Db connection
        public function __construct(){
            $Db = new Database();
            $this->conn = $Db->getConnexion();
        }

        // GET ALL
        public function getAllClients(){
            $sql = "SELECT * FROM client";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createClient(){

            $sqlQuery = "INSERT INTO
                        client
                    SET
                        nom = :nom, 
                        email = :email, 
                        telephone = :telephone,  
                        adresse = :adresse";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->nom = htmlspecialchars(strip_tags($this->nom));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->telephone = htmlspecialchars(strip_tags($this->telephone));
            $this->adresse = htmlspecialchars(strip_tags($this->adresse));

            
            // bind data
            $stmt->bindParam(":nom", $this->nom);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":telephone", $this->telephone);
            $stmt->bindParam(":adresse", $this->adresse);
           
            //var_dump($stmt->debugDumpParams());
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleClient(){
            $sqlQuery = "SELECT
                        id, 
                        nom, 
                        email, 
                        telephone, 
                        adresse, 
                      FROM
                        client
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->name = $dataRow['nom'];
            $this->email = $dataRow['email'];
            $this->age = $dataRow['telephone'];
            $this->designation = $dataRow['adresse'];
        }        

        // DELETE
        function deleteClient(){
            $sqlQuery = "DELETE FROM client WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id = htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>
