<!DOCTYPE html>
<html>

<head>
	<title>QS University BI</title>
	
	<!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	
</head>


<style>
	.chart-container {
		width: 640px;
		height: auto;
	}	
</style>

<body>

<header class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>QSWUR Dashboard (Ranking Comparison) </h1>
			</div>
		</div>
	</div>
</header>

	
<div class="container">
	<div class="row">
		<div class="col-12">
			
			<br />
			<br />
			<p>| <a href="index.php?y=2017">Main</a> | <a href="RankingCompTable.php?y=2017">Ranking Comparison</a> | <a href="QSTable.php?q=QSOverall">Overall</a> | <a href="QSTable.php?q=QSAcad">Academic Reputation</a> | <a href="QSTable.php?q=QSEmp">Employer Reputation</a> | <a href="QSTable.php?q=QSFacStud">Faculty Student Ratio</a> | <a href="QSTable.php?q=QSCit">Citations Per Faculty</a> | <a href="QSTable.php?q=QSIntFac">International Faculty</a> | <a href="QSTable.php?q=QSIntStud">International Student</a> | <a href="logout.php">Log Out</a> |</p>
			<br />
			<br />
			
			<hr />
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-12" id="form1">
			
			<form method="get" action="http://www.svbook.com/Test/QSBI/insert.php">

			<label for="uniName">University Name: </label>
			<input type="text" id="uniName" name="uniName" required/>
			<input type="submit" id="add" value="Add"/>
			<button type="submit" formaction="http://www.svbook.com/Test/QSBI/delete.php">Delete</button>

			</form>

			<br />
			<br />

		</div>
	</div>
</div>	
			

<?php

	include("qs.php");
	
	error_reporting(E_ALL ^ E_WARNING); 
	
	session_start();
	$email2 = "";
	$passwords2 = "";
	if (isset($_SESSION['email'])) {$email2 = $_SESSION['email']; }
	if (isset($_SESSION['pass'])) { $passwords2 = $_SESSION['pass']; }
	
	
?>	


	<div class='container'>
		
		<div class='row'>
		
			<div class='col-12 col-sm-10'>
			
				<table id="<?php echo htmlspecialchars($_GET["y"]); ?>" border=1>
				
					<form action="http://www.svbook.com/Test/QSBI/mobile/RankingCompTable.php" method="get">
			
						<select name="y">
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>
							<option value="2011">2011</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
						</select>
				
						<input type="submit" id="refresh" value="refresh"/>
			
					</form>
			
					<br /> <br />
					
					<?php
						generateRankingTable(htmlspecialchars($_GET["y"]), "World University Ranking");
					?>
				
				</table>
			
			</div>
		
		</div>
	
	</div>

	<div class="container">
	<!--<div class="container">-->
		<div class="row">
			<div class="col-12 col-sm-10">
				<br /><br />
				<h4><?php echo htmlspecialchars($_GET["y"]); ?> (Rank)</h4><br />
				<div>
					<div id="mycanvas"><?php generateRankingChart(htmlspecialchars($_GET["y"]), "rank", "line"); ?></div>
				</div>
			</div>
		</div>
			
		<div class="row">
			<div class="col-12 col-sm-10">
				<br /><br />
				<h4><?php echo htmlspecialchars($_GET["y"]); ?> (Score)</h4><br />
				<div>
					<div id="mycanvas2"><?php generateRankingChart(htmlspecialchars($_GET["y"]), "score", "bar"); ?></div>
				</div>
			</div>
		</div>
	</div>	
	

	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<!-- javascript -->
    <script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/jquery.min.js"></script>
	<!--<script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/Chart.min.js"></script>-->
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	
	
	

</body>

</html>