<?php

//Ref: https://jadendreamer.wordpress.com/2014/12/24/php-tutorial-looping-through-displaying-a-mysqli-result-set/
	
	$uniName = str_replace("+", " ", $_GET['uniName']);
	
	if($uniName != "") {

	//Variables Declarations
	$servername = "localhost";
	$username = "ztecgqgv_ericgoh";
	$password = "1987gMh@nus";
	$dbname = "ztecgqgv_qswur";

	
	
	$sql  = "SELECT * FROM QS WHERE Institution=\"". $uniName ."\" and Year1=\"2016\";";
	$sql2  = "SELECT * FROM ARWU WHERE Institution=\"". $uniName ."\" and Year1=\"2016\";";
	$sql3  = "SELECT * FROM THE WHERE Institution=\"". $uniName ."\" and Year1=\"2016\";";
	$sql4  = "SELECT * FROM USNews WHERE Institution=\"". $uniName ."\" and Year1=\"2016\";";
	
	// Create connection
	$dbh = mysqli_connect($servername, $username, $password, $dbname)
     or die ('cannot connect to database because ' . mysqli_connect_error());
	 
	
	//run the query
	$QSData = mysqli_query($dbh, $sql)
		or die (mysqli_error($dbh));
		
	$ARWUData = mysqli_query($dbh, $sql2)
		or die (mysqli_error($dbh));
		
	$THEData = mysqli_query($dbh, $sql3)
		or die (mysqli_error($dbh));
		
	$USNewsData = mysqli_query($dbh, $sql4)
		or die (mysqli_error($dbh));

	
	$QSRankData = array();
	$QSScoreData = array();
	
	$ARWURankData = array();
	$ARWUScoreData = array();
	
	$THERankData = array();
	$THEScoreData = array();
	
	$USNewsRankData = array();
	$USNewsScoreData = array();
	
	while ($row = mysqli_fetch_array($QSData)) {
		
		if($row["Year1"] == "2016") {
			$QSRankData = array_merge($QSRankData, array("2016Rank" => $row["Rank1"]));
			$QSScoreData = array_merge($QSScoreData, array("2016Score" => $row["OverallScore"]));
		}
	}
	
	while ($row = mysqli_fetch_array($ARWUData)) {
		
		if($row["Year1"] == "2016") {
			$ARWURankData = array_merge($ARWURankData, array("2016Rank" => $row["Rank1"]));
			$ARWUScoreData = array_merge($ARWUScoreData, array("2016Score" => $row["TotalScore"]));
		}
	}
	
	while ($row = mysqli_fetch_array($THEData)) {
		
		if($row["Year1"] == "2016") {
			$THERankData = array_merge($THERankData, array("2016Rank" => $row["Rank1"]));
			$THEScoreData = array_merge($THEScoreData, array("2016Score" => $row["OverallScore"]));
		}
	}
	
	while ($row = mysqli_fetch_array($USNewsData)) {
		
		if($row["Year1"] == "2016") {
			$USNewsRankData = array_merge($USNewsRankData, array("2016Rank" => $row["GlobalRank"]));
			$USNewsScoreData = array_merge($USNewsScoreData, array("2016Score" => $row["GlobalScore"]));
		}
	}
	
	
	$inSQL = "INSERT INTO RankingComp (Institution, QSRank, THERank, ARWURank, USNewsRank, QSScore, THEScore, ARWUScore, USNewsScore)
	VALUES (\"" . $uniName . "\",\"" . $QSRankData["2016Rank"] . "\",\"" . $THERankData["2016Rank"] . "\",\"" . $ARWURankData["2016Rank"] . "\",\"" . $USNewsRankData["2016Rank"]
	 . "\",\"" . $QSScoreData["2016Score"] . "\",\"" . $THEScoreData["2016Score"] . "\",\"" . $ARWUScoreData["2016Score"] . "\",\"" . $USNewsScoreData["2016Score"]."\");";
	
	
	
	mysqli_query($dbh, $inSQL)
		or die (mysqli_error($dbh));

	
	
	
	$data->Close(); 
	$dbh->Close(); 
	$data = null; 
	$dbh = null;
	
	echo "Inserted. <a href=\"http://www.svbook.com/Test/QSBI/index.php\"> Go Back</a>";
	
	//redirect("http://www.svbook.com/Test/QSBI/index.php");
	
	}

	
	function redirect($url, $statusCode = 303)
	{
		header('Location: ' . $url, true, $statusCode);
		die();
	}
?>