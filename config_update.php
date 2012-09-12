<?php

$connstring = "host=ec2-23-23-92-180.compute-1.amazonaws.com "; 
//$connstring = "host=localhost ";
$connstring .= "port=5432 ";
$connstring .= "dbname=d5esbqm1g7orap ";
$connstring .= "user=zmffjoapewndxl ";
$connstring .= "password=r7mnCO1hMRPy2R8ask5BCsd3s7 ";
$connstring .= "sslmode=require ";

$dbconn = pg_connect($connstring);

$droptables  = "DROP TABLE IF EXISTS latitude_table;";
$droptables .= "DROP TABLE IF EXISTS longitude_table;";
$droptables .= "DROP TABLE IF EXISTS time_table;";

$createtables  = "CREATE TABLE latitude_table(";
$createtables .= "lat_ID INTEGER NOT NULL,";
$createtables .= "latitude decimal NOT NULL,";
$createtables .= "Constraint pk_LatitudeID PRIMARY KEY (lat_ID));";

$createtables .= "CREATE TABLE longitude_table(";
$createtables .= "long_ID INTEGER NOT NULL,";
$createtables .= "longitude decimal NOT NULL,";
$createtables .= "Constraint pk_longitudeID PRIMARY KEY (long_ID));";

$createtables .= "CREATE TABLE time_table(";
$createtables .= "Time_ID INTEGER NOT NULL,";
$createtables .= "time_stamp TIMESTAMP NOT NULL,";
$createtables .= "Constraint pk_timeID PRIMARY KEY (Time_ID));";

$datamitgration  = "INSERT INTO latitude_table (lat_ID,  latitude) Select Coords.ID, Coords.latitude FROM Coords;";
$datamitgration .= "INSERT INTO longitude_table (long_ID,longitude) Select Coords.ID, Coords.longitude FROM Coords;";
$datamitgration .= "INSERT INTO time_table (Time_ID, time_stamp) Select Coords.ID, Coords.time_stamp FROM Coords;";

try
{
	$dbconn = pg_connect($connstring);
	pg_query($dbconn, $droptables);
	pg_query($dbconn, $createtables);
	echo 'created tables <br >';
	pg_query($dbconn, $datamitgration);
	echo 'data transfered <br >';
}
catch(Exception $e) 
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>