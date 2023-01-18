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
			
			<p>| <a href="index2.php?y=2017">Main</a> | <a href="RankingCompTable.php?y=2017">Ranking Comparison</a> | <a href="QSTable.php?q=QSOverall">Overall</a> | <a href="QSTable.php?q=QSAcad">Academic Reputation</a> | <a href="QSTable.php?q=QSEmp">Employer Reputation</a> | <a href="QSTable.php?q=QSFacStud">Faculty Student Ratio</a> | <a href="QSTable.php?q=QSCit">Citations Per Faculty</a> | <a href="QSTable.php?q=QSIntFac">International Faculty</a> | <a href="QSTable.php?q=QSIntStud">International Student</a> | <a href="register.php">Add User</a> | <a href="logout.php">Log Out</a> |</p>
		</div>
	</div>
</div>


<table border="0">

<tr valign="top">

<td>
<?php
	error_reporting(E_ALL ^ E_WARNING); 
	
	session_start();
	$email2 = "";
	$passwords2 = "";
	if (isset($_SESSION['email'])) {$email2 = $_SESSION['email']; }
	if (isset($_SESSION['pass'])) { $passwords2 = $_SESSION['pass']; }
	
	
	$year = str_replace("+", "_", $_GET['y']);
	if($year == "") $year = "2017";
	
?>


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


<br />


<div class="container">
	<div class="row">
		<div class="col-12" id="form1">
		
			<form action="http://www.svbook.com/Test/QSBI/index2.php" method="get">
			
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
					<option value="All">All</option>
				</select>
				
				<input type="submit" id="refresh" value="refresh"/>
			
			</form>
			
			<br />
			
			<table id="rankingTable" border=1>
			
			</table>
		
		
		</div>
	</div>
</div>	

<br />

<div class="container">
	<div class="row">
		<div class="col-12" id="form1">
		
			<table id="QSOverall" border=1>
			
			</table>
		
		
		</div>
	</div>
</div>	

<br />

<div class="container">
	<div class="row">
		<div class="col-12" id="form1">
		
			<table id="QSAcad" border=1>
			
			</table>
		
		
		</div>
	</div>
</div>

<br />

<div class="container">
	<div class="row">
		<div class="col-12" id="form1">
		
			<table id="QSEmp" border=1>
			
			</table>
		
		
		</div>
	</div>
</div>

<br />

<div class="container">
	<div class="row">
		<div class="col-12" id="form1">
		
			<table id="QSFacStud" border=1>
			
			</table>
		
		
		</div>
	</div>
</div>

<br />

<div class="container">
	<div class="row">
		<div class="col-12" id="form1">
		
			<table id="QSCit" border=1>
			
			</table>
		
		
		</div>
	</div>
</div>

<br />

<div class="container">
	<div class="row">
		<div class="col-12" id="form1">
		
			<table id="QSIntFac" border=1>
			
			</table>
		
		
		</div>
	</div>
</div>

<br />

<div class="container">
	<div class="row">
		<div class="col-12" id="form1">
		
			<table id="QSIntStud" border=1>
			
			</table>
		
		
		</div>
	</div>
</div>

</td>


<td>



	<table border="0" class="hidden-md-down">

		<tr>
		    <td>
				<br /><br />
				<h4><?php echo $year;?> Ranking </h4>
				<div>
					<div id="ntu1"></div>
				</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Overall (Rank) </h4>
				<div>
					<div id="overall1"></div>
				</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Academic (Rank) </h4>
				<div>
					<div id="acad1"></div>
				</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Employer (Rank) </h4>
				<div>
					<div id="emp1"></div>
				</div>
			</td>
		</tr>
		
		
		
		<tr>
		    <td>
				<br /><br />
				<h4><?php echo $year;?> Score </h4>
					<div>
						<div id="ntu2"></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Overall (Score) </h4>
					<div>
						<div id="overall2"></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Academic (Score) </h4>
					<div>
						<div id="acad2"></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Employer (Score) </h4>
					<div>
						<div id="emp2"></div>
					</div>
			</td>
		</tr>
		
		
		
		<tr>
		    <td>
				<br /><br />
				<h4>QS Faculty Student (Rank) </h4>
					<div>
						<div id="fs1"></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Citations (Rank) </h4>
					<div>
						<div id="cit1"></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS International Faculty (Rank) </h4>
					<div>
						<div id="if1"></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS International Student (Rank) </h4>
					<div>
						<div id="is1"></div>
					</div>
			</td>
		</tr>
		
		
		
		<tr>
		    <td>
				<br /><br />
					<h4>QS Faculty Student (Score) </h4>
					<div>
						<div id="fs2"></div>
					</div>
				</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS Citations (Score) </h4>
					<div>
						<div id="cit2"></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS International Faculty (Score) </h4>
					<div>
						<div id="if2"></div>
					</div>
			</td>
		
			<td>
				<br /><br />
				<h4>QS International Student (Score) </h4>
					<div>
						<div id="is2"></div>
					</div>
			</td>
		</tr>
		

		
	</table>
	
</td>
</tr>
</table>



	
	<script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/plotly/plotly-latest.min.js"></script>
	<script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/qs.js"></script>
	<script>
		
		getRankingTable("rankingTable", "Rank Comparison", "<?php echo $year; ?>");
		getRankingChart("ntu1", "ntu2", "<?php echo $year; ?>");
		
		getTable("QSOverall", "Overall");
		getTable("QSAcad", "Academic Reputation");
		getTable("QSEmp", "Employer Reputation");
		getTable("QSFacStud", "Faculty Student Ratio");
		getTable("QSCit", "Citation Per Faculty");
		getTable("QSIntFac", "International Faculty");
		getTable("QSIntStud", "International Student");
		
	
		getLineChart("QSOverall", "overall1", "overall2");
		getLineChart("QSAcad", "acad1", "acad2");
		getLineChart("QSEmp", "emp1", "emp2");
		getLineChart("QSFacStud", "fs1", "fs2");
		getLineChart("QSCit", "cit1", "cit2");
		getLineChart("QSIntFac", "if1", "if2");
		getLineChart("QSIntStud", "is1", "is2");
		
		
		
		
	</script>
	
	

</body>

</html>