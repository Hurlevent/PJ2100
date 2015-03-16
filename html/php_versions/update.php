<?php
require("database.php");
$database = new DB();

$date = new DateTime();
$timestamp = $date->getTimestamp();
$currentDate = date('Y/m/d', $timestamp); // dagens dato
$currentTime = date('H:i'); // foreløpig klokkeslett

$dato;
$tidspunkt;
$timer;
$prosjektor;
if(!isset($_POST["dato"])){
    $dato = $currentDate;
} else {
    $dato = $_POST["dato"];
}

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

}
?>