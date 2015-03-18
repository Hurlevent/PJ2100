<?php
require("database.php");
$database = new DB();

session_start();

$date = new DateTime();
$timestamp = $date->getTimestamp();
$currentDate = date('Y/m/d', $timestamp); // dagens dato
$currentTime = date('H:i'); // foreløpig klokkeslett

$currentDateTime = $currentDate . " " . $currentTime;

$dato;
$tidspunkt;
$timer;
$prosjektor;
$personer;
if(!isset($_POST["dato"])){
    $dato = $currentDate;
} else {
    $dato = $_POST["dato"];
}
$_SESSION["Date"] = $dato;

echo "" . $dato;

if(!isset($_POST["tidspunkt"])){
    $tidspunkt = $currentTime;
} else {
    $tidspunkt = $_POST["tidspunkt"];
}

if(!isset($_POST["timer"])){
    $timer = 1;
} else {
    $timer = $_POST["timer"];
}

if(!isset($_POST["prosjektor"])){
    $prosjektor = false;
} else {
    $prosjektor = true;
}
if(!isset($_POST["personer"])){
    $personer = 1;
} else {
    $personer = $_POST["personer"];
}

   header("Location: desktop_home.php");

?>