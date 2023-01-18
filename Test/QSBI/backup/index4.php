<!DOCTYPE html>
<html>

<head>
	<title>QS University BI</title>
</head>


<style>
		.chart-container {
			width: 640px;
			height: auto;
		}

		table {
			padding-top: 10px;
			padding-right: 10px;
			padding-bottom: 10px;
			padding-left: 10px;
		}
		
</style>

<body>

<h1>QSWUR Dashboard (Main) </h1>

<p>| <a href="index.php">Main</a> | <a href="QSOverall.php">Overall</a> | <a href="QSAcad.php">Academic Reputation</a> | <a href="QSEmp.php">Employer Reputation</a> | <a href="QSFacStud.php">Faculty Student Ratio</a> | <a href="QSCit.php">Citations Per Faculty</a> | <a href="QSIntFac.php">International Faculty</a> | <a href="QSIntStud.php">International Student</a> | </p>
<br />
<br />


<table border="0">

<tr>

<td valign="top">
<?php
	function getContent($url, $start, $end) {

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$result = curl_exec($ch) or die("Couldn't connect to $url.");

		curl_close($ch);
		
		$startposition = strpos($result, $start);
	
		if ($startposition > 0) {

			//echo $result;
			$startposition = strpos($result, $start);
			$endposition = strpos($result, $end, $startposition);

			//add enough chars to include the tag
			$endposition += strlen($end);
			$length = $endposition - $startposition;
			$result = substr($result, $startposition, $length);
			$result = substr($result, 0, -17);

			//replace links to go to store.user2
			$result = str_replace('<form action="/basket.php"', '<form action="http://store.user2.net/basket.php"', $result);
			return $result;
		}

		else
			return "<center><h3>Not found - try again later.</h3></center>";
	}
	
	
	function getTable($SQLTableName, $QSTableName) {
		//Variables Declarations
		$servername = "localhost";
		$username = "ztecgqgv_ericgoh";
		$password = "1987gMh@nus";
		$dbname = "ztecgqgv_qswur";

		$sql2017  = "SELECT * FROM " . $SQLTableName . ";";
	
	
		// Create connection
		$dbh = mysqli_connect($servername, $username, $password, $dbname)
			or die ('cannot connect to database because ' . mysqli_connect_error());
	 
	
		//run the query
		$data = mysqli_query($dbh, $sql2017)
			or die (mysqli_error($dbh));

	
		echo "<table id=\"".$QSTableName."\" border=1>";
		echo "<tr><td><b></b></td><td colspan=9><b>".$QSTableName." Rank</b></td><td colspan=9><b>".$QSTableName." Score</b></td></tr>";
		echo "<tr><td><b>Institution Name</b></td><td><b>2009</b></td><td><b>2010</b></td><td><b>2011</b></td><td><b>2012</b></td><td><b>2013</b></td><td><b>2014</b></td><td><b>2015</b></td><td><b>2016</b></td><td><b>2017</b></td><td><b>2009</b></td><td><b>2010</b></td><td><b>2011</b></td><td><b>2012</b></td><td><b>2013</b></td><td><b>2014</b></td><td><b>2015</b></td><td><b>2016</b></td><td><b>2017</b></td></tr>";
	
		while ($row = mysqli_fetch_array($data)) {
	
			echo "<tr>";
			echo "<td>" . $row["Institution"] . "</td>";
			
			echo "<td>" . $row["2009Rank"] . "</td>";
			echo "<td>" . $row["2010Rank"] . "</td>";
			echo "<td>" . $row["2011Rank"] . "</td>";
			echo "<td>" . $row["2012Rank"] . "</td>";
			echo "<td>" . $row["2013Rank"] . "</td>";
			echo "<td>" . $row["2014Rank"] . "</td>";
			echo "<td>" . $row["2015Rank"] . "</td>";
			echo "<td>" . $row["2016Rank"] . "</td>";
			echo "<td>" . $row["2017Rank"] . "</td>";
			
			echo "<td>" . $row["2009Score"] . "</td>";
			echo "<td>" . $row["2010Score"] . "</td>";
			echo "<td>" . $row["2011Score"] . "</td>";
			echo "<td>" . $row["2012Score"] . "</td>";
			echo "<td>" . $row["2013Score"] . "</td>";
			echo "<td>" . $row["2014Score"] . "</td>";
			echo "<td>" . $row["2015Score"] . "</td>";
			echo "<td>" . $row["2016Score"] . "</td>";
			echo "<td>" . $row["2017Score"] . "</td>";
	
			echo "</tr>";
		
	
		}
		echo "</table>";
	
		$data->Close(); 
		$dbh->Close(); 
		$data = null; 
		$dbh = null;
	}
	
	echo getContent('http://www.svbook.com/Test/QSBI/QSOverall.php', '<form method="get" action="http://www.svbook.com/Test/QSBI/insert.php">', "<style>");
	
	echo "<br />";
	getTable("QSOverall", "Overall");
	
	echo "<br />";
	getTable("QSAcad", "Academic");
	
	echo "<br />";
	getTable("QSEmp", "Employer");
	
	echo "<br />";
	getTable("QSFacStud", "Faculty Student");
	
	echo "<br />";
	getTable("QSCit", "Citations");
	
	echo "<br />";
	getTable("QSIntFac", "International Faculty");
	
	echo "<br />";
	getTable("QSIntStud", "International Student");
	
