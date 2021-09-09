#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
        ID        Int  Auto_increment  NOT NULL ,
        nom       Varchar (50) NOT NULL ,
        email     Varchar (100) NOT NULL ,
        telephone Int NOT NULL ,
        addresse  Varchar (200) NOT NULL
	,CONSTRAINT client_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: factures
#------------------------------------------------------------

CREATE TABLE factures(
        ID               Int  Auto_increment  NOT NULL ,
        montant          Double NOT NULL ,
        description      Varchar (100) NOT NULL ,
        TVA              Float NOT NULL ,
        quantite         Int NOT NULL ,
        date_de_creation Date NOT NULL ,
        ID_client        Int NOT NULL
	,CONSTRAINT factures_PK PRIMARY KEY (ID)

	,CONSTRAINT factures_client_FK FOREIGN KEY (ID_client) REFERENCES client(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        ID          Int  Auto_increment  NOT NULL ,
        user_name   Varchar (50) NOT NULL ,
        mdp         Varchar (50) NOT NULL ,
        mdp2        Varchar (50) NOT NULL ,
        mail        Varchar (50) NOT NULL ,
        mail2       Varchar (50) NOT NULL ,
        is_admin    TinyINT NOT NULL ,
        ID_factures Int NOT NULL
	,CONSTRAINT utilisateur_PK PRIMARY KEY (ID)

	,CONSTRAINT utilisateur_factures_FK FOREIGN KEY (ID_factures) REFERENCES factures(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: produit
#------------------------------------------------------------

CREATE TABLE produit(
        ID          Int  Auto_increment  NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        ref         Varchar (50) NOT NULL ,
        description Varchar (50) NOT NULL ,
        prix        Float NOT NULL
	,CONSTRAINT produit_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: produit_facture
#------------------------------------------------------------

CREATE TABLE produit_facture(
        ID          Int NOT NULL ,
        ID_factures Int NOT NULL
	,CONSTRAINT produit_facture_PK PRIMARY KEY (ID,ID_factures)

	,CONSTRAINT produit_facture_produit_FK FOREIGN KEY (ID) REFERENCES produit(ID)
	,CONSTRAINT produit_facture_factures0_FK FOREIGN KEY (ID_factures) REFERENCES factures(ID)
)ENGINE=InnoDB;

