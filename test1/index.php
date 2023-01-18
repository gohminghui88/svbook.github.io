<html>

<head>
</head>

<body>


<?php 

$servername = "localhost";
$username = "ztecgqgv_test5";
$passwords = "aaa123!";
$dbname = "ztecgqgv_test";
$conn = new mysqli($servername, $username, $passwords, $dbname);

if($conn -> connect_error) {	
	die("connection failed" . $conn->connect_error);
}

echo "connected successfully";

$name = $_POST["name"];
$email = $_POST["email"];
$comments = $_POST["comments"];

if(!empty($name) && !empty($email) && !empty($comments)) {
	$sql = "INSERT INTO MyGuests (name, email, comments) VALUES ('$name', '$email', '$comments')";
	
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} 
	
	else {		
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
	
$conn->close();
	
?>

<form action="http://svbook.com/test1/index.php" method="POST">

Name: <input type="text" name="name" />
Email: <input type="text" name = "email" />
Feedback: <textarea name="comments" maxlength="1000" cols="25" rows="6"></textarea>
<input type="submit" />

</form>

</body>


</html>