?>
</td>

<td valign="top">

	<table border="0">
		<tr>
			<td>
				<h4>2016 Ranking </h4>
				<div class="chart-container">
					<canvas id="ntu1"></canvas>
				</div>
			
			</td>
			<td>
				<h4>QS Overall (Rank) </h4>
				<div class="chart-container">
					<canvas id="overall1"></canvas>
				</div>
			
			</td>
			<td>
				<h4>QS Academic (Rank) </h4>
				<div class="chart-container">
					<canvas id="acad1"></canvas>
				</div>
			
			</td>
			<td>
				<h4>QS Employer (Rank) </h4>
				<div class="chart-container">
					<canvas id="emp1"></canvas>
				</div>
			</td>
			
		</tr>
		<tr>
			<td>
				<h4>2016 Score </h4>
				<div class="chart-container">
					<canvas id="ntu2"></canvas>
				</div>
			
			</td>
			<td>
				<h4>QS Overall (Score) </h4>
				<div class="chart-container">
					<canvas id="overall2"></canvas>
				</div>
			
			</td>
			<td>
				<h4>QS Academic (Score) </h4>
				<div class="chart-container">
					<canvas id="acad2"></canvas>
				</div>
			</td>
			<td>
				<h4>QS Employer (Score) </h4>
				<div class="chart-container">
					<canvas id="emp2"></canvas>
				</div>
			</td>
			
		</tr>
		<tr>
			<td>
				<h4>QS Faculty Student (Rank) </h4>
				<div class="chart-container">
					<canvas id="fs1"></canvas>
				</div>
			</td>
			<td>
				<h4>QS Citations (Rank) </h4>
				<div class="chart-container">
					<canvas id="cit1"></canvas>
				</div>
			
			</td>
			<td>
				<h4>QS International Faculty (Rank) </h4>
				<div class="chart-container">
					<canvas id="if1"></canvas>
				</div>
			
			</td>
			<td>
				<h4>QS International Student (Rank) </h4>
				<div class="chart-container">
					<canvas id="is1"></canvas>
				</div>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<h4>QS Faculty Student (Score) </h4>
				<div class="chart-container">
					<canvas id="fs2"></canvas>
				</div>
			</td>
			<td>
				<h4>QS Citations (Score) </h4>
				<div class="chart-container">
					<canvas id="cit2"></canvas>
				</div>
			
			</td>
			<td>
				<h4>QS International Faculty (Score) </h4>
				<div class="chart-container">
					<canvas id="if2"></canvas>
				</div>
			
			</td>
			<td>
				<h4>QS International Student (Score) </h4>
				<div class="chart-container">
					<canvas id="is2"></canvas>
				</div>
			</td>
		</tr>
	</table>
	

</td>

