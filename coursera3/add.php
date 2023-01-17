
<!DOCTYPE html>
<html>
<head>
<title>Goh Ming Hui's Profile Add</title>


</head>
<body>

<?php 

include("pdo.php");

session_start();
if(empty($_SESSION["user_id"])) die("Not logged in");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$add = "";
	if(isset($_POST["Add"]))
		$add = $_POST["Add"];
	if($add == "Add") {	

		$firstname = $lastname = $email = $headline = $summary = "";
		
		$firstname = $_POST['first_name'];
		$lastname = $_POST['last_name'];
		$email = $_POST['email'];
		$headline = $_POST['headline'];
		$summary = $_POST['summary'];
		
		if($firstname !== "" && $lastname !== "" && $email !== "" && $headline !== "" && $summary !== "") {
			$stmt = $pdo->prepare('INSERT INTO Profile (user_id, first_name, last_name, email, headline, summary) VALUES ( :uid, :fn, :ln, :em, :he, :su)');
			$stmt->execute(array(':uid' => $_SESSION['user_id'],':fn' => $_POST['first_name'],':ln' => $_POST['last_name'],':em' => $_POST['email'],':he' => $_POST['headline'],':su' => $_POST['summary']));
		
			$_SESSION["postdata"] = "Added";
			header("Location: index.php");

			return;
		}
		
		//if($firstname == "" || $lastname == "" || $email == "" || $headline == "" || $summary == "")
		//	echo "<br>All fields are required"; 
		
		//if(strpos($email, "@") == false) 
		//	echo "<br>Email address must contain @";
		
		else {
			header("Location: add.php");
			$_SESSION["postdata"] = "Not Added";
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
<h1>Adding Profile for Goh Ming Hui</h1>
<form method="post">
<p>First Name:
<input type="text" id="first_name" name="first_name" size="60"/></p>
<p>Last Name:
<input type="text" id="last_name" name="last_name" size="60"/></p>
<p>Email:
<input type="text" id="email" name="email" size="30"/></p>
<p>Headline:<br/>
<input type="text" id="headline" name="headline" size="80"/></p>
<p>Summary:<br/>
<textarea id="summary" name="summary" rows="8" cols="80"></textarea>
<p>
<input type="submit" onclick="return doValidate();" name="Add" value="Add">
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
