<?php
require("database.php");
$database = new DB();
session_start();

if(!isset($_SESSION["Username"]) && !isset($_SESSION["Password"])){
    header("Location: ./index.php");
}
$username = $_SESSION["Username"];
$room = $_POST["Room"];
$date = $_SESSION["Date"];


    $database->rentRoom($username, $room, $date, $date);

    header("Location: ./index.php");
?>