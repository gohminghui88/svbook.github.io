<?php

//Ref: https://jadendreamer.wordpress.com/2014/12/24/php-tutorial-looping-through-displaying-a-mysqli-result-set/
	
	$uniName = str_replace("+", " ", $_GET['uniName']);
	
	if($uniName != "") {

	//Variables Declarations
	$servername = "localhost";
	$username = "ztecgqgv_ericgoh";
	$password = "1987gMh@nus";
	$dbname = "ztecgqgv_qswur";

	
	
	$sql2017  = "DELETE FROM QSOverall WHERE Institution=\"". $uniName ."\"";
	
	
	// Create connection
	$dbh = mysqli_connect($servername, $username, $password, $dbname)
     or die ('cannot connect to database because ' . mysqli_connect_error());
	 
	
	//run the query
	mysqli_query($dbh, $sql2017)
		or die (mysqli_error($dbh));
		
	
	//$data->Close(); 
	$dbh->Close(); 
	//$data = null; 
	$dbh = null;
	
	echo "Deleted. <a href=\"http://www.svbook.com/Test/QSBI/index.php\"> Go Back</a>";
	
	}
	
?>