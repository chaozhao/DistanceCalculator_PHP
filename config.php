<?php
	
	//connect to remote database

	$connstring = "host=ec2-23-23-92-180.compute-1.amazonaws.com "; 
	//$connstring  = "host=localhost ";
	$connstring .= "port=5432 ";
	$connstring .= "dbname=d5esbqm1g7orap ";
	$connstring .= "user=zmffjoapewndxl ";
	$connstring .= "password=r7mnCO1hMRPy2R8ask5BCsd3s7 ";
	//$connstring .= "sslmode=require ";
	
	$dbconn = pg_connect($connstring);

	if (!$dbconn) 
	{
	echo "An connection error occured.\n";
	exit;
	}

$drop = "Drop table if exists coords;";

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
$createtable .= "time_stamp timestamp NOT NULL,";
$createtable .= "ID Integer NOT NULL,";
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

$drop_squence = "Drop sequence if exists auto_ID;";

$drop_squence_result = pg_query($dbconn, $drop_squence);

if ($drop_squence_result) 
{
	echo "sequence auto_ID droped <br/>";
}
else 
{
	echo "sequence auto_ID not exists <br/>";
}

$createsquence = "Create sequence auto_ID start 1;";

$squence_create_result = pg_query($dbconn, $createsquence);

if ($dropresult) 
{
	echo "sequence auto_ID created <br/>";
}
else 
{
	echo "sequence auto_ID exists <br/>";
}

?>