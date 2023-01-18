<?php

	$email = $_GET['email'];
	$passwords = $_GET['passwords'];
	
	$servername = "localhost";
	$username = "ztecgqgv_ericgoh";
	$password = "1987gMh@nus";
	$dbname = "ztecgqgv_qswur";
	
	$sql2017  = "SELECT * FROM Users WHERE Email='".$email."' and PASSWORDS= '".md5($passwords)."';";
		
	// Create connection
	$dbh = mysqli_connect($servername, $username, $password, $dbname)
		or die ('cannot connect to database because ' . mysqli_connect_error());
	 
	
	//run the query
	$data = mysqli_query($dbh, $sql2017)
		or die (mysqli_error($dbh));
	
	if ($data->num_rows > 0) {
	
		// Register $myusername, $mypassword and redirect to file "login_success.php"
		session_start();
	
		$_SESSION['email']= $email;
		$_SESSION['pass']= md5($passwords);
	
		redirect("/Test/QSBI/index.php");
	
	} else {
		//echo "Invalid Login";
		redirect("/Test/QSBI/login.php");
	}
	
	$dbh->Close(); 
	$data = null; 
	$dbh = null;
	
	
	
	function redirect($url, $statusCode = 303)
	{
		header('Location: ' . $url, true, $statusCode);
		die();
	}
?>