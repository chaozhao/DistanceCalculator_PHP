DROP TABLE IF EXISTS Coords;
DROP SEQUENCE auto_ID;

CREATE TABLE Coords
(
  longitude decimal  NOT NULL,
  latitude   decimal NOT NULL,
  time_stamp  timestamp NOT NULL,
  ID Integer NOT NULL,
  Constraint pk_ID PRIMARY KEY (ID)
 );

CREATE SEQUENCE auto_ID start 1;

