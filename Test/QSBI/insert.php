<?php

//Ref: https://jadendreamer.wordpress.com/2014/12/24/php-tutorial-looping-through-displaying-a-mysqli-result-set/
	
	
		
	session_start();
	$email2 = "";
	$passwords2 = "";
	if (isset($_SESSION['email'])) {$email2 = $_SESSION['email']; }
	if (isset($_SESSION['pass'])) { $passwords2 = $_SESSION['pass']; }
	
	
	$uniName = str_replace("+", " ", $_GET['uniName']);
	
	
	
	//Variables Declarations
	require("databaseSettings.php");
	
	
	// Create connection
	$dbh = mysqli_connect($servername, $username, $password, $dbname)
     or die ('cannot connect to database because ' . mysqli_connect_error());
	 
	
	//Validate User first
	$sqlUser = "SELECT * FROM Users WHERE Email = '".$email2."' AND PASSWORDS = '".$passwords2."'";
	
	//run the query
	$res = mysqli_query($dbh, $sqlUser)
		or die (mysqli_error($dbh));
	
	
	
	
	if ($res->num_rows > 0) {
	
		if($uniName != "") {
		
			$sql2017  = "SELECT * FROM QS WHERE Institution=\"". $uniName ."\"";
			
			$sql  = "SELECT * FROM QS WHERE Institution=\"". $uniName ."\";";
			$sql2  = "SELECT * FROM ARWU WHERE Institution=\"". $uniName ."\";";
			$sql3  = "SELECT * FROM THE WHERE Institution=\"". $uniName ."\";";
			$sql4  = "SELECT * FROM USNews WHERE Institution=\"". $uniName ."\";";
			
			
			
			 
			
			//run the query
			$data = mysqli_query($dbh, $sql2017)
				or die (mysqli_error($dbh));
				
			
			
			$QSData = mysqli_query($dbh, $sql)
				or die (mysqli_error($dbh));
				
			$ARWUData = mysqli_query($dbh, $sql2)
				or die (mysqli_error($dbh));
				
			$THEData = mysqli_query($dbh, $sql3)
				or die (mysqli_error($dbh));
				
			$USNewsData = mysqli_query($dbh, $sql4)
				or die (mysqli_error($dbh));
				
			

			
			$rankData = array();
			$scoreData = array();
			
			$rankAcadData = array();
			$scoreAcadData = array();
			
			$rankEmpData = array();
			$scoreEmpData = array();
			
			$rankFSData = array();
			$scoreFSData = array();
			
			$rankCitData = array();
			$scoreCitData = array();
			
			$rankIFData = array();
			$scoreIFData = array();
			
			$rankISData = array();
			$scoreISData = array();
			
			
			
			$QSRankData = array();
			$QSScoreData = array();
			
			$ARWURankData = array();
			$ARWUScoreData = array();
			
			$THERankData = array();
			$THEScoreData = array();
			
			$USNewsRankData = array();
			$USNewsScoreData = array();
			
			$Year = array();
			
			while ($row = mysqli_fetch_array($data)) {
				
				if($row["Year1"] == "2009") {
					$rankData = array_merge($rankData, array("2009Rank" => $row["Rank1"]));
					$scoreData = array_merge($scoreData, array("2009Score" => $row["OverallScore"]));
					
					$rankAcadData = array_merge($rankAcadData, array("2009Rank" => $row["AcadRepRank"]));
					$scoreAcadData = array_merge($scoreAcadData, array("2009Score" => $row["AcadRepScore"]));
					
					$rankEmpData = array_merge($rankEmpData, array("2009Rank" => $row["EmpRepRank"]));
					$scoreEmpData = array_merge($scoreEmpData, array("2009Score" => $row["EmpRepScore"]));
					
					$rankFSData = array_merge($rankFSData, array("2009Rank" => $row["FacStudRank"]));
					$scoreFSData = array_merge($scoreFSData, array("2009Score" => $row["FacStudScore"]));
					
					$rankCitData = array_merge($rankCitData, array("2009Rank" => $row["CitPerFacRank"]));
					$scoreCitData = array_merge($scoreCitData, array("2009Score" => $row["CitPerFacScore"]));
					
					$rankIFData = array_merge($rankIFData, array("2009Rank" => $row["IntFacRank"]));
					$scoreIFData = array_merge($scoreIFData, array("2009Score" => $row["IntFacScore"]));
					
					$rankISData = array_merge($rankISData, array("2009Rank" => $row["IntStudRank"]));
					$scoreISData = array_merge($scoreISData, array("2009Score" => $row["IntStudScore"]));
				}
				
				if($row["Year1"] == "2010") {
					$rankData = array_merge($rankData, array("2010Rank" => $row["Rank1"]));
					$scoreData = array_merge($scoreData, array("2010Score" => $row["OverallScore"]));
					
					$rankAcadData = array_merge($rankAcadData, array("2010Rank" => $row["AcadRepRank"]));
					$scoreAcadData = array_merge($scoreAcadData, array("2010Score" => $row["AcadRepScore"]));
					
					$rankEmpData = array_merge($rankEmpData, array("2010Rank" => $row["EmpRepRank"]));
					$scoreEmpData = array_merge($scoreEmpData, array("2010Score" => $row["EmpRepScore"]));
					
					$rankFSData = array_merge($rankFSData, array("2010Rank" => $row["FacStudRank"]));
					$scoreFSData = array_merge($scoreFSData, array("2010Score" => $row["FacStudScore"]));
					
					$rankCitData = array_merge($rankCitData, array("2010Rank" => $row["CitPerFacRank"]));
					$scoreCitData = array_merge($scoreCitData, array("2010Score" => $row["CitPerFacScore"]));
					
					$rankIFData = array_merge($rankIFData, array("2010Rank" => $row["IntFacRank"]));
					$scoreIFData = array_merge($scoreIFData, array("2010Score" => $row["IntFacScore"]));
					
					$rankISData = array_merge($rankISData, array("2010Rank" => $row["IntStudRank"]));
					$scoreISData = array_merge($scoreISData, array("2010Score" => $row["IntStudScore"]));
				}
				
				if($row["Year1"] == "2011") {
					$rankData = array_merge($rankData, array("2011Rank" => $row["Rank1"]));
					$scoreData = array_merge($scoreData, array("2011Score" => $row["OverallScore"]));
					
					$rankAcadData = array_merge($rankAcadData, array("2011Rank" => $row["AcadRepRank"]));
					$scoreAcadData = array_merge($scoreAcadData, array("2011Score" => $row["AcadRepScore"]));
					
					$rankEmpData = array_merge($rankEmpData, array("2011Rank" => $row["EmpRepRank"]));
					$scoreEmpData = array_merge($scoreEmpData, array("2011Score" => $row["EmpRepScore"]));
					
					$rankFSData = array_merge($rankFSData, array("2011Rank" => $row["FacStudRank"]));
					$scoreFSData = array_merge($scoreFSData, array("2011Score" => $row["FacStudScore"]));
					
					$rankCitData = array_merge($rankCitData, array("2011Rank" => $row["CitPerFacRank"]));
					$scoreCitData = array_merge($scoreCitData, array("2011Score" => $row["CitPerFacScore"]));
					
					$rankIFData = array_merge($rankIFData, array("2011Rank" => $row["IntFacRank"]));
					$scoreIFData = array_merge($scoreIFData, array("2011Score" => $row["IntFacScore"]));
					
					$rankISData = array_merge($rankISData, array("2011Rank" => $row["IntStudRank"]));
					$scoreISData = array_merge($scoreISData, array("2011Score" => $row["IntStudScore"]));
				}
				
				if($row["Year1"] == "2012") {
					$rankData = array_merge($rankData, array("2012Rank" => $row["Rank1"]));
					$scoreData = array_merge($scoreData, array("2012Score" => $row["OverallScore"]));
					
					$rankAcadData = array_merge($rankAcadData, array("2012Rank" => $row["AcadRepRank"]));
					$scoreAcadData = array_merge($scoreAcadData, array("2012Score" => $row["AcadRepScore"]));
					
					$rankEmpData = array_merge($rankEmpData, array("2012Rank" => $row["EmpRepRank"]));
					$scoreEmpData = array_merge($scoreEmpData, array("2012Score" => $row["EmpRepScore"]));
					
					$rankFSData = array_merge($rankFSData, array("2012Rank" => $row["FacStudRank"]));
					$scoreFSData = array_merge($scoreFSData, array("2012Score" => $row["FacStudScore"]));
					
					$rankCitData = array_merge($rankCitData, array("2012Rank" => $row["CitPerFacRank"]));
					$scoreCitData = array_merge($scoreCitData, array("2012Score" => $row["CitPerFacScore"]));
					
					$rankIFData = array_merge($rankIFData, array("2012Rank" => $row["IntFacRank"]));
					$scoreIFData = array_merge($scoreIFData, array("2012Score" => $row["IntFacScore"]));
					
					$rankISData = array_merge($rankISData, array("2012Rank" => $row["IntStudRank"]));
					$scoreISData = array_merge($scoreISData, array("2012Score" => $row["IntStudScore"]));
				}
				
				if($row["Year1"] == "2013") {
					$rankData = array_merge($rankData, array("2013Rank" => $row["Rank1"]));
					$scoreData = array_merge($scoreData, array("2013Score" => $row["OverallScore"]));
					
					$rankAcadData = array_merge($rankAcadData, array("2013Rank" => $row["AcadRepRank"]));
					$scoreAcadData = array_merge($scoreAcadData, array("2013Score" => $row["AcadRepScore"]));
					
					$rankEmpData = array_merge($rankEmpData, array("2013Rank" => $row["EmpRepRank"]));
					$scoreEmpData = array_merge($scoreEmpData, array("2013Score" => $row["EmpRepScore"]));
					
					$rankFSData = array_merge($rankFSData, array("2013Rank" => $row["FacStudRank"]));
					$scoreFSData = array_merge($scoreFSData, array("2013Score" => $row["FacStudScore"]));
					
					$rankCitData = array_merge($rankCitData, array("2013Rank" => $row["CitPerFacRank"]));
					$scoreCitData = array_merge($scoreCitData, array("2013Score" => $row["CitPerFacScore"]));
					
					$rankIFData = array_merge($rankIFData, array("2013Rank" => $row["IntFacRank"]));
					$scoreIFData = array_merge($scoreIFData, array("2013Score" => $row["IntFacScore"]));
					
					$rankISData = array_merge($rankISData, array("2013Rank" => $row["IntStudRank"]));
					$scoreISData = array_merge($scoreISData, array("2013Score" => $row["IntStudScore"]));
				}
				
				if($row["Year1"] == "2014") {
					$rankData = array_merge($rankData, array("2014Rank" => $row["Rank1"]));
					$scoreData = array_merge($scoreData, array("2014Score" => $row["OverallScore"]));
					
					$rankAcadData = array_merge($rankAcadData, array("2014Rank" => $row["AcadRepRank"]));
					$scoreAcadData = array_merge($scoreAcadData, array("2014Score" => $row["AcadRepScore"]));
					
					$rankEmpData = array_merge($rankEmpData, array("2014Rank" => $row["EmpRepRank"]));
					$scoreEmpData = array_merge($scoreEmpData, array("2014Score" => $row["EmpRepScore"]));
					
					$rankFSData = array_merge($rankFSData, array("2014Rank" => $row["FacStudRank"]));
					$scoreFSData = array_merge($scoreFSData, array("2014Score" => $row["FacStudScore"]));
					
					$rankCitData = array_merge($rankCitData, array("2014Rank" => $row["CitPerFacRank"]));
					$scoreCitData = array_merge($scoreCitData, array("2014Score" => $row["CitPerFacScore"]));
					
					$rankIFData = array_merge($rankIFData, array("2014Rank" => $row["IntFacRank"]));
					$scoreIFData = array_merge($scoreIFData, array("2014Score" => $row["IntFacScore"]));
					
					$rankISData = array_merge($rankISData, array("2014Rank" => $row["IntStudRank"]));
					$scoreISData = array_merge($scoreISData, array("2014Score" => $row["IntStudScore"]));
				}
				
				if($row["Year1"] == "2015") {
					$rankData = array_merge($rankData, array("2015Rank" => $row["Rank1"]));
					$scoreData = array_merge($scoreData, array("2015Score" => $row["OverallScore"]));
					
					$rankAcadData = array_merge($rankAcadData, array("2015Rank" => $row["AcadRepRank"]));
					$scoreAcadData = array_merge($scoreAcadData, array("2015Score" => $row["AcadRepScore"]));
					
					$rankEmpData = array_merge($rankEmpData, array("2015Rank" => $row["EmpRepRank"]));
					$scoreEmpData = array_merge($scoreEmpData, array("2015Score" => $row["EmpRepScore"]));
					
					$rankFSData = array_merge($rankFSData, array("2015Rank" => $row["FacStudRank"]));
					$scoreFSData = array_merge($scoreFSData, array("2015Score" => $row["FacStudScore"]));
					
					$rankCitData = array_merge($rankCitData, array("2015Rank" => $row["CitPerFacRank"]));
					$scoreCitData = array_merge($scoreCitData, array("2015Score" => $row["CitPerFacScore"]));
					
					$rankIFData = array_merge($rankIFData, array("2015Rank" => $row["IntFacRank"]));
					$scoreIFData = array_merge($scoreIFData, array("2015Score" => $row["IntFacScore"]));
					
					$rankISData = array_merge($rankISData, array("2015Rank" => $row["IntStudRank"]));
					$scoreISData = array_merge($scoreISData, array("2015Score" => $row["IntStudScore"]));
				}
				
				if($row["Year1"] == "2016") {
					$rankData = array_merge($rankData, array("2016Rank" => $row["Rank1"]));
					$scoreData = array_merge($scoreData, array("2016Score" => $row["OverallScore"]));
					
					$rankAcadData = array_merge($rankAcadData, array("2016Rank" => $row["AcadRepRank"]));
					$scoreAcadData = array_merge($scoreAcadData, array("2016Score" => $row["AcadRepScore"]));
					
					$rankEmpData = array_merge($rankEmpData, array("2016Rank" => $row["EmpRepRank"]));
					$scoreEmpData = array_merge($scoreEmpData, array("2016Score" => $row["EmpRepScore"]));
					
					$rankFSData = array_merge($rankFSData, array("2016Rank" => $row["FacStudRank"]));
					$scoreFSData = array_merge($scoreFSData, array("2016Score" => $row["FacStudScore"]));
					
					$rankCitData = array_merge($rankCitData, array("2016Rank" => $row["CitPerFacRank"]));
					$scoreCitData = array_merge($scoreCitData, array("2016Score" => $row["CitPerFacScore"]));
					
					$rankIFData = array_merge($rankIFData, array("2016Rank" => $row["IntFacRank"]));
					$scoreIFData = array_merge($scoreIFData, array("2016Score" => $row["IntFacScore"]));
					
					$rankISData = array_merge($rankISData, array("2016Rank" => $row["IntStudRank"]));
					$scoreISData = array_merge($scoreISData, array("2016Score" => $row["IntStudScore"]));
				}
				
				if($row["Year1"] == "2017") {
					$rankData = array_merge($rankData, array("2017Rank" => $row["Rank1"]));
					$scoreData = array_merge($scoreData, array("2017Score" => $row["OverallScore"]));
					
					$rankAcadData = array_merge($rankAcadData, array("2017Rank" => $row["AcadRepRank"]));
					$scoreAcadData = array_merge($scoreAcadData, array("2017Score" => $row["AcadRepScore"]));
					
					$rankEmpData = array_merge($rankEmpData, array("2017Rank" => $row["EmpRepRank"]));
					$scoreEmpData = array_merge($scoreEmpData, array("2017Score" => $row["EmpRepScore"]));
					
					$rankFSData = array_merge($rankFSData, array("2017Rank" => $row["FacStudRank"]));
					$scoreFSData = array_merge($scoreFSData, array("2017Score" => $row["FacStudScore"]));
					
					$rankCitData = array_merge($rankCitData, array("2017Rank" => $row["CitPerFacRank"]));
					$scoreCitData = array_merge($scoreCitData, array("2017Score" => $row["CitPerFacScore"]));
					
					$rankIFData = array_merge($rankIFData, array("2017Rank" => $row["IntFacRank"]));
					$scoreIFData = array_merge($scoreIFData, array("2017Score" => $row["IntFacScore"]));
					
					$rankISData = array_merge($rankISData, array("2017Rank" => $row["IntStudRank"]));
					$scoreISData = array_merge($scoreISData, array("2017Score" => $row["IntStudScore"]));
				}		
			}
			
			
			
			$yearArr = array("2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017");
			
			while ($row = mysqli_fetch_array($QSData)) {
				
				foreach($yearArr as $y) {
					
					if($row["Year1"] == $y) {
						$QSRankData = array_merge($QSRankData, array($y . "Rank" => $row["Rank1"]));
						$QSScoreData = array_merge($QSScoreData, array($y . "Score" => $row["OverallScore"]));
						//$Year = array_merge($Year, array("Year1" => $row["Year1"]));
					}
				
				}
			}
			
			while ($row = mysqli_fetch_array($ARWUData)) {
				
				foreach($yearArr as $y) {
					
					if($row["Year1"] == $y) {
						$ARWURankData = array_merge($ARWURankData, array($y . "Rank" => $row["Rank1"]));
						$ARWUScoreData = array_merge($ARWUScoreData, array($y . "Score" => $row["TotalScore"]));
					}
					
				}
			}
			
			while ($row = mysqli_fetch_array($THEData)) {
				
				foreach($yearArr as $y) {
					
					if($row["Year1"] == $y) {
						$THERankData = array_merge($THERankData, array($y . "Rank" => $row["Rank1"]));
						$THEScoreData = array_merge($THEScoreData, array($y . "Score" => $row["OverallScore"]));
					}
					
				}
			}
			
			while ($row = mysqli_fetch_array($USNewsData)) {
				
				foreach($yearArr as $y) {
					if($row["Year1"] == $y) {
						$USNewsRankData = array_merge($USNewsRankData, array($y . "Rank" => $row["GlobalRank"]));
						$USNewsScoreData = array_merge($USNewsScoreData, array($y . "Score" => $row["GlobalScore"]));
					}
				}
			}
			
			
			
			
			
			
			$inSQL = "INSERT INTO QSOverall (Institution, 2009Rank, 2010Rank, 2011Rank, 2012Rank, 2013Rank, 2014Rank, 2015Rank, 2016Rank, 2017Rank, 2009Score, 2010Score, 2011Score, 2012Score, 2013Score, 2014Score, 2015Score, 2016Score, 2017Score)
			VALUES (\"" . $uniName . "\",\"" . $rankData["2009Rank"] . "\",\"" . $rankData["2010Rank"] . "\",\"" . $rankData["2011Rank"] . "\",\"" . $rankData["2012Rank"] . "\",\"" . $rankData["2013Rank"] . "\",\"" . $rankData["2014Rank"] . "\",\"" . $rankData["2015Rank"] . "\",\"" . $rankData["2016Rank"] . "\",\"" . $rankData["2017Rank"] 
			 . "\",\"" . $scoreData["2009Score"] . "\",\"" . $scoreData["2010Score"] . "\",\"" . $scoreData["2011Score"] . "\",\"" . $scoreData["2012Score"] . "\",\"" . $scoreData["2013Score"] . "\",\"" . $scoreData["2014Score"] . "\",\"" . $scoreData["2015Score"] . "\",\"" . $scoreData["2016Score"] . "\",\"" . $scoreData["2017Score"] ."\");";
			
			$inSQL2 = "INSERT INTO QSAcad (Institution, 2009Rank, 2010Rank, 2011Rank, 2012Rank, 2013Rank, 2014Rank, 2015Rank, 2016Rank, 2017Rank, 2009Score, 2010Score, 2011Score, 2012Score, 2013Score, 2014Score, 2015Score, 2016Score, 2017Score)
			VALUES (\"" . $uniName . "\",\"" . $rankAcadData["2009Rank"] . "\",\"" . $rankAcadData["2010Rank"] . "\",\"" . $rankAcadData["2011Rank"] . "\",\"" . $rankAcadData["2012Rank"] . "\",\"" . $rankAcadData["2013Rank"] . "\",\"" . $rankAcadData["2014Rank"] . "\",\"" . $rankAcadData["2015Rank"] . "\",\"" . $rankAcadData["2016Rank"] . "\",\"" . $rankAcadData["2017Rank"] 
			 . "\",\"" . $scoreAcadData["2009Score"] . "\",\"" . $scoreAcadData["2010Score"] . "\",\"" . $scoreAcadData["2011Score"] . "\",\"" . $scoreAcadData["2012Score"] . "\",\"" . $scoreAcadData["2013Score"] . "\",\"" . $scoreAcadData["2014Score"] . "\",\"" . $scoreAcadData["2015Score"] . "\",\"" . $scoreAcadData["2016Score"] . "\",\"" . $scoreAcadData["2017Score"] ."\");";
			
			$inSQL3 = "INSERT INTO QSEmp (Institution, 2009Rank, 2010Rank, 2011Rank, 2012Rank, 2013Rank, 2014Rank, 2015Rank, 2016Rank, 2017Rank, 2009Score, 2010Score, 2011Score, 2012Score, 2013Score, 2014Score, 2015Score, 2016Score, 2017Score)
			VALUES (\"" . $uniName . "\",\"" . $rankEmpData["2009Rank"] . "\",\"" . $rankEmpData["2010Rank"] . "\",\"" . $rankEmpData["2011Rank"] . "\",\"" . $rankEmpData["2012Rank"] . "\",\"" . $rankEmpData["2013Rank"] . "\",\"" . $rankEmpData["2014Rank"] . "\",\"" . $rankEmpData["2015Rank"] . "\",\"" . $rankEmpData["2016Rank"] . "\",\"" . $rankEmpData["2017Rank"] 
			 . "\",\"" . $scoreEmpData["2009Score"] . "\",\"" . $scoreEmpData["2010Score"] . "\",\"" . $scoreEmpData["2011Score"] . "\",\"" . $scoreEmpData["2012Score"] . "\",\"" . $scoreEmpData["2013Score"] . "\",\"" . $scoreEmpData["2014Score"] . "\",\"" . $scoreEmpData["2015Score"] . "\",\"" . $scoreEmpData["2016Score"] . "\",\"" . $scoreEmpData["2017Score"] ."\");";
			
			$inSQL4 = "INSERT INTO QSFacStud (Institution, 2009Rank, 2010Rank, 2011Rank, 2012Rank, 2013Rank, 2014Rank, 2015Rank, 2016Rank, 2017Rank, 2009Score, 2010Score, 2011Score, 2012Score, 2013Score, 2014Score, 2015Score, 2016Score, 2017Score)
			VALUES (\"" . $uniName . "\",\"" . $rankFSData["2009Rank"] . "\",\"" . $rankFSData["2010Rank"] . "\",\"" . $rankFSData["2011Rank"] . "\",\"" . $rankFSData["2012Rank"] . "\",\"" . $rankFSData["2013Rank"] . "\",\"" . $rankFSData["2014Rank"] . "\",\"" . $rankFSData["2015Rank"] . "\",\"" . $rankFSData["2016Rank"] . "\",\"" . $rankFSData["2017Rank"] 
			 . "\",\"" . $scoreFSData["2009Score"] . "\",\"" . $scoreFSData["2010Score"] . "\",\"" . $scoreFSData["2011Score"] . "\",\"" . $scoreFSData["2012Score"] . "\",\"" . $scoreFSData["2013Score"] . "\",\"" . $scoreFSData["2014Score"] . "\",\"" . $scoreFSData["2015Score"] . "\",\"" . $scoreFSData["2016Score"] . "\",\"" . $scoreFSData["2017Score"] ."\");";
			
			$inSQL5 = "INSERT INTO QSCit (Institution, 2009Rank, 2010Rank, 2011Rank, 2012Rank, 2013Rank, 2014Rank, 2015Rank, 2016Rank, 2017Rank, 2009Score, 2010Score, 2011Score, 2012Score, 2013Score, 2014Score, 2015Score, 2016Score, 2017Score)
			VALUES (\"" . $uniName . "\",\"" . $rankCitData["2009Rank"] . "\",\"" . $rankCitData["2010Rank"] . "\",\"" . $rankCitData["2011Rank"] . "\",\"" . $rankCitData["2012Rank"] . "\",\"" . $rankCitData["2013Rank"] . "\",\"" . $rankCitData["2014Rank"] . "\",\"" . $rankCitData["2015Rank"] . "\",\"" . $rankCitData["2016Rank"] . "\",\"" . $rankCitData["2017Rank"] 
			 . "\",\"" . $scoreCitData["2009Score"] . "\",\"" . $scoreCitData["2010Score"] . "\",\"" . $scoreCitData["2011Score"] . "\",\"" . $scoreCitData["2012Score"] . "\",\"" . $scoreCitData["2013Score"] . "\",\"" . $scoreCitData["2014Score"] . "\",\"" . $scoreCitData["2015Score"] . "\",\"" . $scoreCitData["2016Score"] . "\",\"" . $scoreCitData["2017Score"] ."\");";
			
			$inSQL6 = "INSERT INTO QSIntFac (Institution, 2009Rank, 2010Rank, 2011Rank, 2012Rank, 2013Rank, 2014Rank, 2015Rank, 2016Rank, 2017Rank, 2009Score, 2010Score, 2011Score, 2012Score, 2013Score, 2014Score, 2015Score, 2016Score, 2017Score)
			VALUES (\"" . $uniName . "\",\"" . $rankIFData["2009Rank"] . "\",\"" . $rankIFData["2010Rank"] . "\",\"" . $rankIFData["2011Rank"] . "\",\"" . $rankIFData["2012Rank"] . "\",\"" . $rankIFData["2013Rank"] . "\",\"" . $rankIFData["2014Rank"] . "\",\"" . $rankIFData["2015Rank"] . "\",\"" . $rankIFData["2016Rank"] . "\",\"" . $rankIFData["2017Rank"] 
			 . "\",\"" . $scoreIFData["2009Score"] . "\",\"" . $scoreIFData["2010Score"] . "\",\"" . $scoreIFData["2011Score"] . "\",\"" . $scoreIFData["2012Score"] . "\",\"" . $scoreIFData["2013Score"] . "\",\"" . $scoreIFData["2014Score"] . "\",\"" . $scoreIFData["2015Score"] . "\",\"" . $scoreIFData["2016Score"] . "\",\"" . $scoreIFData["2017Score"] ."\");";
			
			$inSQL7 = "INSERT INTO QSIntStud (Institution, 2009Rank, 2010Rank, 2011Rank, 2012Rank, 2013Rank, 2014Rank, 2015Rank, 2016Rank, 2017Rank, 2009Score, 2010Score, 2011Score, 2012Score, 2013Score, 2014Score, 2015Score, 2016Score, 2017Score)
			VALUES (\"" . $uniName . "\",\"" . $rankISData["2009Rank"] . "\",\"" . $rankISData["2010Rank"] . "\",\"" . $rankISData["2011Rank"] . "\",\"" . $rankISData["2012Rank"] . "\",\"" . $rankISData["2013Rank"] . "\",\"" . $rankISData["2014Rank"] . "\",\"" . $rankISData["2015Rank"] . "\",\"" . $rankISData["2016Rank"] . "\",\"" . $rankISData["2017Rank"] 
			 . "\",\"" . $scoreISData["2009Score"] . "\",\"" . $scoreISData["2010Score"] . "\",\"" . $scoreISData["2011Score"] . "\",\"" . $scoreISData["2012Score"] . "\",\"" . $scoreISData["2013Score"] . "\",\"" . $scoreISData["2014Score"] . "\",\"" . $scoreISData["2015Score"] . "\",\"" . $scoreISData["2016Score"] . "\",\"" . $scoreISData["2017Score"] ."\");";
			
			//echo $inSQL;
			
			
			foreach($yearArr as $y) {
				
				$inSQL8 = "INSERT INTO RankingComp (Institution, QSRank, THERank, ARWURank, USNewsRank, QSScore, THEScore, ARWUScore, USNewsScore, Year1)
				VALUES (\"" . $uniName . "\",\"" . $QSRankData[$y."Rank"] . "\",\"" . $THERankData[$y."Rank"] . "\",\"" . $ARWURankData[$y."Rank"] . "\",\"" . $USNewsRankData[$y."Rank"]
				. "\",\"" . $QSScoreData[$y."Score"] . "\",\"" . $THEScoreData[$y."Score"] . "\",\"" . $ARWUScoreData[$y."Score"] . "\",\"" . $USNewsScoreData[$y."Score"] . "\",\"" . $y ."\");";
				
				
				mysqli_query($dbh, $inSQL8)
				or die (mysqli_error($dbh));
			
			}
			
			
			
			
				
				
			
			mysqli_query($dbh, $inSQL)
				or die (mysqli_error($dbh));
			
			mysqli_query($dbh, $inSQL2)
				or die (mysqli_error($dbh));
			
			mysqli_query($dbh, $inSQL3)
				or die (mysqli_error($dbh));
			
			mysqli_query($dbh, $inSQL4)
				or die (mysqli_error($dbh));
			
			mysqli_query($dbh, $inSQL5)
				or die (mysqli_error($dbh));
			
			mysqli_query($dbh, $inSQL6)
				or die (mysqli_error($dbh));
			
			mysqli_query($dbh, $inSQL7)
				or die (mysqli_error($dbh));
			
			
			$data->Close(); 
			$dbh->Close(); 
			$data = null; 
			$dbh = null;
			
			if(isMobile()) {
				echo "Inserted. <a href=\"http://www.svbook.com/Test/QSBI/mobile/index.php?y=2017\"> Go Back</a>";
			}
			
			else
				echo "Inserted. <a href=\"http://www.svbook.com/Test/QSBI/index2.php?y=2017\"> Go Back</a>";
			
			//redirect("http://www.svbook.com/Test/QSBI/index.php");
			
		}
	}
	
	else {
		$dbh->Close(); 
		//$data = null; 
		$dbh = null;
		redirect("/Test/QSBI/index.php");
	}

	
	function redirect($url, $statusCode = 303)
	{
		header('Location: ' . $url, true, $statusCode);
		die();
	}
	
	//Ref: https://stackoverflow.com/questions/4117555/simplest-way-to-detect-a-mobile-device
	function isMobile() {
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
?>