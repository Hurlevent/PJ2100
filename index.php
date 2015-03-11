<?php
require('database.php'); // importerer classen som snakker med databasens
$database = new DB(); // Oppretter database-objekt
if($database->hasConnection()){
    echo "Has connection with database: ";
    echo $database->getDatabase();
} else {
    echo "No connection";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8";
</head>
<body>
<form action="login.php" method="POST">
	<p>Brukernavn</p>
	<input type="username" name="username" required />
	<p>Passord</p>
	<input type="password" name="password" required />
	<input type="submit" value='Log in'>
</form>
</body>
</html>