
ALTER TABLE Coords RENAME TO old_Coords;

CREATE TABLE new_Coords
(
  ID INTEGER NOT NULL AUTO_INCREMENT,
  longitude double  NOT NULL,
  latitude   double NOT NULL,
  distance    double  NOT NULL,
  PRIMARY KEY (ID)  
);

CREATE TABLE Time_table
(
  T_ID INTEGER NOT NULL AUTO_INCREMENT,
  time_stamp TIMESTAMP NOT NULL,
  PRIMARY KEY (T_ID)
);

INSERT INTO new_Coords (ID, longitude, latitude, distance) 
Select Coords.ID, Coords.longitude, Coords.latitude, Coords.distance FROM old_Coords;


INSERT INTO Time_table (T_ID, time_stamp) Select Coords.ID, Coords.time_stamp from old_Coords;


SELECT new_Coords.ID, new_Coords.longitude, new_Coords.latitude, new_Coords.distance, Time_table.time_stamp FROM Coords INNER JOIN Time_table ON new_Coords.ID = Time_table.T_ID;