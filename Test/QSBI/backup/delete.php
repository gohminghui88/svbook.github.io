<?php

//Ref: https://jadendreamer.wordpress.com/2014/12/24/php-tutorial-looping-through-displaying-a-mysqli-result-set/
	
	
	
	session_start();
	$email2 = "";
	$passwords2 = "";
	if (isset($_SESSION['email'])) {$email2 = $_SESSION['email']; }
	if (isset($_SESSION['pass'])) { $passwords2 = $_SESSION['pass']; }
	
	
	$uniName = str_replace("+", " ", $_GET['uniName']);
	

	//Variables Declarations
	$servername = "localhost";
	$username = "ztecgqgv_ericgoh";
	$password = "1987gMh@nus";
	$dbname = "ztecgqgv_qswur";
	
	// Create connection
	$dbh = mysqli_connect($servername, $username, $password, $dbname)
     or die ('cannot connect to database because ' . mysqli_connect_error());
	 
	
	//Validate User first
	$sql = "SELECT * FROM Users WHERE Email = '".$email2."' AND PASSWORDS = '".$passwords2."'";
	
	//run the query
	$data = mysqli_query($dbh, $sql)
		or die (mysqli_error($dbh));
	
	
	if ($data->num_rows > 0) {
	
		if($uniName != "") {
		
			$sqlOverall  = "DELETE FROM QSOverall WHERE Institution=\"". $uniName ."\"";
			$sqlAcad  = "DELETE FROM QSAcad WHERE Institution=\"". $uniName ."\"";
			$sqlEmp  = "DELETE FROM QSEmp WHERE Institution=\"". $uniName ."\"";
			$sqlFacStud  = "DELETE FROM QSFacStud WHERE Institution=\"". $uniName ."\"";
			$sqlCit  = "DELETE FROM QSCit WHERE Institution=\"". $uniName ."\"";
			$sqlIntFac  = "DELETE FROM QSIntFac WHERE Institution=\"". $uniName ."\"";
			$sqlIntStud  = "DELETE FROM QSIntStud WHERE Institution=\"". $uniName ."\"";
			$sqlRankingComp  = "DELETE FROM RankingComp WHERE Institution=\"". $uniName ."\"";
	
	
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
		
	
			mysqli_query($dbh, $sqlRankingComp)
				or die (mysqli_error($dbh));
				
			
			echo "Deleted. <a href=\"http://www.svbook.com/Test/QSBI/index.php\"> Go Back</a>";
			
		}
	}
		
		
	else {
			
		$dbh->Close(); 
		//$data = null; 
		$dbh = null;
		redirect("/Test/QSBI/login.php");
	}
	
	//$data->Close(); 
	$dbh->Close(); 
	$data = null; 
	$dbh = null;
	
	
	function redirect($url, $statusCode = 303)
	{
		header('Location: ' . $url, true, $statusCode);
		die();
	}
	
?>