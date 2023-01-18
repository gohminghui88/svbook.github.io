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
				<h1>QSWUR Dashboard (<?php echo htmlspecialchars($_GET["q"]); ?>) </h1>
			</div>
		</div>
	</div>
</header>

	
<div class="container">
	<div class="row">
		<div class="col-12">
			
			<br />
			<br />
			<p>| <a href="index2.php?y=2017">Main</a> | <a href="RankingCompTable.php?y=2017">Ranking Comparison</a> | <a href="QSTable.php?q=QSOverall">Overall</a> | <a href="QSTable.php?q=QSAcad">Academic Reputation</a> | <a href="QSTable.php?q=QSEmp">Employer Reputation</a> | <a href="QSTable.php?q=QSFacStud">Faculty Student Ratio</a> | <a href="QSTable.php?q=QSCit">Citations Per Faculty</a> | <a href="QSTable.php?q=QSIntFac">International Faculty</a> | <a href="QSTable.php?q=QSIntStud">International Student</a> | <a href="register.php">Add User</a> | <a href="logout.php">Log Out</a> |</p>
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
			
				<table id="<?php echo htmlspecialchars($_GET["q"]); ?>" border=1>
					
				
				</table>
			
			</div>
		
		</div>
	
	</div>

	<div class="container hidden-md-down">
	<!--<div class="container">-->
		<div class="row">
			<div class="col-12 col-sm-10">
				<br /><br />
				<h4><?php echo htmlspecialchars($_GET["q"]); ?> (Rank)</h4><br />
				<div>
					<div id="mycanvas"></div>
				</div>
			</div>
		</div>
			
		<div class="row">
			<div class="col-12 col-sm-10">
				<br /><br />
				<h4><?php echo htmlspecialchars($_GET["q"]); ?> (Score)</h4><br />
				<div>
					<div id="mycanvas2"></div>
				</div>
			</div>
		</div>
	</div>	
	

	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<!-- javascript -->
    <script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/jquery.min.js"></script>
	<!--<script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/Chart.min.js"></script>-->
	<script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/plotly/plotly-latest.min.js"></script>
	<script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/qs.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<script>
	
		var table = "<?php echo htmlspecialchars($_GET["q"]); ?>"
		
		getTable(table, table);
		
		getLineChart(table, "mycanvas", "mycanvas2");
		
		
	</script>
	
	
	

</body>

</html>