CREATE TABLE IF NOT EXISTS Coords
(
  longitude decimal  NOT NULL,
  latitude   decimal NOT NULL,
  distance    decimal  NOT NULL,
  time_stamp  timestamp NOT NULL,
  PRIMARY KEY (time_stamp)
  );

INSERT INTO Coords (latitude,longitude,distance,time_stamp)VALUES ($long, $lat, $distance,current_time);

