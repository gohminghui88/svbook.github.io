
<!DOCTYPE html>
<html>
<head>
<title>Goh Ming Hui Profile View</title>
</head>
<body>
<div class="container">
<h1>Profile information</h1>

<?php 

include("pdo.php");

session_start();


$stmt1 = $pdo -> prepare('SELECT * FROM Profile WHERE profile_id= :uid');
$stmt1 -> execute(array(':uid' => $_GET['profile_id']));
$row = $stmt1 -> fetch(PDO::FETCH_ASSOC);

$firstname = $row['first_name'];
$lastname = $row['last_name'];
$email = $row['email'];
$headline = $row['headline'];
$summary = $row['summary'];

?>

<p>First Name: <?php echo $firstname;?></p>
<p>Last Name: <?php echo $lastname;?></p>
<p>Email: <?php echo $email;?></p>
<p>Headline:<br/> <?php echo $headline;?></p>
<p>Summary:<br/> <?php echo $summary;?><p>
</p>
<a href="index.php">Done</a>
</div>


</body>
</html>
