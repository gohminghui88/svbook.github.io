
<!DOCTYPE html>
<html>
<head>
<title>Goh Ming Hui's Profile Edit</title>

</head>


<body>

<?php 

include("pdo.php");

session_start();
if(empty($_SESSION["user_id"])) die("Not logged in");

$stmt1 = $pdo -> prepare('SELECT * FROM Profile WHERE profile_id= :uid');
$stmt1 -> execute(array(':uid' => $_GET['profile_id']));
$row = $stmt1 -> fetch(PDO::FETCH_ASSOC);


$firstname = $lastname = $email = $headline = $summary = "";

$firstname = $row['first_name'];
$lastname = $row['last_name'];
$email = $row['email'];
$headline = $row['headline'];
$summary = $row['summary'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$save = "";
	if(isset($_POST["save"]))
		$save = $_POST["save"];
	if($save == "Save") {	

		if($firstname !== "" && $lastname !== "" && $email !== "" && $headline !== "" && $summary !== "") {
			$stmt = $pdo->prepare("UPDATE Profile SET first_name = :fn, last_name = :ln, email = :em, headline = :he, summary = :su WHERE profile_id = :uid");
			$stmt->execute(array(':fn' => $_POST['first_name'],':ln' => $_POST['last_name'],':em' => $_POST['email'],':he' => $_POST['headline'],':su' => $_POST['summary'], ':uid' => $_POST['profile_id']));
		
			//echo "UPDATE Profile SET first_name =".$_POST['first_name'].", last_name =".$_POST['last_name'].", email =".$_POST['email'].", headline =".$_POST['headline'].", summary =".$_POST['summary']." WHERE profile_id = ".$_POST['profile_id'];
		
			$_SESSION["postdata"] = "Edited";
			header("Location: index.php");

			return;
		}
		
		//else echo "<br>All fields are required"; 
		
		//if(strpos($email, "@") == false) 
		//	echo "<br>Email address must contain @";
		
		else {
			$_SESSION["postdata"] = "Not Edited";
			header("Location: edit.php?profile_id=" . $_POST["profile_id"]);
		}
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




<div class="container">
<h1>Editing Profile for UMSI</h1>
<form method="post" action="edit.php">
<p>First Name:
<input type="text" id="first_name" name="first_name" size="60"
value="<?php echo $firstname;?>"
/></p>
<p>Last Name:
<input type="text" id="last_name" name="last_name" size="60"
value="<?php echo $lastname;?>"
/></p>
<p>Email:
<input type="text" id="email" name="email" size="30"
value="<?php echo $email;?>"
/></p>
<p>Headline:<br/>
<input type="text" id="headline" name="headline" size="80"
value="<?php echo $headline;?>"
/></p>
<p>Summary:<br/>
<textarea id="summary" name="summary" rows="8" cols="80">
<?php echo $summary;?></textarea>
<p>
<input type="hidden" name="profile_id" value="<?php echo $_GET['profile_id']; ?>" />
<input type="submit" onclick="return doValidate();" name="save" value="Save">
<input type="submit" name="cancel" value="Cancel">
</p>
</form>


<script>
function doValidate() {
    console.log('Validating...');
    try {
        addr = document.getElementById('email').value;
        fn = document.getElementById('first_name').value;
		ln = document.getElementById('last_name').value;
		headline = document.getElementById('headline').value;
		summary = document.getElementById('summary').value;
		
        console.log("Validating...");
        if (addr == null || addr == "" || fn == null || fn == "" || ln == null || ln == "" || headline == null || headline == "" || summary == null || summary == "") {
            alert("All fields are required");
            return false;
        }
        if ( addr.indexOf('@') == -1 ) {
            alert("Invalid email address");
            return false;
        }
        return true;
    } catch(e) {
        return false;
    }
    return false;
}
</script>


</div>
</body>
</html>
