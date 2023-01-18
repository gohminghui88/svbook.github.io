<?php

//Ref: https://jadendreamer.wordpress.com/2014/12/24/php-tutorial-looping-through-displaying-a-mysqli-result-set/
	
	$uniName = str_replace("+", " ", $_GET['uniName']);
	
	if($uniName != "") {

	//Variables Declarations
	$servername = "localhost";
	$username = "ztecgqgv_ericgoh";
	$password = "1987gMh@nus";
	$dbname = "ztecgqgv_qswur";

	
	
	
	
	
	// Create connection
	$dbh = mysqli_connect($servername, $username, $password, $dbname)
     or die ('cannot connect to database because ' . mysqli_connect_error());
	 
	
	$sqlOverall  = "DELETE FROM QSOverall WHERE Institution=\"". $uniName ."\"";
	$sqlAcad  = "DELETE FROM QSOverall WHERE Institution=\"". $uniName ."\"";
	$sqlEmp  = "DELETE FROM QSOverall WHERE Institution=\"". $uniName ."\"";
	$sqlFacStud  = "DELETE FROM QSOverall WHERE Institution=\"". $uniName ."\"";
	$sqlCit  = "DELETE FROM QSOverall WHERE Institution=\"". $uniName ."\"";
	$sqlIntFac  = "DELETE FROM QSOverall WHERE Institution=\"". $uniName ."\"";
	$sqlIntStud  = "DELETE FROM QSOverall WHERE Institution=\"". $uniName ."\"";
	
	//run the query
	mysqli_query($dbh, $sqlOverall)
		or die (mysqli_error($dbh));
		
	mysqli_query($dbh, $sqlAcad)
		or die (mysqli_error($dbh));
	
	mysqli_query($dbh, $sqlEmp)
		or die (mysqli_error($dbh));
	
	mysqli_query($dbh, $sqlFacStud)
		or die (mysqli_error($dbh));
	
	mysqli_query($dbh, $sqlCit)
		or die (mysqli_error($dbh));
	
	mysqli_query($dbh, $sqlIntFac)
		or die (mysqli_error($dbh));
	
	mysqli_query($dbh, $sqlIntStud)
		or die (mysqli_error($dbh));
		
	
	//$data->Close(); 
	$dbh->Close(); 
	//$data = null; 
	$dbh = null;
	
	echo "Deleted. <a href=\"http://www.svbook.com/Test/QSBI/index.php\"> Go Back</a>";
	
	}
	
?>