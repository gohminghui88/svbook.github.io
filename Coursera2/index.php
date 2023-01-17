<!DOCTYPE html>
<html>
<head>
<title>Goh Ming Hui</title>

</head>


<body>

<?php

	require("pdo.php");
	
	//SQL Injection Check with prepare
	$stmt2 = $pdo -> prepare('SELECT * FROM profile');
	$stmt2 -> execute();
				
	echo "<table border=1>";
	echo "<tr><td>Name</td><td>Headline</td><td>Action</td></tr>";
	while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
					
		echo "<tr>";
		
		echo "<td>";
		echo "<a href='view.php?profile_id=".$row['profile_id']."'>".$row['first_name']."</a>";
		echo "</td>";
		
		echo "<td>";
		echo $row['headline'];
		echo "</td>";
		
		echo "<td>";
		echo "<a href='edit.php?profile_id=".$row['profile_id']."'>"."Edit"."</a>";
		echo "<a href='delete.php?profile_id=".$row['profile_id']."'>"."Delete"."</a>";
		echo "</td>";
		
		echo "</tr>";
		
	}
	
	echo "</table>";

?>


<div class="container">
<h1>Eric Goh's Resume Registry</h1>
<p><a href="login.php">Please log in</a></p>
<table border="1">
<tr><th>Name</th><th>Headline</th><tr>
<tr><td>
<a href="view.php?profile_id=231">TEST TEST</a></td><td>
TEST</td></tr>
<tr><td>
<a href="view.php?profile_id=232">jj 77</a></td><td>
hh</td></tr>
<tr><td>
<a href="view.php?profile_id=233">erys srgef</a></td><td>
srgg&lt;!--</td></tr>
<tr><td>
<a href="view.php?profile_id=234">ERNESTO ESTEVES</a></td><td>
E.E.-C4-W3-Assign_Profile_Position-DB</td></tr>
</table>
<p>
<b>Note:</b> Your implementation should retain data across multiple
logout/login sessions.  This sample implementation clears all its
data periodically - which you should not do in your implementation.
</p>
</div>
</body>