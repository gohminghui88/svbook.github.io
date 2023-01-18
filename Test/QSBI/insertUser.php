<?php

	session_start();
	$email2 = "";
	$passwords2 = "";
	if (isset($_SESSION['email'])) {$email2 = $_SESSION['email']; }
	if (isset($_SESSION['pass'])) { $passwords2 = $_SESSION['pass']; }

	$user = $_GET['username'];
	$email = $_GET['email'];
	$passwords = $_GET['passwords'];
	$name = $_GET['name'];
	

	require("databaseSettings.php");
	
	
	
	//Validate Users first
	$sql = "SELECT * FROM Users WHERE Email = '".$email2."' AND PASSWORDS = '".$passwords2."'";
	
	// Create connection
	$dbh = mysqli_connect($servername, $username, $password, $dbname)
		or die ('cannot connect to database because ' . mysqli_connect_error());
	
	
	//run the query
	$data = mysqli_query($dbh, $sql)
		or die (mysqli_error($dbh));
	
	
	if ($data->num_rows > 0) {
	
		$sql2017  = "INSERT INTO Users(email, name, passwords, username) VALUES ('".$email."', '".$name."', '".md5($passwords). "', '" . $user . "')";
		
	
		//run the query
		mysqli_query($dbh, $sql2017)
			or die (mysqli_error($dbh));
			
		echo "User Added. <a href=\"http://www.svbook.com/Test/QSBI/index2.php?y=2017\"> Go Back</a>";
	}
	
	else {
		$dbh->Close(); 
		//$data = null; 
		$dbh = null;
		redirect("/Test/QSBI/index.php");
	}
	
	$dbh->Close(); 
	$dbh = null;
	$data -> null;

	
	function redirect($url, $statusCode = 303)
	{
		header('Location: ' . $url, true, $statusCode);
		die();
	}
	
	
?>