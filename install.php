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


$drop = "Drop table coords";
$dropresult = pg_query($dbconn, $drop);

if ($dropresult) 
{
	echo "droped <br/>";
}
else 
{
	echo "failed <br/>";
}


$createtable = "CREATE TABLE IF NOT EXISTS coords (longitude decimal NOT NULL,	latitude decimal NOT NULL,	time_stamp timestamp NOT NULL,	PRIMARY KEY (time_stamp))";
$result = pg_query($dbconn, $createtable);

if ($result) 
{
	echo "table is created <br/>";
}
else {
echo "Already Installed <br/>";
exit;
}

?>