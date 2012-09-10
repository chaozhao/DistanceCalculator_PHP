<?php
	
	//connect to remote database
	$connstring = "host=ec2-23-23-92-180.compute-1.amazonaws.com "; 
	$connstring .= "port=5432 ";
	$connstring .= "dbname=d5esbqm1g7orap ";
	$connstring .= "user=zmffjoapewndxl ";
	$connstring .= "password=r7mnCO1hMRPy2R8ask5BCsd3s7";
	
	$dbconn = pg_connect($connstring);

	if (!$dbconn) 
	{
	echo "An error occured.\n";
	exit;
	}

$drop = "Drop table coords";

$dropresult = pg_query($dbconn, $drop);

if ($dropresult) 
{
	echo "table coords droped <br/>";
}
else 
{
	echo "table coords not exists <br/>";
}

$createtable = "CREATE TABLE coords (";
$createtable .= "longitude decimal NOT NULL, ";
$createtable .= "latitude decimal NOT NULL, ";
$createtable .= "distance decimal NOT NULL,";
$createtable .= "time_stamp timestamp NOT NULL,";
$createtable .= "PRIMARY KEY (time_stamp));";

$result = pg_query($dbconn, $createtable);

if ($result) 
{
	echo "table coords created <br/>";
}
else 
{
	echo "table coords exists <br/>";
}

?>