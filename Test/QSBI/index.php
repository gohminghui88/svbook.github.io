<html>
<head>

	<title>Login</title>
	
	<!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	

</head>

<style>
	.bg-1 {
		background-color: grey;
		color: white;
	}
	
</style>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-12 sm-12">
				<br /><br /><br />
				<img src="http://www.ntu.edu.sg/AboutNTU/CorporateInfo/CorporateIdentity/PublishingImages/resource2.jpg" class="img-fluid" />
				<br /><br /><br /><br /><br />
				<h1>BI Dashboard</h1>
				<br />
			</div>
		</div>
	</div>

	
	<div class="container">
		<div class="row">
			<div class="col-10 sm-10">
			
				<div class="card">
					<div class="card-header">
					Login
					</div>
				
					<div class="card-block">
					
						<br />
						<br />
						
						<form method="get" action="validate.php" onsubmit="return validateForm()" name="myForm">

						<div class="form-group row">
							<div class="col-md-2"></div>
							<p class="col-md-10"> Email: <input type="text" name="email" id="email"/> <span class="badge badge-pill badge-default">Cannot be Empty</span></p>
						</div>
						
						<div class="form-group row">
							<div class="col-md-2"></div>
							<p class="col-md-10"> Passwords: <input type="password" name="passwords" id="pass"/> <span class="badge badge-pill badge-default">Cannot be Empty</span></p>
						</div>

						
						<div class="form-group row">
							<div class="col-md-2"></div>
							<div class="offset-md-2 col-md-10">
								<input type="submit" id="submit" value="Login"/>
							</div>
						</div>

						</form>
						
						<br />
						<br />
						
					</div>
				
				</div>
				
				
			</div>
		</div>
	</div>



	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<!-- javascript -->
    <script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://www.svbook.com/Test/QSBI/js/Chart.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<script>
		function validateForm() {
			var email = document.getElementById("email").value;
			var pass = document.getElementById("pass").value;
			
			if (email == "") {
				alert("Email cannot be empty. ");
				return false;
			}
			
			if (email.indexOf("@") == -1) {
				alert("Email must have @. ");
				return false;
			}
			
			
			
			
			/*SQL Injection attack prevention. OK, the worst method */
			
			if (email.toLowerCase().indexOf("select ") != -1) {
				alert("No injection attack please. ");
				return false;
			}
			
			if (email.toLowerCase().indexOf("insert ") != -1) {
				alert("No injection attack please. ");
				return false;
			}
			
			if (email.toLowerCase().indexOf("update ") != -1) {
				alert("No injection attack please. ");
				return false;
			}
			
			if (email.toLowerCase().indexOf("delete ") != -1) {
				alert("No injection attack please. ");
				return false;
			}
			
			if (email.toLowerCase().indexOf("like ") != -1) {
				alert("No injection attack please. ");
				return false;
			}
			
			
			
			
			
			if (pass == "") {
				alert("Passwords cannot be empty. ");
				return false;
			}
			
			if (pass.toLowerCase().indexOf("select ") != -1) {
				alert("No injection attack please. ");
				return false;
			}
			
			if (pass.toLowerCase().indexOf("insert ") != -1) {
				alert("No injection attack please. ");
				return false;
			}
			
			if (pass.toLowerCase().indexOf("update ") != -1) {
				alert("No injection attack please. ");
				return false;
			}
			
			if (pass.toLowerCase().indexOf("delete ") != -1) {
				alert("No injection attack please. ");
				return false;
			}
			
			if (pass.toLowerCase().indexOf("like ") != -1) {
				alert("No injection attack please. ");
				return false;
			}
			
			
		}
	</script>
</body>

</html>