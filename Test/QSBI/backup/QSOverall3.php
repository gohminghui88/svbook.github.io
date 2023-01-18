<!DOCTYPE html>
<html>

<head>
	<title>QS University BI</title>
</head>


<style>
</style>

<body>

<h1>QSWUR Dashboard (Overall) </h1>

<p>| <a href="index.php">Main</a> | <a href="QSOverall.php">Overall</a> | <a href="QSAcad.php">Academic Reputation</a> | <a href="QSEmp.php">Employer Reputation</a> | <a href="QSFacStud.php">Faculty Student Ratio</a> | <a href="QSCit.php">Citations Per Faculty</a> | <a href="QSIntFac.php">International Faculty</a> | <a href="QSIntStud.php">International Student</a> | </p>
<br />
<br />

<form method="get" action="http://www.svbook.com/Test/QSBI/insert.php">

	<label for="uniName">University Name: </label>
	<input type="text" id="uniName" name="uniName"/>
	<input type="submit" id="add" value="Add"/>
	<button type="submit" formaction="http://www.svbook.com/Test/QSBI/delete.php">Delete</button>

</form>

<br />
<br />

<style>
		.chart-container {
				width: 640px;
				height: auto;
			}	
</style>

<?php
	
	
	//Variables Declarations
	$servername = "localhost";
	$username = "ztecgqgv_ericgoh";
	$password = "1987gMh@nus";
	$dbname = "ztecgqgv_qswur";

	$sql2017  = "SELECT * FROM QSOverall;";
	
	
	// Create connection
	$dbh = mysqli_connect($servername, $username, $password, $dbname)
     or die ('cannot connect to database because ' . mysqli_connect_error());
	 
	
	//run the query
	$data = mysqli_query($dbh, $sql2017)
		or die (mysqli_error($dbh));

	
	echo "<table id=\"rankTable2017\" border=1>";
	echo "<tr><td><b></b></td><td colspan=7><b>Overall Rank</b></td><td colspan=7><b>Overall Score</b></td></tr>";
	echo "<tr><td><b>Institution Name</b></td><td><b>2011</b></td><td><b>2012</b></td><td><b>2013</b></td><td><b>2014</b></td><td><b>2015</b></td><td><b>2016</b></td><td><b>2017</b></td><td><b>2011</b></td><td><b>2012</b></td><td><b>2013</b></td><td><b>2014</b></td><td><b>2015</b></td><td><b>2016</b></td><td><b>2017</b></td></tr>";
	
	while ($row = mysqli_fetch_array($data)) {
	
		echo "<tr>";
		echo "<td>" . $row["Institution"] . "</td>";
	
		echo "<td>" . $row["2011Rank"] . "</td>";
		echo "<td>" . $row["2012Rank"] . "</td>";
		echo "<td>" . $row["2013Rank"] . "</td>";
		echo "<td>" . $row["2014Rank"] . "</td>";
		echo "<td>" . $row["2015Rank"] . "</td>";
		echo "<td>" . $row["2016Rank"] . "</td>";
		echo "<td>" . $row["2017Rank"] . "</td>";
	
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
	
?>	
	<br /><br />
	<h4>Overall (Rank)</h4><br />
	<div class="chart-container">
		<canvas id="mycanvas"></canvas>
	</div>
	
	<br /><br />
	<h4>Overall (Score)</h4><br />
	<div class="chart-container">
		<canvas id="mycanvas2"></canvas>
	</div>

	<!-- javascript -->
    <script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/Chart.min.js"></script>
    
	
	<script>
		
		//Ref: https://www.dyclassroom.com/chartjs/chartjs-how-to-draw-line-graph-using-data-from-mysql-table-and-php
		//Ref: http://microbuilder.io/blog/2016/01/10/plotting-json-data-with-chart-js.html
		//Ref: https://www.electrictoolbox.com/jquery-load-json-data/
		
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "http://www.svbook.com/Test/QSBI/api.php?q=QSOverall", //Relative or absolute path to response.php file
			success: function(data) {
                //alert(data[0].rank2011);
				/*  
				for(var i in data) {
					userid.push("UserID " + data[i].userid);
					facebook_follower.push(data[i].facebook);
					twitter_follower.push(data[i].twitter);
					googleplus_follower.push(data[i].googleplus);
				}
				*/
				var firstData = [data[0].rank2011 * (-1), data[0].rank2012 * (-1), data[0].rank2013 * (-1), data[0].rank2014 * (-1), data[0].rank2015 * (-1), data[0].rank2016 * (-1), data[0].rank2017 * (-1)];
				var years = ["2011","2012", "2013", "2014", "2015", "2016", "2017"];
				var chartdata = {
					labels: years,
					datasets: [
						{
							label: data[0].Institution,
							fill: false,
							lineTension: 0.1,
							//backgroundColor: "rgba(59, 89, 152, 0.75)",
							borderColor: getRandomColor(),
							//pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
							//pointHoverBorderColor: "rgba(59, 89, 152, 1)",
							//axisY:{reversed:  true},
							data: firstData
						}
					]
				};
				
				
				var ctx = $("#mycanvas");

				var LineGraph = new Chart(ctx, {
					type: 'line',
					data: chartdata,
					//tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value*-1 %>"
				});
				
				//Ref: https://stackoverflow.com/questions/31059399/how-to-push-datasets-dynamically-for-chart-js-bar-chart
				for(var i in data) {
					
					//alert(i);
					
					if(i != 0) {
						//alert(i);
						var otherData = [data[i].rank2011 * (-1), data[i].rank2012 * (-1), data[i].rank2013 * (-1), data[i].rank2014 * (-1), data[i].rank2015 * (-1), data[i].rank2016 * (-1), data[i].rank2017 * (-1)];
						//var rand = Math.floor((Math.random() * 255) + 1);
						
						LineGraph.data.datasets.push({
							
							label: data[i].Institution,
							fill: false,
							lineTension: 0.1,
							//backgroundColor: "rgba(59, 89, 152, 0.75)",
							borderColor: getRandomColor(),
							//pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
							//pointHoverBorderColor: "rgba(59, 89, 152, 1)",
							//axisY:{reversed:  true},
							data: otherData
						});
						
						
					}
					
				}
				
				LineGraph.update();
				
				
				
				
				
				var firstScore = [data[0].score2011, data[0].score2012, data[0].score2013, data[0].score2014, data[0].score2015, data[0].score2016, data[0].score2017];
				var chartdata2 = {
					labels: years,
					datasets: [
						{
							label: data[0].Institution,
							fill: false,
							lineTension: 0.1,
							//backgroundColor: "rgba(29, 202, 255, 0.75)",
							borderColor: getRandomColor(),
							//pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
							//pointHoverBorderColor: "rgba(29, 202, 255, 1)",
							data: firstScore
						}
					]
				};
				
				
				var ctx2 = $("#mycanvas2");

				var LineGraph2 = new Chart(ctx2, {
					type: 'line',
					data: chartdata2, 
					//tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value*-1 %>"
				});
				
				
				for(var i in data) {
					
					if(i != 0) {
						var otherScore = [data[i].score2011, data[i].score2012, data[i].score2013, data[i].score2014, data[i].score2015, data[i].score2016, data[i].score2017];
						
						LineGraph2.data.datasets.push({
							label: data[i].Institution,
							fill: false,
							lineTension: 0.1,
							//backgroundColor: "rgba(29, 202, 255, 0.75)",
							borderColor: getRandomColor(),
							//pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
							//pointHoverBorderColor: "rgba(29, 202, 255, 1)",
							data: otherScore
						});
					}
				}
				
				LineGraph2.update();
				
				
			}
        });

        //Ref: https://stackoverflow.com/questions/31243892/random-fill-colors-in-chart-js
		function getRandomColor() {
			var letters = '0123456789ABCDEF'.split('');
			var color = '#';
			for (var i = 0; i < 6; i++ ) {
				color += letters[Math.floor(Math.random() * 16)];
			}
			return color;
		}
		/*

		var jsonData = $.ajax({
			url: 'http://www.svbook.com/Test/QSBI/api.php',
			dataType: 'json',
		}).done(function (results) {
			alert(result);
		});
		
		alert(jsonData);
		*/
	
	</script>
	
	
	

</body>

</html>