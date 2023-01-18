<html>
<head>

	<title>Register User</title>

	<!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	
</head>

<body>

<header class="jumbotron">	
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1> User Registration</h1>
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
		<div class="col-12">
		
			<div class="card">
					<div class="card-header">
					User Details
					</div>
				
					<div class="card-block">
						
						<br /><br />
						<form method="get" action="insertUser.php">

							<div class="form-group row">
								<div class="col-md-2"></div>
								<p class="col-md-10"> Username: <input type="text" name="username" required/> </p>
								
							</div>
							
							<div class="form-group row">
								<div class="col-md-2"></div>
								<p class="col-md-10"> Name: <input type="text" name="name" required/> </p>
								
							</div>
							
							<div class="form-group row">
								<div class="col-md-2"></div>
								<p class="col-md-10"> Email: <input type="text" name="email" required/> </p>
								
							</div>
							
							<div class="form-group row">
								<div class="col-md-2"></div>
								<p class="col-md-10"> Passwords: <input type="password" name="passwords" required/> </p>
								
							</div>

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="offset-md-2 col-md-10">
									<input type="submit" id="submit" />
								</div>
							</div>
						
						</form>
						
						<br /><br />
					</div>

			
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


	<!-- javascript -->
    <script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/Chart.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
</body>

</html>