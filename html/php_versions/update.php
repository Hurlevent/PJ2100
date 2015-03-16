<?php
require("database.php");
$database = new DB();

$date = new DateTime();
$timestamp = $date->getTimestamp();
$currentDate = date('m/d/Y', $timestamp);

$dato;
$tidspunkt;
if(!isset($_POST["dato"])){
    $dato = $currentDate;
} else {
    $dato = $_POST["dato"];
}

if(!isset($_POST["tidspunkt"])){
    $tidspunkt = 2;
} else {
    $tidspunkt = $_POST["tidspunkt"];
}

if(!isset($_POST[""])){

}
?>