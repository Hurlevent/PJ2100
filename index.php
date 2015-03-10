<?php
include_once('database.php'); // importerer classen som snakker med databasens
$database = new DB(); // Oppretter database-objekt
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8";
</head>
<body>
<form action="index.php" method="post">
	<p>Brukernavn</p>
	<input type="username" name="username" required />
	<p>Passord</p>
	<input type="password" name="password" required />
	<input type="submit" name="enter">
</form>
<?php
	$Submitted = $_POST['enter'];
	$Brukernavn = $_POST['username'];
	$Passord = $_POST['password'];
	if($Submitted == true){
	echo "$Brukernavn";
	echo "$Passord";
	//$database->logIn();
	}

?>
</body>
</html>