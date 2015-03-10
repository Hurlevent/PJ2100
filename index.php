<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8";
</head>
<body>
<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";

try {
	$conn = new PDO("mysql:host=$servername;dbname=woact", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully";

} catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}

?>
<h3>Login</h3>
<p>Brukernavn</p>
<input type="username" name="username" required />
<p>Passord</p>
<input type="password" name="password" required />

<?php

?>
</body>
</html>