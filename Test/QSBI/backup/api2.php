<?php

	//Variables Declarations
	$servername = "localhost";
	$username = "ztecgqgv_ericgoh";
	$password = "1987gMh@nus";
	$dbname = "ztecgqgv_qswur";

	
	$sql2017  = "SELECT * FROM RankingComp;";
	
	
	// Create connection
	$dbh = mysqli_connect($servername, $username, $password, $dbname)
     or die ('cannot connect to database because ' . mysqli_connect_error());
	 
	
	//run the query
	$result = mysqli_query($dbh, $sql2017)
		or die (mysqli_error($dbh));
		
	
	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}
	
	$jsonRes = json_encode($data);
	
	print $jsonRes;
	
	//$data->Close(); 
	$dbh->Close(); 
	$data = null; 
	$dbh = null;

?>

