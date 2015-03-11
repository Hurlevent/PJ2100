<!DOCTYPE html>
    <html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
require('database.php');
$database = new DB();
session_start(); // session objekt
if(!isset($_SESSION["Username"])){
    $_SESSION["Username"] = null;
}
if(!isset($_SESSION["Password"])){
    $_SESSION["Password"] = null;
}
$username = $_SESSION["Username"];
$password = $_SESSION["Password"];
if($database->logIn($username, $password)){
    echo "<h1>Welcome back, " . $username . "</h1>";
    echo "<p>Dette er en hemmelig tekst som ingen kan se med mindre de har logget seg ikke med et legit passord og brukernavn i følge databasen</p>";
    echo "<form action='logOut.php' method='POST' />";
    echo "<p>Log out here</p>";
    echo "<input type='hidden' name='logOut' />";
    echo "<input type='submit' value='Log out' /> ";
    echo "</form>";

} else {
    echo "<h1>You are not logged in</h1>";
}
?>
</body>
</html>