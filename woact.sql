-- COPYRIGHT gruppe17( eftoli14, banfro14, hallar14, dallar14, ausasl14, komchr14, odeand14)
-- Database for PJ2100 exam-project
--
-- Creating the Schema
--

DROP SCHEMA IF EXISTS woact;
CREATE SCHEMA woact;
USE woact;

--
-- Structure for table 'Grupperom'
--

DROP TABLE IF EXISTS Grupperom;
CREATE TABLE Grupperom
(
RomID int(30) NOT NULL UNIQUE AUTO_INCREMENT,
RomNavn VARCHAR(10),
harProsjektor boolean DEFAULT'1',
kvadratMeter int(10),
kapasitet INT DEFAULT'1',
PRIMARY KEY (RomID)
);
 
--
-- Structure for table 'Brukere'
--

DROP TABLE IF EXISTS Brukere;
CREATE TABLE Brukere 
(
BrukerID int(30) NOT NULL UNIQUE AUTO_INCREMENT,
Navn VARCHAR(50) NOT NULL,
Passord VARCHAR(50),
Studie ENUM('Kunst','Kommunikasjon','Teknologi'),
PRIMARY KEY (BrukerID)
);

--
-- Table for connecting 'Grupperom' AND 'Brukere'
--

DROP TABLE IF EXISTS GrupperomBrukere;
CREATE TABLE GrupperomBrukere 
(
RomID int(30) NOT NULL,
BrukerID int(30) NOT NULL,
FraTid DATETIME,
TilTid DATETIME,
PRIMARY KEY (RomID, BrukerID),
FOREIGN KEY (RomID) REFERENCES Grupperom (RomID),
FOREIGN KEY (BrukerID) REFERENCES Brukere (BrukerID)
);

/*DATE_FORMAT('dato','%d-%m-%Y')*/ -- Vi burde formatere datoene

INSERT INTO Grupperom VALUES (NULL, 'Vimle', false, 10, 3);
INSERT INTO Grupperom VALUES (NULL, 'Rom 81', true, 15, 4);
INSERT INTO Grupperom VALUES (NULL, 'Rom 41', false, 12, 2);

INSERT INTO Brukere VALUES (NULL, 'Oliver', 'hei', 'Teknologi');
INSERT INTO Brukere VALUES (NULL, 'Magnus', 'ja', 'Kommunikasjon');
INSERT INTO Brukere VALUES (NULL, 'Aslak', 'nei', 'Teknologi');
