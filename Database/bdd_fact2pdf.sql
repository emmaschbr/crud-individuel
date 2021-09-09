#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: produit
#------------------------------------------------------------

CREATE TABLE produit
(
    id          Int Auto_increment NOT NULL,
    nom         Varchar(50) NOT NULL,
    ref         Varchar(50) NOT NULL,
    description Varchar(50) NOT NULL,
    prix        Float       NOT NULL,
    CONSTRAINT produit_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: factures
#------------------------------------------------------------

CREATE TABLE factures
(
    id               Int Auto_increment NOT NULL,
    montant          Double NOT NULL,
    description      VARCHAR(100)  NOT NULL,
    TVA              FLOAT  NOT NULL,
    quantite         Int    NOT NULL,
    date_de_creation Date NOT NULL,
    id_client        Int,
    id_utilisateur   Int,
    CONSTRAINT factures_PK PRIMARY KEY (id),
    CONSTRAINT factures_client_FK FOREIGN KEY (id_client) REFERENCES client (id),
    CONSTRAINT factures_utilisateur_FK FOREIGN KEY (id_client) REFERENCES client (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur
(
    id          Int Auto_increment NOT NULL,
    user_name   Varchar(50) NOT NULL,
    mdp         Varchar(50) NOT NULL,
    mdp2        Varchar(50) NOT NULL,
    mail        Varchar(50) NOT NULL,
    mail2       Varchar(50) NOT NULL,
    is_admin    BIT(1)      NOT NULL,
    CONSTRAINT utilisateur_PK PRIMARY KEY (id),
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client
(
    id               Int Auto_increment NOT NULL,
    nom              Varchar(50) NOT NULL,
    email            Varchar(50) NOT NULL,
    telephone        Varchar(20) NOT NULL,
    adresse          Varchar(50) NOT NULL,
    CONSTRAINT client_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO client (nom, email, telephone, adresse)
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

INSERT INTO factures (montant, description, quantite, TVA, id_produit, id_client)
VALUES
    (64.20, 'nullam ac tortor vitae purus', 2, 20, 1),
    (29.98, 'etiam dignissim diam quis enim lobortis', 2, 20, 2),
    (76.50, 'aliquam faucibus purus', 3, 20, 3);

INSERT INTO utilisateur (user_name, mdp, mdp2, mail, mail2, is_admin, id_factures)
VALUES
    ('arthur.vigieraudu', 'motdepasse', 'motdepasse', 'arthur.vigieraudu@viacesi.fr', 'arthur.vigieraudu@viacesi.fr', 1, 1),
    ('lola.caillaud', 'motdepasse', 'motdepasse', 'lola.caillaud@viacesi.fr', 'lola.caillaud@viacesi.fr', 0, 2),
    ('emma.scheuber', 'motdepasse', 'motdepasse', 'emma.scheuber@viacesi.fr', 'emma.scheuber@viacesi.fr', 0, 3);


