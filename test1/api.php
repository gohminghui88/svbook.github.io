<?php


$servername = "localhost";
$username = "ztecgqgv_test5";
$passwords = "aaa123!";
$dbname = "ztecgqgv_test2";
$conn = new mysqli($servername, $username, $passwords, $dbname);

if($conn -> connect_error) {
	die("connection failed" . $conn->connect_error);
}


$sql = "SELECT * FROM mytable";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {	
	while($row = $result->fetch_assoc()) {
		$data[] = $row;
	}
} 

$jsonRes = json_encode($data);

print($jsonRes);

$conn->close();

?>