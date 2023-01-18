<html>
<head>

	<title>Register User</title>

</head>

<body>

<h1> User Registration</h1>
<form method="get" action="insertUser.php">

<br /><p> Username: <input type="text" name="username" /> </p>
<br /><p> Name: <input type="text" name="name" /> </p>
<br /><p> Email: <input type="text" name="email" /> </p>
<br /><p> Passwords: <input type="password" name="passwords" /> </p>

<br /><br />
<input type="submit" id="submit" />

</form>

<?php
	session_start();
	$email2 = "";
	$passwords2 = "";
	if (isset($_SESSION['email'])) {$email2 = $_SESSION['email']; }
	if (isset($_SESSION['pass'])) { $passwords2 = $_SESSION['pass']; }
?>

</body>

</html>