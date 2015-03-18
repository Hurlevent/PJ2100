<?php
require("database.php");
$database = new DB();
session_start();

if(!isset($_SESSION["Username"]) && !isset($_SESSION["Password"])){
    header("Location: desktop_home.php");
}
$username = $_SESSION["Username"];
$password = $_SESSION["Password"];
$room = $_POST["room"];
$date = $_POST["date"];
$projector = $_POST["projector"];
$capacity = $_POST["capacity"];

if($database->logIn($username, $password)){
    echo "<br />Du er logget inn som: " . $username;
    echo "<br />Valgt rom: " . $room;
    echo "<br />Dato: " . $date;
    echo "<br />Prosjektor: " . $projector;
    echo "<br />Antall plasser: " . $capacity;
    $database->rentRoom($username, $room, $date, $date);
    echo "<a href='desktop_home.php'>Tilbake til hovedsiden</a>";
}

?>