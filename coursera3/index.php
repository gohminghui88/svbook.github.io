<!DOCTYPE html>
<html>
<head>
<title>Goh Ming Hui</title>

</head>


<body>

<h1>Eric Goh's Resume Registry</h1>
<!--<p><a href="login.php">Please log in</a></p>-->


<?php

	include "pdo.php";
	session_start();
	
	$name = "";
	$user_id = "";
	
	if (!empty($_SESSION['postdata'])) {
		echo $_SESSION['postdata'];
		unset($_SESSION["postdata"]);
	}
	
	if (!empty($_SESSION['name'])) {
		echo "<p><a href='add.php'>Add New Entry</a>&nbsp;<a href='logout.php'>Logout</a></p>";
		
		$name = $_SESSION['name'];
		$user_id = $_SESSION['user_id'];
	}
	
	else {
		echo "<p><a href='login.php'>Please log in</a></p>";
	}
	
	//SQL Injection Check with prepare
	$stmt2 = $pdo -> prepare('SELECT * FROM Profile');
	$stmt2 -> execute();
			
	echo "<table border=1>";
	echo "<tr><td><b>Name</b></td><td><b>Headline</b></td>";
	if($name !== "" && $user_id !== "") echo "<td><b>Actions</b></td>";
	echo "</tr>";
	
	while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
					
		echo "<tr>";
		
		echo "<td>";
		echo "<a href='view.php?profile_id=".$row['profile_id']."'>".$row['first_name']."</a>";
		echo "</td>";
		
		echo "<td>";
		echo $row['headline'];
		echo "</td>";
		
		if($name !== "" && $user_id !== "") {
			echo "<td>";
			echo "<a href='edit.php?profile_id=".$row['profile_id']."'>"."Edit"."</a>&nbsp;";
			echo "<a href='delete.php?profile_id=".$row['profile_id']."'>"."Delete"."</a>";
			echo "</td>";
		}
		
		echo "</tr>";
		
	}
	
	echo "</table>";

?>


<div class="container">
<p>
<b>Note:</b> Your implementation should retain data across multiple
logout/login sessions.  This sample implementation clears all its
data periodically - which you should not do in your implementation.
</p>
</div>


</body>