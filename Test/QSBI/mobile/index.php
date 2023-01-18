<!DOCTYPE html>
<html>

<head>
	<title>QS University BI</title>
	
	<!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/styles.css">
	
</head>


<style>
		.chart-container {
		width: 740px;
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

<!-- javascript -->
    <script src="./js/jquery.min.js"></script>
	<script src="./js/tether.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
	<!--<script src="./js/Chart.min.js"></script>-->
	

<header class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Simple Business Intelligence Dashboard (Main) </h1>
			</div>
		</div>
	</div>
</header>

<div class="container">
	<div class="row">
		<div class="col-12">
			
			<p>| <a href="index.php?y=2017">Main</a> | <a href="RankingCompTable.php?y=2017">Ranking Comparison</a> | <a href="QSTable.php?q=QSOverall">Overall</a> | <a href="QSTable.php?q=QSAcad">Academic Reputation</a> | <a href="QSTable.php?q=QSEmp">Employer Reputation</a> | <a href="QSTable.php?q=QSFacStud">Faculty Student Ratio</a> | <a href="QSTable.php?q=QSCit">Citations Per Faculty</a> | <a href="QSTable.php?q=QSIntFac">International Faculty</a> | <a href="QSTable.php?q=QSIntStud">International Student</a> | <a href="logout.php">Log Out</a> |</p>
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



<table border="0">

<tr valign="top">

<td class="col-4">
<?php
	
	include("qs.php");

	error_reporting(E_ALL ^ E_WARNING); 
	
	session_start();
	$email2 = "";
	$passwords2 = "";
	if (isset($_SESSION['email'])) {$email2 = $_SESSION['email']; }
	if (isset($_SESSION['pass'])) { $passwords2 = $_SESSION['pass']; }
	
	$year = str_replace("+", "_", $_GET['y']);
	if($year == "") $year = "2017";
	
?>




<br />


<div class="container">
	<div class="row">
		<div class="col-4" id="form1">
		
			<form action="http://www.svbook.com/Test/QSBI/mobile/index.php" method="get">
			
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
		
			<table id="rankingTable" border=1>
			
			<br />
			
			<?php
				generateRankingTable($year, "World University Ranking");
			?>
			
			</table>
		
		
		</div>
	</div>
</div>	

<br />

<div class="container">
	<div class="row">
		<div class="hidden-md-down" id="form1">
		
			<table id="QSOverall" border=1>
			<?php
				generateTable("QSOverall", "Overall");
			?>
			</table>
		
		
		</div>
	</div>
</div>	

<br />

<div class="container">
	<div class="row">
		<div class="hidden-md-down" id="form1">
		
			<table id="QSAcad" border=1>
			<?php
				generateTable("QSAcad", "Academic Reputation");
			?>
			</table>
		
		
		</div>
	</div>
</div>

<br />

<div class="container">
	<div class="row">
		<div class="hidden-md-down" id="form1">
		
			<table id="QSEmp" border=1>
			<?php
				generateTable("QSEmp", "Employer Reputation");
			?>
			</table>
		
		
		</div>
	</div>
</div>

<br />

<div class="container">
	<div class="row">
		<div class="hidden-md-down" id="form1">
		
			<table id="QSFacStud" border=1>
			<?php
				generateTable("QSFacStud", "Faculty Student Ratio");
			?>
			</table>
		
		
		</div>
	</div>
</div>

<br />

<div class="container">
	<div class="row">
		<div class="hidden-md-down" id="form1">
		
			<table id="QSCit" border=1>
			<?php
				generateTable("QSCit", "Citations Per Faculty");
			?>
			</table>
		
		
		</div>
	</div>
</div>

<br />

<div class="container">
	<div class="row">
		<div class="hidden-md-down" id="form1">
		
			<table id="QSIntFac" border=1>
			<?php
				generateTable("QSIntFac", "International Faculty");
			?>
			</table>
		
		
		</div>
	</div>
</div>

<br />

<div class="container">
	<div class="row">
		<div class="hidden-md-down" id="form1">
		
			<table id="QSIntStud" border=1>
			<?php
				generateTable("QSIntStud", "International Student");
			?>
			</table>
		
		
		</div>
	</div>
</div>

</td>


<td class="col-8">



	<table border="0" class="col-8">

		<tr>
		    <td>
				<br /><br />
				<h4><?php echo $year;?> Ranking </h4>
				<div>
					<div id="ntu1" class="col-8"><?php generateRankingChart($year, "rank", "line"); ?></div>
				</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Overall (Rank) </h4>
				<div>
					<div id="overall1" class="col-8"> <?php generateChart("QSOverall", "rank", "line"); ?></div>
				</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Academic (Rank) </h4>
				<div>
					<div id="acad1" class="col-8"><?php generateChart("QSAcad", "rank", "line"); ?></div>
				</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Employer (Rank) </h4>
				<div>
					<div id="emp1" class="col-8"><?php generateChart("QSEmp", "rank", "line"); ?></div>
				</div>
			</td>
		</tr>
		
		
		
		<tr>
		    <td>
				<br /><br />
				<h4><?php echo $year;?> Score </h4>
					<div>
						<div id="ntu2" class="col-8"><?php generateRankingChart($year, "score", "bar"); ?></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Overall (Score) </h4>
					<div>
						<div id="overall2" class="col-8"><?php generateChart("QSOverall", "score", "line"); ?></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Academic (Score) </h4>
					<div>
						<div id="acad2" class="col-8"><?php generateChart("QSAcad", "score", "line"); ?></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Employer (Score) </h4>
					<div>
						<div id="emp2" class="col-8"><?php generateChart("QSEmp", "score", "line"); ?></div>
					</div>
			</td>
		</tr>
		
		
		
		<tr>
		    <td>
				<br /><br />
				<h4>QS Faculty Student (Rank) </h4>
					<div>
						<div id="fs1" class="col-8"><?php generateChart("QSFacStud", "rank", "line"); ?></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Citations (Rank) </h4>
					<div>
						<div id="cit1" class="col-8"><?php generateChart("QSCit", "rank", "line"); ?></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS International Faculty (Rank) </h4>
					<div>
						<div id="if1" class="col-8"><?php generateChart("QSIntFac", "rank", "line"); ?></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS International Student (Rank) </h4>
					<div>
						<div id="is1" class="col-8"><?php generateChart("QSIntStud", "rank", "line"); ?></div>
					</div>
			</td>
		</tr>
		
		
		
		<tr>
		    <td>
				<br /><br />
					<h4>QS Faculty Student (Score) </h4>
					<div>
						<div id="fs2" class="col-8"><?php generateChart("QSFacStud", "score", "line"); ?></div>
					</div>
				</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Citations (Score) </h4>
					<div>
						<div id="cit2" class="col-8"><?php generateChart("QSCit", "score", "line"); ?></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS International Faculty (Score) </h4>
					<div>
						<div id="if2" class="col-8"><?php generateChart("QSIntFac", "score", "line"); ?></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS International Student (Score) </h4>
					<div>
						<div id="is2" class="col-8"><?php generateChart("QSIntStud", "score", "line"); ?></div>
					</div>
			</td>
		</tr>
		

		
	</table>
	
</td>
</tr>
</table>
	
	

</body>

</html>