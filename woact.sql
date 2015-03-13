-- COPYRIGHT gruppe17( eftoli14, banfro14, hallar14, dallar14, ausasl14, komchr14, odeand14)
-- Database for PJ2100 exam-project
--
-- Creating the Schema
--

DROP SCHEMA IF EXISTS woact;
CREATE SCHEMA woact;
USE woact;

--
-- Structure for table ''
--

DROP TABLE IF EXISTS room;
CREATE TABLE room
(
roomID int(6) UNSIGNED AUTO_INCREMENT,
name VARCHAR(30) NOT NULL,
projector boolean DEFAULT false,
capacity INT(4) NOT NULL,
PRIMARY KEY (roomID)
);
 
--
-- Structure for table ''
--

DROP TABLE IF EXISTS MyGuests;
CREATE TABLE MyGuests 
(
MyGuestsID int(6) UNSIGNED AUTO_INCREMENT,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP,
PRIMARY KEY (MyGuestsID)
);

--
-- Table to see if in use
--

/*
DROP TABLE IF EXISTS InUse;
CREATE TABLE InUse 
(
roomID int(6) NOT NULL,
GuestsInRoom int(30) NOT NULL,
FromTime TIMESTAMP,
ToTime TIMESTAMP,
PRIMARY KEY (roomID),
FOREIGN KEY (roomID) REFERENCES room (roomID),
FOREIGN KEY (GuestsInRoom) REFERENCES MyGuests (MyGuestsID)
);

INSERT INTO room (name, projector, capacity) VALUES ('Thor', TRUE, '4'), ('Oden', TRUE, '4'), ('Balder', FALSE, '4'), ('Frej', TRUE, '3'), ('Höder', TRUE, '4'), ('Heimdall', FALSE, '4'); 
INSERT INTO MyGuests (firstname, lastname, email, reg_date) VALUES ()

*/

select * from room

