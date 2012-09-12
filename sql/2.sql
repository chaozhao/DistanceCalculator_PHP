DROP TABLE IF EXISTS time_table;
DROP TABLE IF EXISTS latitude_table;
DROP TABLE IF EXISTS longitude_table;


CREATE TABLE latitude_table
(
	lat_ID INTEGER NOT NULL,
	latitude decimal NOT NULL,
	Constraint pk_LatitudeID PRIMARY KEY (lat_ID)
);

CREATE TABLE longitude_table
(
	long_ID INTEGER NOT NULL,
	longitude decimal NOT NULL,
	Constraint pk_longitudeID PRIMARY KEY (long_ID)
);

CREATE TABLE time_table
(
	Time_ID INTEGER NOT NULL,
	time_stamp TIMESTAMP NOT NULL,
	Constraint pk_timeID PRIMARY KEY (Time_ID)
);


INSERT INTO latitude_table (lat_ID,  latitude) Select Coords.ID, Coords.latitude FROM Coords;
INSERT INTO longitude_table (long_ID,longitude) Select Coords.ID, Coords.longitude FROM Coords;
INSERT INTO Time_table (Time_ID, time_stamp) Select Coords.ID, Coords.time_stamp FROM Coords;

SELECT time_table.time_stamp, longitude_table.longitude, latitude_table.latitude 
FROM Time_table,longitude_table,latitude_table 
where Time_table.time_id = longitude_table.long_id and longitude_table.long_id = latitude_table.lat_id;

psql "dbname=d5esbqm1g7orap host=ec2-23-23-92-180.compute-1.amazonaws.com user=zmffjoapewndxl password=r7mnCO1hMRPy2R8ask5BCsd3s7 port=5432 sslmode=require" 
