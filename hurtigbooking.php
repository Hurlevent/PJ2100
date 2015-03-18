<?php
require("database.php");
$database = new DB();
session_start();

if(!isset($_SESSION["Username"]) && !isset($_SESSION["Password"])){
    header("Location: desktop_home.php");
}
$username = $_SESSION["Username"];
$room = $_POST["Room"];
$date = $_SESSION["Date"];

    echo "<br />" . $username;
    echo "<br />" . $room;
    echo "<br />" . $date;

    $database->rentRoom($username, $room, $date, $date);

    header("Location: index.php");
?>