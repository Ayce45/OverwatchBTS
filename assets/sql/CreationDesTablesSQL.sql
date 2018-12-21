#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS overwatchbts;
CREATE DATABASE overwatchbts;
USE overwatchbts;

CREATE TABLE PROF(
  idProf   Int NOT NULL AUTO_INCREMENT,
  nom      Varchar (25) NOT NULL ,
  prenom   Varchar (25) NOT NULL ,
  nbConvoc Int DEFAULT 0 NOT NULL,
  PRIMARY KEY (idProf)
)ENGINE=InnoDB;


CREATE TABLE BTS(
  idBts Int NOT NULL AUTO_INCREMENT,
  codeBts    Varchar (10) NOT NULL ,
  libelleBts Varchar (25) NOT NULL ,
  PRIMARY KEY (idBts)
)ENGINE=InnoDB;


CREATE TABLE EPREUVE(
  idEpreuve Int NOT NULL AUTO_INCREMENT,
  codeEpreuve    Varchar (10) NOT NULL ,
  libelleEpreuve Varchar (25) NOT NULL ,
  PRIMARY KEY (idEpreuve)
)ENGINE=InnoDB;


CREATE TABLE SALLE(
  idSalle Int NOT NULL AUTO_INCREMENT,
  numSalle Varchar (4) NOT NULL ,
  capacite Int DEFAULT 0 NOT NULL,
  PRIMARY KEY (idSalle)
)ENGINE=InnoDB;


CREATE TABLE comporter(
  dateEpreuve Date ,
  heureDebut  Time ,
  duree       Int NOT NULL ,
  idBts     Int NOT NULL ,
  idEpreuve Int NOT NULL ,
  PRIMARY KEY (idBts,idEpreuve)
)ENGINE=InnoDB;

CREATE TABLE enseigner(
  idProf  Int NOT NULL ,
  idBts Int NOT NULL ,
  PRIMARY KEY (idProf,idBts)
)ENGINE=InnoDB;

CREATE TABLE occuper(
  idBts     Int NOT NULL ,
  idEpreuve Int NOT NULL ,
  idSalle    Int NOT NULL ,
  PRIMARY KEY (idBts,idEpreuve,idSalle)
)ENGINE=InnoDB;


CREATE TABLE affecter(
  idProf      Int NOT NULL ,
  idBts     Int NOT NULL,
  idEpreuve Int NOT NULL,
  heureDebut  Time NOT NULL ,
  etat        Varchar (5) ,
  idSalle Int ,
  PRIMARY KEY (idProf,idBts,idEpreuve,heureDebut)
)ENGINE=InnoDB;



ALTER TABLE comporter ADD CONSTRAINT FK_comporter_idBts FOREIGN KEY (idBts) REFERENCES BTS(idBts);

ALTER TABLE comporter ADD CONSTRAINT FK_comporter_idEpreuve FOREIGN KEY (idEpreuve) REFERENCES EPREUVE(idEpreuve);

ALTER TABLE enseigner ADD CONSTRAINT FK_enseigner_idProf FOREIGN KEY (idProf) REFERENCES PROF(idProf);

ALTER TABLE enseigner ADD CONSTRAINT FK_enseigner_idBts FOREIGN KEY (idBts) REFERENCES BTS(idBts);

ALTER TABLE affecter ADD CONSTRAINT FK_affecter_idProf FOREIGN KEY (idProf) REFERENCES PROF(idProf);

ALTER TABLE affecter ADD CONSTRAINT FK_affecter_idBts_idEpreuve FOREIGN KEY (idBts,idEpreuve) REFERENCES comporter(idBts ,idEpreuve);

ALTER TABLE affecter ADD CONSTRAINT FK_affecter_idSalle  FOREIGN KEY (idSalle) REFERENCES SALLE(idSalle);

ALTER TABLE occuper ADD CONSTRAINT FK_occuper_idBts_idEpreuve FOREIGN KEY (idBts,idEpreuve) REFERENCES comporter(idBts ,idEpreuve);

ALTER TABLE occuper ADD CONSTRAINT FK_occuper_idSalle FOREIGN KEY (idSalle) REFERENCES SALLE(idSalle);
