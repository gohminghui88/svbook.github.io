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

echo "<br />connected successfully<br /><br /><br />";

$id = $_GET["id"];

$sql = "DELETE FROM MyGuests WHERE id=$id";

if ($conn->query($sql) === TRUE) {
	echo "Record deleted successfully. Go to <a href='http://svbook.com/test1/Comments.php'>Comments</a>";
} 

else {	
	echo "Error deleting record: " . $conn->error;
}
	
$conn->close();


	
?>



</body>


</html>