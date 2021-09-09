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
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        ID        Int  Auto_increment  NOT NULL ,
        user_name Varchar (50) NOT NULL ,
        mdp       Varchar (50) NOT NULL ,
        mdp2      Varchar (50) NOT NULL ,
        mail      Varchar (50) NOT NULL ,
        mail2     Varchar (50) NOT NULL ,
        is_admin  TinyINT NOT NULL
	,CONSTRAINT utilisateur_PK PRIMARY KEY (ID)
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
        ID_client        Int NOT NULL ,
        ID_utilisateur   Int NOT NULL
	,CONSTRAINT factures_PK PRIMARY KEY (ID)

	,CONSTRAINT factures_client_FK FOREIGN KEY (ID_client) REFERENCES client(ID)
	,CONSTRAINT factures_utilisateur0_FK FOREIGN KEY (ID_utilisateur) REFERENCES utilisateur(ID)
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

INSERT INTO client (nom, email, telephone, addresse)
VALUES
    ('Robert Perron', 'perronrobert@client1.fr', '0678942680', '264 Bd Godard, 33300 Bordeaux'),
    ('SARL Lepetit', 'contactLepetit@client2.com', '0556021717', '24 rue Lafontaine, 33000 Bordeaux'),
    ('Societe Bureau', 'bureau@orange.com', '0556330271', '238 rue du Marechal Joffre, 33130 Bordeaux'),
    ('Paloma Dalport', 'paloma.dalport@client4.com', '0602406527', '114 rue Georges Bonnac, 33000 Bordeaux');

INSERT INTO produit (nom, ref, description, prix)
VALUES
    ('Produit1', 'DR67980S', 'laboris nisi ut aliquip', 32.10),
    ('Produit2', '75XZ2761', 'fugiat nulla pariatur', 14.99),
    ('Produit3', 'TS56P892', 'anim id est laborum', 25.50);

INSERT INTO utilisateur (user_name, mdp, mdp2, mail, mail2, is_admin)
VALUES
    ('arthur.vigieraudu', 'motdepasse', 'motdepasse', 'arthur.vigieraudu@viacesi.fr', 'arthur.vigieraudu@viacesi.fr', 1),
    ('lola.caillaud', 'motdepasse', 'motdepasse', 'lola.caillaud@viacesi.fr', 'lola.caillaud@viacesi.fr', 0),
    ('emma.scheuber', 'motdepasse', 'motdepasse', 'emma.scheuber@viacesi.fr', 'emma.scheuber@viacesi.fr', 0);

INSERT INTO factures (montant, description, TVA, quantite, date_de_creation, ID_client, ID_utilisateur)
VALUES
    (64.20, 'nullam ac tortor vitae purus', 20, 2, '2021.10.07', 1, 1),
    (29.98, 'etiam dignissim diam quis enim lobortis', 20, 1, '2020.05.26', 2, 2),
    (76.50, 'aliquam faucibus purus', 20, 4, '2021.02.15', 3, 3);

INSERT INTO produit_facture (ID, ID_factures)
VALUES
       (1, 1),
       (2, 2),
       (3, 3);