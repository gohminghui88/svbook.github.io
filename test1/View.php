<html>

<head>
</head>

<body>

<table border="1">

<?php 

$servername = "localhost";
$username = "ztecgqgv_test5";
$passwords = "aaa123!";
$dbname = "ztecgqgv_test";
$conn = new mysqli($servername, $username, $passwords, $dbname);

if($conn -> connect_error) {
	die("connection failed" . $conn->connect_error);
}

echo "<br />connected successfully<br /><br /><br />";

$id = $_GET["id"];

$sql = "SELECT id, name, email, comments FROM MyGuests where id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {	
	while($row = $result->fetch_assoc()) {
		
		$id = $row["id"];
		$name = $row["name"];
		$email = $row["email"];
		$comments = $row["comments"];
		
		echo "<tr><td>ID: </td><td>$id</td></tr>";
		echo "<tr><td>Name: </td><td>$name</td></tr>";
		echo "<tr><td>Email: </td><td>$email</td></tr>";
		echo "<tr><td>COmments: </td><td>$comments</td></tr>";
	}
} 

else {
	echo "Zero results";
}

$conn->close();

	
?>

</table>

</body>


</html>