</tr>	
</table>
	
	<!-- javascript -->
    <script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/Chart.min.js"></script>

	<script>
		
		function getLineChart(SQLTable, table1, table2) {
			
		//Ref: https://www.dyclassroom.com/chartjs/chartjs-how-to-draw-line-graph-using-data-from-mysql-table-and-php
		//Ref: http://microbuilder.io/blog/2016/01/10/plotting-json-data-with-chart-js.html
		//Ref: https://www.electrictoolbox.com/jquery-load-json-data/
		
		var url1 = "http://www.svbook.com/Test/QSBI/api.php?q=" + SQLTable;
		table1 = "#" + table1;
		table2 = "#" + table2;
		
		$.ajax({
			type: "POST",
			dataType: "json",
			url: url1, //Relative or absolute path to response.php file
			success: function(data) {
               
				var firstData = [data[0].rank2009 * (-1), data[0].rank2010 * (-1), data[0].rank2011 * (-1), data[0].rank2012 * (-1), data[0].rank2013 * (-1), data[0].rank2014 * (-1), data[0].rank2015 * (-1), data[0].rank2016 * (-1), data[0].rank2017 * (-1)];
				var years = ["2009", "2010", "2011","2012", "2013", "2014", "2015", "2016", "2017"];
				var chartdata = {
					labels: years,
					datasets: [
						{
							label: data[0].Institution,
							fill: false,
							lineTension: 0.1,
							borderColor: getRandomColor(),
							data: firstData
						}
					]
				};
				
				
				//var ctx = $("#mycanvas");
				var ctx = $(table1);

				var LineGraph = new Chart(ctx, {
					type: 'line',
					data: chartdata,
				});
				
				//Ref: https://stackoverflow.com/questions/31059399/how-to-push-datasets-dynamically-for-chart-js-bar-chart
				for(var i in data) {
					
					//alert(i);
					
					if(i != 0) {
						//alert(i);
						var otherData = [data[i].rank2009 * (-1), data[i].rank2010 * (-1), data[i].rank2011 * (-1), data[i].rank2012 * (-1), data[i].rank2013 * (-1), data[i].rank2014 * (-1), data[i].rank2015 * (-1), data[i].rank2016 * (-1), data[i].rank2017 * (-1)];
						
						LineGraph.data.datasets.push({
							
							label: data[i].Institution,
							fill: false,
							lineTension: 0.1,
							borderColor: getRandomColor(),
							data: otherData
						});
						
						
					}
					
				}
				
				LineGraph.update();
				
				
				var firstScore = [data[0].score2009, data[0].score2010, data[0].score2011, data[0].score2012, data[0].score2013, data[0].score2014, data[0].score2015, data[0].score2016, data[0].score2017];
				var chartdata2 = {
					labels: years,
					datasets: [
						{
							label: data[0].Institution,
							fill: false,
							lineTension: 0.1,
							borderColor: getRandomColor(),
							data: firstScore
						}
					]
				};
				
				
				//var ctx2 = $("#mycanvas2");
				var ctx2 = $(table2);

				var LineGraph2 = new Chart(ctx2, {
					type: 'line',
					data: chartdata2, 
				});
				
				
				for(var i in data) {
					
					if(i != 0) {
						var otherScore = [data[i].score2009, data[i].score2010, data[i].score2011, data[i].score2012, data[i].score2013, data[i].score2014, data[i].score2015, data[i].score2016, data[i].score2017];
						
						LineGraph2.data.datasets.push({
							label: data[i].Institution,
							fill: false,
							lineTension: 0.1,
							borderColor: getRandomColor(),
							data: otherScore
						});
					}
				}
				
				LineGraph2.update();
				
				
			}
        });
		
		
		}

        //Ref: https://stackoverflow.com/questions/31243892/random-fill-colors-in-chart-js
		function getRandomColor() {
			var letters = '0123456789ABCDEF'.split('');
			var color = '#';
			for (var i = 0; i < 6; i++ ) {
				color += letters[Math.floor(Math.random() * 16)];
			}
			return color;
		}
		
	
		getLineChart("QSOverall", "overall1", "overall2");
		getLineChart("QSAcad", "acad1", "acad2");
		getLineChart("QSEmp", "emp1", "emp2");
		getLineChart("QSFacStud", "fs1", "fs2");
		getLineChart("QSCit", "cit1", "cit2");
		getLineChart("QSIntFac", "if1", "if2");
		getLineChart("QSIntStud", "is1", "is2");
		
		
		
		var ntuDT = [-13, -54, -101, -74];
		var ntuDT2 = [91.4, 70, 0, 72.6];
		var wur = ["QS", "THE", "ARWU","USNews"];
		
		var chartdata = {
			labels: wur,
			datasets: [
				{
					label: "Nanyang Technological University",
					fill: false,
					lineTension: 0.1,
					borderColor: getRandomColor(),
					data: ntuDT
				}
			]
		};
				
				
		//var ctx = $("#mycanvas");
		var ctx = $("#ntu1");

		var LineGraph = new Chart(ctx, {
			type: 'line',
			data: chartdata,
		});
		
		
		var chartdata2 = {
			labels: wur,
			datasets: [
				{
					label: "Nanyang Technological University",
					fill: false,
					lineTension: 0.1,
					borderColor: getRandomColor(),
					data: ntuDT2
				}
			]
		};
				
				
		//var ctx = $("#mycanvas");
		var ctx2 = $("#ntu2");

		var LineGraph2 = new Chart(ctx2, {
			type: 'bar',
			data: chartdata2,
		});
		
	</script>
	
	

</body>

</html>