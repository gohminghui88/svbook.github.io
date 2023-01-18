<?php

	function generateTable($SQLTable, $tableName) {
		$json = file_get_contents("http://www.svbook.com/Test/QSBI/api.php?q=".$SQLTable);
		$json = utf8_encode($json);
		$results = json_decode($json, true);
				
		//$tableName = "QSOverall";
				
		echo "<tr><td><b></b></td><td colspan=9><b>" . $tableName . " Rank</b></td><td colspan=9><b>" . $tableName . " Score</b></td></tr>";
		echo "<tr><td><b>Institution Name</b></td><td><b>2009</b></td><td><b>2010</b></td><td><b>2011</b></td><td><b>2012</b></td><td><b>2013</b></td><td><b>2014</b></td><td><b>2015</b></td><td><b>2016</b></td><td><b>2017</b></td><td><b>2009</b></td><td><b>2010</b></td><td><b>2011</b></td><td><b>2012</b></td><td><b>2013</b></td><td><b>2014</b></td><td><b>2015</b></td><td><b>2016</b></td><td><b>2017</b></td></tr>";
					
		foreach($results as $row) {
			echo "<tr><td>" . $row["Institution"] . "</td><td>" . $row["rank2009"] . "</td><td>" . $row["rank2010"] . "</td><td>" . $row["rank2011"] . "</td><td>" . $row["rank2012"] . "</td><td>" . $row["rank2013"] . "</td><td>" . $row["rank2014"] . "</td><td>" . $row["rank2015"] . "</td><td>" . $row["rank2016"] . "</td><td>" . $row["rank2017"] . "</td><td>" . $row["score2009"] . "</td><td>" . $row["score2010"] . "</td><td>" . $row["score2011"] . "</td><td>" . $row["score2012"] . "</td><td>" . $row["score2013"] . "</td><td>" . $row["score2014"] . "</td><td>" . $row["score2015"] . "</td><td>" . $row["score2016"] . "</td><td>" . $row["score2017"] . "</td></tr>";					
		}
	}
	
	function generateRankingTable($year, $tableName) {
		$json = file_get_contents("http://www.svbook.com/Test/QSBI/api2.php?y=".$year);
		$json = utf8_encode($json);
		$results = json_decode($json, true);
				
		//$tableName = "QSOverall";
				
		echo "<tr><td><b></b></td><td colspan=4><b>" . $tableName . " Rank</b></td><td colspan=4><b>" . $tableName . " Score</b></td><td><b></b></td></tr>";
		echo "<tr><td><b>Institution Name</b></td><td><b>QS</b></td><td><b>THE</b></td><td><b>ARWU</b></td><td><b>USNews</b></td><td><b>QS</b></td><td><b>THE</b></td><td><b>ARWU</b></td><td><b>USNews</b></td><td><b>Year</b></td></tr>";
					
		foreach($results as $row) {
			echo "<tr><td>" . $row["Institution"] . "</td><td>" . $row["QSRank"] . "</td><td>" . $row["THERank"] . "</td><td>" . $row["ARWURank"] . "</td><td>" . $row["USNewsRank"] . "</td><td>" . $row["QSScore"] . "</td><td>" . $row["THEScore"] . "</td><td>" . $row["ARWUScore"] . "</td><td>" . $row["USNewsScore"] . "</td><td>" . $row["Year1"] . "</td></tr>";					
		}
	}
	
	//Ref: https://stackoverflow.com/questions/11814674/using-pchart-for-the-first-time
	//Ref: http://www.wfas.net/nfdr/graphing/examples/#
	function generateChart($SQLTable,$type, $chartType) {
		
		require_once("pChart/class/pData.class.php");
		require_once("pChart/class/pDraw.class.php");
		require_once("pChart/class/pImage.class.php");
	
		$json = file_get_contents("http://www.svbook.com/Test/QSBI/api.php?q=".$SQLTable);
		$json = utf8_encode($json);
		$results = json_decode($json, true);
		
		$chartData = new pData();
		
		foreach($results as $row) {
			
			$myData = "";
			
			if($type == "rank")
				$myData = array($row["rank2009"] * (-1), $row["rank2010"] * (-1), $row["rank2011"] * (-1), $row["rank2012"] * (-1), $row["rank2013"] * (-1), $row["rank2014"] * (-1), $row["rank2015"] * (-1), $row["rank2016"] * (-1), $row["rank2017"] * (-1));
			
			else if($type == "score")
				$myData = array($row["score2009"], $row["score2010"], $row["score2011"], $row["score2012"], $row["score2013"], $row["score2014"], $row["score2015"], $row["score2016"], $row["score2017"]);
			
			
			$chartData -> addPoints($myData, $row["Institution"]);
			$chartData -> setSerieWeight($row["Institution"], 2); 
		}
		
		$chartData -> addPoints(array("2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017"), "Labels");
		$chartData->setSerieDescription("Labels","Years"); 
		$chartData->setAbscissa("Labels"); 
		
		$myImage = new pImage(1000, 600, $chartData);
		$myImage -> setGraphArea(25, 25, 900, 500);
		$myImage -> drawScale();
		
		//$myImage->drawText(150,35,$type,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE)); 
		$myImage->setFontProperties(array("FontName"=>"fonts/Forgotte.ttf","FontSize"=>11));
		
		
		if($chartType == "line")
			$myImage -> drawLineChart(array("DisplayValues"=>TRUE,"DisplayColor"=>DISPLAY_AUTO));
		
		else if($chartType == "bar")
			$myImage -> drawBarChart(array("DisplayValues"=>TRUE,"DisplayColor"=>DISPLAY_AUTO));
		
		$myImage -> drawLegend(25,550,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
		$myImage -> Render("charts/" . $SQLTable . $type . ".png");
		
		echo "<img src=\"" . "charts/" . $SQLTable . $type . ".png\"" . "/>";
	}
	
	
	function generateRankingChart($year, $type, $chartType) {
		
		require_once("pChart/class/pData.class.php");
		require_once("pChart/class/pDraw.class.php");
		require_once("pChart/class/pImage.class.php");
	
		$json = file_get_contents("http://www.svbook.com/Test/QSBI/api2.php?y=".$year);
		$json = utf8_encode($json);
		$results = json_decode($json, true);
		
		$chartData = new pData();
		
		foreach($results as $row) {
			
			$myData = "";
			
			if($type == "rank")
				$myData = array($row["QSRank"] * (-1), $row["THERank"] * (-1), $row["ARWURank"] * (-1), $row["USNewsRank"] * (-1));
			
			else if($type == "score")
				$myData = array($row["QSScore"], $row["THEScore"], $row["ARWUScore"], $row["USNewsScore"]);
			
			
			$chartData -> addPoints($myData, $row["Institution"]);
			$chartData -> setSerieWeight($row["Institution"], 2); 
		}
		
		$chartData -> addPoints(array("QS", "THE", "ARWU", "USNews"), "Labels");
		$chartData->setSerieDescription("Labels","WUR"); 
		$chartData->setAbscissa("Labels"); 
		
		$myImage = new pImage(1000, 600, $chartData);
		$myImage -> setGraphArea(25, 25, 900, 500);
		$myImage -> drawScale();
		
		//$myImage->drawText(150,35,$type,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE)); 
		$myImage->setFontProperties(array("FontName"=>"fonts/Forgotte.ttf","FontSize"=>11));
		
		
		if($chartType == "line")
			$myImage -> drawLineChart(array("DisplayValues"=>TRUE,"DisplayColor"=>DISPLAY_AUTO));
		
		else if($chartType == "bar")
			$myImage -> drawBarChart(array("DisplayValues"=>TRUE,"DisplayColor"=>DISPLAY_AUTO));
		
		$myImage -> drawLegend(25,550,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
		$myImage -> Render("charts/" . "RankingComp" . $year . $type . ".png");
		
		echo "<img src=\"" . "charts/" . "RankingComp" . $year . $type . ".png\"" . "/>";
	
	}
	
?>