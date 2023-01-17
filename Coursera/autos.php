<html>

<head>
<title>Goh Ming Hui</title>
</head>


<body>

<?php 
	require("pdo.php");
	
	if(empty($_GET["name"])) die("Name parameter missing");
	
?>

<h1>Tracking Autos for <a href="mailto:<?php echo $_GET["name"];?>"><?php echo $_GET["name"]; ?></a></h1>



<form method="post" action="autos.php?name=<?php echo urlencode($_GET["name"]); ?>">
<p>Make:
<input type="text" name="make" size="60"/></p>
<p>Year:
<input type="text" name="year"/></p>
<p>Mileage:
<input type="text" name="mileage"/></p>
<input type="submit" value="Add" name="Add">
<input type="submit" name="logout" value="Logout">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$logout = "";
		if(isset($_POST["logout"]))
			$logout = $_POST["logout"];
		if($logout == "Logout") {
		
			header('Location: index.php');
		
		}
	
		$add = "";
		if(isset($_POST["Add"]))
			$add = $_POST["Add"];
		if($add == "Add") {
		
			$make = $_POST['make'];
			$year = $_POST['year'];
			$mileage = $_POST['mileage'];
			
			$message = "";
			if(empty($make))
				$message = "Make cannot be empty. ";
			
			if(empty($year))
				$message = "Year cannot be empty. ";
			//SQL Injection Check
			if(is_numeric($year) != true)
				$message = "Year must be number. ";
			
			if(empty($mileage))
				$message = "Mileage cannot be empty. ";
			//SQL Injection Check
			if(is_numeric($mileage) != true)
				$message = "Mileage must be number. ";
			
			
			if($message != "") {
				echo $message;
				error_log("Add fail ".$message);
			}
			
			else {
				
				//SQL Injection Check with prepare
				$stmt = $pdo -> prepare('INSERT INTO autos (make, year, mileage) VALUES ( :mk, :yr, :mi)');
				$stmt->execute(array(':mk' => htmlentities($_POST['make']), ':yr' => htmlentities($_POST['year']), ':mi' => htmlentities($_POST['mileage'])));
				
				//SQL Injection Check with prepare
				$stmt2 = $pdo -> prepare('SELECT * FROM autos');
				$stmt2 -> execute();
				
				echo "<table border=1>";
				echo "<tr><td>Auto_id</td><td>Make</td><td>Year</td><td>Mileage</td></tr>";
				while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
					
					echo "<tr>"."<td>".$row['auto_id']."</td>"."<td>".$row['make']."</td>"."<td>".$row['year']."</td>"."<td>".$row['mileage']."</td>"."</tr>";
				}
				echo "</table>";
			}
		}
	}
	
?>


</body>

</html>