<html>

<head>
<title>Goh Ming Hui</title>
</head>

<body>
<!-- I just joined in this class. I do not hae the previous assignment codes. -->

<h1>Please Login</h1>

<form method="post" action="login.php">

<label for="nam">User Name</label>
<input type="text" name="who" id="nam"><br/>
<label for="id_1723">Password</label>
<input type="text" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">

<?php  

$name = "";
$pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["who"];
	$pass = $_POST["pass"];
  
	$isValid = true;
	if(empty($name)) {
		echo "<br />Username cannot be empty";
		error_log("Login fail ".$name." Username cannot be empty");
		$isValid = false;
	}
	
	if(empty($pass)) 
	{
		echo "<br />Password cannot be empty";
		error_log("Login fail ".$pass." Passwords cannot be empty");
		$isValid = false;
	}

	if(strpos($name, "@") == false) 
	{
		echo "<br />Name must have @. ";
		error_log("Login fail ".$name." Name must have @");
		$isValid = false;
	}



	$pass_sha = hash("sha1", $pass);
	$pass2 = hash("sha1", "php123");

	echo "<br />passwords: ".$pass_sha;
	echo "<br />hashed passwords: ".$pass2;

	if($isValid == true && $pass_sha == $pass2) { 

		echo "<br /> Valid";
		error_log("Login success ".$name."");
		header("Location: autos.php?name=".urlencode($name));
	
	}

	else 
	{
		echo "<br /> Incorrect password";
		error_log("Login fail ".$name."Incorrect password. ");
	}
}








?>

</form>
</body>

</html>