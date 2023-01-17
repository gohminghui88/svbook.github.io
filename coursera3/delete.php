
<!DOCTYPE html>
<html>
<head>
<title>Goh Ming Hui's Profile Delete</title>
</head>


<body>

<div class="container">

<h1>Deleting Profile</h1>

<?php 

include("pdo.php");

session_start();
if(empty($_SESSION["user_id"])) die("Not logged in");


$stmt1 = $pdo -> prepare('SELECT * FROM Profile WHERE profile_id= :uid');
$stmt1 -> execute(array(':uid' => $_GET['profile_id']));
$row = $stmt1 -> fetch(PDO::FETCH_ASSOC);

$firstname = $row['first_name'];
$lastname = $row['last_name'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$delete = "";
	if(isset($_POST["delete"]))
		$delete = $_POST["delete"];
	if($delete == "Delete") {				
		
		$stmt = $pdo->prepare('DELETE FROM Profile WHERE profile_id= :uid');
		$stmt->execute(array(':uid' => $_POST['profile_id']));
		
		$_SESSION["postdata"] = "Deleted";
		header("Location: index.php");

		return;
	}
	
	$cancel = "";
	if(isset($_POST["cancel"]))
		$cancel = $_POST["cancel"];
	
	if($cancel == "Cancel") {
		
		header("Location: index.php");

		return;
		
	}
}


?>

<form method="post" action="delete.php">
<p>First Name: <?php echo $firstname; ?></p>
<p>Last Name: <?php echo $lastname; ?></p>
<input type="hidden" name="profile_id" value="<?php echo $_GET['profile_id']; ?>" />
<input type="submit" name="delete" value="Delete">
<input type="submit" name="cancel" value="Cancel">


</p>
</form>


</div>

</body>
</html>
