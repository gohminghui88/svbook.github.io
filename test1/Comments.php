<html>

<head>
</head>

<body>

<table border="1">
<tr>
	<td>id</td>
	<td>name</td>
	<td>email</td>
	<td>Comments</td>
	<td>Delete</td>
</tr>

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

$sql = "SELECT id, name, email, comments FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {	
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		$id = $row["id"];
		echo "<td>" . $id . "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["comments"] . "</td><td><a href='http://svbook.com/test1/Delete.php?id=" . $id . "'>Delete</a><a href='http://svbook.com/test1/View.php?id=" . $id . "'>View</a></td>";
		echo "</tr>";
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