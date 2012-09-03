<?php
	//connect to remote database
	$connstring = "host=ec2-23-23-92-180.compute-1.amazonaws.com "; 
	$connstring .= "port=5432 ";
	$connstring .= "dbname=d5esbqm1g7orap ";
	$connstring .= "user=zmffjoapewndxl ";
	$connstring .= "password=r7mnCO1hMRPy2R8ask5BCsd3s7";
	
	$dbconn = pg_connect($connstring);

	if (!$dbconn) {
	echo "An error occured.\n";
	exit;
}

$result = pg_query($dbconn, "SELECT * FROM Coords");
if (!$result) {
  pg_query($dbconn, "CREATE TABLE [ IF NOT EXISTS ] Coords
(
  longitude double  NOT NULL,
  latitude   double NOT NULL,
  time_stamp    timestamp      NOT NULL,
  PRIMARY KEY (time_stamp)
);"
}
else exit;

?>