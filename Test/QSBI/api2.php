<?php

	require("databaseSettings.php");

	$year = str_replace("+", "_", $_GET['y']);
	//echo $year;
	
	$sql2017 = "";
	
	if($year != "All")
		$sql2017  = "SELECT * FROM RankingComp WHERE Year1=\"" . $year . "\";";
	
	else
		$sql2017  = "SELECT * FROM RankingComp; ";
		
	
	//echo "SQL Statements: " . $sql2017;
	
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

