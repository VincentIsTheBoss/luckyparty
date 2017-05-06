# Table UTILISATEUR
#------------------------------------------------------------

CREATE TABLE UTILISATEUR(
        id             TINYINT(1) NOT NULL ,
        email          Varchar (60) ,
        pseudo         Varchar (16) ,
        prenom         Varchar (50) ,
        nom            Varchar (50) ,
        sexe           char(1,)
        pwd            Varchar (60) NOT NULL ,
        date_naissance Date ,
        ville          Varchar (50) ,
        CP             Char (5) ,
        is_connected   Bool ,
        researching    Bool ,
        id_groupe      Int ,
        is_deleted     TINYINT(1),
        date_created   timestamp,
        date_updated   timestamp,
        access_token   char(32),
        PRIMARY KEY (id,email )

);


#------------------------------------------------------------
# Table Musique
#------------------------------------------------------------

CREATE TABLE Musique(
        id_musique  Int NOT NULL ,
        nom         Varchar (50) ,
        artiste     Varchar (50) ,
        genre       Varchar (50) ,
        description Varchar (255) ,
        is_favorite Bool ,
        PRIMARY KEY (id_musique )
);


#------------------------------------------------------------
# Table LIVRE
#------------------------------------------------------------

CREATE TABLE LIVRE(
        id_livre    Int NOT NULL ,
        auteur      Varchar (50) ,
        genre       Varchar (50) ,
        resume      Varchar (255) ,
        titre       Varchar (50) ,
        is_favorite Bool ,
        PRIMARY KEY (id_livre )
);


#------------------------------------------------------------
# Table FILM
#------------------------------------------------------------

CREATE TABLE FILM(
        id_film     Int NOT NULL ,
        titre       Varchar (50) ,
        realisateur Varchar (50) ,
        senariste   Varchar (50) ,
        acteur      Varchar (50) ,
        genre       Varchar (50) ,
        synopsis    Varchar (255) ,
        is_favorite Bool ,
        PRIMARY KEY (id_film )
);


#------------------------------------------------------------
# Table GROUPE
#------------------------------------------------------------

CREATE TABLE GROUPE(
        id_groupe    Int NOT NULL ,
        capacite_max Int ,
        is_active TINYINT,
        PRIMARY KEY (id_groupe )
);


#------------------------------------------------------------
# Table EVENEMENT
#------------------------------------------------------------

CREATE TABLE EVENEMENT(
        id_evenement     Int NOT NULL ,
        genre            Varchar (50) ,
        date_event       Date ,
        adresse          Varchar (50) ,
        CP               Char (5) ,
        id_etablissement Int ,
        PRIMARY KEY (id_evenement )
);


#------------------------------------------------------------
# Table ETABLISSEMENT
#------------------------------------------------------------

CREATE TABLE ETABLISSEMENT(
        id_etablissement   Int NOT NULL ,
        type               Varchar (50) ,
        genre              Varchar (50) ,
        adresse            Varchar (50) ,
        CP                 Char (5) ,
        num                Char (10) ,
        horraire_ouverture Date ,
        horraire_fermeture Date ,
        PRIMARY KEY (id_etablissement )
);


#------------------------------------------------------------
# Table ADMINISTRATEUR
#------------------------------------------------------------

CREATE TABLE ADMINISTRATEUR(
        id_admin       Int NOT NULL ,
        login_admin    Varchar (20) ,
        password_admin Varchar (10) ,
        PRIMARY KEY (id_admin )
);


#------------------------------------------------------------
# Table ECOUTER
#------------------------------------------------------------

CREATE TABLE ECOUTER(
        id         TINYINT(1) NOT NULL ,
        id_musique Int NOT NULL ,
        PRIMARY KEY (id ,id_musique )
);


#------------------------------------------------------------
# Table LIRE
#------------------------------------------------------------

CREATE TABLE LIRE(
        id       TINYINT(1) NOT NULL ,
        id_livre Int NOT NULL ,
        PRIMARY KEY (id ,id_livre )
);


#------------------------------------------------------------
# Table REGARDER
#------------------------------------------------------------

CREATE TABLE REGARDER(
        id      TINYINT(1) NOT NULL ,
        id_film Int NOT NULL ,
        PRIMARY KEY (id ,id_film )
);


#------------------------------------------------------------
# Table PARTICIPER
#------------------------------------------------------------

