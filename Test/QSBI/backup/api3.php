<?php

	//Variables Declarations
	$servername = "localhost";
	$username = "ztecgqgv_ericgoh";
	$password = "1987gMh@nus";
	$dbname = "ztecgqgv_qswur";

	$q = str_replace("+", "_", $_GET['q']);
	
	$sql2017  = "SELECT * FROM " . $q;
	
	
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
	$res = str_replace("2011Rank", "rank2011", $jsonRes );
	$res = str_replace("2012Rank", "rank2012", $res );
	$res = str_replace("2013Rank", "rank2013", $res );
	$res = str_replace("2014Rank", "rank2014", $res );
	$res = str_replace("2015Rank", "rank2015", $res );
	$res = str_replace("2016Rank", "rank2016", $res );
	$res = str_replace("2017Rank", "rank2017", $res );
	
	$res = str_replace("2011Score", "score2011", $res );
	$res = str_replace("2012Score", "score2012", $res );
	$res = str_replace("2013Score", "score2013", $res );
	$res = str_replace("2014Score", "score2014", $res );
	$res = str_replace("2015Score", "score2015", $res );
	$res = str_replace("2016Score", "score2016", $res );
	$res = str_replace("2017Score", "score2017", $res );
	
	print $res;
	
	//$data->Close(); 
	$dbh->Close(); 
	$data = null; 
	$dbh = null;

?>