CREATE TABLE PARTICIPER(
        id_groupe    Int NOT NULL ,
        id_evenement Int NOT NULL ,
        id           TINYINT(1) NOT NULL ,
        PRIMARY KEY (id_groupe ,id_evenement ,id )
);


#------------------------------------------------------------
# Table SE RENDRE
#------------------------------------------------------------

CREATE TABLE SE_RENDRE(
        id               TINYINT(1) NOT NULL ,
        id_etablissement Int NOT NULL ,
        id_groupe        Int NOT NULL ,
        PRIMARY KEY (id ,id_etablissement ,id_groupe )
);


#------------------------------------------------------------
# Table CREER
#------------------------------------------------------------

CREATE TABLE CREER(
        id           TINYINT(1) NOT NULL ,
        id_evenement Int NOT NULL ,
        id_groupe    Int NOT NULL ,
        PRIMARY KEY (id ,id_evenement ,id_groupe )
);


#------------------------------------------------------------
# Table GERER
#------------------------------------------------------------

CREATE TABLE GERER(
        id_admin Int NOT NULL ,
        id       TINYINT(1) NOT NULL ,
        PRIMARY KEY (id_admin ,id )
);

ALTER TABLE UTILISATEUR ADD CONSTRAINT FK_UTILISATEUR_id_groupe FOREIGN KEY (id_groupe) REFERENCES GROUPE(id_groupe);
ALTER TABLE EVENEMENT ADD CONSTRAINT FK_EVENEMENT_id_etablissement FOREIGN KEY (id_etablissement) REFERENCES ETABLISSEMENT(id_etablissement);
ALTER TABLE ECOUTER ADD CONSTRAINT FK_ECOUTER_id FOREIGN KEY (id) REFERENCES UTILISATEUR(id);
ALTER TABLE ECOUTER ADD CONSTRAINT FK_ECOUTER_id_musique FOREIGN KEY (id_musique) REFERENCES Musique(id_musique);
ALTER TABLE LIRE ADD CONSTRAINT FK_LIRE_id FOREIGN KEY (id) REFERENCES UTILISATEUR(id);
ALTER TABLE LIRE ADD CONSTRAINT FK_LIRE_id_livre FOREIGN KEY (id_livre) REFERENCES LIVRE(id_livre);
ALTER TABLE REGARDER ADD CONSTRAINT FK_REGARDER_id FOREIGN KEY (id) REFERENCES UTILISATEUR(id);
ALTER TABLE REGARDER ADD CONSTRAINT FK_REGARDER_id_film FOREIGN KEY (id_film) REFERENCES FILM(id_film);
ALTER TABLE PARTICIPER ADD CONSTRAINT FK_PARTICIPER_id_groupe FOREIGN KEY (id_groupe) REFERENCES GROUPE(id_groupe);
ALTER TABLE PARTICIPER ADD CONSTRAINT FK_PARTICIPER_id_evenement FOREIGN KEY (id_evenement) REFERENCES EVENEMENT(id_evenement);
ALTER TABLE PARTICIPER ADD CONSTRAINT FK_PARTICIPER_id FOREIGN KEY (id) REFERENCES UTILISATEUR(id);
ALTER TABLE SE_RENDRE ADD CONSTRAINT FK_SE_RENDRE_id FOREIGN KEY (id) REFERENCES UTILISATEUR(id);
ALTER TABLE SE_RENDRE ADD CONSTRAINT FK_SE_RENDRE_id_etablissement FOREIGN KEY (id_etablissement) REFERENCES ETABLISSEMENT(id_etablissement);
ALTER TABLE SE_RENDRE ADD CONSTRAINT FK_SE_RENDRE_id_groupe FOREIGN KEY (id_groupe) REFERENCES GROUPE(id_groupe);
ALTER TABLE CREER ADD CONSTRAINT FK_CREER_id FOREIGN KEY (id) REFERENCES UTILISATEUR(id);
ALTER TABLE CREER ADD CONSTRAINT FK_CREER_id_evenement FOREIGN KEY (id_evenement) REFERENCES EVENEMENT(id_evenement);
ALTER TABLE CREER ADD CONSTRAINT FK_CREER_id_groupe FOREIGN KEY (id_groupe) REFERENCES GROUPE(id_groupe);
ALTER TABLE GERER ADD CONSTRAINT FK_GERER_id_admin FOREIGN KEY (id_admin) REFERENCES ADMINISTRATEUR(id_admin);
ALTER TABLE GERER ADD CONSTRAINT FK_GERER_id FOREIGN KEY (id) REFERENCES UTILISATEUR(id);
